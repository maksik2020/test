<?php 

namespace frontend\models;


use yii\db\ActiveRecord; 
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;



class Authors extends ActiveRecord  
{

public static function tableName()
{
	return '{{authors}}';
}

public function getBooks()
{
	return $this->hasMany(Books::className(),['IDAUTHOR' => 'id']);
}
public function getBooksCount()
{
	//$this->BooksCount =   $this->getBooks()->count();
	return  $this->getBooks()->count();
	
}


}

?>