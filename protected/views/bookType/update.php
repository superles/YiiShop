<?php
$this->breadcrumbs=array(
	'Book Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BookType', 'url'=>array('index')),
	array('label'=>'Create BookType', 'url'=>array('create')),
	array('label'=>'View BookType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BookType', 'url'=>array('admin')),
);
?>

<h1>Update BookType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>