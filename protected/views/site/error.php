<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="alert alert-error">
<button class="close" data-dismiss="alert" type="button">×</button>
<?php echo CHtml::encode($message); ?>
</div>