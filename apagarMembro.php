<?php

	if (!isset($_SESSION)) session_start();
    
    $tabela = $_SESSION['id'];
	$id = $_GET['id'];
	
	//conexão e remoção
	$mysqli = new mysqli("localhost", "root", "", "test");
	
	$sql = 'DELETE FROM test.'.$tabela.' WHERE id='.$id;
 	
 	$mysqli->query($sql);

 	mysqli_close($mysqli);

 	header("location: painel.php");
?>