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
 * @package     Mage_ImportExport
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/**
 * Source import behavior model
 *
 * @category    Mage
 * @package     Mage_ImportExport
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_ImportExport_Model_Source_Import_Behavior
{
    /**
     * Prepare and return array of import behavior.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $helper = Mage::helper('importexport');

        return array(
            array(
                'value' => Mage_ImportExport_Model_Import::BEHAVIOR_APPEND,
                'label' => $helper->__('Append Complex Data')
            ),
            array(
                'value' => Mage_ImportExport_Model_Import::BEHAVIOR_REPLACE,
                'label' => $helper->__('Replace Existing Complex Data')
            ),
            array(
                'value' => Mage_ImportExport_Model_Import::BEHAVIOR_DELETE,
                'label' => $helper->__('Delete Entities')
            )
        );
    }
}
