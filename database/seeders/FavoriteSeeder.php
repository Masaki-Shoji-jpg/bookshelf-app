<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $bookIds = Book::pluck('id');

        foreach ($users as $user) {
            $count = min(rand(3, 5), $bookIds->count());
            $selectedBookIds = $bookIds->random($count)->toArray();
            $user->favoriteBooks()->syncWithoutDetaching($selectedBookIds);
        }
    }
}
