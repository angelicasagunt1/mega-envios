<?php
include "connect.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
//include 'conexion_db.php';
$ObjData = new database;
$hoy = date("Y-m-d");
//var_dump($hoy);die;
$sth = $ObjData->prepare("SELECT SUM(importe_titular) from transferencias where fecha = :id AND id_medio_pago_cliente = 1");
$sth->bindParam(":id", $hoy);
$sth->execute();
$uala = $sth->fetchColumn();

$sth2 = $ObjData->prepare("SELECT SUM(importe_titular) from transferencias where fecha = :id AND id_medio_pago_cliente = 2");
$sth2->bindParam(":id", $hoy);
$sth2->execute();
$mercado_pago = $sth2->fetchColumn();

$sth3 = $ObjData->prepare("SELECT SUM(importe_titular) from transferencias where fecha = :id AND id_medio_pago_cliente = 3");
$sth3->bindParam(":id", $hoy);
$sth3->execute();
$santander = $sth3->fetchColumn();

$sth4 = $ObjData->prepare("SELECT SUM(importe_titular) from transferencias where fecha = :id AND id_medio_pago_cliente = 4");
$sth4->bindParam(":id", $hoy);
$sth4->execute();
$bbva = $sth4->fetchColumn();

$sth5 = $ObjData->prepare("SELECT SUM(importe_titular) from transferencias where fecha = :id AND id_medio_pago_cliente = 5");
$sth5->bindParam(":id", $hoy);
$sth5->execute();
$efectivo = $sth5->fetchColumn();

$sth6 = $ObjData->prepare("SELECT SUM(importe_cliente) from transferencias as a
inner join cuenta as b on
a.id_cuenta_destino = b.id_cuenta where a.fecha = :id AND id_tipo_banco = 1;");
$sth6->bindParam(":id", $hoy);
$sth6->execute();
$banesco = $sth6->fetchColumn();

$sth7 = $ObjData->prepare("SELECT SUM(importe_cliente) from transferencias as a
inner join cuenta as b on
a.id_cuenta_destino = b.id_cuenta where a.fecha = :id AND id_tipo_banco = 2;");
$sth7->bindParam(":id", $hoy);
$sth7->execute();
$mercantil = $sth7->fetchColumn();

$sth8 = $ObjData->prepare("SELECT SUM(importe_cliente) from transferencias as a
inner join cuenta as b on
a.id_cuenta_destino = b.id_cuenta where a.fecha = :id AND id_tipo_banco NOT IN(1, 2, 29, 32);");
$sth8->bindParam(":id", $hoy);
$sth8->execute();
$otros = $sth8->fetchColumn();

function calcular_total_importe_banco($banco)
{   
    $ObjData = new database;
    $hoy = date("Y-m-d");
    $sth7 = $ObjData->prepare("SELECT SUM(importe_cliente) from transferencias as a
    inner join cuenta as b on
    a.id_cuenta_destino = b.id_cuenta where a.fecha = :id AND id_tipo_banco = {$banco};");
    $sth7->bindParam(":id", $hoy);
    $sth7->execute();
    return $sth7->fetchColumn();
}

function total()
{   
    $ObjData = new database;
    $hoy = date("Y-m-d");
    $sth7 = $ObjData->prepare("SELECT SUM(importe_cliente) from transferencias as a
    inner join cuenta as b on
    a.id_cuenta_destino = b.id_cuenta where a.fecha = :id");
    $sth7->bindParam(":id", $hoy);
    $sth7->execute();
    return $sth7->fetchColumn();
}

?>
