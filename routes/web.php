<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PJController;
use Illuminate\Support\Facades\Route;


//Route::view('/', 'welcome');


Route::view('/newPJ', 'forms/formularioPJ')->name('sheet.newSheet');

Route::post('/sheet', [PJController::class,'store'])->name('pj.store');

Route::get('/equipment', [EquipmentController::class,'store'])->name('eq.store');

Route::post('/equipment', [EquipmentController::class,'addItem'])->name('eq.addItem');

Route::get('/myCharacters', [PJController::class,'addEquipment'])->name('listPJ.addEQ');//

Route::get('/mysheets', [PJController::class,'pjList'])->name('listPJ.viewList');

Route::get('/sheet/{id}', [PJController::class,'viewSheet'])->name('listPJ.viewSheet');

Route::get('/updateSheet/{id}', [PJController::class,'updateSheet'])->name('sheet.updateSheet');

Route::post('/mysheets', [PJController::class,'deleteSheet'])->name('sheet.deleteSheet');

Route::view('/newGame', 'forms/formularioGame')->name('game.newGame');

Route::post('/game', [GameController::class,'store'])->name('game.store');

Route::get('/myGames', [GameController::class,'gameList'])->name('listgame.viewList');

Route::get('/game/{id}', [GameController::class,'viewGame'])->name('listGame.viewGame');

Route::post('/myGames', [GameController::class,'manageGame'])->name('listgame.viewList');

Route::get('/updateGame/{id}', [GameController::class,'updateGame'])->name('game.updateGame');
