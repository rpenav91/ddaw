<?php
$this->breadcrumbs=array(
	'Tiendas',
);

$this->menu=array(
	array('label'=>'Create Tienda','url'=>array('create')),
	array('label'=>'Manage Tienda','url'=>array('admin')),
);
?>

<h1>Tiendas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
