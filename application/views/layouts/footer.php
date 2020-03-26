<script src="<?= base_url() ?> ../../plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?> ../../plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url() ?> ../../plugins/jquery-print/jquery.print.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?> ../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?> ../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?> ../../plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?> ../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


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

    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
          url: base_url + "administrador/usuarios/view",
          type: "POST",
          data:{idusuario:id},
          success :function(res){
            $("#modal-default .modal-body").html(res);
          }
        });
    });

    
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Cotizaciones",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Cotizaciones",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
                
            }
        ],
      })


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
                  ui.item.cantidad_aptos + "*" + ui.item.descripcion + "*" + ui.item.valor;
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
            html +="<td><input type='hidden' name='pisoElegido' value='"+infoproducto[2]+"'><input type='text' name='apto' value='"+infoproducto[2]+"'></td>";
            html +="<td><input type='hidden' name='aptoElegido' value='1'><input type='text' min='1' name='piso' value='1' class='altura'></td>";
            html +="<td <input type='hidden' name='valores' value='"+infoproducto[5]+"'><p>"+infoproducto[5]+"</p></td>";
            html +="<td <input type='hidden' name='piso' value='"+infoproducto[5]+"'><input type='text' name='valor' value=''></td>";
            html +="<td><input type='hidden' name='descripcionApto[]' value='"+infoproducto[4]+"'><input type='text' name='descripcionApto' value='"+infoproducto[4]+"'></td>";
              html += "<td><button type='button' class='btn btn-danger btn-remove-proyecto'><span class='fa fa-trash-alt'></span></button></td>"
          html +="</tr>";

          $("#tbventas tbody").append(html);
      }else{
        alert("Seleccione un proyecto")
      }
    })

    $(document).on("keyup", "#tbventas input.altura", function(){	        
          const precio = parseInt($(this).closest("tr").find("td:eq(4)").text());
          const cuota = 500000
          cantidad = parseInt($(this).val());
          importe = cantidad * cuota ;
          importeTotal = precio + importe ;
          console.log(cantidad, precio);
          
	        $(this).closest("tr").find("td:eq(5)").children("p").text(importeTotal);
	        $(this).closest("tr").find("td:eq(5)").children("input").val(importeTotal);
	    })   


    $(document).on("click", ".btn-remove-proyecto", function(){
        $(this).closest("tr").remove();
    })

    $(document).on("click", ".btn-view-cotizacion", function(){
        valor_id = $(this).val();

        $.ajax({
            url: base_url + "movimientos/cotizaciones/view",
            type: "POST",
            dataType:"html",
            data:{id: valor_id},
            success: function(data){
              $("#modal-default .modal-body").html(data);
            }
        })
    });

    $(document).on("click", ".btn-print", function() {
        $("#modal-default .modal-body").print();
    })


</script>
</body>
</html>