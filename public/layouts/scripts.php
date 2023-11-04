    </div>

    <script src="<?= $url ?>src/js/popper.min.js"></script>
    <script src="<?= $url ?>src/js/bootstrap.min.js"></script>
    <script src="<?= $url ?>src/plugins/jquery/jquery.min.js"></script>
    <script src="<?= $url ?>src/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= $url ?>src/js/adminlte.js"></script>
    <script src="<?= $url ?>src/js/pages/dashboard.js"></script>
    <script src="<?= $url ?>src/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= $url ?>src/js/code.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('#myTable').DataTable({

                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
    
        });
    </script>
    </body>

    </html>