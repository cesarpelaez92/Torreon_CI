<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cotizaciones
            <small>/Listado</small>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url();?>movimientos/cotizaciones/add" class="btn btn-primary btnflat" ><span class="fa fa-plus"></span> Agregar Cotizacion</a>
            </div>
          </div>
          <hr>
          <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered btn-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Asesor</th>
                                <th>fecha</th>
                                <th>Cliente</th>
                                <th>Proyecto/Tipo Apartamento</th>
                                <th>Valor</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($cotizaciones)):?>
                                <?php foreach ($cotizaciones as $cotizacion):?>
                            <tr>
                                <td><?php echo $cotizacion->cotizacion_id;?></td>
                                <td><?php echo $cotizacion->asesor_nombres;?></td>
                                <td><?php echo $cotizacion->fecha_creacion;?></td>
                                <td><?php echo $cotizacion->cliente_nombres;?></td>
                                <td><?php echo $cotizacion->proyecto_nombre;?></td>
                                <td><?php echo $cotizacion->valor;?></td>
              
                                <?php $datacotizacion = $cotizacion->cotizacion_id."*".$cotizacion->asesor_cedula."*".$cotizacion->fecha_creacion."*"
                                                      .$cotizacion->valor."*".$cotizacion->codigo_cliente."*".$cotizacion->descripcion."*".$cotizacion->proyecto_id."*"
                                                      .$cotizacion->piso."*".$cotizacion->apartamento_id."*".$cotizacion->asesor_nombres;?> 
                                <td>
                                    <button type="button" class="btn btn-info btn-view-cotizacion" value="<?php echo $cotizacion->cotizacion_id; ?>" data-toggle="modal" data-target="#modal-default"><span class=" fa fa-search"></span></button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
          </div>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalle Cotizacion</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print">Imprimir</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->