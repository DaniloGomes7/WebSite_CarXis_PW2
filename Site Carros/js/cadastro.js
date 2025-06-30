function cadastrar(event) {
    //impede o envio normal do formulário
    //força a chamada a passar pelo "modal"

    event.preventDefault();
    
    var usuario = document.getElementById('usuario').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;


    if (usuario == 'danilo' && email == 'danilo1234@gmail.com' && senha == '123456') {
        Swal.fire({
            title: 'Login efetuado!',
            text: 'Bem-vindo, ' + usuario + '!',
            icon: 'success',
            confirmButtonText: "OK"
        }).then(() => {
            setTimeout(() => {
                location.href = "./index.html";
            }, 100);
        });
    } else {
        Swal.fire({
            title: 'Erro!',
            text: 'Preencha corretamente',
            icon: 'error',
            confirmButtonText: "Tentar novamente"
        }).then(() => {
        });
    }
}
