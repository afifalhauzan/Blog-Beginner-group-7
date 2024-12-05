<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Get the Technology category ID
        $categoryId = Category::where('name', 'Technology')->first()->id;
        
        // Get user IDs
        $userIds = User::pluck('id')->toArray();

        // Define hardcoded articles
        $articles = [
            [
                'title' => 'The Future of AI in Technology',
                'full_text' => 'This article discusses the future of Artificial Intelligence and its impact on technology...',
                'image' => 'https://via.placeholder.com/150?text=AI', // Placeholder image for AI
                'user_id' => $userIds[array_rand($userIds)], // Random user
                'category_id' => $categoryId, // Technology category
            ],
            [
                'title' => 'Blockchain: Revolutionizing Security',
                'full_text' => 'Blockchain technology is revolutionizing the way we think about security...',
                'image' => 'https://via.placeholder.com/150?text=Blockchain', // Placeholder image for Blockchain
                'user_id' => $userIds[array_rand($userIds)], // Random user
                'category_id' => $categoryId, // Technology category
            ],
            [
                'title' => 'The Impact of 5G on the Tech Industry',
                'full_text' => 'With 5G technology on the rise, the tech industry is set for major changes...',
                'image' => 'https://via.placeholder.com/150?text=5G', // Placeholder image for 5G
                'user_id' => $userIds[array_rand($userIds)], // Random user
                'category_id' => $categoryId, // Technology category
            ],
            [
                'title' => 'Virtual Reality: A New Era of Gaming',
                'full_text' => 'Virtual Reality is pushing the boundaries of immersive experiences in gaming...',
                'image' => 'https://via.placeholder.com/150?text=VR', // Placeholder image for VR
                'user_id' => $userIds[array_rand($userIds)], // Random user
                'category_id' => $categoryId, // Technology category
            ]
        ];

        // Create articles and assign tags
        foreach ($articles as $articleData) {
            $article = Article::create($articleData);
            
            // Assign random tags to each article (2 tags per article)
            $tagIds = Tag::pluck('id')->toArray(); // Get all tag IDs
            $randomTags = array_rand(array_flip($tagIds), 2); // Pick 2 random tags for each article
            foreach ((array) $randomTags as $tagId) {
                $article->tags()->attach($tagId);
            }
        }
    }
}