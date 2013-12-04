<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Producto','url'=>array('index')),
	array('label'=>'Manage Producto','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>