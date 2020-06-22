<?php

/* @var $this yii\web\View */
use yii\Helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Авторы';
?>
<div class="site-index">



<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'DATE_CREATE',
            'format'=>'date'    
          ],
          ['attribute'=>'DATE_EDIT',
            'format'=>'date' 
        ],
            'name',
            'booksCount',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  ?>

</div>
