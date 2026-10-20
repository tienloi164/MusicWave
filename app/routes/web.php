<?php

use Illuminate\Support\Facades\Route;
use App\Models\Song;
use App\Http\Controllers\SongController;

Route::get('/', function () {
    $songs = Song::latest()->get();

    return view('home', compact('songs'));
});

Route::resource('songs', SongController::class);