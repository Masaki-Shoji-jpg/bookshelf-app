<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::firstOrcreate(['name' => '小説']);
        Genre::firstOrcreate(['name' => 'ビジネス']);
        Genre::firstOrcreate(['name' => '技術書']);
        Genre::firstOrcreate(['name' => '自己啓発']);
        Genre::firstOrcreate(['name' => 'エッセイ']);
        Genre::firstOrcreate(['name' => '歴史']);
        Genre::firstOrcreate(['name' => '科学']);
        Genre::firstOrcreate(['name' => '芸術']);
        Genre::firstOrcreate(['name' => '料理']);
        Genre::firstOrcreate(['name' => '旅行']);
    }
}
