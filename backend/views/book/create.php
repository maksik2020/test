<h1>Создание Книги</h1>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\Widget; 
use \yii\jui\DatePicker;
use yii\helpers\ArrayHelper;



$form = ActiveForm::begin(
	[
		'enableClientValidation' => false,
	]
); 

echo $form->field($book, 'NAME');
//echo $form->field($book, 'IDAUTHOR');

$cats = ArrayHelper::map($cats, 'ID', 'NAME');
echo $form->field($book, 'IDAUTHOR')->dropDownList($cats,  [
	'prompt' => 'Укажите автора',
	'ID' => 'test',
	'options' => [
		 '7' => ['Selected' => true]
	]
]);

echo $form->field($book, 'DATE_CREATE')->widget(DatePicker::classname(), [
	'language' => 'ru',
	'dateFormat' => 'yyyy-MM-dd',
]);

echo HTML::submitButton('Сохранить', ['class' => 'btn btn-primary',]);
ActiveForm::end(); 
?>
