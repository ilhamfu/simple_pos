<?php

use App\Http\Livewire\ProductPage;
use App\Http\Livewire\TransactionCreatePage;
use App\Http\Livewire\TransactionPage;
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

Route::get('/', ProductPage::class)->name("product");
Route::get('/transaksi',TransactionPage::class)->name("transaction");
Route::get('/transaksi/create',TransactionCreatePage::class)->name("transaction.create");