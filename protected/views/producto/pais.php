<?php
		$this->breadcrumbs=array(
			'Paises');
?>
		

<?php
	$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$productos,
		'itemView'=>'_thumbProductoPais',
		'summaryText'=>false
	)); 
?>