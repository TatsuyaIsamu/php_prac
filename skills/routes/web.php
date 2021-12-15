<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UsuallyController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('usually')->group(function(){
    Route::get('/', [UsuallyController::class, 'index'])->name('usually');
    Route::view('/view', 'usually.index');
    Route::get('/template', [UsuallyController::class, 'template'])->name('template');
    Route::redirect('/redirect', '/usually/view');
});

Route::middleware(['auth'])->prefix('skill')->group(function() {
    Route::get('/', [SkillController::class, 'index'])->name('skill');
    Route::get('/detail/{id}', [SkillController::class, 'detail'])->name('skill.detail');
    Route::get('/new', [SkillController::class, 'new'])->name('skill.new');
    Route::get('/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
    Route::post('/create', [SkillController::class, 'create'])->name('skill.create');
    Route::patch('/update', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('/remove/{id}', [SkillController::class, 'remove'])->name('skill.remove');
});
require __DIR__.'/auth.php';
