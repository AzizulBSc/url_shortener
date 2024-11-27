<?php

namespace Database\Seeders;

use App\Models\Url;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('urls')->delete();
        DB::table('urls')->insert([
            [
                'user_id' => 1,
                'original_url' => 'https://www.aljazeera.com/program/newsfeed/2024/1/17/al-jazeeras-gaza-bureau-chief-lands-in-qatar-for-treatment',
                'short_url' => Str::random(5),
                'created_at' => now(),

            ],
            [
                'user_id' => 1,
                'original_url' => 'https://www.aljazeera.com/program/newsfeed/2024/1/16/israels-war-on-gaza-is-the-deadliest-for-journalists',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'original_url' => 'https://www.aljazeera.com/program/newsfeed/2024/1/17/al-jazeeras-gaza-bureau-chief-lands-in-qatar-for-treatment',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'original_url' => 'https://www.aljazeera.com/program/newsfeed/2024/1/16/israels-war-on-gaza-is-the-deadliest-for-journalists',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ], [
                'user_id' => 2,
                'original_url' => 'https://www.aljazeera.com/program/newsfeed/2024/1/17/al-jazeeras-gaza-bureau-chief-lands-in-qatar-for-treatment',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'original_url' => 'https://www.aljazeera.com/program/newsfeed/2024/1/16/israels-war-on-gaza-is-the-deadliest-for-journalists',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'original_url' => 'https://www.youtube.com/watch?v=75bH_QBhnNY&ab_channel=AshrafiTv24',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'original_url' => 'https://www.youtube.com/watch?v=NIiy1y0S6zc&ab_channel=%E0%A6%93%E0%A6%B2%E0%A6%BE%E0%A6%AE%E0%A6%BE%E0%A6%AD%E0%A6%AF%E0%A6%BC%E0%A7%87%E0%A6%B8%E0%A6%9F%E0%A6%BF%E0%A6%AD%E0%A6%BFOlamaVoiceTv',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
        ]);
    }
}
