<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'activo',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'llave_activacion',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'ulltima_visita',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cont_fallos',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bloqueado',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'imagen',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'fecha_creada',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
