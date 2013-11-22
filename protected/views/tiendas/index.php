<?php
$this->breadcrumbs=array(
	'Tiendas',
);

?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText'=>false,
)); ?>
