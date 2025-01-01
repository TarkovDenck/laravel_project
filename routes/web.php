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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\AdminPurchaseController; 



use App\Models\Contact;
use App\Models\Purchase;
use Faker\Provider\ar_EG\Payment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/catalog', function () {
    return view('pages.catalog');
})->name('catalog');

Route::get('/contact-page', function () {
    return view('pages.contact');
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






// Hanya bisa diakses jika sudah login
Route::get('/adminpage', [AdminAuthController::class, 'adminPage'])->name('admin.adminpage');

Route::get('/adminpage', function () {
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login-admin'); // Redirect jika belum login
    }
    return view('admin.adminpage');
})->name('admin.adminpage');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login-admin');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/adminpage', [AdminAuthController::class, 'adminPage'])->name('admin.adminpage');










Route::get('/table1', [Table1Controller::class, 'index'])->name('table1');
Route::delete('/table1/{id}', [Table1Controller::class, 'destroy'])->name('table1.delete');
Route::get('/table2', [Table1Controller::class, 'showTable2'])->name('table2');

Route::delete('/comments/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('purchases', [AdminPurchaseController::class, 'index'])->name('purchases');
    Route::get('purchases/{id}', [AdminPurchaseController::class, 'show'])->name('purchases.show');
    Route::delete('purchases/{id}', [AdminPurchaseController::class, 'destroy'])->name('purchases.destroy');
    Route::patch('purchases/{id}/status', [AdminPurchaseController::class, 'updateStatus'])->name('purchases.update-status');
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('purchases', [AdminPurchaseController::class, 'index'])->name('purchases');
    Route::patch('purchases/{id}/status', [AdminPurchaseController::class, 'updateStatus'])->name('purchases.update-status'); // Tambahkan route ini
});

Route::middleware(['auth:admin'])->group(function () {
    // Product Routes
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
    
    // Edit and update product routes
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    
    // Delete product route
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});






// Route to get the payment token (for frontend to request)
Route::middleware(['auth'])->group(function () {
    Route::get('/form-preorder', [PurchaseController::class, 'showForm'])->name('form-preorder');
    Route::post('/store-preorder', [PurchaseController::class, 'storePreorder'])->name('store-preorder');
});





