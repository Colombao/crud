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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <div class="sidebar">
        <span class="close-btn" onclick="closeSidebar()" style="font-size:30px"><i class="bi bi-arrow-bar-left"></i></span>
        <h3 class="text-center">Menu</h3>
        <ul class="accordion">
            <li></li>
            <li>
                <a style=" text-decoration: none; color:black;" href="#" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#submenu-users">
                    <i class="fa fa-users"></i> Páginas
                </a>
                <ul id="submenu-users" class="accordion-collapse collapse">
                    <li><a style=" text-decoration: none; color:black;" href="home.php">Home</a></li>
                    <li><a style=" text-decoration: none; color:black;" href="perfilconfig.php">Perfil</a></li>
                </ul>
            </li>
            <li>
                <a style=" text-decoration: none; color:black;" href="#" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#submenu-pages">
                    <i class="fa fa-home"></i> Ações
                </a>
                <ul id="submenu-pages" class="accordion-collapse collapse">
            </li>
            <li><a href=" perfil.php" style=" text-decoration: none; color:black;"><span type="button">Criar perfil</span></a></li>
        </ul>
        </li>
        <li>
            <a style=" text-decoration: none; color:black;" href="#" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#submenu-options">
                <i class="fa fa-users"></i> Sair
            </a>
            <ul id="submenu-options" class="accordion-collapse collapse">
                <li> <span type="button"><a href=" index.php" style=" text-decoration: none; color:black;">Logout</a></span>
                </li>
            </ul>
        </li>
        </ul>
    </div>

<body>
    <div class="position-absolute">
        <span class="open-btn" onclick="openSidebar()" style="font-size:30px"><i class="bi bi-arrow-bar-right"></i></span>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
            <h1 class="display-5 mb-2">Bem vindo ao seu perfil</h1>
            <div class="float-right">
            </div>
        </div>
    </div>

    <table id="Perfil" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
    <div class="modal fade" id="atribuirForm" tabindex="-1" aria-labelledby="atribuirFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="atribuirFormLabel">Atribuir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCad"></span>
                    <form id="atribuirForm">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="4" name="perfilId" class="form-control cep" id="idUsuario" placeholder="Id do Usuario">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-outline-warning btn-sm" value="atribuir">Confirmar</button>
                    </form>

                    <script type="text/javascript">
                        function closeSidebar() {
                            document.querySelector('.sidebar').style.width = "0";
                            document.querySelector('.main').style.marginLeft = "0";
                        }

                        function openSidebar() {
                            document.querySelector('.sidebar').style.width = "200px";
                            document.querySelector('.main').style.marginLeft = "200px";
                        }
                        let datatable = $('#Perfil').DataTable({
                            "deferRender": true,
                            "ajax": "dbperfil.php",
                            "columns": [{
                                    "data": "id_perfil"
                                },
                                {
                                    "data": "perfil"
                                },
                                {
                                    "data": "acoes"
                                }
                            ]
                        });
                        async function atribuirPerfil(id_perfil) {
                            const dados = await fetch('vis2.php?id_perfil=' + id_perfil);
                            const resposta = await dados.json();
                            console.log(resposta.dados.perfil);
                            $('#atribuirForm').on('submit', function(event) {
                                event.preventDefault();
                                var data = {
                                    perfil: resposta.dados.perfil,
                                    perfilId: $('[name="perfilId"]').val()
                                };
                                console.log(data);
                                $.ajax({
                                    url: 'atribuir.php',
                                    method: 'POST',
                                    data: data,
                                    success: function(response) {
                                        if (response == 'Usuario atribuido com sucesso') {
                                            Swal.fire(
                                                'Bom trabalho',
                                                data,
                                                'success'

                                            ).then(function(result) {
                                                location.reload();

                                            })
                                        } else {
                                            Swal.fire(
                                                'Impossivel excluir',
                                                ' Erro ao cadastrar',
                                                'error',
                                            ).then(function(result) {
                                                location.reload();

                                            })
                                        }
                                    }
                                });
                            })
                        }
                        $('.Cep').mask('000');
                        $('.perfil').mask('SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS');

                        async function editarperfil(id_perfil) {
                            let name = await fetch(`resgatarperfil.php?id_perfil=${id_perfil}`);
                            const nomeperfil = $(`#nome_perfil_${id_perfil}`).text();
                            name = await name.json();
                            console.log(name.perfil);
                            $(`#nome_perfil_${id_perfil}`).html(`<input type='text' id="edit_perfil_${id_perfil}" value="${name.perfil}"><div><button class='salvar btn btn-outline-info' id="salvarperfil" onclick='salvar(${id_perfil})'>Salvar</button> <button class='salvar btn btn-outline-danger' id="voltar" onclick='voltar()'>Voltar</button></div>`)

                        }
                        async function salvar(id_perfil) {
                            const nomeperfil = $(`#edit_perfil_${id_perfil}`).val();
                            // console.log(nomeperfil);
                            let save = await fetch(`salvar.php?id_perfil=${id_perfil}&perfil=${nomeperfil}`);
                            let data = await save.json();
                            // console.log(data);
                            if (data.data.includes('sucesso')) {
                                Swal.fire(
                                    'Bom trabalho',
                                    data.data,
                                    'success'

                                ).then(function(result) {
                                    datatable.ajax.reload();

                                })

                            } else {
                                Swal.fire(
                                    'Impossivel editar',
                                    data.data,
                                    'error'

                                )
                            }
                        }
                        async function voltar() {
                            datatable.ajax.reload();
                        }


                        function deletarperfil(id_perfil) {
                            $.ajax({
                                url: 'deleteperfil.php',
                                method: 'POST',
                                data: {
                                    id_perfil: id_perfil
                                },
                                success: function(data) {
                                    if (data == 'Usuario apagado com sucesso') {
                                        Swal.fire(
                                            'Bom trabalho',
                                            data,
                                            'success'

                                        ).then(function(result) {
                                            datatable.ajax.reload();

                                        })
                                    } else {
                                        Swal.fire(
                                            'Impossivel excluir',
                                            data,
                                            'error',
                                        )
                                    }
                                }
                            });
                        }
                    </script>
</body>

</html>