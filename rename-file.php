<?php


saveProductNames();
//renameImage("HARRY POTTER", "1");
function renameImage($name,$newName)
{
	$imageDirectory = "images/";
	$oldImageName = $imageDirectory . $name . ".jpg" ;
    $newImageName = $imageDirectory . $newName . ".jpg" ; 
    if(file_exists($newImageName))
    { 
        echo "Ocurrio un error, ya existe una imagen con ese nombre" ;
    }
    else
    {
        if(rename($oldImageName, $newImageName))
        { 
        	echo "Se cambio el nombre del archivo correctamente" ;
        }
        else
        {
        	echo "Ocurrio un error al tratar de cambiar el nombre del archivo" ;
        }
    }
}

function saveProductNames()
{
	require_once('databaseConnection.php');
	$sql = "SELECT NombreProducto FROM productos";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
  		// output data of each row
  		while($row = mysqli_fetch_assoc($result)) 
  		{
    		echo $row['NombreProducto'];
  		}
	} 
	else {
 	 	echo "0 results";
	}
	mysqli_close($conn);
}

?>