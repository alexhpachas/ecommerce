<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MethodsPayment;
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
Route::get('/', ShowProducts::class)->middleware('can:admin.index')->name('admin.index');

Route::get('products/create', CreateProduct::class)->middleware('can:admin.products.create')->name('admin.products.create');

/* RUTA PARA EDITAR UN PRODUCTO */
Route::get('products/{product}/edit', EditProduct::class)->middleware('can:admin.products.edit')->name('admin.products.edit');

/* RUTA PARA GUARDAR LAS IMAGENES EN LA BD  */
Route::post('products/{product}/files', [ProductController::class,'files'])->name('admin.products.files');

Route::get('categories', [CategoryController::class,'index'])->middleware('can:admin.categories.index')->name('admin.categories.index');

Route::get('categories/{category}', ShowCategory::class)->middleware('can:admin.categories.show')->name('admin.categories.show');

Route::get('colors',ColorsComponent::class)->middleware('can:admin.colors.index')->name('admin.colors.index');

Route::get('brands', BrandComponent::class )->middleware('can:admin.brands.index')->name('admin.brands.index');

Route::get('orders', [OrderController::class,'index'])->middleware('can:admin.orders.index')->name('admin.orders.index');

Route::get('orders/{order}', [OrderController::class,'show'])->middleware('can:admin.orders.show')->name('admin.orders.show');

Route::get('departments', DepartmentComponent::class)->middleware('can:admin.departments.index')->name('admin.departments.index');

Route::get('departments/{department}', ShowDepartment::class)->middleware('can:admin.cities.index')->name('admin.departments.show');

Route::get('cities/{city}', CityComponent::class)->middleware('can:admin.districts.index')->name('admin.cities.show');

Route::get('users', UserComponent::class)->middleware('can:admin.users.index')->name('admin.users.index');

Route::get('reports',ReportComponent::class)->middleware('can:admin.reports.index')->name('admin.reports.index');

Route::get('methods/payment',[MethodsPayment::class,'index'])->middleware('can:admin.payment.index')->name('admin.methods.index');


/* RUTA PARA EXPORTAR LOS REPORTES A PDF */

Route::get('export/', [PDFExportController::class,'exportPDF'])->middleware('can:admin.reports.pdf')->name('admin.export.index');

Route::get('export/stockagotado',[PDFStockAgotadoController::class,'stockAgotadoPDF'])->middleware('can:admin.reports.pdf')->name('admin.agotado.index');

Route::get('export/ventas', [PDFexportVentaController::class,'ventasPDF'])->middleware('can:admin.reports.pdf')->name('admin.ventas.index');

Route::get('export/costoenvio',[PDFexportcostoEnvio::class,'envioPDF'])->middleware('can:admin.reports.pdf')->name('admin.costo.index');

Route::get('export/productosvendidos', [PDFexportProductosVendidoController::class,'productosvendidosPDF'])->middleware('can:admin.reports.pdf')->name('admin.vendidos.index');

Route::get('export/ventasporenviar',[PDFexportVentasporEnviarController::class,'ventasporenviarPDF'])->middleware('can:admin.reports.pdf')->name('admin.ventasporenviar.index');

/* RUTA PARA EXPORTAR A EXCEL */

Route::get('exportExcel/costoenvio',[PDFexportcostoEnvio::class,'envioExcel'])->middleware('can:admin.reports.excel')->name('admin.costoE.index');

Route::get('exportExcel/ventas',[PDFexportVentaController::class,'ventasExcel'])->middleware('can:admin.reports.excel')->name('admin.ventasE.index');

Route::get('exportExcel/vendidos',[PDFexportProductosVendidoController::class,'vendidosExcel'])->middleware('can:admin.reports.excel')->name('admin.vendidosE.index');

Route::get('exportExcel/porenviar',[PDFexportVentasporEnviarController::class,'porEnviarExcel'])->middleware('can:admin.reports.excel')->name('admin.ventasporenviarE.index');

Route::get('exportExcel/stockproductos',[PDFExportController::class,'sctokExcel'])->middleware('can:admin.reports.excel')->name('admin.stockE.index');

Route::get('exportExcel/productosagotados',[PDFStockAgotadoController::class,'agotadosExcel'])->middleware('can:admin.reports.excel')->name('admin.stockagotadoE.index');



