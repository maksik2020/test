<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Books;


Class BookController extends Controller
{
	public function actionIndex()
	{
		$books = Books::find()->orderBy('NAME',['BooksCount' => SORT_DESC],'DATE_CREATE')->all();

		return $this->render('index',['books' => $books]);
	}
	
	
	
}