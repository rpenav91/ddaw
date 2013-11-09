<?php
$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
	array('label'=>'Create Estado','url'=>array('create')),
	array('label'=>'Manage Estado','url'=>array('admin')),
);
?>

<h1>Estados</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
