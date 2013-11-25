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

<h1><?php echo $model->nombre; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(		
		array(
			'label'=>'Dueño',
			'value'=>$model->usuario->nombre,
		),
		array(
			'label'=>'Ubicación',
			'value'=>$model->ciudad->nombre.', '.$model->ciudad->pais->nombre,
		),
		'nombre',
		'direccion',		
		'fecha_creada',
	),
)); ?>