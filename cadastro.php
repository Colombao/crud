<!doctype html>
<html lang="en">

<head>
    <title>Crud - Cadastro</title>
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

            $('#cep').keyup(function() {
                if ($('#cep').val().length == 9) {
                    $.ajax({
                        url: `http://viacep.com.br/ws/${ $('#cep').val()}/json/`,
                        type: "GET",
                        success: function(data) {
                            $("#rua").val(data.logradouro);
                            $("#complemento").val(data.complemento);
                            $("#bairro").val(data.bairro);
                        }
                    })
                }
            })


            $('#cadastro_form').on("submit", function(event) {

                event.preventDefault();

                $.ajax({

                    url: "registro.php",
                    type: "POST",
                    data: $('#cadastro_form').serialize(),
                    success: function(response) {
                        if (response.includes("sucesso")) {
                            Swal.fire(
                                'Bom trabalho',
                                response,
                                'success'
                            ).then(function(result) {
                                if (result.isConfirmed) {
                                    window.location.href = 'index.php'
                                }

                            })
                        } else {
                            Swal.fire(
                                'Pessimo trabalho',
                                response,
                                'error'
                            )
                        }
                    },
                });
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
                                    <h3 class="mb-4">Criar conta</h3>
                                </div>

                            </div>
                            <form type="post" action="" class="singup-form" id="cadastro_form">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="nome" required>
                                    <label class="form-control-placeholder" for="username">Nome Completo</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="usuario" required>
                                    <label class="form-control-placeholder" for="username">Nome de usuário</label>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required>
                                    <label class="form-control-placeholder" for="username">Email</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="senha" required>
                                    <label class="form-control-placeholder" for="password">Senha</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control cpf-mask" name="cpf" maxlength="11" required>
                                    <label class="form-control-placeholder" for="cpf">Cpf</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control cep-mask" name="cep" id="cep" required>
                                    <label class="form-control-placeholder" for="cep">CEP</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="rua" id="rua" required>
                                    <label class="form-control-placeholder" for="rua">Rua</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="number" class="form-control" name="Numero" id="numero" required>
                                    <label class="form-control-placeholder" for="Numero">Numero da casa</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Bairro" id="bairro" required>
                                    <label class="form-control-placeholder" for="Bairro">Bairro</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="complemento">
                                    <label class="form-control-placeholder" for="Complemento">Complemento</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control cel-sp-mask" name="Telefone" required>
                                    <label class="form-control-placeholder" for="telefone">Telefone</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control date-mask" name="nascimento">
                                    <label class="form-control-placeholder" for="nascimento">Data de nascimento</label>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="btn_cadastro" class="form-control btn btn-primary rounded submit px-3">
                                        Cadastrar
                                    </button>
                                </div>
                                <div class="form-group">
                                    <a href="index.php"> <button value="cadastrar" id="btn_cadastro" type="button" class="form-control btn btn-primary rounded submit px-3">
                                            Login </button></a>
                                </div>

                            </form>
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