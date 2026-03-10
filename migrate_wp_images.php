<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

function downloadImage($url, $path) {
    if (Storage::disk('public')->exists($path)) {
        return true; // Already downloaded
    }

    try {
        $response = Http::timeout(10)->get($url);
        if ($response->successful()) {
            Storage::disk('public')->put($path, $response->body());
            return true;
        }
    } catch (\Exception $e) {
        echo "Failed to download $url : " . $e->getMessage() . "\n";
    }
    return false;
}

$baseUrl = 'https://mansalotim.sch.id/';

// 1. Process featured images (image column)
echo "Processing featured images...\n";
$postsWithImage = Post::whereNotNull('image')->where('image', 'like', 'wp-content/uploads/%')->get();
$downloadCount = 0;
foreach ($postsWithImage as $post) {
    $path = $post->image;
    $url = $baseUrl . $path;
    if (downloadImage($url, $path)) {
        $downloadCount++;
    }
}
echo "Finished downloading featured images. Total: $downloadCount\n\n";

// 2. Process images inside content
echo "Processing content images...\n";
$postsWithContentImages = Post::where('content', 'like', '%wp-content/uploads/%')->get();
$contentImageCount = 0;
$updatedPostsCount = 0;

foreach ($postsWithContentImages as $post) {
    $originalContent = $post->content;
    $newContent = $post->content;
    
    // Find all images in content matching wp-content/uploads
    preg_match_all('/src="([^"]+wp-content\/uploads\/([^"]+))"/', $originalContent, $matches);
    
    if (!empty($matches[0])) {
        foreach ($matches[1] as $index => $fullUrl) {
            $relativePath = 'wp-content/uploads/' . $matches[2][$index];
            $urlToDownload = $fullUrl;
            
            // If it's a relative URL in the content, prepend the base URL for downloading
            if (!str_starts_with($urlToDownload, 'http')) {
                if (str_starts_with($urlToDownload, '/')) {
                    $urlToDownload = 'https://mansalotim.sch.id' . $urlToDownload;
                } else {
                    $urlToDownload = 'https://mansalotim.sch.id/' . $urlToDownload;
                }
            }
            
            if (downloadImage($urlToDownload, $relativePath)) {
                $contentImageCount++;
                // Replace the URL in the content with the new local storage path
                $newLocalUrl = asset('storage/' . $relativePath);
                $newContent = str_replace($fullUrl, "/storage/$relativePath", $newContent);
            }
        }
    }
    
    if ($originalContent !== $newContent) {
        $post->update(['content' => $newContent]);
        $updatedPostsCount++;
    }
}

echo "Finished processing content images. Downloaded: $contentImageCount. Updated Posts: $updatedPostsCount\n";
