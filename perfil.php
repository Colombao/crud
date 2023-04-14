<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Crud</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
            <h1 class="display-5 mb-2">Criar perfil</h1>
            <div class="float-right">
                <button type="button" class="btn btn-outline-danger btn-sm"><a href=" index.php" style=" text-decoration: none; color:black;">Logout</a></button>
                <a href=" home.php" style=" text-decoration: none; color:black;"><button type="button" class="btn btn-outline-info btn-sm"> Home</button></a>
            </div>
        </div>
    </div>
    <div class="container ">

        <form action="" method="POST" name="CriarPerfil" id="criarPerfil">

            <div class=" form-group d-flex justify-content-between align-items-center ">
                <div class=" col-md-6 offset-md-3">
                    <label> Nome de perfil</label>
                    <input type="text" name="perfil" class="form-control " placeholder="Nome de perfil" require d="" value="perfil">
                    <button type="submit" class="btn btn-outline-success btn-sm" value="Criar">Criar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="custom.js"></script>
    <script>
        $(document).ready(function() {

            $('#criarPerfil').on("submit", function(event) {

                event.preventDefault();

                $.ajax({

                    url: "criarPerfil.php",
                    type: "POST",
                    data: $('#criarPerfil').serialize(),
                    success: function(response) {
                        if (response == 'Salvo com sucesso!') {
                            Swal.fire(
                                'Bom trabalho',
                                'Voce consegiu ',
                                'success'

                            ).then(function(result) {
                                if (result.isConfirmed) {
                                    window.location.href = 'perfilconfig.php'
                                }
                            })
                        } else {
                            Swal.fire(
                                'Deu ruim',
                                response,
                                'error'
                            )
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>