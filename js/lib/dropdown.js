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
 * @category    lib
 * @package     js
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */
dropdown = function() {
    var ele = document.getElementById("nav").getElementsByTagName("LI");
    for (var i=0; i<ele.length; i++) {
        ele[i].onmouseover=function() {
            this.className+=" over";
        }
        ele[i].onmouseout=function() {
            this.className=this.className.replace(new RegExp(" over\\b"), "");
        }
    }
}
if (window.attachEvent) window.attachEvent("onload", dropdown);
