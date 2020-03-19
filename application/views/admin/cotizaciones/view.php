<div class="row">
	<div class="col-xs-6">	
		<b>CLIENTE</b><br>
		<b>Nombre: </b><?php echo $cotizacion->cliente_nombres;?> <?php echo $cotizacion->cliente_apellido;?><br>
		<b>Nro Documento:</b> <?php echo $cotizacion->cliente_cedula;?> <br>
		<b>Telefono:</b> <?php echo $cotizacion->telefono;?> <br>
	</div>	
	<div class="col-xs-6">	
		<b>Fecha</b> <?php echo $cotizacion->fecha_creacion;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Proyecto/Tipo apartamento</th>
					<th>Piso</th>
					<th>Apartamento</th>
					<th>Valor</th>
					<th>Detalles</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $cotizacion->proyecto_nombre;?></td>
					<td><?php echo $cotizacion->piso;?></td>
					<td><?php echo $cotizacion->apartamento_id;?></td>
					<td><?php echo $cotizacion->valor;?></td>
					<td><?php echo $cotizacion->descripcion;?></td>
				</tr>
				
			</tbody>
			
		</table>
	</div>
</div>