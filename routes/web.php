
<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;


// ==========================================
// ROUTE LOGIN
// ==========================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit');
        // ROUTE REGISTRASI
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');

    Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.submit');

});



// ==========================================
// ROUTE YANG MEMERLUKAN LOGIN
// ==========================================

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('surat-masuk.index');
    })->name('dashboard');


    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');


    // ======================================
    // ROUTE KHUSUS PETUGAS
    // ======================================

    Route::middleware('can:manage-letters')->group(function () {

        // CRUD Surat Masuk selain index dan show
        Route::resource('surat-masuk', SuratMasukController::class)
            ->except(['index', 'show']);

        // CRUD Surat Keluar selain index dan show
        Route::resource('surat-keluar', SuratKeluarController::class)
            ->except(['index', 'show']);

    });


    // ======================================
    // ROUTE YANG BOLEH DIAKSES SEMUA USER
    // ======================================

    // Surat Masuk: hanya daftar dan detail
    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show']);

    // Surat Keluar: hanya daftar dan detail
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['index', 'show']);

});


// ==========================================
// HALAMAN UTAMA
// ==========================================

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// ROUTE REGISTRASI SIM-SURAT

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'register'])
        ->name('register.submit');

});