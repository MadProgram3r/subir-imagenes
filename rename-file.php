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
	$productNames = array();
	$query = "SELECT NombreProducto FROM productos";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) 
	{
  		// output data of each row
  		while($row = mysqli_fetch_assoc($result)) 
  		{
    		array_push($productNames, $row['NombreProducto']);
  		}
	} 
	else {
 	 	echo "0 results";
	}
	var_dump($productNames);
	mysqli_close($conn);
}

?>