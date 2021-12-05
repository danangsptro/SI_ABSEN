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
    });
});
