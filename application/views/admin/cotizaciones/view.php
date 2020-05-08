<div class="row">
		<table class="table table-borderless">
			<tr>
				<td><img src="<?= base_url() ?> ../../dist/img/icono.svg" alt="" width="20%" height="20%"></td>
				<td><b>CONSTRUCTORA TORREON</b></td><br>
				<td>
				<b>Dir: </b> Cra 6 # 53-29 <br>
							Ibague, Tolima <br>
				<b>Tel: </b> 2780505</td>
			</tr>
		</table>
</div>	
<br>
<div class="row">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Nombre</th>
					<th>Identificacion</th>
					<th>Telefono</th>
					<th>Fecha</th>
				</tr>	
			</thead>
			<tbody>
			<tr>
				<td><?php echo $cotizacion->cliente_nombres;?> <?php echo $cotizacion->cliente_apellido;?></td>
				<td><?php echo $cotizacion->cliente_cedula;?></td>
				<td><?php echo $cotizacion->telefono;?> <br></td>
				<td><?php echo $cotizacion->fecha_creacion;?></td>
			</tr>
			</tbody>
		</table>

</div>
<br>
<div class="row">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Proyecto/Tipo apartamento</th>
					<th>Piso</th>
					<th>Valor</th>
					<th>Detalles</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $cotizacion->proyecto_nombre;?></td>
					<td><?php echo $cotizacion->piso;?></td>
					<td><?php echo $cotizacion->valor;?></td>
					<td><?php echo $cotizacion->descripcion;?></td>
				</tr>
				
			</tbody>
			
		</table>
</div>