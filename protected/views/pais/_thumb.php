	<li class="thumbnail span3" style="">
    <div>
    <a href="#" class="" rel="tooltip" data-title="Tooltip">
        <img src="http://placehold.it/280x180" alt="">
    </a>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>	
	<br>
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>	
	<br>
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	</div>	
	</li>	