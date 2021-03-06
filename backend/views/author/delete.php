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

echo $form->field($author, 'NAME');


echo $form->field($author, 'DATE_CREATE')->widget(DatePicker::classname(), [
	'language' => 'ru',
	'dateFormat' => 'yyyy-MM-dd',
]);

echo HTML::submitButton('Удалить', ['class' => 'btn btn-primary',]);
ActiveForm::end(); 


?>