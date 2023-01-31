<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Models\Account;
use App\Models\Transfer;

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

Route::get('/', function(){
    return View('home',['accounts' => Account::all()]);
});
Route::get('/login',[AuthController::class,'index'])->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/logout',[AuthController::class,'destroy'])->middleware('auth');
Route::get('/register',[AuthController::class,'registerPage'])->middleware('guest');
Route::post('/register',[AuthController::class,'register'])->middleware('guest');
Route::get('/open-account',function(){
    return view('openAccount');
})->middleware('auth');
Route::post('/open-account',[AccountController::class,'openAccount'])->middleware('auth');
Route::get('/deposit',[AccountController::class,'depositForm'])->middleware(['auth','hasAccount']);
Route::post('/deposit',[AccountController::class,'deposit'])->middleware(['auth','hasAccount']);
Route::get('/withdraw',[AccountController::class,'withdrawform'])->middleware(['auth','hasAccount']);
Route::post('/withdraw',[AccountController::class,'withdraw'])->middleware(['auth','hasAccount']);
Route::get('/transactions',[TransactionController::class,'index'])->middleware(['auth','hasAccount']);
Route::get('/delete/{transaction:id}',[TransactionController::class,'destroy'])->middleware(['auth','hasAccount']);

Route::get('/request-loan',[LoanController::class,'index'])->middleware(['auth','hasAccount']);
Route::post('/request-loan',[LoanController::class,'getLoan'])->middleware(['auth','hasAccount']);
Route::get('/pay-loan',[LoanController::class,'payForm'])->middleware(['auth','hasAccount']);
Route::post('/pay-loan',[LoanController::class,'payLoan'])->middleware(['auth','hasAccount']);

Route::get('/send-money',[TransferController::class,'index'])->middleware(['auth','hasAccount']);
Route::post('/send-money',[TransferController::class,'send'])->middleware(['auth','hasAccount']);
Route::get('/sent-money',[TransferController::class,'sent'])->middleware(['auth','hasAccount']);

Route::get('/received-money',function(){
    return view('received-money',['transfers' => Transfer::latest()->get()]);
})->middleware(['auth','hasAccount']);




// require __DIR__.'/auth.php';