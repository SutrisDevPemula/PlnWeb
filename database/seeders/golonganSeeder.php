<?php

namespace Database\Seeders;

use App\Models\categori;
use Illuminate\Database\Seeder;

class golonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        categori::insert([
            'category' => 'Media',
            'description' => 'informasi media kami',
            // 'created_at' => '',
            // 'updated_at' => ''
        ]);
    }
}
