<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span6">
		<?php echo $content; ?>
	</div>
		
	<div class="span3">
		<?php
			$this->beginWidget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'htmlOptions'=>array("class"=>"well"),
				'stacked'=>false,
				'items'=>$this->menu,
			));				
			$this->endWidget();
			
		?>

	</div>
</div> <!--row-fluid del column2-->


<?php $this->endContent(); ?>