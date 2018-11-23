<?php
    //inicia a sessão
    if (!isset($_SESSION)) session_start();

    $tabela = $_SESSION['id'];
	$descricao = $_POST['conta'];
	$valor = $_POST['valor'];
	$vencimento = $_POST['vencimento'];

	//conexão
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$mysqli = new mysqli("localhost", "root", "", "test");

	//Inserindo membro
	$sql = "INSERT INTO contas".$tabela." (descricao,vencimento,valor) VALUES('".$descricao."','".$vencimento."','".$valor."')";
	$mysqli->query($sql);

	//Criando tabela de contas

	mysqli_close($mysqli);

	header("location: painel.php");
?>