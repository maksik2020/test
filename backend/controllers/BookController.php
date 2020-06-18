<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Books;

Class BookController extends Controller
{
	public function actionIndex()
	{
		$books = Books::find()->orderBy('NAME','DATE_CREATE')->all();

		return $this->render('index',['books' => $books]);
	}
	public function actionCreate()
	{
		$book = new Books();
	
		if ($book->load(Yii::$app->request->post()))
		{
			

			if ($book->save())
				{
					Yii::$app->session->SetFlash('success','Сохранено!'." Книга - ".$book->NAME." <br> Дата создания - ".$book->DATE_CREATE );
					
				}
		}
		
		return $this->render('create',['book'=> $book]);
	}
	public function actionUpdate()
	{
		return $this->render('update');
	}
	public function actionDelete()
	{
		return $this->render('delete');
	}
}