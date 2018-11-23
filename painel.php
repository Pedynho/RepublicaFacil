<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title>Continue</title>
	<link href="teste.css" rel="stylesheet"/>
	<script src="scripts/seu-script.js"></script>

<?php
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION['id'])){
        session_destroy();
        header ("location: index.html"); 
        exit;
    }
?>
</head>
<body>
<h2>República Fácil</h2>
	<h3>Bem vindo ao painel de controle</h3>
		<!--<li>-->
			<ul><a href="htmls/addMembro.html" class="button">Adicionar Membro</a></ul>
			<ul><a href="listaMembro.php" class="button">Listar Membros</a></ul>	
			<ul><a href="htmls/addConta.html" class="button">Adicionar Conta</a></ul>
			<ul><a href="listaConta.php" class="button">Listar Contas</a></ul>
			<ul><a href="sair.php" class="button">Sair</a></ul>
		<!--</li>-->	
</body>
</html>