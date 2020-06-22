<?php 

namespace backend\models;

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

public function rules()
{
	return [
		[['name', 'DATE_CREATE','IDAUTHOR'], 'required'],
	//	[['DATE_CREATE','IDAUTHOR'], 'integer']
	];
}

public function beforeValidate()
{

	if (!empty($this->DATE_CREATE)) {
	$this->DATE_CREATE = \DateTime::createFromFormat('Y-m-d', $this->DATE_CREATE)->format('U');
	
	}
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
public function getAuthor()
{
	return $this->hasOne(Authors::className(),['id' => 'IDAUTHOR'])->one();
}
}

?>