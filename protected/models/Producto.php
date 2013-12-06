<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id
 * @property integer $tienda_id
 * @property integer $categoria_id
 * @property integer $estado_id
 * @property string $nombre
 * @property string $descripcion
 * @property double $precio
 * @property integer $activo
 * @property string $fecha_creada
 *
 * The followings are the available model relations:
 * @property Detalle[] $detalles
 * @property ImagenProducto[] $imagenProductos
 * @property Oferta[] $ofertas
 * @property Categoria $categoria
 * @property Estado $estado
 * @property Tienda $tienda
 * @property ProductoTag[] $productoTags
 * @property Seleccion[] $seleccions
 */
class Producto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tienda_id, categoria_id, estado_id, nombre, descripcion, precio, fecha_creada', 'required'),
			array('tienda_id, categoria_id, estado_id, activo', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('nombre', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tienda_id, categoria_id, estado_id, nombre, descripcion, precio, activo, fecha_creada', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'detalles' => array(self::HAS_MANY, 'Detalle', 'producto_id'),
			'imagenProductos' => array(self::HAS_MANY, 'ImagenProducto', 'producto_id'),
			'ofertas' => array(self::HAS_MANY, 'Oferta', 'producto_id'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
			'tienda' => array(self::BELONGS_TO, 'Tienda', 'tienda_id'),
			'productoTags' => array(self::HAS_MANY, 'ProductoTag', 'producto_id'),
			'seleccions' => array(self::HAS_MANY, 'Seleccion', 'producto_id'),
		);
	}

	public function getPais()
	{
		return $this->tienda->ciudad->pais->nombre;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tienda_id' => 'Tienda',
			'categoria_id' => 'Categoria',
			'estado_id' => 'Estado',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'precio' => 'Precio',
			'activo' => 'Activo',
			'fecha_creada' => 'Fecha Creada',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tienda_id',$this->tienda_id);
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('fecha_creada',$this->fecha_creada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
