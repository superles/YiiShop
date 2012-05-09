<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
    'method' => 'post',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'book_type'); ?>
        <?php echo $form->dropDownList($model, 'book_type', BookType::model()->getAllTypes()); ?>
        <?php echo $form->error($model,'book_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'release_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'release_date',
            'model' => $model,
            'attribute' => 'release_date',
            'language' => 'ru',
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        <?php echo $form->error($model,'release_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'num_pages'); ?>
        <?php echo $form->textField($model,'num_pages'); ?>
        <?php echo $form->error($model,'num_pages'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo $form->fileField($model, 'image')?>
        <?php echo $form->error($model,'image'); ?>
        <?php
        if(!$model->isNewRecord) {
            echo CHtml::image(Yii::app()->baseUrl.'/images/books/' .$model->id . $model->image, $model->title, array('height'=>100));
        }
        ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
        <?php $this->widget('ext.fckeditor.FCKEditorWidget', array(
            "model"=>$model,
            "attribute"=>'description',
            "height"=>'400px',
            "width"=>'100%',
            "toolbarSet"=>'Default',
            "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
            "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
            "config" => array(
                "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
        )
        );?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'price'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->