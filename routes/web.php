<?php

use App\Http\Controllers\AreaMakamController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\PlotController as AdminPlotController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AccountController;

use App\Http\Controllers\AdminPaymentSettingController;

use App\Models\Category;



Route::get('/', function () {

    $categories = \App\Models\Category::with('plots')->get();

    $plots = \App\Models\Plot::with('category')
        ->orderBy('kode_plot')
        ->get();

    return view('home.index', compact(
        'categories',
        'plots'
    ));

})->name('home');


// =========================================================
// BOOKING
// =========================================================

Route::get('/booking/{plot}/create', [BookingController::class, 'create'])
    ->name('booking.create');

Route::post('/booking/{plot}', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/booking/detail/{booking}', [BookingController::class, 'show'])
    ->name('booking.show');

// Cek Booking
Route::get('/cek-booking', [BookingController::class, 'checkForm'])
    ->name('booking.check');

Route::post('/cek-booking', [BookingController::class, 'check'])
    ->name('booking.check.process');


// payment
Route::get('/payment/{booking}/create', [PaymentController::class, 'create'])
    ->name('payment.create');

Route::post('/payment/{booking}', [PaymentController::class, 'store'])
    ->name('payment.store');

Route::get('/payment/{booking}/success', [PaymentController::class, 'success'])
    ->name('payment.success');

Route::get('/payment/{booking}/installment', [PaymentController::class, 'installment'])
    ->name('payment.installment');

Route::post('/payment/{booking}/installment', [PaymentController::class, 'storeInstallment'])
    ->name('payment.installment.store');


    // =========================================================
// ADMIN
// =========================================================


Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.process');

Route::middleware('admin')->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Booking
    Route::get('/bookings', [AdminBookingController::class, 'index'])
    ->name('admin.bookings.index');

    Route::post('/payments/{payment}/verify', [AdminPaymentController::class, 'verify'])
    ->name('admin.payments.verify');

Route::post('/payments/{payment}/reject', [AdminPaymentController::class, 'reject'])
    ->name('admin.payments.reject');

Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])
    ->name('admin.bookings.show');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');

         // =========================
    // KELOLA PETAK
    // =========================

    Route::get('/plots', [AdminPlotController::class, 'index'])
        ->name('admin.plots.index');

    Route::get('/plots/create', [AdminPlotController::class, 'create'])
        ->name('admin.plots.create');

    Route::post('/plots', [AdminPlotController::class, 'store'])
        ->name('admin.plots.store');

    Route::get('/plots/{plot}/edit', [AdminPlotController::class, 'edit'])
        ->name('admin.plots.edit');

    Route::put('/plots/{plot}', [AdminPlotController::class, 'update'])
        ->name('admin.plots.update');

    Route::delete('/plots/{plot}', [AdminPlotController::class, 'destroy'])
        ->name('admin.plots.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');


// =========================
// KELOLA KATEGORI
// =========================

Route::get('/categories', [AdminCategoryController::class, 'index'])
    ->name('admin.categories.index');

Route::get('/categories/create', [AdminCategoryController::class, 'create'])
    ->name('admin.categories.create');

Route::post('/categories', [AdminCategoryController::class, 'store'])
    ->name('admin.categories.store');

Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])
    ->name('admin.categories.edit');

Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])
    ->name('admin.categories.update');

Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])
    ->name('admin.categories.destroy');

    Route::get('/bookings/{booking}/ktp', [AdminBookingController::class, 'ktp'])
    ->name('admin.bookings.ktp');

        // ==============================
    // PENGATURAN PEMBAYARAN
    // ==============================

    Route::get('/pengaturan-pembayaran',
        [AdminPaymentSettingController::class, 'edit'])
        ->name('admin.payment-settings.edit');

    Route::post('/pengaturan-pembayaran',
        [AdminPaymentSettingController::class, 'update'])
        ->name('admin.payment-settings.update');


    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');

 Route::get('/pengaturan-akun', [AccountController::class, 'edit'])
        ->name('admin.account.edit');

    Route::put('/pengaturan-akun/password', [AccountController::class, 'updatePassword'])
        ->name('admin.account.password.update');

});


Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');


Route::get('/panduan', function () {
    return view('panduan.index');
})->name('panduan');

Route::get('/petak-saya', [BookingController::class, 'petakSaya'])
    ->name('petak.saya');

Route::post('/petak-saya/cek', [BookingController::class, 'cekPetakSaya'])
    ->name('petak.saya.cek');

Route::get('/petak-saya/{booking}/pdf', [BookingController::class, 'petakSayaPdf'])
    ->name('petak.saya.pdf');


