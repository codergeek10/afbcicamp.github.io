<?php

use App\Models\Registrant;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChurchesController;
use App\Http\Controllers\CustomerController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\CampProfileController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\RegistrantsController;

Route::get('/', function () {
    $camperCount = Registrant::all()->count();
    $spaceLeft = 200 - $camperCount;
    
    return view('home', ['spaceLeft'=>$spaceLeft]);
})->name('home');

Route::get('/thank_you', function(){
    return view('auth.thank_you');
})->middleware('auth')->name('register.confirm');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', function () {
    return redirect()->route('users');
})->middleware(['auth', 'verified', 'admins']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/camp_registration', [RegistrantsController::class, 'create'])->name('registration.form');
    Route::post('/camp_registration', [RegistrantsController::class, 'store'])->name('registration.camp');
    Route::patch('/camp_registration', [RegistrantsController::class, 'update'])->name('registration.update');

});


Route::middleware(['auth', 'verified', 'admins'])->group(function(){
    Route::get('/users/accounts', [Users::class, 'index'])->name('users');
    Route::patch('/users/{user_id}', [Users::class, 'makeAdmin'])->name('make.admin');
    Route::get('/users/campers', [CampersController::class, 'index'])->name('users.campers');
    Route::get('/churches', [ChurchesController::class, 'index'])->name('church');
    Route::get('/churches/create', [ChurchesController::class, 'create'])->name('church.create');
    Route::post('/churches', [ChurchesController::class, 'store'])->name('church.add');
    Route::get('/metrics', [MetricsController::class, 'index'])->name('metrics');
});


require __DIR__.'/auth.php';
