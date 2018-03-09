<?php

Route::group(['prefix' => 'api/angka-pendidikan-ditamatkan', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@index',
        'create'    => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@create',
        'show'      => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@show',
        'store'     => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@store',
        'edit'      => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@edit',
        'update'    => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@update',
        'destroy'   => 'Bantenprov\PendidikanDitamatkan\Http\Controllers\PendidikanDitamatkanController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('angka-pendidikan-ditamatkan.index');
    Route::get('/create',       $controllers->create)->name('angka-pendidikan-ditamatkan.create');
    Route::get('/{id}',         $controllers->show)->name('angka-pendidikan-ditamatkan.show');
    Route::post('/',            $controllers->store)->name('angka-pendidikan-ditamatkan.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('angka-pendidikan-ditamatkan.edit');
    Route::put('/{id}',         $controllers->update)->name('angka-pendidikan-ditamatkan.update');
    Route::delete('/{id}',      $controllers->destroy)->name('angka-pendidikan-ditamatkan.destroy');
});
