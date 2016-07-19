<?php

namespace app\widgets\ProfileMenu;

use yii\base\Widget;

class ProfileMenu extends Widget
{
    
    public function run()
    {
        return $this->render('menu');
    }
}