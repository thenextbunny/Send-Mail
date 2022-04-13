<?php
    // Adicione o e-mail e senha de servidor nas linhas 60 e 61 para a aplicação funcionar.
    // Defina o e-mail que receberá o mail na linha 67

    // Importando PHPMailer 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer-8.1/PHPMailer/Exception.php";
    require "PHPMailer-8.1/PHPMailer/OAuth.php";
    require "PHPMailer-8.1/PHPMailer/PHPMailer.php";
    require "PHPMailer-8.1/PHPMailer/POP3.php";
    require "PHPMailer-8.1/PHPMailer/SMTP.php";

    // Recuperando dados do formulário
    class Email {
        private $email = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array('status' => null, 'descricao' => '');

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function mensagemValida() {
            if(empty($this->email) || empty($this->assunto || empty($this->mensagem))) {
                return false;
            } else {
                return true;
            }
        }
    }

    $email = new Email();
    $email->__set('email', $_POST['email']);
    $email->__set('assunto', $_POST['assunto']);
    $email->__set('mensagem', $_POST['mensagem']);

    
    // Recuperando o objeto Email e verificando se é válido
    if(!$email->mensagemValida()) {
        echo 'Mensagem não é válida';
        header('Location: index.php');
    }
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth   = true; //Enable SMTP authentication
        $mail->Username   = 'exemplo@exemplo.com'; //SMTP username
        $mail->Password   = 'password'; //SMTP password
        $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
        $mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($email->__get('email'));
        $mail->addAddress('exemplo@exemplo.com'); //Add a recipient
        $mail->addReplyTo($email->__get('email')); //Reply

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $email->__get('assunto');
        $mail->Body    = $email->__get('mensagem');

        $mail->send();

        // Enviado
        $email->status['status'] = 1;

    } catch (Exception $e) {
        // Não enviado
        $email->status['status'] = 2;
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
        <!-- Este arquivo foi criado dentro do htdocs do XAMPP e visualizado a partir do localhost com o uso do Apache -->

        <!-- Requeried meta tags -->
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'> 

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Title -->
        <title>Send Mail</title>
    </head>
	<body>
        <div class="container">
            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<h3 class="lead mb-4">Enviamos seu e-mail para nosso suporte!</h3>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <?php if($email->status['status'] == 1) { ?>
                        <div class="container">
                            <h3 class="text-success text-center">O e-mail foi enviado :)</h3>
                            <a href="index.php" class="btn btn-success mt-4 d-flex justify-content-center" style="width: 30%; margin: 0 auto;">Voltar</a>
                        </div>
                    <?php } ?>

                    <?php if($email->status['status'] == 2) { ?>
                        <div class="container">
                            <h3 class="text-success text-center">Ops... ocorreu um erro ao enviar o e-mail :(</h3>
                            <a href="index.php" class="btn btn-success mt-4 d-flex justify-content-center" style="width: 30%; margin: 0 auto;">Tentar novamente</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>

