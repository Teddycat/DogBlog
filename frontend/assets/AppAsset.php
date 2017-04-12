<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/web/css/bootstrap.css',
        'frontend/web/css/bootstrap-min.css',
        'frontend/web/css/site.css',
        'https://fonts.googleapis.com/css',
        'https://fonts.googleapis.com/css?family=Kaushan+Script',
        'https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic',
        'https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700',

    ];
    public $js = [
        'frontend/web/js/jquery.js',
        'frontend/web/js/jqBootstrapValidation.js',
        'frontend/web/js/bootstrap.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
    ];
}
