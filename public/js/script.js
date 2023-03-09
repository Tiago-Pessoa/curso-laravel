function deleteEvent(id) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: 'Esta ação não pode ser desfeita!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}

function registerUser() {
    // Seleciona todos os inputs do formulário
    var inputs = document.querySelectorAll('#register-form input');
    var password = document.getElementById('password').value;
    var passwordConfirm = document.getElementById('password-confirm').value;
    var minLength = 8; // Define o número mínimo de caracteres
    var email = document.getElementById('email').value;

    // Verifica se já existe um usuário com o email cadastrado
    axios.get('/check-user/' + email)
    .then(response => {
        if (response.data.exists) {
            Swal.fire({
              icon: 'error',
              title: 'Operação cancelada!',
              text: 'O usuário com o e-mail ' + email + ' já existe.'
            });
        }
    })
    .catch(error => {
        console.log('Ocorreu um erro ao verificar o usuário: ' + error);
    });

    // Verifica se todos os campos estão preenchidos
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Por favor, preencha todos os campos',
            });
            return false;
        }
    }

    // Se todos os campos estiverem preenchidos e a senha estiver no tamanho correto, exibe o alerta de confirmação
    if (password.length < minLength) {
        Swal.fire({
            title: 'Erro!',
            text: 'A senha deve ter no mínimo ' + minLength + ' caracteres.',
            icon: 'error',
            confirmButtonText: 'Ok'
        });
        return;
    }else {
        Swal.fire({
            text: 'Usuário cadastrado com sucesso!',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('register-form').submit();
            }
        });
    }

    //Alerta se a senha não for igual a confirmação
    if (password !== passwordConfirm) {
        Swal.fire({
            title: 'Erro!',
            text: 'As senhas não são iguais.',
            icon: 'error',
            confirmButtonText: 'Ok'
        });
        return;
    }
}

function login() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email.trim() == '' || password.trim() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Atenção!',
            text: 'Por favor, preencha todos os campos do formulário!',
        });
    } else {
        document.getElementById('login-form').submit();
    }
}

function validarFormulario() {
    var titulo = document.getElementById("title").value;
    var data = document.getElementById("date").value;
    var cidade = document.getElementById("city").value;
    var descricao = document.getElementById("description").value;
    var dataEvento = new Date(document.getElementById("date").value);
    var dataAtual = new Date();
    var fileInput = document.getElementById('image');
    var checkboxes = document.querySelectorAll('input[name="items[]"]:checked');

    if (titulo == '' || data == '' || cidade == '' || descricao == '' | fileInput.value == '' | checkboxes.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Atenção!',
            text: 'Por favor, preencha todos os campos!',
        });
        return false;
    } else if (dataEvento < dataAtual){
        Swal.fire({
            icon: 'error',
            title: 'Atenção!',
            text: 'A data do evento precisa ser após a data de Hoje!',
        });
        return false;
    }else {

        return true;
    }
}
