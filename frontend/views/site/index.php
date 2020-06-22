<?php

/* @var $this yii\web\View */
use yii\Helpers\Url;

$this->title = 'Книги';
?>
<div class="site-index">
<table class="table table-condensed">
<tr>
<th>Автор</th>
<th>Название книги</th>
</tr>


<?php  foreach ($books as $book): ?>
 
 <?php  $author = $book->getAuthor(); ?>
  <tr>
  <td> <?php     echo $author->name ?> </td>
  <td>  <?php    echo $book->name ?></td> 
  
 
 
</tr>
 
<?php endforeach; ?>
</table>
</div>
