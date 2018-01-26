<?php

Route::group(['prefix' => 'ik-provinsi', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\IkProvinsi\Http\Controllers\IkProvinsiController@index',
        'create'     => 'Bantenprov\IkProvinsi\Http\Controllers\IkProvinsiController@create',
        'store'     => 'Bantenprov\IkProvinsi\Http\Controllers\IkProvinsiController@store',
        'show'      => 'Bantenprov\IkProvinsi\Http\Controllers\IkProvinsiController@show',
        'update'    => 'Bantenprov\IkProvinsi\Http\Controllers\IkProvinsiController@update',
        'destroy'   => 'Bantenprov\IkProvinsi\Http\Controllers\IkProvinsiController@destroy',
    ];

    Route::get('/',$controllers->index)->name('ik-provinsi.index');
    Route::get('/create',$controllers->create)->name('ik-provinsi.create');
    Route::post('/store',$controllers->store)->name('ik-provinsi.store');
    Route::get('/{id}',$controllers->show)->name('ik-provinsi.show');
    Route::put('/{id}/update',$controllers->update)->name('ik-provinsi.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('ik-provinsi.destroy');

});

