<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataSurveyController;
use App\Http\Controllers\DataKenyataanController;
use App\Http\Controllers\DataHarapanController;
use App\Http\Controllers\FuzzyfikasiController;
use App\Http\Controllers\DefuzzyfikasiController;
use App\Http\Controllers\HasilController;
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

Route::any('/', [LoginController::class, 'index'])->name('index');
Route::any('/proses_login',[LoginController::class, 'prosesLogin'])->name('proses_login');

Route::middleware(['auth'])->group(function () {
        Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home_admin');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout_admin');
        Route::get('/profile_admin', [AdminController::class, 'profileAdmin'])->name('profile_admin');
        Route::any('/update_profile', [AdminController::class, 'updateProfile'])->name('update_profile');

        Route::prefix('survey')->group( function (){
                Route::any('/data_survey', [DataSurveyController::class, 'index'])->name('data_survey');
                Route::any('/hapus_survey{data_survey_id}', [DataSurveyController::class, 'hapusSurvey'])->name('hapus_survey');
                Route::any('/kelola_survey', [DataSurveyController::class, 'kelolaSurvey'])->name('kelola_survey');
        });
        Route::prefix('kenyataan')->group( function (){
                Route::any('/data_kenyataan', [DataKenyataanController::class, 'index'])->name('data_kenyataan');
                Route::any('/kelola_kenyataan', [DataKenyataanController::class, 'kelolaKenyataan'])->name('kelola_kenyataan');
                Route::any('/hapus_kenyataan', [DataKenyataanController::class, 'hapusKenyataan'])->name('hapus_kenyataan');
        });
        Route::prefix('harapan')->group( function (){
                Route::any('/data_harapan', [DataHarapanController::class, 'index'])->name('data_harapan');
                Route::any('/kelola_harapan', [DataHarapanController::class, 'kelolaHarapan'])->name('kelola_harapan');
                Route::any('/simpan_harapan', [DataHarapanController::class, 'simpanHarapan'])->name('simpan_harapan');
                Route::any('/edit_harapan', [DataHarapanController::class, 'editHarapan'])->name('edit_harapan');
                Route::any('/hapus_harapan{harapan_id}', [DataHarapanController::class, 'hapusHarapan'])->name('hapus_harapan');
        });
        Route::prefix('fuzzyfikasi')->group( function (){
                Route::any('/data_fuzzyfikasi', [FuzzyfikasiController::class, 'index'])->name('data_fuzzyfikasi');
                Route::any('/kelola_fuzzyfikasi', [FuzzyfikasiController::class, 'kelolaFuzzyfikasi'])->name('kelola_fuzzyfikasi');
                Route::any('/hapus_fuzzyfikasi', [FuzzyfikasiController::class, 'hapusFuzzy'])->name('hapus_fuzzyfikasi');
        });
        Route::prefix('defuzzyfikasi')->group( function (){
                Route::any('/data_defuzzyfikasi', [DefuzzyfikasiController::class, 'index'])->name('data_defuzzyfikasi');
                Route::any('/kelola_defuzzyfikasi', [DefuzzyfikasiController::class, 'kelolaDefuzzyfikasi'])->name('kelola_defuzzyfikasi');
                Route::any('/hapus_defuzzyfikasi', [DefuzzyfikasiController::class, 'hapusDefuzzy'])->name('hapus_defuzzyfikasi');
        });
        Route::prefix('hasil')->group( function (){
                Route::any('/data_hasil', [HasilController::class, 'index'])->name('data_hasil');
                Route::any('/hapus_hasil', [HasilController::class, 'hapusHasil'])->name('hapus_hasil');
                Route::any('/print_hasil', [HasilController::class, 'printHasil'])->name('print_hasil');
        });
});
});