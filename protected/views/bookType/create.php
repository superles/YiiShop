<?php
$this->breadcrumbs=array(
	'Book Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BookType', 'url'=>array('index')),
	array('label'=>'Manage BookType', 'url'=>array('admin')),
);
?>

<h1>Create BookType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>