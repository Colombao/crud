 $(document).ready(function() {
     $('#usuarios').DataTable({
         "processing": true,
            "serverSide": true,
            "ajax": {
            "url": "pesquisa.php",
            "type": "POST"         }
    });
 });

const formNewUser = document.getElementById("form-cad-usuario");
const fecharModalCad = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));
if (formNewUser) {
    formNewUser.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formNewUser);
        const dados = await fetch("cadastrar.php", {
            method: "POST",
            body: dadosForm
        });
        const resposta = await dados.json();

        if (resposta['status']) {
            document.getElementById("msgAlertErroCad").innerHTML = "";
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            formNewUser.reset();
            fecharModalCad.hide();
            listarDataTables = $('#usuarios').DataTable();
            listarDataTables.draw();

        } else {
            document.getElementById("msgAlertErroCad").innerHTML = resposta['msg'];
        }
    });
}

async function visualizar(id) {
    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();
   
    if (resposta['status']) {
        const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"));
        visModal.show();

        document.getElementById("idUsuario").innerHTML = resposta['dados'].id;
        document.getElementById("nomeUsuario").innerHTML = resposta['dados'].nome;
        document.getElementById("emailUsuario").innerHTML = resposta['dados'].email;
        document.getElementById("telefoneUsuario").innerHTML = resposta['dados'].Telefone;
        document.getElementById("cepUsuario").innerHTML = resposta['dados'].cep;
        document.getElementById("cpfUsuario").innerHTML = resposta['dados'].cpf;
        document.getElementById("numeroUsuario").innerHTML = resposta['dados'].Numero;
        document.getElementById("bairroUsuario").innerHTML = resposta['dados'].Bairro;
        document.getElementById("nascimentoUsuario").innerHTML = resposta['dados'].Nascimento;
        document.getElementById("complementoUsuario").innerHTML = resposta['dados'].complemento;

        document.getElementById("msgAlerta").innerHTML = "";
    } else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const editModal = new bootstrap.Modal(document.getElementById("editUsuarioModal"));
async function editUsuario(id) {

    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();

    if (resposta['status']) {
        console.log('status');
        document.getElementById("msgAlertErroEdit").innerHTML = "";

        document.getElementById("msgAlerta").innerHTML = "";
        editModal.show();

        document.getElementById("editid").value = resposta['dados'].id;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("editemail").value = resposta['dados'].email;
        document.getElementById("editnascimento").value = resposta['dados'].Nascimento;
        document.getElementById("editcpf").value = resposta['dados'].cpf;
        document.getElementById("editcep").value = resposta['dados'].Cep;
        document.getElementById("editrua").value = resposta['dados'].Rua;
        document.getElementById("editbairro").value = resposta['dados'].Bairro;
        document.getElementById("edittelefone").value = resposta['dados'].Telefone;
        document.getElementById("editcomplemento").value = resposta['dados'].complemento;
        document.getElementById("editnumero").value = resposta['dados'].Numero;
    } else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        console.log(resposta);
    }
}

const formEditUser = document.getElementById("form-edit-usuario");
if (formEditUser) {
    formEditUser.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditUser);

        const dados = await fetch("editar.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            // Manter a janela modal aberta
            //document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg'];

            // Fechar a janela modal
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            document.getElementById("msgAlertErroEdit").innerHTML = "";
            // Limpar o formulario
            formEditUser.reset();
            editModal.hide();

            // Atualizar a lista de registros
            listarDataTables = $('#usuarios').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg'];
        }
    });
}

async function apagarUsuario(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar) {
        const dados = await fetch("deletar.php?id=" + id);
        const resposta = await dados.json();

        if (resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];

            listarDataTables = $('#usuarios').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    }
}