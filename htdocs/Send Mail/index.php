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
				<h3 class="lead">Enviamos seu e-mail para nosso suporte!</h3>
			</div>

      		<div class="row">
      			<div class="col-md-12">
					<div class="card-body font-weight-bold">
						<form action="process.php" method="post">

							<div class="form-group">
								<label for="para">Seu e-mail</label>
								<input name="email" type="email" class="form-control" id="email" placeholder="exemplo@dominio.com">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea name="mensagem" class="form-control" id="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>