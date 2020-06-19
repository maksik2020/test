<?php

/* @var $this yii\web\View */
use yii\Helpers\Url;

$this->title = 'Авторы';
?>
<div class="site-index">
<table class = "table table-condensed" >
<tr>
<th>Автор</th>
<th>Дата создания</th>
<th>Количество книг</th>
<th>Редактирование</th>
<th>Удаление</th>
</tr>


<?php   foreach($authors as $author): ?>
 
  <?php // $cntBooks = $author->getBooksCount(); ?>
  <?php $date_cr = Yii::$app->formatter->asDate($author->DATE_CREATE); ?>
      <tr>
      <td><?php echo $author->NAME ?> </td> 
      <td> <?php  //echo Yii::$app->formatter->asDate($date_cr, "php:d.m H:i")   
      echo $date_cr;
      ?></td>
      <td> <?php echo $author->BooksCount ?></td>
      <td> <a href ="<?php echo Url::to(['author/update', 'ID' => $author->ID]) ?>"> Edit </a></td>
      <td> <a href ="<?php echo Url::to(['author/delete', 'ID' => $author->ID]) ?>"> Delete </a></td>
     </tr>
  
<?php endforeach; ?>
</table>

</div>
