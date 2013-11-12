<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tienda-form',
	'type'=>'',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<br>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->dropDownList($model,"ciudad_id", Ciudad::listCiudades()); ?>
	<?php echo $form->textFieldRow($model,'nombre',array('maxlength'=>150)); ?>
	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>	
	<?php //echo $form->textFieldRow($model,'ruta',array('maxlength'=>150)); ?>	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
