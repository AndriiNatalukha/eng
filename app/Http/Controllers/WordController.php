<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\WordCategory;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index(Request $request, $categoryId)
    {
        $words = Word::where('category_id', $categoryId)->get();
        $category = WordCategory::find($categoryId);
        // Перевірка, чи користувач авторизований
        if (Auth::check()) {
            // $user = Auth::user(); // Отримати інформацію про авторизованого користувача
            $isAuthenticated = true;
        } else {
            $isAuthenticated = false;
        }

        foreach ($words as $i => $word) {
            // Формуємо шлях до аудіофайлу з врахуванням папок на першу букву слова
          //  $audioPath = storage_path("app/public/audio/{$word['english_word'][0]}/{$word['english_word']}.ogg");
            $audioPath = public_path("audio/{$word['english_word'][0]}/{$word['english_word']}.ogg");

            $words[$i]['fileExists'] = file_exists($audioPath);
        }
        
        return Inertia::render('Words/Index', [
            'words' => $words,
            'category' => $category,
            'isAuthenticated' => $isAuthenticated,
        ]);
    }

    public function addToDictionary(Request $request)
    {
        $wordIds = $request->input('wordIds', []);
        $user = Auth::user();
        $addedWords = [];
        $existingWords = [];
    
        foreach ($wordIds as $wordId) {
            // Перевірка, чи слово вже є в словнику користувача
            if (!$user->dictionary()->where('word_id', $wordId)->exists()) {
                $user->dictionary()->attach($wordId);
                $addedWords[] = $wordId;
            } else {
                $existingWords[] = $wordId;
            }
        }
 
        $success = !empty($addedWords) ? true : false;  
                  
        return response()->json([
            'success' => $success,
            'words' => $success ? $addedWords : $existingWords,
        ]);
    }
}