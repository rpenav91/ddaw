<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>
	<br>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('placeholder'=>"Cristiano Ronaldo",'maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'email',array('placeholder'=>"cris7@rm.com",'maxlength'=>100)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('placeholder'=>"**********",'maxlength'=>100)); ?>	

	<?php //echo $form->textFieldRow($model,'activo',array('class'=>'span5','maxlength'=>1)); ?>

	<?php //echo $form->textFieldRow($model,'llave_activacion',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'ulltima_visita',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'cont_fallos',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'bloqueado',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'imagen',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'fecha_creada',array('class'=>'span5')); ?>	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrarse' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
