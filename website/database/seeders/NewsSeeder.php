<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => 'Crypto crash',
            'cover_img' => '',
            'content' => '2022 was the year crypto came crashing down to Earth',
            'publishing_date' => (new DateTime()),
            'user_id' => '1'
        ]);
        DB::table('news')->insert([
        'title' => 'Laravel Secrets Exposed! Here’s the Juicy Details',
            'cover_img' => '',
            'content' => 'Lorem ipsum',
            'publishing_date' => (new DateTime()),
            'user_id' => '1'
        ]);
    }
}
