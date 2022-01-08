<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/backend/dashboard'));
});


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('backend')->group(function () {
        Route::get('/dashboard', 'dashboardAdminController@index')->name('dashboard');
        Route::get('/register-user', 'registerUserController@index')->name('register-user');
        Route::post('/register-user/store/{id?}', 'registerUserController@store')->name('register-user-store');
        Route::get('/register-user/delete/{id}', 'registerUserController@deleteUser')->name('register-user-delete');
        // Mata Pelajaran
        Route::get('/mata-pelajaran', 'mataPelajaranController@index')->name('mata-pelajaran');
        Route::get('/mata-pelajaran/tambah', 'mataPelajaranController@create')->name('mata-pelajaran-tambah');
        Route::post('/mata-pelajaran/store', 'mataPelajaranController@store')->name('mata-pelajaran-tambah-post');
        Route::get('/mata-pelajaran/edit/{id}', 'mataPelajaranController@edit')->name('mata-pelajaran-edit');
        Route::post('/mata-pelajaran/update', 'mataPelajaranController@update')->name('mata-pelajaran-update');
        Route::delete('/mata-pelajaran/hapus/{id}', 'mataPelajaranController@delete')->name('mata-pelajaran-hapus');
        // Rombel
        Route::get('/rombel', 'rombelController@index')->name('rombel');
        Route::get('/rombel/tambah', 'rombelController@create')->name('rombel-tambah');
        Route::post('/rombel/store', 'rombelController@store')->name('rombel-tambah-post');
        Route::get('/rombel/edit/{id}', 'rombelController@edit')->name('rombel-edit');
        Route::post('/rombel/update', 'rombelController@update')->name('rombel-update');
        Route::delete('/rombel/hapus/{id}', 'rombelController@delete')->name('rombel-hapus');
        // Siswa
        Route::get('/siswa', 'siswaController@index')->name('siswa');
        Route::get('/siswa/tambah', 'siswaController@create')->name('siswa-tambah');
        Route::post('/siswa/store', 'siswaController@store')->name('siswa-tambah-post');
        Route::get('/siswa/edit/{id}', 'siswaController@edit')->name('siswa-edit');
        Route::post('/siswa/update', 'siswaController@update')->name('siswa-update');
        Route::delete('/siswa/hapus/{id}', 'siswaController@delete')->name('siswa-hapus');
        // Absen Siswas
        Route::get('/absen-siswa', 'absenController@index')->name('absen-siswa');
        Route::get('/absen-siswa/{id}', 'absenController@show')->name('absen-siswa-show');
        Route::post('/absen-siswa/api', 'absenController@api')->name('absen-siswa.api');
        Route::get('/abse-siswa/absen/{id}', 'absenController@absen')->name('absen-siswa.absen');
        // Laporan
        Route::get('/laporan', 'laporanController@index')->name('laporan');
        Route::post('/laporan/api', 'laporanController@api')->name('laporan.api');
        Route::get('/laporan/export-pdf', 'laporanController@exportPDF')->name('laporan.exportPDF');
        // Jadwal
        Route::resource('/jadwal', 'JadwalController');
        Route::post('/jadwal/api', 'JadwalController@api')->name('jadwal.api');
        Route::get('/jadwal/export/siswa', 'JadwalController@exportSiswa')->name('jadwal.exportSiswa');
        Route::get('/jadwa/siswa/delete/{id}', 'JadwalController@deleteSiswa')->name('jadwal.deleteSiswa');
        Route::post('/jadwal/update/jadwal/{id}', 'JadwalController@updateJadwal')->name('jadwal.updateJadwal');
    });
});
