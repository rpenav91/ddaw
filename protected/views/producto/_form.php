<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php  echo $form->dropDownList($model,'tienda_id',Tienda::listTiendas()); ?>

	<?php echo $form->textFieldRow($model,'categoria_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estado_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'precio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'activo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_creada',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
