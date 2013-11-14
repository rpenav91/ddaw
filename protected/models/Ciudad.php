<?php

/**
 * This is the model class for table "ciudad".
 *
 * The followings are the available columns in table 'ciudad':
 * @property integer $id
 * @property integer $pais_id
 * @property string $nombre
 * @property string $activo
 *
 * The followings are the available model relations:
 * @property Pais $pais
 * @property Tienda[] $tiendas
 */
class Ciudad extends CActiveRecord
{

	public $nombre_filtro; 
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciudad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pais_id, nombre', 'required'),
			array('pais_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>140),
			array('activo', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pais_id, nombre, activo, nombre_filtro', 'safe', 'on'=>'search'),
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
			'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
			'tiendas' => array(self::HAS_MANY, 'Tienda', 'ciudad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pais_id' => 'Pais',
			'nombre' => 'Nombre',
			'activo' => 'Activo',
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


		$criteria->with = array('pais');
		$criteria->compare('id',$this->id);
		$criteria->compare('pais_id',$this->pais_id);
		$criteria->compare('pais.nombre',$this->nombre_filtro, true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('activo',$this->activo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ciudad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function listCiudades(){
		$model = Ciudad::model()->findAll();
		$arreglo = array();
		foreach ($model as $c) {
			$arreglo[$c->id] = $c->nombre;
		}

		return $arreglo;

	}
}
