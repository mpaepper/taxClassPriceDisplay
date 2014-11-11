<?php
/**
 * Unfortunately, it is not enough to overwrite the XML path constants, because
 * when the method is not overridden, but inherited, the method will still 
 * take the const value of the parent class.
 * This would not be the case if the parent method used static:: instead of self:: but it does not.
 */
class Lemundo_TaxClassPriceDisplay_Model_Tax_Config extends Mage_Tax_Model_Config {
    /**
     * Prices display settings
     */
    const CONFIG_XML_PATH_PRICE_DISPLAY_TYPE = 'lemundo_b2bprices/price_display/tax_display_type';
    const CONFIG_XML_PATH_DISPLAY_SHIPPING = 'lemundo_b2bprices/price_display/tax_display_shipping';
    const CONFIG_XML_PATH_PHOENIX_CASH_ON_DELIVERY = 'lemundo_b2bprices/price_display/tax_display_phoenix_cashondelivery_fee';

    /**
     * Shopping cart display settings
     */
    const XML_PATH_DISPLAY_CART_PRICE = 'lemundo_b2bprices/cart_display/tax_cart_display_price';
    const XML_PATH_DISPLAY_CART_SUBTOTAL = 'lemundo_b2bprices/cart_display/tax_cart_display_subtotal';
    const XML_PATH_DISPLAY_CART_SHIPPING = 'lemundo_b2bprices/cart_display/tax_cart_display_shipping';
//    const XML_PATH_DISPLAY_CART_DISCOUNT = 'lemundo_b2bprices/cart_display/discount'; Is commented out in system.xml of Tax
    const XML_PATH_DISPLAY_CART_GRANDTOTAL = 'lemundo_b2bprices/cart_display/tax_cart_display_grandtotal';
    const XML_PATH_DISPLAY_CART_FULL_SUMMARY = 'lemundo_b2bprices/cart_display/tax_cart_display_full_summary';
    const XML_PATH_DISPLAY_CART_ZERO_TAX = 'lemundo_b2bprices/cart_display/tax_cart_display_zero_tax';

    /**
     * Shopping cart display settings
     */
    const XML_PATH_DISPLAY_SALES_PRICE = 'lemundo_b2bprices/sales_display/tax_sales_display_price';
    const XML_PATH_DISPLAY_SALES_SUBTOTAL = 'lemundo_b2bprices/sales_display/tax_sales_display_subtotal';
    const XML_PATH_DISPLAY_SALES_SHIPPING = 'lemundo_b2bprices/sales_display/tax_sales_display_shipping';
//    const XML_PATH_DISPLAY_SALES_DISCOUNT = 'lemundo_b2bprices/sales_display/discount'; Is commented out in system.xml of Tax
    const XML_PATH_DISPLAY_SALES_GRANDTOTAL = 'lemundo_b2bprices/sales_display/tax_sales_display_grandtotal';
    const XML_PATH_DISPLAY_SALES_FULL_SUMMARY = 'lemundo_b2bprices/sales_display/tax_sales_display_full_summary';
    const XML_PATH_DISPLAY_SALES_ZERO_TAX = 'lemundo_b2bprices/sales_display/tax_sales_display_zero_tax';

    /**
     * Get product price display type
     *  1 - Excluding tax
     *  2 - Including tax
     *  3 - Both
     *
     * @param   mixed $store
     * @return  int
     */
    public function getPriceDisplayType($store = null) {
        return (int) $this->_getStoreConfig(self::CONFIG_XML_PATH_PRICE_DISPLAY_TYPE, $store);
    }

    /**
     * Get shipping methods prices display type
     *
     * @param   store $store
     * @return  int
     */
    public function getShippingPriceDisplayType($store = null) {
        return (int) $this->_getStoreConfig(self::CONFIG_XML_PATH_DISPLAY_SHIPPING, $store);
    }

    /**
     * Check if display cart prices included tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartPricesInclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_PRICE, $store) == self::DISPLAY_TYPE_INCLUDING_TAX;
    }

    /**
     * Check if display cart prices excluded tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartPricesExclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_PRICE, $store) == self::DISPLAY_TYPE_EXCLUDING_TAX;
    }

    /**
     * Check if display cart prices included and excluded tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartPricesBoth($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_PRICE, $store) == self::DISPLAY_TYPE_BOTH;
    }

    /**
     * Check if display cart subtotal included tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartSubtotalInclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_SUBTOTAL, $store) == self::DISPLAY_TYPE_INCLUDING_TAX;
    }

    /**
     * Check if display cart subtotal excluded tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartSubtotalExclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_SUBTOTAL, $store) == self::DISPLAY_TYPE_EXCLUDING_TAX;
    }

    /**
     * Check if display cart subtotal included and excluded tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartSubtotalBoth($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_SUBTOTAL, $store) == self::DISPLAY_TYPE_BOTH;
    }

    /**
     * Check if display cart shipping included tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartShippingInclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_SHIPPING, $store) == self::DISPLAY_TYPE_INCLUDING_TAX;
    }

    /**
     * Check if display cart shipping excluded tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartShippingExclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_SHIPPING, $store) == self::DISPLAY_TYPE_EXCLUDING_TAX;
    }

    /**
     * Check if display cart shipping included and excluded tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartShippingBoth($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_SHIPPING, $store) == self::DISPLAY_TYPE_BOTH;
    }

    /**
     * Get display cart tax with grand total
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartTaxWithGrandTotal($store = null) {
        return (bool) $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_GRANDTOTAL, $store);
    }

    /**
     * Get display cart full summary
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartFullSummary($store = null) {
        return (bool) $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_FULL_SUMMARY, $store);
    }

    /**
     * Get display cart zero tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displayCartZeroTax($store = null) {
        return (bool) $this->_getStoreConfig(self::XML_PATH_DISPLAY_CART_ZERO_TAX, $store);
    }

    /**
     * Check if display sales prices include tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesPricesInclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_PRICE, $store) == self::DISPLAY_TYPE_INCLUDING_TAX;
    }

    /**
     * Check if display sales prices exclude tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesPricesExclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_PRICE, $store) == self::DISPLAY_TYPE_EXCLUDING_TAX;
    }

    /**
     * Check if display sales prices include and exclude tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesPricesBoth($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_PRICE, $store) == self::DISPLAY_TYPE_BOTH;
    }

    /**
     * Check if display sales subtotal include tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesSubtotalInclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_SUBTOTAL, $store) == self::DISPLAY_TYPE_INCLUDING_TAX;
    }

    /**
     * Check if display sales subtotal exclude tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesSubtotalExclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_SUBTOTAL, $store) == self::DISPLAY_TYPE_EXCLUDING_TAX;
    }

    /**
     * Check if display sales subtotal include and exclude tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesSubtotalBoth($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_SUBTOTAL, $store) == self::DISPLAY_TYPE_BOTH;
    }

    /**
     * Check if display sales shipping include tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesShippingInclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_SHIPPING, $store) == self::DISPLAY_TYPE_INCLUDING_TAX;
    }

    /**
     * Check if display sales shipping exclude tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesShippingExclTax($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_SHIPPING, $store) == self::DISPLAY_TYPE_EXCLUDING_TAX;
    }

    /**
     * Check if display sales shipping include and exclude tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesShippingBoth($store = null) {
        return $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_SHIPPING, $store) == self::DISPLAY_TYPE_BOTH;
    }

    /**
     * Get display sales tax with grand total
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesTaxWithGrandTotal($store = null) {
        return (bool) $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_GRANDTOTAL, $store);
    }

    /**
     * Get display sales full summary
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesFullSummary($store = null) {
        return (bool) $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_FULL_SUMMARY, $store);
    }

    /**
     * Get display sales zero tax
     *
     * @param mixed $store
     * @return bool
     */
    public function displaySalesZeroTax($store = null) {
        return (bool) $this->_getStoreConfig(self::XML_PATH_DISPLAY_SALES_ZERO_TAX, $store);
    }
    
    /**
     * Get the setting for Phoenix Cash On Delivery if used
     * @param type $store
     * @return type
     */
    public function displayCashOnDeliveryFee($store = null) {
        return $this->_getStoreConfig(self::CONFIG_XML_PATH_PHOENIX_CASH_ON_DELIVERY);
    }
}