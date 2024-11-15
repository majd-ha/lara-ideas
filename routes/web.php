<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, "index"])->name("home")->middleware('auth');
Route::group(['prefix' => 'idea/', 'as' => "idea.", 'middleware' => ['auth']], function () {
    Route::post("", [IdeaController::class, "store"])->name("create");
    Route::delete("{id}", [IdeaController::class, "destroy"])->name("destroy");
    Route::get("{id}/edit", [IdeaController::class, "edit"])->name("edit");
    Route::put("{id}", [IdeaController::class, "update"])->name("update");
    Route::get("{id}", [IdeaController::class, "show"])->name("show");
    Route::post("{idea}/store", [CommentController::class, "store"])->name("comments.create");
});

Route::get('/register', [AuthController::class, "register"])->name("user.register")->middleware('guest');
Route::post('/register', [AuthController::class, "store"])->name('user.store')->middleware('guest');
Route::get('/login', [AuthController::class, "showlogin"])->name("user.showlogin")->middleware('guest');
Route::post('/login', [AuthController::class, "login"])->name('user.login')->middleware('guest');
Route::post('/logout', [AuthController::class, "logout"])->name('logout')->middleware('auth');




// Route::get("/feed/{id}", function ($id) {
//     return view("feed", ["md" => $id]);
// });
