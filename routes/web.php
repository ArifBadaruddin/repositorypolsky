<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoriespostController;
use App\Http\Controllers\DashboardpostController;
use App\Http\Controllers\dashboardprofile;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DatapoktanController;
use App\Http\Controllers\GantipasswordController;
use App\Http\Controllers\laporancontroller;
use App\Http\Controllers\LaporController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pengaduan;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportUserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersssssController;
use App\Models\post;
use App\Models\category;
use App\Models\User;

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
    return view('Home',[
        "title" => "Home",
    ]);
});



Route::get('/posts',[PostController::class, 'index']);


// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
        return view('categories', [
          'title' => 'Post Kategori',
          'categories' => category::all()
        ]);
});

// kategori mengarah ke view posts (dimatikan karena route sudah ada dimodel)
// Route::get('/categories/{category:slug}', function(category $category) {
//         return view('posts', [
//           'title' => "Artikel Berdasarkan Kategori : $category->name",
//           'posts' => $category->posts->load('category', 'user'),
//         ]);
// });

// route untuk tampilan post dari user ngambil dari view post
    // Route::get('/authors/{author:ketua}', function(User $author) {
    //     return view('posts', [
    //       'title' => "Artikel Dari Author: $author->ketua",
    //       'posts' => $author->posts->load('category', 'user'),
    //     ]);
    // });  

// login
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

// dashboard
Route::get('/dashboard', function(){
  return view('dashboard.index');
})->middleware('auth');

// profil
Route::get('/dashboard/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::get('/dashboard/dashboardadmin', [dashboardprofile::class, 'index'])->middleware('admin');

// ganti password
Route::get('/dashboard/password', [GantipasswordController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/password', [GantipasswordController::class, 'updatepassword'])->middleware('auth');

// route untuk slug
Route::get('/dashboard/posts/checkSlug', [DashboardpostController::class, 'checkSlug']);
Route::get('/dashboard/kategori/checkSlug', [CategoriesController::class, 'checkSlug']);

// post
Route::resource('/dashboard/posts', DashboardpostController::class)->middleware('auth');

Route::post('/dashboard/posts/store', [DashboardpostController::class, 'store'])->middleware('auth');


// kategori
Route::resource('/dashboard/kategori', CategoriespostController::class)->middleware('auth');
Route::post('/dashboard/kategori/store', [CategoriespostController::class, 'store'])->middleware('admin');

// Route::get('/dashboard/kategori', [CategoriesController::class, 'index'])->middleware('admin');

// users
// Route::get('/dashboard/users', [UsersController::class, 'index'])->middleware('admin');
// Route::post('/dashboard/users/store', [UsersController::class, 'store'])->middleware('admin');
// Route::get('/dashboard/users/{id}', [UsersController::class, 'show'])->middleware('admin');


Route::resource('/dashboard/users', UsersssssController::class)->middleware('admin');
Route::post('/dashboard/users/store', [UsersssssController::class, 'store'])->middleware('admin');
Route::get('/dashboard/users/{id}', [UsersssssController::class, 'show'])->middleware('admin');
Route::post('/dashboard/users/{id}', [UsersssssController::class, 'update'])->middleware('admin');



// Route::resource('/dashboard/lapor', LaporController::class)->except('show')->middleware('admin');
// Route::resource('/dashboard/posts/', DashboardPostController::class)->except([
//   'show', 'destroy', 'edit', 'update'
// ])->middleware('auth');


// TIDAK TERPAKAI
// Route::resource('/dashboard/reportus', ReportUserController::class)->middleware('auth');
// Route::resource('/dashboard/report', ReportController::class)->middleware('admin');

