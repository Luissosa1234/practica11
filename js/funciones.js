function borrar_empleado(id_pelicula)
{
if(confirm("¿Estás seguro de eliminar pelicula No: " + id_pelicula + "?") == true)
	{
		return true;
	} else {
		return false;
	}
}