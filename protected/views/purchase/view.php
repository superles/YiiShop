<?php
$this->breadcrumbs=array(
	'Purchases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Purchase', 'url'=>array('index')),
	array('label'=>'Create Purchase', 'url'=>array('create')),
	array('label'=>'Update Purchase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Purchase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Purchase', 'url'=>array('admin')),
);
?>

<h1>View Purchase #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'user_id',
		'books_id',
		'price',
		'status',
	),
)); ?>
