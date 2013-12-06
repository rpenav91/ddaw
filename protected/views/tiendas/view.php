<?php
$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tienda','url'=>array('index')),
	array('label'=>'Create Tienda','url'=>array('create')),
	array('label'=>'Update Tienda','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tienda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tienda','url'=>array('admin')),
	array('label'=>'Agregar Productos','url'=>array('producto/create')),
);
?>
<div class="row-fluid">
	<div class="span3">		
		<div class="thumbnail">
			<?php 
				$images_path = realpath(Yii::app()->basePath . '/../images/usuario');
				echo CHtml::image(Yii::app()->request->baseUrl.'/images/usuario/'.$model->usuario->imagen); 
			?>
		</div>	
	</div>
	<div class="span9 thumbnail">
		<h3 class="text-center"><?php echo $model->nombre; ?></h3>
		<hr>
		<div class="row-fluid text-center info">
			<div class="span4">
				<h4>Dirección</h4>
				<p><?php echo $model->ciudad->nombre .', '.$model->ciudad->pais->nombre; ?></p>
			</div>
			<div class="span4">
				<h4>Productos</h4>
				<p><?php echo $model->productosCount; ?></p>

			</div>
			<div class="span4">
				<h4>Ofertas</h4>
				<p><?php echo $model->pais; ?></p>
			</div>

		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span3"></div>
	<div class="span9">		
	<?php
		$this->breadcrumbs=array(
			'Tiendas',
		);

		?>
		<?php $this->widget('bootstrap.widgets.TbListView',array(
			'dataProvider'=>$productos,
			'itemView'=>'_thumbProducto',
			'summaryText'=>false,
		)); 
	?>

	</div>

</div>