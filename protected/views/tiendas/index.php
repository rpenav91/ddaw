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

<div class="span3 text-center">
	<?php
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'horizontalForm',
		    'type'=>'vertical',

		    'htmlOptions'=> array('class'=>'span12'),
		)); 
	?>
	<?php 
		echo $form->dropDownList($model,"pais_id", Pais::listPaises(),array('multiple'=>true));
	?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>

	<?php $this->endWidget(); ?>
</div>
