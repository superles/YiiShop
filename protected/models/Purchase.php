<?php

/**
 * This is the model class for table "{{_purchase}}".
 *
 * The followings are the available columns in table '{{_purchase}}':
 * @property string $id
 * @property integer $create_time
 * @property integer $user_id
 * @property string $books_id
 * @property double $price
 * @property integer $status
 */
class Purchase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Purchase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{purchase}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_time, user_id, books_id, price', 'required'),
			array('create_time, user_id, status', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('books_id', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, create_time, user_id, books_id, price, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'create_time' => 'Create Time',
			'user_id' => 'User',
			'books_id' => 'Books',
			'price' => 'Price',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('create_time',$this->create_time);

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('books_id',$this->books_id,true);

		$criteria->compare('price',$this->price);

		$criteria->compare('status',$this->status);

		return new CActiveDataProvider('Purchase', array(
			'criteria'=>$criteria,
		));
	}
}