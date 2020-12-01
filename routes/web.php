<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\GrmExampleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\VcbExampleController;
use App\Http\Controllers\VocabularyController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
})->name('home');

//Login

Route::get('admin/login', [AdminController::class, 'returnViewLogin'])->name('admin.login');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resources([
        'categories' => CategoryController::class,
        'books' => BookController::class,
        'lessons' => LessonController::class,
        'grammars' => GrammarController::class,
        'grm-examples' => GrmExampleController::class,
        'vocabularies' => VocabularyController::class,
        'vcb-examples' => VcbExampleController::class,
    ]);
});
