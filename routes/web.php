<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Auth;
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

// entra no login
// Route::get("/login", function (){

// codigos comentados são funcionais só foram retirados do escopo do projeto

//     // $credentials = [
//     //     "email" => "flaviaporto@gmail.com",
//     //     "password" => "1234"
//     // ];
//     // Auth::attempt($credentials);

//     return view("auth.login");
// })->name("login");

// entra na view de cadastro
// Route::get("/person/register", [
//     PersonController::class,
//     "create"
// ])->name("route.person.create");

// faz persistencia de dados
// Route::post("/person/create", [
//     PersonController::class,
//     "store"
// ])->name("route.person.store");

// deleta usuario

Route::group(['middleware' => ["auth"]], function (){
    // lista usuarios
    Route::get('/people', [
        PersonController::class,
        "index"
    ])->name("route.person.list");

    // mostra usuario
    Route::get("/person/show/{user}", [
        PersonController::class,
        "show"
    ])->name("route.person.show");
    
    // perfil do usuario
    Route::get('/account', [
        PersonController::class,
        "account"
    ])->name("person.account");

    // logout
    Route::post("/person/logout", [
        PersonController::class,
        "logout"
    ])->name('person.logout');
    
    // mostra view de edição
    Route::get("/account/alter", [
        PersonController::class, "alter"]
    )->name("person.account.alter");

    //deleta usuário
    Route::delete(
        "/account/delete/me",
        [PersonController::class, "deleteAccount"]
    )->name("route.person.delete.me");

    // altera usuário
    Route::put(
        "/account/update/me",
        [PersonController::class, "updateAccount"]
    )->name("route.person.alter.me");

    // rota de alteração de usuarios
    // Route::put("/person/update/{user}", [
    //     PersonController::class,
    //     "update"
    // ])->name("route.person.update");

    // entra na view de edição
    // Route::get("/person/edit/{user}", [
    //     PersonController::class,
    //     "edit"
    // ])->name("route.person.edit");

    // Route::delete("/person/delete/{user}", [
    //     PersonController::class,
    //     "delete"
    // ])->name("route.person.delete");    
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
