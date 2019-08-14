<?php
  class Rcg_Custombundle_Model_Price extends Mage_Catalog_Model_Product_Type_Price
  {
    public function getFinalPrice($qty=null, $product)
    {
      return 50.00;
    }
  }
 
?>
