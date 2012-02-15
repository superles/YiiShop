<?php
$this->breadcrumbs=array(
	'Purchases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Purchase', 'url'=>array('index')),
	array('label'=>'Manage Purchase', 'url'=>array('admin')),
);
?>

<h1>Create Purchase</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>