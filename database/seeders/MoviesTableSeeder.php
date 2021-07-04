<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::truncate();
        Movie::insert([
            [
                'name' => 'ใครสั่งเก็บตาย',
                'poster' => 'movie01.jpg',
                'is_showing_now' => true,
                'showing_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'ดินเเดนไร้เสียง',
                'poster' => 'movie02.jpg',
                'is_showing_now' => true,
                'showing_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'เดือดกู้ภัยพิทักษ์โลก',
                'poster' => 'movie03.jpg',
                'is_showing_now' => true,
                'showing_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'มหาสงครามชิงพิภพ',
                'poster' => 'movie04.jpg',
                'is_showing_now' => true,
                'showing_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'คนเรียกผี 2',
                'poster' => 'movie05.jpg',
                'is_showing_now' => true,
                'showing_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'ซอบก ยอดมนุษย์อมตะ',
                'poster' => 'movie06.jpg',
                'is_showing_now' => true,
                'showing_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
