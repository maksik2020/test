
<h1>Создание Автора</h1>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\Widget; 
use \yii\jui\DatePicker;



$form = ActiveForm::begin(
	[
	//	'enableClientValidation' => false,
		
	]
); 

echo $form->field($author, 'name');


echo $form->field($author, 'DATE_CREATE')->widget(DatePicker::classname(), [
	'language' => 'ru',
	'dateFormat' => 'yyyy-MM-dd',
	
]);


echo HTML::submitButton('Сохранить', ['class' => 'btn btn-primary',]);
ActiveForm::end(); 
?>
