
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