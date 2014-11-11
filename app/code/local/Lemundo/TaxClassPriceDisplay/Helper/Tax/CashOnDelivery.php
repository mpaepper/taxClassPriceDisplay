<?php

class Lemundo_TaxClassPriceDisplay_Helper_Tax_CashOnDelivery extends Phoenix_CashOnDelivery_Helper_Data {

    public function getCodFeeDisplayType($store = null) {
        $isInSpecialTaxClass = Mage::helper('lemundo_taxclasspricedisplay')->isCurrentCustomerInSpecialTaxClass();
        if (!$isInSpecialTaxClass) {
            return parent::getCodFeeDisplayType($store);
        }
        // We have the special group case
        $displayCod = Mage::getSingleton('lemundo_taxclasspricedisplay/tax_config')->displayCashOnDeliveryFee($store);
        return $displayCod;
    }

}
