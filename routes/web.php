<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KolaboratorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'userview'])->name('user.index');
Route::get('/detailcard/{id}', [UserController::class, 'detailcard'])->name('user.detailcard');
Route::get('/galleri', [UserController::class, 'galleri'])->name('user.galleri');
Route::get('/katalog', [UserController::class, 'katalog'])->name('user.katalog');
Route::get('/kolabora/{id}', [UserController::class, 'kolaborator'])->name('user.kolaborator');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [RoleController::class, 'redirectUser'])->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'role:admin',
    'verified',
])->group(function () {

    Route::get('/admin/home', [ImageController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'galery'], function () {
        Route::get('/imagesview', [ImageController::class, 'indexGalery'])->name('images.index');
        Route::get('/images_create', [ImageController::class, 'create'])->name('images.create');
        Route::post('/images_store', [ImageController::class, 'store'])->name('images.store');
        Route::get('/images_edit/{id}', [ImageController::class, 'edit'])->name('images.edit');
        Route::post('/images_update/{id}', [ImageController::class, 'update'])->name('images.update');
        Route::delete('/imagesdelete/{id}', [ImageController::class, 'destroy'])->name('images.delete');
    });

    Route::group(['prefix' => 'kolabor'], function () {
        Route::get('/kolaboratorview', [AdminController::class, 'indexKolaborator'])->name('kolaborator.index.admin');
        Route::get('/kolaborator_create', [AdminController::class, 'createKolaborator'])->name('kolaborator.create');
        Route::get('/kolaborator_show/{id}', [AdminController::class, 'showKolaborator'])->name('kolaborator.show');
        Route::post('/kolaborator_store', [AdminController::class, 'storeKolaborator'])->name('kolaborator.store');
        Route::get('/kolaborator_edit/{id}', [AdminController::class, 'editKolaborator'])->name('kolaborator.edit');
        Route::post('/kolaborator_update/{id}', [AdminController::class, 'updateKolaborator'])->name('kolaborator.update');
        Route::delete('/kolaboratordelete/{id}', [AdminController::class, 'destroyKolaborator'])->name('kolaborator.delete');
        Route::get('/kolaborator_ulasan/{id}', [AdminController::class, 'ulasanKolaborator'])->name('kolaborator.ulasan.admin');
        Route::post('/kolaborator_ulasan_create/{id}', [AdminController::class, 'aktifUlasan'])->name('kolaborator.ulasan.aktif');
        Route::delete('/kolaborator_ulasan_delete/{id}', [ReviewController::class, 'destroy'])->name('kolaborator.ulasan_hapus');
    });

    Route::group(['prefix' => 'event'], function () {
        Route::get('/eventview', [EventController::class, 'index'])->name('event.index');
        Route::get('/event_create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event_store', [EventController::class, 'store'])->name('event.store');
        Route::get('/event_show/{id}', [EventController::class, 'show'])->name('event.show');
        Route::get('/event_edit/{id}', [EventController::class, 'edit'])->name('event.edit');
        Route::get('/event_peserta/{id}', [EventController::class, 'peserta'])->name('event.peserta');
        Route::post('/event_update/{id}', [EventController::class, 'update'])->name('event.update');
        Route::delete('/eventdelete/{id}', [EventController::class, 'destroy'])->name('event.delete');
        Route::post('/store_harga/{id}', [EventController::class, 'storeHargaEvent'])->name('harga.store');
        Route::post('/iklan_event/{id}', [EventController::class, 'aktifIklan'])->name('iklan.aktif');
    });

    Route::group(['prefix' => 'pelanggan'], function () {
        Route::get('/view', [AdminController::class, 'costumer'])->name('costumer.index');
    });
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'role:user', 'verified'])->group(function () {
    Route::post('/pembayaranevent', [UserController::class, 'pembayaranevent'])->name('pembayaranevent');
    Route::post('/pemesanan', [UserController::class, 'pemesanan'])->name('pemesanan');
    Route::get('kelasku', [UserController::class, 'kelasku_view'])->name('kelasku.view');
    Route::get('/cetak-tiket/{id}', [UserController::class, 'cetak'])->name('cetak.tiket');
    Route::get('/review/{id}', [UserController::class, 'review'])->name('user.review');
    Route::get('/profilUser/{id}', [UserController::class, 'profilUser'])->name('user.profiluser');
    Route::post('/profiluserupdate/{id}', [UserController::class, 'updateUser'])->name('user.updateprofile');
    Route::post('/review_store/{id}', [ReviewController::class, 'store'])->name('user_review.store');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'role:kolaborator', 'verified'])->group(function () {
    Route::group(['prefix' => 'kolaborator'], function () {
        Route::get('/home', [KolaboratorController::class, 'index'])->name('kolaborator.home');
        Route::post('/edit_profile/{id}', [KolaboratorController::class, 'updateKolaborator'])->name('kolaborator.editprofile');
        Route::get('/event/add', [KolaboratorController::class, 'createEvent'])->name('kolaborator.event.add');
        Route::post('/event/store', [KolaboratorController::class, 'storeEvent'])->name('kolaborator.event.store');
        Route::get('/event/edit/{id}', [KolaboratorController::class, 'editEvent'])->name('kolaborator.event.edit');
        Route::post('/event/update/{id}', [KolaboratorController::class, 'updateEvent'])->name('kolaborator.event.update');
        Route::delete('/event/delete/{id}', [KolaboratorController::class, 'destroyEvent'])->name('kolaborator.event.delete');
        Route::get('/event/view', [KolaboratorController::class, 'eventkolaborator'])->name('kolaborator.event.view');
        Route::get('/event/show/{id}', [KolaboratorController::class, 'show'])->name('kolaborator.event.show');
        Route::get('/event/peserta/{id}', [KolaboratorController::class, 'peserta'])->name('kolaborator.event.peserta');

        Route::get('/galery/index', [KolaboratorController::class, 'index_galery'])->name('galery_kolaborator.index');
        Route::get('/galery/add', [KolaboratorController::class, 'create_galery'])->name('galery_kolaborator.create');
        Route::post('/galery/store', [KolaboratorController::class, 'store_galery'])->name('galery_kolaborator.store');
        Route::get('/galery/edit/{id}', [KolaboratorController::class, 'edit_galery'])->name('galery_kolaborator.edit');
        Route::post('/galery/update/{id}', [KolaboratorController::class, 'update_galery'])->name('galery_kolaborator.update');
        Route::delete('/galery/delete/{id}', [KolaboratorController::class, 'destroy_galery'])->name('galery_kolaborator.delete');
    });
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('admin.logout');
