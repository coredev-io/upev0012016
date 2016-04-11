<div class="row">
  <div class="col-md-12">
    <div class="well">
      <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
          <ul id="myTabs" role="tablist" class="nav nav-tabs">
            <li role="presentation" class="active"><a id="programa-tab" href="#programa" role="tab" data-toggle="tab" aria-controls="programa" aria-expanded="true">Programas Académicos</a></li>
            <li role="presentation"><a id="infra-tab" href="#infra" role="tab" data-toggle="tab" aria-controls="infra" aria-expanded="false">Infraestructura</a></li>
          </ul>
          <br>
          <div id="myTabContent" class="tab-content">
            <div id="programa" role="tabpanel" aria-labelledby="programa-tab" class="tab-pane fade active in">
<?php echo form_open('oferta/updateProgramasAcademicos');?>
<!-- <div class="row"> -->
<?php

$i            = 0;
$arrPrincipal = array();
//Cantidad de unidades
foreach ($IndicadorMs as $row) {
	$arr = $IndicadorMs[$i];
	$obj = array();
	$j   = 0;
	foreach ($arr as $roww) {
		// print_r($roww);
		//
		//
		array_push($obj, $roww);
		// echo "<br>";
		$j++;
	}
	// print_r($obj);
	array_push($arrPrincipal, $obj);
	// echo "<hr><br>";
	$i++;
}

// print_r($arrPrincipal[0]);
// echo "<br>---------------><br>";
// print_r($arrPrincipal[1]);
$idBloq     = 13;
$idComplete = 2;
$v1         = $ProgramasAcademicos[0];
$al         = array();
foreach ($v1 as $key) {
	array_push($al, $key);
}

foreach ($nivelProgramasAcademicos as $row) {

	// echo '<div class="col-md-4">'.$row["Nombre"].' '.$row["Valor"].'%</div>';
	// echo '<div class="col-md-4">'.$row["Indicadores"].'</div>';
	// echo '<div class="col-md-4">'.$row["Descripcion"].'</div>';
	if ($row["Despegable"]) {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-12 title-row">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"></div><br></div></div></div>';
		$i                                                               = 1;
		$varID                                                           = "";
		if ($row["Nombre"] == "Programas académicos evaluados") {$varID = "a";};
		$prinArr                                                         = 0;

		foreach ($bloques as $roww) {
			$prinArr2 = 0;
			//Se traen los valores de los registros
			$valor  = 0;
			$arrsec = array();
			$arrsec = $arrPrincipal[$prinArr];
			// echo "<br>---------------><br>";
			// print_r($arrsec);
			if ($arrsec[2] == $roww["idBloques"]) {
				$valor = $arrsec[$idBloq];
			}
			foreach ($arrsec as $value) {
				// print_r($value[$prinArr2]);
				// echo $value;
				// if ($value[2] == $roww["idBloques"]) {
				// 	$valor = $value[5];
				// }
			}
			echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$roww["Nombre"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$valor.'" class="form-control" id='.$roww["idBloques"].'-'.$varID.'-'.$i.' name='.$roww["idBloques"].'-'.$varID.'-'.$i.' required></div><br></div></div></div>';
			$i = $i+1;

			$prinArr++;
		}
		$idComplete++;

		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$al[$idComplete].'" class="form-control" id='.$row["campo2id"].' name='.$row["campo2id"].' required></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
		$idComplete++;
		$idBloq++;
	} else {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$al[$idComplete].'" class="form-control" id='.$row["campo1id"].' name='.$row["campo1id"].' required></div><br></div></div></div>';
		$idComplete++;
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$al[$idComplete].'" class="form-control" id='.$row["campo2id"].' name='.$row["campo2id"].' required></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
		$idComplete++;
	}
}
echo '<div class="col-md-12"><button type="submit" name="btn-submit" class="btn btn-raised btn-success">Confirmar<div class="ripple-container"></div></button></div>';
// echo '<div class="col-md-12"><a href="#" name="btn-submit" class="btn btn-raised btn-success">Confirmar</a></div>';
echo form_close();
echo "<hr><div class='errors'>";
echo validation_errors();
echo "</div>";
?>
<!-- </div> -->
</div>
            <div id="infra" role="tabpanel" aria-labelledby="infra-tab" class="tab-pane fade">
<?php echo form_open('oferta/update_Laboratorios');?>
<!-- <div class="row"> -->
<?php
$idComplete = 2;
$v1         = $Infraestructura[0];
$al         = array();
foreach ($v1 as $key) {
	array_push($al, $key);
}

foreach ($nivelInfraestructura as $row) {

	// echo '<div class="col-md-4">'.$row["Nombre"].' '.$row["Valor"].'%</div>';
	// echo '<div class="col-md-4">'.$row["Indicadores"].'</div>';
	// echo '<div class="col-md-4">'.$row["Descripcion"].'</div>';
	if ($row["Despegable"]) {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-12 title-row">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"></div><br></div></div></div>';
		$i                                                     = 1;
		$varID                                                 = "";
		if ($row["Nombre"] == "Laboratorios Equipado") {$varID = "b";};
		$prinArr                                               = 0;

		foreach ($bloques as $roww) {
			$prinArr2 = 0;
			//Se traen los valores de los registros
			$valor  = 0;
			$arrsec = array();
			$arrsec = $arrPrincipal[$prinArr];
			// echo "<br>---------------><br>";
			// print_r($arrsec);
			// echo "#";
			// echo $idBloq;
			if ($arrsec[2] == $roww["idBloques"]) {
				$valor = $arrsec[$idBloq];
			}
			foreach ($arrsec as $value) {
				// print_r($value[$prinArr2]);
				// echo $value;
				// if ($value[2] == $roww["idBloques"]) {
				// 	$valor = $value[5];
				// }
			}
			echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$roww["Nombre"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$valor.'" class="form-control" id='.$roww["idBloques"].'-'.$varID.'-'.$i.' name='.$roww["idBloques"].'-'.$varID.'-'.$i.' required></div><br></div></div></div>';
			$i = $i+1;
			$prinArr++;
		}
		$idComplete++;

		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$al[$idComplete].'" class="form-control" id='.$row["campo2id"].' name='.$row["campo2id"].' required></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
		$idComplete++;
		$idBloq++;
	} else {
		echo '<div class="row row-bloque">';
		echo '<div class="col-md-4">&nbsp;</div>';
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo1"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$al[$idComplete].'" class="form-control" id='.$row["campo1id"].' name='.$row["campo1id"].' required></div><br></div></div></div>';
		$idComplete++;
		echo '<div class="col-md-12"><div class="row inputs-form"><div class="col-md-10">'.$row["campo2"].'</div><div class="col-md-1"><div class="form-group label-floating is-empty"><input type="text" value="'.$al[$idComplete].'" class="form-control" id='.$row["campo2id"].' name='.$row["campo2id"].' required></div><br></div></div></div>';
		echo '<div class="divider"></div></div>';
		$idComplete++;
	}
}
echo '<div class="col-md-12"><button type="submit" name="btn-submit" class="btn btn-raised btn-success">Confirmar<div class="ripple-container"></div></button></div>';
// echo '<div class="col-md-12"><a href="#" name="btn-submit" class="btn btn-raised btn-success">Confirmar</a></div>';
echo form_close();
echo "<hr><div class='errors'>";
echo validation_errors();
echo "</div>";
?>
<!-- </div> -->
          </div>
      </div>
    </div>
  </div>
</div>



