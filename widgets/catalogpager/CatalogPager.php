<?php

namespace app\widgets\catalogpager;

use yii\helpers\Html;

class CatalogPager extends \yii\widgets\LinkPager
{
    public function init()
    {
        parent::init();
    }

    protected function renderPageButtons()
    {
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }

        $buttons = [];
        $currentPage = $this->pagination->getPage();

        // internal pages
        list($beginPage, $endPage) = $this->getPageRange();
        for ($i = $beginPage; $i <= $endPage; ++$i) {
            $buttons[] = $this->renderPageButton($i + 1, $i, null, false, $i == $currentPage);
        }

        return Html::tag('ul', implode("\n", $buttons), $this->options);
    }

    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => empty($class) ? $this->pageCssClass : $class];
        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }

        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        if ($active) {
            return Html::tag('li', $label, $options);
        } else {
            return Html::tag('li', Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
        }
    }
}