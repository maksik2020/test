<h1>Редактирование Книги</h1>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\Widget; 
use \yii\jui\DatePicker;

$form = ActiveForm::begin(
	[
		'enableClientValidation' => false,
	]
); 

echo $form->field($book, 'name');


echo $form->field($book, 'DATE_CREATE')->widget(DatePicker::classname(), [
	'language' => 'ru',
	'dateFormat' => 'yyyy-MM-dd',
]);

echo HTML::submitButton('Сохранить', ['class' => 'btn btn-primary',]);
ActiveForm::end(); 


?>