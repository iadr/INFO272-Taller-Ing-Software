<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Producto
//Read
Route::get('/productos', 'ProductoController@despliega')->name('productos');
Route::post('/productos', 'ProductoController@buscar')->name('Busqueda');
Route::post('/BusquedaAvanzada','ProductoController@bAvanzada')->name('BusquedaAvanzada');

  //Update
  Route::post('/editarProducto','ProductoController@editar')->name('editar');
  Route::post('/productoEditado','ProductoController@TerminarEdicion')->name('GuardarEdicion');
  //Create
  Route::get('/crearProducto',function(){
    return view('Producto.crearProducto');
  })->name('crearProducto');
  Route::post('/prods','ProductoController@GuardarProductoNuevo')->name('GuardarProductoNuevo');
  //"Delete"
  Route::post('eliminarProducto','ProductoController@borrarProducto')->name('borrarProducto');



//Carro de Compra
Route::post('/agregarPC', 'ProductoController@agregarCarrito')->name('agregarCarrito');
Route::get('/CarroCompra',function(){
	return view('Producto.CarroVenta');
})->name('desplegarCarro');
Route::get('cancelarVenta', 'ProductoController@cancelarVenta')->name('cancelarVenta');
Route::post('eliminarPC', 'ProductoController@eliminarProductoCarro')->name('eliminarProductoCarro');
Route::post('/ventaFinalizada', 'ProductoController@finalizarVenta')->name('finalizarVenta');
Route::post('editarPC', 'ProductoController@editarProductoCarro')->name('editarProductoCarro');


//proveedor//////////
Route::get('/proveedores', 'ProveedorController@desplegarProveedores')->name('proveedores');
Route::post('/proveedores', 'ProveedorController@buscar')->name('BusquedaProveedor');

Route::post('/editarProveedores', 'ProveedorController@editarProveedor')->name('editarProveedor');

Route::get('/crearProveedor',function(){
  return view('Proveedor.crearProveedor');
})->name('crearProveedor');
Route::post('/provs','ProveedorController@GuardarNuevoProveedor')->name('GuardarNuevoProveedor');

Route::post('/proveedorEditado','ProveedorController@TerminarEdicionProv')->name('GuardarEdicionProv');
Route::post('eliminarProveedor','ProveedorController@borrarProveedor')->name('borrarProveedor');

////////graficos
Route::get('grafico','ChartController@graf1')->name('graf1');

Route::post('graficobuscado','ChartController@graf2')->name('graf2');

/////USUARIOS
Route::get('/usuarios',function(){
  return view('crearUsuario');
})->name('crearUsuario');
