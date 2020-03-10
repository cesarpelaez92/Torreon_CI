<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes
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
                    <form action="<?php echo base_url();?>mantenimiento/clientes/store" method="POST">
                        <div class="form-group">
                            <label for="cliente_nombres">Nombres:</label>
                            <input type="text" class="form-control" id="cliente_nombres" name="cliente_nombres" value="<?php echo set_value("cliente_nombres");?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="cliente_apellido">Apellidos:</label>
                            <input type="text" class="form-control" id="cliente_apellido" name="cliente_apellido" value="<?php echo set_value("cliente_apellido");?>">
                        </div>

                        <div class="form-group">
                            <label for="cliente_cedula">Cedula:</label>
                            <input type="number" class="form-control <?php echo !empty(form_error("cliente_cedula"))? 'is-invalid':'';?>" id="cliente_cedula" name="cliente_cedula" value="<?php echo set_value("cliente_cedula");?>">
                            <?php echo form_error("cliente_cedula","<span class='help-block'>","</span>");?>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo set_value("telefono");?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value("email");?>">
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