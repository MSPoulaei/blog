<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
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
Route::post("/posts/{post:slug}/comments",[CommentController::class,"store"]);


Route::get("/authors/{author:username}",[UserController::class,"authorPosts"]);

Route::get("/categories/{category:slug}",[CategoryController::class,"posts"])->name("category");

Route::get("/search",[PostController::class,"search"]);


Route::get("/login",[AuthController::class,"loginForm"])->middleware("guest")->name("login");
Route::Post("/login",[AuthController::class,"login"])->middleware("guest");

Route::get("/register",[AuthController::class,"registerForm"])->middleware("guest");
Route::Post("/register",[AuthController::class,"register"])->middleware("guest");

Route::Post("/logout",[AuthController::class,"logout"])->middleware("auth");

Route::get("/panel/dashboard",[DashboardController::class,"index"])->middleware("admin");
Route::get("/panel/posts",[PostController::class,"show"])->middleware("admin");
Route::get("/panel/posts/create",[PostController::class,"create"])->middleware("admin");
Route::post("/panel/posts/create",[PostController::class,"store"])->middleware("admin");

Route::get("/panel/posts/{post:slug}/edit",[PostController::class,"edit"])->middleware("admin");

Route::post("/panel/posts/{slug}",[PostController::class,"restore"])->middleware("admin");
Route::patch("/panel/posts/{slug}",[PostController::class,"update"])->middleware("admin");
Route::delete("/panel/posts/{post:slug}",[PostController::class,"delete"])->middleware("admin");


Route::post("/newsletter",[NewsletterController::class,"store"]);

Route::get("/panel/newsletter",[NewsletterController::class,"create"])->middleware("admin");
Route::post("/panel/newsletter",[NewsletterController::class,"send"])->middleware("admin");

