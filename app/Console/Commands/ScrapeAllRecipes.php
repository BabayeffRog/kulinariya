<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeAllRecipes extends Command
{
    protected $signature = 'app:debug-scraper';
    protected $description = 'Debug kulinariya.az structure';

    public function handle()
    {
        $this->info("🔍 Debugging kulinariya.az structure...");

        // Test different URLs
        $urls = [
            'https://kulinariya.az/recipes',
            'https://kulinariya.az/recipes/index/20',
            'https://kulinariya.az',
            'https://kulinariya.az/recipe'
        ];

        foreach ($urls as $url) {
            $this->info("\n📍 Testing URL: $url");
            $this->testUrl($url);
        }
    }

    private function testUrl($url)
    {
        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Language' => 'az,en-US;q=0.7,en;q=0.3',
                    'Accept-Encoding' => 'gzip, deflate',
                    'Connection' => 'keep-alive',
                    'Upgrade-Insecure-Requests' => '1',
                ])
                ->get($url);

            $this->info("Status: " . $response->status());

            if ($response->status() !== 200) {
                $this->error("❌ Non-200 status code");
                return;
            }

            $html = $response->body();
            $this->info("Content length: " . strlen($html));

            if (strlen($html) < 100) {
                $this->warn("⚠️ Very short content, might be blocked");
                $this->info("Raw content: " . substr($html, 0, 200));
                return;
            }

            $crawler = new Crawler($html);

            // Check page title
            $title = $crawler->filter('title')->count() > 0 ? $crawler->filter('title')->text() : 'No title';
            $this->info("Page title: $title");

            // Check for different possible selectors
            $selectors = [
                'a[href*="/recipe"]' => 'Recipe links',
                'a[href*="recipe"]' => 'Recipe links (broad)',
                '.recipe' => 'Recipe class',
                '.post' => 'Post class',
                '.item' => 'Item class',
                'article' => 'Article tags',
                '.card' => 'Card class',
                '.content' => 'Content class',
                'main' => 'Main tag',
                '.container' => 'Container class',
                '.row' => 'Row class',
                '.col' => 'Column classes',
                'h1, h2, h3' => 'Headings',
                'img' => 'Images'
            ];

            foreach ($selectors as $selector => $description) {
                $count = $crawler->filter($selector)->count();
                if ($count > 0) {
                    $this->info("✓ $description: $count found");

                    // Show first few examples if it's links
                    if (str_contains($selector, 'href')) {
                        $examples = $crawler->filter($selector)->each(function($node) {
                            return $node->attr('href');
                        });
                        $this->info("  Examples: " . implode(', ', array_slice($examples, 0, 3)));
                    }
                }
            }

            // Save raw HTML for manual inspection
            $filename = 'debug_' . str_replace(['https://', '/', ':', '?'], ['', '_', '_', '_'], $url) . '.html';
            Storage::disk('local')->put($filename, $html);
            $this->info("💾 Raw HTML saved to storage/app/$filename");

            // Look for pagination patterns
            $this->checkPagination($crawler);

        } catch (\Exception $e) {
            $this->error("❌ Error: " . $e->getMessage());
        }
    }

    private function checkPagination(Crawler $crawler)
    {
        $paginationSelectors = [
            '.pagination',
            '.pager',
            '.page-numbers',
            'nav[aria-label*="navigation"]',
            'a[href*="page"]',
            'a[href*="index"]',
            '.next',
            '.prev',
            '.load-more'
        ];

        $this->info("\n🔢 Checking pagination:");
        foreach ($paginationSelectors as $selector) {
            $count = $crawler->filter($selector)->count();
            if ($count > 0) {
                $this->info("✓ $selector: $count found");

                if (str_contains($selector, 'href')) {
                    $examples = $crawler->filter($selector)->each(function($node) {
                        return $node->attr('href');
                    });
                    $this->info("  Examples: " . implode(', ', array_slice($examples, 0, 3)));
                }
            }
        }
    }
}
