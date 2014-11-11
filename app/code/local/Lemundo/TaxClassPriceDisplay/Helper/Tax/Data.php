<?php
/**
 * Rewrite the standard helper to be able to change the price display settings
 * for special customer groups (depending on the customer tax class).
 * Basically, in the backend, you can configure settings deviating from the default for
 * a special customer tax class.
 * All customer groups which belong to that class will use the deviating settings.
 */
class Lemundo_TaxClassPriceDisplay_Helper_Tax_Data extends Mage_Tax_Helper_Data {

    /**
     * Checking whether the customer is of the special class to inject our own config model instead
     * @param array $args
     */
    public function __construct(array $args = array()) {
        parent::__construct($args);
        $isInSpecialTaxClass = Mage::helper('lemundo_taxclasspricedisplay')->isCurrentCustomerInSpecialTaxClass();
        if ($isInSpecialTaxClass) {
            $this->_config = Mage::getSingleton('lemundo_taxclasspricedisplay/tax_config');
        }
    }
}
