<?php

/* @var $this yii\web\View */


$this->title = 'Книги';
?>
<div class="site-index">
<table>
<tr>
<th>Название книги</th>
<th>Дата создания</th>
<th>Автор</th>
</tr>


<?php 

  foreach ($books as $book)
  {
   $author = $book->getAuthor();
      echo "<tr>";
      echo "<td>".$book->NAME." </td> <td>".Yii::$app->formatter->asDate($book->DATE_CREATE)."</td>";
      echo "<td>".$author->NAME."</td>";
      echo "</tr>";
  }
?>
</table>
</div>
