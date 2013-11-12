<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);?>
<h3><?php echo $model->nombre; ?></h3>
<div class="row-fluid">
	<div class="span2">
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$model->imagen); ?>
	</div>
	<div class="span7">
		<h4>Información</h4>
		<?php $this->widget('bootstrap.widgets.TbDetailView',array(
			'data'=>$model,
			'attributes'=>array(				
				'nombre',
				'email',												
				'ulltima_visita',
				'fecha_creada',
			),
		)); ?>

		<h4>Tiendas de <?php echo $model->nombre; ?></h4>

		<?php	
		    /*$this->widget(
		    'bootstrap.widgets.TbThumbnails',
		    array(
		    'dataProvider' => $dataProvider,
		    'template' => "{items}\n{pager}",
		    'itemView' => '_thumbs',
		    )
		    );
		    */
		?>

		<div class="row-fluid">
		<?php 
			$cont = 1;
			foreach ($model->tiendas as $key) {
				if($cont == 4){
					echo '</div><!--row-fluid--><br><div class="row-fluid">';
					$cont = 1;
				}
				$cont++;
				echo '<div class="span4 thumbnail">';
				$this->renderPartial('_thumbs', array('model'=>$key));
				echo '</div>';
			} 
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


