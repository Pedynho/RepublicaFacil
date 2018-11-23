<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title>ListaDeMembros</title>
	<link href="teste.css" rel="stylesheet"/>
	<script src="scripts/seu-script.js"></script>
</head>

<?php
    //inicia a sessão
    if (!isset($_SESSION)) session_start();
    $tabela = $_SESSION['id'];

	//conexão
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$mysqli = new mysqli("localhost", "root", "", "test");

	//pegando todos os membros
	$sql = "SELECT * FROM contas".$tabela;

	$res = $mysqli->query($sql);

?>
<body>
<h2>República Fácil</h2>
<h3>Lista de Contas</h3>
	<?php 
		while ($row = $res->fetch_assoc()){
			if($res->num_rows >= 1){ 
				echo '<label>
				<p>Conta: <span>'.$row['descricao'].'</span> Valor: <span>R$'.$row['valor'].'</span></p>
				<p>Vencimento: <span>'.$row['vencimento'].'</span></p>
				<p><a href="apagarConta.php?id='.$row['id'].'">Apagar</a></p></label>';
			}else{
				echo'<h2>Nenhum Membro Cadastrado!</h2>';
				break;
			}
		}

		mysqli_close($mysqli);
	?>
</body>
</html>