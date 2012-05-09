<?php
$this->breadcrumbs=array(
	'Books'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index')),
	array('label'=>'Create Book', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('book-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Книги</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'class' => 'EImageColumn',
            'imagePathExpression' => 'Yii::app()->baseUrl."/images/books/".$data->id.$data->image',
            'emptyText' => '—',
            'imageOptions' => array(
                'height' => 100,
            ),
        ),
		'title',
		'author',
        array(
            'name' => 'book_type',
            'filter' => BookType::model()->getAllTypes(),
            'value' => function($data) {
                return $data->category->title;
            }
        ),
		'release_date',
		/*
		'num_pages',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
