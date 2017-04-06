<?php

$bd = "atlasmetamorfico";
	$server ="localhost";
	$user = "root";
	$password = "";
	
	$conexion = @mysqli_connect($server, $user, $password, $bd);
	
	if( ! $conexion )	die( "Error de conexion ".mysqli_connect_error() );

	$nombre = $_POST["nombre"];
	$codigo = $_POST["codigo"];
	$nombreR = $_POST["nombreR"];
	$ano = $_POST["ano"];
	$afloramiento = $_POST["afloramiento"];
	$imagenuno = $_POST["imagenuno"];
	$imagendos = $_POST["imagendos"];
	$imagentres = $_POST["imagentres"];
	$macros = $_POST["macros"];
	$micros = $_POST["micros"];
	$porcentaje = $_POST["porcentaje"];
	$textura = $_POST["textura"];
	$intragranos = $_POST["intragranos"];
	$grado = $_POST["grado"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];
	$altitud = $_POST["altitud"];
	$zona = $_POST["zona"];

	$sql = "INSERT INTO ATLAS_MAPA2 (name, codigo, nombreR, ano, imagenuno, imagendos, imagentres, macros, micros, porcentaje, textura, Afloramiento, intragranos, grado, latitud, longitud, altitud, zona) VALUES ('" . $nombre . "','" . $codigo . "','" . $nombreR . "','" . $ano . "','" . $imagenuno . "','" . $imagendos . "','" . $imagentres . "','" . $macros . "','" . $micros . "','" . $porcentaje . "','" . $textura . "','" . $afloramiento . "','" . $intragranos . "','" . $grado . "','" . $latitud . "','" . $longitud . "','" . $altitud . "','" . $zona . "')";
	$result = mysqli_query($conexion, $sql);
	
	if ($result) {
		echo "Muestra Agregada";
	}
?>
		
