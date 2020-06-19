<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Authors;


Class AuthorController extends Controller
{
	public function actionIndex()
	{
		$authors = Authors::find()->orderBy('NAME',['BooksCount' => SORT_DESC],'DATE_CREATE')->all();
		foreach ($authors as $author):
			  if (!$author == null)
			  {
				
				
				$curAuthor = Authors::findOne($author->ID);
				$curAuthor->BooksCount = $author->getBooksCount();
				//print_r($author->DATE_CREATE);
				if ($author->load(['ID' => $author->ID], ''))
					{
						$author->BooksCount =  $author->getBooksCount();
							$author->save();	
					}
				
				
			  }
			 
		endforeach;
		
    // $authors->orderBy('NAME','DATE_CREATE')->all();
		return $this->render('index',['authors' => $authors]);
	}
	public function actionCreate()
	{
		$author = new Authors();
	
		if ($author->load(Yii::$app->request->post()))
		{
			

			if ($author->save())
				{
					Yii::$app->session->SetFlash('success','Сохранено!'." Автор - ".$author->NAME." <br> Дата создания - ".$author->DATE_CREATE );
					
				}
		}
		
		return $this->render('create',['author'=> $author]);
	}
	public function actionUpdate($ID)
	{
		$author = Authors::findOne($ID);
		if ($author->load(Yii::$app->request->post()))
		{
			if ($author->save())
				{
		   		Yii::$app->session->SetFlash('success','Изменения сохранены!'." Автор - ".$author->NAME." <br> Дата создания - ".$author->DATE_CREATE );
					
				}
		}
		return $this->render('update',['author' => $author]);
	}
	public function actionDelete($ID)
	{
		$author = Authors::findOne($ID);
		$author->delete();
		Yii::$app->session->SetFlash('success','Автор '.$author->NAME." удален!" );
					
		return $this->redirect(['author/index']);
	}
}