<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'Belajar Laravel API',
            'content' => 'Ini adalah konten pertama untuk belajar CRUD Laravel API'
        ]);

        Post::create([
            'title' => 'Flutter Connect API',
            'content' => 'Menghubungkan Flutter dengan Laravel menggunakan HTTP request'
        ]);

        Post::create([
            'title' => 'Fullstack Developer',
            'content' => 'Belajar menjadi fullstack developer dengan Laravel dan Flutter'
        ]);
    }
}
