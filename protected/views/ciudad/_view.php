<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('País')); ?>:</b>
	<?php echo CHtml::encode($data->pais->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php if($data->activo == 1):
	echo CHtml::encode("Activo");
	?>	
	<?php else:
	echo CHtml::encode("Inactivo");

	endif;?>
	
	<br />


</div>