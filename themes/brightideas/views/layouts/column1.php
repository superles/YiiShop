<?php $this->beginContent('//layouts/main'); ?>
<div class="art-layout-cell art-content">
    <div class="art-post">
        <div class="art-post-body">
            <div class="art-post-inner art-article">
                <div class="art-postcontent">
                    <!-- article-content -->
                    <?php echo $content; ?>
                </div>
                <div class="cleared"></div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>
<?php $this->endContent(); ?>
