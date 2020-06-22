<?php

namespace frontend\controllers;

use Yii;

use frontend\models\Authors;
use frontend\models\Books;
use yii\rest\ActiveController;


Class BooksController extends ActiveController
{
	public $modelClass = Books::class;

	public function behaviors() {
		return [
		  [
			 'class' => \yii\ filters\ ContentNegotiator::className(),
			 'only' => ['index', 'view'],
			 'formats' => [
				'application/json' => \yii\ web\ Response::FORMAT_JSON,
			 ],
		  ],
		];
	 }
	
	 public function actionList() 
	 {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$list = Books::find()->all();
		return $list;
	
	}

}