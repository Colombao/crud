<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Crud</title>

    <head>
        <meta charset="utf-8">
        <title>Crud</title>
        <!-- Jquery -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="custom.js"></script>
    </head>


<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
            <h1 class="display-5 mb-2">Bem vindo ao seu perfil</h1>
            <div class="float-right">
                <button type="button" class="btn btn-outline-danger btn-sm"><a href=" index.php" style=" text-decoration: none; color:black;">Logout</a></button>
                <a href=" home.php" style=" text-decoration: none; color:black;"><button type="button" class="btn btn-outline-info btn-sm"> Home</button></a>
            </div>
        </div>
    </div>
    <table id="Perfil" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Usuario</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#Perfil').DataTable({
                "deferRender": true,
                "ajax": "dbperfil.php",
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "datatables_id"
                    },
                    {
                        "data": "perfil"
                    },
                    {
                        "data": "acoes"
                    }
                ]
            });

            $('#Perfil').on('click', '.editar', function() {
                var data = $('#Perfil').DataTable().row($(this).parents('tr')).data();
                console.log(data);

            });



        });

        function deletarperfil(id) {
            $.ajax({
                url: 'deleteperfil.php',
                method: 'POST',
                data: {
                    id_perfil: id
                },
                success: function(data) {
                    Swal.fire(
                        'Bom trabalho',
                        data,
                        'success'

                    )
                }
            });
        }
    </script>
</body>

</html>