
<script src="../../jQuery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap-3.3.0.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="../../js/app.js"></script>

  <script>
  $(document).ready(function(){
      $('#tabela').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "search": "Pesquisar"
            }
        });
  });
  </script>
    </body>
</html>