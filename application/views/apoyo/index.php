<div class="row">
  <div class="col-md-12">
    <div class="well">
      <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
          <ul id="myTabs" role="tablist" class="nav nav-tabs">
            <li role="presentation" class="active"><a id="becas-tab" href="#becas" role="tab" data-toggle="tab" aria-controls="becas" aria-expanded="true">Becas</a></li>
            <li role="presentation"><a id="tutorias-tab" href="#tutorias" role="tab" data-toggle="tab" aria-controls="tutorias" aria-expanded="false">Tutorías</a></li>
            <li role="presentation" class="active"><a id="servicio-tab" href="#servicio" role="tab" data-toggle="tab" aria-controls="servicio" aria-expanded="true">Servicio de apoyo educativo</a></li>
          </ul>
          <br>
          <div id="myTabContent" class="tab-content">

<div id="becas" role="tabpanel" aria-labelledby="becas-tab" class="tab-pane fade active in">
<?php echo form_open('Becas');?>
<!-- <div class="row"> -->
<?php
foreach ($Becas as $row) {

	// echo '<div class="col-md-4">'.$row["Nombre"].' '.$row["Valor"].'%</div>';
	// echo '<div class="col-md-4">'.$row["Indicadores"].'</div>';
	// echo '<div class="col-md-4">'.$row["Descripcion"].'</div>';
	if ($row["Despegable"]) {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-12 title-row">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"></div><br></div></div></div>';
		$i = 1;
		foreach ($bloques as $roww) {
			echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$roww["Nombre"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id=b'.$i.' name=b'.$i.'></div><br></div></div></div>';
			$i = $i+1;
		}

		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo2id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
	} else {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo1id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo2id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
	}
}
// echo '<div class="col-md-12"><button type="submit" name="btn-submit" class="btn btn-raised btn-success">Confirmar<div class="ripple-container"></div></button></div>';
echo '<div class="col-md-12"><a href="#" name="btn-submit" class="btn btn-raised btn-success">Confirmar</a></div>';
echo form_close();
echo "<hr><div class='errors'>";
echo validation_errors();
echo "</div>";
?>
<!-- </div> -->
</div>


<div id="tutorias" role="tabpanel" aria-labelledby="tutorias-tab" class="tab-pane fade">
<?php echo form_open('Tutoria');?>
<!-- <div class="row"> -->
<?php
foreach ($Tutoria as $row) {

	// echo '<div class="col-md-4">'.$row["Nombre"].' '.$row["Valor"].'%</div>';
	// echo '<div class="col-md-4">'.$row["Indicadores"].'</div>';
	// echo '<div class="col-md-4">'.$row["Descripcion"].'</div>';
	if ($row["Despegable"]) {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-12 title-row">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"></div><br></div></div></div>';
		$i = 1;
		foreach ($bloques as $roww) {
			echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$roww["Nombre"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id=b'.$i.' name=b'.$i.'></div><br></div></div></div>';
			$i = $i+1;
		}

		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo2id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
	} else {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo1id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo2id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
	}
}
// echo '<div class="col-md-12"><button type="submit" name="btn-submit" class="btn btn-raised btn-success">Confirmar<div class="ripple-container"></div></button></div>';
echo '<div class="col-md-12"><a href="#" name="btn-submit" class="btn btn-raised btn-success">Confirmar</a></div>';
echo form_close();
echo "<hr><div class='errors'>";
echo validation_errors();
echo "</div>";
?>
<!-- </div> -->
</div>


<div id="servicio" role="tabpanel" aria-labelledby="servicio-tab" class="tab-pane fade">
<?php echo form_open('ServicioApoyo');?>
<!-- <div class="row"> -->
<?php
foreach ($ServicioApoyo as $row) {

	// echo '<div class="col-md-4">'.$row["Nombre"].' '.$row["Valor"].'%</div>';
	// echo '<div class="col-md-4">'.$row["Indicadores"].'</div>';
	// echo '<div class="col-md-4">'.$row["Descripcion"].'</div>';
	if ($row["Despegable"]) {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-12 title-row">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"></div><br></div></div></div>';
		$i = 1;
		foreach ($bloques as $roww) {
			echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$roww["Nombre"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id=b'.$i.' name=b'.$i.'></div><br></div></div></div>';
			$i = $i+1;
		}

		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo2id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
	} else {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo1id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="0" class="form-control" id='.$row["campo2id"].' name='.$row["campo1id"].'></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
	}
}
// echo '<div class="col-md-12"><button type="submit" name="btn-submit" class="btn btn-raised btn-success">Confirmar<div class="ripple-container"></div></button></div>';
echo '<div class="col-md-12"><a href="#" name="btn-submit" class="btn btn-raised btn-success">Confirmar</a></div>';
echo form_close();
echo "<hr><div class='errors'>";
echo validation_errors();
echo "</div>";
?>
<!-- </div> -->
</div>
      <!-- Termina "myTabContent" -->
      </div>
    </div>
  </div>
</div>



