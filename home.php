<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Crud</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    include "conexao.php";

    $stmt = $conn->prepare("SELECT perfil FROM perfil");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!-- Barra lateral -->
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
                    <li> <span type="button" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">Cadastrar</span>
                    </li>
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

    <div class="position-absolute">
        <span class="open-btn" onclick="openSidebar()" style="font-size:30px"><i class="bi bi-arrow-bar-right"></i></span>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2">

            <h1 class=" display-5 mb-2">Listar Usuários</h1>
        </div>
    </div>


    <span id="msgAlerta"></span>

    <table id="usuarios" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Perfil</th>
            </tr>
        </thead>
    </table>
    </div>
    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadUsuarioModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCad"></span>
                    <form method="POST" id="form-cad-usuario">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="idade" class="col-sm-2 col-form-label">Telefone</label>
                            <div class="col-sm-10">
                                <input type="text" name="Telefone" class="form-control Telefone" id="TelefoneCad" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cpf</label>
                            <div class="col-sm-10">
                                <input type="text" name="Cpf" class="form-control Cpf" id="CpfCad" placeholder="Cpf">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cep</label>
                            <div class="col-sm-10">
                                <input type="text" name="Cep" class="form-control Cep" id="CepCad" placeholder="Cep">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Rua</label>
                            <div class="col-sm-10">
                                <input type="text" name="Rua" class="form-control Rua" id="RuaCad" placeholder="Rua">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bairro</label>
                            <div class="col-sm-10">
                                <input type="text" name="Bairro" class="form-control Bairro" id="BairroCad" placeholder="Bairro">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nascimento</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nascimento" class="form-control Nascimento" id="NascimentoCad" placeholder="Nascimento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Complemento</label>
                            <div class="col-sm-10">
                                <input type="text" name="complemento" class="form-control Complemento" id="ComplementoCad" placeholder="Complemento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Numero</label>
                            <div class="col-sm-10">
                                <input type="text" name="Numero" class="form-control" id="NumeroCad" placeholder="Numero">
                            </div>
                        </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Login</label>
                    <div class="col-sm-10">
                        <input type="text" name="Login" class="form-control" id="LoginCad" placeholder="Login">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="text" name="Senha" class="form-control" id="SenhaCad" placeholder="Senha">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <select data-placeholder="Escolha..." name="profile_id" id="cadperfil" class="form-control obrigatorios chosen-select" tabindex="2" required>
                            <option selected value="">Escolha...</option>
                            <?php

                            try {
                                $stmt->execute();
                            } catch (PDOException $e) {
                                $e->getMessage();
                            }

                            while ($perfil = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $perfil['perfil'] . '">' . $perfil['perfil'] . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-success btn-sm" id="CadUsuario" value="Cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visUsuarioModalLabel">Detalhes do Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="idUsuario"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="nomeUsuario"></span></dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9"><span id="emailUsuario"></span></dd>

                        <dt class="col-sm-3">Telefone</dt>
                        <dd class="col-sm-9"><span id="telefoneUsuario"></span></dd>

                        <dt class="col-sm-3">Cep</dt>
                        <dd class="col-sm-9"><span id="cepUsuario"></span></dd>

                        <dt class="col-sm-3">Cpf</dt>
                        <dd class="col-sm-9"><span id="cpfUsuario"></span></dd>

                        <dt class="col-sm-3">Numero</dt>
                        <dd class="col-sm-9"><span id="numeroUsuario"></span></dd>

                        <dt class="col-sm-3">Bairro</dt>
                        <dd class="col-sm-9"><span id="bairroUsuario"></span></dd>

                        <dt class="col-sm-3">Nascimento</dt>
                        <dd class="col-sm-9"><span id="nascimentoUsuario"></span></dd>

                        <dt class="col-sm-3">complemento</dt>
                        <dd class="col-sm-9"><span id="complementoUsuario"></span></dd>

                        <dt class="col-sm-3">Perfil</dt>
                        <dd class="col-sm-9"><span id="perfilUsuario"></span></dd>

                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUsuarioModal" tabindex="-1" aria-labelledby="editUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUsuarioModalLabel">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroEdit"></span>
                    <form method="POST" id="form-edit-usuario">
                        <input type="hidden" name="id" id="editid">

                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="editnome" placeholder="Nome completo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="editemail" placeholder="Email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class=" col-sm-2 col-form-label">Nascimento</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nascimento" class="form-control Nascimento" id="editnascimento" placeholder="Nascimento">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Cpf</label>
                            <div class="col-sm-10">
                                <input type="text" name="Cpf" class="form-control Cpf" id="editcpf" placeholder="Cpf">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cep</label>
                            <div class="col-sm-10">
                                <input type="text" name="Cep" class="form-control Cep" id="editcep" placeholder="Cep">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label " class=" col-sm-2 col-form-label">Rua</label>
                            <div class="col-sm-10">
                                <input type="text" name="Rua" class="form-control Rua" id="editrua" placeholder="Rua">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Bairro</label>
                            <div class="col-sm-10">
                                <input type="text" name="Bairro" class="form-control Bairro" id="editbairro" placeholder="Bairro completo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Telefone</label>
                            <div class="col-sm-10">
                                <input type="text" name="Telefone" class="form-control Telefone" id="edittelefone" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Numero</label>
                            <div class="col-sm-10">
                                <input type="text" name="Numero" class="form-control Complemento" id="editnumero" placeholder="Numero">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Complemento</label>
                            <div class="col-sm-10">
                                <input type="text" name="complemento" class="form-control Complemento" id="editcomplemento" placeholder="Complemento">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Perfil</label>
                            <div class="col-sm-10">
                                <select name="profile_id" id="editperfil" class="form-control obrigatorios chosen-select" tabindex="2" required>
                                    <?php

                                    try {
                                        $stmt->execute();
                                    } catch (PDOException $e) {
                                        $e->getMessage();
                                    }

                                    while ($perfil = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option value="' . $perfil['perfil'] . '">' . $perfil['perfil'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar" id="salvaredit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="custom.js"></script>
    <script>
        function closeSidebar() {
            document.querySelector('.sidebar').style.width = "0";
            document.querySelector('.main').style.marginLeft = "0";
        }

        function openSidebar() {
            document.querySelector('.sidebar').style.width = "200px";
            document.querySelector('.main').style.marginLeft = "200px";
        }
        $(document).ready(function() {

            $('.Cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.Telefone').mask('(00) 00000-0000');
            $('.Cep').mask('00000-000');
            $('.Nascimento').mask('00/00/0000');


            $('#CepCad').keyup(function() {
                if ($('#CepCad').val().length == 9) {
                    $.ajax({
                        url: `http://viacep.com.br/ws/${ $('#CepCad').val()}/json/`,
                        type: "GET",
                        success: function(data) {
                            $("#RuaCad").val(data.logradouro);
                            $("#ComplementoCad").val(data.complemento);
                            $("#BairroCad").val(data.bairro);
                        }
                    })
                }
            })
            $('#editcep').keyup(function() {
                if ($('#editcep ').val().length == 9) {
                    $.ajax({
                        url: `http://viacep.com.br/ws/${ $('#editcep').val()}/json/`,
                        type: "GET",
                        success: function(data) {
                            $("#editrua").val(data.logradouro);
                            $("#editcomplemento").val(data.complemento);
                            $("#editbairro").val(data.bairro);
                        }
                    })
                }
            })
        })
    </script>
</body>

</html>


<!-- https://bbbootstrap.com/snippets/bootstrap-5-sidebar-menu-toggle-button-34132202 -->