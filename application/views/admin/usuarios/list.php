<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios
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
                <a href="<?php echo base_url();?>administrador/usuarios/add" class="btn btn-primary btnflat" ><span class="fa fa-plus"></span> Agregar Usuario</a>
            </div>
          </div>
          <hr>
          <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered btn-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Codigo</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($usuarios)):?>
                                <?php foreach ($usuarios as $usuario):?>
                            <tr>
                                <td><?php echo $usuario->asesor_cedula;?></td>
                                <td><?php echo $usuario->asesor_nombres;?></td>
                                <td><?php echo $usuario->asesor_apellidos;?></td>
                                <td><?php echo $usuario->asesor_cedula;?></td>
                                <td><?php echo $usuario->asesor_correo;?></td>
                                <td><?php echo $usuario->asesor_telefono;?></td>
                                <td><?php echo $usuario->codigo_asesor;?></td>
                                <td><?php echo $usuario->rol;?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-view-usuario" data-toggle="modal" data-target="#modal-default" value="<?php echo $usuario->asesor_cedula?>">
                                            <span class="fa fa-search"></span>
                                        </button>
                                        <a href="<?php echo base_url();?>administrador/usuarios/edit/<?php echo $usuario->asesor_cedula;?>" class="btn btn-warning"><span class="fa fa-pencil-alt"></span></a>
                                        <a href="<?php echo base_url();?>administrador/usuarios/delete/<?php echo $usuario->asesor_cedula;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash-alt"></span></a>
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
              <h4 class="modal-title">Informacion del Usuario</h4>
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