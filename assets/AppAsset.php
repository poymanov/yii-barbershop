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
        'css/base.min.css'
    ];
    public $js = [
        'js/base.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\assets\NormalizeAsset',
    ];
}
