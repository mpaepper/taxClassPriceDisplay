<?php

class Lemundo_TaxClassPriceDisplay_Helper_Data extends Mage_Core_Helper_Abstract {

    const XML_PATH_MODULE_ENABLED = 'lemundo_b2bprices/config/is_enabled';
    const XML_PATH_SPECIAL_TAX_CLASS_ID = 'lemundo_b2bprices/config/special_customer_tax_class_id';

    protected $_belongsToSpecialGroup;

    /**
     * Returns whether the current logged in customer (or guest) belongs to the special tax class.
     * Caches the result in local variable so that it is only computed once since helper is singleton.
     * @return boolean
     */
    public function isCurrentCustomerInSpecialTaxClass() {
        if (empty($this->_belongsToSpecialGroup)) {
            $this->_belongsToSpecialGroup = false;
            $isModuleActive = Mage::getStoreConfigFlag(self::XML_PATH_MODULE_ENABLED);
            if ($isModuleActive) {
                $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
                $taxClassId = Mage::getModel('customer/group')->getTaxClassId($groupId);
                $specialTaxClassId = Mage::getStoreConfig(self::XML_PATH_SPECIAL_TAX_CLASS_ID);
                if ($taxClassId == $specialTaxClassId) {
                    $this->_belongsToSpecialGroup = true;
                }
            }
        }
        return $this->_belongsToSpecialGroup;
    }

}
