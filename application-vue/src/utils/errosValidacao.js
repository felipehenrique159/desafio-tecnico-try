import Swal from 'sweetalert2'

function tratarMensagensErro(error) {
    if (error.response && error.response.data.message == 'dados inválidos') {
        Swal.fire({
            title: error.response.data.message,
            html: Object.values(error.response.data.errors).join('<br>'),
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    }
}

export default tratarMensagensErro