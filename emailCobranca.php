<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';


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
	$mail->addAddress('pedromourapc@gmail.com', 'Beltrano Santos');

	$mail->isHTML(true);
	$mail->Subject = 'Republica Facil - Cobranca';
	$mail->Body    = '<h3>Ola, Beltrano Santos</h3>
						<p>Estou lhe notificando que a conta <b>Agua</b> no valor de <b>R$ 11,76</b> esta proximo de se vencer (data de vencimento 01/12).</p>
						<h3>Mantenha suas contas em dias! S2 :)</h3>';

	if(!$mail->send()) {
	    echo 'Não foi possível enviar a mensagem.';
	    echo 'Erro: ' . $mail->ErrorInfo;
	} else {
    	echo '<p><h1>Mensagem enviada.</h1></p> 
    			<h3>Entre no seu e-mail e clique no link que lhe enviamos para completar o cadastro!</h3>';
	}
?>
	