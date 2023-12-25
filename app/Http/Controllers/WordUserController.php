<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\WordCategory;
use Illuminate\Support\Facades\Auth;

class WordUserController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            // Користувач авторизований
            $user = Auth::user(); 
            $words = $user->dictionary;
            
            foreach ($words as $i => $word) {
                // Формуємо шлях до аудіофайлу з врахуванням папок на першу букву слова
                $audioPath = storage_path("app/public/audio/{$word['english_word'][0]}/{$word['english_word']}.ogg");
                // dd($audioPath);
                $words[$i]['fileExists'] = file_exists($audioPath);
            }
            return Inertia::render('UserWords/Index', [
               'words' => $words,
               'user' => $user,
            ]);
        } 
    }

    public function removeFromDictionary(Request $request)
    {
        $wordIds = $request->input('wordIds', []);
        logger($wordIds);
       // print_r($wordIds);
        $user = Auth::user();
        $deletedWords = [];
        // foreach ($wordIds as $wordId) {
            $user->dictionary()->detach($wordIds);
          //  $deletedWords[] = $wordId;
        // }
        
        return response()->json([
            'words' => $wordIds,
            'user' =>  $user,
        ]);
    }
}
