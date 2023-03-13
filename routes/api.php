<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserLibrary;
use Database\Factories\BookFactory;

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

/* Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/currentuser', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request) {
    $users = User::all();
    return response()->json($users);
});

Route::get('/books', function (Request $request) {
    $books = Book::all();
    return response()->json($books);
});

Route::get('/library', function (Request $request) {
    $libraries = UserLibrary::all();
    return response()->json($libraries);
});

Route::post('/library/add', function (Request $request) {
    $parameters = $request->query->all();
    UserLibrary::insert(["book_id" => $parameters["bid"], "user_id" => $parameters["uid"]]);
});
