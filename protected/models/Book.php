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
			array('title, author, description, price', 'required'),
			array('book_type, num_pages', 'numerical', 'integerOnly'=>true),
            array('release_date', 'date', 'format'=>'dd.MM.yyyy'),
			array('title, author', 'length', 'max'=>255),
            array('image', 'unsafe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, author, description, book_type, release_date, num_pages', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()	{
		return array(
            'category' => array(self::BELONGS_TO, 'BookType', 'book_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'title' => 'Название',
			'author' => 'Автор',
			'description' => 'Описание',
			'book_type' => 'Категория',
			'release_date' => 'Дата выхода',
			'num_pages' => 'Количество страниц',
            'price' => 'Цена',
            'image' => 'Изображение',
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

        $criteria->compare('image',$this->image,true);

		return new CActiveDataProvider('Book', array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave() {
        if(parent::beforeSave()) {
            $this->release_date = strtotime($this->release_date);
            return true;
        } else {
            return false;
        }
    }

    protected function afterFind() {
        $date = date('d.m.Y', $this->release_date);
        $this->release_date = $date;
        parent::afterFind();
    }
}