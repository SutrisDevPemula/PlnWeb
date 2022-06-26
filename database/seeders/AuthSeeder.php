<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = new \App\Models\AuthModel;
        $users->username = "admin";
        $users->email = "admin@gmail.com";
        $users->password = Hash::make('admin123');
        $users->phone = "085338994864";
        // $users->phone = "085338994864";

        $users->save();

        $this->command->info('User default berhasil diinput');
    }
}
