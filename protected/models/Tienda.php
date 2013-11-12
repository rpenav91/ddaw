<?php

/**
 * This is the model class for table "tienda".
 *
 * The followings are the available columns in table 'tienda':
 * @property integer $id
 * @property integer $usuario_id
 * @property integer $ciudad_id
 * @property string $nombre
 * @property string $direccion
 * @property integer $activo
 * @property string $ruta
 * @property string $fecha_creada
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property Ciudad $ciudad
 * @property Usuario $usuario
 */
class Tienda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tienda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, ciudad_id, nombre, direccion, ruta, fecha_creada', 'required'),
			array('usuario_id, ciudad_id, activo', 'numerical', 'integerOnly'=>true),
			array('nombre, ruta', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuario_id, ciudad_id, nombre, direccion, activo, ruta, fecha_creada', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Producto', 'tienda_id'),
			'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario_id' => 'Usuario',
			'ciudad_id' => 'Ciudad',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'activo' => 'Activo',
			'ruta' => 'Ruta',
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
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('ciudad_id',$this->ciudad_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('fecha_creada',$this->fecha_creada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tienda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
