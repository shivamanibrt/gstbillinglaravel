<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\GstController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorInvoice;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

#Basic Route
// Route::get('/', [AppController::class, 'index']);
// Route::get('/eloquntorm', [AppController::class, 'eloquntorm']);
// Route::get('/querybuilder', [AppController::class, 'querybuilder']);
// Route::get('/dashboard', [AppController::class, 'querybuilder']);

// Route::get('/about/{paraname}', [AppController::class, 'about']);

// #Route with optioal paramater
// Route::get('/services/{paraname?}', function () {
//     return "<h1>Hello from about</h1>";
// });

// #Name routes
// Route::get('/contact', "AppControlle@function-name")->name('contact');
#index page 
Route::get('/dashboard', [AppController::class, 'dashboard']);

// Party routes
Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
Route::get('/manage-parties', [PartyController::class, 'index'])->name('manage-parties');

// Handel post routes for form
Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
//Update the parties from edit form
Route::put('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');
//delete the parties from edit form
Route::delete('/delete-party/{party}', [PartyController::class, 'deleteParty'])->name('delete-party');

//Gst bill
Route::get('/add-gst-bill', [GstController::class, 'addGstBill'])->name('add-gst-bill');
Route::get('/manage-bill', [GstController::class, 'manageGst'])->name('manage-bill');
Route::get('/print-bill', [GstController::class, 'printGst'])->name('print-bill');
Route::post('/create-gst-bill', [GstController::class, 'createGstBill'])->name('create-gst-bill');

//Soft delete route
Route::get('/delete/{table}{id}', [AppController::class, 'softDelete'])->name('soft-delete');

//Vendor invoices
Route::resource('vendor-invoice', VendorInvoice::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
