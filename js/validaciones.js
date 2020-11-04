function valregistro(accion) {
    var cont = 0;
    if (accion == 'guardar') {
        if (document.form1.name.value == '') {
            cont++
            document.getElementById('name').style.borderColor = 'red';
        } else {
            document.getElementById('name').style.borderColor = 'white';
        }
        if (document.form1.email.value == '') {
            cont++
            document.getElementById('email').style.borderColor = 'red';
        } else {
            document.getElementById('email').style.borderColor = 'white';
        }
        if (document.form1.username.value == '') {
            cont++
            document.getElementById('username').style.borderColor = 'red';
        } else {
            document.getElementById('username').style.borderColor = 'white';
        }
        if (document.form1.password.value == '') {
            cont++
            document.getElementById('password').style.borderColor = 'red';
        } else {
            document.getElementById('password').style.borderColor = 'white';
        }
    }

    if (cont != 0) {
        alert('Debe Ingresar todos los datos en el formulario');
        return false;
    } else {
        document.form1.tarea.value = accion;
        document.form1.submit();
    }

}


function validar_clave() {
    var contrasenna = document.form1.password.value

    if (contrasenna.length >= 6) {
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter_raro = false;

        for (var i = 0; i < contrasenna.length; i++) {
            if (contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90) {
                mayuscula = true;
            } else if (contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122) {
                minuscula = true;
            } else if (contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57) {
                numero = true;
            } else {
                caracter_raro = true;
            }
        }
        if (mayuscula == true && minuscula == true && caracter_raro == true && numero == true) {
            return true;
        }
        if (mayuscula == false) {
            alert("La clave debe contener al menos una Mayuscula");
            return false;
        }
        if (minuscula == false) {
            alert("La clave debe contener al menos una Minuscula");
            return false;
        }
        if (numero == false) {
            alert("La clave debe contener al menos un Numero");
            return false;
        }
    } else {
        alert("La clave debe tener al menos 6 caracteres");
        return false;
    }
    return false;
}

function valadicionar(accion) {
    var cont = 0;
    var fecha = new Date();
    var ano = fecha.getFullYear();
    if (accion == 'guardar') {
        if (document.form1.titulo.value == '') {
            cont++
            document.getElementById('titulo').style.borderColor = 'red';
        } else {
            document.getElementById('titulo').style.borderColor = 'white';
        }
        if (document.form1.year.value == 0) {
            cont++
            document.getElementById('year').style.borderColor = 'red';
        } else {
            if (document.form1.year.value > ano) {
                cont++
                document.getElementById('year').style.borderColor = 'red';
            } else {
                document.getElementById('year').style.borderColor = 'white';

            }
        }

        if (cont != 0) {
            alert('Debe Ingresar todos los datos en el formulario');
            return false;
        } else {
            document.form1.tarea.value = accion;
            document.form1.submit();
        }

    }
}