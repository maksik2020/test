<?php

/* @var $this yii\web\View */
use yii\Helpers\Url;

$this->title = 'Книги';
?>
<div class="site-index">
<table class="table table-condensed">
<tr>
<th>Название книги</th>
<th>Дата создания</th>
<th>Автор</th>
<th>Редактирование</th>
<th>Удаление</th>
</tr>


<?php  foreach ($books as $book): ?>
  <?php $date_cr = Yii::$app->formatter->asDate($book->DATE_CREATE); ?>
 <?php  $author = $book->getAuthor(); ?>
  <tr>
  <td>  <?php    echo $book->name ?></td> 
  <td>  <?php echo $date_cr ?></td>
 <td> <?php     echo $author->name ?> </td>
 <td> <a href ="<?php echo Url::to(['book/update', 'id' => $book->id]) ?>"> Edit </a></td>
 <td> <a href ="<?php echo Url::to(['book/delete', 'id' => $book->id]) ?>"> Delete </a></td>
</tr>
 
<?php endforeach; ?>
</table>
</div>
