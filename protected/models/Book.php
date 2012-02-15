<?php

/**
 * This is the model class for table "{{_book}}".
 *
 * The followings are the available columns in table '{{_book}}':
 * @property string $id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property integer $book_type
 * @property integer $release_date
 * @property integer $num_pages
 */
class Book extends CActiveRecord implements IECartPosition
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    function getId(){
        return 'Book'.$this->id;
    }

    function getPrice(){
        return $this->price;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{book}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, author, description', 'required'),
			array('book_type, release_date, num_pages', 'numerical', 'integerOnly'=>true),
			array('title, author', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, author, description, book_type, release_date, num_pages', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'author' => 'Author',
			'description' => 'Description',
			'book_type' => 'Book Type',
			'release_date' => 'Release Date',
			'num_pages' => 'Num Pages',
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('author',$this->author,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('book_type',$this->book_type);

		$criteria->compare('release_date',$this->release_date);

		$criteria->compare('num_pages',$this->num_pages);

		return new CActiveDataProvider('Book', array(
			'criteria'=>$criteria,
		));
	}
}