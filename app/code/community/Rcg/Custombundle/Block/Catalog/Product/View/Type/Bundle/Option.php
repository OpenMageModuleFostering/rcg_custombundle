<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @category   Mage
 * @package    Mage_Bundle
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Bundle option renderer
 *
 * @category    Mage
 * @package     Mage_Bundle
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Rcg_Custombundle_Block_Catalog_Product_View_Type_Bundle_Option extends Mage_Bundle_Block_Catalog_Product_View_Type_Bundle_Option_Select

{
  

    public function getSelectionTitlePrice ($_selection, $includeContainer = true)
    {
         
        if ( Mage::getStoreConfig('RCG_options/custombundle/active'))  {
                $separator1 = '';
                $separator2 = '';
                $separator3 = '';
                $attribute1 = '';
                $attribute2 = '';
                $attribute3 = '';
            
             
                $attvalue1 = Mage::getStoreConfig('RCG_options/custombundle/attrib1');
                $attvalue2 = Mage::getStoreConfig('RCG_options/custombundle_cc/attrib2');
                $attvalue3 = Mage::getStoreConfig('RCG_options/custombundle_cc/attrib3');
                $separator0 = Mage::getStoreConfig('RCG_options/custombundle/separator0');
                $separator1 = Mage::getStoreConfig('RCG_options/custombundle/separator1');
                $separator2 = Mage::getStoreConfig('RCG_options/custombundle/separator2');
                $separator3 = Mage::getStoreConfig('RCG_options/custombundle_cc/separator3');
		$separator3 = Mage::getStoreConfig('RCG_options/custombundle/separator3');
                $showprice = Mage::getStoreConfig('RCG_options/custombundle/showprice');
		$showstockqty = Mage::getStoreConfig('RCG_options/custombundle/showstockqty');
                $pricesymbol = Mage::getStoreConfig('RCG_options/custombundle/pricesymbol');



             
           
               $_selection->load($_selection->getId()) ;
               
               if($attvalue1) {$attribute1 = $_selection->getResource()->getAttribute($attvalue1)->getFrontend()->getValue($_selection);};
               
               if($attvalue2) {$attribute2 = $_selection->getResource()->getAttribute($attvalue2)->getFrontend()->getValue($_selection);};
               
               if($attvalue3) {$attribute3 = $_selection->getResource()->getAttribute($attvalue3)->getFrontend()->getValue($_selection);};
             
             
              $_SelectionStockQty = Mage::getModel('cataloginventory/stock_item')->loadByProduct($_selection)->getQty();
              $price = $this->getProduct()->getPriceModel()->getSelectionPreFinalPrice($this->getProduct(), $_selection);
            
              
              $rtrn = $_selection->getSelectionQty()*1 . $separator0 . ' ' 
                    .$separator1 .$attribute1   
                    .$separator2 .$attribute2
                    .$separator3 .$attribute3
                    .' &nbsp; '  
		    .($showstockqty ? Mage::getModel('cataloginventory/stock_item')->loadByProduct($_selection)->getQty():'')
                    
                    . ($includeContainer ? '<span class="price-notice">':'') . $pricesymbol 
                    . ($showprice ? $this->formatPriceString($price, $includeContainer) : '')
		    . ($includeContainer ? '</span>':''); 
		
		return $rtrn;
                    
         } else {   
        return parent::getSelectionTitlePrice($_selection, false) ;
        }    
         
    }

    

   
}
