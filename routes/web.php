<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\WordUserController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\learnWordsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/exercises', function () {
    return Inertia::render('Exercises', [
        // 'auth' => auth()->user(), // передача інформації про користувача (якщо він автентифікований)
        // 'laravelVersion' => app()->version(),
        // 'phpVersion' => phpversion(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('exercises');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/user-category', [WordUserController::class, 'index']);
Route::get('/categories/{categoryId}', [WordController::class, 'index'])->name('words.byCategories');

Route::post('/remove-from-dictionary', [WordUserController::class, 'removeFromDictionary']);
Route::post('/add-to-dictionary', [WordController::class, 'addToDictionary']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/learn-words', [learnWordsController::class, 'index']);
Route::get('/test-words-reverse', [learnWordsController::class, 'reverseIndex'])->name('test-words-reverse.index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/audio/{filename}', function ($filename) {
    $path = storage_path("app/public/audio/{$filename}");

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
})->name('audio');

require __DIR__ . '/auth.php';
