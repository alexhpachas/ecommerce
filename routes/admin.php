<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PDFExportController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PDFexportcostoEnvio;
use App\Http\Controllers\Admin\PDFexportProductosVendidoController;
use App\Http\Controllers\Admin\PDFexportVentaController;
use App\Http\Controllers\Admin\PDFexportVentasporEnviarController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PDFStockAgotadoController;
use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\CityComponent;
use App\Http\Livewire\Admin\ColorsComponent;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\UserComponent;
use App\Http\Livewire\Reportes\ReportComponent;
use Illuminate\Support\Facades\Route;

/* RUTA PARA MOSTRAR LISTA DE PRODUCTOS */
Route::get('/', ShowProducts::class)->name('admin.index');

Route::get('products/create', CreateProduct::class)->name('admin.products.create');

/* RUTA PARA EDITAR UN PRODUCTO */
Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');

/* RUTA PARA GUARDAR LAS IMAGENES EN LA BD  */
Route::post('products/{product}/files', [ProductController::class,'files'])->name('admin.products.files');

Route::get('categories', [CategoryController::class,'index'])->name('admin.categories.index');

Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');

Route::get('colors',ColorsComponent::class)->name('admin.colors.index');

Route::get('brands', BrandComponent::class )->name('admin.brands.index');

Route::get('orders', [OrderController::class,'index'])->name('admin.orders.index');

Route::get('orders/{order}', [OrderController::class,'show'])->name('admin.orders.show');

Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');

Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');

Route::get('cities/{city}', CityComponent::class)->name('admin.cities.show');

Route::get('users', UserComponent::class)->name('admin.users.index');

Route::get('reports',ReportComponent::class)->name('admin.reports.index');


/* RUTA PARA EXPORTAR LOS REPORTES A PDF */

Route::get('export/', [PDFExportController::class,'exportPDF'])->name('admin.export.index');

Route::get('export/stockagotado',[PDFStockAgotadoController::class,'stockAgotadoPDF'])->name('admin.agotado.index');

Route::get('export/ventas', [PDFexportVentaController::class,'ventasPDF'])->name('admin.ventas.index');

Route::get('export/costoenvio',[PDFexportcostoEnvio::class,'envioPDF'])->name('admin.costo.index');

Route::get('export/productosvendidos', [PDFexportProductosVendidoController::class,'productosvendidosPDF'])->name('admin.vendidos.index');

Route::get('export/ventasporenviar',[PDFexportVentasporEnviarController::class,'ventasporenviarPDF'])->name('admin.ventasporenviar.index');

/* RUTA PARA EXPORTAR A EXCEL */

Route::get('exportExcel/costoenvio',[PDFexportcostoEnvio::class,'envioExcel'])->name('admin.costoE.index');

Route::get('exportExcel/ventas',[PDFexportVentaController::class,'ventasExcel'])->name('admin.ventasE.index');

Route::get('exportExcel/vendidos',[PDFexportProductosVendidoController::class,'vendidosExcel'])->name('admin.vendidosE.index');

Route::get('exportExcel/porenviar',[PDFexportVentasporEnviarController::class,'porEnviarExcel'])->name('admin.ventasporenviarE.index');

Route::get('exportExcel/stockproductos',[PDFExportController::class,'sctokExcel'])->name('admin.stockE.index');

Route::get('exportExcel/productosagotados',[PDFStockAgotadoController::class,'agotadosExcel'])->name('admin.stockagotadoE.index');