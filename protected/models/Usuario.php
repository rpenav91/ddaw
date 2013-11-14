<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string $activo
 * @property string $llave_activacion
 * @property string $ulltima_visita
 * @property integer $cont_fallos
 * @property string $bloqueado
 * @property string $imagen
 * @property string $fecha_creada
 *
 * The followings are the available model relations:
 * @property Seleccion[] $seleccions
 * @property Telefono[] $telefonos
 * @property Tienda[] $tiendas
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, email, password, llave_activacion, ulltima_visita, cont_fallos', 'required'),
			array('cont_fallos', 'numerical', 'integerOnly'=>true),
			array('nombre, llave_activacion, imagen', 'length', 'max'=>150),
			array('email, password', 'length', 'max'=>100),
			array('activo, bloqueado', 'length', 'max'=>1),
			array('fecha_creada', 'safe'),
			array('imagen','file','types'=>'jpg,gif,png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, email, password, activo, llave_activacion, ulltima_visita, cont_fallos, bloqueado, imagen, fecha_creada', 'safe', 'on'=>'search'),
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
			'seleccions' => array(self::HAS_MANY, 'Seleccion', 'usuario_id'),
			'telefonos' => array(self::HAS_MANY, 'Telefono', 'usuario_id'),
			'tiendas' => array(self::HAS_MANY, 'Tienda', 'usuario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'password' => 'Password',
			'activo' => 'Activo',
			'llave_activacion' => 'Llave Activacion',
			'ulltima_visita' => 'Ulltima Visita',
			'cont_fallos' => 'Cont Fallos',
			'bloqueado' => 'Bloqueado',
			'imagen' => 'Imagen',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('llave_activacion',$this->llave_activacion,true);
		$criteria->compare('ulltima_visita',$this->ulltima_visita,true);
		$criteria->compare('cont_fallos',$this->cont_fallos);
		$criteria->compare('bloqueado',$this->bloqueado,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('fecha_creada',$this->fecha_creada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password){
		return CPasswordHelper::verifyPassword($password, $this->password);
	}

	public function hashPassword($password){
		return CPasswordHelper::hashPassword($password);
	}
}
