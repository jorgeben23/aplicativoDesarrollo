<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InventarioController;


Route::get('', [HomeController::class, 'index']);
Route::get('/admin/inventario', [InventarioController::class, 'index']);
Route::post('/admin/crear', [InventarioController::class, 'crear']);
Route::get('/admin/listar', [InventarioController::class, 'listar']);
Route::post('/admin/edit', [InventarioController::class, 'edit']);
Route::post('/admin/editar', [InventarioController::class, 'editar']);