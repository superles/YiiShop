<?php
$this->breadcrumbs=array(
	'Book Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BookType', 'url'=>array('index')),
	array('label'=>'Create BookType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('book-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Book Types</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Создать', array('/bookType/create'), array('style' => 'margin-left: 15px;')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name' => 'parent_id',
            'value' => 'BookType::model()->getParentTypeById($data->parent_id)'
        ),
		'title',
		array(
			'class'=>'CButtonColumn',
            'template' => '{update}{delete}',
		),
	),
)); ?>
