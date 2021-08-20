<?php

use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

/* RUTA PARA MOSTRAR LISTA DE PRODUCTOS */
Route::get('/', ShowProducts::class)->name('admin.index');

Route::get('products/create', CreateProduct::class)->name('admin.products.create');

/* RUTA PARA EDITAR UN PRODUCTO */
Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');