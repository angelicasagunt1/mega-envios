<?php

include "../model/connect.php";

//include 'conexion_db.php';
$id = $_GET["id"];
$ObjData = new database;

$sth = $ObjData->prepare("SELECT a.codigo FROM cliente as a INNER JOIN cuenta as b on a.id_cliente = b.id_cliente WHERE a.id_cliente = :id");
$sth->bindParam(":id", $id);
$sth->execute();
$codigo_cliente = $sth->fetchColumn();

$fecha = date('Y/m/d', time());
$titular = $_POST['nombre_titular'];
$apellido_titular = $_POST['Apellido'];
$cedula = $_POST['cedula'];
$num_cuenta = $_POST['num_cuenta'];
$banco = $_POST['tipo_banco'];
$tasa = $_POST['valor'];

$cta = $ObjData->prepare("SELECT num_cuenta FROM cuenta WHERE id_cuenta = :id");
$cta->bindParam(":id", $num_cuenta);
$cta->execute();
$num_cta = $cta->fetchColumn();

/*Importes */
$importe_pesos = $_POST['importe_pesos'];
$tipo_pago = $_POST["tipo_pago"];

$sth2 = $ObjData->prepare("SELECT medio_de_pago FROM medios_de_pago WHERE id_medios_de_pago = :id");
$sth2->bindParam(":id", $tipo_pago);
$sth2->execute();
$medio = $sth2->fetchColumn();

$importe_destino = get_importe_bs($importe_pesos, $tasa);

function get_importe_bs($pesos, $tasa) {

	$importe_destino = $pesos * $tasa;

	return $importe_destino;
}

include 'conexion_db.php';

// "INSERT INTO users (name, surname, age) VALUES (?,?,?)"
$stmt = $conn->prepare("INSERT INTO transferencias (fecha, importe_titular, id_cuenta_destino, importe_cliente, id_medio_pago_cliente)
            VALUES(?,?,?,?,?)");

$stmt->bind_param("sssss", $fecha, $importe_pesos, $num_cuenta, $importe_destino, $tipo_pago);

$stmt->execute();

$sth4 = $ObjData->prepare("SELECT MAX(id_transferencia) FROM transferencias");
$sth4->execute();
$giro = $sth4->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>

<title>Recibo-Mega Envío</title>

<link type="text/css" href="../css/recibo.css" rel="stylesheet">


</head>

  <!-- Content Start -->
  <section class="content">


    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-body">
            <div id="invoice" class="row">
              <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <table class="table" style="margin-bottom: 5px;">
                  <tbody>
                    <tr class="invoice-header">
                      <td class="text-center" colspan="2">
                        <div class="invoice-header-info">
                          <div class="logo">
                               <img src="../img/1_logo.png">
                          </div>
                          <h4 class="invoice-title">Av. Pueyrredón 1357 local 64, galería Americana, Recoleta. </h4>

                            <h5><strong>
                               <?php
echo "Transferencia No. " . $giro . ""; ?> - <?php
echo "Cliente No. " . $codigo_cliente . ""; ?> </strong></h5>


                  <div>Mega Envíos - Money Transfer</div>
                                       <h5>
                     <?php date_default_timezone_set('America/Argentina/Buenos_Aires');?>

                    Fecha: <?=date('m/d/y');?> - Hora: <?=date('g:ia');?></h5>
                        </div>
                      </td>
                    </tr>
                    <tr class="invoice-address">
                      <td class="w-50 invoice-from">
                        <div>
                          <div class="com-details">
                            <p>
                              <strong> facebook.com/megaenvios.ar
                                   </strong></p>
                            <span class="invoice-address">
                              Av. Pueyrredón 1357 - L64, Galería Americana.                            </span><br>
                            <span>
                              L-V 10am - 20hrs | Sábados 10am - 16hrs                             </span><br>

                          </div>
                        </div>
                      </td>
                      <td class="text-right invoice-to w-50">
                        <p>
                          <strong>
                           Síguenos en Instagram @megaenvios.arg                          </strong>
                        </p>
                        <div>
                          Mega Envíos | Money Transfer

                        </div>
                        <div>
                          Celular | Whatsapp : 11 2662-4688                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

        <table id="selling_bill" class="table">

              <tbody><tr class="active">
              <td class="w-60 text-right"><strong>Código De Cliente :</strong></td>
              <td class="w-40 text-right"><?php echo $codigo_cliente ?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right"> <strong> Nombre Completo :</strong></td>
                  <td class="w-40 text-right"><?php
echo $titular ?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Cédula :</strong></td>
                  <td class="w-40 text-right"><?php
echo $cedula ?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Banco :</strong></td>
                  <td class="w-40 text-right"><?php echo $banco ?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Número De Cuenta :</strong></td>
                  <td class="w-40 text-right"><?php
echo $num_cta ?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Valor A Transferir :</strong></td>
                  <td class="w-40 text-right"><?php
echo number_format("" . $importe_destino . ""); ?> Bss.



                </td>
              </tr>





                 </tbody></table><table class="table" id="extra-fields">



                  <tbody>



                  </tbody>
                </table>


                <div class="table-responsive">
                  <table id="selling_bill" class="table">
                    <tbody>




                      <tr class="active">


                      </tr>

                                              <tr class="active">
                          <td class="w-70 text-right">
                            <strong>Pesos Argentinos ARS :</strong>
                          </td>
                          <td class="w-30 text-right">
                            $<?php echo $importe_pesos ?> Pesos Ars.
                </td></tr><tr class="active"><td class="w-70 text-right"><strong>Forma de Pago:</strong></td>


            <td class="w-30 text-right">
            <?php echo $medio ?></td> </tr>








                                                <tr>
                          <td colspan="2" class="text-center">
                            <br>
                            <h4> <strong>
                              Nota: Las transferencias que se realizan de un banco a otro pueden llegar a tardar hasta 48 horas en hacerse efectivas. Por favor guarde este recibo hasta que su dinero se vea reflejado en su cuenta.                            </strong> </h4>
                          </td>
                        </tr>
                    </tbody>
                  </table>
                </div>

                <div class="invoice-header-info barcodes">
                                    <!-- <img src="data:image/png;base64," width="100"> -->
                                    <img src="../img/qrcode.png">
                </div>

                <div class="table-responsive">
                  <table class="table">
                    <tbody>


                    </tbody></table><table id="selling_bill" class="table">

              <tbody><tr class="active">
              <td class="w-100 text-right">Comprobante no válido como factura.</td>

              </tr><tr class="active">
              <td class="w-100 text-right"><strong>Síguenos en Instagram @megaenvios.arg</strong></td>



              </tr>

                    </tbody>
                  </table>
                </div>

                <div class="table-responsive footer-actions">
                  <table class="table">
                    <tbody>
                      <tr class="no-print">
                        <td colspan="2">
                          <button onclick="window.print();" class="btn btn-info btn-block">
                            <span></span>
                            Imprimir                          </button>
                        </td>
                      </tr>

                      <tr class="no-print text-center">
                        <td colspan="2">

<div id="text">
   <?php
echo "*No. " . $giro . " ";
echo "(" . $codigo_cliente . ")*<br/>";
echo "" . $num_cta . "<br/>";
echo "" . $titular . " " . "<br/>";
echo "Cédula: " . $cedula . "<br/>";
echo "Banco: " . $banco . "<br/>";
echo "*Valor: " . $importe_destino . " Bss.*<br/>";
echo "Pago: $" . $importe_pesos . " Pesos. <br/>";
echo "*_Forma: " . $medio . "_*<br/>"; ?>  </span>
</div>
<input id="btn" onclick="CopyToClipboard('text')" type="button" value="Copiar"></input>










                        </td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="2">
                          <br>
                          <p class="powered-by">
                            <small>© Av. Pueyrredón 1357 local 64, galería Americana, Recoleta.</small>
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Content End-->

</div>

  </body>
<script type="text/javascript">

// FUNCION ANTERIOR (NO FUNCIONA CORRECTAMENTE)
/*
var boton = document.getElementById("copiador");
boton.addEventListener("click", copiarAlPortapapeles, false);

function copiarAlPortapapeles() {
  var enlace = document.getElementById("enlace");

  var inputFalso = document.createElement("input");
  inputFalso.setAttribute("value", enlace.innerHTML);

  document.body.appendChild(inputFalso);

  inputFalso.select();

  document.execCommand("copy");

  document.body.removeChild(inputFalso);
  alert("ya se ha copiado");
}
*/

function CopyToClipboard(element) {

    var doc = document
    , text = doc.getElementById(element)
    , range, selection;

  if (doc.body.createTextRange)
    {
    range = doc.body.createTextRange();
    range.moveToElementText(text);
    range.select();
  }

    else if (window.getSelection)
    {
    selection = window.getSelection();
    range = doc.createRange();
    range.selectNodeContents(text);
    selection.removeAllRanges();
    selection.addRange(range);
  }
  document.execCommand('copy');
  window.getSelection().removeAllRanges();
  document.getElementById("btn").value="Copiado";
}


</script>


  </html>

