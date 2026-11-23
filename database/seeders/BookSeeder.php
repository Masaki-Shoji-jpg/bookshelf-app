<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
class BookSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $genres = \App\Models\Genre::pluck('id', 'name');

        $book = Book::firstOrCreate(
            ['isbn' => '9784101010014'],
            [
                'user_id' => $user->id,
                'title' => '吾輩は猫である',
                'author' => '夏目漱石',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=1',
                'published_date' => '1905-01-01',
                'description' => '名前のない一匹のねこが、ちょっと変な英語の先生の家に住み着いて、人間たちの面白くておかしい毎日をじっと観察するお話です。',
            ]
        );
        $book->genres()->sync([$genres['小説']]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784422100524'],
            [
                'user_id' => $user->id,
                'title' => '人を動かす',
                'author' => 'D・カーネギー',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=2',
                'published_date' => '1936-10-01',
                'description' => 'どうすれば友だちや周りの人と仲良くなれて、みんなで楽しく協力し合えるのかを教えてくれる、世界中で読まれている人づきあいのルールブック',
            ]
        );
        $book->genres()->sync([$genres['ビジネス'],$genres['自己啓発'],]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784873115658'],
            [
                'user_id' => $user->id,
                'title' => 'リーダブルコード',
                'author' => 'Dustin Boswell',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=3',
                'published_date' => '2012-06-23',
                'description' => 'コンピューターを動かすためのプログラムを、あとから他の人が読んでもパッと見てすぐに理解できるように、わかりやすくきれいに書くための工夫のアイデア集',
            ]
        );
        $book->genres()->sync([$genres['技術書']]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784863940246'],
            [
                'user_id' => $user->id,
                'title' => '7つの習慣',
                'author' => 'スティーブン・R・コヴィー',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=4',
                'published_date' => '2013-08-30',
                'description' => '自分の考え方や行動を少しずつ変えることで、勉強や仕事で成果を出しながら、周りの人とも良い関係を築いていく方法をまとめた本',
            ]
        );
        $book->genres()->sync([$genres['ビジネス'],$genres['自己啓発'],]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784101010021'],
            [
                'user_id' => $user->id,
                'title' => '坊っちゃん',
                'author' => '夏目漱石',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=5',
                'published_date' => '1906-04-01',
                'description' => '正義感が強くてまっすぐな性格の主人公が、赴任先の中学校で出会う個性豊かな同僚や生徒たちとぶつかり合いながら奮闘する物語',
            ]
        );
        $book->genres()->sync([$genres['小説']]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784309226712'],
            [
                'user_id' => $user->id,
                'title' => 'サピエンス全史',
                'author' => 'ユヴァル・ノア・ハラリ',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=6',
                'published_date' => '2016-09-08',
                'description' => 'かつては他の動物と変わらなかった人類（ホモ・サピエンス）が、なぜ地球の頂点に立ち、現代のような高度な社会を築くことができたのかを解き明かす歴史書
                ',
            ]
        );
        $book->genres()->sync([$genres['歴史'],$genres['科学'],]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784048930598'],
            [
                'user_id' => $user->id,
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=7',
                'published_date' => '2017-12-18',
                'description' => '動けばいいだけのプログラムではなく、あとから直したり機能を追加したりしやすい、整理整頓された美しいコードを書くための考え方とルールをまとめた本',
            ]
        );
        $book->genres()->sync([$genres['技術書']]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784478025819'],
            [
                'user_id' => $user->id,
                'title' => '嫌われる勇気',
                'author' => '岸見一郎・古賀史健',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=8',
                'published_date' => '2013-12-13',
                'description' => '周りの人の目や評価を気にしすぎず、自分の人生を自分の意思で自由に選んで幸せに生きるための考え方を、対話形式で学べる本',
            ]
        );
        $book->genres()->sync([$genres['自己啓発']]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784163902302'],
            [
                'user_id' => $user->id,
                'title' => '火花 ',
                'author' => '又吉直樹',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=10',
                'published_date' => '2015-03-11',
                'description' => '売れないお笑い芸人の主人公が、天才的な才能と独特なこだわりを持つ先輩芸人と出会い、笑いとは何かを追い求めながら葛藤し成長していく青春小説',
            ]
        );
        $book->genres()->sync([$genres['小説'],]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784822289607'],
            [
                'user_id' => $user->id,
                'title' => 'FACTFULNESS',
                'author' => 'ハンス・ロスリング',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=10',
                'published_date' => '2019-01-11',
                'description' => '思い込みや感情に振り回されず、正しいデータや事実（ファクト）をもとに世界の本当の姿を冷静に見極めるための思考法を教えてくれる本',
            ]
        );
        $book->genres()->sync([$genres['ビジネス'],$genres['科学'],]);

        $book = Book::firstOrCreate(
            ['isbn' => '9784822251468'],
            [
                'user_id' => $user->id,
                'title' => 'コンテナ物語',
                'author' => 'マルク・レビンソン',
                'image_url' => 'https://placehold.co/200x300/e2e8f0/475569?text=11',
                'published_date' => '2007-01-18',
                'description' => 'ただの鉄の箱である「輸送用コンテナ」の誕生と普及が、世界中のモノの運び方を劇的に変え、現代のグローバル経済を作り上げた歴史を描いたノンフィクション',
            ]
        );
        $book->genres()->sync([$genres['ビジネス'],$genres['歴史'],]);
    }
}
