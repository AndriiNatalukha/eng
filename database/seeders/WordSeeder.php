<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            ['english_word' => 'apple', 'ukrainian_word' => 'яблуко', 'transcription' => 'jabluko', 'audio_url' => ''],
            ['english_word' => 'bacon', 'ukrainian_word' => 'бекон', 'transcription' => 'bekon', 'audio_url' => ''],
            ['english_word' => 'baguette', 'ukrainian_word' => 'багет', 'transcription' => 'bahet', 'audio_url' => ''],
            ['english_word' => 'baked', 'ukrainian_word' => 'печений', 'transcription' => 'pechennyy', 'audio_url' => ''],
            ['english_word' => 'banana', 'ukrainian_word' => 'банан', 'transcription' => 'banan', 'audio_url' => ''],
            ['english_word' => 'bar', 'ukrainian_word' => 'бар', 'transcription' => 'bar', 'audio_url' => ''],
            ['english_word' => 'barbecue', 'ukrainian_word' => 'барбекю', 'transcription' => 'barbekyu', 'audio_url' => ''],
            ['english_word' => 'bean', 'ukrainian_word' => 'фасоль', 'transcription' => 'fasol', 'audio_url' => ''],
            ['english_word' => 'biscuit', 'ukrainian_word' => 'печиво', 'transcription' => 'pechivo', 'audio_url' => ''],
            ['english_word' => 'bite', 'ukrainian_word' => 'кусати', 'transcription' => 'kusaty', 'audio_url' => ''],
            ['english_word' => 'bitter', 'ukrainian_word' => 'гіркий', 'transcription' => 'hirkyy', 'audio_url' => ''],
            ['english_word' => 'cake', 'ukrainian_word' => 'торт', 'transcription' => 'tort', 'audio_url' => ''],
            ['english_word' => 'candy', 'ukrainian_word' => 'конфета', 'transcription' => 'konfeta', 'audio_url' => ''],
            ['english_word' => 'carrot', 'ukrainian_word' => 'морква', 'transcription' => 'morkva', 'audio_url' => ''],
            ['english_word' => 'cereal', 'ukrainian_word' => 'мюслі', 'transcription' => 'myusli', 'audio_url' => ''],
            ['english_word' => 'chew', 'ukrainian_word' => 'жувати', 'transcription' => 'zhuvaty', 'audio_url' => ''],
            ['english_word' => 'chocolate', 'ukrainian_word' => 'шоколад', 'transcription' => 'shokolad', 'audio_url' => ''],
            ['english_word' => 'coffee', 'ukrainian_word' => 'кава', 'transcription' => 'kava', 'audio_url' => ''],
            ['english_word' => 'cooked', 'ukrainian_word' => 'варений', 'transcription' => 'varenyy', 'audio_url' => ''],
            ['english_word' => 'cooking', 'ukrainian_word' => 'готовка', 'transcription' => 'gotovka', 'audio_url' => ''],
            ['english_word' => 'cornflakes', 'ukrainian_word' => 'хлоп\'я', 'transcription' => 'hlop\'ya', 'audio_url' => ''],
            ['english_word' => 'cream', 'ukrainian_word' => 'сливки', 'transcription' => 'slivky', 'audio_url' => ''],
            ['english_word' => 'creamy', 'ukrainian_word' => 'сливочний', 'transcription' => 'slivochkyy', 'audio_url' => ''],
            ['english_word' => 'crisps', 'ukrainian_word' => 'чіпси', 'transcription' => 'chipsy', 'audio_url' => ''],
            ['english_word' => 'croissant', 'ukrainian_word' => 'круасан', 'transcription' => 'kruasan', 'audio_url' => ''],
            ['english_word' => 'dessert', 'ukrainian_word' => 'десерт', 'transcription' => 'desert', 'audio_url' => ''],
            ['english_word' => 'dinner', 'ukrainian_word' => 'вечеря', 'transcription' => 'vecherya', 'audio_url' => ''],
            ['english_word' => 'doughnut', 'ukrainian_word' => 'пончик', 'transcription' => 'ponchyk', 'audio_url' => ''],
            ['english_word' => 'for breakfast', 'ukrainian_word' => 'на сніданок', 'transcription' => 'na snidanok', 'audio_url' => ''],
            ['english_word' => 'fresh', 'ukrainian_word' => 'свіжий', 'transcription' => 'svizhyy', 'audio_url' => ''],
            ['english_word' => 'fry', 'ukrainian_word' => 'смажити', 'transcription' => 'smazhyty', 'audio_url' => ''],
            ['english_word' => 'grape', 'ukrainian_word' => 'виноград', 'transcription' => 'vynohrad', 'audio_url' => ''],
            ['english_word' => 'grill', 'ukrainian_word' => 'жарити на грилі', 'transcription' => 'zharyty na hryli', 'audio_url' => ' '],
            ['english_word' => 'ham', 'ukrainian_word' => 'ветчина', 'transcription' => 'vetchyna', 'audio_url' => ''],
            ['english_word' => 'have a bite', 'ukrainian_word' => 'перекусити', 'transcription' => 'perekusyty', 'audio_url' => ''],
            ['english_word' => 'honey', 'ukrainian_word' => 'мед', 'transcription' => 'med', 'audio_url' => ''],
            ['english_word' => 'hot', 'ukrainian_word' => 'гарячий', 'transcription' => 'haryachyy', 'audio_url' => ''],
            ['english_word' => 'ice', 'ukrainian_word' => 'лід', 'transcription' => 'lid', 'audio_url' => ''],
            ['english_word' => 'ketchup', 'ukrainian_word' => 'кетчуп', 'transcription' => 'ketchup', 'audio_url' => ''],
            ['english_word' => 'kiwi', 'ukrainian_word' => 'ківі', 'transcription' => 'kivi', 'audio_url' => ''],
            ['english_word' => 'lemon', 'ukrainian_word' => 'лимон', 'transcription' => 'lymon', 'audio_url' => ''],
            ['english_word' => 'lemonade', 'ukrainian_word' => 'лимонад', 'transcription' => 'lymonad', 'audio_url' => ''],
            ['english_word' => 'liter', 'ukrainian_word' => 'літр', 'transcription' => 'litr', 'audio_url' => ''],
            ['english_word' => 'loaf', 'ukrainian_word' => 'буханка', 'transcription' => 'bukhanka', 'audio_url' => ''],
            ['english_word' => 'lump', 'ukrainian_word' => 'кусок', 'transcription' => 'kusok', 'audio_url' => ''],
            ['english_word' => 'lunch', 'ukrainian_word' => 'обід', 'transcription' => 'obid', 'audio_url' => ''],
            ['english_word' => 'marmalade', 'ukrainian_word' => 'повидло', 'transcription' => 'povidlo', 'audio_url' => ''],
            ['english_word' => 'mayonnaise', 'ukrainian_word' => 'майонез', 'transcription' => 'mayonez', 'audio_url' => ''],
            ['english_word' => 'meal', 'ukrainian_word' => 'їжа', 'transcription' => 'izha', 'audio_url' => ''],
            ['english_word' => 'menu', 'ukrainian_word' => 'меню', 'transcription' => 'menyu', 'audio_url' => ''],
            ['english_word' => 'milk', 'ukrainian_word' => 'молоко', 'transcription' => 'moloko', 'audio_url' => ''],
            ['english_word' => 'mushroom', 'ukrainian_word' => 'гриб', 'transcription' => 'hryb', 'audio_url' => ''],
            ['english_word' => 'napkin', 'ukrainian_word' => 'салфетка', 'transcription' => 'salfetka', 'audio_url' => ''],
            ['english_word' => 'nibble', 'ukrainian_word' => 'откусывать', 'transcription' => 'otkusyvat', 'audio_url' => ''],
            ['english_word' => 'orange', 'ukrainian_word' => 'апельсин', 'transcription' => 'apelsyn', 'audio_url' => ''],
            ['english_word' => 'pancake', 'ukrainian_word' => 'блин', 'transcription' => 'blin', 'audio_url' => ''],
            ['english_word' => 'pasta', 'ukrainian_word' => 'паста (макарони)', 'transcription' => 'pasta (makaroni)', 'audio_url' => ''],
            ['english_word' => 'peach', 'ukrainian_word' => 'персик', 'transcription' => 'persyk', 'audio_url' => ''],
            ['english_word' => 'pear', 'ukrainian_word' => 'груша', 'transcription' => 'hrusha', 'audio_url' => ''],
            ['english_word' => 'pizza', 'ukrainian_word' => 'піца', 'transcription' => 'pitsa', 'audio_url' => ''],
            ['english_word' => 'plum', 'ukrainian_word' => 'слива', 'transcription' => 'slyva', 'audio_url' => ''],
            ['english_word' => 'popcorn', 'ukrainian_word' => 'попкорн', 'transcription' => 'popkorn', 'audio_url' => ''],
            ['english_word' => 'pork', 'ukrainian_word' => 'свинина', 'transcription' => 'svynyna', 'audio_url' => ''],
            ['english_word' => 'potato', 'ukrainian_word' => 'картопля', 'transcription' => 'kartoplya', 'audio_url' => ''],
            ['english_word' => 'prawn', 'ukrainian_word' => 'креветка', 'transcription' => 'krevetka', 'audio_url' => ''],
            ['english_word' => 'pub', 'ukrainian_word' => 'паб', 'transcription' => 'pab', 'audio_url' => ''],
            ['english_word' => 'pudding', 'ukrainian_word' => 'пудинг', 'transcription' => 'pudyng', 'audio_url' => ''],
            ['english_word' => 'rare', 'ukrainian_word' => 'непрожарений', 'transcription' => 'nepruzharennyy', 'audio_url' => ''],
            ['english_word' => 'raw', 'ukrainian_word' => 'сирої', 'transcription' => 'syroyi', 'audio_url' => ''],
            ['english_word' => 'rice', 'ukrainian_word' => 'рис', 'transcription' => 'rys', 'audio_url' => ''],
            ['english_word' => 'ripe', 'ukrainian_word' => 'спілий', 'transcription' => 'spilyy', 'audio_url' => ''],
            ['english_word' => 'roast', 'ukrainian_word' => 'запекти', 'transcription' => 'zapekty', 'audio_url' => ''],
            ['english_word' => 'salad', 'ukrainian_word' => 'салат', 'transcription' => 'salat', 'audio_url' => ''],
            ['english_word' => 'salami', 'ukrainian_word' => 'салямі', 'transcription' => 'salyami', 'audio_url' => ''],
            ['english_word' => 'salmon', 'ukrainian_word' => 'лосось', 'transcription' => 'losoс', 'audio_url' => ''],
            ['english_word' => 'salt', 'ukrainian_word' => 'сіль', 'transcription' => 'sil', 'audio_url' => ''],
            ['english_word' => 'salty', 'ukrainian_word' => 'солений', 'transcription' => 'solenyy', 'audio_url' => ''],
            ['english_word' => 'sandwich', 'ukrainian_word' => 'сендвіч', 'transcription' => 'sendvich', 'audio_url' => ''],
            ['english_word' => 'sardine', 'ukrainian_word' => 'сардини', 'transcription' => 'sardyny', 'audio_url' => ''],
            ['english_word' => 'sauce', 'ukrainian_word' => 'соус', 'transcription' => 'sous', 'audio_url' => ''],
            ['english_word' => 'seafood', 'ukrainian_word' => 'морепродукти', 'transcription' => 'moreprodukty', 'audio_url' => ''],
            ['english_word' => 'slice', 'ukrainian_word' => 'ломтик', 'transcription' => 'lomtyk', 'audio_url' => ''],
            ['english_word' => 'snack', 'ukrainian_word' => 'легка закуска', 'transcription' => 'lehka zakuska', 'audio_url' => ''],
            ['english_word' => 'soda', 'ukrainian_word' => 'газирована вода', 'transcription' => 'hazirovana voda', 'audio_url' => ''],
            ['english_word' => 'sorbet', 'ukrainian_word' => 'сорбет (сорбе)', 'transcription' => 'sorbet (sorbe)', 'audio_url' => ''],
            ['english_word' => 'soup', 'ukrainian_word' => 'суп', 'transcription' => 'sup', 'audio_url' => ''],
            ['english_word' => 'sour', 'ukrainian_word' => 'кислий', 'transcription' => 'kyslyy', 'audio_url' => ''],
            ['english_word' => 'spice', 'ukrainian_word' => 'пряність', 'transcription' => 'pryanist', 'audio_url' => ''],
            ['english_word' => 'spicy', 'ukrainian_word' => 'гострий', 'transcription' => 'hostryy', 'audio_url' => ''],
            ['english_word' => 'steak', 'ukrainian_word' => 'стейк', 'transcription' => 'steyk', 'audio_url' => ''],
            ['english_word' => 'stew', 'ukrainian_word' => 'рагу', 'transcription' => 'ragu', 'audio_url' => ''],
            ['english_word' => 'sweet', 'ukrainian_word' => 'солодкий', 'transcription' => 'solodkyy', 'audio_url' => ''],
            ['english_word' => 'take a sip', 'ukrainian_word' => 'прихлебнуть', 'transcription' => 'prykhlebnut', 'audio_url' => ''],
            ['english_word' => 'toast', 'ukrainian_word' => 'гренки', 'transcription' => 'grenky', 'audio_url' => ''],
            ['english_word' => 'trout', 'ukrainian_word' => 'форель', 'transcription' => 'forel', 'audio_url' => ''],
            ['english_word' => 'tuna', 'ukrainian_word' => 'тунець', 'transcription' => 'tunets', 'audio_url' => '']
        
        ];

        foreach ($words as $word) {
            DB::table('words')->insert($word);
        }
    }
}
