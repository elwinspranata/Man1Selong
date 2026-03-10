<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

// Count how many featured images exist on disk
$postsWithImage = Post::whereNotNull('image')->get();
$found = 0;
$missing = 0;
$missingList = [];

foreach ($postsWithImage as $post) {
    if (Storage::disk('public')->exists($post->image)) {
        $found++;
    } else {
        $missing++;
        if ($missing <= 10) {
            $missingList[] = $post->image;
        }
    }
}

echo "=== Featured Image Verification ===\n";
echo "Found on disk: $found\n";
echo "Missing: $missing\n";
if (!empty($missingList)) {
    echo "First missing images:\n";
    foreach ($missingList as $path) {
        echo "  - $path\n";
    }
}

// Count total wp-content files downloaded
$wpDir = 'wp-content/uploads';
if (Storage::disk('public')->exists($wpDir)) {
    $allFiles = Storage::disk('public')->allFiles($wpDir);
    echo "\nTotal files in storage/wp-content/uploads/: " . count($allFiles) . "\n";
} else {
    echo "\nDirectory wp-content/uploads/ does not exist in storage.\n";
}

// Check total post count and how many have images
$totalPosts = Post::count();
$postsWithImages = Post::whereNotNull('image')->where('image', '!=', '')->count();
echo "\nTotal posts: $totalPosts\n";
echo "Posts with image field set: $postsWithImages\n";
