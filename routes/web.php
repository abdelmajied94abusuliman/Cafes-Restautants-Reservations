<?php

use App\Http\Controllers\Search;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LandingPage;

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

// Route::get('/login', function () {
//     return view('welcome');
// });


// Route::get('/', [AuthenticatedSessionController::class, 'create'])
//                 ->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('layouts.admin');
// })->middleware(['auth'])->name('admin');

// Route::get('/', function () {
//     return view('layouts.landingPage');
// });



Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/landingPage', [LandingPage::class , 'index'])->name('landingPage');
Route::get('/', [LandingPage::class , 'index'])->name('landingPage');


Route::get('/yourreservation' ,[LandingPage::class , 'reservation_show'])->name('yourreservation');

Route::get('/{reservation}/LandingPageDelete' ,[LandingPage::class , 'delete'])->name('delete');

Route::post('/{reservation}/editYourReservation' ,[LandingPage::class , 'editReservation'])->name('editYourReservation');

Route::post('/{reservation}/editFormReservation' ,[LandingPage::class , 'updateReservation'])->name('updateReservation');




Route::get('/{reservation}/firstFormEdit' ,[LandingPage::class , 'firstFormEdit'])->name('firstFormEdit');





Route::get('/userReservation' , function(){
    return view('layouts.userReservation');
});
Route::get('/contact' , function(){
    return view('contact');
})->name('contact');
Route::get('/about' , function(){
    return view('about');
})->name('about');



Route::get('/reseForm/{category_id}/create',[LandingPage::class , 'create'])->name('reseForm-create');
Route::post('/reservationStore' , [LandingPage::class , 'store'])->name('LandingPage.store');
Route::post('/formPartTwo' , [LandingPage::class , 'sessionDate'])->name('goToPartTwo');
Route::get('/formPartTwo/{category_id}/createPartTwo',[LandingPage::class , 'createPartTwo'])->name('formPartTwo-create');



Route::middleware(['auth' , 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/' , [AdminController::class , 'index'])->name('index');
    Route::resource('/category' , CategoryController::class);
    Route::post('/category/{category}' , [CategoryController::class , 'update'])->name('cat-update');
    Route::get('/category/{category}' , [CategoryController::class , 'destroy'])->name('cat-destroy');
    Route::resource('/menu' , MenuController::class);
    Route::resource('/reservation' , ReservationController::class);
    // Route::post('/reservation/{reservation}' , [ReservationController::class , 'update'])->name('reservation-cancle');
    Route::get('/reservation/{reservation}' , [ReservationController::class , 'destroy'])->name('reservation-approve');
    Route::resource('/table' , TableController::class);
    Route::resource('/user' , UserController::class);
    Route::get('/{user}/user' , [UserController::class , 'update'])->name('user.update');
    Route::get('/user/{user}' , [UserController::class , 'removeAdmin'])->name('user.removeAdmin');
});

Route::post('/search' , [Search::class , 'search'])->name('search');








require __DIR__.'/auth.php';



