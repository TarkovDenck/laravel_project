<?php

use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PcBranchController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Table1Controller;
use App\Models\Contact;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/catalog', function () {
    return view('pages.catalog');
})->name('catalog');

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/form-preorder', function () {
    return view('pages.form-preorder');
});

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/pc-branch-high', function () {
    return view('pages.pc-branch-high');
})->name('pc-branch-high');

Route::get('/pc-branch-low', function () {
    return view('pages.pc-branch-low');
})->name('pc-branch-low');

Route::get('/pc-branch-medium', function () {
    return view('pages.pc-branch-medium');
})->name('pc-branch-medium');

Route::get('/singup', function () {
    return view('pages.signup');
});

Route::get('/testing', function () {
    return view('pages.testing');
});

Route::get('/comment', function () {
    return view('pages.comment');
});

Route::get('/change-password', function () {
    return view('pages.changePassword');
});






Route::middleware('auth')->get('/pc-branch-low', [PcBranchController::class, 'showPcBranchLow']);
Route::middleware('auth')->get('/pc-branch-medium', [PcBranchController::class, 'showPcBranchmedium']);
Route::middleware('auth')->get('/pc-branch-high', [PcBranchController::class, 'showPcBranchhigh']);

Route::middleware('auth')->get('/form-preorder', [PcBranchController::class, 'showPcBranchform']);





Route::get('/signup', [SignupController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'processSignup'])->name('signup.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');



Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dasboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/contact', [ContactController::class, 'showContacts'])->name('admin.contact');

Route::post('/password/update', [PasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/comment', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');

Route::post('/comment', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');



Route::get('/adminpage', function () {
    return view('admin.adminpage');
});

Route::get('/table1', function () {
    return view('admin.table1');
});

Route::get('/table2', function () {
    return view('admin.table2');
});

Route::get('/login-admin', function () {
    return view('admin.login-admin');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->middleware('auth:admin')->name('admin.adminpage');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');



// Hanya bisa diakses jika sudah login
Route::middleware('auth:admin')->get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.adminpage');

Route::get('/adminpage', function () {
    return view('admin.adminpage');
})->middleware('auth:admin')->name('admin.adminpage');





Route::get('/table1', [Table1Controller::class, 'index'])->name('table1');
Route::delete('/table1/{id}', [Table1Controller::class, 'destroy'])->name('table1.delete');
Route::get('/table2', [Table1Controller::class, 'showTable2'])->name('table2');

Route::delete('/comments/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');


