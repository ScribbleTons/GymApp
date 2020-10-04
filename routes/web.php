<?php
namespace App;

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\LeadSubscriberController;
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

Route::get('/', WelcomeController::class);

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('dash');

    //Lead routes
    Route::get('/leads/add', [LeadController::class, 'create'])->name('lead.create');
    Route::post('/leads/save', [LeadController::class, 'store'])->name('lead.save');
    Route::get('/leads/list', [LeadController::class, 'index'])->name('lead.list');
    Route::get('/leads/view/{lead}', [LeadController::class, 'view'])->name('lead.view');
    Route::put('/leads/update', [LeadController::class, 'update'])->name('lead.update');
    Route::delete('/leads/view/{lead}', [LeadController::class, 'delete'])->name('lead.delete');

    //subscriber routes
    Route::get('/subscribers/list', [LeadSubscriberController::class, 'view'])->name('subscriber.list');
    Route::get('/leads/subscribe/{lead}', [LeadSubscriberController::class, 'add'])->name('lead.subscribe');
    Route::post('/leads/subscribe/save', [LeadSubscriberController::class, 'store'])->name('lead.subscribe.add');

    //reminder routes
    Route::get('/leads/view/{lead}/reminder/add', [ReminderController::class, 'add'])->name('reminder.add');
    Route::post('/leads/view/reminder/save', [ReminderController::class, 'store'])->name('reminder.save');
    Route::put('/leads/view/reminder/update', [ReminderController::class, 'update'])->name('reminder.update');
    Route::get('/leads/view/{lead}/reminder/{reminder}/view', [ReminderController::class, 'view'])->name('reminder.view');
    Route::delete('/leads/view/reminder/{reminder}', [ReminderController::class, 'delete'])->name('reminder.delete');
});

// Auth::routes();