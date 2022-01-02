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
        // Absen Siswa
        Route::get('/absen-siswa', 'absenController@index')->name('absen-siswa');
        Route::get('/absen-siswa/tambah', 'absenController@create')->name('absen-siswa-tambah');
        Route::get('/absen-siswa/show/{id}', 'absenController@show')->name('absen-siswa-show');
        Route::post('/absen-siswa/store', 'absenController@store')->name('absen-siswa-tambah-post');
        Route::get('/absen-siswa/edit/{id}', 'absenController@edit')->name('absen-siswa-edit');
        Route::delete('/absen-siswa/hapus/{id}', 'absenController@delete')->name('absen-siswa-hapus');
        // Laporan
        Route::get('/laporan', 'laporanController@index')->name('laporan');
        Route::get('/laporan/show/{id}', 'laporanController@show')->name('laporan-show');
        Route::get('/laporan/detail-laporan/{id}', 'laporanController@detailLaporan')->name('laporan-detail');

    });
});
