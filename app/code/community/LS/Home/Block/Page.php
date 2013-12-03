<?php

class LS_Home_Block_Page extends Mage_Core_Block_Template
{
    protected function _toHtml()
    {
        /* @var $helper Mage_Cms_Helper_Data */
        $helper = Mage::helper('cms');
        $processor = $helper->getPageTemplateProcessor();
        $html = parent::_toHtml();
        $html = $processor->filter($html);
        return $html;
    }

}
