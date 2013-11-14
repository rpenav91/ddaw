<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Inicio';
?>

<div class="row">
	<div class="span9">
		<div class="well">
			<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
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