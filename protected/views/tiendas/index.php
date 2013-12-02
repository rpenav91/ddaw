<div class="span9">
	<?php
		$this->breadcrumbs=array(
			'Tiendas',
		);

		?>
		<?php $this->widget('bootstrap.widgets.TbListView',array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'summaryText'=>false,
		)); 
	?>
</div>

<div class="span3">
	<br>
	<div class="thumbnail text-center">
		<img src="http://lorempixel.com/400/400/" alt="">
		<br>
		<?php echo CHtml::link('Crea tu Tienda',array('tiendas/create'),array('class'=>'btn btn-info')); ?>
		<br><br>
	</div>
    
    

</div>
