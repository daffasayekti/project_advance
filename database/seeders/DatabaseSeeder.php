<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\todoApps;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        todoApps::create([
            'title'       => 'Belajar Bahasa Pemrograman HTML',
            'description' => 'Materi HTML 5',
            'assigned'    => 'Daffa Pratama A.S'
        ]);

        todoApps::create([
            'title'       => 'Belajar Bahasa Pemrograman CSS',
            'description' => 'Materi Layouting',
            'assigned'    => 'Daffa Pratama A.S'
        ]);

        User::create([
            'name'     => 'Daffa Pratama Agung Sayekti',
            'email'    => 'daffasayekti246@gmail.com',
            'password' => bcrypt('sayadaffa246')
        ]);

        User::create([
            'name'     => 'Eka Prasetya',
            'email'    => 'ekaguntur550@gmail.com',
            'password' => bcrypt('sayaeka550')
        ]);
    }
}
