<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_files')->insert([
            [
                'id' => 1,
                'name' => 'xSLwnw1y7ISwFuck2hV1oDOP1e0ilsQZW0awM02u.mp4',
                'path' => 'page-images/1/xSLwnw1y7ISwFuck2hV1oDOP1e0ilsQZW0awM02u.mp4',
                'ref_id' => 1,
                'ref_point' => 'section_one_background',
                'alt_text' => 'Mamo',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-08 06:52:24'),
                'deleted_at' => null
            ],
            [
                'id' => 2,
                'name' => '5ad56pnw74SOSSevOTcuMm6JVeiqgh11kLNOEw8E.jpg',
                'path' => 'page-images/1/5ad56pnw74SOSSevOTcuMm6JVeiqgh11kLNOEw8E.jpg',
                'ref_id' => 1,
                'ref_point' => 'section_four_background',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 02:21:50'),
                'deleted_at' => null
            ],
            [
                'id' => 3,
                'name' => 'lty934Ocwut0urXv9jLrpg9XKjwWRkw7lTvpFxWr.png',
                'path' => 'page-images/1/lty934Ocwut0urXv9jLrpg9XKjwWRkw7lTvpFxWr.png',
                'ref_id' => 1,
                'ref_point' => 'section_fifth_background',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:15:40'),
                'deleted_at' => null
            ],
            [
                'id' => 4,
                'name' => 'Xf4CRaJ3q4DQ5dcGc8z8qH5dCEWDIJj2zfQzcO1m.mp4',
                'path' => 'page-images/2/Xf4CRaJ3q4DQ5dcGc8z8qH5dCEWDIJj2zfQzcO1m.mp4',
                'ref_id' => 2,
                'ref_point' => 'section_two_background',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:41:28'),
                'deleted_at' => null
            ],
            [
                'id' => 5,
                'name' => 'xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'path' => 'page-images/2/xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'ref_id' => 2,
                'ref_point' => 'section_three_background',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:55:28'),
                'deleted_at' => null
            ],
            [
                'id' => 6,
                'name' => 'xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'path' => 'page-images/2/xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'ref_id' => 2,
                'ref_point' => 'section_fourth_img',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:55:28'),
                'deleted_at' => null
            ],
            [
                'id' => 7,
                'name' => 'xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'path' => 'page-images/2/xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'ref_id' => 2,
                'ref_point' => 'section_seventh_img',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:55:28'),
                'deleted_at' => null
            ],
            [
                'id' => 8,
                'name' => 'xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'path' => 'page-images/2/xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'ref_id' => 4,
                'ref_point' => 'section_two_img',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:55:28'),
                'deleted_at' => null
            ],
            [
                'id' => 9,
                'name' => 'xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'path' => 'page-images/2/xbHUkmVXPOJRrzOFEfokMcVjzFWBU5g4WvTaeGUN.png',
                'ref_id' => 5,
                'ref_point' => 'section_two_img',
                'alt_text' => 'Tanama',
                'created_at' => Carbon::parse('2025-09-08 10:56:26'),
                'updated_at' => Carbon::parse('2025-09-09 04:55:28'),
                'deleted_at' => null
            ]
        ]);
    }
}
