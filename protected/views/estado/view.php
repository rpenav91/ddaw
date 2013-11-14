<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Estado','url'=>array('index')),
	array('label'=>'Create Estado','url'=>array('create')),
	array('label'=>'Update Estado','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Estado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Estado','url'=>array('admin')),
);
?>

<h1>View Estado #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'activo',
	),
)); ?>
