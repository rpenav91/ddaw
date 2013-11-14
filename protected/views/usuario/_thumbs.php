<h2><?php echo $model->nombre; ?></h2>

<p><b>Ciudad: </b><?php echo $model->ciudad->nombre; ?>, <?php echo $model->ciudad->pais->nombre;  ?></p>
<p><b>Dirección: </b><?php echo $model->direccion; ?></p>
<div class="text-center">
<?php 
	echo CHtml::link('Ver Tienda',array('tiendas/'.$model->id),array('class'=>'btn btn-info')); 
?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Primary',
	    'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'normal', // null, 'large', 'small' or 'mini'
	)); ?>
</div>
<br>