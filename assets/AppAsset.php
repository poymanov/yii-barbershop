<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic',
        'css/base.css',
        'css/base.custom.css',
    ];
    public $js = [
        'js/base.js',
        'js/base.custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\assets\NormalizeAsset',
    ];
}
