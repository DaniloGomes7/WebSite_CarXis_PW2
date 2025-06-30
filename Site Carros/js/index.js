function logar(event) {
    //impede o envio normal do formulário
    //força a chamada a passar pelo "modal"

    event.preventDefault();

    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;

    if (usuario == 'admin' && senha == 'admin') {
        Swal.fire({
            title: 'Login efetuado!',
            text: 'Bem-vindo, ' + usuario + '!',
            icon: 'success',
            confirmButtonText: "OK"
        }).then(() => {
            setTimeout(() => {
                location.href = "./html/home.html";
            }, 100);
        });
    } else {
        Swal.fire({
            title: 'Erro!',
            text: 'Usuario ou senha incorretos',
            icon: 'error',
            confirmButtonText: "Tentar novamente"
        }).then(() => {
        });
    }
}
// ./html/home.html