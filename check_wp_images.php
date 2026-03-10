<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Post;

$imageCount = Post::where('image', 'like', 'wp-content/uploads/%')->count();
echo "Posts with image starting with wp-content/uploads/: $imageCount\n";

$contentCount = Post::where('content', 'like', '%wp-content/uploads/%')->count();
echo "Posts with content containing wp-content/uploads/: $contentCount\n";

$post = Post::where('content', 'like', '%wp-content/uploads/%')->first();
if ($post) {
    echo "Example content snippet:\n";
    echo substr(strip_tags($post->content), 0, 200) . "\n...\n";
    
    // Extract first image URL
    preg_match('/src="([^"]+wp-content\/uploads\/[^"]+)"/', $post->content, $matches);
    if (!empty($matches)) {
        echo "Found URL in content: " . $matches[1] . "\n";
    }
}
