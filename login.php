<?php
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	//conexão
	$mysqli = new mysqli("localhost", "root", "", "test");
	$sql = "SELECT * FROM rep";
	$res = $mysqli->query($sql);
	
	while ($row = $res->fetch_assoc()){
    	if($row['email'] == $email && $row['senha'] == $senha){
    		if(!isset($_SESSION)) session_start();
			$id = $row['tabela'];
			$_SESSION['id'] = $id;
			$_SESSION['nivel'] = 1;
    		header("location: painel.php");
    	}else{
    		header("location: index.html");
    	}
    }
?>