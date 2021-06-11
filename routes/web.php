<?php

use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// BACKOFFICE
Route::get('/backoffice/index',[BackofficeController::class,'index'])->name('backoffice.index')->middleware('auth');
Route::get('/backoffice/user',[BackofficeController::class,'vendeuser'])->name('vente.user')->middleware('auth');
// STOCK
Route::get('/stock/gestion',[StockController::class,'gestion_stock'])->name('stock.gestion')->middleware('auth');
Route::post('/stock/add',[StockController::class,'stock_add'])->name('stock.add')->middleware('auth');
Route::get('/stock/produit',[StockController::class,'produit'])->name('stock.produit')->middleware('auth');
Route::post('/stock/produit/add',[StockController::class,'produit_add'])->name('stock.produit.add')->middleware('auth');
// PARAMETRE
Route::get('/parametre/user',[SettingsController::class,'userindex'])->name('settings.user.index')->middleware('auth');
Route::get('/parametre/shop',[SettingsController::class,'shopindex'])->name('settings.shop.index')->middleware('auth');
Route::post('/parametre/user/add',[SettingsController::class,'useradd'])->name('settings.user.add')->middleware('auth');
Route::post('/parametre/shop/add',[SettingsController::class,'shopadd'])->name('settings.shop.add')->middleware('auth');
// VENTE
Route::get('/vente/index',[VenteController::class,'index'])->name('vente.index')->middleware('auth');
Route::get('/vente/facture/{id}',[VenteController::class,'facture'])->name('vente.facture')->middleware('auth');
