<?php

include 'model/transferencias_model.php';

?>

   <!-- Contiene el Script -->


 <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                        <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Ingresos detallados al día de Hoy</strong>
                    </p>
                    <div class="progress-group">
                      Banesco
                      <span class="float-right"><b><?php
if ($banesco == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $banesco;
}

?></b> Bss. </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-gray" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Mercantil
                      <span class="float-right"><b><?php
if ($mercantil == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $mercantil;
}

?></b> Bss. </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Otros (Vzla)
                      <span class="float-right"><b><?php
if ($otros == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $otros;
}

?></b> Bss. </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Tarjeta UALA
                      <span class="float-right"><b><?php
if ($uala == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $uala;
}

?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Mercado Pago
                      <span class="float-right"><b><?php
if ($mercado_pago == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $mercado_pago;
}

?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Banco Santander</span>
                      <span class="float-right"><b><?php

if ($santander == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $santander;
}

?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Banco BBVA
                      <span class="float-right"><b><?php
if ($bbva == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $bbva;
}
?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Efectivo
                      <span class="float-right"><b><?php
if ($efectivo == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $efectivo;
}
?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 50%"></div>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>


  

</body>

<!--<script src="jquery/jquery-3.3.1.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->

