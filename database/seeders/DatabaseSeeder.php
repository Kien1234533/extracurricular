<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('extracurriculars')->insert([
            'name' => 'Bóng đá',
            'description' =>'Trò chơi đồng đội',
            'photo' => 'bongda.png',
        ]);
        DB::table('extracurriculars')->insert([
            'name' => 'Bóng rổ',
            'description' =>'Trò chơi đồng đội',
            'photo' => 'bongro.png',
        ]);
        DB::table('extracurriculars')->insert([
            'name' => 'Bóng chuyền',
            'description' =>'Trò chơi đồng đội',
            'photo' => 'bongchuyen.png',
        ]);
        DB::table('extracurriculars')->insert([
            'name' => 'Bóng bàn',
            'description' =>'Trò chơi 1-1',
            'photo' => 'bongban.png',
        ]);
        DB::table('extracurriculars')->insert([
            'name' => 'Cầu lông',
            'description' =>'Trò chơi 1-1',
            'photo' => 'caulong.png',
        ]);
    }
}
