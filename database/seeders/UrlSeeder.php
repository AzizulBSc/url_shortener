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
                'original_url' => 'https://www.youtube.com/watch?v=ENVBeAhNz1c&list=RD_WyBG_BRRnQ&index=13&ab_channel=SonyMusicIndia',
                'short_url' => Str::random(5),
                'created_at' => now(),
            ],
        ]);
    }
}
