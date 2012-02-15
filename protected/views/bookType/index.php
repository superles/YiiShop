<?php
$this->breadcrumbs=array(
	'Book Types',
);

$this->menu=array(
	array('label'=>'Create BookType', 'url'=>array('create')),
	array('label'=>'Manage BookType', 'url'=>array('admin')),
);
?>

<h1>Book Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
