<?php
		$this->breadcrumbs=array(
			'Categorias');

	


	?>
		<?php
		$this->widget('bootstrap.widgets.TbListView',array(
			'dataProvider'=>$categorias,
			'itemView'=>'_thumbProductoCategoria',
			'summaryText'=>false
		)); 
	?>