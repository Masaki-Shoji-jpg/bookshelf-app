<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::limit(5)->pluck('id')->toArray();
        $bookIds = Book::limit(11)->pluck('id')->toArray();

        // 11冊に対するレビュー件数の配分（合計32件：すべて2〜4件の範囲）
        $countsPerBook = array(4, 3, 3, 3, 3, 3, 3, 3, 3, 2, 2);

        // 評価に応じた具体的なコメント候補
        $commentsByRating = [
            5 => [
                '実務でそのまま使える知識ばかりで、手元に置いて何度も読み返したい一冊です。',
                '図解がとてもわかりやすく、初心者でもつまずくことなく最後まで理解できました。',
                'これまで曖昧だった概念がスッキリ整理されました。迷っているなら間違いなくおすすめです。',
                '構成が丁寧で読みやすく、週末に一気に読み終えてしまいました。買って大満足です。',
            ],
            4 => [
                '全体的に内容が充実しており参考になりました。後半の応用編ももう少しボリュームがあると嬉しいです。',
                '基礎からしっかり学べる良書です。サンプルコードを実際に動かしながら読むと理解が深まります。',
                '専門用語の解説が噛み砕かれていて読みやすかったです。復習用としても役立ちそうです。',
                '実践的なケーススタディが多く、自分の業務に置き換えて考えるきっかけになりました。',
            ],
            3 => [
                '基本的な内容は網羅されていますが、すでにある程度知識がある人には少し物足りないかもしれません。',
                '悪くはないですが、一部説明が駆け足に感じる箇所がありました。入門書としては十分です。',
                '必要な情報は一通り載っていますが、もう少し具体的な例が多いとさらに良かったです。',
                '可もなく不可もなくといった印象です。辞書的に手元に置いておく分には便利だと思います。',
            ],
        ];

        $userOffset = 0;

        foreach ($bookIds as $index => $bookId) {
            $reviewCount = $countsPerBook[$index];

            for ($i = 0; $i < $reviewCount; $i++) {
                // 同じ書籍に対して異なるユーザーが投稿するよう順番に割り当て
                $userId = $userIds[($userOffset + $i) % count($userIds)];
                $rating = rand(3, 5);
                $commentList = $commentsByRating[$rating];

                Review::create([
                    'user_id' => $userId,
                    'book_id' => $bookId,
                    'rating'  => $rating,
                    'comment' => $commentList[array_rand($commentList)],
                ]);
            }

            $userOffset++;
        }
    }
}
