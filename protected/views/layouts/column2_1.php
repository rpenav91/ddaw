<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span9">
		<?php echo $content; ?>
	</div>
		
	<div class="span3 text-center">
		<h4>Buscar por País</h4>
		<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
		    'name'=>'typeahead',
		    'htmlOptions'=>array('class'=>'span12'),
		    'options'=>array(
		        'source'=>array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Dakota', 'North Carolina', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'),
		        'items'=>4,
		        'matcher'=>"js:function(item) {
		            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
		        }",
		    ),
		)); ?>
	</div>
</div> <!--row-fluid del column2-->


<?php $this->endContent(); ?>