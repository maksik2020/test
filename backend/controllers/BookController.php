<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Books;
use backend\models\Authors;


Class BookController extends Controller
{
	public function actionIndex()
	{
		$books = Books::find()->orderBy('name',['booksCount' => SORT_DESC],'DATE_CREATE')->all();
	
	
		return $this->render('index',['books' => $books]);
	}
	public function actionCreate()
	{
		$book = new Books();
	$cats = Authors::find()->asArray()->all();
		if ($book->load(Yii::$app->request->post()))
		{
			

			if ($book->save())
				{
					Yii::$app->session->SetFlash('success','Сохранено!'." Книга - ".$book->name." <br> Дата создания - ".$book->DATE_CREATE );
					
				}
		}
		
		return $this->render('create',['book'=> $book, 'cats' => $cats ]);
	}
	public function actionUpdate($ID)
	{

		$book = Books::findOne($ID);
		if ($book->load(Yii::$app->request->post()))
		{
			if ($book->save())
				{
		   		Yii::$app->session->SetFlash('success','Изменения сохранены!'." Автор - ".$book->name." <br> Дата создания - ".$book->DATE_CREATE );
					
				}
		}
		return $this->render('update',['book' => $book]);
	}
	public function actionDelete($ID)
	{
		$book = Books::findOne($ID);
		$book->delete();
		Yii::$app->session->SetFlash('success','Книга '.$book->name." удалена!" );
					
		return $this->redirect(['book/index']);
	}
}