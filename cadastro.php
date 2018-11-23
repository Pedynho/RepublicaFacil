<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tabela = md5(uniqid(time()));

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$con = new mysqli("localhost", "root", "", "test");
	$sql = "INSERT INTO rep (nome,sobrenome,email,senha,tabela) 
			VALUES ('".$nome."','".$sobrenome."','".$email."','".$senha."','".$tabela."')";
	$con->query($sql);
	mysqli_close($con);



	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Username = 'xpedrocaka@gmail.com';
	$mail->Password = 'Pedro@moura123';
	$mail->Port = 587;

	$mail->setFrom('xpedrocaka@gmail.com');
	$mail->addReplyTo('no-reply@email.com.br');
	$mail->addAddress($email, $nome);

	$mail->isHTML(true);
	$mail->Subject = 'Republica Facil';
	$mail->Body    = '<p><h2>Clique no seguinte link para continuar o cadastro:</h2></p>
						http://localhost/RepublicaFacil/continua.php?c='.$tabela;

	if(!$mail->send()) {
	    echo 'Não foi possível enviar a mensagem.';
	    echo 'Erro: ' . $mail->ErrorInfo;
	} else {
    	echo '<p><h1>Mensagem enviada.</h1></p> 
    			<h3>Entre no seu e-mail e clique no link que lhe enviamos para completar o cadastro!</h3>';
	}
?>
	