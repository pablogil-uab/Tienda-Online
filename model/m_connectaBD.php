<?php
function connectaBD(){
	$servidor = "localhost";
	$port = "5432";
	$DBnom = "tdiw-l11";
	$usuari = "tdiw-l11";
	$clau = "qrwLebyM";
	$connexio = pg_connect("host=$servidor port=$port dbname=$DBnom user=$usuari password=$clau") or die("Error connexio DB");
	return $connexio;
}
?>