<?php 

namespace backend\models;


use yii\db\ActiveRecord; 
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

class Authors extends ActiveRecord  
{

public static function tableName()
{
	return '{{authors}}';
}

public function rules()
{
	return [
		[['NAME'], 'required'],
		[['BooksCount'], 'integer'],
		
   
	];
}

public function beforeValidate()
{

/*if (!empty($this->DATE_CREATE)) {
	$d = \DateTime::createFromFormat('Y-m-d', $this->DATE_CREATE); 
	$this->DATE_CREATE =  $d->getTimestamp(); 
	}*/
	return parent::beforeValidate();
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
				  ActiveRecord::EVENT_BEFORE_INSERT => ['DATE_CREATE', 'DATE_EDIT'],
				  ActiveRecord::EVENT_BEFORE_UPDATE => ['DATE_EDIT'],
			 ],
		],
  ];
}
public function getBooks()
{
	return $this->hasMany(Books::className(),['IDAUTHOR' => 'ID']);
}
public function getBooksCount()
{
	//$this->BooksCount =   $this->getBooks()->count();
	return  $this->getBooks()->count();
	
}


}

?>