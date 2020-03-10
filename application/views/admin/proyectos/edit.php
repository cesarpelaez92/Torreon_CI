<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proyectos
            <small>/Editar</small>
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
                    <form action="<?php echo base_url();?>mantenimiento/proyectos/update" method="POST">
                        <input type="hidden" value="<?php echo $proyecto->proyecto_id;?>" name="IdProyecto">
                        <div class="form-group">
                            <label for="proyecto_id">Id del Proyecto</label>
                            <input type="number" class="form-control" id="proyecto_id" name="proyecto_id" value="<?php echo $proyecto->proyecto_id;?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="proyecto_nombre">Nombre del Proyecto</label>
                            <input type="text" class="form-control <?php echo !empty(form_error("proyecto_nombre"))? 'is-invalid':'';?>" id="proyecto_nombre" name="proyecto_nombre" value="<?php echo !empty(form_error("proyecto_nombre"))? set_value("proyecto_nombre"): $proyecto->proyecto_nombre;?>">
                            <?php echo form_error("proyecto_nombre","<span class='help-block'>","</span>");?>
                        </div>

                        <div class="form-group">
                            <label for="cantidad_pisos">Cantidad de pisos</label>
                            <input type="number" class="form-control" id="cantidad_pisos" name="cantidad_pisos" value="<?php echo $proyecto->cantidad_pisos;?>">
                        </div>

                        <div class="form-group">
                            <label for="cantidad_aptos">Cantidad de Apartamentos</label>
                            <input type="number" class="form-control" id="cantidad_aptos" name="cantidad_aptos" value="<?php echo $proyecto->cantidad_aptos;?>">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $proyecto->descripcion;?>">
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