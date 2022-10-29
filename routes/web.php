<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Supervisor\SupervisorController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\StockController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PController;
use App\Http\Controllers\ClController;

use Illuminate\Support\facades\DB;

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


Auth::routes();
Route::get('/', 'Front\FrontController@index');

Route::get('/search', 'Front\FrontController@search');

Route::get('/sear', 'ProductController@sear');
Route::get('/product',[ProductController::class,'product'])->name('product'); 
Route::get('/p',[PController::class,'index'])->name('p'); 
Route::get('/cl',[ClController::class,'index'])->name('cl'); 



Route::prefix('web')->name('web.')->group(function(){
      
    Route::middleware(['guest:web'])->group(function(){
      
        Route::view('/login','auth.login')->name('login');
          Route::view('/register','auth.register')->name('register');
       
        });

          Route::middleware(['auth:web'])->group(function(){
          Route::get('prod/{id}', 'Front\FrontController@product');
          Route::get('/cart',[CartController::class,'cart'])->name('cart'); 
          Route::get('/order',[OrdController::class,'index'])->name('order'); 
          Route::get('/order/{id}',[OrdController::class,'invoice'])->name('order'); 
          Route::post('/addtocart','CartController@addtocart')->name('addtocart');
          Route::post('/cart-update','CartController@cartUpdate')->name('cart.update');
          Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');   
          Route::get('/checkout/{amount}','CheckoutController@checkout')->name('cart.checkout');
          Route::post('checkout','CheckoutController@afterpayment')->name('credit-card');
          Route::get('/download-pdf/{id}','OrdController@downloadPdf')->name('download-pdf'); 
          Route::resource('profile','ProfileController');
        });
});
   Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin'])->group(function(){
          Route::view('/login','admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
       });

        Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home','Admin\Admincontroller@index')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
      
         Route::resource('users','UserController');
         Route::resource('products','ProductController');
         Route::resource('categories','CategoryController');
         Route::resource('employees','EmployeesController');
         Route::resource('orders','OrdersController');
         Route::resource('ordersp','OrderspController');
         Route::get('/stocks', 'StockController@index');
         Route::post('/stock-update','StockController@stockUpdate')->name('stock.update');
         Route::post('/store','StockController@store')->name('stocks.store');
         Route::get('/create','StockController@create')->name('stocks.create');
         Route::get('delete/{id}','StockController@delete')->name('delete');   
         

        
         Route::get('/searchP','ProductController@search')->name('products.searchP');
         Route::get('/seachC','CategoryController@search')->name('categories.searchC');
         Route::get('/searchS','supervisorsController@search')->name('supervisors.searchS');
         Route::get('/searchU','UserController@search')->name('users.searchU');
         Route::get('/searchE','EmployeesController@search')->name('employees.searchE');
         Route::get('/searchO','OrdersController@search')->name('orders.searchO');
         Route::get('/searchop','OrderspController@search')->name('ordersp.searchop');
        
        });

});


