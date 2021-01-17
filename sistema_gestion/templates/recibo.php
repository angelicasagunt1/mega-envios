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
                               <?php $giro = $_POST['giro'];
echo "Transferencia No. " . $giro . "";?> - <?php $cliente = $_POST['nombre_titular'];
echo "Cliente No. " . $cliente . "";?> </strong></h5>


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
              <td class="w-60 text-right"><strong>Número De Cliente :</strong></td>
              <td class="w-40 text-right"><?php $cliente = $_POST['cliente'];
echo "" . $cliente . "";?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right"> <strong> Nombre Completo :</strong></td>
                  <td class="w-40 text-right"><?php $nombre = $_POST['nombre'];
echo "" . $nombre . "";?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Cédula :</strong></td>
                  <td class="w-40 text-right"><?php $cedula = $_POST['cedula'];
echo "" . $cedula . "";?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Banco :</strong></td>
                  <td class="w-40 text-right"><?php $banco = $_POST['banco'];
echo "" . $banco . "";?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Número De Cuenta :</strong></td>
                  <td class="w-40 text-right"><?php $cuenta = $_POST['cuenta'];
echo "" . $cuenta . "";?></td>
              </tr>

              <tr class="active">
              <td class="w-60 text-right">
              <strong>Valor A Transferir :</strong></td>
                  <td class="w-40 text-right"><?php $valor = $_POST['valor'];
echo number_format("" . $valor . "");?> Bss.



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
                            $<?php $pago = $_POST['pago'];
echo number_format("" . $pago . "");?> Pesos Ars.
                </td></tr><tr class="active"><td class="w-70 text-right"><strong>Forma de Pago:</strong></td>


            <td class="w-30 text-right">
            <?php $forma = $_POST['forma'];
echo "" . $forma . "";?></td> </tr>








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

<?php
$giro = $_POST['giro'];
$cliente = $_POST['cliente'];
$cuenta = $_POST['cuenta'];
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$banco = $_POST['banco'];
$valor = $_POST['valor'];
$pago = $_POST['pago'];
$forma = $_POST['forma'];?>




<div id="contenedor">
  <div>
    <span id="enlace">
      <?php

echo "*No. " . $giro . " ";
echo "(" . $cliente . ")*<br/>";
echo "" . $cuenta . "<br/>";
echo "" . $nombre . "<br/>";
echo "Cédula: " . $cedula . "<br/>";
echo "Banco: " . $banco . "<br/>";
echo "*Valor: " . $valor . " Bss.*<br/>";
echo "Pago: $" . $pago . " Pesos. <br/>";
echo "*_Forma: " . $forma . "_*<br/>"; ?>  </span>
    <button id="copiador">Copiar</button>
  </div>
</div>










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

</script>


  </html>