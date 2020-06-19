<?php 

namespace frontend\models;

use yii\base\Model;
use yii\db\ActiveRecord; 
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

class Books extends ActiveRecord  
{
	


public static function tableName()
{
	return '{{books}}';
}

public function getAuthor()
{
	return $this->hasOne(Authors::className(),['ID' => 'IDAUTHOR'])->one();
}
}

?>