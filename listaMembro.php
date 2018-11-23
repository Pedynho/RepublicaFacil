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
	$sql = "SELECT * FROM ".$tabela;

	$res = $mysqli->query($sql);

?>
<body>
<h2>República Fácil</h2>
<h3>Lista de Membros</h3>
	<?php 
		while ($row = $res->fetch_assoc()){
			if($res->num_rows >= 1){ 
				echo '<label><p>Nome: <span>'.$row['nome'].'</span> Sobrenome: <span>'.$row['sobrenome'].'</span></p><p><a href="apagarMembro.php?id='.$row['id'].'">Apagar</a></p></label>';
			}else{
				echo "<h3>Nenhum Membro Cadastrado!</h3>";
				break;
			}
		}

		mysqli_close($mysqli);
	?>
</body>
</html>