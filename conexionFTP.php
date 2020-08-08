<?php
$cid = ftp_connect("www.emdpublicidad.com");
	$resultado = ftp_login($cid, "emdpublicidad","ErikaTalamas01");
	if ((!$cid) || (!$resultado)) {
		echo "Fallo en la conexión"; die;
	} else {
		echo "Conectado.";
	}
?>