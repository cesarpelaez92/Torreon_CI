<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes
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
                <a href="<?php echo base_url();?>mantenimiento/clientes/add" class="btn btn-primary btnflat" ><span class="fa fa-plus"></span> Agregar Cliente</a>
            </div>
          </div>
          <hr>
          <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered btn-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($clientes)):?>
                                <?php foreach ($clientes as $cliente):?>
                            <tr>
                                <td><?php echo $cliente->codigo_cliente;?></td>
                                <td><?php echo $cliente->cliente_cedula;?></td>
                                <td><?php echo $cliente->cliente_nombres;?></td>
                                <td><?php echo $cliente->cliente_apellido;?></td>
                                <td><?php echo $cliente->email;?></td>
                                <td><?php echo $cliente->telefono;?></td>
                                <?php $datacliente = $cliente->codigo_cliente."*".$cliente->cliente_cedula."*".$cliente->cliente_nombres."*"
                                                      .$cliente->cliente_apellido."*".$cliente->email."*".$cliente->telefono; ?>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-view-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente?>">
                                            <span class="fa fa-search"></span>
                                        </button>
                                        <a href="<?php echo base_url();?>mantenimiento/clientes/edit/<?php echo $cliente->codigo_cliente;?>" class="btn btn-warning"><span class="fa fa-pencil-alt"></span></a>
                                        <?php if($permisos->delete == 1):?>
                                          <a href="<?php echo base_url();?>mantenimiento/clientes/delete/<?php echo $cliente->codigo_cliente;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash-alt"></span></a>   
                                        <?php endif;?>
                                        
                                        
                                    </div>
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
              <h4 class="modal-title">Informacion del proyecto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->