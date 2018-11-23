<?php
    //inicia a sessão
    if (!isset($_SESSION)) session_start();

    $tabela = $_SESSION['id'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];

	//conexão
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$con = new mysqli("localhost", "root", "", "test");

	//Inserindo membro
	$sql = "INSERT INTO ".$tabela." (nome,sobrenome,email) VALUES('".$nome."','".$sobrenome."','".$email."')";
	$con->query($sql);

	//Criando tabela de contas

	mysqli_close($con);

	header("location: painel.php");
?>