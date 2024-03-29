<?php

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Create;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\NeighbourController;
use App\Models\Layout;

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

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::resource('livewire', StudentController::class);
    Route::resource('livewire', NewsController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::post('/upload', [NewsController::class, 'uploadimage'])->name('ckeditor.upload');
    Route::get('/users', Users::class)->name('users');
    Route::post('/category', [CategoryController::class,'store'])->name('category.store');
    Route::post('/header', [HeaderController::class,'store'])->name('header.store');
    Route::delete('/500/{header}', [MetaController::class,'destroy'])->name('headers.destroy');
    Route::post('/subcategory', [SubcategoryController::class,'store'])->name('subcategory.store');
    Route::post('/meta', [MetaController::class,'store'])->name('meta.store');
    Route::delete('/typography/{live}', [MetaController::class,'destroy'])->name('live.destroy');
    Route::post('/layout', [LayoutController::class, 'store'])->name('layout.store');
    Route::delete('/lock/{layout}', [LayoutController::class,'destroy'])->name('layout.destroy');
    Route::post('/neighbour', [NeighbourController::class, 'store'])->name('neighbour.store');
    Route::delete('/login-example/{result}', [NeighbourController::class,'destroy'])->name('result.destroy');


    // Route::get('/users/show', Users::class)->name('users');
    // Route::get('/users/destroy', Users::class)->name('users');
    // Route::get('/edit', Edit::class)->name('edit');
   
    // Route::get('/student', Student::class)->name('student');
    // Route::resource('companies', CompanyController::class);
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    // Route::get('/transaction_create', Transaction::class)->name('transaction_create');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');


    // Route::get('/users/edit', [CompanyController::class, 'edit']);




    // Route::get('/create', Create::class)->name('create');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');
});


