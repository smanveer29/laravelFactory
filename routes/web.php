<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix("post")->group(function(){
    Route::name("post.")->group(function(){
        Route::get("list",[PostController::class,'list'])->name("list");
        Route::get("delete",[PostController::class,'delete'])->name("delete");
        Route::get("edit",[PostController::class,'edit'])->name("edit");
        Route::post("update",[PostController::class,'update'])->name("update");
    });
});