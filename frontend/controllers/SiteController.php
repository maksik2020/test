<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\Books;

/**
 * Site controller
 */
class SiteController extends Controller
{
    
    public function actionIndex()
	{
		$listbooks = Books::find()->orderBy('NAME','DATE_CREATE')->all();

		return $this->render('index',['books' => $listbooks]);
	}

    
}
