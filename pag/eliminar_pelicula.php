<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "../pag/conn_mysql_alan.php";
    $result;
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idempleado= $_GET["id"];
	
	// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
	// los valores por GET son tipo STRING ************************************************************
	$idempleado = (int)$idempleado; //*****************************************************************
	
    //Verificamos que SI VENGA EL NUMERO DE EMPLEADO **************************************************
	if($idempleado == "")
	{
		header("Location: empleado_no_encontrado.php");
		exit;
	}
	if(is_null($idempleado))
	{
		header("Location: empleado_no_encontrado.php");
		exit;
	}
	if(!is_int($idempleado))
	{
		header("Location: empleado_no_encontrado.php");
		exit;
	}
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	$sql2 = 
	'SELECT 
    p.id_pelicula,
    p.clasificacion, 
    p.director, 
    p.duracion, 
    p.foto_poster, 
    p.genero, 
    p.idioma, 
    p.pelicula,
    p.horario,
    c.nombre_cine 
    FROM 
    peliculas p 
    INNER JOIN 
    cines c 
    on 
    p.id_pelicula =' . $idempleado;

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql2);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
	
	//Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL ***************
	$sqlBorrar = "DELETE From peliculas WHERE id_pelicula=" . $idempleado;
	
	// Ejecutamos la sentencia DELETE de SQL a partir de la conexión usando PDO ****************************
    $conn->exec($sqlBorrar);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Práctica web de la sesión 11</title>
<link rel="stylesheet" href="../css/style.css">


</head>

<body>

<header class="logo">
         <img src="../img/logo.png" alt="cinepolis">
        
            </header>

<div id="wrapper">

   
   <div id="caja4">
     <div id="texto1"><br>
 
     <h2>Registro satisfactoriamente eliminado</h2>
 
        <table border="1" width="100%">
        <thead>
            <tr>
			    <th>ID</th>
                <th>Poster</th>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Clasificacion</th>
                <th>Duracion</th>
                <th>Director</th>
                <th>Idioma</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
				
		 ?>

	
            
        <?php } ?>

		<tr>
                <td><?php echo $row['id_pelicula']; ?></td>
				<td><img src="../img/<?php echo $row['foto_poster']; ?>" alt="poster" ></td>
                <td><?php echo $row['pelicula']; ?></td>
                <td><?php echo $row['duracion']; ?></td>
				<td><?php echo $row['genero']; ?></td>
                <td><?php echo $row['clasificacion']; ?></td>
                <td><?php echo $row['duracion']; ?></td>
                <td><?php echo $row['director']; ?></td>
                <td><?php echo $row['idioma']; ?></td>
                <td><?php echo $row['horario']; ?></td>
            </tr>
        <tr>
		
            <td colspan="6">&nbsp;</td>

        </tr>
        <tr>
            <td>&nbsp;</td>
    		<td><a href="../reporte_pelicula_para_borrar_alan.php">
				        <<< --- Regresar a Peliculas (Para eliminar mas Peliculas)
                </a>
            </td>
    		<td>&nbsp;</td>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		 
        </tr>
        </tbody>
    </table>
     </div>
  </div>
</div>
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
</body>
</html>