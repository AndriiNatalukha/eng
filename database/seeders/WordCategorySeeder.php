<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('word_categories')->insert([
            ['name' => 'їжа'],
            ['name' => 'мебель'],
            ['name' => 'напої'],
            ['name' => '100 іменників для початківців'],

        ]);
    }
}
