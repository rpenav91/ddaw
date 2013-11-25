<div class="span3 thumbnail text-center">    
        <img src="http://lorempixel.com/400/300/" alt="">
    <h3><?php echo $data->nombre; ?></h3>
    <hr>
    <p>7 productos</p>
    <?php echo CHtml::link('Ver Tienda',array('tiendas/'.$data->id),array('class'=>'btn btn-info')); ?>
</div>