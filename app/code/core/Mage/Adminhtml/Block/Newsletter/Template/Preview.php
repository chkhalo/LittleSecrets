<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magentocommerce.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/**
 * Adminhtml newsletter template preview block
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Block_Newsletter_Template_Preview extends Mage_Adminhtml_Block_Widget
{

    protected function _toHtml()
    {
        /* @var $template Mage_Newsletter_Model_Template */
        $template = Mage::getModel('newsletter/template');

        if($id = (int)$this->getRequest()->getParam('id')) {
            $template->load($id);
        } else {
            $template->setTemplateType($this->getRequest()->getParam('type'));
            $template->setTemplateText($this->getRequest()->getParam('text'));
            $template->setTemplateStyles($this->getRequest()->getParam('styles'));
        }

        $storeId = (int)$this->getRequest()->getParam('store_id');
        if(!$storeId) {
            $storeId = Mage::app()->getDefaultStoreView()->getId();
        }

        Varien_Profiler::start("newsletter_template_proccessing");
        $vars = array();

        $vars['subscriber'] = Mage::getModel('newsletter/subscriber');
        if($this->getRequest()->getParam('subscriber')) {
            $vars['subscriber']->load($this->getRequest()->getParam('subscriber'));
        }

        $template->emulateDesign($storeId);
        $templateProcessed = $template->getProcessedTemplate($vars, true);
        $template->revertDesign();

        if($template->isPlain()) {
            $templateProcessed = "<pre>" . htmlspecialchars($templateProcessed) . "</pre>";
        }

        Varien_Profiler::stop("newsletter_template_proccessing");

        return $templateProcessed;
    }

}
