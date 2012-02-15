<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
        Created by Artisteer v3.0.0.39952
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo CHtml::encode(Yii::app()->name); ?></title>

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" type="text/css" media="screen, projection" />
        <!--[if IE 6]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/script.js"></script>
    </head><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>

    <body>
        <div id="art-main">
            <div class="art-nav">
                <div class="art-nav-l"></div>
                <div class="art-nav-r"></div>
                <div class="art-nav-outer">
                    <div class="art-nav-wrapper">
                        <div class="art-nav-inner">
                            <?php
                            $this->widget('application.components.ArtMenu', array(
                                'cls' => 'art-hmenu',
                                'prelinklabel' => '<span class="l"></span><span class="r"></span><span class="t">',
                                'postlinklabel' => '</span>',
                                'items' => array(
                                    array('label' => 'Home', 'url' => array('/site/index')),
                                    array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                    array('label' => 'Contact', 'url' => array('/site/contact')),
                                    array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                                    array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                                    array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                                    array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                                ),
                            ));
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared reset-box"></div>
            <div class="art-header">
                <div class="art-header-clip">
                    <div class="art-header-center">
                        <div class="art-header-jpeg"></div>
                    </div>
                </div>
                <div class="art-header-wrapper">
                    <div class="art-header-inner">
                        <div class="art-headerobject"></div>
                        <div class="art-logo">
                            <h1 class="art-logo-name"><a href="#"><?php echo isset(Yii::app()->params['art-logo-name']) ? Yii::app()->params['art-logo-name'] : Yii::app()->name; ?></a></h1>
                            <h2 class="art-logo-text"><?php echo Yii::app()->params['art-logo-text']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared reset-box"></div>

            <div class="art-sheet">
                <div class="art-sheet-cc"></div>
                <div class="art-sheet-body">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <!-- removed sidebar HTML and set aside -->
                            <!-- goes before ..."art-layout-cell art-content" in page.html original -->

                            <!-- Main content goes here -->
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="cleared"></div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-b"></div>
                <div class="art-footer-body">
                    <div class="art-footer-center">
                        <div class="art-footer-wrapper">
                            <div class="art-footer-text">
                                <a href="#" class="art-rss-tag-icon" title="RSS"></a>

                                <p><a href="#">Link1</a> | <a href="#">Link2</a> | <a href="#">Link3</a></p>
                                <p>Copyright © 2011. All Rights Reserved.</p>


                                <div class="cleared"></div>
                                <p class="art-page-footer"><a href="http://www.artisteer.com/?p=website_templates">Website Template</a> created with Artisteer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
        </div>
    </body>
</html>
