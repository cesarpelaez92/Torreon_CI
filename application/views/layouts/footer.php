<!-- jQuery -->
<script src="<?= base_url() ?> ../../plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?> ../../plugins/jquery-ui/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?> ../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?> ../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?> ../../plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?> ../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src=" <?= base_url() ?> ../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" <?= base_url() ?> ../../dist/js/demo.js"></script>
<script>
    var base_url = "<?php echo base_url();?>";
    
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        $.ajax({
          url: ruta,
          type: "POST",
          success :function(res){
            window.location.href = base_url + res;
          }
        });
    });

    $(".btn-view-cliente").on("click", function(){
      var cliente = $(this).val();
      var infoCliente = cliente.split("*");
     html = "<p><strong>Codigo Cliente: </strong>"+infoCliente[0]+"</p>"
     html += "<p><strong>Cedula: </strong>"+infoCliente[1]+"</p>"
     html += "<p><strong>Nombres: </strong>"+infoCliente[2]+"</p>"
     html += "<p><strong>Apellidos: </strong>"+infoCliente[3]+"</p>"
     html += "<p><strong>Email: </strong>"+infoCliente[4]+"</p>"
     html += "<p><strong>Telefono: </strong>"+infoCliente[5]+"</p>";
     $("#modal-default .modal-body").html(html);
    });

    $(".btn-view-asesor").on("click", function(){
      var asesor = $(this).val();
      var infoAsesor = asesor.split("*");
     html = "<p><strong>Cedula: </strong>"+infoAsesor[0]+"</p>"
     html += "<p><strong>Nombres: </strong>"+infoAsesor[1]+"</p>"
     html += "<p><strong>Apellidos: </strong>"+infoAsesor[2]+"</p>"
     html += "<p><strong>Email: </strong>"+infoAsesor[3]+"</p>"
     html += "<p><strong>Telefono: </strong>"+infoAsesor[4]+"</p>";
     $("#modal-default .modal-body").html(html);
    });

    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
          url: base_url + "/mantenimiento/proyectos/view/" + id,
          type: "POST",
          success :function(res){
            $("#modal-default .modal-body").html(res);
          }
        });
    });
    $("#example1").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrnado registros de _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior",
              },
          }
      });
    
    $(document).on("click", ".btn-check", function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    })

    $("#proyecto").autocomplete({
        source: function(request, response){
          $.ajax({
            url: base_url+"movimientos/cotizaciones/getproyectos",
            type: "POST",
            dataType:"json",
            data:{ valor: request.term},
            success: function(data){
                response(data);
            }
          })
        },
        minLength:1,
        select: function(event, ui){
          data = ui.item.proyecto_id + "*" + ui.item.label + "*" + ui.item.cantidad_pisos + "*" +
                  ui.item.cantidad_aptos + "*" + ui.item.descripcion;
            $("#btn-agregar").val(data);

        },
    });

    $("#btn-agregar").on("click", function(){
      data = $(this).val();
      if (data !=''){
          infoproducto = data.split("*");
          html = "<tr>";
            html +="<td><input type='hidden' name='idproyecto' value='"+infoproducto[0]+"'>"+infoproducto[0]+"</td>";
            html +="<td><input type='hidden' name='nombreProyecto' value='"+infoproducto[1]+"'>"+infoproducto[1]+"</td>";
            html +="<td><input type='hidden' name='pisoElegido'><input type='text' name='piso' value='1'></td>";
            html +="<td><input type='hidden' name='aptoElegido'><input type='text' name='apto' value='101'></td>";
            html +="<td <input type='hidden' name='precio' value=''><input type='text' name='valor' value=''></td>";
            html +="<td><input type='hidden' name='descripcionApto[]'><input type='text' name='descripcionApto' value='Baños: Alcobas: ,Sala, cocina, patio'></td>";
              html += "<td><button type='button' class='btn btn-danger btn-remove-proyecto'><span class='fa fa-trash-alt'></span></button></td>"
          html +="</tr>";

          $("#tbventas tbody").append(html);
      }else{
        alert("Seleccione un proyecto")
      }
    })

    $(document).on("click", ".btn-remove-proyecto", function(){
        $(this).closest("tr").remove();
    })


</script>
</body>
</html>