<?php
$this->breadcrumbs=array(
	'Purchases',
);

$this->menu=array(
	array('label'=>'Create Purchase', 'url'=>array('create')),
	array('label'=>'Manage Purchase', 'url'=>array('admin')),
);
?>

<h1>Purchases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
