<?php

Route::get('/demande', function () {
    return view('govpay::demandes.create');
});

Route::resource('demandes', Abdazz\GovPayClient\Http\Controllers\DemandeController::class);


Route::get('/callback', [Abdazz\GovPayClient\Http\Controllers\DemandeController::class, 'callback'])->name('callback');

Route::get('/api/infos-demande/{ref}/{s}', [Abdazz\GovPayClient\Http\Controllers\DemandeController::class, "sendData"])->name("sendData");
