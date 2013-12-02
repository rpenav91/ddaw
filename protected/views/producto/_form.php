<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,	
)); ?>
	<div class="row-fluid thumbnail">		
		<h1 class="text-center">Producto Nuevo</h1>
		<?php echo $form->errorSummary($model); ?>		

		<?php echo $form->dropDownList($model,'tienda_id',Tienda::listTiendas()); ?>		
		<br>

		<?php echo $form->dropDownList($model,'categoria_id',Categoria::listCategorias()); ?>

		<?php echo $form->textFieldRow($model,'nombre',array('maxlength'=>150)); ?>

		<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'precio'); ?>		

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>
		</div>
	</div>
	



<?php $this->endWidget(); ?>
