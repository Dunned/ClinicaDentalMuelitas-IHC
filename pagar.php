<?php

if(!isset($_POST['submit'])) {
      exit("Hubo un error");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';
if (isset($_POST['submit'])) { 
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $email=$_POST['email'];
      $tipo=$_POST['tipo'];
      $total= round(intval($_POST['total_pedido'])/3.88);
      $fecha=date('Y-m-d H:i:s');
      //PEDIDOS
      $registro=$_POST['registro'];
      $blanqueamiento=$_POST['extra1'];
      $cuidado=$_POST['extra2'];
      include 'includes/funciones/funciones.php';
      $pedido=productos_formateador(1,$blanqueamiento,$cuidado);
      
      try {
          require 'includes/funciones/bd_conexion.php';
          $stmt=$conn->prepare("INSERT INTO registrados(nombre_registrado,apellido_registrado,email_registrado,fecha_registro,pedido,total_pagado) VALUES(?,?,?,?,?,?)");
          $stmt->bind_param("ssssss",$nombre,$apellido,$email,$fecha,$pedido,$total);
          $stmt->execute();
          $ID_registro=$stmt->insert_id;
          $stmt->close();
          $conn->close();
          //header('Location: validar_registro.php?exitoso=1');
      } catch (\Exception $e) {
          echo $e->getMessage();
      }
};


$compra = new Payer();
$compra->setPaymentMethod('paypal');

$articulo = new Item();
$articulo->setName($pedido)
         ->setCurrency('USD')
         ->setQuantity(1)
         ->setPrice((int) $total);

$arreglo_pedido[]=$articulo;


$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);


$cantidad = new Amount();
$cantidad->setCurrency('USD')
         ->setTotal($total);
         

$transaccion =  new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago Clinica Dental Muelitas IHC')
            ->setInvoiceNumber($ID_registro);

echo $transaccion->getInvoiceNumber();
           
$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}");
          

$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));

try {
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
    echo "<pre>";
    print_r(json_decode($pce->getData()));
    exit;
    echo "</pre>";
}
    
$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");
