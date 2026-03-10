<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Str;

class MigrateWpData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:wp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate data from WordPress database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting WordPress data migration...');

        // Map wp_posts to posts
        $this->migratePosts();

        $this->info('WordPress data migration completed.');
    }

    private function migratePosts()
    {
        $this->info('Migrating posts...');
        $wpPosts = DB::connection('mysql_wp')
            ->table('wp_posts')
            ->where('post_type', 'post')
            ->where('post_status', 'publish')
            ->get();

        $count = 0;
        foreach ($wpPosts as $wpPost) {
            // Find category
            $categoryName = null;
            $termRel = DB::connection('mysql_wp')
                ->table('wp_term_relationships')
                ->join('wp_term_taxonomy', 'wp_term_relationships.term_taxonomy_id', '=', 'wp_term_taxonomy.term_taxonomy_id')
                ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
                ->where('wp_term_relationships.object_id', $wpPost->ID)
                ->where('wp_term_taxonomy.taxonomy', 'category')
                ->first();

            if ($termRel) {
                $categoryName = $termRel->name;
            }

            // Find featured image
            $imagePath = null;
            $thumbnailRel = DB::connection('mysql_wp')
                ->table('wp_postmeta')
                ->where('post_id', $wpPost->ID)
                ->where('meta_key', '_thumbnail_id')
                ->first();

            if ($thumbnailRel) {
                $attachment = DB::connection('mysql_wp')
                    ->table('wp_posts')
                    ->where('ID', $thumbnailRel->meta_value)
                    ->where('post_type', 'attachment')
                    ->first();
                if ($attachment) {
                    $attachmentMeta = DB::connection('mysql_wp')
                        ->table('wp_postmeta')
                        ->where('post_id', $attachment->ID)
                        ->where('meta_key', '_wp_attached_file')
                        ->first();
                    if ($attachmentMeta) {
                        $imagePath = 'wp-content/uploads/' . $attachmentMeta->meta_value;
                    }
                }
            }

            $slug = $wpPost->post_name;
            if (empty($slug)) {
                $slug = Str::slug($wpPost->post_title);
            }

            // Ensure unique slug
            if (Post::where('slug', $slug)->exists()) {
                $slug = $slug . '-' . $wpPost->ID;
            }

            Post::create([
                'title' => $wpPost->post_title,
                'slug' => $slug,
                'content' => $wpPost->post_content,
                'excerpt' => $wpPost->post_excerpt ?: Str::limit(strip_tags($wpPost->post_content), 150),
                'category' => $categoryName,
                'image' => $imagePath,
                'is_published' => true,
                'created_at' => $wpPost->post_date,
                'updated_at' => $wpPost->post_modified,
            ]);

            $count++;
        }

        $this->info("Migrated $count posts.");
    }
}
