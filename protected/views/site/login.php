<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Inicio';
?>

<div class="row-fluid">
	<div class="span9">
		<div class="well">
			<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
		</div>


	<script type="text/javascript">
		
		var inicio = 3;
		var offset = 0;
		function vermas(){
			offset = offset +3;
			$.ajax({
				'type':'POST',
				'success':function(html){
					$('#vermas').append(html);					
				},
				'data':{inicio:inicio,offset:offset},
				'url':'<?php echo $this->createUrl('site/vermas') ?>',
			});

		}

	</script>		

<div id="vermas" class="row-fluid">
	<?php
		$tiendas = Tienda::listTresTiendas(3,0);
		foreach ($tiendas as $tienda) {
			$this->renderPartial('_tiendaThumb',array('tienda'=>$tienda));
		}
	?>
</div>

<div class="row-fluid text-center">
	<h2> <a href="#" onclick="vermas();">¿Queres ver más? Clickeame!</a> </h2>
</div>



	</div>

	<?php if(Yii::app()->user->isGuest): ?>
	<div class="span3">
		<?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'verticalForm',			
		    
		    'htmlOptions'=>array('class'=>'well'),
		)); ?>
		 <h3>Iniciar Sesión</h3>
		<?php echo $form->textFieldRow($model, 'username'); ?>
		<?php echo $form->passwordFieldRow($model, 'password'); ?>
		<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>	 
		<br>
		<br>
		<p class="text-center"><?php echo CHtml::link('Sign Up',array('usuario/registrarse')); ?></p>
		<?php $this->endWidget(); ?>

	</div><!-- span3 -->
	<?php else: ?>
		<div class="span3">
<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'LIST HEADER'),
        array('label'=>'Home', 'icon'=>'home', 'url'=>'#', 'active'=>true),
        array('label'=>'Library', 'icon'=>'book', 'url'=>'#'),
        array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
        array('label'=>'ANOTHER LIST HEADER'),
        array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
        array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>
		</div>
	<?php endif; ?>

</div>