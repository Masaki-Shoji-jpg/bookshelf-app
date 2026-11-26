<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
class ReviewLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = Review::all();
        $userIds = User::pluck('id');

        if ($reviews->isEmpty() || $userIds->isEmpty()) {
            return;
        }

        foreach ($reviews as $review) {
            // 0〜3人のランダムな人数を決定
            $likeCount = rand(0, 3);

            if ($likeCount === 0) {
                continue;
            }

            // レビュー投稿者本人のIDを除外したユーザーID一覧を作成
            $otherUserIds = $userIds->reject(function ($id) use ($review) {
                return $id === $review->user_id;
            });

            if ($otherUserIds->isEmpty()) {
                continue;
            }

            // 除外後のユーザーからランダムに抽出（人数が足りない場合は最大数まで）
            $actualCount = min($likeCount, $otherUserIds->count());
            $selectedUserIds = $otherUserIds->random($actualCount)->toArray();

            // 既存のいいねを削除せずに紐付け（重複登録も防止）
            $review->likedByUsers()->syncWithoutDetaching($selectedUserIds);
        }
    }
}
