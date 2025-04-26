function cadastrar(event){
    //impede o envio normal do formulário
    //força a chamada a passar pelo "modal"

    event.preventDefault();

    var email = document.getElementById('email').value;
    var usuario = document.getElementById('usuario').value;
    var senha = document.getElementById('senha').value;


    if(email == 'danilo1234@gmail.com' && usuario == 'danilo' && senha == '123456'){  
        Swal.fire({
            title: 'Login efetuado!',
            text: 'Bem-vindo, ' + usuario + '!',
            icon: 'success',
            confirmButtonText: "OK"
        }).then(() => {
            setTimeout(() => {
                location.href="./index.html";
            }, 100);
        });
    
    }
}
