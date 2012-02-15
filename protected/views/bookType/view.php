<?php
$this->breadcrumbs=array(
	'Book Types'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List BookType', 'url'=>array('index')),
	array('label'=>'Create BookType', 'url'=>array('create')),
	array('label'=>'Update BookType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BookType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BookType', 'url'=>array('admin')),
);
?>

<h1>View BookType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'parent_id',
	),
)); ?>
