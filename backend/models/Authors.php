<?php 

namespace backend\models;

use yii;
use yii\db\ActiveRecord; 
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\i18n\Formatter;

class Authors extends ActiveRecord  
{

public static function tableName()
{
	return '{{authors}}';
}

public function rules()
{
	return [
		[['name'], 'required'],
		[['booksCount'], 'integer'],
		[['DATE_CREATE', 'DATE_EDIT'], 'safe'],
	

   
	];
}
public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Автор',
            'DATE_CREATE' => 'Дата создания',
            'DATE_EDIT' => 'Дата редактирования',
				'booksCount' => 'Количество книг',
				
        ];
	 }
	 
public function beforeValidate()
{

/*if (!is_numeric($this->DATE_CREATE)) {
	$this->DATE_CREATE = (\DateTime::createFromFormat('Y-m-d', $this->DATE_CREATE)->format('U'));
	
	}*/
	return   parent::beforeValidate();
}

public function behaviors()
{
	return [
		
		[
			 'class' => BlameableBehavior::className(),
			 'createdByAttribute' => 'DATE_CREATE',
			 'updatedByAttribute' => 'DATE_EDIT',
		],
		
		'timestamp' => [
			 'class' => 'yii\behaviors\TimestampBehavior',
			 'attributes' => [
				  ActiveRecord::EVENT_BEFORE_INSERT => ['DATE_CREATE','DATE_EDIT'],
				  ActiveRecord::EVENT_BEFORE_UPDATE => ['DATE_EDIT'],
			 ],
		],
  ];
}
public static function find()
    {
        return new AuthorsQuery(get_called_class());
    }
public function getBooks()
{
	return $this->hasMany(Books::className(),['IDAUTHOR' => 'id']);
}
public function getBooksCount()
{
	
	return  $this->getBooks()->count();
	
}


}

?>