<?php

use App\Http\Resources\PostResource;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('post/mostRecentPosts', [PostController::class, 'getMostRecentPosts'])->name('getMostRecentPosts');

Route::apiResources([
    'etiqueta' => EtiquetaController::class,
    'post' => App\Http\Controllers\PostController::class,
    'user' => App\Http\Controllers\UserController::class,
    'etiquetasPost' => App\Http\Controllers\EtiquetasPostController::class,
    'comentario' => App\Http\Controllers\ComentarioController::class
]);
/* Route::apiResources([
    'post' => App\Http\Controllers\PostController::class
]);
Route::apiResources([
    'user' => App\Http\Controllers\UserController::class
]);
Route::apiResources([
    'etiquetasPost' => App\Http\Controllers\EtiquetasPostController::class
]);
Route::apiResources([
    'comentario' => App\Http\Controllers\ComentarioController::class
]); */
//Routes to Etiquetas
/* Route::get('etiquetas', [App\Http\Controllers\EtiquetaController::class, 'index'])->name('etiqueta.index');
Route::post('etiquetas', [App\Http\Controllers\EtiquetaController::class, 'store'])->name('etiqueta.store');
Route::put('etiquetas', [App\Http\Controllers\EtiquetaController::class, 'update'])->name('etiqueta.update');
Route::delete('etiquetas', [App\Http\Controllers\EtiquetaController::class, 'destroy'])->name('etiqueta.delete'); */
//Routes to Etiquetas
/* Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::put('post', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('post', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete'); */
//Routes to Etiquetas
/* Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::put('post', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('post', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete'); */