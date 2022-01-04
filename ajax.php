<?php 
include "conexion.php";

if(!empty($_POST)){

	if($_POST['action'] == 'infoProducto')
	{

		$producto_id = $_POST['Id'];

		$query = mysqli_query($conection,"SELECT Id,Saldo FROM pagocredito WHERE Id = $producto_id ");


		$result = mysqli_num_rows($query);

		if ($result > 0) {
			$data = mysqli_fetch_assoc($query);
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
			exit;
		}
		echo 'error';
		exit;
	}

	//agregar producto a entrada
	if($_POST['action'] == 'addProduct')
	{
     
     if(!empty($_POST['Saldo'])  || !empty($_POST['Id']))
     {
         $cantidad = $_POST['Saldo'];
         $producto_id = $_POST['producto_id'];
          $query_insert =mysqli_query($conection,"INSERT INTO pagocredito(Id,Saldo)VALUES($producto_id,$cantidad)");
              
         if($query_insert){
         	$query_upd = mysqli_query($conection,"CALL actualizar_precio_producto($cantidad,$producto_id)");
         	$result_pro = mysqli_num_rows($query_upd);

         	if($result_pro > 0){

         		$data = mysqli_fetch_assoc($query_upd);
         		$data['Id'] = $producto_id;
         		echo json_encode($data,JSON_UNESCAPED_UNICODE);
			exit;
         	}
         }else{
         	echo 'error';
         }


     }else{
     	echo 'error';
     }
     exit;
 }
 ?>
