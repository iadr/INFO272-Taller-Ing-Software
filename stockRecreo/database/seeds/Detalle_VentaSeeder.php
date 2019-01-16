<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Detalle_VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $numeroVentas = 100;
      $arrayVendedor = array('Sebastian Alarcon','Cristian Ordoñez','Israel Diaz','Fernando Reyes');
      $idProductos = DB::table('productos')->pluck('id');
    
      //Creamos un for para crear las ventas
      for($i=0;$i<$numeroVentas;$i++){
        echo "Venta ". $i;
        $montoVenta = 0;
        $nombreVendedor = $faker->randomElement($arrayVendedor);
        $fechaVenta = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+1 year',
                                              $timezone = null);
        $numeroProductosPorVenta = $faker->numberBetween(1,30); //Se venderán máx 30 prod. distintos por venta
        $cantidadProductosVenta = 0;
        $arrayProductos = array(); //Vaciamos el array


        //Creamos un array con productos aleatorios y su precio
        for($j=0;$j<$numeroProductosPorVenta;$j++){
          if($j==0){
            //Si es el primer elemento, reseteamos el unique del faker
            $idProductoVenta = $faker->unique($reset = true)->randomElement($idProductos);
            //$precioProducto = DB::table('productos')->where('id', $idProductoVenta)->pluck('precio');
            $precioProductoBD = DB::table('productos')->select('precio')
                                  ->where('id', $idProductoVenta)->first();
            $precioProducto = $precioProductoBD->precio;
            $numeroUnidadesProducto = $faker->numberBetween(1,15); //Se venderan max 15 unidades por producto
            $montoVenta = $montoVenta + ($precioProducto * $numeroUnidadesProducto);
            //$arrayProductos[$idProductoVenta] = $precioProducto;
            $cantidadProductosVenta = $cantidadProductosVenta + $numeroUnidadesProducto;
            //Agregamos el producto aleatorio al array con su precio y cantidad de unidades
            $arrayProductos[$idProductoVenta]['precio'] = $precioProducto;
            $arrayProductos[$idProductoVenta]['cantidad'] = $numeroUnidadesProducto;
          }
          else{
            $idProductoVenta = $faker->unique()->randomElement($idProductos);
            //$precioProducto = DB::table('productos')->where('id', $idProductoVenta)->pluck('precio');
            $precioProductoBD = DB::table('productos')->select('precio')
                                  ->where('id', $idProductoVenta)->first();
            $precioProducto = $precioProductoBD->precio;
            $numeroUnidadesProducto = $faker->numberBetween(1,15);
            $montoVenta = $montoVenta + ($precioProducto * $numeroUnidadesProducto);
            //$arrayProductos[$idProductoVenta] = $precioProducto;
            $cantidadProductosVenta = $cantidadProductosVenta + $numeroUnidadesProducto;
            $arrayProductos[$idProductoVenta]['precio'] = $precioProducto;
            $arrayProductos[$idProductoVenta]['cantidad'] = $numeroUnidadesProducto;
          }
        }

        //Creamos la venta
        $idVenta = DB::table('ventas')
                ->insertGetId(['monto' => $montoVenta, 'cantidadProductos' => $cantidadProductosVenta, 
                                'created_at' => $fechaVenta, 'nombreVendedor' => $nombreVendedor]);

        //Asociamos los productos a las ventas

        /*        
        foreach ($arrayProductos as $idProd => $precioProd){ 
          DB::table('detalle_ventas')
                  ->insert(['id_venta' => $idVenta, 'id_producto' => $idProd, 
                            'precioProducto' => $precioProd, 'cantidad' => $cantidadProductos]);
        }
        */

        foreach ($arrayProductos as $idProd => $datosProd){ 
          DB::table('detalle_ventas')
                  ->insert(['id_venta' => $idVenta, 'id_producto' => $idProd, 
                            'precioProducto' => $datosProd['precio'], 'cantidad' => $datosProd['cantidad']]);
        }

      }



    }
}