<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get("/",[PostController::class,"index"]);

Route::get("/hello",function (Response $response){
    return ["status"=>"true"];
});

Route::get("/contact", function (Request $request, Response $response) {
    return view("contact");
});

//Route::get("/posts",[PostController::class,"index"]);
Route::get("/posts/{post:slug}",[PostController::class,"post"]);


Route::get("/authors/{author:username}",[UserController::class,"authorPosts"]);

Route::get("/categories/{category:slug}",[CategoryController::class,"posts"])->name("category");

Route::get("/search",[PostController::class,"search"]);


Route::get("/login",[AuthController::class,"loginForm"])->middleware("guest")->name("login");
Route::Post("/login",[AuthController::class,"login"])->middleware("guest");

Route::get("/register",[AuthController::class,"registerForm"])->middleware("guest");
Route::Post("/register",[AuthController::class,"register"])->middleware("guest");

Route::Post("/logout",[AuthController::class,"logout"])->middleware("auth");

Route::get("/dashboard",[DashboardController::class,"index"])->middleware("admin");
