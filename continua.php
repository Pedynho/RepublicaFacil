<?php
	$c = $_GET['c'];
    //criando a sessão
	if(!isset($_SESSION)) session_start();
		$id = $c;
		$_SESSION['id'] = $id;
		$_SESSION['nivel'] = 1;

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);	
	$mysqli = new mysqli("localhost", "root", "", "test");
	$sql = "SELECT tabela FROM rep";
	$res = $mysqli->query($sql);
	
	while ($row = $res->fetch_assoc()){
    	if($row['tabela'] == $c){

    		//Cria a tabela do usuario!
    		
    		$sql = "CREATE TABLE IF NOT EXISTS contas".$c." (
				id INT(16) AUTO_INCREMENT PRIMARY KEY,
				descricao VARCHAR(20) COLLATE utf8_general_ci,
				vencimento DATE,
				valor FLOAT(32)
			)";			
			$mysqli->query($sql);
    		
			$sql = "CREATE TABLE IF NOT EXISTS ".$c." (
				id INT(16) AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(20) COLLATE utf8_general_ci,
				sobrenome VARCHAR(30) COLLATE utf8_general_ci,
				email VARCHAR(30) COLLATE utf8_general_ci
			)";
			$mysqli->query($sql);

    		mysqli_close($mysqli);

    		//redireiciona para terminar o cadastro
    		header("location: painel.php");
    		break;
    	}
	}

	mysqli_close($mysqli);
?>