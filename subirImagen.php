<?php
    require_once('databaseConnection.php');
	$superv_consulta = mysqli_query($conn, "SELECT IdProducto FROM productos");
    while ($row = mysqli_fetch_assoc($superv_consulta)) {
    	if(file_exists("images/".$row["IdProducto"].".jpg") and !comprobarExistencia($row["IdProducto"].".jpg"))
    	{
    		subirImagen($row["IdProducto"].".jpg");
    		echo $row["IdProducto"].".jpg";
    	}
    }
mysqli_close($conn);

function subirImagen($nombreImagen)
{
	require("conexionFTP.php");
	$rutaImagen = "images/".$nombreImagen;
	ftp_pasv ($cid, true) ;
	ftp_chdir($cid, "tiendatalamas.com/assets");
	if(file_exists($rutaImagen))
    { 
    	if(pathinfo($rutaImagen, PATHINFO_EXTENSION) == "jpg")
    	{
    		if(!comprobarExistencia($nombreImagen))
    		{
			 if(ftp_put($cid, $nombreImagen, $rutaImagen, FTP_BINARY))
			  {
			    echo "el archivo ha sido subido con éxito al destino ftp";
			  }
			  else
			  {
			    echo "falló la subida al destino ftp";
			  }
			}
			else
			{
				echo "La imagen ya existe";
			}
	     }
	     else
	     {
	     	echo "Formato incorrecto";
	     }
    }else
    {
    	echo "Archivo no encontrado";
    }

    ftp_close($cid);
}

function comprobarExistencia($nombreImagen)
{
	$file = 'http://tiendatalamas.com/assets/'.$nombreImagen;
	$file_headers = @get_headers($file);
	if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
	}
	else {
    $exists = true;
	}
}

?>