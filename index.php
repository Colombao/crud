<!doctype html>
<html lang="en">

<head>
	<title>Crud</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">

	<script type="text/javascript">
		$(document).ready(function() {

			$('#login_form').on("submit", function(event) {

				event.preventDefault();

				$.ajax({

					url: "validar.php",
					type: "POST",
					data: $('#login_form').serialize(),
					success: function(response) {
						if (response == 'usuario existe') {
							Swal.fire(
								'Bom trabalho',
								' ',
								'success'

							).then(function(result) {
								if (result.isConfirmed) {
									window.location.href = 'home.php'
								}
							})
						} else {
							Swal.fire(
								'Tente novamente',
								'Login e ou senha incorretos ',
								'error'

							)
							console.log(response);
						}

					},
				})
				return false;
			});


		});
	</script>

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Logar</h3>
								</div>

							</div>
							<form type="post" action="#" class="signin-form" id="login_form">
								<div class="form-group mt-3">
									<input type="text" class="form-control" name="usuario" required>
									<label class="form-control-placeholder" for="username">Nome de usuário</label>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" class="form-control" name="senha" required>
									<label class="form-control-placeholder" for="password">Senha</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</form>
							<p class="text-center">Não é membro?? <a href="cadastro.php">Sign Up</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script async="" src="//www.google-analytics.com/analytics.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
	<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</body>

</html>