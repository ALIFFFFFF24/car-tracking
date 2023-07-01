<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\PdfGeneratorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TrackingController;

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
  
Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('deliveries', DeliveryController::class);
    Route::resource('checkpoints', CheckpointController::class);
    Route::resource('trackings', TrackingController::class);
    Route::get('/vehicles/edit/{id}', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::get('/deliveries/approval/{id}', [DeliveryController::class, 'approval'])->name('deliveries.approval');
    Route::get('/deliveries/finish/{id}', [DeliveryController::class, 'finish'])->name('deliveries.finish');
    Route::post('/trackings/saveOrUpdateData/', [TrackingController::class, 'saveOrUpdateData'])->name('trackings.saveOrUpdateData');
    Route::get('/pdf-sopir', [PdfGeneratorController::class, 'pdfSopir'])->name('pdf.laporanSopir');
    Route::get('/pdf-kendaraan', [PdfGeneratorController::class, 'pdfKendaraan'])->name('pdf.laporanKendaraan');
    Route::get('/pdf-delivery', [PdfGeneratorController::class, 'pdfDelivery'])->name('pdf.laporanDelivery');
    Route::get('/pdf-sopir-periode/{date1}/{date2}', [PdfGeneratorController::class, 'pdfSopirPeriode'])->name('pdf.laporanSopirPeriode');
    Route::get('/pdf-kendaraan-periode/{date1}/{date2}', [PdfGeneratorController::class, 'pdfKendaraanPeriode'])->name('pdf.laporanKendaraanPeriode');
    Route::get('/pdf-delivery-periode/{date1}/{date2}', [PdfGeneratorController::class, 'pdfDeliveryPeriode'])->name('pdf.laporanDeliveryPeriode');
    Route::get('/report-sopir', [ReportController::class, 'reportSopir'])->name('reports.reportSopir');
    Route::get('/report-kendaraan', [ReportController::class, 'reportKendaraan'])->name('reports.reportKendaraan');
    Route::get('/report-delivery', [ReportController::class, 'reportDelivery'])->name('reports.reportDelivery');
    Route::get('/search-sopir-periode/{date1}/{date2}', [DriverController::class, 'searchSopirPeriode'])->name('drivers.searchSopirPeriode');
    Route::get('/print-delivery-order/{id}', [PdfGeneratorController::class, 'pdfDeliveryOrder'])->name('pdf.pdfDeliveryOrder');
});

