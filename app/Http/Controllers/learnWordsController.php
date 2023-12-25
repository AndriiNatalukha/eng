<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\WordCategory;
use Illuminate\Support\Facades\Auth;

class learnWordsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
           
            $user = Auth::user();
            $words = $user->dictionary()->limit(12)->get();
            $wordsArr = $words->toArray();

            foreach ($wordsArr as $i => $word) {
                $audioPath = storage_path("app/public/audio/{$word['english_word'][0]}/{$word['english_word']}.ogg");
                $wordsArr[$i]['fileExists'] = file_exists($audioPath);
            }
            return Inertia::render('LearnWord/Index', [
                'packetWords' => $wordsArr,
                'user' => $user,
            ]);
        } else {
            return Inertia::location('/login');
        }
    }

    public function reverseIndex(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $words = $user->dictionary()->limit(12)->get();
            $wordsArr = $words->toArray();
            foreach ($wordsArr as $i => $word) {
                $audioPath = storage_path("app/public/audio/{$word['ukrainian_word'][0]}/{$word['ukrainian_word']}.ogg");
                $wordsArr[$i]['fileExists'] = file_exists($audioPath);
            }
            return Inertia::render('TestWordsReverse/Index', [
                'packetWords' => $wordsArr,
                'user' => $user,
            ]);
        } else {
            return Inertia::location('/login');
        }
    }

    public function removeFromDictionary(Request $request)
    {
        $wordId = $request->input('wordId', []);

        $user = Auth::user();
        $deletedWords = [];

        $user->dictionary()->detach($wordId);
        $deletedWords[] = $wordId;
        dd($wordId);
        return response()->json([
            'words' => $deletedWords,
        ]);
    }
}
