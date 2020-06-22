<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Authors;
use backend\models\AuthorsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


Class AuthorController extends Controller
{
	  /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Authors models.
     * @return mixed
     */
	public function actionIndex()
	{
		$authors = Authors::find()->orderBy('name',['booksCount' => SORT_DESC],'DATE_CREATE')->all();
		foreach ($authors as $author):
			  if (!$author == null)
			  {
				
				
				$curAuthor = Authors::findOne($author->id);
				$curAuthor->booksCount = $author->getBooksCount();
				//print_r($author->DATE_CREATE);
				if ($author->load(['id' => $author->id], ''))
					{
						$author->booksCount =  $author->getBooksCount();
							$author->save();	
					}
				
			  }
			 
		endforeach;
		
		$searchModel = new AuthorsSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		
		return $this->render('index',['authors' => $authors, 
		'searchModel' => $searchModel,
			 'dataProvider' => $dataProvider,
		]);
	}
	/**
     * Displays a single Authors model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    

	public function actionCreate()
	{
		$author = new Authors();
	
		if ($author->load(Yii::$app->request->post()))
		{
			

			if ($author->save())
				{
					Yii::$app->session->SetFlash('success','Сохранено!'." Автор - ".$author->name." <br> Дата создания - ".$author->DATE_CREATE );
					
				}
		}
		
		return $this->render('create',['author'=> $author]);
	}
	public function actionView($id)
    {
		$author = Authors::findOne($id);
		
        return $this->render('view', [
            'model' => $author,
        ]);
    }

	public function actionUpdate($id)
	{
		$author = Authors::findOne($id);
		if ($author->load(Yii::$app->request->post()))
		{
			if ($author->save())
				{
		   		Yii::$app->session->SetFlash('success','Изменения сохранены!'." Автор - ".$author->name." <br> Дата создания - ".$author->DATE_CREATE );
					
				}
		}
		return $this->render('update',['author' => $author]);
	}
	public function actionDelete($id)
	{
		$author = Authors::findOne($id);
		$author->delete();
		Yii::$app->session->SetFlash('success','Автор '.$author->name." удален!" );
					
		return $this->redirect(['author/index']);
	}
}