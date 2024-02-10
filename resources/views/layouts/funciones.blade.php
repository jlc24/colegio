<script type="text/javascript">
    function mostrarCargando() {
        Swal.fire({
            title: 'Espere...',
            text: 'Cargando datos.',
            icon: 'info',
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading()
            },
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    function cerrarCargando() {
        Swal.close();
    }
</script>