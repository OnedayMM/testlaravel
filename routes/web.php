<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\ManageController;
use App\Models\Products;
use App\Models\musers;

Route::resource('product', Usercontroller::class);
Route::resource('user', ManageController::class);

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

//Set index is page login
Route::get('/', function()
{
    return View('login');
});


//show product
Route::get('welcome', function()
{
    $product = Products::all();
    return View('welcome', ['welcome' => $product]);
});

//show add users
Route::get('mcreate', function()
{
    return View('manage.create');
});


Route::get('/manage', [Usercontroller::class, 'mindex']);
Route::get('/manage/create', [Usercontroller::class, 'mcreate']);
Route::get('/manage/{id}/edit',[Usercontroller::class, 'medit']);
Route::get('/product/{id}/edit',[Usercontroller::class, 'edit']);


Route::post('/manage', [Usercontroller::class, 'mstore']);
Route::put('/manage/{id}', [Usercontroller::class, 'update']);
Route::delete('/manage/{id}', [Usercontroller::class, 'mdestroy']);
Route::delete('/product/{id}',[Usercontroller::class, 'destroy']);


//Show users
Route::get('manaage', function()
{
    $muser = musers::orderBy('id','desc')->paginate(10);
    return View('product.manaage', ['manage' => $muser]);
});

Route::resource('managde', 'App\Http\Controllers\Usercontroller');
