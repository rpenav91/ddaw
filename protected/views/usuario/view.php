<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);?>

<div class="row-fluid">
	<div class="span3">		
		<?php 
			$images_path = realpath(Yii::app()->basePath . '/../images/usuario');
			echo CHtml::image(Yii::app()->request->baseUrl.'/images/usuario/'.$model->imagen); 
		?>

		<h4>Información</h4>
		<?php $this->widget('bootstrap.widgets.TbDetailView',array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'span12'),
			'attributes'=>array(				
				'nombre',
				array(
					'label'=>'Correo',
					'value'=>CHtml::mailto($model->email,$model->email),
					'type'=>'raw',
				),
				'ulltima_visita',
				'fecha_creada',
			),
		)); ?>		
	</div>
	<div class="span6">
		<div class="row-fluid">
			<h4>Tiendas de <?php echo $model->nombre; ?></h4>		
			<?php	
			    $this->widget(
			    'bootstrap.widgets.TbThumbnails',
			    array(
			    'dataProvider' => $dataProvider,
			    'template' => "{items}\n{pager}",
			    'itemView' => '_thumbs',
			    )
			    );		    
			?>
		</div>

	</div>
	<div class="span3">	
			<?php $this->widget('bootstrap.widgets.TbMenu', array(
			    'type'=>'list',
			    'htmlOptions'=>array('class'=>'well'),
			    'items'=>array(
			        array('label'=>'ANOTHER LIST HEADER'),
			        array('label'=>'Editar', 'icon'=>'user', 'url'=>array('usuario/update/'.Yii::app()->user->id)),
			        array('label'=>'Configuración', 'icon'=>'cog', 'url'=>'#'),
			        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
			    ),
			)); ?>			
	</div>
</div>


