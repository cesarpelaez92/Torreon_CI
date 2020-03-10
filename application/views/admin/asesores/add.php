<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Asesores
            <small>/Nuevo</small>
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
          <hr>
          <div class="row">
                <div class="col-md-12">
                             <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>    
                                </div>
                             <?php endif;?>
                    <form action="<?php echo base_url();?>mantenimiento/asesores/store" method="POST">
                        <div class="form-group">
                            <label for="asesor_nombres">Nombres:</label>
                            <input type="text" class="form-control" id="asesor_nombres" name="asesor_nombres" value="<?php echo set_value("asesor_nombres");?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="asesor_apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="asesor_apellidos" name="asesor_apellidos" value="<?php echo set_value("asesor_apellidos");?>">
                        </div>

                        <div class="form-group">
                            <label for="asesor_cedula">Cedula:</label>
                            <input type="number" class="form-control <?php echo !empty(form_error("asesor_cedula"))? 'is-invalid':'';?>" id="asesor_cedula" name="asesor_cedula" value="<?php echo set_value("asesor_cedula");?>">
                            <?php echo form_error("asesor_cedula","<span class='help-block'>","</span>");?>
                        </div>

                        <div class="form-group">
                            <label for="asesor_telefono">Telefono:</label>
                            <input type="tel" class="form-control" id="asesor_telefono" name="asesor_telefono" value="<?php echo set_value("asesor_telefono");?>">
                        </div>

                        <div class="form-group">
                            <label for="asesor_correo">Email:</label>
                            <input type="email" class="form-control" id="asesor_correo" name="asesor_correo" value="<?php echo set_value("asesor_correo");?>">
                        </div>

                        <div class="form-group">
                            <label for="codigo_asesor">Contraseña:</label>
                            <input type="text" class="form-control" id="codigo_asesor" name="codigo_asesor" value="<?php echo set_value("codigo_asesor");?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                        </div>

                    </form>
                </div>
          </div>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->