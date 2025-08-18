<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeAllRecipes extends Command
{
    protected $signature = 'app:scrape-all-recipes {--page=1} {--limit=50}';
    protected $description = 'Scrape all recipes from kulinariya.az';

    public function handle()
    {
        $page = (int) $this->option('page');
        $limit = (int) $this->option('limit');

        $this->info("🚀 Starting to scrape recipes from kulinariya.az");

        // 1. Get all recipe URLs
        $recipeUrls = $this->getAllRecipeUrls($page, $limit);

        if (empty($recipeUrls)) {
            $this->error("❌ No recipe URLs found!");
            return;
        }

        $this->info("📋 Found " . count($recipeUrls) . " recipe URLs");

        // 2. Scrape each recipe
        $recipes = [];
        $progressBar = $this->output->createProgressBar(count($recipeUrls));
        $progressBar->start();

        foreach ($recipeUrls as $index => $url) {
            try {
                $recipe = $this->scrapeRecipe($url);
                if ($recipe) {
                    $recipes[] = $recipe;
                }
                sleep(1); // Be respectful to the server
            } catch (\Exception $e) {
                $this->error("\n❌ Error scraping $url: " . $e->getMessage());
            }
            $progressBar->advance();
        }

        $progressBar->finish();

        // 3. Save all recipes
        Storage::disk('local')->put(
            'all_recipes.json',
            json_encode($recipes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $this->info("\n✅ Scraped " . count($recipes) . " recipes successfully!");
        $this->info("📁 Saved to storage/app/all_recipes.json");
    }

    private function getAllRecipeUrls($startPage = 1, $limit = 50): array
    {
        $urls = [];
        $page = $startPage;
        $collected = 0;

        while ($collected < $limit) {
            try {
                $pageUrl = "https://kulinariya.az/recipes?page=$page";
                $this->info("🔍 Scraping page $page: $pageUrl");

                $html = Http::timeout(30)->get($pageUrl)->body();
                $crawler = new Crawler($html);

                // Try multiple possible selectors for recipe links
                $recipeLinks = $crawler->filter('
                    .recipe-item a,
                    .recipe-card a,
                    .post-item a,
                    .recipe-list a,
                    article a,
                    .entry-title a,
                    h2 a,
                    h3 a
                ');

                if ($recipeLinks->count() === 0) {
                    $this->info("No more recipes found on page $page");
                    break;
                }

                $pageUrls = $recipeLinks->each(function ($node) {
                    $href = $node->attr('href');
                    // Make sure it's a full URL
                    if (strpos($href, 'http') !== 0) {
                        $href = 'https://kulinariya.az' . $href;
                    }
                    return $href;
                });

                // Filter to only recipe URLs
                $pageUrls = array_filter($pageUrls, function($url) {
                    return strpos($url, '/recipe/') !== false;
                });

                $pageUrls = array_unique($pageUrls);

                foreach ($pageUrls as $url) {
                    if ($collected >= $limit) break;
                    $urls[] = $url;
                    $collected++;
                }

                if (count($pageUrls) === 0) {
                    $this->info("No recipe URLs found on page $page");
                    break;
                }

                $page++;

            } catch (\Exception $e) {
                $this->error("Error scraping page $page: " . $e->getMessage());
                break;
            }
        }

        return array_unique($urls);
    }

    private function scrapeRecipe(string $url): ?array
    {
        try {
            $html = Http::timeout(30)->get($url)->body();
            $crawler = new Crawler($html);

            // Debug: Log the page structure
            $this->info("🔍 Analyzing page structure for: $url");

            // Title - improved selectors
            $title = null;
            $titleSelectors = [
                'h1',
                'h2',
                'h3',
                '.recipe-title',
                '.entry-title',
                '.post-title',
                'title',
                '.page-title',
                '.main-title'
            ];

            foreach ($titleSelectors as $selector) {
                if ($crawler->filter($selector)->count() > 0) {
                    $candidateTitle = trim($crawler->filter($selector)->first()->text());
                    // Skip if title is too generic or contains unwanted text
                    if (!empty($candidateTitle) &&
                        !str_contains(strtolower($candidateTitle), 'kulinariya.az') &&
                        strlen($candidateTitle) > 5) {
                        $title = $candidateTitle;
                        $this->info("✓ Found title with selector '$selector': $title");
                        break;
                    }
                }
            }

            // Image
            $image = null;
            $imageSelectors = [
                'img[src*="recipe"]',
                'img[src*="food"]',
                '.recipe-img img',
                '.post-thumb img',
                '.recipe-image img',
                '.featured-image img',
                'article img',
                '.content img',
                '.post-content img',
                'img[alt*="recipe"]',
                'img'
            ];

            foreach ($imageSelectors as $selector) {
                if ($crawler->filter($selector)->count() > 0) {
                    $imgs = $crawler->filter($selector);
                    foreach ($imgs as $img) {
                        $src = $img->getAttribute('src');
                        if ($src && (strpos($src, 'http') === 0 || strpos($src, '/') === 0)) {
                            if (strpos($src, '/') === 0) {
                                $src = 'https://kulinariya.az' . $src;
                            }
                            // Skip small images (likely icons)
                            if (!str_contains($src, 'icon') && !str_contains($src, 'logo')) {
                                $image = $src;
                                $this->info("✓ Found image: $image");
                                break 2;
                            }
                        }
                    }
                }
            }

            // Ingredients - much broader search
            $ingredients = [];

            // First try structured selectors
            $ingredientSelectors = [
                '.recipe-ingredients li',
                '.ingredients li',
                '.ingredient-list li',
                '.recipe-ingredient',
                'ul li',
                '.list li'
            ];

            foreach ($ingredientSelectors as $selector) {
                if ($crawler->filter($selector)->count() > 0) {
                    $candidates = $crawler->filter($selector)->each(function($node) {
                        $text = trim($node->text());
                        // Filter ingredients: must contain numbers or cooking terms
                        if (preg_match('/\d+\s*(qr|ədəd|paket|dəstə|stəkan|qaşıq|ml|lt|kg)/ui', $text) ||
                            preg_match('/\b(un|şəkər|duz|yağ|süd|yumurta|vanil)\b/ui', $text)) {
                            return $text;
                        }
                        return null;
                    });
                    $candidates = array_filter($candidates);

                    if (!empty($candidates)) {
                        $ingredients = array_unique($candidates);
                        $this->info("✓ Found " . count($ingredients) . " ingredients with selector '$selector'");
                        break;
                    }
                }
            }

            // If no ingredients found, try a different approach - look for text patterns
            if (empty($ingredients)) {
                $allText = $crawler->filter('body')->text();
                // Split by common separators and look for ingredient-like patterns
                $lines = preg_split('/[\n\r]+/', $allText);
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (preg_match('/^\s*[•\-\*]?\s*(.+\d+\s*(qr|ədəd|paket|dəstə|stəkan|qaşıq|ml|lt|kg).*)/ui', $line, $matches) ||
                        preg_match('/^\s*[•\-\*]?\s*((un|şəkər|duz|yağ|süd|yumurta|vanil|bibər|soğan|sarımsaq|kərə|pendir).+)/ui', $line, $matches)) {
                        if (strlen($matches[1]) > 3 && strlen($matches[1]) < 100) {
                            $ingredients[] = trim($matches[1]);
                        }
                    }
                }
                $ingredients = array_unique($ingredients);
                if (!empty($ingredients)) {
                    $this->info("✓ Found " . count($ingredients) . " ingredients from text analysis");
                }
            }

            // Instructions - much broader search with better filtering
            $instructions = [];

            // Try structured selectors first
            $instructionSelectors = [
                '.recipe-instructions li',
                '.recipe-instructions p',
                '.instructions li',
                '.method li',
                '.recipe-method li',
                '.recipe-steps li',
                '.steps li',
                'ol li',
                '.directions li',
                '.preparation li',
                '.recipe-preparation li'
            ];

            foreach ($instructionSelectors as $selector) {
                if ($crawler->filter($selector)->count() > 0) {
                    $candidates = $crawler->filter($selector)->each(function($node) {
                        $text = trim($node->text());
                        // Filter out promotional/irrelevant text and generic video references
                        if (strlen($text) > 20 &&
                            !str_contains(strtolower($text), 'chef.az') &&
                            !str_contains(strtolower($text), 'saytı olaraq') &&
                            !str_contains(strtolower($text), 'kulinariya.az') &&
                            !str_contains(strtolower($text), 'vidyoda tam olaraq') &&
                            !str_contains(strtolower($text), 'videoda tam olaraq') &&
                            !str_contains(strtolower($text), 'hazirlama qaydasi gosderilib')) {
                            return $text;
                        }
                        return null;
                    });
                    $candidates = array_filter($candidates);

                    if (!empty($candidates)) {
                        $instructions = $candidates;
                        $this->info("✓ Found " . count($instructions) . " instructions with selector '$selector'");
                        break;
                    }
                }
            }

            // If no structured instructions, try paragraphs and analyze text
            if (empty($instructions)) {
                $contentSelectors = [
                    '.recipe-content p',
                    '.post-content p',
                    '.content p',
                    'article p',
                    '.description p',
                    '.entry-content p',
                    'p'
                ];

                foreach ($contentSelectors as $selector) {
                    if ($crawler->filter($selector)->count() > 0) {
                        $candidates = $crawler->filter($selector)->each(function($node) {
                            $text = trim($node->text());
                            // Look for instruction-like text with cooking verbs
                            if (strlen($text) > 30 &&
                                !str_contains(strtolower($text), 'chef.az') &&
                                !str_contains(strtolower($text), 'saytı olaraq') &&
                                !str_contains(strtolower($text), 'kulinariya.az') &&
                                !str_contains(strtolower($text), 'vidyoda tam olaraq') &&
                                !str_contains(strtolower($text), 'videoda tam olaraq') &&
                                !str_contains(strtolower($text), 'hazirlama qaydasi gosderilib') &&
                                (preg_match('/\b(qarışdır|əlavə et|qoy|al|hazırla|bişir|yox|çıxart|daxil et|doğray|çırp|tök|qızart|soy)/ui', $text) ||
                                    preg_match('/\b(mix|add|put|take|cook|bake|remove|place|chop|pour|fry|heat)/i', $text))) {
                                return $text;
                            }
                            return null;
                        });
                        $candidates = array_filter($candidates);

                        if (!empty($candidates)) {
                            $instructions = $candidates;
                            $this->info("✓ Found " . count($instructions) . " instructions from content analysis");
                            break;
                        }
                    }
                }
            }

            // Last resort: analyze all text for numbered instructions
            if (empty($instructions)) {
                $allText = $crawler->filter('body')->text();
                $lines = preg_split('/[\n\r]+/', $allText);
                foreach ($lines as $line) {
                    $line = trim($line);
                    // Look for numbered steps or instruction patterns
                    if (preg_match('/^\s*\d+[\.\)]\s*(.+)/u', $line, $matches) ||
                        preg_match('/^\s*[•\-\*]\s*(.+)/u', $line, $matches)) {
                        $text = trim($matches[1]);
                        if (strlen($text) > 20 &&
                            !str_contains(strtolower($text), 'chef.az') &&
                            !str_contains(strtolower($text), 'saytı olaraq') &&
                            !str_contains(strtolower($text), 'vidyoda tam olaraq') &&
                            !str_contains(strtolower($text), 'hazirlama qaydasi')) {
                            $instructions[] = $text;
                        }
                    }
                }
                if (!empty($instructions)) {
                    $this->info("✓ Found " . count($instructions) . " instructions from text pattern analysis");
                }
            }

            // Categories - smarter filtering to avoid menu links
            $categories = [];
            $categorySelectors = [
                '.recipe-category',
                '.post-category',
                '.recipe-tags',
                '.tags',
                '.category',
                // Try breadcrumb but filter better
                '.breadcrumb a'
            ];

            foreach ($categorySelectors as $selector) {
                if ($crawler->filter($selector)->count() > 0) {
                    $candidates = $crawler->filter($selector)->each(function($node) {
                        return trim($node->text());
                    });
                    // Remove common unwanted categories and main menu items
                    $candidates = array_filter($candidates, function($c) {
                        $lower = strtolower($c);
                        $unwanted = [
                            'əsas səhifə', 'home', 'ana səhifə', '', 'kulinariya.az', 'reseptlər', 'recipes',
                            'tortlar', 'fast food', 'pizza', 'dietik', 'suplar', 'salat', 'balıq', 'mal əti',
                            'sous', 'dəniz m', 'toyuqlar', 'içkilər', 'makaron', 'şirniyyat', 'çay',
                            'quru yemək', 'qoyun əti', 'desert', 'börək', 'çörək'
                        ];

                        return !in_array($lower, $unwanted) && strlen($c) > 2 && strlen($c) < 30;
                    });

                    if (!empty($candidates) && count($candidates) < 10) { // Avoid taking entire menu
                        $categories = array_values($candidates);
                        $this->info("✓ Found categories: " . implode(', ', $categories));
                        break;
                    }
                }
            }

            // If still getting too many categories, try to extract from URL or title
            if (empty($categories) || count($categories) > 10) {
                $categories = [];
                // Try to extract category from URL path
                $urlPath = parse_url($url, PHP_URL_PATH);
                if (preg_match('/\/category\/([^\/]+)/', $urlPath, $matches)) {
                    $categories[] = ucfirst(str_replace('-', ' ', $matches[1]));
                }

                // Try to extract from title
                if (!empty($title)) {
                    if (str_contains(strtolower($title), 'salat')) $categories[] = 'Salat';
                    if (str_contains(strtolower($title), 'börək')) $categories[] = 'Börək';
                    if (str_contains(strtolower($title), 'tort')) $categories[] = 'Tort';
                    if (str_contains(strtolower($title), 'çörək')) $categories[] = 'Çörək';
                    if (str_contains(strtolower($title), 'balıq')) $categories[] = 'Balıq';
                    if (str_contains(strtolower($title), 'dolma')) $categories[] = 'Dolma';
                }

                if (!empty($categories)) {
                    $this->info("✓ Extracted categories from URL/title: " . implode(', ', $categories));
                }
            }

            // Extract recipe details with improved regex and text analysis
            $allText = $crawler->filter('body')->text();

            // Better extraction for recipe details
            $servings = $this->extractDetailFromText($allText, ['nəfər', 'serves', 'portion', 'kişi']);
            $prepTime = $this->extractDetailFromText($allText, ['hazırlama vaxtı', 'prep time', 'hazırlama']);
            $cookTime = $this->extractDetailFromText($allText, ['bişmə vaxtı', 'cook time', 'pişirmə vaxtı', 'fırın']);
            $calories = $this->extractDetailFromText($allText, ['kalori', 'calories', 'kcal']);
            $difficulty = $this->extractDetailFromText($allText, ['çətinlik', 'difficulty', 'asan', 'orta', 'çətin']);

            // Log what we found
            $this->info("Recipe details - Servings: $servings, Prep: $prepTime, Cook: $cookTime, Calories: $calories, Difficulty: $difficulty");

            // Author
            $author = null;
            $authorSelectors = ['.author a', '.recipe-author', '.post-author', '.müəllif', '.by-author'];
            foreach ($authorSelectors as $selector) {
                if ($crawler->filter($selector)->count() > 0) {
                    $author = trim($crawler->filter($selector)->first()->text());
                    if (!empty($author)) {
                        $this->info("✓ Found author: $author");
                        break;
                    }
                }
            }

            return [
                'title' => $title,
                'slug' => basename(parse_url($url, PHP_URL_PATH)),
                'image' => $image,
                'ingredients' => array_values(array_unique($ingredients)),
                'instructions' => array_values(array_unique($instructions)),
                'categories' => array_values(array_unique($categories)),
                'author' => $author,
                'servings' => $servings,
                'prep_time' => $prepTime,
                'cook_time' => $cookTime,
                'calories' => $calories,
                'difficulty' => $difficulty,
                'source_url' => $url,
                'scraped_at' => now()->toISOString()
            ];

        } catch (\Exception $e) {
            $this->error("Error scraping recipe $url: " . $e->getMessage());
            return null;
        }
    }

    private function extractDetailFromText(string $text, array $keywords): ?string
    {
        foreach ($keywords as $keyword) {
            // Look for patterns like "Nəfər: 4", "4 Nəfər", "Hazırlama vaxtı: 30 dəqiqə"
            $patterns = [
                // Pattern 1: "Keyword: Value"
                '/(' . preg_quote($keyword, '/') . ')\s*:?\s*([0-9]+(?:\s*[-\s]\s*[0-9]+)?\s*[a-zA-ZəıöüçğşƏIÖÜÇĞŞ]*)/ui',
                // Pattern 2: "Value Keyword"
                '/([0-9]+(?:\s*[-\s]\s*[0-9]+)?\s*[a-zA-ZəıöüçğşƏIÖÜÇĞŞ]*)\s*(' . preg_quote($keyword, '/') . ')/ui',
                // Pattern 3: "Keyword: some text"
                '/(' . preg_quote($keyword, '/') . ')\s*[:\-–—]\s*([^,\n\r\.]{1,30})/ui'
            ];

            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $text, $matches)) {
                    // Return the captured value part
                    if (isset($matches[2]) && !empty($matches[2]) && $matches[2] !== $keyword) {
                        $value = trim($matches[2]);
                        // Clean up mixed content like "320 Çətinlik"
                        if (preg_match('/^(\d+)/', $value, $numberMatch)) {
                            // If it's for servings and we found a number
                            if (in_array($keyword, ['nəfər', 'serves', 'portion', 'kişi'])) {
                                return $numberMatch[1] . ' nəfər';
                            }
                            // If it's for calories and we found a number
                            if (in_array($keyword, ['kalori', 'calories', 'kcal'])) {
                                return $numberMatch[1] . ' kalori';
                            }
                            // If it's for time
                            if (in_array($keyword, ['hazırlama vaxtı', 'prep time', 'hazırlama', 'bişmə vaxtı', 'cook time', 'pişirmə vaxtı'])) {
                                // Look for time units
                                if (preg_match('/(\d+)\s*(dəqiqə|saat|saatlıq|dk|min|hour)/ui', $value, $timeMatch)) {
                                    return $timeMatch[1] . ' ' . strtolower($timeMatch[2]);
                                }
                                return $numberMatch[1] . ' dəqiqə';
                            }
                            // If it's for difficulty, extract the difficulty word
                            if (in_array($keyword, ['çətinlik', 'difficulty'])) {
                                if (preg_match('/(asan|orta|çətin|asandır|easy|medium|hard)/ui', $text, $diffMatch)) {
                                    return ucfirst(strtolower($diffMatch[1]));
                                }
                                return 'Orta';
                            }
                        }

                        // For difficulty, try to extract the actual difficulty level
                        if (in_array($keyword, ['çətinlik', 'difficulty']) &&
                            preg_match('/(asan|orta|çətin|asandır|easy|medium|hard)/ui', $value, $diffMatch)) {
                            return ucfirst(strtolower($diffMatch[1]));
                        }

                        return $value;
                    }
                    if (isset($matches[1]) && !empty($matches[1]) && $matches[1] !== $keyword) {
                        $value = trim($matches[1]);
                        // Clean up for numbers
                        if (preg_match('/^(\d+)/', $value, $numberMatch) &&
                            in_array($keyword, ['nəfər', 'serves', 'portion', 'kişi'])) {
                            return $numberMatch[1] . ' nəfər';
                        }
                        return $value;
                    }
                }
            }
        }
        return null;
    }

    private function extractRecipeDetail(Crawler $crawler, array $keywords, string $type): ?string
    {
        return $this->extractDetailFromText($crawler->filter('body')->text(), $keywords);
    }
}

// Also create a single recipe scraper command
class ScrapeRecipe extends Command
{
    protected $signature = 'app:scrape-recipe {url}';
    protected $description = 'Scrape a single recipe from kulinariya.az and save JSON';

    public function handle()
    {
        $url = $this->argument('url');
        $this->info("🔎 Scraping: $url");

        // Use the same improved logic as the bulk scraper
        $recipe = $this->scrapeRecipeImproved($url);

        if (!$recipe) {
            $this->error("❌ Failed to scrape recipe");
            return;
        }

        // Save single recipe
        Storage::disk('local')->put(
            'recipe.json',
            json_encode($recipe, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $this->info("✅ Recipe saved to storage/app/recipe.json");
    }

    private function scrapeRecipeImproved(string $url): ?array
    {
        // Use the same scrapeRecipe method from ScrapeAllRecipes
        $allRecipesScraper = new ScrapeAllRecipes();
        return $allRecipesScraper->scrapeRecipe($url);
    }
}
