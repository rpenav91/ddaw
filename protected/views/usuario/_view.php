<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('llave_activacion')); ?>:</b>
	<?php echo CHtml::encode($data->llave_activacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ulltima_visita')); ?>:</b>
	<?php echo CHtml::encode($data->ulltima_visita); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cont_fallos')); ?>:</b>
	<?php echo CHtml::encode($data->cont_fallos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bloqueado')); ?>:</b>
	<?php echo CHtml::encode($data->bloqueado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creada')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creada); ?>
	<br />

	*/ ?>

</div>