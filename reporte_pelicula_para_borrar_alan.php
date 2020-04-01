<?php
    //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "pag/conn_mysql_alan.php";
    $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
	$sql = 
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
    p.id_pelicula = c.id_cine
    ORDER BY 
	p.id_pelicula ASC;';

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
	// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
	// (Variable con varias valores)
	// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
    // El resultado se mostrará en una tabla HTML ***************************************************
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Práctica web de la sesión 11</title>
<link rel="stylesheet" href="css/style.css">



<script language="javascript" src="js/funciones.js"></script>

</head>

<body>

<header class="logo">
         <img src="img/logo.png" alt="cinepolis">
        
            </header>

            <h1 class="txtalinear">Selecciona #NOMBRE# de Pelicula a Eliminar</h1>


<div id="wrapper">

   
   <div id="caja4">
     <div id="texto1"><br>
 
        <table border="1" style="width:100%;">
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
			//Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
        ?>
            <tr>
		
                <td><?php echo $row['id_pelicula']; ?></td>
                <td><img src="img/<?php echo $row['foto_poster']; ?>" alt="poster" ></td>
                <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
            <td><a onClick="return borrar_empleado(<?php echo $row['id_pelicula']; ?>);" 
            href="pag/eliminar_pelicula.php?id=<?php echo $row['id_pelicula']; ?>">
				        <?php echo $row['pelicula']; ?>
                    </a>
                </td>
                <td><?php echo $row['genero']; ?></td>
                <td><?php echo $row['clasificacion']; ?></td>
                <td><?php echo $row['duracion']; ?></td>
                <td><?php echo $row['director']; ?></td>
                <td><?php echo $row['idioma']; ?></td>
                <td><?php echo $row['horario']; ?></td>
            </tr>
        <?php } ?>
        
         <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
         </tr>
         <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
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