<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span10">
		<?php echo $content; ?>
	</div>
		
	<div class="span2">
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/site/store.jpg');  ?>
	</div>
</div> <!--row-fluid del column2-->


<?php $this->endContent(); ?>