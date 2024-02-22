<?php

$cache_shop_by_product = array();
$cache_warehouse_by_product = array();
$cache_tax = array();
class SCI
{
    protected static $scModulesInfos;
    public $ps_vers;
    public static function getDefaultCountryId()
    {
        $return = 0;
        if (!defined("SC_CACHE_DEFAULT_COUNTRY_ID")) {
            if (version_compare(_PS_VERSION_, "1.5.0.0", "<")) {
                $return = (int) Country::getDefaultCountryId();
                goto ho5Jk;
            }
            $return = (int) SCI::getConfigurationValue("PS_COUNTRY_DEFAULT", null, 0, (int) SCI::getSelectedShop());
            ho5Jk:
            define("SC_CACHE_DEFAULT_COUNTRY_ID", $return);
            goto Eo4LS;
        }
        $return = SC_CACHE_DEFAULT_COUNTRY_ID;
        Eo4LS:
        return $return;
    }
    public static function hookExec($hook_name, $hookArgs = array(), $id_module = null)
    {
        if (!empty(Context::getContext()->currency)) {
            goto jJmdD;
        }
        Context::getContext()->currency = Currency::getDefaultCurrency();
        jJmdD:
        $old_to_new_hook = array("updateProduct" => "actionProductUpdate", "updateProductAttribute" => "actionProductAttributeUpdate", "watermark" => "actionWatermark");
        if (!array_key_exists($hook_name, $old_to_new_hook)) {
            goto cNXSP;
        }
        $hook_name = $old_to_new_hook[$hook_name];
        cNXSP:
        if (!(!_s("APP_COMPAT_HOOK") || !SCI::checkUsedHook($hook_name))) {
            if (version_compare(_PS_VERSION_, "1.7.1.0", ">=") && method_exists("Hook", "getAllKnownNames")) {
                $alias = Hook::getAllKnownNames($hook_name);
                goto LWn_R;
            }
            $alias = Hook::getHookAliasList();
            LWn_R:
            if (!($hook_name == "actionProductUpdate")) {
                goto LshBs;
            }
            $old_value = Configuration::get("PS_SMARTY_CLEAR_CACHE");
            SCI::updateConfigurationValue("PS_SMARTY_CLEAR_CACHE", "never");
            LshBs:
            if (SCMS) {
                $result = Hook::exec(sc_array_key_exists(strtolower($hook_name), $alias) ? $alias[strtolower($hook_name)] : $hook_name, $hookArgs, $id_module, false, true, false, (int) SCI::getSelectedShop());
                goto Umbks;
            }
            $result = Hook::exec(sc_array_key_exists(strtolower($hook_name), $alias) ? $alias[strtolower($hook_name)] : $hook_name, $hookArgs, $id_module);
            Umbks:
            if (!($hook_name == "actionProductUpdate")) {
                goto sN1Co;
            }
            SCI::updateConfigurationValue("PS_SMARTY_CLEAR_CACHE", $old_value);
            sN1Co:
            return $result;
        }
        return;
    }
    public static function checkUsedHook($hook_name)
    {
        $hook_list = json_decode(SC_HOOK_MODULE_LIST, true);
        if (version_compare(_PS_VERSION_, "1.5.0.0", ">=") && isset($hook_list[SCI::getSelectedShop()])) {
            $hook_list_by_shop = $hook_list[SCI::getSelectedShop()];
            goto JlWok;
        }
        $hook_list_by_shop = $hook_list;
        JlWok:
        if (!empty($hook_list)) {
            return sc_array_key_exists(strtolower($hook_name), $hook_list_by_shop);
        }
        return true;
    }
    public static function addToShops($objectTableName, $objects_id = array(), $shops = array())
    {
        if (!(version_compare(_PS_VERSION_, "1.5.0.0", "<") || count($objects_id) == 0)) {
            if (!(is_array($shops) && count($shops) == 0)) {
                goto JJlBV;
            }
            $shops = Shop::getShops(true, null, true);
            JJlBV:
            $relationsArray = Db::getInstance()->getValue("SELECT GROUP_CONCAT(CONCAT(\"(\",id_shop,\",\",id_" . pSQL($objectTableName) . ",\")\") SEPARATOR \"#\") as relations\n                                                            FROM " . _DB_PREFIX_ . pSQL($objectTableName) . "_shop\n                                                            WHERE id_" . pSQL($objectTableName) . " IN (" . implode(",", $objects_id) . ")");
            $relationsArray = explode("#", $relationsArray);
            $newRelations = array();
            foreach ($shops as $id_shop) {
                foreach ($objects_id as $id_object) {
                    $newRelations[] = "(" . (int) $id_shop . "," . (int) $id_object . ")";
                }
            }
            $newRelations = arrayDiffEmulation($newRelations, $relationsArray);
            if (!count($newRelations)) {
                goto qBp5K;
            }
            $sql = "INSERT INTO _DB_PREFIX_" . pSQL($objectTableName) . "_shop (id_shop,id_" . pSQL($objectTableName) . ") VALUES " . join(",", $newRelations);
            Db::getInstance()->Execute($sql);
            qBp5K:
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    public static function duplicateImageToShops($object_id, $actual_shop_id, $shops = array())
    {
        if (!(version_compare(_PS_VERSION_, "1.5.0.0", "<") || empty($object_id) || empty($actual_shop_id) || empty($shops))) {
            Db::getInstance()->execute("DELETE FROM _DB_PREFIX_image_shop WHERE id_image = '" . (int) $object_id . "' AND id_shop IN (" . pInSQL(join(",", $shops)) . ")");
            if (version_compare(_PS_VERSION_, "1.6.1.0", ">=")) {
                $image_actual_shop = Db::getInstance()->getRow("SELECT img_s.id_shop,img_s.id_image,img_s.cover, i.id_product\n            FROM _DB_PREFIX_image_shop img_s\n                INNER JOIN _DB_PREFIX_image i ON (img_s.id_image=i.id_image)\n            WHERE img_s.id_image = '" . (int) $object_id . "' AND img_s.id_shop='" . (int) $actual_shop_id . "'");
                $other_shops = array();
                foreach ($shops as $shop) {
                    if (!empty($image_actual_shop["cover"])) {
                        goto O19d7;
                    }
                    $image_actual_shop["cover"] = "NULL";
                    O19d7:
                    $other_shops[] = "(" . (int) $shop . "," . (int) $image_actual_shop["id_image"] . "," . (int) $image_actual_shop["id_product"] . "," . $image_actual_shop["cover"] . ")";
                }
                goto J81mj;
            }
            $image_actual_shop = Db::getInstance()->getRow("SELECT id_shop,id_image,cover FROM _DB_PREFIX_image_shop WHERE id_image = '" . (int) $object_id . "' AND id_shop='" . (int) $actual_shop_id . "'");
            $other_shops = array();
            foreach ($shops as $shop) {
                $other_shops[] = "(" . (int) $shop . "," . (int) $image_actual_shop["id_image"] . "," . $image_actual_shop["cover"] . ")";
            }
            J81mj:
            if (!count($other_shops)) {
                goto A190c;
            }
            $sql = "INSERT INTO _DB_PREFIX_image_shop (id_shop,id_image" . (version_compare(_PS_VERSION_, "1.6.1.0", ">=") ? ",id_product" : '') . ",cover) VALUES " . join(",", $other_shops);
            Db::getInstance()->Execute($sql);
            A190c:
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    public static function getLastPositionFromCategory($id_category, $id_shop = 1)
    {
        if (version_compare(_PS_VERSION_, "1.5.0.0", "<")) {
            return Category::getLastPosition($id_category);
        }
        return Category::getLastPosition($id_category, $id_shop);
    }
    public static function imageResize($sourceFile, $destFile, $destWidth = null, $destHeight = null, $fileType = "jpg")
    {
        if (version_compare(_PS_VERSION_, "1.5.0.0", "<")) {
            return imageResize($sourceFile, $destFile, $destWidth, $destHeight, $fileType);
        }
        return @ImageManager::resize($sourceFile, $destFile, $destWidth, $destHeight, $fileType);
    }
    public static function updateConfigurationValue($key, $values, $html = false, $id_shop_group = 0, $id_shop = 0)
    {
        if (version_compare(_PS_VERSION_, "1.5.0.0", "<")) {
            return Configuration::updateValue($key, $values, $html);
        }
        return Configuration::updateValue($key, $values, $html, $id_shop_group, $id_shop);
    }
    public static function getConfigurationValue($key, $id_lang = null, $id_shop_group = 0, $id_shop = 0)
    {
        if (version_compare(_PS_VERSION_, "1.5.0.0", "<")) {
            return Configuration::get($key, $id_lang);
        }
        return Configuration::get($key, $id_lang, $id_shop_group, $id_shop);
    }
    public static function getEcotaxTaxRate()
    {
        $return = 100;
        if (!defined("SC_CACHE_ECOTAX_RATE")) {
            if (version_compare(_PS_VERSION_, "1.5.0.0", "<") && (int) SCI::getConfigurationValue("PS_USE_ECOTAX") == 0 || version_compare(_PS_VERSION_, "1.5.0.0", ">=") && (int) SCI::getConfigurationValue("PS_USE_ECOTAX", null, 0, (int) SCI::getSelectedShop()) == 0) {
                $return = 1;
                goto X2BYw;
            }
            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                $address = Address::initialize(null);
                $tax_manager = TaxManagerFactory::getManager($address, (int) Configuration::get("PS_ECOTAX_TAX_RULES_GROUP_ID", null, 0, (int) SCI::getSelectedShop()));
                $tax_calculator = $tax_manager->getTaxCalculator();
                $return = $tax_calculator->getTotalRate() / 100 + 1;
                goto MtCHO;
            }
            $return = Tax::getProductEcotaxRate() / 100 + 1;
            MtCHO:
            X2BYw:
            define("SC_CACHE_ECOTAX_RATE", $return);
            goto f09QH;
        }
        $return = SC_CACHE_ECOTAX_RATE;
        f09QH:
        return $return;
    }
    public static function getSelectedShopActionList($string = false, $id_product = null)
    {
        $list = array();
        if (!empty($_COOKIE["sc_shop_list"])) {
            $list = explode(",", $_COOKIE["sc_shop_list"]);
            goto nGzY0;
        }
        $list = array(SCI::getSelectedShop());
        nGzY0:
        if (empty($id_product)) {
            goto Dct9E;
        }
        $list_temp = array();
        $shops = self::getShopsByProduct($id_product);
        foreach ($shops as $shop_id) {
            if (!sc_in_array($shop_id, $list, "SCISelectShopProduct")) {
                goto B_EyK;
            }
            $list_temp[] = $shop_id;
            B_EyK:
        }
        $list = $list_temp;
        Dct9E:
        $list = $string ? implode(",", $list) : $list;
        return $list;
    }
    public static function getSelectedShop()
    {
        if (SCMS) {
            return isset($_COOKIE["sc_shop_selected"]) ? (int) $_COOKIE["sc_shop_selected"] : 0;
        }
        if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
            return (int) Configuration::get("PS_SHOP_DEFAULT");
        }
        return 0;
    }
    public static function getAllShops()
    {
        $sql = "SELECT s.*\n                FROM _DB_PREFIX_shop s\n                WHERE s.deleted = 0";
        $results = Db::getInstance()->executeS($sql);
        return $results;
    }
    public static function getShopsByProduct($id_product)
    {
        global $cache_shop_by_product;
        $cache = array();
        if (!sc_array_key_exists($id_product, $cache_shop_by_product)) {
            goto M5lZS;
        }
        $cache = $cache_shop_by_product[$id_product];
        M5lZS:
        if (empty($cache)) {
            $list = array();
            $res = Db::getInstance()->executeS("\n                SELECT `id_shop`\n                FROM `_DB_PREFIX_product_shop`\n                WHERE `id_product` = " . (int) $id_product);
            if (!(!empty($res) && count($res) > 0)) {
                goto yqgVQ;
            }
            foreach ($res as $value) {
                $list[] = $value["id_shop"];
            }
            yqgVQ:
            $cache_shop_by_product[$id_product] = $list;
            goto W_G8y;
        }
        $list = $cache;
        W_G8y:
        return $list;
    }
    public static function getShopsByCategory($id_category)
    {
        global $cache_shop_by_category;
        $cache = array();
        if (!(is_array($cache_shop_by_category) && sc_array_key_exists($id_category, $cache_shop_by_category))) {
            goto Ok3Fa;
        }
        $cache = $cache_shop_by_category[$id_category];
        Ok3Fa:
        if (empty($cache)) {
            $list = array();
            $res = Db::getInstance()->executeS("\n                SELECT `id_shop`\n                FROM `_DB_PREFIX_category_shop`\n                WHERE `id_category` = " . (int) $id_category);
            if (!(!empty($res) && count($res) > 0)) {
                goto ufZMD;
            }
            foreach ($res as $value) {
                $list[] = $value["id_shop"];
            }
            ufZMD:
            $cache_shop_by_category[$id_category] = $list;
            goto mqDPi;
        }
        $list = $cache;
        mqDPi:
        return $list;
    }
    public static function qtySumStockAvailable($id_product, $specific_shop_id_list = array())
    {
        if (!empty($specific_shop_id_list)) {
            $shops = $specific_shop_id_list;
            goto pWTfO;
        }
        $shops = self::getShopsByProduct($id_product);
        pWTfO:
        foreach ($shops as $shop_id) {
            $query = new DbQuery();
            $query->select("SUM(quantity)");
            $query->from("stock_available");
            $query->where("id_product = " . (int) $id_product);
            $query->where("id_product_attribute != 0 ");
            $query = StockAvailable::addSqlShopRestriction($query, $shop_id);
            $new_qty = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
            if (!($new_qty !== null)) {
                goto qNWHd;
            }
            SCI::setQuantity($id_product, 0, (int) $new_qty, $shop_id);
            qNWHd:
        }
    }
    public static function getSelectedWarehouse()
    {
        if (SCAS) {
            return isset($_COOKIE["sc_warehouse_selected"]) ? (int) $_COOKIE["sc_warehouse_selected"] : 0;
        }
        return 0;
    }
    public static function getProductRealQuantities($id_product, $id_product_attribute, $ids_warehouse = null, $usable = false, $has_combination = false)
    {
        if (!version_compare(_PS_VERSION_, "1.6.1.0", ">=")) {
            if (is_null($ids_warehouse)) {
                goto YjmuY;
            }
            if (is_array($ids_warehouse)) {
                goto Fqfam;
            }
            $ids_warehouse = array($ids_warehouse);
            Fqfam:
            $ids_warehouse = array_map("intval", $ids_warehouse);
            YjmuY:
            if ($has_combination) {
                goto qnlO9;
            }
            $temp_ids_warehouse = array();
            foreach ($ids_warehouse as $id_warehouse) {
                $temp_check_in_warehouse = WarehouseProductLocation::getIdByProductAndWarehouse((int) $id_product, (int) $id_product_attribute, (int) $id_warehouse);
                if (empty($temp_check_in_warehouse)) {
                    goto W4NHJ;
                }
                $temp_ids_warehouse[] = $id_warehouse;
                W4NHJ:
            }
            $ids_warehouse = $temp_ids_warehouse;
            qnlO9:
            $query = new DbQuery();
            $query->select("od.product_quantity, od.product_quantity_refunded");
            $query->from("order_detail", "od");
            $query->leftjoin("orders", "o", "o.id_order = od.id_order");
            $query->where("od.product_id = " . (int) $id_product);
            if (empty($id_product_attribute)) {
                goto nnhuK;
            }
            $query->where("od.product_attribute_id = " . (int) $id_product_attribute);
            nnhuK:
            $query->leftJoin("order_history", "oh", "oh.id_order = o.id_order AND oh.id_order_history = (SELECT MAX(oh2.id_order_history) FROM _DB_PREFIX_order_history oh2 WHERE oh2.id_order = o.id_order)");
            $query->leftJoin("order_state", "os", "os.id_order_state = oh.id_order_state");
            $query->where("os.shipped != 1");
            $query->where("o.valid = 1 OR (os.id_order_state != " . (int) Configuration::get("PS_OS_ERROR") . "\n                       AND os.id_order_state != " . (int) Configuration::get("PS_OS_CANCELED") . ")");
            $query->groupBy("od.id_order_detail");
            if (!count($ids_warehouse)) {
                goto XrLUg;
            }
            $query->where("od.id_warehouse IN(" . pInSQL(implode(", ", $ids_warehouse)) . ")");
            XrLUg:
            $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
            $client_orders_qty = 0;
            if (!count($res)) {
                goto Lof8Z;
            }
            foreach ($res as $row) {
                $client_orders_qty += $row["product_quantity"] - $row["product_quantity_refunded"];
            }
            Lof8Z:
            $query = new DbQuery();
            $query->select("sod.quantity_expected, sod.quantity_received");
            $query->from("supply_order", "so");
            $query->leftjoin("supply_order_detail", "sod", "sod.id_supply_order = so.id_supply_order");
            $query->leftjoin("supply_order_state", "sos", "sos.id_supply_order_state = so.id_supply_order_state");
            $query->where("sos.pending_receipt = 1");
            $query->where("sod.id_product = " . (int) $id_product . " AND sod.id_product_attribute = " . (int) $id_product_attribute);
            if (!(!is_null($ids_warehouse) && count($ids_warehouse))) {
                goto mGtjt;
            }
            $query->where("so.id_warehouse IN(" . pInSQL(implode(", ", $ids_warehouse) . ")"));
            mGtjt:
            $supply_orders_qties = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
            $supply_orders_qty = 0;
            foreach ($supply_orders_qties as $qty) {
                if (!($qty["quantity_expected"] > $qty["quantity_received"])) {
                    goto UE4dV;
                }
                $supply_orders_qty += $qty["quantity_expected"] - $qty["quantity_received"];
                UE4dV:
            }
            $qty = self::getProductPhysicalQuantities($id_product, $id_product_attribute, $ids_warehouse, $usable, $has_combination);
            return $qty - $client_orders_qty + $supply_orders_qty;
        }
        return Product::getRealQuantity((int) $id_product, (int) $id_product_attribute, $ids_warehouse, (int) SCI::getSelectedShop());
    }
    public static function getProductPhysicalQuantities($id_product, $id_product_attribute, $ids_warehouse = null, $usable = false, $has_combination = false)
    {
        if (!is_null($ids_warehouse)) {
            if (is_array($ids_warehouse)) {
                goto V6MNu;
            }
            $ids_warehouse = array($ids_warehouse);
            V6MNu:
            $ids_warehouse = array_map("intval", $ids_warehouse);
            if (count($ids_warehouse)) {
                goto gLaLL;
            }
            return 0;
        }
        $ids_warehouse = array();
        gLaLL:
        $query = new DbQuery();
        $query->select("SUM(" . ($usable ? "s.usable_quantity" : "s.physical_quantity") . ")");
        $query->from("stock", "s");
        if (!$has_combination) {
            goto IWR2s;
        }
        $query->innerJoin("warehouse_product_location", "wpl", "(wpl.id_product = s.id_product AND wpl.id_product_attribute = s.id_product_attribute" . (count($ids_warehouse) ? " AND wpl.id_warehouse IN(" . pInSQL(implode(", ", $ids_warehouse)) . ")" : '') . ")");
        IWR2s:
        $query->where("s.id_product = " . (int) $id_product);
        if (empty($id_product_attribute)) {
            goto HsyQw;
        }
        $query->where("s.id_product_attribute = " . (int) $id_product_attribute);
        HsyQw:
        if (!count($ids_warehouse)) {
            goto e60xQ;
        }
        $query->where("s.id_warehouse IN(" . pInSQL(implode(", ", $ids_warehouse) . ")"));
        e60xQ:
        if (!$has_combination) {
            goto tpZ24;
        }
        $query->where("s.id_product_attribute != 0");
        tpZ24:
        return (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
    }
    public static function getCustomerCartRules($id_lang, $id_customer, $active = false, $includeGeneric = true, $inStock = false, Cart $cart = null, $free_shipping_only = false, $highlight_only = false)
    {
        if (version_compare(_PS_VERSION_, "1.7.0.0", ">=")) {
            return self::_getCustomerCartRules_17($id_lang, $id_customer, $active, $includeGeneric, $inStock, $cart, $free_shipping_only, $highlight_only);
        }
        if (version_compare(_PS_VERSION_, "1.5.0.1", ">=")) {
            return self::_getCustomerCartRules($id_lang, $id_customer, $active, $includeGeneric, $inStock, $cart);
        }
        return Discount::getCustomerDiscounts($id_lang, $id_customer, $active, $includeGeneric, $inStock);
    }
    public static function _getCustomerCartRules_17($id_lang, $id_customer, $active = false, $includeGeneric = true, $inStock = false, Cart $cart = null, $free_shipping_only = false, $highlight_only = false)
    {
        if (CartRule::isFeatureActive()) {
            $sql_part1 = "* FROM `_DB_PREFIX_cart_rule` cr\n                LEFT JOIN `_DB_PREFIX_cart_rule_lang` crl ON (cr.`id_cart_rule` = crl.`id_cart_rule` AND crl.`id_lang` = " . (int) $id_lang . ")";
            $sql_part2 = " AND cr.date_from < \"" . date("Y-m-d H:i:s") . "\"\n                AND cr.date_to > \"" . date("Y-m-d H:i:s") . "\"\n                " . ($active ? "AND cr.`active` = 1" : '') . "\n                " . ($inStock ? "AND cr.`quantity` > 0" : '');
            if (!$free_shipping_only) {
                goto KF1r_;
            }
            $sql_part2 .= " AND free_shipping = 1 AND carrier_restriction = 1";
            KF1r_:
            if (!$highlight_only) {
                goto w5hMY;
            }
            $sql_part2 .= " AND highlight = 1 AND code NOT LIKE \"" . pSQL(CartRule::BO_ORDER_CODE_PREFIX) . "%\"";
            w5hMY:
            $sql = "(SELECT SQL_NO_CACHE " . $sql_part1 . " WHERE cr.`id_customer` = " . (int) $id_customer . " " . $sql_part2 . ")";
            $sql .= " UNION (SELECT " . $sql_part1 . " WHERE cr.`group_restriction` = 1 " . $sql_part2 . ")";
            if (!($includeGeneric && (int) $id_customer != 0)) {
                goto VhWTF;
            }
            $sql .= " UNION (SELECT " . $sql_part1 . " WHERE cr.`id_customer` = 0 " . $sql_part2 . ")";
            VhWTF:
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);
            if (!empty($result)) {
                $customerGroups = Customer::getGroupsStatic($id_customer);
                foreach ($result as $key => $cart_rule) {
                    if (!$cart_rule["group_restriction"]) {
                        goto PyALt;
                    }
                    $cartRuleGroups = Db::getInstance()->executeS("SELECT id_group FROM _DB_PREFIX_cart_rule_group WHERE id_cart_rule = " . (int) $cart_rule["id_cart_rule"]);
                    foreach ($cartRuleGroups as $cartRuleGroup) {
                        if (!in_array($cartRuleGroup["id_group"], $customerGroups)) {
                        }
                        goto lP2x4;
                    }
                    unset($result[$key]);
                    PyALt:
                    lP2x4:
                }
                foreach ($result as &$cart_rule) {
                    if ($cart_rule["quantity_per_user"]) {
                        $quantity_used = Order::getDiscountsCustomer((int) $id_customer, (int) $cart_rule["id_cart_rule"]);
                        if (!(isset($cart) && isset($cart->id))) {
                            goto ROILG;
                        }
                        $quantity_used += $cart->getDiscountsCustomer((int) $cart_rule["id_cart_rule"]);
                        ROILG:
                        $cart_rule["quantity_for_user"] = $cart_rule["quantity_per_user"] - $quantity_used;
                        goto z2RYf;
                    }
                    $cart_rule["quantity_for_user"] = 0;
                    z2RYf:
                }
                unset($cart_rule);
                foreach ($result as $key => $cart_rule) {
                    if (!$cart_rule["shop_restriction"]) {
                        goto Ia4ju;
                    }
                    $cartRuleShops = Db::getInstance()->executeS("SELECT id_shop FROM _DB_PREFIX_cart_rule_shop WHERE id_cart_rule = " . (int) $cart_rule["id_cart_rule"]);
                    foreach ($cartRuleShops as $cartRuleShop) {
                        if (!(Shop::isFeatureActive() && $cartRuleShop["id_shop"] == (int) SCI::getSelectedShop())) {
                        }
                        goto bwLGF;
                    }
                    unset($result[$key]);
                    Ia4ju:
                    bwLGF:
                }
                if (!(isset($cart) && isset($cart->id))) {
                    goto OuXXH;
                }
                foreach ($result as $key => $cart_rule) {
                    if (!$cart_rule["product_restriction"]) {
                        goto gvOxE;
                    }
                    $cr = new CartRule((int) $cart_rule["id_cart_rule"]);
                    if (version_compare(_PS_VERSION_, "8.0.0", ">=")) {
                        $r = $cr->checkProductRestrictionsFromCart($cart, false, false);
                        goto d4iud;
                    }
                    $r = $cr->checkProductRestrictions(Context::getContext(), false, false);
                    d4iud:
                    if (!($r !== false)) {
                        unset($result[$key]);
                        gvOxE:
                        goto IF2GO;
                    }
                    IF2GO:
                }
                OuXXH:
                $result_bak = $result;
                $result = array();
                $country_restriction = false;
                foreach ($result_bak as $key => $cart_rule) {
                    if ($cart_rule["country_restriction"]) {
                        $country_restriction = true;
                        $countries = Db::getInstance()->ExecuteS("\n                    SELECT `id_country`\n                    FROM `_DB_PREFIX_address`\n                    WHERE `id_customer` = " . (int) $id_customer . "\n                    AND `deleted` = 0");
                        if (!(is_array($countries) && count($countries))) {
                            goto vmfwq;
                        }
                        foreach ($countries as $country) {
                            $id_cart_rule = (bool) Db::getInstance()->getValue("\n                            SELECT crc.id_cart_rule\n                            FROM _DB_PREFIX_cart_rule_country crc\n                            WHERE crc.id_cart_rule = " . (int) $cart_rule["id_cart_rule"] . "\n                            AND crc.id_country = " . (int) $country["id_country"]);
                            if (!$id_cart_rule) {
                            }
                            $result[] = $result_bak[$key];
                            goto H3VIw;
                        }
                        H3VIw:
                        vmfwq:
                        goto y3j0u;
                    }
                    $result[] = $result_bak[$key];
                    y3j0u:
                }
                if ($country_restriction) {
                    goto v550F;
                }
                $result = $result_bak;
                v550F:
                return $result;
            }
            return array();
        }
        return array();
    }
    public static function _getCustomerCartRules($id_lang, $id_customer, $active = false, $includeGeneric = true, $inStock = false, Cart $cart = null)
    {
        if (CartRule::isFeatureActive()) {
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS("\n        SELECT *\n        FROM `_DB_PREFIX_cart_rule` cr\n        LEFT JOIN `_DB_PREFIX_cart_rule_lang` crl ON (cr.`id_cart_rule` = crl.`id_cart_rule` AND crl.`id_lang` = " . (int) $id_lang . ")\n        WHERE (\n            cr.`id_customer` = " . (int) $id_customer . "\n            " . ($includeGeneric ? "OR cr.`id_customer` = 0" : '') . "\n        )\n        " . ($active ? "AND cr.`active` = 1" : '') . "\n        " . ($inStock ? "AND cr.`quantity` > 0" : ''));
            if (!$includeGeneric) {
                goto WilxJ;
            }
            $customerGroups = Customer::getGroupsStatic($id_customer);
            foreach ($result as $key => $cart_rule) {
                if (!$cart_rule["group_restriction"]) {
                    goto wNQ4p;
                }
                $cartRuleGroups = Db::getInstance()->executeS("SELECT id_group FROM _DB_PREFIX_cart_rule_group WHERE id_cart_rule = " . (int) $cart_rule["id_cart_rule"]);
                foreach ($cartRuleGroups as $cartRuleGroup) {
                    if (!in_array($cartRuleGroup["id_group"], $customerGroups)) {
                    }
                    goto Oqda8;
                }
                unset($result[$key]);
                wNQ4p:
                Oqda8:
            }
            WilxJ:
            foreach ($result as $cart_rule) {
                if ($cart_rule["quantity_per_user"]) {
                    $quantity_used = Order::getDiscountsCustomer((int) $id_customer, (int) $cart_rule["id_cart_rule"]);
                    if (!(isset($cart) && isset($cart->id))) {
                        goto d06uE;
                    }
                    $quantity_used += $cart->getDiscountsCustomer((int) $cart_rule["id_cart_rule"]);
                    d06uE:
                    $cart_rule["quantity_for_user"] = $cart_rule["quantity_per_user"] - $quantity_used;
                    goto KBnzn;
                }
                $cart_rule["quantity_for_user"] = 0;
                KBnzn:
            }
            if (!version_compare(_PS_VERSION_, "1.6.0.0", ">=")) {
                goto lLnBU;
            }
            unset($cart_rule);
            foreach ($result as $cart_rule) {
                if (!$cart_rule["shop_restriction"]) {
                    goto y35ta;
                }
                $cartRuleShops = Db::getInstance()->executeS("SELECT id_shop FROM _DB_PREFIX_cart_rule_shop WHERE id_cart_rule = " . (int) $cart_rule["id_cart_rule"]);
                foreach ($cartRuleShops as $cartRuleShop) {
                    if (!(Shop::isFeatureActive() && $cartRuleShop["id_shop"] == (int) SCI::getSelectedShop())) {
                    }
                    goto l6AFh;
                }
                unset($result[$key]);
                y35ta:
                l6AFh:
            }
            lLnBU:
            foreach ($result as $cart_rule) {
                $cart_rule["value"] = 0;
                $cart_rule["minimal"] = $cart_rule["minimum_amount"];
                $cart_rule["cumulable"] = !$cart_rule["cart_rule_restriction"];
                $cart_rule["id_discount_type"] = false;
                if ($cart_rule["free_shipping"]) {
                    $cart_rule["id_discount_type"] = Discount::FREE_SHIPPING;
                    goto CS3Rm;
                }
                if ($cart_rule["reduction_percent"] > 0) {
                    $cart_rule["id_discount_type"] = Discount::PERCENT;
                    $cart_rule["value"] = $cart_rule["reduction_percent"];
                    goto CS3Rm;
                }
                if ($cart_rule["reduction_amount"] > 0) {
                    $cart_rule["id_discount_type"] = Discount::AMOUNT;
                    $cart_rule["value"] = $cart_rule["reduction_amount"];
                    goto ujX2C;
                }
                ujX2C:
                CS3Rm:
            }
            return $result;
        }
        return array();
    }
    public static function days_in_month($month, $year)
    {
        return $month == 2 ? $year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29)) : (($month - 1) % 7 % 2 ? 30 : 31);
    }
    public static function getProductQty($id_product, $id_product_attribute = null, $id_warehouse = null, $id_shop = null)
    {
        $return = 0;
        if (!empty($id_product)) {
            if (!empty($id_product_attribute)) {
                $return = self::_getProductAttributeQty($id_product, $id_product_attribute, $id_warehouse, $id_shop);
                goto mgNBY;
            }
            $return = self::_getProductQty($id_product, $id_product_attribute, $id_warehouse, $id_shop);
            mgNBY:
            return $return;
        }
        return $return;
    }
    public static function _getProductQty($id_product, $id_product_attribute = null, $id_warehouse = null, $id_shop = null)
    {
        $return = 0;
        if (!empty($id_product)) {
            if (!SCMS) {
                goto iwOoI;
            }
            if (!empty($id_shop)) {
                goto Viv6v;
            }
            $id_shop = SCI::getSelectedShop();
            Viv6v:
            iwOoI:
            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                $product = new Product($id_product, false, null, (int) $id_shop);
                goto lUkCs;
            }
            $product = new Product($id_product);
            lUkCs:
            if (!(SCAS && empty($id_warehouse))) {
                goto DFSBF;
            }
            $id_warehouse = (int) SCI::getSelectedWarehouse();
            DFSBF:
            $type_advanced_stock_management = 1;
            $is_advanced_stock_management = false;
            $has_combination = false;
            $not_in_warehouse = true;
            $without_warehouse = true;
            $usable_quantity = 0;
            if (!SCAS) {
                goto im6ni;
            }
            if (!($product->advanced_stock_management == 1)) {
                goto qo89e;
            }
            $is_advanced_stock_management = true;
            $type_advanced_stock_management = 2;
            $temp_check_in_warehouse = WarehouseProductLocation::getIdByProductAndWarehouse((int) $id_product, 0, (int) $id_warehouse);
            if (empty($temp_check_in_warehouse)) {
                goto iDwBQ;
            }
            $not_in_warehouse = false;
            iDwBQ:
            if (StockAvailable::dependsOnStock((int) $id_product, (int) SCI::getSelectedShop())) {
                goto yg0bi;
            }
            $type_advanced_stock_management = 3;
            yg0bi:
            qo89e:
            im6ni:
            if (!$product->hasAttributes()) {
                goto dCOXB;
            }
            $has_combination = true;
            dCOXB:
            if (SCAS && $type_advanced_stock_management == 2 && $has_combination && !$not_in_warehouse) {
                $query = new DbQuery();
                $query->select("SUM(st.usable_quantity) as usable_quantity");
                $query->from("stock", "st");
                $query->where("st.id_product = " . (int) $id_product);
                $query->where("st.id_warehouse = " . (int) $id_warehouse);
                $query->where("st.id_product_attribute != 0");
                $quantities = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query);
                $return = $quantities["usable_quantity"];
                goto OlGFq;
            }
            if (SCAS && $type_advanced_stock_management == 2 && !$has_combination && !$not_in_warehouse) {
                $query = new DbQuery();
                $query->select("SUM(usable_quantity) as usable_quantity");
                $query->from("stock");
                $query->where("id_product = " . (int) $id_product);
                $query->where("id_warehouse = " . (int) $id_warehouse);
                $quantities = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query);
                $return = $quantities["usable_quantity"];
                goto OlGFq;
            }
            if (SCAS && $type_advanced_stock_management == 2 && $not_in_warehouse) {
                $return = 0;
                goto OlGFq;
            }
            if (version_compare(_PS_VERSION_, "1.7.0.0", ">=")) {
                $query = new DbQuery();
                $query->select("quantity");
                $query->from("stock_available");
                $query->where("id_product = " . (int) $id_product);
                $query->where("id_product_attribute = 0");
                if (!SCMS) {
                    goto KksZv;
                }
                $query = StockAvailable::addSqlShopRestriction($query, (int) $id_shop);
                KksZv:
                $return = (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
                goto OlGFq;
            }
            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=") && $has_combination) {
                $query = new DbQuery();
                $query->select("SUM(quantity)");
                $query->from("stock_available");
                $query->where("id_product = " . (int) $id_product);
                $query->where("id_product_attribute != 0");
                if (!SCMS) {
                    goto mYANx;
                }
                $query = StockAvailable::addSqlShopRestriction($query, (int) $id_shop);
                mYANx:
                $return = (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
                goto OlGFq;
            }
            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=") && !$has_combination) {
                $query = new DbQuery();
                $query->select("quantity");
                $query->from("stock_available");
                $query->where("id_product = " . (int) $id_product);
                $query->where("id_product_attribute = 0");
                if (!SCMS) {
                    goto ZGprj;
                }
                $query = StockAvailable::addSqlShopRestriction($query, (int) $id_shop);
                ZGprj:
                $return = (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
                goto OlGFq;
            }
            if (version_compare(_PS_VERSION_, "1.5.0.0", "<") && $has_combination) {
                $sql = "SELECT SUM(quantity) as quantity FROM _DB_PREFIX_product_attribute WHERE id_product = " . (int) $id_product . " AND id_product_attribute != 0";
                $ret = Db::getInstance()->ExecuteS($sql);
                if (empty($ret[0]["quantity"])) {
                    goto ArtLN;
                }
                $return = $ret[0]["quantity"];
                ArtLN:
                goto IV2hZ;
            }
            $return = $product->quantity;
            IV2hZ:
            OlGFq:
            if (!empty($return)) {
                goto hw2Gb;
            }
            $return = 0;
            hw2Gb:
            return $return;
        }
        return $return;
    }
    public static function _getProductAttributeQty($id_product, $id_product_attribute = null, $id_warehouse = null, $id_shop = null)
    {
        $return = 0;
        if (!empty($id_product)) {
            if (!SCMS) {
                goto FGjHe;
            }
            if (!empty($id_shop)) {
                goto zgHXS;
            }
            $id_shop = SCI::getSelectedShop();
            zgHXS:
            FGjHe:
            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                $product = new Product($id_product, false, null, (int) $id_shop);
                goto elbP5;
            }
            $product = new Product($id_product);
            elbP5:
            if (!(SCAS && empty($id_warehouse))) {
                goto Sq6Uf;
            }
            $id_warehouse = (int) SCI::getSelectedWarehouse();
            Sq6Uf:
            $is_advanced_stock_management = false;
            $type_advanced_stock_management = 1;
            $not_in_warehouse = true;
            $without_warehouse = true;
            if (!SCAS) {
                goto SzvO7;
            }
            if (!($product->advanced_stock_management == 1)) {
                goto Wv8qq;
            }
            $is_advanced_stock_management = true;
            $type_advanced_stock_management = 2;
            if (StockAvailable::dependsOnStock((int) $id_product, (int) $id_shop)) {
                goto rV84J;
            }
            $type_advanced_stock_management = 3;
            rV84J:
            Wv8qq:
            $temp_check_in_warehouse = WarehouseProductLocation::getIdByProductAndWarehouse((int) $id_product, (int) $id_product_attribute, (int) $id_warehouse);
            if (empty($temp_check_in_warehouse)) {
                goto euOLK;
            }
            $not_in_warehouse = false;
            $without_warehouse = false;
            euOLK:
            SzvO7:
            if (SCAS && $type_advanced_stock_management == 2 && !$not_in_warehouse) {
                $query = new DbQuery();
                $query->select("SUM(st.usable_quantity) as usable_quantity");
                $query->from("stock", "st");
                $query->where("st.id_product = " . (int) $id_product);
                $query->where("st.id_warehouse = " . (int) $id_warehouse);
                $query->where("st.id_product_attribute = " . (int) $id_product_attribute);
                $quantities = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query);
                $return = $quantities["usable_quantity"];
                goto bxtux;
            }
            if (SCAS && $type_advanced_stock_management == 2 && $not_in_warehouse) {
                $return = 0;
                goto bxtux;
            }
            if ((!SCAS || SCAS && $type_advanced_stock_management == 1) && version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                $query = new DbQuery();
                $query->select("SUM(quantity)");
                $query->from("stock_available");
                $query->where("id_product = " . (int) $id_product);
                $query->where("id_product_attribute = " . (int) $id_product_attribute);
                if (!SCMS) {
                    goto UKZv6;
                }
                $query = StockAvailable::addSqlShopRestriction($query, (int) $id_shop);
                UKZv6:
                $return = (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
                goto TF786;
            }
            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                $query = new DbQuery();
                $query->select("quantity");
                $query->from("stock_available");
                $query->where("id_product = " . (int) $id_product);
                $query->where("id_product_attribute = " . (int) $id_product_attribute);
                if (!SCMS) {
                    goto ND8x6;
                }
                $query = StockAvailable::addSqlShopRestriction($query, (int) $id_shop);
                ND8x6:
                $return = (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
                goto Dep_D;
            }
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS("\n                SELECT quantity\n                FROM `_DB_PREFIX_product_attribute`\n                WHERE id_product_attribute = \"" . (int) $id_product_attribute . "\"");
            $combination = new stdClass();
            if (!empty($result[0]["quantity"]) && is_numeric($result[0]["quantity"])) {
                $combination->quantity = (int) $result[0]["quantity"];
                goto kwTRL;
            }
            $combination->quantity = 0;
            kwTRL:
            $return = $combination->quantity;
            Dep_D:
            TF786:
            bxtux:
            if (!empty($return)) {
                goto Em73m;
            }
            $return = 0;
            Em73m:
            return $return;
        }
        return $return;
    }
    public static function roundPrice($price, $modif_type)
    {
        $return = $price;
        if (!(!empty($price) && !empty($modif_type))) {
            goto P2F76;
        }
        $round_type = _s("CAT_ROUND_PRICE");
        if ($modif_type == "1") {
            if (!($round_type == "1")) {
                goto wBf8x;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            wBf8x:
            if (empty($round_type)) {
                $return = round($return);
                goto q42Po;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto q42Po;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto Nq9aj;
            }
            Nq9aj:
            q42Po:
            goto DH5Eh;
        }
        if ($modif_type == "2") {
            if (!($round_type == "1")) {
                goto I9gwd;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            I9gwd:
            $return *= 10;
            if (empty($round_type)) {
                $return = round($return);
                goto kOrgB;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto kOrgB;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto vJqDi;
            }
            vJqDi:
            kOrgB:
            $return /= 10;
            goto DH5Eh;
        }
        if ($modif_type == "3") {
            if (!($round_type == "1")) {
                goto i_8qN;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            i_8qN:
            $return = str_replace(",", ".", $return * 100);
            if (empty($round_type)) {
                $return = round($return);
                goto FbJU2;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto FbJU2;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto oZP9e;
            }
            oZP9e:
            FbJU2:
            $return /= 100;
            $return = str_replace(",", ".", $return * 10);
            list($unite, $decimal) = explode(".", $return);
            if (empty($round_type)) {
                if ($decimal >= 0 && $decimal <= 2) {
                    $decimal = 0;
                    goto UQ1SI;
                }
                if ($decimal >= 3 && $decimal <= 7) {
                    $decimal = 5;
                    goto UQ1SI;
                }
                if ($decimal >= 8 && $decimal <= 9) {
                    ++$unite;
                    $decimal = 0;
                    goto HpCfS;
                }
                HpCfS:
                UQ1SI:
                goto AXS3r;
            }
            if ($round_type == "1") {
                if ($decimal >= 1 && $decimal <= 5) {
                    $decimal = 5;
                    goto P0cKP;
                }
                if ($decimal >= 6 && $decimal <= 9) {
                    ++$unite;
                    $decimal = 0;
                    goto k1R_B;
                }
                k1R_B:
                P0cKP:
                goto AXS3r;
            }
            if ($round_type == "2") {
                if ($decimal >= 1 && $decimal <= 4) {
                    $decimal = 0;
                    goto WqxMG;
                }
                if ($decimal >= 5 && $decimal <= 9) {
                    $decimal = 5;
                    goto qJxcL;
                }
                qJxcL:
                WqxMG:
                goto Q3oUD;
            }
            Q3oUD:
            AXS3r:
            $return = ($unite . "." . $decimal) * 1 / 10;
            goto DH5Eh;
        }
        if ($modif_type == "4") {
            if (!($round_type == "1")) {
                goto ajSIj;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            ajSIj:
            $return = str_replace(",", ".", $return * 10);
            if (empty($round_type)) {
                $return = round($return);
                goto qKua0;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto qKua0;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto sU2X3;
            }
            sU2X3:
            qKua0:
            $return /= 10;
            $return = str_replace(",", ".", $return);
            list($unite, $decimal) = explode(".", $return);
            if (empty($round_type)) {
                if ($decimal >= 0 && $decimal <= 2) {
                    $decimal = 0;
                    goto zpTVn;
                }
                if ($decimal >= 3 && $decimal <= 7) {
                    $decimal = 5;
                    goto zpTVn;
                }
                if ($decimal >= 8 && $decimal <= 9) {
                    ++$unite;
                    $decimal = 0;
                    goto HKu_P;
                }
                HKu_P:
                zpTVn:
                goto e3m5P;
            }
            if ($round_type == "1") {
                if ($decimal >= 1 && $decimal <= 5) {
                    $decimal = 5;
                    goto lDCQQ;
                }
                if ($decimal >= 6 && $decimal <= 9) {
                    ++$unite;
                    $decimal = 0;
                    goto fwRnU;
                }
                fwRnU:
                lDCQQ:
                goto e3m5P;
            }
            if ($round_type == "2") {
                if ($decimal >= 1 && $decimal <= 4) {
                    $decimal = 0;
                    goto aCP5q;
                }
                if ($decimal >= 5 && $decimal <= 9) {
                    $decimal = 5;
                    goto t18gK;
                }
                t18gK:
                aCP5q:
                goto eB5uH;
            }
            eB5uH:
            e3m5P:
            $return = ($unite . "." . $decimal) * 1;
            goto DH5Eh;
        }
        if ($modif_type == "5") {
            if (!($round_type == "1")) {
                goto hJEBk;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            hJEBk:
            $return = str_replace(",", ".", $return * 100);
            if (empty($round_type)) {
                $return = round($return);
                goto JEO0E;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto JEO0E;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto M31zb;
            }
            M31zb:
            JEO0E:
            $return /= 100;
            list($unite, $decimal) = explode(".", $return);
            if (!(strlen($decimal) == 1)) {
                goto QNah7;
            }
            $decimal .= "0";
            QNah7:
            if (empty($round_type)) {
                if ($decimal >= 50) {
                    $return = $unite + 1;
                    goto jBbv9;
                }
                $return = $unite;
                jBbv9:
                goto cPG_j;
            }
            if ($round_type == "1") {
                if ($decimal > 90) {
                    $return = $unite + 2;
                    goto pIzR0;
                }
                $return = $unite + 1;
                pIzR0:
                goto cPG_j;
            }
            if ($round_type == "2") {
                if ($decimal >= 90) {
                    $return = $unite + 1;
                    goto WEd2f;
                }
                $return = $unite;
                WEd2f:
                goto c3AHC;
            }
            c3AHC:
            cPG_j:
            $return -= 0.1;
            goto DH5Eh;
        }
        if ($modif_type == "6") {
            if (!($round_type == "1")) {
                goto NajfW;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            NajfW:
            $return = str_replace(",", ".", $return * 100);
            if (empty($round_type)) {
                $return = round($return);
                goto u0BHF;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto u0BHF;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto uAnHk;
            }
            uAnHk:
            u0BHF:
            $return /= 100;
            list($unite, $decimal) = explode(".", $return);
            if (!(strlen($decimal) == 1)) {
                goto IW1_S;
            }
            $decimal .= "0";
            IW1_S:
            if (empty($round_type)) {
                if ($decimal >= 50) {
                    $return = $unite + 1;
                    goto IClxU;
                }
                $return = $unite;
                IClxU:
                goto A12st;
            }
            if ($round_type == "1") {
                $return = $unite + 1;
                goto A12st;
            }
            if ($round_type == "2") {
                if ($decimal == 99) {
                    $return = $unite + 1;
                    goto xm9j5;
                }
                $return = $unite;
                xm9j5:
                goto NNzfr;
            }
            NNzfr:
            A12st:
            $return -= 0.01;
            goto DH5Eh;
        }
        if ($modif_type == "7") {
            if (!($round_type == "1")) {
                goto PqT6n;
            }
            $return = str_replace(",", ".", $return * 1000000);
            list($unite, $decimal) = explode(".", $return);
            $return = $unite / 1000000;
            PqT6n:
            $return = str_replace(",", ".", $return * 100);
            if (empty($round_type)) {
                $return = round($return);
                goto gtCVz;
            }
            if ($round_type == "1") {
                $return = ceil($return);
                goto gtCVz;
            }
            if ($round_type == "2") {
                $return = floor($return);
                goto XpOdn;
            }
            XpOdn:
            gtCVz:
            $return /= 100;
            list($unite, $decimal) = explode(".", $return);
            if (!(strlen($decimal) == 1)) {
                goto IYdTv;
            }
            $decimal .= "0";
            IYdTv:
            if (empty($round_type)) {
                if ($decimal >= 0 && $decimal <= 24) {
                    $decimal = 0;
                    goto wg7TM;
                }
                if ($decimal >= 25 && $decimal <= 74) {
                    $decimal = 5;
                    goto wg7TM;
                }
                if ($decimal >= 75 && $decimal <= 99) {
                    ++$unite;
                    $decimal = 0;
                    goto BQ1MP;
                }
                BQ1MP:
                wg7TM:
                goto kHji9;
            }
            if ($round_type == "1") {
                if ($decimal >= 0 && $decimal <= 49) {
                    $decimal = 5;
                    goto UAZAP;
                }
                if ($decimal >= 50 && $decimal <= 99) {
                    ++$unite;
                    $decimal = 0;
                    goto maj_s;
                }
                maj_s:
                UAZAP:
                goto kHji9;
            }
            if ($round_type == "2") {
                if ($decimal >= 0 && $decimal <= 48) {
                    $decimal = 0;
                    goto wiDmj;
                }
                if ($decimal >= 49 && $decimal <= 98) {
                    $decimal = 5;
                    goto wiDmj;
                }
                if ($decimal == 99) {
                    ++$unite;
                    $decimal = 0;
                    goto e84lk;
                }
                e84lk:
                wiDmj:
                goto oo_zP;
            }
            oo_zP:
            kHji9:
            $return = ($unite . "." . $decimal) * 1;
            $return -= 0.01;
            goto DH5Eh;
        }
        if ($modif_type == "8") {
            $unite = 0;
            $decimal = 0;
            $return = str_replace(",", ".", $return);
            list($return, $decimal_part) = explode(".", $return);
            list($other, $chiffre) = explode(".", $return / 10);
            $chiffre = ($chiffre . "." . $decimal_part) * 1;
            if (empty($round_type)) {
                if ($chiffre >= 0 && $chiffre < 5) {
                    $decimal = 0;
                    goto KqLEP;
                }
                if ($chiffre >= 5 && $chiffre <= 9.999999999) {
                    $unite = 1;
                    $decimal = 0;
                    goto xDbd2;
                }
                xDbd2:
                KqLEP:
                goto wo8DW;
            }
            if ($round_type == "1") {
                $unite = 1;
                $decimal = 0;
                goto wo8DW;
            }
            if ($round_type == "2") {
                $decimal = 0;
                goto goL8_;
            }
            goL8_:
            wo8DW:
            $return = ($other + $unite . $decimal) * 1;
            --$return;
            goto DH5Eh;
        }
        if ($modif_type == "9") {
            $unite = 0;
            $decimal = 0;
            if (!($return >= 100)) {
                goto nRNP2;
            }
            $return = str_replace(",", ".", $return);
            list($return, $decimal_part) = explode(".", $return);
            list($other, $chiffre) = explode(".", $return / 100);
            if (!(strlen($chiffre) == 1)) {
                goto p6olx;
            }
            $chiffre .= "0";
            p6olx:
            $chiffre = ($chiffre . "." . $decimal_part) * 1;
            if (empty($round_type)) {
                if ($chiffre >= 0 && $chiffre < 50) {
                    $decimal = 0;
                    goto WPuhe;
                }
                if ($chiffre >= 50 && $chiffre <= 99.999999999) {
                    $unite = 1;
                    $decimal = 0;
                    goto YDY6w;
                }
                YDY6w:
                WPuhe:
                goto sB44q;
            }
            if ($round_type == "1") {
                $unite = 1;
                $decimal = 0;
                goto sB44q;
            }
            if ($round_type == "2") {
                $decimal = 0;
                goto AwD0i;
            }
            AwD0i:
            sB44q:
            $return = ($other + $unite . "00") * 1;
            --$return;
            nRNP2:
            goto DH5Eh;
        }
        if ($modif_type == "10") {
            $decimalReturn = 0;
            $return = str_replace(",", ".", $return);
            list($return, $decimal) = explode(".", $return);
            $realDecimal = substr($decimal, 0, 2);
            if ($round_type == 0) {
                if ($realDecimal > 50 && $realDecimal <= 99) {
                    $decimalReturn = 95;
                    goto JGztf;
                }
                $decimalReturn = 5;
                $decimalReturn = "05";
                JGztf:
                goto EVZCT;
            }
            if ($round_type == 1) {
                if ($realDecimal > 95 && $realDecimal <= 99) {
                    ++$return;
                    $decimalReturn = 5;
                    $decimalReturn = "05";
                    goto eQRmA;
                }
                $decimalReturn = 95;
                eQRmA:
                goto EVZCT;
            }
            if ($round_type == 2) {
                if ($realDecimal < 5 && $realDecimal >= 0) {
                    --$return;
                    $decimalReturn = 95;
                    goto TBra6;
                }
                $decimalReturn = 5;
                $decimalReturn = "05";
                TBra6:
                goto zMnzt;
            }
            zMnzt:
            EVZCT:
            $return = ($return . "." . $decimalReturn) * 1;
            goto TjUgx;
        }
        TjUgx:
        DH5Eh:
        P2F76:
        return $return;
    }
    public static function usesAdvancedStockManagement($id_product, $id_shop = null)
    {
        if (!empty($id_shop)) {
            goto kzYTY;
        }
        $id_shop = SCI::getSelectedShop();
        kzYTY:
        $query = "SELECT product_shop.advanced_stock_management\n        FROM `_DB_PREFIX_product` p\n         INNER JOIN _DB_PREFIX_product_shop product_shop\n                ON (product_shop.id_product = p.id_product AND product_shop.id_shop = " . ($id_shop > 0 ? (int) $id_shop : "p.id_shop_default") . ")\n        WHERE (p.id_product = " . (int) $id_product . ")";
        return (bool) Db::getInstance()->getValue($query);
    }
    public static function SendMail($id_lang, $template, $subject, $template_vars, $to, $to_name = null, $from = null, $from_name = null, $file_attachment = null, $mode_smtp = null, $template_path = _PS_MAIL_DIR_, $die = false, $id_shop = null)
    {
        $theme_path = _PS_THEME_DIR_;
        if (!(is_numeric($id_shop) && $id_shop)) {
            goto XZkVv;
        }
        $shop = new Shop((int) $id_shop);
        if (version_compare(_PS_VERSION_, "8.0.0", ">=")) {
            $theme_name = $shop->theme->getDirectory();
            goto kFzZ_;
        }
        $theme_name = $shop->getTheme();
        kFzZ_:
        if (!($theme_name != _THEME_NAME_)) {
            goto AWPtD;
        }
        $theme_path = "_PS_ROOT_DIR_/themes/" . $theme_name . "/";
        AWPtD:
        XZkVv:
        $configuration = Configuration::getMultiple(array("PS_SHOP_EMAIL", "PS_MAIL_METHOD", "PS_MAIL_SERVER", "PS_MAIL_USER", "PS_MAIL_PASSWD", "PS_SHOP_NAME", "PS_MAIL_SMTP_ENCRYPTION", "PS_MAIL_SMTP_PORT", "PS_MAIL_METHOD", "PS_MAIL_TYPE"), null, null, $id_shop);
        if (isset($configuration["PS_MAIL_SMTP_ENCRYPTION"])) {
            goto MchRr;
        }
        $configuration["PS_MAIL_SMTP_ENCRYPTION"] = "off";
        MchRr:
        if (isset($configuration["PS_MAIL_SMTP_PORT"])) {
            goto KnE24;
        }
        $configuration["PS_MAIL_SMTP_PORT"] = "default";
        KnE24:
        if (!(!isset($from) || !Validate::isEmail($from))) {
            goto AfLaQ;
        }
        $from = $configuration["PS_SHOP_EMAIL"];
        AfLaQ:
        if (Validate::isEmail($from)) {
            goto H4emQ;
        }
        $from = null;
        H4emQ:
        if (!(!isset($from_name) || !Validate::isMailName($from_name))) {
            goto yuYe4;
        }
        $from_name = $configuration["PS_SHOP_NAME"];
        yuYe4:
        if (Validate::isMailName($from_name)) {
            goto RuXIn;
        }
        $from_name = null;
        RuXIn:
        if (!(!is_array($to) && !Validate::isEmail($to))) {
            if (is_array($template_vars)) {
                goto R7y0w;
            }
            $template_vars = array();
            R7y0w:
            if (!(is_string($to_name) && !empty($to_name) && !Validate::isMailName($to_name))) {
                goto Acxw2;
            }
            $to_name = null;
            Acxw2:
            if (Validate::isTplName($template)) {
                if (Validate::isMailSubject($subject)) {
                    if (is_array($to) && isset($to)) {
                        $to_list = new Swift_RecipientList();
                        foreach ($to as $key => $addr) {
                            $to_name = null;
                            $addr = trim($addr);
                            if (Validate::isEmail($addr)) {
                                if (!is_array($to_name)) {
                                    goto GloaJ;
                                }
                                if (!($to_name && is_array($to_name) && Validate::isGenericName($to_name[$key]))) {
                                    goto FgqHo;
                                }
                                $to_name = $to_name[$key];
                                FgqHo:
                                GloaJ:
                                if (!($to_name == null)) {
                                    goto zzP1L;
                                }
                                $to_name = $addr;
                                zzP1L:
                                $to_list->addTo($addr, "=?UTF-8?B?" . base64_encode($to_name) . "?=");
                            }
                            Tools::dieOrLog(Tools::displayError("Error: invalid e-mail address"), $die);
                            return false;
                        }
                        $to_plugin = $to[0];
                        $to = $to_list;
                        goto FP25r;
                    }
                    $to_plugin = $to;
                    if (!($to_name == null)) {
                        goto KLPCD;
                    }
                    $to_name = $to;
                    KLPCD:
                    $to = new Swift_Address($to, "=?UTF-8?B?" . base64_encode($to_name) . "?=");
                    FP25r:
                    try {
                        if ($configuration["PS_MAIL_METHOD"] == 2) {
                            if (!(empty($configuration["PS_MAIL_SERVER"]) || empty($configuration["PS_MAIL_SMTP_PORT"]))) {
                                $connection = new Swift_Connection_SMTP($configuration["PS_MAIL_SERVER"], $configuration["PS_MAIL_SMTP_PORT"], $configuration["PS_MAIL_SMTP_ENCRYPTION"] == "ssl" ? Swift_Connection_SMTP::ENC_SSL : ($configuration["PS_MAIL_SMTP_ENCRYPTION"] == "tls" ? Swift_Connection_SMTP::ENC_TLS : Swift_Connection_SMTP::ENC_OFF));
                                $connection->setTimeout(4);
                                if ($connection) {
                                    if (empty($configuration["PS_MAIL_USER"])) {
                                        goto OMwAn;
                                    }
                                    $connection->setUsername($configuration["PS_MAIL_USER"]);
                                    OMwAn:
                                    if (empty($configuration["PS_MAIL_PASSWD"])) {
                                        goto NbW9B;
                                    }
                                    $connection->setPassword($configuration["PS_MAIL_PASSWD"]);
                                    NbW9B:
                                    goto DDV4O;
                                }
                                return false;
                            }
                            Tools::dieOrLog(Tools::displayError("Error: invalid SMTP server or SMTP port"), $die);
                            return false;
                        }
                        $connection = new Swift_Connection_NativeMail();
                        DDV4O:
                        if ($connection) {
                            $swift = new Swift($connection, Configuration::get("PS_MAIL_DOMAIN"), null, null, $id_shop);
                            $iso = Language::getIsoById((int) $id_lang);
                            if ($iso) {
                                $template = $iso . "/" . $template;
                                $module_name = false;
                                $override_mail = false;
                                if (!(preg_match("#__PS_BASE_URI__modules/#", $template_path) && preg_match("#modules/([a-z0-9_-]+)/#ui", $template_path, $res))) {
                                    goto DKUkZ;
                                }
                                $module_name = $res[1];
                                DKUkZ:
                                if ($module_name !== false && (file_exists($theme_path . "modules/" . $module_name . "/mails/" . $template . ".txt") || file_exists($theme_path . "modules/" . $module_name . "/mails/" . $template . ".html"))) {
                                    $template_path = $theme_path . "modules/" . $module_name . "/mails/";
                                    goto z0qXr;
                                }
                                if (file_exists($theme_path . "mails/" . $template . ".txt") || file_exists($theme_path . "mails/" . $template . ".html")) {
                                    $template_path = $theme_path . "mails/";
                                    $override_mail = true;
                                    goto U0lJU;
                                }
                                if (!file_exists($template_path . $template . ".txt") && ($configuration["PS_MAIL_TYPE"] == Mail::TYPE_BOTH || $configuration["PS_MAIL_TYPE"] == Mail::TYPE_TEXT)) {
                                    Tools::dieOrLog(Tools::displayError("Error - The following e-mail template is missing:") . " " . $template_path . $template . ".txt", $die);
                                    return false;
                                }
                                if (!(!file_exists($template_path . $template . ".html") && ($configuration["PS_MAIL_TYPE"] == Mail::TYPE_BOTH || $configuration["PS_MAIL_TYPE"] == Mail::TYPE_HTML))) {
                                    U0lJU:
                                    z0qXr:
                                    $template_html = file_get_contents($template_path . $template . ".html");
                                    $template_txt = strip_tags(html_entity_decode(file_get_contents($template_path . $template . ".txt"), null, "utf-8"));
                                    if ($override_mail && file_exists($template_path . $iso . "/lang.php")) {
                                        include_once $template_path . $iso . "/lang.php";
                                        goto YP2_O;
                                    }
                                    if ($module_name && file_exists($theme_path . "mails/" . $iso . "/lang.php")) {
                                        include_once $theme_path . "mails/" . $iso . "/lang.php";
                                        goto ufxtE;
                                    }
                                    if (file_exists(_PS_MAIL_DIR_ . $iso . "/lang.php")) {
                                        include_once _PS_MAIL_DIR_ . $iso . "/lang.php";
                                        C_zwg:
                                        ufxtE:
                                        YP2_O:
                                        $message = new Swift_Message("[" . Configuration::get("PS_SHOP_NAME", null, null, $id_shop) . "] " . $subject);
                                        if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                                            $message->setId(SCI::generateId());
                                            goto bge2Q;
                                        }
                                        $message->setId(Mail::generateId());
                                        bge2Q:
                                        $message->headers->setEncoding("Q");
                                        if (!version_compare(_PS_VERSION_, "1.6.0.0", ">=")) {
                                            goto s5wiF;
                                        }
                                        $template_vars = array_map(array("Tools", "htmlentitiesDecodeUTF8"), $template_vars);
                                        $template_vars = array_map(array("Tools", "stripslashes"), $template_vars);
                                        s5wiF:
                                        if (Configuration::get("PS_LOGO_MAIL", null, null, $id_shop) !== false && file_exists(_PS_IMG_DIR_ . Configuration::get("PS_LOGO_MAIL", null, null, $id_shop))) {
                                            $logo = _PS_IMG_DIR_ . Configuration::get("PS_LOGO_MAIL", null, null, $id_shop);
                                            goto dmAhf;
                                        }
                                        if (file_exists(_PS_IMG_DIR_ . Configuration::get("PS_LOGO", null, null, $id_shop))) {
                                            $logo = _PS_IMG_DIR_ . Configuration::get("PS_LOGO", null, null, $id_shop);
                                            goto FyHzB;
                                        }
                                        $template_vars["{shop_logo}"] = '';
                                        FyHzB:
                                        dmAhf:
                                        if (!isset($logo)) {
                                            goto pF9az;
                                        }
                                        $template_vars["{shop_logo}"] = $message->attach(new Swift_Message_EmbeddedFile(new Swift_File($logo), null, ImageManager::getMimeTypeByExtension($logo)));
                                        pF9az:
                                        $template_vars["{shop_name}"] = Tools::safeOutput(Configuration::get("PS_SHOP_NAME", null, null, $id_shop));
                                        $template_vars["{shop_url}"] = Tools::getShopDomain(true, true) . __PS_BASE_URI__ . "index.php";
                                        $template_vars["{my_account_url}"] = Context::getContext()->link->getPageLink("my-account", true, Context::getContext()->language->id);
                                        $template_vars["{guest_tracking_url}"] = Context::getContext()->link->getPageLink("guest-tracking", true, Context::getContext()->language->id);
                                        $template_vars["{history_url}"] = Context::getContext()->link->getPageLink("history", true, Context::getContext()->language->id);
                                        $template_vars["{color}"] = Tools::safeOutput(Configuration::get("PS_MAIL_COLOR", null, null, $id_shop));
                                        $swift->attachPlugin(new Swift_Plugin_Decorator(array($to_plugin => $template_vars)), "decorator");
                                        if (!($configuration["PS_MAIL_TYPE"] == Mail::TYPE_BOTH || $configuration["PS_MAIL_TYPE"] == Mail::TYPE_TEXT)) {
                                            goto RKDtY;
                                        }
                                        $message->attach(new Swift_Message_Part($template_txt, "text/plain", "8bit", "utf-8"));
                                        RKDtY:
                                        if (!($configuration["PS_MAIL_TYPE"] == Mail::TYPE_BOTH || $configuration["PS_MAIL_TYPE"] == Mail::TYPE_HTML)) {
                                            goto FyQAd;
                                        }
                                        $message->attach(new Swift_Message_Part($template_html, "text/html", "8bit", "utf-8"));
                                        FyQAd:
                                        if (!($file_attachment && !empty($file_attachment))) {
                                            goto vYE3K;
                                        }
                                        if (is_array(current($file_attachment))) {
                                            goto p9ITT;
                                        }
                                        $file_attachment = array($file_attachment);
                                        p9ITT:
                                        foreach ($file_attachment as $attachment) {
                                            if (!(isset($attachment["content"]) && isset($attachment["name"]) && isset($attachment["mime"]))) {
                                                goto e3Ah0;
                                            }
                                            $message->attach(new Swift_Message_Attachment($attachment["content"], $attachment["name"], $attachment["mime"]));
                                            e3Ah0:
                                        }
                                        vYE3K:
                                        $send = $swift->send($message, $to, new Swift_Address($from, $from_name));
                                        $swift->disconnect();
                                        return $send;
                                    }
                                    Logger::addLog(Tools::displayError("Error - The lang file is missing for :") . " " . $iso, 3);
                                    return false;
                                }
                                Tools::dieOrLog(Tools::displayError("Error - The following e-mail template is missing:") . " " . $template_path . $template . ".html", $die);
                                return false;
                            }
                            Tools::dieOrLog(Tools::displayError("Error - No ISO code for email"), $die);
                            return false;
                        }
                        return false;
                    } catch (Swift_Exception $e) {
                        return false;
                    }
                    // [PHPDeobfuscator] Implied return
                    return;
                }
                Tools::dieOrLog(Tools::displayError("Error: invalid e-mail subject"), $die);
                return false;
            }
            Tools::dieOrLog(Tools::displayError("Error: invalid e-mail template"), $die);
            return false;
        }
        Tools::dieOrLog(Tools::displayError("Error: parameter \"to\" is corrupted"), $die);
        return false;
    }
    public static function generateId($idstring = null)
    {
        $midparams = array("utctime" => gmstrftime("%Y%m%d%H%M%S"), "randint" => mt_rand(), "customstr" => preg_match("/^(?<!\\.)[a-z0-9\\.]+(?!\\.)\$/iD", $idstring) ? $idstring : "swift", "hostname" => isset($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : php_uname("n"));
        return vsprintf("<%s.%d.%s@%s>", $midparams);
    }
    public static function getGridFields($type)
    {
        global $colSettings, $cols;
        if (isset($colSettings)) {
            goto Zmv4Y;
        }
        $colSettings = array();
        Zmv4Y:
        if (!empty($type) && $type == "product") {
            global $arrManufacturers, $arrSuppliers, $arrTax, $arrMsgAvailableNow, $arrMsgAvailableLater, $arrReductionPrice, $arrReductionPercent, $arrColorGroups;
            include "SC_DIRlib/cat/cat_product_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "combination") {
            global $arrMsgAvailableLater;
            include "SC_DIRlib/cat/combination/cat_combination_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "combinationmultiproduct") {
            global $arrMsgAvailableLater;
            include "SC_DIRlib/cat/combinationmultiproduct/cat_combinationmultiproduct_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "customer") {
            global $arrGroupes, $arrStates, $arrCountrys, $arrGenders, $language_arr;
            include "SC_DIRlib/cus/cus_customer_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "order") {
            global $view, $arrPayments, $arrStatus, $orderCountry, $orderState, $arrCarrier;
            include "SC_DIRlib/ord/ord_order_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "order_product") {
            global $view, $arrPayments, $arrStatus, $orderCountry, $orderState, $arrCarrier;
            include "SC_DIRlib/ord/product/ord_product_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "cms") {
            global $view;
            include "SC_DIRlib/cms/cms_page_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "manufacturer") {
            global $view;
            include "SC_DIRlib/man/man_manufacturer_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "supplier") {
            global $view;
            include "SC_DIRlib/sup/sup_supplier_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "productsort") {
            include "SC_DIRlib/cat/productsort/cat_productsort_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "msproduct") {
            global $shops, $arrTax;
            include "SC_DIRlib/cat/msproduct/cat_msproduct_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "mscombination") {
            global $shops, $arrTax;
            include "SC_DIRlib/cat/mscombination/cat_mscombination_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "image") {
            global $shops;
            include "SC_DIRlib/cat/image/cat_image_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "propspeprice") {
            global $shops, $group_shops, $groups, $countries, $currencies;
            include "SC_DIRlib/cat/specificprice/cat_specificprice_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "propcustomers") {
            global $shops, $group_shops, $groups, $countries, $currencies;
            include "SC_DIRlib/cat/customerbyproduct/cat_customerbyproduct_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "winspeprice") {
            global $shops, $group_shops, $groups, $countries, $currencies;
            include "SC_DIRlib/cat/win-specificprice/cat_win-specificprice_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "proppackproduct") {
            include "SC_DIRlib/cat/pack/cat_pack_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "propsupplier") {
            global $currencies;
            include "SC_DIRlib/cat/supplier/cat_supplier_data_fields.php";
            goto ZM9Jx;
        }
        if (!empty($type) && $type == "gmapartner") {
            global $langOption;
            include "SC_DIRlib/all/win-affiliation/manager/all_win-affiliation_manager_partner_data_fields.php";
            goto gC_i1;
        }
        gC_i1:
        ZM9Jx:
        return $colSettings;
    }
    public static function getGridViews($type)
    {
        global $grids;
        if (isset($grids)) {
            goto phZ1Y;
        }
        $grids = array();
        phZ1Y:
        if (!empty($type) && $type == "product") {
            include "SC_DIRlib/cat/cat_product_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "combination") {
            global $sc_active;
            include "SC_DIRlib/cat/combination/cat_combination_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "combinationmultiproduct") {
            global $sc_active;
            include "SC_DIRlib/cat/combinationmultiproduct/cat_combinationmultiproduct_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "customer") {
            include "SC_DIRlib/cus/cus_customer_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "order") {
            include "SC_DIRlib/ord/ord_order_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "order_product") {
            include "SC_DIRlib/ord/product/ord_product_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "cms") {
            include "SC_DIRlib/cms/cms_page_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "manufacturer") {
            include "SC_DIRlib/man/man_manufacturer_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "supplier") {
            include "SC_DIRlib/sup/sup_supplier_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "productsort") {
            include "SC_DIRlib/cat/productsort/cat_productsort_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "msproduct") {
            include "SC_DIRlib/cat/msproduct/cat_msproduct_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "mscombination") {
            include "SC_DIRlib/cat/mscombination/cat_mscombination_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "image") {
            include "SC_DIRlib/cat/image/cat_image_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "propspeprice") {
            include "SC_DIRlib/cat/specificprice/cat_specificprice_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "propcustomers") {
            include "SC_DIRlib/cat/customerbyproduct/cat_customerbyproduct_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "winspeprice") {
            include "SC_DIRlib/cat/win-specificprice/cat_win-specificprice_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "proppackproduct") {
            include "SC_DIRlib/cat/pack/cat_pack_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "propsupplier") {
            global $multiple, $has_combi;
            include "SC_DIRlib/cat/supplier/cat_supplier_data_views.php";
            goto GzUrE;
        }
        if (!empty($type) && $type == "gmapartner") {
            include "SC_DIRlib/all/win-affiliation/manager/all_win-affiliation_manager_partner_data_views.php";
            goto SggBw;
        }
        SggBw:
        GzUrE:
        return $grids;
    }
    public static function synchronizeArrayOfProducts($arrayOfIDProducts, $order_id_shop = null)
    {
        if (!(!is_array($arrayOfIDProducts) || count($arrayOfIDProducts) == 0)) {
            foreach ($arrayOfIDProducts as $id_product) {
                SCI::synchronize($id_product, $order_id_shop);
            }
            // [PHPDeobfuscator] Implied return
            return;
        }
        return false;
    }
    public static function synchronize($id_product, $order_id_shop = null)
    {
        if (Validate::isUnsignedId($id_product)) {
            $ids_warehouse = Warehouse::getWarehousesGroupedByShops();
            if (!($order_id_shop !== null)) {
                goto wehnb;
            }
            $order_warehouses = array();
            $wh = Warehouse::getWarehouses(false, (int) $order_id_shop);
            foreach ($wh as $warehouse) {
                $order_warehouses[] = $warehouse["id_warehouse"];
            }
            wehnb:
            $ids_product_attribute = array();
            foreach (Product::getProductAttributesIds($id_product) as $id_product_attribute) {
                $ids_product_attribute[] = $id_product_attribute["id_product_attribute"];
            }
            $out_of_stock = StockAvailable::outOfStock($id_product);
            $manager = StockManagerFactory::getManager();
            foreach ($ids_warehouse as $id_shop => $warehouses) {
                $has_sa = Db::getInstance()->executeS("SELECT depends_on_stock FROM _DB_PREFIX_stock_available\n                                                                                            WHERE id_product = " . (int) $id_product . " AND id_product_attribute = 0" . " AND id_shop = " . (int) $id_shop);
                if (!(count($has_sa) == 0 || $has_sa[0]["depends_on_stock"] == 1)) {
                    goto QT4RN;
                }
                $product_quantity = 0;
                if (empty($ids_product_attribute)) {
                    $allowed_warehouse_for_product = WareHouse::getProductWarehouseList((int) $id_product, 0, (int) $id_shop);
                    $allowed_warehouse_for_product_clean = array();
                    foreach ($allowed_warehouse_for_product as $warehouse) {
                        $allowed_warehouse_for_product_clean[] = (int) $warehouse["id_warehouse"];
                    }
                    $allowed_warehouse_for_product_clean = array_intersect($allowed_warehouse_for_product_clean, $warehouses);
                    if (!($order_id_shop != null && !count(array_intersect($allowed_warehouse_for_product_clean, $order_warehouses)))) {
                        $product_quantity = $manager->getProductRealQuantities($id_product, null, $allowed_warehouse_for_product_clean, true);
                        $query = new DbQuery();
                        $query->select("COUNT(*)");
                        $query->from("stock_available");
                        $query->where("id_product = " . (int) $id_product . " AND id_product_attribute = 0" . " AND id_shop = " . (int) $id_shop);
                        if ((int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query)) {
                            $query = array("table" => "stock_available", "data" => array("quantity" => $product_quantity), "where" => "id_product = " . (int) $id_product . " AND id_product_attribute = 0" . StockAvailable::addSqlShopRestriction(null, $id_shop));
                            Db::getInstance()->update($query["table"], $query["data"], $query["where"]);
                            goto Ka8Lv;
                        }
                        $query = array("table" => "stock_available", "data" => array("quantity" => $product_quantity, "depends_on_stock" => 1, "out_of_stock" => $out_of_stock, "id_product" => (int) $id_product, "id_product_attribute" => 0, "id_shop" => (int) $id_shop, "id_shop_group" => 0));
                        Db::getInstance()->insert($query["table"], $query["data"]);
                        Ka8Lv:
                        goto pAC1_;
                    }
                    goto Hml7b;
                }
                foreach ($ids_product_attribute as $id_product_attribute) {
                    $allowed_warehouse_for_combination = WareHouse::getProductWarehouseList((int) $id_product, (int) $id_product_attribute, (int) $id_shop);
                    $allowed_warehouse_for_combination_clean = array();
                    foreach ($allowed_warehouse_for_combination as $warehouse) {
                        $allowed_warehouse_for_combination_clean[] = (int) $warehouse["id_warehouse"];
                    }
                    $allowed_warehouse_for_combination_clean = array_intersect($allowed_warehouse_for_combination_clean, $warehouses);
                    if (!($order_id_shop != null && !count(array_intersect($allowed_warehouse_for_combination_clean, $order_warehouses)))) {
                        $quantity = $manager->getProductRealQuantities($id_product, $id_product_attribute, $allowed_warehouse_for_combination_clean, true);
                        $query = new DbQuery();
                        $query->select("COUNT(*)");
                        $query->from("stock_available");
                        $query->where("id_product = " . (int) $id_product . " AND id_product_attribute = " . (int) $id_product_attribute . StockAvailable::addSqlShopRestriction(null, $id_shop));
                        if ((int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query)) {
                            $query = array("table" => "stock_available", "data" => array("quantity" => $quantity), "where" => "id_product = " . (int) $id_product . " AND id_product_attribute = " . (int) $id_product_attribute . StockAvailable::addSqlShopRestriction(null, $id_shop));
                            Db::getInstance()->update($query["table"], $query["data"], $query["where"]);
                            goto EW3kN;
                        }
                        $query = array("table" => "stock_available", "data" => array("quantity" => $quantity, "depends_on_stock" => 1, "out_of_stock" => $out_of_stock, "id_product" => (int) $id_product, "id_product_attribute" => (int) $id_product_attribute, "id_shop" => (int) $id_shop, "id_shop_group" => 0));
                        Db::getInstance()->insert($query["table"], $query["data"]);
                        EW3kN:
                        $product_quantity += $quantity;
                        goto Ogz5O;
                    }
                    Ogz5O:
                }
                $query = array("table" => "stock_available", "data" => array("quantity" => $product_quantity), "where" => "id_product = " . (int) $id_product . " AND id_product_attribute = 0" . StockAvailable::addSqlShopRestriction(null, $id_shop));
                Db::getInstance()->update($query["table"], $query["data"], $query["where"]);
                pAC1_:
                QT4RN:
                Hml7b:
            }
            if (!(count($ids_warehouse) == 0 && StockAvailable::dependsOnStock((int) $id_product))) {
                goto GCquS;
            }
            Db::getInstance()->update("stock_available", array("quantity" => 0), "id_product = " . (int) $id_product);
            GCquS:
            if (!version_compare(_PS_VERSION_, "1.6.0.0", ">=")) {
                goto sEJ3x;
            }
            Cache::clean("StockAvailable::getQuantityAvailableByProduct_" . (int) $id_product . "*");
            sEJ3x:
            // [PHPDeobfuscator] Implied return
            return;
        }
        return false;
    }
    public static function updateQuantity($id_product, $id_product_attribute, $delta_quantity, $id_shop = null)
    {
        if (version_compare(_PS_VERSION_, "1.6.0.0", "<")) {
            return StockAvailable::updateQuantity($id_product, $id_product_attribute, $delta_quantity, $id_shop);
        }
        if (Validate::isUnsignedId($id_product)) {
            $id_stock_available = StockAvailable::getStockAvailableIdByProductId($id_product, $id_product_attribute, $id_shop);
            if ($id_stock_available) {
                if (!Pack::isPack($id_product)) {
                    goto YR70A;
                }
                $products_pack = Pack::getItems($id_product, (int) Configuration::get("PS_LANG_DEFAULT"));
                foreach ($products_pack as $product_pack) {
                    $pack_id_product_attribute = Product::getDefaultAttribute($product_pack->id, 1);
                    SCI::updateQuantity($product_pack->id, $pack_id_product_attribute, $product_pack->pack_quantity * $delta_quantity, $id_shop);
                }
                YR70A:
                $stock_available = new StockAvailable($id_stock_available);
                $stock_available->quantity += $delta_quantity;
                $stock_available->update();
                if (!version_compare(_PS_VERSION_, "1.7.5.0", ">=")) {
                    goto EeWWP;
                }
                Db::getInstance()->execute("UPDATE _DB_PREFIX_stock_available\n                                                    SET physical_quantity = (quantity+reserved_quantity)\n                                                    WHERE id_product = " . (int) $id_product . "\n                                                    AND id_product_attribute = " . (int) $id_product_attribute . "\n                                                    AND id_shop  = " . (int) $stock_available->id_shop . "\n                                                    AND id_shop_group  = " . (int) $stock_available->id_shop_group);
                EeWWP:
                Hook::exec("actionUpdateQuantity", array("id_product" => $id_product, "id_product_attribute" => $id_product_attribute, "quantity" => $stock_available->quantity));
                Cache::clean("StockAvailable::getQuantityAvailableByProduct_" . (int) $id_product . "*");
                return true;
            }
            return false;
        }
        return false;
    }
    public static function setQuantity($id_product, $id_product_attribute, $quantity, $id_shop = null)
    {
        if (Validate::isUnsignedId($id_product)) {
            $context = Context::getContext();
            if (!($id_shop === null && Shop::getContext() != Shop::CONTEXT_GROUP)) {
                goto dcaNz;
            }
            $id_shop = (int) $context->shop->id;
            dcaNz:
            $depends_on_stock = false;
            if (!version_compare(_PS_VERSION_, "1.7.8.0", "<")) {
                goto CYU3u;
            }
            $depends_on_stock = StockAvailable::dependsOnStock($id_product, (int) $id_shop);
            CYU3u:
            if ($depends_on_stock) {
                goto I72F2;
            }
            $id_stock_available = (int) StockAvailable::getStockAvailableIdByProductId($id_product, $id_product_attribute, $id_shop);
            if ($id_stock_available) {
                $stock_available = new StockAvailable($id_stock_available);
                $stock_available->quantity = (int) $quantity;
                $stock_available->update();
                goto GG57d;
            }
            $out_of_stock = StockAvailable::outOfStock($id_product, $id_shop);
            $stock_available = new StockAvailable();
            $stock_available->out_of_stock = (int) $out_of_stock;
            $stock_available->id_product = (int) $id_product;
            $stock_available->id_product_attribute = (int) $id_product_attribute;
            $stock_available->quantity = (int) $quantity;
            if ($id_shop === null) {
                $shop_group = Shop::getContextShopGroup();
                goto n0XWq;
            }
            $shop_group = new ShopGroup((int) Shop::getGroupFromShop((int) $id_shop));
            n0XWq:
            if ($shop_group->share_stock) {
                $stock_available->id_shop = 0;
                $stock_available->id_shop_group = (int) $shop_group->id;
                goto XTwik;
            }
            $stock_available->id_shop = (int) $id_shop;
            $stock_available->id_shop_group = 0;
            XTwik:
            $stock_available->add();
            GG57d:
            if (!version_compare(_PS_VERSION_, "1.7.5.0", ">=")) {
                goto rvyHy;
            }
            Db::getInstance()->execute("UPDATE _DB_PREFIX_stock_available\n                                                    SET physical_quantity = (quantity+reserved_quantity)\n                                                    WHERE id_product = " . (int) $id_product . "\n                                                    AND id_product_attribute = " . (int) $id_product_attribute . "\n                                                    AND id_shop  = " . (int) $stock_available->id_shop . "\n                                                    AND id_shop_group  = " . (int) $stock_available->id_shop_group);
            rvyHy:
            Hook::exec("actionUpdateQuantity", array("id_product" => $id_product, "id_product_attribute" => $id_product_attribute, "quantity" => $stock_available->quantity));
            I72F2:
            // [PHPDeobfuscator] Implied return
            return;
        }
        return false;
    }
    public static function deleteCombinationStock($id_product_attribute, $id_product = null)
    {
        if (empty($id_product_attribute)) {
            goto Isb4A;
        }
        $sql = "DELETE FROM _DB_PREFIX_warehouse_product_location WHERE id_product_attribute=" . (int) $id_product_attribute;
        Db::getInstance()->Execute($sql);
        $sql = "SELECT id_stock FROM _DB_PREFIX_stock WHERE id_product_attribute=" . (int) $id_product_attribute;
        $rows = Db::getInstance()->ExecuteS($sql);
        foreach ($rows as $row) {
            $sql = "DELETE FROM _DB_PREFIX_stock_mvt WHERE id_stock=" . (int) $row["id_stock"];
            Db::getInstance()->Execute($sql);
        }
        $sql = "DELETE FROM _DB_PREFIX_stock WHERE id_product_attribute=" . (int) $id_product_attribute;
        Db::getInstance()->Execute($sql);
        Isb4A:
    }
    public static function getIdPdtFromCombi($id_product)
    {
        $return = 0;
        if (empty($id_product)) {
            return 0;
        }
        $query = new DbQuery();
        $query->select("pa.id_product");
        $query->from("product_attribute", "pa");
        $query->where("pa.id_product = " . (int) $id_product);
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
    }
    public static function getPrice($id_prd, $id_prd_attr = null, $id_shop = 1, $with_reduc = false)
    {
        global $cache_tax;
        $actual_prices = array("price_wt" => 0, "price_it" => 0, "price_reduction_wt" => 0, "price_reduction_it" => 0);
        if (!empty($tax[$id_shop])) {
            goto EMCJb;
        }
        if (version_compare(_PS_VERSION_, "1.6.0.10", ">=")) {
            $inner = '';
            if (!SCMS) {
                goto cVmJg;
            }
            $inner = " INNER JOIN _DB_PREFIX_tax_rules_group_shop trgs ON (trgs.id_tax_rules_group = trg.id_tax_rules_group AND trgs.id_shop = '" . (int) $id_shop . "')";
            cVmJg:
            $sql = "SELECT trg.name, trg.id_tax_rules_group,t.rate, trg.deleted\n                            FROM `_DB_PREFIX_tax_rules_group` trg\n                            LEFT JOIN `_DB_PREFIX_tax_rule` tr ON (trg.`id_tax_rules_group` = tr.`id_tax_rules_group` AND tr.`id_country` = " . (int) SCI::getDefaultCountryId() . " AND tr.`id_state` = 0)\n                                LEFT JOIN `" . _DB_PREFIX_ . "tax` t ON (t.`id_tax` = tr.`id_tax`)\n                            " . $inner . "\n                            WHERE trg.active=1\n                            ORDER BY trg.deleted ASC, trg.name ASC";
            $res = Db::getInstance()->ExecuteS($sql);
            foreach ($res as $row) {
                if (!($row["name"] == '')) {
                    goto eeSz3;
                }
                $row["name"] = " ";
                eeSz3:
                if (!($row["deleted"] == "1")) {
                    goto c8S31;
                }
                $row["name"] .= " " . _l("(deleted)");
                c8S31:
                $cache_tax[$id_shop][$row["id_tax_rules_group"]] = $row["rate"];
            }
            goto uEyZC;
        }
        $inner = '';
        if (!(version_compare(_PS_VERSION_, "1.6.0.0", ">=") && SCMS)) {
            goto sPmWW;
        }
        $inner = " INNER JOIN _DB_PREFIX_tax_rules_group_shop trgs ON (trgs.id_tax_rules_group = trg.id_tax_rules_group AND trgs.id_shop = '" . (int) $id_shop . "')";
        sPmWW:
        $sql = "SELECT trg.name, trg.id_tax_rules_group,t.rate\n                            FROM `_DB_PREFIX_tax_rules_group` trg\n                            LEFT JOIN `_DB_PREFIX_tax_rule` tr ON (trg.`id_tax_rules_group` = tr.`id_tax_rules_group` AND tr.`id_country` = " . (int) SCI::getDefaultCountryId() . " AND tr.`id_state` = 0)\n                                LEFT JOIN `" . _DB_PREFIX_ . "tax` t ON (t.`id_tax` = tr.`id_tax`)\n                            " . $inner . "\n                            WHERE trg.active=1";
        $res = Db::getInstance()->ExecuteS($sql);
        foreach ($res as $row) {
            if (!($row["name"] == '')) {
                goto G7_ch;
            }
            $row["name"] = " ";
            G7_ch:
            $cache_tax[$id_shop][$row["id_tax_rules_group"]] = $row["rate"];
        }
        uEyZC:
        EMCJb:
        if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
            $sql = " SELECT price,id_tax_rules_group,ecotax FROM _DB_PREFIX_product_shop WHERE id_product='" . (int) $id_prd . "' AND id_shop='" . (int) $id_shop . "' ";
            $prodrow = Db::getInstance()->getRow($sql);
            $prodrow["id_tax"] = $prodrow["id_tax_rules_group"];
            $taxrate = $cache_tax[$id_shop][(int) $prodrow["id_tax"]];
            $actual_prices["price_wt"] = $prodrow["price"];
            $ecotax = _s("CAT_PROD_ECOTAXINCLUDED") ? $prodrow["ecotax"] * SCI::getEcotaxTaxRate() : 0;
            $actual_prices["price_it"] = $prodrow["price"] * ($taxrate / 100 + 1) + $ecotax;
            if (empty($id_prd_attr)) {
                goto SrqBv;
            }
            $sql = " SELECT price,ecotax FROM _DB_PREFIX_product_attribute_shop WHERE id_product_attribute='" . (int) $id_prd_attr . "' AND id_shop='" . (int) $id_shop . "' ";
            $attrrow = Db::getInstance()->getRow($sql);
            $actual_prices["price_wt"] += $attrrow["price"];
            $ecotax = _s("CAT_PROD_ECOTAXINCLUDED") ? $attrrow["ecotax"] * SCI::getEcotaxTaxRate() : 0;
            if (!empty($taxrate)) {
                $actual_prices["price_it"] = $attrrow["price"] * ($taxrate / 100 + 1) + $prodrow["price"] * ($taxrate / 100 + 1) + $ecotax;
                goto zCaHY;
            }
            $actual_prices["price_it"] = $attrrow["price"] + $prodrow["price"] + $ecotax;
            zCaHY:
            SrqBv:
            $actual_prices["price_reduction_wt"] = $actual_prices["price_wt"];
            $actual_prices["price_reduction_it"] = $actual_prices["price_it"];
            goto diEN_;
        }
        $sql = " SELECT price,id_tax_rules_group,ecotax FROM _DB_PREFIX_product WHERE id_product='" . (int) $id_prd . "' ";
        $prodrow = Db::getInstance()->getRow($sql);
        $prodrow["id_tax"] = $prodrow["id_tax_rules_group"];
        $taxrate = $cache_tax[$id_shop][(int) $prodrow["id_tax"]];
        $actual_prices["price_wt"] = $prodrow["price"];
        $ecotax = _s("CAT_PROD_ECOTAXINCLUDED") ? $prodrow["ecotax"] * SCI::getEcotaxTaxRate() : 0;
        $actual_prices["price_it"] = $prodrow["price"] * ($taxrate / 100 + 1) + $ecotax;
        if (empty($id_prd_attr)) {
            goto ffC4_;
        }
        $sql = " SELECT price,ecotax FROM _DB_PREFIX_product_attribute WHERE id_product_attribute='" . (int) $id_prd_attr . "' ";
        $attrrow = Db::getInstance()->getRow($sql);
        $actual_prices["price_wt"] += $attrrow["price"];
        $ecotax = _s("CAT_PROD_ECOTAXINCLUDED") ? $attrrow["ecotax"] * SCI::getEcotaxTaxRate() : 0;
        if (!empty($taxrate)) {
            $actual_prices["price_it"] = $attrrow["price"] * ($taxrate / 100 + 1) + $prodrow["price"] * ($taxrate / 100 + 1) + $ecotax;
            goto gIIEs;
        }
        $actual_prices["price_it"] = $attrrow["price"] + $prodrow["price"] + $ecotax;
        gIIEs:
        ffC4_:
        $actual_prices["price_reduction_wt"] = $actual_prices["price_wt"];
        $actual_prices["price_reduction_it"] = $actual_prices["price_it"];
        diEN_:
        if (!$with_reduc) {
            goto EcLR6;
        }
        $sql_specific_price = "SELECT *\n                                    FROM `_DB_PREFIX_specific_price`\n                                    WHERE id_product = '" . $id_prd . "'\n                                         AND (`from` <= '" . date("Y-m-d H:i:s") . "' OR `from`='0000-00-00 00:00:00')\n                                         AND (`to` >= '" . date("Y-m-d H:i:s") . "' OR `to`='0000-00-00 00:00:00')\n                                         " . (SCMS ? " AND ( id_shop = '" . (int) $id_shop . "' OR id_shop = '0' ) " : '') . "\n                                         " . (version_compare(_PS_VERSION_, "1.5.0.0", ">=") ? "AND (id_product_attribute = 0 " . (!empty($id_prd_attr) ? " OR id_product_attribute = " . $id_prd_attr . ")" : ")") : '') . "\n                                     ORDER BY `id_shop` DESC,`to` DESC, id_specific_price ASC\n                                     LIMIT 1";
        $res_specific_price = Db::getInstance()->executeS($sql_specific_price);
        if (empty($res_specific_price[0]["id_specific_price"])) {
            goto gJhSb;
        }
        $res_specific_price = $res_specific_price[0];
        if ($res_specific_price["reduction_type"] == "percentage") {
            $prodrow["reduction_percent"] = $res_specific_price["reduction"] * 100;
            $prodrow["reduction_price"] = 0;
            goto vpgaM;
        }
        $prodrow["reduction_percent"] = 0;
        $prodrow["reduction_price"] = $res_specific_price["reduction"];
        vpgaM:
        if (!($prodrow["reduction_price"] > 0)) {
            goto Cv5J6;
        }
        $actual_prices["price_reduction_wt"] = $actual_prices["price_wt"] - $prodrow["reduction_price"] / ($taxrate / 100 + 1);
        $actual_prices["price_reduction_it"] = $actual_prices["price_it"] - $prodrow["reduction_price"];
        Cv5J6:
        if (!($prodrow["reduction_percent"] > 0)) {
            goto ZPcg1;
        }
        if (!empty($id_prd_attr)) {
            $actual_prices["price_reduction_wt"] = ($attrrow["price"] + $prodrow["price"]) * (1 - $res_specific_price["reduction"]);
            if (!empty($taxrate)) {
                $actual_prices["price_reduction_it"] = ($attrrow["price"] * ($taxrate / 100 + 1) + $prodrow["price"] * ($taxrate / 100 + 1)) * (1 - $res_specific_price["reduction"]) + $ecotax;
                goto epC_A;
            }
            $actual_prices["price_reduction_it"] = ($attrrow["price"] + $prodrow["price"]) * (1 - $res_specific_price["reduction"]) + $ecotax;
            epC_A:
            goto X5PzG;
        }
        $actual_prices["price_reduction_wt"] = $prodrow["price"] * (1 - $res_specific_price["reduction"]);
        $actual_prices["price_reduction_it"] = $prodrow["price"] * ($taxrate / 100 + 1) * (1 - $res_specific_price["reduction"]) + $ecotax;
        X5PzG:
        ZPcg1:
        gJhSb:
        EcLR6:
        return $actual_prices;
    }
    public static function getBrightness($hex)
    {
        $hex = str_replace("#", '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        return ($r * 299 + $g * 587 + $b * 114) / 1000;
    }
    public static function translateSubjectMail($subject, $id_lang)
    {
        if (!empty($id_lang)) {
            if (!version_compare(_PS_VERSION_, "1.7.0.0", ">=")) {
                return Mail::l($subject, (int) $id_lang);
            }
            $orderLanguage = new Language((int) $id_lang);
            $translator = Context::getContext()->getTranslator();
            return $translator->trans($subject, array(), "Emails.Subject", $orderLanguage->locale);
        }
        return $subject;
    }
    public static function moduleIsInstalled($module_name)
    {
        if (version_compare(_PS_VERSION_, "1.7.0.1", ">=")) {
            return (bool) Db::getInstance()->getValue("SELECT `id_module` FROM `_DB_PREFIX_module` WHERE `name` = \"" . pSQL($module_name) . "\"");
        }
        return Module::isInstalled($module_name);
    }
    public static function moduleIsEnabled($module_name)
    {
        if (version_compare(_PS_VERSION_, "1.5.1.0", "<")) {
            return (bool) Db::getInstance()->getValue("SELECT `id_module` FROM `_DB_PREFIX_module` WHERE `name` = \"" . pSQL($module_name) . "\" AND active = 1");
        }
        return Module::isEnabled($module_name);
    }
    public static function getModuleVersion($module_name)
    {
        return (string) Db::getInstance()->getValue("SELECT `version` FROM `_DB_PREFIX_module` WHERE `name` = \"" . pSQL($module_name) . "\"");
    }
    public static function cacheScModulesInfos($refresh = false)
    {
        if (!(!is_null(self::$scModulesInfos) && !$refresh)) {
            self::$scModulesInfos = array();
            $modules_on_disk = Module::getModulesDirOnDisk();
            $sc_module = array("scaffiliation", "scpdfcatalog");
            $modules_installed = Db::getInstance()->executeS("SELECT name,active\n                                                            FROM _DB_PREFIX_module\n                                                            WHERE name IN (\"scaffiliation\",\"scpdfcatalog\")");
            if (empty($modules_installed)) {
                goto NiTiP;
            }
            $tmp = array();
            foreach ($modules_installed as $row) {
                $tmp[$row["name"]] = (int) $row["active"];
            }
            $modules_installed = $tmp;
            NiTiP:
            $sc_module_infos = array();
            $messageInstallation = _l("(Installation required in Prestashop)");
            $messageActivation = _l("(Activation required in Prestashop)");
            foreach ($sc_module as $m_name) {
                $sc_module_infos[$m_name] = array("present" => false, "installed" => false, "activated" => false, "message" => '');
                if (!in_array($m_name, $modules_on_disk)) {
                    goto z3dLs;
                }
                $sc_module_infos[$m_name]["present"] = true;
                z3dLs:
                if (!array_key_exists($m_name, $modules_installed)) {
                    goto xpOQk;
                }
                $sc_module_infos[$m_name]["installed"] = true;
                $sc_module_infos[$m_name]["activated"] = (int) $modules_installed[$m_name];
                xpOQk:
                if (!(!$sc_module_infos[$m_name]["present"] || !$sc_module_infos[$m_name]["installed"])) {
                    goto j4MNq;
                }
                $sc_module_infos[$m_name]["message"] = $messageInstallation;
                j4MNq:
                if (!($sc_module_infos[$m_name]["present"] && $sc_module_infos[$m_name]["installed"] && !$sc_module_infos[$m_name]["activated"])) {
                    goto TIeSX;
                }
                $sc_module_infos[$m_name]["message"] = $messageActivation;
                TIeSX:
            }
            self::$scModulesInfos = $sc_module_infos;
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    public static function getScModulesInfos($module_name = null)
    {
        SCI::cacheScModulesInfos();
        $sc_module_infos = self::$scModulesInfos;
        if (empty($module_name)) {
            return $sc_module_infos;
        }
        return $sc_module_infos[$module_name];
    }
    public static function duplicateProductImages($idProductOld, $idProductNew, $id_image = null)
    {
        $imagesTypes = ImageType::getImagesTypes("products");
        if (!empty($id_image)) {
            $result = array(0 => array("id_image" => $id_image));
            goto z_NaR;
        }
        $result = Db::getInstance()->executeS("\n            SELECT i.`id_image`\n            FROM `_DB_PREFIX_image` i\n            INNER JOIN `_DB_PREFIX_image_shop` image_shop\n            ON (i.`id_image` = image_shop.`id_image` AND image_shop.`id_shop` = " . (int) self::getSelectedShop() . ")\n            WHERE i.`id_product` = " . (int) $idProductOld);
        z_NaR:
        foreach ($result as $row) {
            $imageOld = new Image($row["id_image"]);
            $imageNew = clone $imageOld;
            unset($imageNew->id);
            $new_product_has_cover = Image::getCover((int) $idProductNew);
            $imageNew->cover = !empty($new_product_has_cover) ? 0 : 1;
            $imageNew->id_product = (int) $idProductNew;
            if ($imageNew->add()) {
                $newPath = $imageNew->getPathForCreation();
                foreach ($imagesTypes as $imageType) {
                    if (!file_exists(_PS_PROD_IMG_DIR_ . $imageOld->getExistingImgPath() . "-" . $imageType["name"] . ".jpg")) {
                        goto nRmV6;
                    }
                    if (Configuration::get("PS_LEGACY_IMAGES")) {
                        goto hB0Q7;
                    }
                    $imageNew->createImgFolder();
                    hB0Q7:
                    copy(_PS_PROD_IMG_DIR_ . $imageOld->getExistingImgPath() . "-" . $imageType["name"] . ".jpg", $newPath . "-" . $imageType["name"] . ".jpg");
                    if (!Configuration::get("WATERMARK_HASH")) {
                        goto JiS3A;
                    }
                    $oldImagePath = _PS_PROD_IMG_DIR_ . $imageOld->getExistingImgPath() . "-" . $imageType["name"] . "-" . Configuration::get("WATERMARK_HASH") . ".jpg";
                    if (!file_exists($oldImagePath)) {
                        goto yOgbn;
                    }
                    copy($oldImagePath, $newPath . "-" . $imageType["name"] . "-" . Configuration::get("WATERMARK_HASH") . ".jpg");
                    yOgbn:
                    JiS3A:
                    nRmV6:
                }
                if (!file_exists(_PS_PROD_IMG_DIR_ . $imageOld->getExistingImgPath() . ".jpg")) {
                    goto nlYux;
                }
                copy(_PS_PROD_IMG_DIR_ . $imageOld->getExistingImgPath() . ".jpg", $newPath . ".jpg");
                nlYux:
                $imageNew->duplicateShops($idProductOld);
                return (int) $imageNew->id;
            }
            return false;
        }
    }
    public static function getFeedBizAllowedMarketPlace()
    {
        $marketplace_tab = Configuration::get("FEEDBIZ_MARKETPLACE_TAB");
        $allowed = array("amazon" => false, "cdiscount" => false);
        if (!$marketplace_tab) {
            goto xJ68w;
        }
        $marketplace_tab_config = unserialize($marketplace_tab);
        if (!(is_array($marketplace_tab_config) && count($marketplace_tab_config))) {
            goto aWwML;
        }
        foreach ($allowed as $marketplace => $value) {
            if (!(array_key_exists($marketplace, $marketplace_tab_config) && Tools::strlen($marketplace_tab_config[$marketplace]))) {
                goto KZGgq;
            }
            $allowed[$marketplace] = true;
            KZGgq:
        }
        aWwML:
        xJ68w:
        return $allowed;
    }
    public static function getShopUrlArrayJs()
    {
        $html_return = "var shopUrls = new Array();\n";
        $protocol = version_compare(_PS_VERSION_, "1.5.0.2", ">=") ? Tools::getShopProtocol() : (SCI::getConfigurationValue("PS_SSL_ENABLED") ? "https://" : "http://");
        $base_url = (SCI::getConfigurationValue("PS_SSL_ENABLED") ? $protocol . SCI::getConfigurationValue("PS_SHOP_DOMAIN_SSL") : $protocol . SCI::getConfigurationValue("PS_SHOP_DOMAIN")) . "/";
        if (!version_compare(_PS_VERSION_, "1.5.0.0", ">")) {
            goto kWWeU;
        }
        $url = Db::getInstance()->getValue("SELECT CONCAT(domain, physical_uri, virtual_uri) AS url\n                                            FROM _DB_PREFIX_shop_url\n                                            WHERE active = 1");
        if (empty($url)) {
            goto UBtWE;
        }
        $base_url = $protocol . $url;
        UBtWE:
        kWWeU:
        $html_return .= "shopUrls[0] = \"" . $base_url . "\";" . "\n";
        if (!version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
            goto ZwqJY;
        }
        $sql_shop = "SELECT id_shop\n                                FROM _DB_PREFIX_shop\n                                WHERE deleted != '1'";
        $shops = Db::getInstance()->ExecuteS($sql_shop);
        foreach ($shops as $shop) {
            $url = Db::getInstance()->getRow("SELECT *, CONCAT(domain, physical_uri, virtual_uri) AS url\n                            FROM _DB_PREFIX_shop_url\n                            WHERE id_shop = " . (int) $shop["id_shop"] . "\n                                AND active = \"1\"\n                            ORDER BY main DESC");
            if (empty($url["url"])) {
                goto OMqbn;
            }
            $html_return .= "shopUrls[" . $shop["id_shop"] . "] = \"" . $protocol . $url["url"] . "\";" . "\n";
            OMqbn:
        }
        ZwqJY:
        return $html_return;
    }
    public static function checkSpecificPriceexists($id_product, $id_product_attribute, $price, $reduction, $reduction_type, $id_shop, $id_group, $id_country, $id_currency, $id_customer, $from_quantity, $from, $to, $rule = false)
    {
        $rule = " AND `id_specific_price_rule`" . (!$rule ? "=0" : "!=0");
        return (int) Db::getInstance()->getValue("SELECT `id_specific_price`\n                                                FROM _DB_PREFIX_specific_price\n                                                WHERE `id_product`=" . (int) $id_product . " AND\n                                                    `id_product_attribute`=" . (int) $id_product_attribute . " AND\n                                                    `price`=" . (double) $price . " AND\n                                                    `reduction`=" . (double) $reduction . " AND\n                                                    `reduction_type`=\"" . pSQL($reduction_type) . "\" AND\n                                                    `id_shop`=" . (int) $id_shop . " AND\n                                                    `id_group`=" . (int) $id_group . " AND\n                                                    `id_country`=" . (int) $id_country . " AND\n                                                    `id_currency`=" . (int) $id_currency . " AND\n                                                    `id_customer`=" . (int) $id_customer . " AND\n                                                    `from_quantity`=" . (int) $from_quantity . " AND\n                                                    `from` >= '" . pSQL($from) . "' AND\n                                                    `to` <= '" . pSQL($to) . "'" . $rule);
    }
    public static function cachingAttributeName($id_lang, $id_product_attribute = null)
    {
        if (empty($id_product_attribute)) {
            goto avBO5;
        }
        if (is_array($id_product_attribute)) {
            goto kGdlX;
        }
        $id_product_attribute = array($id_product_attribute);
        kGdlX:
        avBO5:
        $sql = "SELECT pac.id_product_attribute,agl.name as gp, al.name\n                            FROM _DB_PREFIX_product_attribute_combination pac\n                            INNER JOIN _DB_PREFIX_attribute a ON pac.id_attribute = a.id_attribute\n                            INNER JOIN _DB_PREFIX_attribute_group_lang agl ON a.id_attribute_group = agl.id_attribute_group\n                            INNER JOIN _DB_PREFIX_attribute_lang al ON pac.id_attribute = al.id_attribute" . (!empty($id_product_attribute) ? " WHERE pac.id_product_attribute IN (" . pSQL(implode(",", $id_product_attribute)) . ")" : '') . "AND agl.id_lang = " . (int) $id_lang . "\n                            AND al.id_lang = " . (int) $id_lang . "\n                            ORDER BY agl.name";
        $res_attr = Db::getInstance()->executeS($sql);
        $cache_array = array();
        if (empty($res_attr)) {
            goto sJ95w;
        }
        foreach ($res_attr as $row) {
            if (!(!empty($row["gp"]) && !empty($row["name"]))) {
                goto v_7HR;
            }
            $attribute_name = $row["gp"] . " : " . $row["name"];
            if (array_key_exists($row["id_product_attribute"], $cache_array)) {
                $cache_array[$row["id_product_attribute"]] .= ", " . $attribute_name;
                goto dGD02;
            }
            $cache_array[$row["id_product_attribute"]] = $attribute_name;
            dGD02:
            v_7HR:
        }
        sJ95w:
        return $cache_array;
    }
    public static function addLog($message, $severity = 1, $errorCode = null, $objectType = null, $objectId = null, $allowDuplicate = false, $idEmployee = null)
    {
        if (version_compare(_PS_VERSION_, "1.6.0.3", ">=")) {
            PrestaShopLogger::addLog($message, $severity, $errorCode, $objectType, $objectId, $allowDuplicate, $idEmployee);
            goto Sl9kf;
        }
        Logger::addLog($message, $severity, $errorCode, $objectType, $objectId, $allowDuplicate);
        Sl9kf:
    }
    public static function addProductAttributeMultiple($product, $attributes, $set_default = true)
    {
        $return = array();
        $default_value = 1;
        foreach ($attributes as $attribute) {
            $obj = new Combination();
            foreach ($attribute as $key => $value) {
                $obj->{$key} = $value;
            }
            if (!$set_default) {
                goto C0iBR;
            }
            $obj->default_on = $default_value;
            $default_value = 0;
            if ($product->hasAttributesInOtherShops()) {
                goto Dn7a1;
            }
            $id_shop_list_array = Product::getShopsByProduct($product->id);
            $id_shop_list = array();
            foreach ($id_shop_list_array as $array_shop) {
                $id_shop_list[] = $array_shop["id_shop"];
            }
            $obj->id_shop_list = $id_shop_list;
            Dn7a1:
            C0iBR:
            $obj->add();
            $return[] = $obj->id;
        }
        return $return;
    }
    public static function addAttributeCombinationMultiple($id_attributes, $combinations)
    {
        $attributes_list = array();
        foreach ($id_attributes as $nb => $id_product_attribute) {
            if (!isset($combinations[$nb])) {
                goto q6HEc;
            }
            foreach ($combinations[$nb] as $id_attribute) {
                $attributes_list[] = array("id_product_attribute" => (int) $id_product_attribute, "id_attribute" => (int) $id_attribute);
            }
            q6HEc:
        }
        return Db::getInstance()->insert("product_attribute_combination", $attributes_list);
    }
    public static function getAttributeCombinations($product, $id_lang)
    {
        if (version_compare(_PS_VERSION_, "1.5.0.10", ">=")) {
            return $product->getAttributeCombinations($id_lang);
        }
        return $product->getAttributeCombinaisons($id_lang);
    }
    public static function getScDisplayableOrderStates($id_lang, $filterDeleted = true)
    {
        $orderStates = OrderState::getOrderStates($id_lang, $filterDeleted);
        $scHideOrderStatesConfigs = unserialize(SCI::getConfigurationValue("SC_HIDE_ORDER_STATES"));
        if (empty($scHideOrderStatesConfigs)) {
            goto EJDJ0;
        }
        foreach ($orderStates as $key => $orderState) {
            if (!isset($scHideOrderStatesConfigs[$orderState["id_order_state"]])) {
                goto cq8J8;
            }
            $scHideOrderStatesConfig = $scHideOrderStatesConfigs[$orderState["id_order_state"]];
            if (!(!empty($scHideOrderStatesConfig) && isset($scHideOrderStatesConfig["shops"]) && is_array($scHideOrderStatesConfig["shops"]) && in_array(SCI::getSelectedShop(), array_values($scHideOrderStatesConfig["shops"])))) {
                goto OVqWq;
            }
            unset($orderStates[$key]);
            OVqWq:
            cq8J8:
        }
        EJDJ0:
        return $orderStates;
    }
    public static function getScIsDisplayableOrderState($idOrderState = null, $idShop = null)
    {
        $idShop = null !== $idShop ? $idShop : SCI::getSelectedShop();
        $scHideOrderStatesConfigs = unserialize(SCI::getConfigurationValue("SC_HIDE_ORDER_STATES"));
        if (!(!$idOrderState || !$scHideOrderStatesConfigs)) {
            if (!(!is_array($scHideOrderStatesConfigs[$idOrderState]["shops"]) || !isset($scHideOrderStatesConfigs[$idOrderState]))) {
                if (in_array($idShop, array_values($scHideOrderStatesConfigs[$idOrderState]["shops"]))) {
                    if (!($idShop == 0 && is_iterable($scHideOrderStatesConfigs[$idOrderState]["shops"]) && count($scHideOrderStatesConfigs[$idOrderState]["shops"]) > 1)) {
                        return 1;
                    }
                    return 2;
                }
                return 0;
            }
            return 0;
        }
        return 0;
    }
    public static function getActiveLangForSelectedShop($field = null)
    {
        if (!$field) {
            return Language::getLanguages(false, SCI::getSelectedShop());
        }
        return array_map(function ($e) use($field) {
            return $e[$field];
        }, Language::getLanguages(false, SCI::getSelectedShop()));
    }
    public static function fixMyPSAlert($sc_agent)
    {
        if (!(_r("MEN_TOO_FIXMYPS") && !isset($_COOKIE["FixMyPsAlert"]) && defined("SC_FixMyPrestashop_ACTIVE") && false && _s("APP_DISABLE_FIXMYPS_NOTICE"))) {
            goto jlmtn;
        }
        $refDateTime = DateTime::createFromFormat("Y-m-d", SCI::getConfigurationValue("SC_FIXMYPS_LAST_CHECK"));
        if ($refDateTime) {
            goto oNGY6;
        }
        $sqlDAteInstalled = "SELECT date_add FROM _DB_PREFIX_configuration WHERE name='SC_INSTALLED' AND value='1'";
        $data_add = Db::getInstance()->getValue($sqlDAteInstalled);
        if (!$data_add) {
            goto lHXDs;
        }
        $refDateTime = DateTime::createFromFormat("Y-m-d H:i:s", $data_add);
        lHXDs:
        oNGY6:
        if (!($refDateTime && $refDateTime->diff(new DateTime())->format("%d") > 7)) {
            jlmtn:
            return false;
        }
        setcookie("FixMyPsAlert", true, time() + 86400, constant("COOKIE_PATH"));
        return _l("FixMyPrestashop has not been run for at least 7 days, you should run it from the Tools > FixMyPrestashop menu to check the integrity of your shop.") . "<a style=\"font-weight:bold;text-decoration:underline;\" onclick=\"onMenuClick('fixmyprestashop');\">" . _l("More info") . "</a>";
    }
    public static function getStockMvtEmployeeReasonId($sign)
    {
        return (int) ($sign > 0 ? self::getConfigurationValue("PS_STOCK_MVT_INC_EMPLOYEE_EDITION") : self::getConfigurationValue("PS_STOCK_MVT_DEC_EMPLOYEE_EDITION"));
    }
    public static function isAvailableWhenOutOfStockByShop($out_of_stock, $id_shop)
    {
        $ps_stock_management = self::getConfigurationValue("PS_STOCK_MANAGEMENT", null, null, (int) $id_shop);
        if ($ps_stock_management) {
            $ps_order_out_of_stock = self::getConfigurationValue("PS_ORDER_OUT_OF_STOCK", null, null, (int) $id_shop);
            if (version_compare(_PS_VERSION_, "1.7.8.0", ">=")) {
                $outOfStockTypeDefault = PrestaShop\PrestaShop\Core\Domain\Product\Stock\ValueObject\OutOfStockType::OUT_OF_STOCK_DEFAULT;
                goto IbGrd;
            }
            $outOfStockTypeDefault = 2;
            IbGrd:
            return (int) $out_of_stock === $outOfStockTypeDefault ? (int) $ps_order_out_of_stock : (int) $out_of_stock;
        }
        return true;
    }
    public static function messageNotCompatibleWithAdvancedPack($identifier)
    {
        if (!SCI::moduleIsInstalled("pm_advancedpack")) {
            goto mZovy;
        }
        $is_adv_pack = (int) Db::getInstance()->getValue("SELECT COUNT(*)\n                                                                FROM _DB_PREFIX_pm_advancedpack\n                                                                WHERE id_pack IN (" . pInSQL($identifier) . ")");
        if (!$is_adv_pack) {
            goto ZHd73;
        }
        $msg = _l("This pack can't be modified here because it's an Advanced Pack");
        exitWithXmlMessageForGrid($msg);
        ZHd73:
        mZovy:
    }
    public static function encrypt($data)
    {
        if (version_compare(_PS_VERSION_, "1.7.0.0", ">=")) {
            $cryptEngine = new PhpEncryption(_NEW_COOKIE_KEY_);
            goto hhCwk;
        }
        if (!Configuration::get("PS_CIPHER_ALGORITHM") || !defined("_RIJNDAEL_KEY_")) {
            $cryptEngine = new Blowfish(_COOKIE_KEY_, _COOKIE_IV_);
            goto ILNqL;
        }
        $cryptEngine = new Rijndael(_RIJNDAEL_KEY_, _RIJNDAEL_IV_);
        ILNqL:
        hhCwk:
        return $cryptEngine->encrypt($data);
    }
    public static function decrypt($data)
    {
        if (version_compare(_PS_VERSION_, "1.7.0.0", ">=")) {
            $cryptEngine = new PhpEncryption(_NEW_COOKIE_KEY_);
            goto zpwcq;
        }
        if (!Configuration::get("PS_CIPHER_ALGORITHM") || !defined("_RIJNDAEL_KEY_")) {
            $cryptEngine = new Blowfish(_COOKIE_KEY_, _COOKIE_IV_);
            goto bbCVq;
        }
        $cryptEngine = new Rijndael(_RIJNDAEL_KEY_, _RIJNDAEL_IV_);
        bbCVq:
        zpwcq:
        return $cryptEngine->decrypt($data);
    }
    public static function getAllowedFileExtension($type)
    {
        switch ($type) {
            case "image":
                $extensions = array("jpg", "jpeg", "png", "gif", "bmp");
                if (!version_compare(_PS_VERSION_, "8.0", ">=")) {
                    goto ku8J8;
                }
                $extensions[] = "webp";
                ku8J8:
                return $extensions;
            case "csv":
                return array(0 => "csv");
            default:
                return array();
        }
    }
    public static function getForbiddenFileExtension($type)
    {
        switch ($type) {
            case "other":
                return array(0 => "php", 1 => "phpt", 2 => "ade", 3 => "adp", 4 => "apk", 5 => "appx", 6 => "appxbundle", 7 => "bat", 8 => "cab", 9 => "chm", 10 => "cmd", 11 => "com", 12 => "cpl", 13 => "diagcab", 14 => "diagcfg", 15 => "diagpack", 16 => "dll", 17 => "dmg", 18 => "ex", 19 => "ex_", 20 => "exe", 21 => "hta", 22 => "img", 23 => "ins", 24 => "iso", 25 => "isp", 26 => "jar", 27 => "jnlp", 28 => "js", 29 => "jse", 30 => "lib", 31 => "lnk", 32 => "mde", 33 => "msc", 34 => "msi", 35 => "msix", 36 => "msixbundle", 37 => "msp", 38 => "mst", 39 => "nsh", 40 => "pif", 41 => "ps1", 42 => "scr", 43 => "sct", 44 => "shb", 45 => "sys", 46 => "vb", 47 => "vbe", 48 => "vbs", 49 => "vhd", 50 => "vxd", 51 => "wsc", 52 => "wsf", 53 => "wsh", 54 => "xll");
            default:
                return array();
        }
    }
}
function pInSQL($string)
{
    $string = pSQL($string);
    $string = explode(",", $string);
    $string = array_unique($string);
    $string = array_map("intval", $string);
    return implode(",", $string);
}
function bqInSQL($string)
{
    $string = explode(",", $string);
    $string = array_map("bqSQL", $string);
    return "`" . implode("`,`", $string) . "`";
}
function _l($str, $needAddslashes = false, $arrayOfValues = array())
{
    global $LANG, $LANG_EN;
    if (!empty($LANG[$str])) {
        jzSr8:
        $str = $LANG[$str];
        if (empty($arrayOfValues)) {
            goto hFafp;
        }
        $str = vsprintf($str, $arrayOfValues);
        hFafp:
        return $needAddslashes ? addslashes($str) : $str;
    }
    if (empty($LANG_EN[$str])) {
        if (empty($arrayOfValues)) {
            goto eMQs4;
        }
        $str = vsprintf($str, $arrayOfValues);
        eMQs4:
        return $needAddslashes ? addslashes($str) : $str;
    }
    $str = $LANG_EN[$str];
    if (empty($arrayOfValues)) {
        goto tWUGW;
    }
    $str = vsprintf($str, $arrayOfValues);
    tWUGW:
    return $needAddslashes ? addslashes($str) : $str;
}
function sizeFormat($size, $round = 1)
{
    if ($size < -1024) {
        return $size . " octets";
    }
    if ($size < 1048576) {
        $size = round($size / 1024, (int) $round);
        return $size . " Ko";
    }
    if ($size < 1073741824) {
        $size = round($size / 1048576, (int) $round);
        return $size . " Mo";
    }
    $size = round($size / 1073741824, (int) $round);
    return $size . " Go";
}
function addToHistory($section, $action, $object, $object_id, $lang_id, $table, $newValue, $oldValue = false, $id_shop = null)
{
    global $sc_agent;
    if (!_s("APP_DISABLE_CHANGE_HISTORY")) {
        if (!($oldValue === false)) {
            goto B8Ex2;
        }
        $tableKeys = array("_DB_PREFIX_product" => "id_product", "_DB_PREFIX_product_lang" => "id_product", "_DB_PREFIX_image" => "id_image", "_DB_PREFIX_image_lang" => "id_image", "_DB_PREFIX_product_attribute" => "id_product_attribute", "_DB_PREFIX_category_product" => "0", "_DB_PREFIX_category" => "id_parent", "_DB_PREFIX_attribute_group" => "id_attribute_group", "_DB_PREFIX_attribute_group_lang" => "id_attribute_group", "_DB_PREFIX_attribute" => "id_attribute", "_DB_PREFIX_attribute_lang" => "id_attribute", "_DB_PREFIX_feature" => "id_feature", "_DB_PREFIX_feature_lang" => "id_feature", "_DB_PREFIX_feature_value" => "id_feature_value", "_DB_PREFIX_feature_value_lang" => "id_feature_value", "_DB_PREFIX_discount_quantity" => "id_discount_quantity", "_DB_PREFIX_storecom_product" => "id_product", "_DB_PREFIX_specific_price" => "id_product", "_DB_PREFIX_attachment" => "id_attachment", "_DB_PREFIX_attachment_lang" => "id_attachment", "_DB_PREFIX_customization_field" => "id_customization_field", "_DB_PREFIX_customization_field_lang" => "id_customization_field", "_DB_PREFIX_orders" => "id_order", "_DB_PREFIX_order_detail" => "id_order_detail", "_DB_PREFIX_product_download" => "id_product_download", "_DB_PREFIX_address" => "id_address");
        if (!(!empty($object) && !empty($table) && !empty($tableKeys[$table]))) {
            goto dWL2L;
        }
        $sql = "SELECT `" . bqSQL($object) . "` FROM `" . bqSQL($table) . "` WHERE `" . bqSQL($tableKeys[$table]) . "`='" . (int) $object_id . "'" . (strpos($table, "_lang") > 0 ? " AND id_lang=" . (int) $lang_id : '');
        $res = Db::getInstance()->getRow($sql);
        $oldValue = $res[$object];
        dWL2L:
        B8Ex2:
        if (!(strval($oldValue) != strval($newValue) || $oldValue === null && $newValue === null)) {
            goto aHHR4;
        }
        if (SCMS) {
            if (!empty($id_shop)) {
                goto zlbB0;
            }
            $id_shop = pInSQL(SCI::getSelectedShopActionList(true));
            zlbB0:
            $sql = "INSERT INTO _DB_PREFIX_storecom_history (id_employee,section,action,object,object_id,lang_id,dbtable,oldValue,newValue,date_add,shops)\n            VALUES ('" . (int) $sc_agent->id_employee . "','" . psql($section) . "','" . psql($action) . "','" . psql($object) . "','" . (int) $object_id . "','" . (int) $lang_id . "','" . psql($table) . "','" . psql($oldValue, true) . "','" . psql($newValue, true) . "',NOW(),'," . $id_shop . ",')";
            goto c8hwa;
        }
        $sql = "INSERT INTO _DB_PREFIX_storecom_history (id_employee,section,action,object,object_id,lang_id,dbtable,oldValue,newValue,date_add)\n            VALUES ('" . (int) $sc_agent->id_employee . "','" . psql($section) . "','" . psql($action) . "','" . psql($object) . "','" . (int) $object_id . "','" . (int) $lang_id . "','" . psql($table) . "','" . psql($oldValue, true) . "','" . psql($newValue, true) . "',NOW())";
        c8hwa:
        Db::getInstance()->Execute($sql);
        aHHR4:
        // [PHPDeobfuscator] Implied return
        return;
    }
    return false;
}
function utf8_encode2($str)
{
    $final_str = $str;
    $final_str = str_replace(chr(hexdec("80")), "&#8364;", $final_str);
    $final_str = str_replace(chr(hexdec("82")), "&#130;", $final_str);
    $final_str = str_replace(chr(hexdec("83")), "&#131;", $final_str);
    $final_str = str_replace(chr(hexdec("84")), "&#132;", $final_str);
    $final_str = str_replace(chr(hexdec("85")), "&#133;", $final_str);
    $final_str = str_replace(chr(hexdec("86")), "&#134;", $final_str);
    $final_str = str_replace(chr(hexdec("87")), "&#135;", $final_str);
    $final_str = str_replace(chr(hexdec("88")), "&#136;", $final_str);
    $final_str = str_replace(chr(hexdec("89")), "&#137;", $final_str);
    $final_str = str_replace(chr(hexdec("8A")), "&#138;", $final_str);
    $final_str = str_replace(chr(hexdec("8B")), "&#139;", $final_str);
    $final_str = str_replace(chr(hexdec("8C")), "&#140;", $final_str);
    $final_str = str_replace(chr(hexdec("8E")), "&#142;", $final_str);
    $final_str = str_replace(chr(hexdec("91")), "&#145;", $final_str);
    $final_str = str_replace(chr(hexdec("92")), "&#146;", $final_str);
    $final_str = str_replace(chr(hexdec("93")), "&#147;", $final_str);
    $final_str = str_replace(chr(hexdec("94")), "&#148;", $final_str);
    $final_str = str_replace(chr(hexdec("95")), "&#149;", $final_str);
    $final_str = str_replace(chr(hexdec("96")), "&#150;", $final_str);
    $final_str = str_replace(chr(hexdec("97")), "&#151;", $final_str);
    $final_str = str_replace(chr(hexdec("98")), "&#152;", $final_str);
    $final_str = str_replace(chr(hexdec("99")), "&#153;", $final_str);
    $final_str = str_replace(chr(hexdec("9A")), "&#154;", $final_str);
    $final_str = str_replace(chr(hexdec("9B")), "&#155;", $final_str);
    $final_str = str_replace(chr(hexdec("9C")), "&#339;", $final_str);
    $final_str = str_replace(chr(hexdec("9E")), "&#158;", $final_str);
    $final_str = str_replace(chr(hexdec("9F")), "&#159;", $final_str);
    $final_str = utf8_encode($final_str);
    $final_str = str_replace(utf8_encode("&#8364;"), "\xe2\x82\xac", $final_str);
    $final_str = str_replace(utf8_encode("&#339;"), "\xc5\x93", $final_str);
    $final_str = str_replace(utf8_encode("&#130;"), "\xe2\x80\x9a", $final_str);
    $final_str = str_replace(utf8_encode("&#131;"), "\xc6\x92", $final_str);
    $final_str = str_replace(utf8_encode("&#132;"), "\xe2\x80\x9e", $final_str);
    $final_str = str_replace(utf8_encode("&#133;"), "\xe2\x80\xa6", $final_str);
    $final_str = str_replace(utf8_encode("&#134;"), "\xe2\x80\xa0", $final_str);
    $final_str = str_replace(utf8_encode("&#135;"), "\xe2\x80\xa1", $final_str);
    $final_str = str_replace(utf8_encode("&#136;"), "\xcb\x86", $final_str);
    $final_str = str_replace(utf8_encode("&#137;"), "\xe2\x80\xb0", $final_str);
    $final_str = str_replace(utf8_encode("&#138;"), "\xc5\xa0", $final_str);
    $final_str = str_replace(utf8_encode("&#139;"), "\xe2\x80\xb9", $final_str);
    $final_str = str_replace(utf8_encode("&#140;"), "\xc5\x92", $final_str);
    $final_str = str_replace(utf8_encode("&#142;"), "\xc5\xbd", $final_str);
    $final_str = str_replace(utf8_encode("&#145;"), "\xe2\x80\x98", $final_str);
    $final_str = str_replace(utf8_encode("&#146;"), "\xe2\x80\x99", $final_str);
    $final_str = str_replace(utf8_encode("&#147;"), "\xe2\x80\x9c", $final_str);
    $final_str = str_replace(utf8_encode("&#148;"), "\xe2\x80\x9d", $final_str);
    $final_str = str_replace(utf8_encode("&#149;"), "\xe2\x80\xa2", $final_str);
    $final_str = str_replace(utf8_encode("&#150;"), "\xe2\x80\x93", $final_str);
    $final_str = str_replace(utf8_encode("&#151;"), "\xe2\x80\x94", $final_str);
    $final_str = str_replace(utf8_encode("&#152;"), "\xcb\x9c", $final_str);
    $final_str = str_replace(utf8_encode("&#153;"), "\xe2\x84\xa2", $final_str);
    $final_str = str_replace(utf8_encode("&#154;"), "\xc5\xa1", $final_str);
    $final_str = str_replace(utf8_encode("&#155;"), "\xe2\x80\xba", $final_str);
    $final_str = str_replace(utf8_encode("&#158;"), "\xc5\xbe", $final_str);
    $final_str = str_replace(utf8_encode("&#159;"), "\xc5\xb8", $final_str);
    return $final_str;
}
function utf8_encode_array(&$array)
{
    if (is_array($array)) {
        array_walk($array, "utf8_encode_array");
        goto bm15l;
    }
    $array = utf8_encode2($array);
    bm15l:
}
function escapeCharForPS(&$str, $html = false)
{
    if (!$html) {
        $str = str_replace(">", '', $str);
        $str = str_replace("<", '', $str);
        goto IhND3;
    }
    $str = str_replace("\xe2\x82\xac", "&euro;", $str);
    $str = str_replace(utf8_encode(chr(hexdec("80"))), "&euro;", $str);
    IhND3:
    $str = str_replace(utf8_encode("\xc2\xb4"), "'", $str);
    $str = str_replace(utf8_encode("\xe2\x80\x99"), "'", $str);
    $str = str_replace(utf8_encode("\xe2\x80\xa6"), "...", $str);
}
function importConv2Int($field)
{
    $field = str_replace(array("\xe2\x82\xac", " ", "%"), '', $field);
    $field = str_replace(",", ".", $field);
    return (int) $field;
}
function importConv2Float($field)
{
    $field = str_replace(array("\xe2\x82\xac", " ", "%"), '', $field);
    $field = str_replace(",", ".", $field);
    return number_format(floatval($field), 6, ".", '');
}
function importConv2Date($field)
{
    $field = str_replace("/", "-", $field);
    $field = str_replace(".", "-", $field);
    $fieldArr = explode("-", $field);
    $time_final = null;
    if (!(strlen($fieldArr[2]) > 4)) {
        goto tjNyP;
    }
    $time_init = explode(" ", $fieldArr[2]);
    if (!(count($time_init) == 2)) {
        goto WLFKs;
    }
    $fieldArr[2] = $time_init[0];
    if (empty($time_init[1])) {
        goto uUdFf;
    }
    $time_exp = explode(":", $time_init[1]);
    if (array_key_exists(2, $time_exp)) {
        goto dVWPi;
    }
    $time_exp[2] = "00";
    $time_final = implode(":", $time_exp);
    dVWPi:
    uUdFf:
    WLFKs:
    tjNyP:
    if (!(strlen($fieldArr[0]) == 2 && strlen($fieldArr[1]) == 2 && strlen($fieldArr[2]) == 4)) {
        goto Rk6Kl;
    }
    $field = $fieldArr[2] . "-" . $fieldArr[1] . "-" . $fieldArr[0] . (!empty($time_final) ? " " . $time_final : '');
    Rk6Kl:
    if (!($field == "0000-00-00")) {
        goto pTEd6;
    }
    $field = date("Y-m-d");
    pTEd6:
    return $field;
}
function dateFrtoUS($field)
{
    $field = str_replace("/", "-", $field);
    $field = str_replace(".", "-", $field);
    $fieldArr = explode("-", $field);
    if (!(strlen($fieldArr[0]) == 2 && strlen($fieldArr[1]) == 2 && strlen($fieldArr[2]) == 4)) {
        goto eiXWb;
    }
    $field = $fieldArr[2] . "-" . $fieldArr[1] . "-" . $fieldArr[0];
    eiXWb:
    return $field;
}
function getYearforUs($date)
{
    $fieldArr = explode("-", $date);
    return $fieldArr[0];
}
function formatDateTimeToDisplay($dateTime)
{
    list($date, $time) = explode(" ", $dateTime);
    $times = explode(":", $time);
    return $date . " " . $times[0] . ":" . $times[1];
}
function cleanQuotes($str)
{
    $str = trim($str);
    if (!(substr($str, 0, 1) == "\"" && substr($str, strlen($str) - 1, 1) == "\"")) {
        goto UzU8Q;
    }
    $str = substr($str, 1, strlen($str) - 2);
    $str = str_replace("\"\"", "\"", $str);
    UzU8Q:
    return trim($str);
}
function getToolsList()
{
    $tools = array();
    if (!is_dir(SC_TOOLS_DIR)) {
        goto Gk1H1;
    }
    @($files = scandir(SC_TOOLS_DIR));
    foreach ($files as $file) {
        if (!($file != "." && $file != "..")) {
            goto AxlDL;
        }
        if (!is_dir(SC_TOOLS_DIR . $file)) {
            goto iDZpd;
        }
        $tools[] = $file;
        iDZpd:
        AxlDL:
    }
    Gk1H1:
    return $tools;
}
function link_rewrite($str, $isoLang = null)
{
    if (!function_exists("mb_strtolower")) {
        goto XPvd0;
    }
    $str = mb_strtolower($str, "utf-8");
    XPvd0:
    $acceptedAccentedChars = Configuration::get("PS_ALLOW_ACCENTED_CHARS_URL");
    if (!($isoLang && !$acceptedAccentedChars)) {
        goto k_s8G;
    }
    switch ($isoLang) {
        case "de":
            $patterns = array("/[\\x{00FC}]/u", "/[\\x{00E4}]/u", "/[\\x{00F6}]/u", "/[\\x{00DC}]/u", "/[\\x{00C4}]/u", "/[\\x{00D6}]/u");
            $replacements = array("ue", "ae", "oe", "UE", "AE", "OE");
            $str = preg_replace($patterns, $replacements, $str);
            goto SCxWE;
        default:
            $patterns = array("/[\\x{00FC}]/u", "/[\\x{00E4}]/u", "/[\\x{00E6}]/u", "/[\\x{00F6}]/u", "/[\\x{0153}]/u", "/[\\x{00DC}]/u", "/[\\x{00C4}]/u", "/[\\x{00C6}]/u", "/[\\x{00D6}]/u", "/[\\x{0152}]/u");
            $replacements = array("u", "a", "ae", "o", "oe", "U", "A", "AE", "O", "OE");
            $str = preg_replace($patterns, $replacements, $str);
    }
    SCxWE:
    k_s8G:
    $str = trim($str);
    if (!((!function_exists("mb_strtolower") || !$acceptedAccentedChars) && method_exists("Tools", "replaceAccentedChars"))) {
        goto NRQph;
    }
    $str = Tools::replaceAccentedChars($str);
    NRQph:
    if ($acceptedAccentedChars) {
        $str = preg_replace("/[^a-zA-Z0-9\\s'\\:\\/\\[\\]\\-\\pL]/u", '', $str);
        goto tdUjQ;
    }
    $str = preg_replace("/[^a-zA-Z0-9\\s'\\:\\/\\[\\]\\-]/", '', $str);
    tdUjQ:
    $str = preg_replace("/[\\s'\\:\\/\\[\\]-]+/", " ", $str);
    $str = str_replace(array(" ", "/"), "-", $str);
    if (function_exists("mb_strtolower")) {
        goto PbfWd;
    }
    $str = strtolower($str);
    PbfWd:
    return $str;
}
function dirMove($source, $dest, $overwrite = false, $funcloc = null)
{
    if (!is_null($funcloc)) {
        goto rRggH;
    }
    $dest .= "/" . strrev(substr(strrev($source), 0, strpos(strrev($source), "/")));
    $funcloc = "/";
    rRggH:
    if (is_dir($dest . $funcloc)) {
        goto gpHCM;
    }
    mkdir($dest . $funcloc);
    gpHCM:
    if (!($handle = opendir($source . $funcloc))) {
        goto LgeCa;
    }
    PIQjl:
    if (!(false !== ($file = readdir($handle)))) {
        closedir($handle);
        LgeCa:
        // [PHPDeobfuscator] Implied return
        return;
    }
    if (!($file != "." && $file != "..")) {
        goto ZOD60;
    }
    $path = $source . $funcloc . $file;
    $path2 = $dest . $funcloc . $file;
    if (is_file($path)) {
        if (!is_file($path2)) {
            if (@rename($path, $path2)) {
                goto DWiMG;
            }
            echo "<font color=\"red\">File (" . $path . ") could not be moved, likely a permissions problem.</font><br/>";
            DWiMG:
            goto PXLFi;
        }
        if ($overwrite) {
            if (!@unlink($path2)) {
                echo "Unable to overwrite file (\"" . $path2 . "\"), likely to be a permissions problem.<br/>";
                goto GI6OL;
            }
            if (@rename($path, $path2)) {
                goto Mj74f;
            }
            echo "<font color=\"red\">File (" . $path . ") could not be moved while overwritting, likely a permissions problem.</font><br/>";
            Mj74f:
            GI6OL:
            goto SOhrv;
        }
        SOhrv:
        PXLFi:
        goto i4YG6;
    }
    if (is_dir($path)) {
        dirMove($source, $dest, $overwrite, $funcloc . $file . "/");
        @rmdir($path);
        goto k5Cbw;
    }
    k5Cbw:
    i4YG6:
    ZOD60:
    goto PIQjl;
}
function dirRemove($dir)
{
    if (!is_dir($dir)) {
        goto mUPK8;
    }
    $objects = scandir($dir);
    foreach ($objects as $object) {
        if (!($object != "." && $object != "..")) {
            goto H_WGQ;
        }
        if (filetype($dir . "/" . $object) == "dir") {
            dirRemove($dir . "/" . $object);
            goto dLmRa;
        }
        unlink($dir . "/" . $object);
        dLmRa:
        H_WGQ:
    }
    reset($objects);
    rmdir($dir);
    mUPK8:
}
function dirEmpty($dir, $dirOrigin, $exceptions = array())
{
    if (!is_dir($dir)) {
        goto z8OjZ;
    }
    $objects = scandir($dir);
    foreach ($objects as $object) {
        if (!($object != "." && $object != ".." && !in_array($object, $exceptions))) {
            goto Heh6K;
        }
        if (filetype($dir . "/" . $object) == "dir") {
            dirEmpty($dir . "/" . $object, $dirOrigin, $exceptions);
            goto f8Qc6;
        }
        @unlink($dir . "/" . $object);
        f8Qc6:
        Heh6K:
    }
    reset($objects);
    if (!($dir != $dirOrigin)) {
        goto USeyg;
    }
    rmdir($dir);
    USeyg:
    z8OjZ:
}
function dirCheckWritable($dir, &$files)
{
    $dir = rtrim($dir, "/");
    if (is_writable($dir)) {
        goto tQyEn;
    }
    $files[] = $dir;
    tQyEn:
    if (!is_dir($dir)) {
        goto PLnJE;
    }
    $objects = scandir($dir);
    foreach ($objects as $object) {
        if (!($object != "." && $object != "..")) {
            goto rfiYz;
        }
        if (!($object == "Thumbs.db" || $object == "desktop.ini")) {
            if (is_writable($dir . "/" . $object)) {
                goto JpjRo;
            }
            $files[] = $dir . "/" . $object;
            JpjRo:
            if (!is_dir($dir . "/" . $object)) {
                goto erVJq;
            }
            dirCheckWritable($dir . "/" . $object, $files);
            erVJq:
            rfiYz:
            goto RxRoe;
        }
        @unlink($dir . "/" . $object);
        RxRoe:
    }
    PLnJE:
}
function extractArchive($file)
{
    $success = true;
    $dir_name = dirname($file);
    if (file_exists("_PS_TOOL_DIR_pclzip/pclzip.lib.php")) {
        if (class_exists("PclZip")) {
            goto VtyWb;
        }
        require_once "_PS_TOOL_DIR_pclzip/pclzip.lib.php";
        VtyWb:
        $zip = new PclZip($file);
        $list = $zip->extract(PCLZIP_OPT_PATH, $dir_name);
        foreach ($list as $extractedFile) {
            if (!($extractedFile["status"] != "ok")) {
                goto O3EZd;
            }
            $success = false;
            O3EZd:
        }
        goto pAobJ;
    }
    if (class_exists("ZipArchive", false)) {
        $zip = new ZipArchive();
        if ($zip->open($file) === true and $zip->extractTo($dir_name) and $zip->close()) {
            $success = true;
            goto A7UHz;
        }
        $success = false;
        A7UHz:
        goto vGiMz;
    }
    $success = false;
    vGiMz:
    pAobJ:
    @unlink($file);
    return $success;
}
function sc_file_get_contents($url, $method = "GET", $stream_content = array(), $stream_header = array(), $timeout = 30)
{
    $is_local_file = !preg_match("/^https?:\\/\\//", $url);
    $content = false;
    $errorMessage = '';
    if ($is_local_file) {
        $content = @file_get_contents($url);
        goto S9apv;
    }
    $opts = array("http" => array("method" => strtoupper($method), "timeout" => $timeout, "ssl" => array("verify_peer" => 0)));
    $header = array();
    $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
    $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
    $header[] = "Cache-Control: max-age=0";
    $header[] = "Connection: keep-alive";
    $header[] = "Keep-Alive: 300";
    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $header[] = "Accept-Language: en-us,en;q=0.5";
    if (empty($stream_header)) {
        goto AaM5u;
    }
    foreach ($stream_header as $addHeader) {
        $header[] = $addHeader;
    }
    AaM5u:
    $header[] = "Pragma: ";
    if (empty($header)) {
        goto HMuZ0;
    }
    $opts["http"]["header"] = $header;
    HMuZ0:
    if (empty($stream_content)) {
        goto bPEA6;
    }
    $stream_content = http_build_query($stream_content);
    if ($opts["http"]["method"] == "GET") {
        $url .= "?" . $stream_content;
        goto zUWl9;
    }
    $opts["http"]["content"] = $stream_content;
    zUWl9:
    bPEA6:
    if (!function_exists("curl_init")) {
        goto gN7Jf;
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Store Commander (https://www.storecommander.com)");
    if (empty($opts["http"]["header"])) {
        goto a_a_7;
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, $opts["http"]["header"]);
    a_a_7:
    curl_setopt($curl, CURLOPT_ENCODING, "gzip,deflate");
    curl_setopt($curl, CURLOPT_AUTOREFERER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if (!($opts["http"]["method"] == "POST")) {
        goto SXzhE;
    }
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    if (!isset($opts["http"]["content"])) {
        goto oo_bs;
    }
    parse_str($opts["http"]["content"], $post_data);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    oo_bs:
    SXzhE:
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $opts["http"]["ssl"]["verify_peer"]);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, (int) $opts["http"]["timeout"]);
    curl_setopt($curl, CURLOPT_TIMEOUT, (int) $opts["http"]["timeout"]);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 5);
    $content = curl_exec($curl);
    $info = curl_getinfo($curl);
    if (!($content === false)) {
        goto gtDYf;
    }
    $errorMessage = sprintf("file_get_contents_curl failed to download %s : (error code %d) %s", $url, curl_errno($curl), curl_error($curl));
    gtDYf:
    curl_close($curl);
    gN7Jf:
    if (!($content === false)) {
        goto Sl_Hq;
    }
    $ini_fopen = ini_get("allow_url_fopen");
    if (!in_array(strtolower($ini_fopen), array("on", "true", "1"))) {
        goto WOajs;
    }
    $stream_context = @stream_context_create($opts);
    try {
        $content = @file_get_contents($url, false, $stream_context);
    } catch (Exception $e) {
        $errorMessage = sprintf("simple file_get_contents failed to download %s : %s", $url, $e->getMessage());
    }
    WOajs:
    Sl_Hq:
    if (!($content === false)) {
        goto JM6qc;
    }
    SCI::addLog("StoreCommander sc_file_get_contents : " . $errorMessage, 1, null, null, null, true);
    $content = '';
    JM6qc:
    S9apv:
    return $content;
}
function makeCallToOurApi($url, $headers = array(), $posts = array(), $timeout = 30)
{
    global $access_details;
    $return = null;
    $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
    foreach ($headers as $key => $value) {
        if (strtolower($key) == "license" && $value == "#") {
            $headers[$key] = $licence;
            goto FQ1iw;
        }
        if (strtolower($key) == "urlcalling" && $value == "#") {
            $headers[$key] = $access_details["domain"];
            goto vv1nJ;
        }
        vv1nJ:
        FQ1iw:
    }
    foreach ($posts as $key => $value) {
        if (strtolower($key) == "license" && $value == "#") {
            $posts[$key] = $licence;
            goto VCaUU;
        }
        if (strtolower($key) == "urlcalling" && $value == "#") {
            $posts[$key] = $access_details["domain"];
            goto GSviX;
        }
        GSviX:
        VCaUU:
    }
    $ret = sc_file_get_contents("https://api.storecommander.com/" . $url, "POST", $posts, $headers, $timeout);
    $return = json_decode($ret, true);
    return $return;
}
function makeDefaultCallToOurApi($url, $additionnalHeaders = array(), $posts = array())
{
    $access_details = access_details();
    $license = SCI::getConfigurationValue("SC_LICENSE_KEY");
    $headers = array("x-sc-key:gt789zef132kiy789u13v498ve15nhry98", "x-sc-license:" . $license, "x-sc-referer:" . $access_details["domain"], "x-sc-subscription:1");
    if (empty($additionnalHeaders)) {
        goto q_0sJ;
    }
    foreach ($additionnalHeaders as $headerKey => $headerValue) {
        $headers[] = implode(":", array("x-sc-" . $headerKey, $headerValue));
    }
    q_0sJ:
    return makeCallToOurApi($url, $headers, $posts);
}
function scrape_phpinfo($all, $target)
{
    $all = explode($target, $all);
    if (!(count($all) < 2)) {
        $all = explode("\n", $all[1]);
        $all = trim($all[0]);
        if (!($target == "System")) {
            goto useYV;
        }
        $all = explode(" ", $all);
        $all = trim($all[strtolower($all[0]) == "windows" && strtolower($all[1]) == "nt" ? 2 : 1]);
        useYV:
        if (!($target == "SCRIPT_FILENAME")) {
            goto zuGSz;
        }
        $slash = "/";
        $all = explode($slash, $all);
        array_pop($all);
        $all = implode($slash, $all);
        zuGSz:
        if (!(substr($all, 1, 1) == "]")) {
            return $all;
        }
        return false;
    }
    return false;
}
function access_details()
{
    ob_start();
    @phpinfo(INFO_GENERAL);
    $phpinfo = ob_get_contents();
    ob_end_clean();
    $list = strip_tags($phpinfo);
    $access_details = array();
    $access_details["domain"] = scrape_phpinfo($list, "HTTP_HOST");
    $access_details["ip"] = scrape_phpinfo($list, "SERVER_ADDR");
    $access_details["directory"] = scrape_phpinfo($list, "SCRIPT_FILENAME");
    $access_details["server_hostname"] = scrape_phpinfo($list, "System");
    $access_details["server_ip"] = @gethostbyname($access_details["server_hostname"]);
    $access_details["domain"] = $access_details["domain"] && strlen($access_details["domain"]) < 50 ? $access_details["domain"] : $_SERVER["HTTP_HOST"];
    $access_details["ip"] = $access_details["ip"] && strlen($access_details["ip"]) < 50 ? $access_details["ip"] : $_SERVER["SERVER_ADDR"];
    $access_details["directory"] = $access_details["directory"] ? $access_details["directory"] : realpath("SC_DIR../");
    foreach ($access_details as $key => $value) {
        $access_details[$key] = $access_details[$key] ? $access_details[$key] : "Unknown";
    }
    return $access_details;
}
function arr_unique($array)
{
    return array_keys(array_flip($array));
}
function getImgPath($id_product, $id_image, $size = '', $format = "jpg")
{
    if (!($format != '')) {
        goto JtL0T;
    }
    $format = "." . $format;
    JtL0T:
    if (!(_s("CAT_PROD_IMG_OLD_PATH") || file_exists(_PS_PROD_IMG_DIR_ . $id_product . "-" . $id_image . ($size != '' ? "-" . $size : '') . $format))) {
        if (!version_compare(_PS_VERSION_, "1.5.2", ">=")) {
            $folder_array = str_split((string) $id_image);
            $folder = implode("/", $folder_array) . "/";
            if (file_exists(_PS_PROD_IMG_DIR_ . $folder)) {
                goto fq1gk;
            }
            $success = @mkdir(_PS_PROD_IMG_DIR_ . $folder, 493, true) || @chmod(_PS_PROD_IMG_DIR_ . $folder, 493);
            if (!($success && !file_exists(_PS_PROD_IMG_DIR_ . $folder . "index.php") && file_exists("_PS_PROD_IMG_DIR_index.php"))) {
                goto A3oQz;
            }
            @copy("_PS_PROD_IMG_DIR_index.php", _PS_PROD_IMG_DIR_ . $folder . "index.php");
            A3oQz:
            fq1gk:
            return $folder . $id_image . ($size != '' ? "-" . $size : '') . $format;
        }
        $folder_array = str_split((string) $id_image);
        $folder = implode("/", $folder_array) . "/";
        if (file_exists(_PS_PROD_IMG_DIR_ . $folder)) {
            goto OtoVa;
        }
        $success = @mkdir(_PS_PROD_IMG_DIR_ . $folder, 493, true) || @chmod(_PS_PROD_IMG_DIR_ . $folder, 493);
        if (!($success && !file_exists(_PS_PROD_IMG_DIR_ . $folder . "index.php") && file_exists("_PS_PROD_IMG_DIR_index.php"))) {
            goto mAl3t;
        }
        @copy("_PS_PROD_IMG_DIR_index.php", _PS_PROD_IMG_DIR_ . $folder . "index.php");
        mAl3t:
        OtoVa:
        return $folder . $id_image . ($size != '' ? "-" . $size : '') . $format;
    }
    return $id_product . "-" . $id_image . ($size != '' ? "-" . $size : '') . $format;
}
function fixLevelDepth()
{
    Db::getInstance()->Execute("UPDATE `_DB_PREFIX_category` SET `level_depth`=1 WHERE `id_parent`=1");
    $i = 1;
    T42sd:
    if (!($i <= 20)) {
        // [PHPDeobfuscator] Implied return
        return;
    }
    $res = Db::getInstance()->ExecuteS("SELECT id_category     FROM _DB_PREFIX_category     WHERE level_depth=" . (int) $i);
    $arr = array();
    foreach ($res as $row) {
        $arr[] = $row["id_category"];
    }
    if (!count($arr)) {
        goto h_iAB;
    }
    $sql = "UPDATE _DB_PREFIX_category SET `level_depth`=" . (int) ($i + 1) . " WHERE id_parent IN (" . psql(join(",", $arr)) . ")";
    Db::getInstance()->Execute($sql);
    h_iAB:
    ++$i;
    goto T42sd;
}
function arrayDiffEmulation($arrayFrom, $arrayAgainst)
{
    $arrayAgainst = array_flip($arrayAgainst);
    foreach ($arrayFrom as $key => $value) {
        if (!isset($arrayAgainst[$value])) {
            goto S_SaX;
        }
        unset($arrayFrom[$key]);
        S_SaX:
    }
    return $arrayFrom;
}
function getGridImageHeight()
{
    return 80;
}
function cleanXMLContent($buffer)
{
    if (strpos($buffer, "<?xml") !== false) {
        return ltrim($buffer);
    }
    return $buffer;
}
function truncate($string, $max_length = 30, $replacement = '', $trunc_at_space = false)
{
    $max_length -= strlen($replacement);
    $string_length = strlen($string);
    if (!($string_length <= $max_length)) {
        if (!($trunc_at_space && ($space_position = strrpos($string, " ", $max_length - $string_length)))) {
            goto a8Lr7;
        }
        $max_length = $space_position;
        a8Lr7:
        return substr_replace($string, $replacement, $max_length);
    }
    return $string;
}
function randomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    $i = 0;
    oKLB7:
    if (!($i < 8)) {
        return implode($pass);
    }
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
    ++$i;
    goto oKLB7;
}
function scanDirectory($Directory)
{
    $return = array();
    $MyDirectory = opendir($Directory) or die("Erreur");
    yPr3Z:
    if (!($Entry = @readdir($MyDirectory))) {
        closedir($MyDirectory);
        return $return;
    }
    if (is_dir($Directory . "/" . $Entry) && $Entry != "." && $Entry != "..") {
        $return[] = array("name" => $Entry, "children" => scanDirectory($Directory . "/" . $Entry));
        goto rgh0F;
    }
    if ($Entry != "." && $Entry != "..") {
        $return[] = array("name" => $Entry, "children" => array());
        goto l0ohK;
    }
    l0ohK:
    rgh0F:
    goto yPr3Z;
}
function isJson($string)
{
    json_decode($string);
    return json_last_error() == JSON_ERROR_NONE;
}
function isUrl($string)
{
    $parsed_url = parse_url($string);
    if (!(array_key_exists("scheme", $parsed_url) && in_array($parsed_url["scheme"], array("http", "https")))) {
        return false;
    }
    return $parsed_url;
}
$arrayFlipCache = array();
function sc_in_array($valueToCheck, $sourceArray, $variableName)
{
    global $arrayFlipCache;
    if (!($valueToCheck == '')) {
        goto jM_qz;
    }
    unset($arrayFlipCache[$variableName]);
    jM_qz:
    if (!(!empty($sourceArray) && !sc_array_key_exists($variableName, $arrayFlipCache) || isset($arrayFlipCache[$variableName]) && count($arrayFlipCache[$variableName]) != count($sourceArray))) {
        goto T1mbh;
    }
    $arrayFlipCache[$variableName] = array_fill_keys($sourceArray, 1);
    T1mbh:
    return isset($arrayFlipCache[$variableName][$valueToCheck]);
}
function sc_phpversion($onlyFourNumber = true)
{
    $phpVersion = phpversion();
    if (!($onlyFourNumber && preg_match("#(\\d{1,3}\\.\\d{1,3}\\.\\d{1,3})#", $phpVersion, $matches))) {
        return str_replace("~", '', $phpVersion);
    }
    return $matches[0];
}
function checkAndGetImgExtension($file)
{
    $return = false;
    $extensions = array("png", "jpg", "jpeg", "gif");
    foreach ($extensions as $extension) {
        if (!file_exists($file . "." . $extension)) {
            if (!file_exists($file . "." . strtoupper($extension))) {
            }
            $return = strtoupper($extension);
            goto zfkMr;
        }
        $return = $extension;
        goto zfkMr;
    }
    zfkMr:
    return $return;
}
function sc_array_key_exists($key, &$array)
{
    $return = false;
    if (isset($array[$key])) {
        $return = true;
        goto VKiQm;
    }
    if (is_array($array) && array_key_exists($key, $array)) {
        $return = true;
        $array[$key] = '';
        goto tuFys;
    }
    tuFys:
    VKiQm:
    return $return;
}
function getIcon($item)
{
    $icon_array_link = array("accept.png" => "fa fa-check-circle green", "accept_grey.png" => "fad fa-check-circle grey", "accessory.png" => "fad fa-bags-shopping blue", "add.png" => "fa fa-plus-circle green", "add_big.png" => "fa fa-plus-circle yellow", "add_dis.png" => "fad fa-plus-circle grey", "add_ps.png" => "fa fa-prestashop", "ajax-loader.gif" => "fas fa-spinner fa-pulse", "ajax-loader16.gif" => "fas fa-spinner fa-pulse", "alert.gif" => "fad fa-exclamation-triangle orange", "application_form_magnify.png" => "fa fa-search blue", "application_lightning.png" => "fa fa-bolt yellow", "application_lightning_delete.png" => "fa fa-eraser red", "application_lightning_dis.png" => "fad fa-bolt grey", "application_side_list.png" => "fad fa-th-list blue", "application_side_tree.png" => "fad fa-folder-tree blue", "application_tile_vertical.png" => "fad fa-text-height blue", "application_view_list.png" => "fad fa-list-alt blue", "arrow_divide.png" => "fad fa-folder-plus green", "arrow_down.png" => "fa fa-arrow-down red", "arrow_in.png" => "fa fa-compress-arrows-alt green", "arrow_out.png" => "fa fa-expand-arrows-alt green", "arrow_refresh.png" => "fa fa-sync green", "arrow_transfert.png" => "fa fa-exchange-alt green", "arrow_up.png" => "fa fa-arrow-up green", "asterisk_yellow.png" => "fa fa-asterisk yellow", "attach.png" => "fa fa-paperclip", "attach_add.png" => "fa fa-plus-circle green", "attach_del.png" => "fa fa-minus-circle red", "basket.png" => "fad fa-shopping-basket grey", "bin_closed.png" => "fad fa-trash grey", "bin_empty.png" => "far fa-trash grey", "blue_folder.png" => "fa fa-folder blue", "blue_folder_synchro.png" => "fad fa-retweet blue", "box.png" => "fa fa-cube", "bricks.png" => "fa fa-cubes", "bug.png" => "fa fa-bug red", "building.png" => "fa fa-building", "building_add.png" => "fa fa-plus-circle green", "building_delete.png" => "fa fa-minus-circle red", "building_edit.png" => "fad fa-edit yellow", "building_go.png" => "fad fa-external-link green", "calculator.png" => "fa fa-calculator", "calculator_edit.png" => "fad fa-edit yellow", "calendar.png" => "fa fa-calendar-alt", "cart.png" => "fa fa-shopping-cart", "cart_add.png" => "fad fa-cart-plus", "cart_delete.png" => "fa fa-minus-circle red", "cart_go.png" => "fad fa-external-link green", "cart_ps.png" => "fad fa-ramp-loading green", "cart_bo_ps.png" => "fa fa-prestashop", "catalog.png" => "fa fa-folder yellow", "catalog_edit.png" => "fad fa-edit yellow", "chart_bar.png" => "fa fa-chart-bar", "chart_curve.png" => "fa fa-chart-area", "chart_organisation_add.png" => "fad fa-link green", "chart_organisation_add_v.png" => "fad fa-link yellow", "chart_organisation_delete_v.png" => "fad fa-unlink red", "checkbox_false.png" => "far fa-square", "checkbox_true.png" => "far fa-check-square", "clock.png" => "fa fa-clock", "cog.png" => "fa fa-cog", "cog_delete.png" => "fa fa-minus-circle red", "cog_edit.png" => "fad fa-sliders-v-square yellow", "cog_go.png" => "fad fa-tools green", "cols_3.png" => "fa fa-bars fa-rotate-90 green", "combinations.gif" => "fa fa-sitemap", "combinations_ps_create.gif" => "fad fa-palette green", "combinations_ps_create.png" => "fad fa-external-link green", "comments.png" => "fad fa-comments", "configuring.png" => "fad fa-tools", "control_play_blue.png" => "fad fa-play-circle blue", "control_stop_blue.png" => "fad fa-stop-circle blue", "cup.png" => "fad fa-mug-hot", "cursor.png" => "fa fa-mouse-pointer", "cut.png" => "fa fa-cut", "database_add.png" => "fad fa-sign-in green", "database_delete.png" => "fa fa-database red", "database_gear.png" => "fad fa-cog yellow", "database_go.png" => "fad fa-sign-out fa-flip-horizontal green", "database_refresh.png" => "fad fa-sync green", "delete.gif" => "fa fa-minus-circle red", "delete_big.png" => "fa fa-minus-circle red", "description.png" => "fad fa-align-left", "disk.png" => "fa fa-save blue", "email.png" => "fad fa-envelope blue", "email_edit.png" => "fad fa-envelope-open yellow", "email_go.png" => "fad fa-paper-plane green", "eservices_cp.png" => "fad fa-game-board-alt fa-rotate-90", "export.png" => "fad fa-file-export", "eye.png" => "fa fa-eye", "filter.png" => "fa fa-filter", "filter_delete.png" => "fa fa-eraser red", "filter_show.png" => "fad fa-eye green", "flag_blue.png" => "fad fa-flag blue", "folder_add.png" => "fa fa-folder-plus green", "folder_delete.png" => "fa fa-trash-alt red", "folder_find.png" => "fa fa-file-search blue", "folder_go.png" => "fa fa-external-link green", "folder_grey.png" => "fad fa-folder grey", "folder_grey_delete.png" => "fad fa-folder-times red", "folder_grey_find.png" => "fad fa-file-search blue", "folder_grey_go.png" => "fad fa-external-link green", "folder_table.png" => "fa fa-folder-open", "folder_synchro.png" => "fad fa-sync", "folder_wrench.png" => "fa fa-cog yellow", "group.png" => "fa fa-user-friends", "group_add.png" => "fas fa-plus-circle green", "group_delete.png" => "fa fa-minus-circle red", "group_link.png" => "fad fa-users-class yellow", "heart.png" => "fa fa-heart red", "help.png" => "fad fa-question-circle blue", "html_delete.png" => "fa fa-eraser red", "information.png" => "fad fa-info-circle blue", "information_big.png" => "fa fa-info blue", "ipod_cast.png" => "fad fa-scanner yellow", "key.png" => "fad fa-key", "key_add.png" => "fa fa-plus-circle green", "layers.png" => "fa fa-list-ol green", "layers_dis.png" => "fa fa-list-ol grey", "layout.png" => "fad fa-browser blue", "layout_delete.png" => "fa fa-minus-circle red", "lightbulb.png" => "fa fa-lightbulb-on yellow", "lightbulb_off.png" => "fad fa-lightbulb grey", "lightning.png" => "fa fa-bolt yellow", "lightning_go.png" => "fad fa-external-link green", "link_add.png" => "fa fa-link green", "loading.gif" => "fa fa-spinner fa-pulse", "lorry.png" => "fad fa-truck", "lorry_add.png" => "fa fa-plus-circle green", "lorry_delete.png" => "fa fa-minus-circle red", "medal_gold_delete.png" => "fad fa-medal red", "merge.png" => "fad fa-sitemap fa-rotate-90 blue", "money.png" => "fad fa-money-bill-alt", "money_add.png" => "fa fa-plus-circle green", "money_delete.png" => "fa fa-minus-circle red", "money_euro.png" => "fa fa-euro-sign yellow", "package.png" => "fa fa-cube yellow", "page_code.png" => "fad fa-file-code blue", "page_copy.png" => "fad fa-copy blue", "page_copy2.png" => "fa fa-copy blue", "page_delete.png" => "fa fa-minus-circle red", "page_edit.png" => "fad fa-edit", "page_excel.png" => "fad fa-file-csv green", "page_find.png" => "fad fa-file-search blue", "page_pdf.png" => "fad fa-file-pdf blue", "page_save.png" => "fa fa-save blue", "page_white.png" => "fad fa-file white", "page_white_edit.png" => "fad fa-edit", "page_white_error.png" => "fad fa-exclamation-triangle orange", "pdf.gif" => "fad fa-file-pdf", "percent.png" => "fa fa-percent", "picture.png" => "fad fa-image", "picture_add.png" => "fa fa-plus-circle green", "picture_delete.png" => "fa fa-minus-circle red", "picture_go.png" => "fad fa-external-link green", "play.png" => "fad fa-play-circle blue", "plugin_link.png" => "fa fa-puzzle-piece green", "printer.png" => "fad fa-print", "random.png" => "fa fa-random", "readonly.png" => "fad fa-lock-alt", "ruby.png" => "fa fa-gem red", "script_add.png" => "fa fa-plus-circle green", "script_delete.png" => "fa fa-minus-circle red", "script_edit.png" => "fad fa-edit yellow", "script_go.png" => "fad fa-external-link green", "script_palette.png" => "fad fa-palette", "search.gif" => "fa fa-search", "security.png" => "fa fa-shield-alt", "segmentation.png" => "fad fa-chart-pie blue", "server.png" => "fad fa-server", "shape_move_front.png" => "fad fa-bring-front blue", "sitemap_color.png" => "fa fa-sitemap white", "table_add.png" => "fa fa-plus-circle green", "table_delete.png" => "fa fa-minus-circle red", "table_edit.png" => "fad fa-edit yellow", "table_gear.png" => "fad fa-ruler-triangle", "table_go.png" => "fad fa-external-link green", "table_lightning.png" => "fad fa-bolt green", "table_multiple.png" => "fa fa-layer-group", "table_relationship.png" => "fad fa-american-sign-language-interpreting blue", "table_row_delete.png" => "fa fa-minus-circle red", "table_row_delete_grey.png" => "fad fa-undo grey", "table_row_insert.png" => "fa fa-plus-circle green", "table_save.png" => "fa fa-save blue", "tag_blue.png" => "fad fa-tags", "tag_blue_add.png" => "fa fa-plus-circle green", "tag_blue_delete.png" => "fa fa-minus-circle red", "tag_blue_edit.png" => "fad fa-edit yellow", "tags.gif" => "fad fa-clouds", "text_list_bullets.png" => "fad fa-list-ul", "text_list_numbers.png" => "fad fa-list-ol", "textfield_add.png" => "fa fa-plus-circle green", "textfield_delete.png" => "fa fa-minus-circle red", "textfield_key.png" => "fad fa-key yellow", "textfield_rename.png" => "fad fa-i-cursor", "tick.png" => "fa fa-check green", "time.png" => "fa fa-clock", "tree_id_categ_default.png" => "fad fa-sitemap", "user.png" => "fa fa-user", "user_comment.png" => "fad fa-comment-lines", "user_delete.png" => "fa fa-minus-circle red", "user_edit.png" => "fad fa-edit yellow", "user_go.png" => "fad fa-user-shield green", "user_go_ps.png" => "fa fa-prestashop", "user_orange_go.png" => "fad fa-walking orange", "user_ps.png" => "fa fa-prestashop", "wand.png" => "fa fa-magic yellow", "world_go.png" => "fad fa-globe-europe green", "wrench_orange.png" => "fa fa-wrench orange", "zoom.png" => "fad fa-search", "zoom_in.png" => "fad fa-search-plus", "i.gif" => "fad fa-file-image", "i.jpg" => "fad fa-file-image", "fix_my_prestashop.png" => "fad fa-monitor-heart-rate", "shop_cleaning_optimization.png" => "fad fa-tachometer-alt-fastest", "customer_group.png" => "fad fa-user-friends", "specific_prices.png" => "fad fa-money-check-edit-alt", "categories.png" => "fad fa-folder-tree", "default_category.png" => "fad fa-at", "stats.png" => "fad fa-analytics", "seo.png" => "fad fa-at", "download_file.png" => "fad fa-cloud-download-alt", "suppliers.png" => "fad fa-parachute-box", "prop_combinations.gif" => "fad fa-ball-pile", "invoice.png" => "fad fa-file-invoice", "order_slip.png" => "fad fa-file-invoice-dollar", "history.png" => "fad fa-book", "cart_go_ps.png" => "fad fa-eye", "note.png" => "fad fa-pen-fancy", "address.png" => "fad fa-map-marked-alt", "import.png" => "fad fa-sign-in", "disable.png" => "fa fa-minus", "folder_red.png" => "fa fa-folder red", "folder_redgrey.png" => "fa fa-folder redgrey", "amazon.png" => "fad fa-badge-dollar", "cdiscount.png" => "fad fa-badge-dollar", "feedbiz.png" => "fad fa-badge-dollar", "user_ps_view.png" => "fad fa-eye", "note_edit.png" => "fa fa-sticky-note", "phone_add.png" => "fad fa-phone-laptop", "lorry_url.png" => "fad fa-rabbit-fast", "image_detail.png" => "fad fa-ruler-combined");
    return $icon_array_link[$item];
}
function recursive_copy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    BFyIp:
    if (!($file = readdir($dir))) {
        closedir($dir);
        // [PHPDeobfuscator] Implied return
        return;
    }
    if (!($file != "." && $file != "..")) {
        goto CT6AH;
    }
    if (is_dir($src . "/" . $file)) {
        recursive_copy($src . "/" . $file, $dst . "/" . $file);
        goto gbb4B;
    }
    copy($src . "/" . $file, $dst . "/" . $file);
    gbb4B:
    CT6AH:
    goto BFyIp;
}
function getShopProtocol()
{
    if (version_compare(_PS_VERSION_, "1.5.0.2", ">=")) {
        return Tools::getShopProtocol();
    }
    $proto = "http";
    if (isset($_SERVER["HTTPS"])) {
        $strl = Tools::strtolower($_SERVER["HTTPS"]);
        if (!in_array($strl, array(1, "on"))) {
            goto Mj4eW;
        }
        $proto = "https";
        Mj4eW:
        goto TwTtW;
    }
    if (isset($_SERVER["SSL"])) {
        $strl = Tools::strtolower($_SERVER["SSL"]);
        if (!in_array($strl, array(1, "on"))) {
            goto wGcX4;
        }
        $proto = "https";
        wGcX4:
        goto TwTtW;
    }
    if (isset($_SERVER["REDIRECT_HTTPS"])) {
        $strl = Tools::strtolower($_SERVER["REDIRECT_HTTPS"]);
        if (!in_array($strl, array(1, "on"))) {
            goto MKy52;
        }
        $proto = "https";
        MKy52:
        goto TwTtW;
    }
    if (isset($_SERVER["HTTP_SSL"])) {
        $strl = Tools::strtolower($_SERVER["HTTP_SSL"]);
        if (!in_array($strl, array(1, "on"))) {
            goto DUPj0;
        }
        $proto = "https";
        DUPj0:
        goto TwTtW;
    }
    if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"])) {
        $strl = Tools::strtolower($_SERVER["HTTP_X_FORWARDED_PROTO"]) == "https";
        if (!in_array($strl, array(1, "on"))) {
            goto sFk59;
        }
        $proto = "https";
        sFk59:
        goto uGuKq;
    }
    uGuKq:
    TwTtW:
    return $proto . "://";
}
function runProcessOneTimeByDay()
{
    $access_details = access_details();
    $k_path = "/var/www/html";
    $k = str_replace(array(".", "/", "\$"), '', crypt(uniqid($k_path, true), hash("sha256", $k_path)));
    SCI::updateConfigurationValue("SC_SALT", $k);
    $unique_key_exists = SCI::getConfigurationValue("SC_UNIQUE_ID");
    if (!empty($unique_key_exists)) {
        goto vxki6;
    }
    $unique_key_exists = md5(uniqid($access_details["domain"], true));
    SCI::updateConfigurationValue("SC_UNIQUE_ID", $unique_key_exists);
    vxki6:
    $localVersions = json_decode(SCI::getConfigurationValue("SC_VERSIONS_LAST", 0), true);
    $sc_timezone = SCI::getConfigurationValue("PS_TIMEZONE");
    makeCallToOurApi("Analysis/Serv", array(), array("LICENSE" => "#", "DOMAIN" => $access_details["domain"] . __PS_BASE_URI__, "SC_UNIQUE_ID" => $unique_key_exists, "timezone" => !empty($sc_timezone) ? $sc_timezone : date_default_timezone_get(), "php_exec" => (int) function_exists("exec"), "php_version" => (string) sc_phpversion(), "ps_version" => "_PS_VERSION_", "sc_version" => (string) $localVersions["SC-Pack1"]["version"]));
    $partner_xml_file = "SC_PS_MODULE_PATH_DIRmodule_sc.xml";
    $dom = new DOMDocument("1.0", "UTF-8");
    $root = $dom->createElement("modules");
    $sc_node = $dom->createElement("storecommander");
    $name_node = $dom->createElement("name", "Store Commander");
    $sc_node->appendChild($name_node);
    $version_node = $dom->createElement("version", $localVersions["SC-Pack1"]["version"]);
    $sc_node->appendChild($version_node);
    $sub_node = $dom->createElement("is_sub", IS_SUB);
    $sc_node->appendChild($sub_node);
    $ps_unique_id = $dom->createElement("ps_unique_id", $unique_key_exists);
    $sc_node->appendChild($ps_unique_id);
    $last_used_node = $dom->createElement("date_last_used", date("Y-m-d"));
    $sc_node->appendChild($last_used_node);
    $last_check_date_node = $dom->createElement("last_fix_check_date", SCI::getConfigurationValue("SC_FIXMYPS_LAST_CHECK"));
    $sc_node->appendChild($last_check_date_node);
    $partner_node = $dom->createElement("partner");
    $sc_node->appendChild($partner_node);
    $id_partner_in_node = '';
    $res_api = makeCallToOurApi("getPartnerId", array(), array("LICENSE" => "#"));
    if (!(!empty($res_api["code"]) && $res_api["code"] == "200")) {
        goto wrzsI;
    }
    $id_partner_in_node = $res_api["result"];
    wrzsI:
    $id_node = $dom->createElement("id", $id_partner_in_node);
    $partner_node->appendChild($id_node);
    $root->appendChild($sc_node);
    $dom->appendChild($root);
    $dom->formatOutput = true;
    $dom->save($partner_xml_file);
    $ork_folder = "ork";
    $src = "SC_DIRautoinstall/ork";
    if (!file_exists($src)) {
        goto PbT4x;
    }
    $dst = SC_PS_MODULE_PATH_DIR . $ork_folder;
    if (file_exists($dst)) {
        goto Co2Pj;
    }
    recursive_copy($src, $dst);
    Co2Pj:
    PbT4x:
    $protocol = getShopProtocol();
    if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
        $sql = "SELECT GROUP_CONCAT(DISTINCT CONCAT(\"" . pSQL($protocol) . "\",domain) SEPARATOR \",\") as domain\n                FROM " . _DB_PREFIX_ . "shop_url\n                WHERE active = 1";
        $domains = (string) Db::getInstance()->getValue($sql);
        goto xblMi;
    }
    $current_domain = ToolsCore::getShopDomainSsl();
    $domains = (string) $protocol . $current_domain;
    xblMi:
    Configuration::updateValue("SC_CORS_DOMAINS", json_encode(explode(",", $domains)), false, 0, 0);
}
function getIntercomHash($sc_agent)
{
    if (empty($sc_agent->email)) {
        goto E2Lao;
    }
    $prohibited = array("bf33305e172dc00e97c0a0d0e1ab78bf65ce49a75cd5256847aef9bc6a44b126", "bbf6cf38deabb95fc07ea44ebede08f2ddeed58e6a5078f23209f54e776801e8", "f02355e98b79025a39a123a4cacf2dd4d2bcb4975856616f216a3ad84db8c73c", "d19280b638b9e9d836f0a7bb21f75340f8f23bf76ae0bd9f9900bfe257bf018e", "08e995d6a15b14f54fd1b639719f5f618b6e235e16f8b3438ea298665509a867", "46ba367263dde1f014993e63727f22e947a54ac83f510192e67bbed76f2f54b5", "9e739c6553eaffe1afbb5b65ce6b30684c82bf158ba9af6e4d7f6577602cc24f", "f235228a296f26a6b5e5d62a5239b90c5d9a1b3ca99b098889bcd7236685a64a", "51c77682ed6129850a663194be5584c5562d7edda3d5b05d0007a8967f48acd3", "6be7f45a096896d931fbd2cbf62b2b35f910646f8126f4be38cfc6f4b8c0ee2a", "9b30af9f2d2e6e4d4526cac42b52a675d391b4a3d970535ece7a938ab056395c", "0491c56520ccfc7f181defa463092ac3c9c3d376fd781636619b78939d1fed06", "b1154aaedd99a1279a6121cffe2d31c43733c5de9d1053f61a53904f0474fa4b", "f949be3ec4f4f8044ec134212d598bbe110814a1efd51591282bd074335bc2e8", "49a441a7ca49402e7dccff2d5799f0d378c2cb39bb29fc75625a38e15da32afb");
    $hash = hash_hmac("sha256", $sc_agent->email, "CaOxdDPDRnMur7PTg8tCwydFdMypdAA3AFZAIdf7");
    if (in_array($hash, $prohibited)) {
        E2Lao:
        return null;
    }
    return $hash;
}
function SCMSCleanPositionsInAllShops($id_category_parent = null)
{
    $return = false;
    if (empty($id_category_parent)) {
        goto Xq5me;
    }
    if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
        $id_shop_list = Shop::getShops(false, null, true);
        foreach ($id_shop_list as $id_shop) {
            $result = Db::getInstance()->executeS("SELECT c.`id_category`\n                                                            FROM `_DB_PREFIX_category` c\n                                                            LEFT JOIN `_DB_PREFIX_category_shop` cs\n                                                                ON (c.`id_category` = cs.`id_category`\n                                                                    AND cs.`id_shop` = " . (int) $id_shop . ")\n                                                            WHERE c.`id_parent` = " . (int) $id_category_parent . "\n                                                            ORDER BY cs.`position`");
            $count = count($result);
            if (!($count > 0)) {
                goto QnRcG;
            }
            $i = 0;
            NutCK:
            if (!($i < $count)) {
                QnRcG:
            }
            $sql = "UPDATE `_DB_PREFIX_category` c\n                            LEFT JOIN `_DB_PREFIX_category_shop` cs\n                                ON (c.`id_category` = cs.`id_category`\n                                    AND cs.`id_shop` = " . (int) $id_shop . ")\n                            SET cs.`position` = " . (int) $i . "\n                            WHERE c.`id_parent` = " . (int) $id_category_parent . "\n                            AND c.`id_category` = " . (int) $result[$i]["id_category"];
            $return &= Db::getInstance()->execute($sql);
            ++$i;
            goto NutCK;
        }
        goto aX_FB;
    }
    $result = Db::getInstance()->executeS(" SELECT `id_category`\n                                                        FROM `_DB_PREFIX_category`\n                                                        WHERE `id_parent` = " . (int) $id_category_parent . "\n                                                        ORDER BY `position`");
    $count = count($result);
    if (!($count > 0)) {
        goto zhfHM;
    }
    $i = 0;
    ZSztS:
    if (!($i < $count)) {
        zhfHM:
        aX_FB:
        Xq5me:
        return $return;
    }
    $sql = "UPDATE `_DB_PREFIX_category`\n                            SET `position` = " . (int) $i . "\n                            WHERE `id_parent` = " . (int) $id_category_parent . "\n                            AND `id_category` = " . (int) $result[$i]["id_category"];
    $return &= Db::getInstance()->execute($sql);
    ++$i;
    goto ZSztS;
}
function cleanScript($script)
{
    $prevent_vars = array("\$_FILES", "\$_ENV");
    $prevent_functions = array("eval", "exec", "passthru", "shell_exec", "system", "proc_open", "popen", "curl_exec", "curl_multi_exec", "parse_ini_file", "show_source", "chmod", "chown", "chgrp", "rename", "mkdir", "rmdir", "unlink", "fopen", "file_put_contents", "file_get_contents");
    foreach ($prevent_functions as $func) {
        $script = preg_replace("#" . $func . "\\s*\\(\\s*(.*?)\\s*\\)#", '', $script);
    }
    return str_replace($prevent_vars, '', $script);
}
function countChars($txt)
{
    $pattern = "/(\\n|\\r)/m";
    $cleanedTxt = preg_replace($pattern, '', strip_tags($txt));
    $cleanedTxt = html_entity_decode($cleanedTxt);
    if (!function_exists("iconv_strlen")) {
        return Tools::strlen($cleanedTxt);
    }
    return iconv_strlen($cleanedTxt);
}
function getScExternalLink($key)
{
    return "https://www.storecommander.com/redir_ps.php?t=" . time() . "&dest=" . $key . "&iso=" . SC_ISO_LANG_FOR_EXTERNAL;
}
if (!isset($_GET["transport"])) {
    function removeOldScItems()
    {
        $oldScToolsFolderList = array("fixmyprestashop", "win_grids_editor", "win_grids_editor_pro", "pmcachemanager", "multiplefeatures", "segmentation", "segmentproperties", "affiliation");
        foreach ($oldScToolsFolderList as $scToolsFolderPath) {
            if (!file_exists(SC_TOOLS_DIR . $scToolsFolderPath)) {
                goto y38Sl;
            }
            dirRemove(SC_TOOLS_DIR . $scToolsFolderPath);
            y38Sl:
        }
    }
    function exitWithXmlMessageForGrid($message)
    {
        echo "<rows>\n    <head>\n        <beforeInit>\n            <call command=\"attachHeader\"><param><![CDATA[]]></param></call>\n        </beforeInit>\n        <column id=\"data\" width=\"*\" type=\"ro\" align=\"center\" sort=\"int\"></column>\n    </head>\n    <row id=\"0\">\n        <cell><![CDATA[{$message}]]></cell>\n    </row>\n</rows>";
        die;
    }
    function scDateTime($timestamp, $timeZone)
    {
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        try {
            $date->setTimezone(new DateTimeZone($timeZone));
        } catch (Throwable $e) {
            return $date;
        }
        return $date;
    }
    function getFileMime($filePath)
    {
        if (function_exists("finfo_open")) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $filePath);
            finfo_close($finfo);
            return $mime;
        }
        if (function_exists("mime_content_type")) {
            return mime_content_type($filePath);
        }
        if (function_exists("exec")) {
            return trim(exec("file -b --mime-type " . escapeshellarg($filePath)));
        }
        AUe2u:
        return false;
    }
    function isImage($filesInfo, $formUpload = false)
    {
        if (!$formUpload) {
            goto YoWe2;
        }
        if (!(!is_uploaded_file($filesInfo["tmp_name"]) || $filesInfo["error"] !== UPLOAD_ERR_OK)) {
            YoWe2:
            $mimeByExtension = array("jpeg" => image_type_to_mime_type(IMAGETYPE_JPEG), "jpg" => image_type_to_mime_type(IMAGETYPE_JPEG), "png" => image_type_to_mime_type(IMAGETYPE_PNG), "gif" => image_type_to_mime_type(IMAGETYPE_GIF), "bmp" => image_type_to_mime_type(IMAGETYPE_BMP));
            if (!version_compare(phpversion(), "7.1", ">=")) {
                goto asyLA;
            }
            $allowedMimes["webp"] = image_type_to_mime_type(IMAGETYPE_WEBP);
            asyLA:
            $fileDetail = pathinfo($filesInfo["name"]);
            if (isset($fileDetail["extension"])) {
                $extension = $fileDetail["extension"];
                if (isset($mimeByExtension[$extension])) {
                    $realMime = getFileMime($filesInfo["tmp_name"]);
                    $typeMimeFromExtension = $mimeByExtension[$extension];
                    if (!($typeMimeFromExtension !== $realMime)) {
                        switch ($typeMimeFromExtension) {
                            case "image/jpeg":
                                return (bool) imagecreatefromjpeg($filesInfo["tmp_name"]);
                            case "image/png":
                                return (bool) imagecreatefrompng($filesInfo["tmp_name"]);
                            case "image/gif":
                                return (bool) imagecreatefromgif($filesInfo["tmp_name"]);
                            case "image/bmp":
                                return (bool) imagecreatefrombmp($filesInfo["tmp_name"]);
                            case "image/webp":
                                return (bool) imagecreatefromwebp($filesInfo["tmp_name"]);
                            default:
                                return false;
                        }
                        // [PHPDeobfuscator] Implied return
                        return;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }
    function isCsv($filesInfo, $formUpload = false)
    {
        if (!$formUpload) {
            goto JN5Lx;
        }
        if (!(!is_uploaded_file($filesInfo["tmp_name"]) || $filesInfo["error"] !== UPLOAD_ERR_OK)) {
            JN5Lx:
            $fileDetail = pathinfo($filesInfo["name"]);
            if (isset($fileDetail["extension"])) {
                $extension = $fileDetail["extension"];
                if (!($extension !== "csv")) {
                    $realMime = getFileMime($filesInfo["tmp_name"]);
                    $csvMimes = array("text/x-comma-separated-values", "text/comma-separated-values", "application/octet-stream", "application/vnd.ms-excel", "application/x-csv", "text/x-csv", "text/csv", "application/csv", "application/excel", "application/vnd.msexcel", "text/plain", "text/html", "text/x-Algol68", "message/news");
                    if (in_array($realMime, $csvMimes)) {
                        return true;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }
    function generateToken($string = null, $size = null)
    {
        if ($string) {
            goto Zm6RE;
        }
        $string = date("YmdHis") . "token" . rand(0, 100);
        Zm6RE:
        if (!$size) {
            return hash("sha256", $string . _COOKIE_KEY_);
        }
        return Tools::substr(hash("sha256", $string), 0, $size);
    }
    function cleanLineBreakForHtmlFieldInGrid($html)
    {
        $patternList = array("#[\r|\n]?(<br[ ]?[\\/]?>)[\r|\n]?#i" => "\$1", "#(<\\/\\w+>)[\r|\n]{1,5}(<\\w+>)[\r|\n]?#i" => "\$1\$2", "#(<\\w+>)[\r|\n]{1,5}(.*)(<\\/\\w+>)#i" => "\$1\$2\$3");
        foreach ($patternList as $pattern => $replacement) {
            $html = preg_replace($pattern, $replacement, $html);
        }
        return trim($html);
    }
    if (!isset($_GET["time"])) {
        const SC_VERSION = "2023-09-13";
        const STORE_COMMANDER = 1;
        if (!isset($_GET["setDEBUG"])) {
            goto O1lY1;
        }
        if ($_GET["setDEBUG"] == 1) {
            @file_put_contents("../DEBUG", '');
            goto s1NKQ;
        }
        @unlink("../DEBUG");
        s1NKQ:
        O1lY1:
        if (file_exists("../DEBUG") || isset($_GET["DEBUG"]) || strpos(SC_DIR, "SCBETA") !== false) {
            define("SC_BETA", true);
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
            @ini_set("display_errors", "on");
            $debug = true;
            goto GgOkB;
        }
        define("SC_BETA", false);
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        @ini_set("display_errors", "off");
        $debug = false;
        GgOkB:
        if (defined("SC_TOOLS_DIR")) {
            goto eQaBD;
        }
        define("SC_TOOLS_DIR", realpath("SC_DIR../SC_TOOLS") . "/");
        eQaBD:
        if (file_exists(SC_TOOLS_DIR)) {
            define("SC_TOOLS", true);
            $sc_tools_list = getToolsList();
            goto bsunK;
        }
        define("SC_TOOLS", false);
        bsunK:
        $error_access = false;
        $writePermissionsOCT = substr(decoct(fileperms(realpath("SC_PS_PATH_DIRimg/p"))), -3);
        $files = array("/var/www/html/help.php", "/var/www/html/../cat/cat_grid.php", "/var/www/html/../ord/ord_grid.php", "/var/www/html/../all/win-trends/all_win-trendsshop_init.js.php", "/var/www/html/../cat/productcompatibility/cat_productcompatibility_init.js.php");
        foreach ($files as $file) {
            if (!file_exists($file)) {
                goto iN5Ts;
            }
            if (!true) {
                goto QPo0H;
            }
            if (is_writable($file)) {
                goto r0JPI;
            }
            $error_access = true;
            r0JPI:
            QPo0H:
            iN5Ts:
        }
        if (!$error_access) {
            require_once "SC_DIRlib/php/settings.php";
            require_once "SC_DIRlib/php/permissions.php";
            if (empty($licence)) {
                $demos = array();
                $demos["f7bb858a3afdf6c36f943fa3a553a3c0"] = "Inconnu";
                $demos["3d8411be02faf1eb1c857579ac1bac43"] = "Inconnu";
                $demos["f54578b0606f76b591c96200c5325410"] = "Inconnu";
                $demos["7e8e243f227a11c215c904e34fc36c93"] = "Inconnu";
                $demos["7c60b43c1ce64861e2d8f36a0ac1b554"] = "ps8";
                if (strpos(PS_WEB_PATH, "storecommander.net") !== false && (!empty($demos[md5(substr(getcwd(), 0, 51))]) || !empty($demos[md5(substr(getcwd(), 0, 35))]))) {
                    define("SC_DEMO", true);
                    goto AHeLx;
                }
                define("SC_DEMO", false);
                AHeLx:
                define("IS_RBM", false);
                goto z9cob;
            }
            define("SC_DEMO", false);
            $exploded_licence = explode("_", $licence);
            if (count($exploded_licence) == 2 && $exploded_licence[0] == "SC-PS-RBM") {
                define("IS_RBM", true);
                goto qwx6z;
            }
            define("IS_RBM", false);
            qwx6z:
            z9cob:
            $current_sc_module_folder_name = basename(SC_PS_MODULE_PATH_DIR);
            if (false) {
                define("SC_MODULE_FOLDER_NAME", "storecommanderps");
                define("SC_MODULE_ADMIN_CONTROLLER_NAME", "AdminStoreCommanderPs");
                goto Wl9YZ;
            }
            define("SC_MODULE_FOLDER_NAME", "storecommander");
            define("SC_MODULE_ADMIN_CONTROLLER_NAME", "AdminStoreCommander");
            Wl9YZ:
            if (!version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                goto bE6zX;
            }
            $protocol_link = Tools::usingSecureMode() && Configuration::get("PS_SSL_ENABLED") ? "https://" : "http://";
            $protocol_content = Tools::usingSecureMode() && Configuration::get("PS_SSL_ENABLED") ? "https://" : "http://";
            Context::getContext()->link = new Link($protocol_link, $protocol_content);
            bE6zX:
            if (!(_s("APP_COMPAT_MEMORY") != 0 && sc_in_array(_s("APP_COMPAT_MEMORY"), array("16M", "32M", "64M", "128M", "256M", "512M", "1G"), "licencesAppCombatMemory"))) {
                goto g4ZLO;
            }
            @ini_set("memory_limit", _s("APP_COMPAT_MEMORY"));
            g4ZLO:
            if (!(isset($_GET["resetlicense"]) && $_GET["resetlicense"] == "resetlicense")) {
                $CRONList = array("mapping_process", "export_process", "cat_export_process");
                if (false) {
                    $currentFileName = array_reverse(explode("/", $_SERVER["SCRIPT_NAME"]));
                    $cookie = new Cookie("psAdmin", substr($_SERVER["SCRIPT_NAME"], strlen(__PS_BASE_URI__), -strlen($currentFileName["0"]) - 3));
                    define("SC_PS_PATH_ADMIN_DIR", realpath("SC_DIR../") . "/");
                    define("SC_PS_PATH_ADMIN_REL", "../");
                    define("SC_CSV_EXPORT_DIR", "_PS_ROOT_DIR_/export/");
                    define("SC_CSV_IMPORT_DIR", realpath("SC_PS_PATH_ADMIN_DIRimport/") . "/");
                    define("SC_MAIL_ATTACHMENT_DIR", "_PS_ROOT_DIR_/upload/");
                    define("SC_CSV_IMPORT_CONF", "import.conf.xml");
                    goto zJP_a;
                }
                $sc_cookie = new Cookie("scAdmin");
                if ($sc_cookie->ide != '' && $sc_cookie->key != '' && Tools::getValue("key", '') == '') {
                    $id_employee = $sc_cookie->ide;
                    $key = $sc_cookie->key;
                    goto mNP5i;
                }
                $id_employee = $sc_cookie->ide = Tools::getValue("ide", 0);
                $sc_cookie->key = Tools::getValue("key", '');
                $key = Tools::getValue("key", '');
                mNP5i:
                $datelastregen = Db::getInstance()->getValue("SELECT last_passwd_gen FROM _DB_PREFIX_employee WHERE id_employee=" . (int) $id_employee);
                if (!($sc_cookie->psap == '' || Tools::isSubmit("psap") && $sc_cookie->psap != SCI::encrypt(Tools::getValue("psap", '')))) {
                    goto PXwgY;
                }
                $sc_cookie->psap = SCI::encrypt(Tools::getValue("psap", ''));
                PXwgY:
                if (!version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                    goto djQOi;
                }
                $sc_cookie->write();
                djQOi:
                if (!(($key != md5($id_employee . $datelastregen) || $sc_cookie->psap == '') && !(isset($CRON) && $CRON == true && sc_in_array(Tools::getValue("action", ''), $CRONList, "licencesCronList")))) {
                    define("SC_PS_PATH_ADMIN_DIR", SC_PS_PATH_DIR . SCI::decrypt($sc_cookie->psap) . "/");
                    define("SC_PS_PATH_ADMIN_REL", "../../../../" . SCI::decrypt($sc_cookie->psap) . "/");
                    define("SC_CSV_EXPORT_DIR", "SC_PS_MODULE_PATH_DIRexport/");
                    define("SC_CSV_IMPORT_DIR", "SC_PS_MODULE_PATH_DIRimport/");
                    define("SC_MAIL_ATTACHMENT_DIR", "_PS_ROOT_DIR_/upload/");
                    define("SC_CSV_IMPORT_CONF", "import.conf.xml");
                    if (!(!isset($cookie) || !is_object($cookie))) {
                        goto HwVvN;
                    }
                    $cookie = new Cookie("ps");
                    HwVvN:
                    zJP_a:
                    $sc_agent = new SC_Agent();
                    $cookie_mail = $cookie->__get("email");
                    if (!empty($cookie_mail)) {
                        goto dAx9U;
                    }
                    if (empty($sc_cookie)) {
                        goto bEsLU;
                    }
                    $cookie_mail = Db::getInstance()->getValue("SELECT email FROM _DB_PREFIX_employee WHERE id_employee=" . (int) $sc_cookie->id_employee);
                    bEsLU:
                    dAx9U:
                    $same_empl_url = (bool) (empty($cookie_mail) || $sc_agent->email != $cookie_mail ? false : true);
                    $ajax = Tools::getValue("ajax", 0);
                    if (!(!$ajax && !(isset($CRON) && $CRON == true && sc_in_array(Tools::getValue("action", ''), $CRONList, "licencesCronList")) && (!$sc_agent->isLoggedBack() || !$same_empl_url))) {
                        if (!(version_compare(_PS_VERSION_, "1.5.0.1", ">=") && !$ajax && !(isset($CRON) && $CRON == true && sc_in_array(Tools::getValue("action", ''), $CRONList, "licencesCronList")))) {
                            goto EHemO;
                        }
                        $idScModule = Module::getModuleIdByName(SC_MODULE_FOLDER_NAME);
                        $allowed = Module::getPermissionStatic($idScModule, "view", new Employee((int) $sc_agent->id_employee));
                        if ($allowed) {
                            EHemO:
                            $languages = Language::getLanguages(!_s("CAT_PROD_LANGUAGE_ALL"));
                            $nblanguages = count($languages);
                            $user_lang_iso = Language::getIsoById($sc_agent->id_lang);
                            $forceLangIso = UISettings::getSetting("forceSCLangIso");
                            if (empty($forceLangIso)) {
                                goto m6WEg;
                            }
                            $user_lang_iso = $forceLangIso;
                            m6WEg:
                            if (IS_RBM) {
                                $cgu_prefix = "terms-sub-rbm";
                                $cgu_cms_id = 84;
                                goto yE6l4;
                            }
                            if (false) {
                                $cgu_prefix = "terms-sub";
                                $cgu_cms_id = 3;
                                goto U8Cj1;
                            }
                            $cgu_prefix = "terms";
                            $cgu_cms_id = 61;
                            U8Cj1:
                            yE6l4:
                            $cgu_allowed_lang = array("en" => 1, "fr" => 2, "es" => 4);
                            $sc_iso_list = array_keys($cgu_allowed_lang);
                            $sc_iso = in_array(strtolower($user_lang_iso), $sc_iso_list) ? strtolower($user_lang_iso) : "en";
                            define("SC_ISO_LANG_FOR_EXTERNAL", $sc_iso);
                            define("SC_ID_LANG_FOR_EXTERNAL", $cgu_allowed_lang[SC_ISO_LANG_FOR_EXTERNAL]);
                            define("CGU_LOCAL_PATH", "../SC/" . $cgu_prefix . "-" . SC_ISO_LANG_FOR_EXTERNAL . ".html");
                            define("CGU_EXTERNAL_URL", "https://www.storecommander.com/cgv.php?l=SC_ID_LANG_FOR_EXTERNAL&c=" . $cgu_cms_id);
                            require "SC_DIRlang/en.php";
                            $LANG_EN = $LANG;
                            if (!(!empty($user_lang_iso) && file_exists("SC_DIRlang/" . $user_lang_iso . ".php"))) {
                                goto tohvU;
                            }
                            require "SC_DIRlang/" . $user_lang_iso . ".php";
                            tohvU:
                            if (!SC_TOOLS) {
                                goto rjVR_;
                            }
                            foreach ($sc_tools_list as $tool) {
                                if (!file_exists(SC_TOOLS_DIR . $tool . "/" . $user_lang_iso . ".php")) {
                                    goto PEvV4;
                                }
                                require_once SC_TOOLS_DIR . $tool . "/" . $user_lang_iso . ".php";
                                PEvV4:
                            }
                            rjVR_:
                            function displayFirstLoginPage($error = null, $other = array())
                            {
                                global $sc_agent, $spbas, $ajax, $user_lang_iso;
                                $id_partner = '';
                                if (!file_exists("SC_DIRlicense.php")) {
                                    goto qTomp;
                                }
                                @(require_once "SC_DIRlicense.php");
                                qTomp:
                                if (!(file_exists("SC_DIRdebug-license.php") && $error != null)) {
                                    goto CgRh2;
                                }
                                $tab = $spbas->access_details();
                                ob_start();
                                var_dump($tab);
                                $dump = ob_get_clean();
                                mail("info@storecommander.com", "pb licence - ID employee " . $sc_agent->id_employee, "err:\n\n" . $error . "\n\n" . $dump);
                                CgRh2:
                                ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Store Commander</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="<?php 
                                echo "SC_CSSSTYLE";
                                ?>
" />
        <script type="text/javascript" src="<?php 
                                echo "SC_JQUERY";
                                ?>
"></script>
        <link rel="icon" type="image/vnd.microsoft.icon" href="/img/favicon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
    </head>
    <body>
    <div class="firstLoginPage">
        <div style="width: 310px; float: left;">
            <img src="lib/img/logo.png"/>
        </div>
        <div style="clear: both;"></div>
        <b><?php 
                                echo _l("The best catalog management application for Prestashop!");
                                ?>
</b><br/><br/>
        <?php 
                                if (empty($error) && (!IS_RBM || false)) {
                                    echo "<b>" . _l("Create your %s account with a click.", null, array("Store Commander")) . "</b><br/>";
                                    echo _l("You can customize the pre-entered information below.") . "<br/>";
                                    echo _l("A licence key will be generated automatically and associated with your account.") . "<br/>";
                                    goto liUIY;
                                }
                                if ($error == "Error: Invalid Access Attempt" || strpos($error, "invalid for this location") != 0) {
                                    if (IS_RBM) {
                                        echo "<div class=\"sc_error\">" . _l("Invalid access attempt. Please contact us %s", 0, array("support@storecommander.com")) . "</div>";
                                        goto ngzfv;
                                    }
                                    echo "<div class=\"sc_error\">" . _l("You need to reset your license") . _l(":") . " <a href=\"https://www.storecommander.com/index.php?controller=mysubscription\" target=\"_blank\">" . _l("My subscription") . "</a></div>";
                                    ngzfv:
                                    goto mP9ZA;
                                }
                                if ($error == "Your subscription is not active. Manage your subscription.") {
                                    if (IS_RBM) {
                                        echo "<div class=\"sc_error\">" . _l("Your subscription is not active. Manage your subscription from the Store Commander's configuration") . "</div>";
                                        goto u5xNd;
                                    }
                                    echo "<div class=\"sc_error\">" . _l("Your subscription is not active. Manage your subscription in your account") . _l(":") . " <a href=\"https://www.storecommander.com/index.php?controller=mysubscription\" target=\"_blank\">" . _l("My subscription") . "</a></div>";
                                    u5xNd:
                                    goto mP9ZA;
                                }
                                if ($error == "Your Trial subscription has expired") {
                                    if (IS_RBM) {
                                        echo "<div class=\"sc_error\">" . _l("The Trial period we offered has now ended. To continue saving time every day with Store Commander, activate your subscription from the module configuration") . "</div>";
                                        goto heDWv;
                                    }
                                    echo "<div class=\"sc_error\">" . _l("The Trial period we offered has now ended. To continue saving time every day with Store Commander, activate your subscription in 2 easy steps, from %sMy Subscription%s page under your account.", 0, array("<a href=\"https://www.storecommander.com/index.php?controller=mysubscription\" target=\"_blank\">", "</a>")) . "</div>";
                                    heDWv:
                                    goto mP9ZA;
                                }
                                if ($error == "Must have MS") {
                                    if (IS_RBM) {
                                        echo "<div class=\"sc_error\">" . _l("You need to have a subscription MultiStores to be able to manage several shops in Store Commander.") . " " . _l("You can change your plan from the module configuration.") . "</div>";
                                        goto kAQJz;
                                    }
                                    echo "<div class=\"sc_error\">" . _l("You need to have a subscription MultiStores to be able to manage several shops in Store Commander.") . " " . _l("You can change your plan from %sMy Subscription%s page under your account.", 0, array("<a href=\"https://www.storecommander.com/index.php?controller=mysubscription\" target=\"_blank\">", "</a>")) . "</div>";
                                    kAQJz:
                                    goto mP9ZA;
                                }
                                if (strpos($error, "too recent for your support package") != 0) {
                                    $oldVersionInstructions = sc_file_get_contents("https://www.storecommander.com/files/getoldversion.php", "GET", array("lang" => $user_lang_iso, "key" => $spbas->license_key));
                                    echo "<div class=\"sc_error\">" . _l($error) . "<br/><br/>" . (array_key_exists("date_end", $other) ? "Support: " . $other["date_end"] : '') . "<br/><br/>" . $oldVersionInstructions . "</div>";
                                    goto h50TD;
                                }
                                echo "<div class=\"sc_error\">" . _l($error) . "</div>";
                                h50TD:
                                mP9ZA:
                                liUIY:
                                if (!file_exists("license.php")) {
                                    goto hJy1L;
                                }
                                require_once "license.php";
                                hJy1L:
                                if (isset($id_partner)) {
                                    goto yg34v;
                                }
                                $id_partner = 0;
                                yg34v:
                                $is_local = false;
                                $domain = strtolower($_SERVER["HTTP_HOST"]);
                                if (!($domain == "127.0.0.1" || $domain == "localhost" || substr($domain, -6, 6) == ".local")) {
                                    goto XcP55;
                                }
                                $is_local = true;
                                XcP55:
                                ?>
        <?php 
                                if (!(!array_key_exists("notrialform", $other) && (!IS_RBM || false))) {
                                    goto Xajqk;
                                }
                                ?>
        <form id="formtrial" method="POST">
            <fieldset>
                <legend style="text-align: left;"><?php 
                                echo _l("Start your Store Commander Trial");
                                ?>
</legend>

                <?php 
                                if (!$is_local) {
                                    ?>
                    <input type="hidden" name="done" value="0"/>
                    <input type="hidden" name="firstLoginPageAct" value="createtrial"/>
                    <input type="hidden" name="partner" value="<?php 
                                    echo $id_partner;
                                    ?>
"/>
                    <input type="hidden" name="siteurl" value="<?php 
                                    echo "PS_WEB_PATH";
                                    ?>
"/>
                    <input type="hidden" name="newsletter" value="on"/>
                    <input type="hidden" name="optin" value="on"/>
                    <div id="form_trial">
                        <?php 
                                    echo _l("Company") . _l(":");
                                    ?>
 <input type="text" name="company"
                                                                      value="<?php 
                                    echo SCI::getConfigurationValue("PS_SHOP_NAME", '');
                                    ?>
"/><br/>

                        <p class="radio" style="margin:0px">
                            <input type="radio" checked="checked" value="1" name="id_gender" id="id_gender1">
                            <label for="id_gender1"><?php 
                                    echo _l("M.");
                                    ?>
</label>
                            <input type="radio" value="2" name="id_gender" id="id_gender2">
                            <label for="id_gender2"><?php 
                                    echo _l("Ms");
                                    ?>
</label>
                        </p>
                        <?php 
                                    echo _l("Shop owner name") . _l(":");
                                    ?>
 <input type="text" name="lastname"
                                                                   value="<?php 
                                    echo $sc_agent->lastname;
                                    ?>
"/><br/>
                        <?php 
                                    echo _l("Firstname") . _l(":");
                                    ?>
 <input type="text" name="firstname"
                                                                        value="<?php 
                                    echo $sc_agent->firstname;
                                    ?>
"/><br/>
                        <?php 
                                    echo _l("Email") . _l(":");
                                    ?>
 <input type="text" name="email_create"
                                                                    value="<?php 
                                    echo $sc_agent->email;
                                    ?>
"/><br/>
                        <?php 
                                    $authorizedLanguages = array("fr" => "Fran\xc3\xa7ais", "en" => "English", "es" => "Espa\xc3\xb1ol");
                                    $langSelected = "en";
                                    if (!array_key_exists(Language::getIsoById($sc_agent->id_lang), $authorizedLanguages)) {
                                        goto x3mrA;
                                    }
                                    $langSelected = Language::getIsoById($sc_agent->id_lang);
                                    x3mrA:
                                    echo _l("Contact me in") . _l(":");
                                    ?>
 <select name="lang">
                            <?php 
                                    foreach ($authorizedLanguages as $scIso => $scIsoLabel) {
                                        echo "<option value=\"" . $scIso . "\"" . ($langSelected === $scIso ? "selected" : '') . ">" . $scIsoLabel . "</option>";
                                    }
                                    ?>
                        </select>
                        <br/>
                        <br/>
                        <input type="checkbox" name="cgu_agreed_trial"/> <a href="<?php 
                                    echo "CGU_LOCAL_PATH";
                                    ?>
" target="_blank"><?php 
                                    echo _l("I accept Terms & Conditions");
                                    ?>
</a>
                        <br/>
                        <input id="btntrial" type="button" class="btn_pink disabled" disabled value="<?php 
                                    echo _l("Start the trial and save time!");
                                    ?>
"/>
                        <img id="loading" src="lib/img/ajax-loader.gif" style="display: none;" />
                    </div>

                <?php 
                                    goto xb0yS;
                                }
                                if ($is_local) {
                                    ?>
                    <strong><?php 
                                    echo _l("The trial period cannot be started on localhost but only online!");
                                    ?>
</strong>
                <?php 
                                    goto xpeyM;
                                }
                                xpeyM:
                                xb0yS:
                                ?>
            </fieldset>
        </form>
        <?php 
                                Xajqk:
                                ?>
        <br/>
        <?php 
                                if (!false) {
                                    goto W2Dg0;
                                }
                                ?>
            <?php 
                                if (IS_RBM) {
                                    ?>
                <b><?php 
                                    echo _l("Already have a licence key?");
                                    ?>
</b><br/>
            <?php 
                                    goto pbFNs;
                                }
                                ?>
                <b><?php 
                                echo _l("Already have a account or a licence key?");
                                ?>
</b><br/>
                <a href="https://www.storecommander.com/<?php 
                                echo "SC_ISO_LANG_FOR_EXTERNAL";
                                ?>
/authentification?fromapp=1" target="_blank"><?php 
                                echo _l("Go to your %s customer account.", null, array("Store Commander"));
                                ?>
</a>
            <?php 
                                pbFNs:
                                ?>
            <div>
                <fieldset>
                    <legend><?php 
                                echo _l("Enter your license key");
                                ?>
</legend>
                    <p class="right">
                        <?php 
                                echo _l("Your license key") . _l(":");
                                ?>
 <input type="text" id="license"/>
                        <br/>
                        <input type="checkbox" name="cgu_agreed"/> <a href="<?php 
                                echo "CGU_LOCAL_PATH";
                                ?>
" target="_blank"><?php 
                                echo _l("I accept Terms & Conditions");
                                ?>
</a>
                        <br/>
                        <input id="licence_register" class="btn_pink disabled" type="button" style="margin-top: 10px;" value="<?php 
                                echo _l("Save");
                                ?>
" onclick="if ($('#license').val()!='') {document.location='index.php?firstLoginPageAct=setlicense&license='+$('#license').val();}" disabled/>
                    </p>

                </fieldset>
                <br/><br/>
            </div>
            <script>
                function checkCGU(cgucheckbox, buttondisabled)
                {
                    cgucheckbox.click(function(){
                        if ($(this).is(':checked')) {
                            buttondisabled.removeClass('disabled').removeAttr('disabled');
                        } else {
                            buttondisabled.prop("disabled",true);
                            buttondisabled.addClass('disabled');
                        }
                    });
                }
                $(document).ready(function() {
                    checkCGU($('input[name="cgu_agreed"]'), $('input#licence_register'));
                    checkCGU($('input[name="cgu_agreed_trial"]'), $('input#btntrial'));
                });
                var submitted = false;
                $( "#btntrial" ).on( "click", function() {
                    if(submitted==false)
                    {
                        submitted = true;
                        $(this).hide();
                        $("#loading").fadeIn();
                        $("#formtrial").submit();
                    }
                });
            </script>
        <?php 
                                W2Dg0:
                                ?>
        <br/><br/>
        <?php 
                                if (!($error == "Error: This license has expired.")) {
                                    goto JqlMB;
                                }
                                echo "<script language=\"JavaScript\" type=\"text/javascript\">\$(\"#formfree\").css(\"display\",\"none\");</script>";
                                JqlMB:
                                ?>
        <p class="right copyright">
            &copy; <?php 
                                echo "SC_COPYRIGHT <br/>V. SC_VERSION (PS _PS_VERSION_)";
                                if (!(defined("_PS_CACHE_ENABLED_") && _PS_CACHE_ENABLED_)) {
                                    goto jk_aR;
                                }
                                echo "<br/><br/>" . _l("Note: Using the Prestashop cache system may interfere with the proper use of Store Commander as well as modules. To prevent this, go to the Preferences > Performance tab to disable the option at the end of the page.");
                                jk_aR:
                                ?>
        <p>
    </div>
    </body>
    </html>
    <?php 
                                die;
                            }
                            $scExtensions_filesToDelete = array("UkooProductCompat" => array("SC_DIRlib/cat/productcompatibility/cat_productcompatibility_criterion_init.js.php", "SC_DIRlib/cat/productcompatibility/cat_productcompatibility_generator_init.js.php", "SC_DIRlib/cat/productcompatibility/cat_productcompatibility_init.js.php"), "FixMyPrestashop" => array("SC_DIRlib/all/win-fixmyprestashop/all_win-fixmyprestashop_init.js.php", "SC_DIRlib/all/win-fixmyprestashop/all_win-fixmyprestashop_actions.php", "SC_DIRlib/all/win-fixmyprestashop/all_win-fixmyprestashop_controls.php"), "MultiplesFeatures" => array("SC_DIRlib/cat/multiplefeatures/cat_multiplefeatures_init.js.php", "SC_DIRlib/cat/multiplefeatures/cat_multiplefeatures_group_get.php"), "GridEditorPro" => array("SC_DIRlib/all/win-gridseditorpro/all_win-gridseditorpro_init.js.php", "SC_DIRlib/all/win-gridseditorpro/all_win-gridseditorpro_win.php"), "GridEditor" => array("SC_DIRlib/all/win-gridseditor/all_win-gridseditor_init.js.php", "SC_DIRlib/all/win-gridseditor/all_win-gridseditor_get.php"), "Segmentation" => array("SC_DIRlib/all/win-segmentation/all_win-segmentation_init.js.php", "SC_DIRlib/all/win-segmentation/all_win-segmentation_get.php"), "TinyPNG" => array("SC_DIRlib/php/tinypng/lib/Tinify.php", "SC_DIRlib/php/tinypng/lib/Tinify/Client.php", "SC_DIRlib/php/tinypng/lib/Tinify/Source.php"), "Affiliation" => array("SC_DIRlib/all/win-affiliation/all_win-affiliation_init.js.php"), "Amazon" => array("SC_DIRlib/cat/amazon/cat_amazon_init.js.php"), "FeedBiz" => array("SC_DIRlib/cat/feedbiz/cat_feedbiz_init.js.php"), "Cdiscount" => array("SC_DIRlib/cat/cdiscount/cat_cdiscount_init.js.php"), "Terminator" => array("SC_DIRlib/all/win-terminator/all_win-terminator_init.js.php", "SC_DIRlib/all/win-terminator/all_win-terminator_get.php"), "AdvancedSearchSeo" => array("SC_DIRlib/cat/win-advancedsearchseo/cat_win-advancedsearchseo_init.js.php"), "ExportOrders" => array("SC_DIRlib/ord/win-export/ord_win-export_init.js.php", "SC_DIRlib/php/extension/export_order/ExportOrderTools.php"), "ExportCustomers" => array("SC_DIRlib/cus/win-export/cus_win-export_init.js.php", "SC_DIRlib/php/extension/export_customer/ExportCustomerTools.php"));
                            if (!version_compare(_PS_VERSION_, "1.7.3.0", ">=")) {
                                goto eeaKX;
                            }
                            unset($scExtensions_filesToDelete["MultiplesFeatures"]);
                            eeaKX:
                            function getScExtensionsHasModule()
                            {
                                return array(0 => "CatalogPDF", 1 => "Affiliation");
                            }
                            function getExtensionsStatus()
                            {
                                $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                if (empty($licence) && SC_DEMO) {
                                    $licence = "SCdemo";
                                    goto dhVKM;
                                }
                                if (empty($licence) && !SC_DEMO) {
                                    $licence = "demo";
                                    goto pWSkr;
                                }
                                pWSkr:
                                dhVKM:
                                $headers = array();
                                $headers[] = "PSVERSION: _PS_VERSION_";
                                $extensions = sc_file_get_contents("https://api.storecommander.com/GetExtensionsStatus/" . $licence . "/all", "GET", array(), $headers);
                                if (!(defined("KAI9DF4") && file_exists("license.php"))) {
                                    goto frQOg;
                                }
                                $content = file_get_contents("license.php");
                                if (empty($content)) {
                                    goto yrBuC;
                                }
                                $extensions = json_decode($extensions, true);
                                $extensions["FixMyPrestashop"]["active"] = 1;
                                $extensions = json_encode($extensions);
                                yrBuC:
                                frQOg:
                                if (empty($extensions)) {
                                    goto Ea11w;
                                }
                                SCI::updateConfigurationValue("SC_EXTENSIONSTATUS", $extensions);
                                Ea11w:
                            }
                            function getExtensionsList()
                            {
                                $extensions = SCI::getConfigurationValue("SC_EXTENSIONSTATUS");
                                if (!empty($extensions)) {
                                    goto YbqOi;
                                }
                                getExtensionsStatus();
                                $extensions = SCI::getConfigurationValue("SC_EXTENSIONSTATUS");
                                YbqOi:
                                return json_decode($extensions, true);
                            }
                            function getExtensionDetail($extensionName)
                            {
                                $extensionList = getExtensionsList();
                                $extensions_foldername_version = array_column($extensionList, null, "folder_name");
                                if (!isset($extensions_foldername_version[$extensionName])) {
                                    return array();
                                }
                                return $extensions_foldername_version[$extensionName];
                            }
                            function checkExtensionsStatus()
                            {
                                global $scExtensions_filesToDelete;
                                $extensions = SCI::getConfigurationValue("SC_EXTENSIONSTATUS");
                                $extensions_decoded = json_decode($extensions);
                                foreach ($scExtensions_filesToDelete as $extension => $files) {
                                    if (!empty($extensions_decoded->{$extension}->active) || defined("FORCE_EXTENSION_ACTIVE") && false) {
                                        if (!defined("SC_" . $extension . "_ACTIVE")) {
                                            define("SC_" . $extension . "_ACTIVE", "1");
                                            if (!(defined("SC_GridEditorPro_ACTIVE") && false)) {
                                                goto E_hU9;
                                            }
                                            unset($scExtensions_filesToDelete["GridEditor"]);
                                            E_hU9:
                                            checkDeletedFilesActiveExtension($extension);
                                            k1hE5:
                                            goto IWyM0;
                                        }
                                        die("FATAL ERROR : Constant already defined");
                                    }
                                    deleteDisabledExtensionFiles($extension);
                                    if (!defined("SC_" . $extension . "_ACTIVE")) {
                                        define("SC_" . $extension . "_ACTIVE", "0");
                                        WcLI9:
                                        IWyM0:
                                    }
                                    die("FATAL ERROR : Constant already defined");
                                }
                                foreach (getScExtensionsHasModule() as $extension) {
                                    if (empty($scExtensions_filesToDelete[$extension])) {
                                        if (!empty($extensions_decoded->{$extension}->active) || defined("FORCE_EXTENSION_ACTIVE") && false) {
                                            if (!defined("SC_" . $extension . "_ACTIVE")) {
                                                define("SC_" . $extension . "_ACTIVE", "1");
                                                r9phR:
                                                goto EQJ3R;
                                            }
                                            die("FATAL ERROR : Constant already defined");
                                        }
                                        if (!defined("SC_" . $extension . "_ACTIVE")) {
                                            define("SC_" . $extension . "_ACTIVE", "0");
                                            XcBAT:
                                            EQJ3R:
                                            goto vPiDA;
                                        }
                                        die("FATAL ERROR : Constant already defined");
                                    }
                                    vPiDA:
                                }
                            }
                            function checkModuleAndDownload($moduleName)
                            {
                                global $sc_alerts;
                                if (in_array($moduleName, getScExtensionsHasModule())) {
                                    $extensions = SCI::getConfigurationValue("SC_EXTENSIONSTATUS");
                                    $extensions_decoded = json_decode($extensions);
                                    if (!(!empty($extensions_decoded->{$moduleName}->active) || defined("FORCE_EXTENSION_ACTIVE") && false)) {
                                        goto jx5Q5;
                                    }
                                    if (!(defined("SC_" . $moduleName . "_ACTIVE") && constant("SC_" . $moduleName . "_ACTIVE") == "1")) {
                                        Gv6jf:
                                        jx5Q5:
                                        return 0;
                                    }
                                    $id_module = SCI::moduleIsInstalled($extensions_decoded->{$moduleName}->folder_name);
                                    if (!empty($id_module)) {
                                        return 2;
                                    }
                                    return (int) getScExtensionAndExtract($extensions_decoded->{$moduleName}->folder_name);
                                }
                                return 0;
                            }
                            function getScExtensionAndExtract($filename, $overWriteFiles = false)
                            {
                                $tmp_folder = "SC_DIRsc_update_tmp";
                                $writePermissions = octdec("0" . substr(decoct(fileperms(realpath("SC_PS_PATH_DIRimg/p"))), -3));
                                $url = "https://www.storecommander.com/files/extensions/" . md5($filename) . ".zip";
                                require_once "SC_DIRlib/php/pclzip.lib.php";
                                if (is_dir($tmp_folder)) {
                                    goto uqQff;
                                }
                                $old = umask(0);
                                mkdir($tmp_folder, $writePermissions);
                                umask($old);
                                uqQff:
                                $data = sc_file_get_contents($url);
                                if (!empty($data)) {
                                    file_put_contents($tmp_folder . "/" . $filename . ".zip", $data);
                                    $old = umask(0);
                                    $tempZipName = $tmp_folder . "/" . $filename . ".zip";
                                    if ($overWriteFiles) {
                                        $extracted = Tools::ZipExtract($tempZipName, "SC_DIR../../../");
                                        goto uslcf;
                                    }
                                    $archive = new PclZip($tempZipName);
                                    $extracted = $archive->extract(PCLZIP_OPT_PATH, "SC_DIR../../../", PCLZIP_OPT_SET_CHMOD, $writePermissions);
                                    uslcf:
                                    if (empty($extracted)) {
                                        // [PHPDeobfuscator] Implied return
                                        return;
                                    }
                                    umask($old);
                                    @unlink($tmp_folder . "/" . $filename . ".zip");
                                    return true;
                                }
                                return false;
                            }
                            function deleteDisabledExtensionFiles($extension)
                            {
                                global $scExtensions_filesToDelete;
                                if (!(!empty($scExtensions_filesToDelete[$extension]) && count($scExtensions_filesToDelete[$extension]) > 0)) {
                                    goto iYcO2;
                                }
                                foreach ($scExtensions_filesToDelete[$extension] as $file) {
                                    if (!file_exists($file)) {
                                        goto Xq9xq;
                                    }
                                    if (@unlink($file)) {
                                        goto ScwN2;
                                    }
                                    @file_put_contents($file, '');
                                    ScwN2:
                                    Xq9xq:
                                }
                                iYcO2:
                            }
                            function checkDeletedFilesActiveExtension($extension)
                            {
                                global $scExtensions_filesToDelete;
                                if (!(!empty($scExtensions_filesToDelete[$extension]) && count($scExtensions_filesToDelete[$extension]) > 0)) {
                                    goto fRRux;
                                }
                                foreach ($scExtensions_filesToDelete[$extension] as $file) {
                                    if (file_exists($file)) {
                                        goto au7Xr;
                                    }
                                    if (defined("OPEN_UPDATE_WINDOW")) {
                                        goto j2k9t;
                                    }
                                    define("OPEN_UPDATE_WINDOW", "1");
                                    j2k9t:
                                    au7Xr:
                                }
                                fRRux:
                            }
                            function getServicesStatus()
                            {
                                SCI::updateConfigurationValue("SC_SERVICESTATUS", '');
                                return false;
                            }
                            function checkServicesStatus()
                            {
                                return false;
                            }
                            function checkSCVersion($full = false, $forceCheck = false, $forceUpdate = false)
                            {
                                $lastcheck = SCI::getConfigurationValue("SC_VERSIONS_LAST_CHECK", 0);
                                $localVersions = json_decode(SCI::getConfigurationValue("SC_VERSIONS", 0), true);
                                if (!($localVersions == null)) {
                                    goto L5fgR;
                                }
                                $localVersions = array();
                                L5fgR:
                                foreach ($localVersions as $key => $lv) {
                                    if (!(empty($key) || !is_array($localVersions[$key]))) {
                                        goto fgoTI;
                                    }
                                    unset($localVersions[$key]);
                                    fgoTI:
                                }
                                $toUpdate = $localVersions;
                                if ($forceCheck || $forceUpdate || (int) $lastcheck > 0 && (int) $lastcheck < date("Ymd")) {
                                    $lastVersions = array();
                                    $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                    if (!empty($licence)) {
                                        goto WEXqE;
                                    }
                                    $licence = "demo";
                                    WEXqE:
                                    $headers = array("x-sc-full-url:" . Tools::getShopDomainSsl(true) . __PS_BASE_URI__, "x-sc-psversion:_PS_VERSION_");
                                    $officialversions = sc_file_get_contents("https://api.storecommander.com/GetServiceStatus/" . $licence . "/StoreCommander", "GET", array(), $headers);
                                    if (!(Tools::getValue("DEBUG", 0) == 1)) {
                                        goto rnPz1;
                                    }
                                    echo "<pre>" . $officialversions . "</pre>";
                                    rnPz1:
                                    if (empty($officialversions)) {
                                        goto EJoic;
                                    }
                                    $officialversions_decoded = json_decode($officialversions);
                                    if (empty($officialversions_decoded->StoreCommander)) {
                                        goto TSCv9;
                                    }
                                    $lastVersions[(string) $officialversions_decoded->StoreCommander->shortname] = array("version" => (string) $officialversions_decoded->StoreCommander->version, "filename" => (string) $officialversions_decoded->StoreCommander->filename, "shortname" => (string) $officialversions_decoded->StoreCommander->shortname, "url" => (string) $officialversions_decoded->StoreCommander->url, "active" => (string) $officialversions_decoded->StoreCommander->active, "broadcastMessage" => (string) $officialversions_decoded->StoreCommander->broadcastMessage);
                                    TSCv9:
                                    EJoic:
                                    runProcessOneTimeByDay();
                                    goto wliJq;
                                }
                                $lastVersions = json_decode(SCI::getConfigurationValue("SC_VERSIONS_LAST", 0), true);
                                if (!($lastVersions == null)) {
                                    goto GiR2D;
                                }
                                $lastVersions = array();
                                GiR2D:
                                wliJq:
                                SCI::updateConfigurationValue("SC_VERSIONS_LAST", json_encode($lastVersions));
                                if (count($localVersions) == 0) {
                                    SCI::updateConfigurationValue("SC_VERSIONS", json_encode($lastVersions));
                                    goto gv1T8;
                                }
                                foreach ($lastVersions as $key => $lv) {
                                    if (!array_key_exists($key, $toUpdate)) {
                                        $toUpdate[$key] = $lv;
                                        goto MJIq0;
                                    }
                                    if ($toUpdate[$key]["version"] >= $lv["version"] && !$forceUpdate) {
                                        unset($toUpdate[$key]);
                                        goto h7K4O;
                                    }
                                    $toUpdate[$key] = $lv;
                                    h7K4O:
                                    MJIq0:
                                }
                                unset($toUpdate["SC-Pack2"]);
                                unset($toUpdate["SC-Pack3"]);
                                gv1T8:
                                SCI::updateConfigurationValue("SC_VERSIONS_LAST_CHECK", date("Ymd"));
                                if ($full) {
                                    MltMu:
                                    return $toUpdate;
                                }
                                if (count($toUpdate) == 0) {
                                    return false;
                                }
                                return true;
                            }
                            function checkSubsLic()
                            {
                                global $access_details;
                                $return = array("status" => "500", "type" => '', "isTrial" => "0");
                                $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                if (empty($licence)) {
                                    goto xCTxd;
                                }
                                $headers = array();
                                $posts = array();
                                $posts["LICENSE"] = "#";
                                $posts["DOMAIN"] = $access_details["domain"];
                                $posts["IP"] = $access_details["ip"];
                                $posts["PATH"] = $access_details["directory"];
                                $localVersions = json_decode(SCI::getConfigurationValue("SC_VERSIONS", 0), true);
                                $posts["phpversion"] = sc_phpversion();
                                $posts["psversion"] = _PS_VERSION_;
                                $posts["scversion"] = $localVersions["SC-Pack1"]["version"];
                                $ret = makeCallToOurApi("Subscription/Check", $headers, $posts);
                                if (!empty($ret["result"]) && $ret["result"] == "OK" && !empty($ret["status"])) {
                                    $return = array("status" => $ret["status"], "type" => $ret["type"], "isTrial" => $ret["isTrial"]);
                                    goto zZouh;
                                }
                                if (!empty($ret["result"]) && $ret["result"] == "ERROR" && !empty($ret["code"]) && $ret["code"] == "404") {
                                    $return = array("status" => 404, "type" => '', "isTrial" => "0");
                                    goto eYqEB;
                                }
                                eYqEB:
                                zZouh:
                                xCTxd:
                                return $return;
                            }
                            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=") && count(SCI::getAllShops()) > 1) {
                                Context::getContext()->shop->id = (int) Configuration::get("PS_SHOP_DEFAULT");
                                define("SCMS", true);
                                goto WpjDL;
                            }
                            define("SCMS", false);
                            WpjDL:
                            if (version_compare(_PS_VERSION_, "1.5.0.0", ">=") && Configuration::get("PS_ADVANCED_STOCK_MANAGEMENT") == 1) {
                                define("SCAS", true);
                                goto kStAK;
                            }
                            define("SCAS", false);
                            kStAK:
                            $access_details = access_details();
                            if (!(Tools::getValue("firstLoginPageAct", '') == "setlicense")) {
                                if (!(Tools::getValue("firstLoginPageAct", '') == "createtrial")) {
                                    goto xttRg;
                                }
                                $api_server = "https://www.storecommander.com/quickregistertrial_subscription.php";
                                $localtrialdate = SCI::getConfigurationValue("CRONJOBS_MODULE_CDATE");
                                $localdatefile = 0;
                                if (!file_exists("_PS_CORE_IMG_DIR_prestashop-login2.png")) {
                                    goto fXBMi;
                                }
                                @($localdatefile = file_get_contents("_PS_CORE_IMG_DIR_prestashop-login2.png"));
                                fXBMi:
                                if (!($localtrialdate != 0 && date("Ymd") > date("Ymd", strtotime($localtrialdate . " + 7 days")) || $localdatefile != 0 && date("Ymd") > date("Ymd", strtotime($localdatefile . " + 7 days")))) {
                                    goto Z6uZA;
                                }
                                displayFirstLoginPage("Your Trial subscription has expired", array("notrialform" => 1));
                                Z6uZA:
                                $postdata = array();
                                $postdata["isSCMS"] = 1;
                                if (!(!empty($_POST) && is_array($_POST))) {
                                    goto u6BF8;
                                }
                                $postdata = http_build_query($_POST);
                                u6BF8:
                                $headers = "Content-type: application/x-www-form-urlencoded";
                                $opts = array("http" => array("method" => "POST", "header" => $headers, "content" => $postdata));
                                $context = stream_context_create($opts);
                                $result = file_get_contents($api_server, false, $context);
                                $val = explode("o_o", $result);
                                if (count($val) == 2) {
                                    if ($val[0] == "OK") {
                                        @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login2.png", date("Y-m-d"));
                                        SCI::updateConfigurationValue("CRONJOBS_MODULE_CDATE", date("Y-m-d"));
                                        SCI::updateConfigurationValue("SC_LICENSE_KEY", $val[1]);
                                        goto gdNUb;
                                    }
                                    displayFirstLoginPage($val[1]);
                                    gdNUb:
                                    goto hNQrk;
                                }
                                if (!($result == '')) {
                                    goto EiSC3;
                                }
                                $result = "StoreCommander.com cannot be reached: can you check if the fsockopen operation is allowed on your server or if your use a firewall which could block the connection to the storecommander.com server?";
                                EiSC3:
                                displayFirstLoginPage($result);
                                hNQrk:
                                xttRg:
                                if (isset($locals)) {
                                    goto vFEEi;
                                }
                                $locals = array();
                                vFEEi:
                                if ($_SERVER["HTTP_HOST"] == "127.0.0.1" && !empty($locals[md5(getcwd())]) || SC_DEMO && substr(SCI::getConfigurationValue("SC_LICENSE_KEY"), 0, 6) != "SCFREE") {
                                    define("SCLIMREF", "Unlimited-Special");
                                    $Kd8PY = 0;
                                    define("KAI9DF4", "0");
                                    if (!defined("FORCE_EXTENSION_ACTIVE")) {
                                        define("FORCE_EXTENSION_ACTIVE", "1");
                                        RGmUf:
                                        goto p5vYW;
                                    }
                                    die("FATAL ERROR : Constant already defined");
                                }
                                removeUnwantedFiles();
                                if (!(SCI::getConfigurationValue("SC_LICENSE_KEY", '') == '')) {
                                    goto hfMou;
                                }
                                getServicesStatus();
                                displayFirstLoginPage();
                                hfMou:
                                $license_key = SCI::getConfigurationValue("SC_LICENSE_KEY", '');
                                if ($ajax) {
                                    $check = json_decode(base64_decode(SCI::getConfigurationValue("SC_LICENSE_DATA")), true);
                                    goto sP_ZU;
                                }
                                $check = checkSubsLic();
                                SCI::updateConfigurationValue("SC_LICENSE_DATA", base64_encode(json_encode($check)));
                                sP_ZU:
                                $SC_TYPE = '';
                                $SC_TYPE_NUM = '';
                                if (empty($check["type"])) {
                                    goto e34hi;
                                }
                                $SC_TYPE_NUM = $check["type"];
                                if ($check["type"] == 1) {
                                    $SC_TYPE = "SUBSCRIPTION SOLO";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 4) {
                                    $SC_TYPE = "SUBSCRIPTION SOLO+";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 2) {
                                    $SC_TYPE = "SUBSCRIPTION MULTI";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 5) {
                                    $SC_TYPE = "SUBSCRIPTION MULTI+";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 3) {
                                    $SC_TYPE = "SUBSCRIPTION EXPERT";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 6) {
                                    $SC_TYPE = "SUBSCRIPTION SOLO";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 7) {
                                    $SC_TYPE = "SUBSCRIPTION SOLO+";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 8) {
                                    $SC_TYPE = "SUBSCRIPTION MULTI";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 9) {
                                    $SC_TYPE = "SUBSCRIPTION MULTI+";
                                    goto VCnm9;
                                }
                                if ($check["type"] == 10) {
                                    $SC_TYPE = "SUBSCRIPTION EXPERT";
                                    goto VQNDd;
                                }
                                VQNDd:
                                VCnm9:
                                e34hi:
                                define("SUB6TYP2", $SC_TYPE_NUM);
                                if (!in_array($check["type"], array(4, 5, 3, 7, 9, 10))) {
                                    goto XVoXm;
                                }
                                define("SUB9EHS4PLUS", "1");
                                XVoXm:
                                if (!(SCMS && ($check["type"] == 1 || $check["type"] == 4 || $check["type"] == 6 || $check["type"] == 7))) {
                                    goto OT3Wf;
                                }
                                displayFirstLoginPage("Must have MS");
                                OT3Wf:
                                if (empty($check["isTrial"])) {
                                    goto umTWN;
                                }
                                define("KAI9DF4", "1");
                                umTWN:
                                if (!empty($check["status"]) && $check["status"] == "1") {
                                    @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login3.png", "0");
                                    define("SCLIMREF", $SC_TYPE);
                                    define("IS_SUBS", "1");
                                    goto NFUgT;
                                }
                                if (!empty($check["status"]) && $check["status"] == "2") {
                                    @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login3.png", "0");
                                    displayFirstLoginPage("Your subscription is not active. Manage your subscription.");
                                    goto NFUgT;
                                }
                                if (!empty($check["status"]) && $check["status"] == "3") {
                                    @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login3.png", "0");
                                    displayFirstLoginPage("Your Trial subscription has expired", array("notrialform" => 1));
                                    goto NFUgT;
                                }
                                if (!empty($check["status"]) && $check["status"] == "4") {
                                    @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login3.png", "0");
                                    displayFirstLoginPage("Error: Invalid Access Attempt", array("notrialform" => 1));
                                    goto NFUgT;
                                }
                                if (!empty($check["status"]) && $check["status"] == "404") {
                                    @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login3.png", "0");
                                    displayFirstLoginPage("Error: This license not found", array("notrialform" => 1));
                                    goto NFUgT;
                                }
                                if (empty($check["status"]) || !empty($check["status"]) && $check["status"] == "500") {
                                    $localdateoutfile = 0;
                                    if (!file_exists("_PS_CORE_IMG_DIR_prestashop-login3.png")) {
                                        goto kaRLZ;
                                    }
                                    @($localdateoutfile = file_get_contents("_PS_CORE_IMG_DIR_prestashop-login3.png"));
                                    kaRLZ:
                                    if (!empty($localdateoutfile)) {
                                        goto NvBuW;
                                    }
                                    $localdateoutfile = date("Y-m-d");
                                    @file_put_contents("_PS_CORE_IMG_DIR_prestashop-login3.png", date("Y-m-d"));
                                    NvBuW:
                                    if (empty($localdateoutfile)) {
                                        displayFirstLoginPage("Error with our services");
                                        goto q83E0;
                                    }
                                    if (!(date("Y-m-d") > date("Y-m-d", strtotime($localdateoutfile . " + 3 days")))) {
                                        goto hKkh3;
                                    }
                                    displayFirstLoginPage("Your subscription is not active.");
                                    hKkh3:
                                    q83E0:
                                    define("SCLIMREF", $SC_TYPE);
                                    goto dEqcE;
                                }
                                dEqcE:
                                NFUgT:
                                p5vYW:
                                if (defined("KAI9DF4")) {
                                    goto gbqRD;
                                }
                                define("KAI9DF4", "0");
                                gbqRD:
                                if (defined("SUB6TYP2")) {
                                    goto QxuzF;
                                }
                                define("SUB6TYP2", "0");
                                QxuzF:
                                if (defined("SUB9EHS4PLUS")) {
                                    goto ItCtR;
                                }
                                define("SUB9EHS4PLUS", "0");
                                ItCtR:
                                function doScUpdate($user_lang_iso = "en")
                                {
                                    $notWritableFiles = array();
                                    $writePermissions = octdec("0" . substr(decoct(fileperms(realpath("SC_PS_PATH_DIRimg/p"))), -3));
                                    $writePermissionsOCT = substr(decoct(fileperms(realpath("SC_PS_PATH_DIRimg/p"))), -3);
                                    dirCheckWritable(SC_DIR, $notWritableFiles);
                                    if (empty($notWritableFiles)) {
                                        $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                        $is_old = false;
                                        if (empty($licence)) {
                                            goto q33ti;
                                        }
                                        $exp = explode("-", $licence);
                                        if (!(count($exp) >= 4 && strpos($licence, "SC-PS-") === 0)) {
                                            goto AIvRR;
                                        }
                                        $is_old = true;
                                        AIvRR:
                                        q33ti:
                                        $newPackages = checkSCVersion(true, true, true);
                                        if (!$is_old) {
                                            goto Dw56K;
                                        }
                                        if (!empty($newPackages)) {
                                            $checkSupport = sc_file_get_contents("https://www.storecommander.com/files/getsupport_" . SCI::getConfigurationValue("SC_LICENSE_KEY", '') . "_checkonly.php");
                                            if (!($checkSupport == "LICENSENOTFOUND")) {
                                                if (!($checkSupport == "EXPIRED")) {
                                                    Dw56K:
                                                    include "SC_DIRlib/php/pclzip.lib.php";
                                                    $tmp_folder = "SC_DIRsc_update_tmp";
                                                    if (is_dir($tmp_folder)) {
                                                        goto R1jaJ;
                                                    }
                                                    $old = umask(0);
                                                    mkdir($tmp_folder, $writePermissions);
                                                    umask($old);
                                                    R1jaJ:
                                                    $localVersions = json_decode(SCI::getConfigurationValue("SC_VERSIONS", 0), true);
                                                    if (!($localVersions == null)) {
                                                        goto rQkGX;
                                                    }
                                                    $localVersions = array();
                                                    rQkGX:
                                                    echo _l("Updating...") . "<br/><br/>";
                                                    if (!(Tools::getValue("DEBUG", 0) == 1)) {
                                                        goto Agf3_;
                                                    }
                                                    echo "<pre>";
                                                    var_dump($newPackages);
                                                    echo "</pre>";
                                                    Agf3_:
                                                    foreach ($newPackages as $pack) {
                                                        echo _l("Downloading pack") . " " . $pack["filename"] . "...<br/>";
                                                        $pack["url"] = str_replace("KEY", SCI::getConfigurationValue("SC_LICENSE_KEY", '') . "_" . sc_phpversion(false) . "_" . _PS_VERSION_, $pack["url"]);
                                                        $data = sc_file_get_contents($pack["url"]);
                                                        if (!(Tools::getValue("DEBUG", 0) == 1)) {
                                                            goto eRaWE;
                                                        }
                                                        echo $pack["url"] . "<br/>";
                                                        eRaWE:
                                                        echo " (" . strlen($data) / 1000 . "K)<br/>";
                                                        file_put_contents($tmp_folder . "/" . $pack["filename"], $data);
                                                        if (filesize($tmp_folder . "/" . $pack["filename"]) == 0) {
                                                            echo _l("Error with archive (filesize = 0 Ko)") . "<br/>";
                                                            goto ulspL;
                                                        }
                                                        echo _l("Opening zip archive...") . "<br/>";
                                                        $archive = new PclZip($tmp_folder . "/" . $pack["filename"]);
                                                        echo _l("Extracting zip archive...") . "<br/>";
                                                        $old = umask(0);
                                                        $archive->extract(PCLZIP_OPT_PATH, $tmp_folder . "/", PCLZIP_OPT_SET_CHMOD, $writePermissions);
                                                        umask($old);
                                                        $localVersions[$pack["shortname"]] = $pack;
                                                        echo _l("End of extraction") . "<br/><br/>";
                                                        ulspL:
                                                    }
                                                    echo _l("Copying files...") . "<br/><br/>";
                                                    dirMove($tmp_folder . "/SC", realpath("SC_DIR../"), true);
                                                    if (isset($_GET["updatekeepzipfile"])) {
                                                        goto OC5Dd;
                                                    }
                                                    dirRemove($tmp_folder);
                                                    OC5Dd:
                                                    SCI::updateConfigurationValue("SC_VERSIONS", json_encode($localVersions));
                                                    SCI::updateConfigurationValue("SC_LAST_UPDATE", date("Y-m-d H:i:s"));
                                                    $local_settings["APP_TRENDS"]["value"] = 1;
                                                    saveSettings();
                                                    $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                                    if (!empty($licence)) {
                                                        goto fq8d2;
                                                    }
                                                    $licence = "demo";
                                                    fq8d2:
                                                    getServicesStatus();
                                                    $ork_folder = "ork";
                                                    $src = "SC_DIRautoinstall/ork";
                                                    $dst = "SC_PS_MODULE_PATH_DIRork";
                                                    recursive_copy($src, $dst);
                                                    $sc_update_path = "SC_TOOLS_DIRhook_sc_update.php";
                                                    if (!file_exists($sc_update_path)) {
                                                        goto XFSDj;
                                                    }
                                                    require_once $sc_update_path;
                                                    XFSDj:
                                                    // [PHPDeobfuscator] Implied return
                                                    return;
                                                }
                                                die(_l("The period entitling you to download Store Commander updates and benefit from support has expired.") . "<br/><br/>" . _l("If you wish to benefit from future updates and new features, please log onto your account here:") . "<br/>" . "<a href=\"https://www.storecommander.com/" . ($user_lang_iso == "fr" ? '' : "en/") . "my-licenses.php\" target=\"_blank\">https://www.storecommander.com/" . ($user_lang_iso == "fr" ? '' : "en/") . "my-licenses.php</a>" . "<br/><br/>" . _l("and click on Updates & support 6 or 12 months, or upgrade to a higher license plan.") . "<br/><br/>" . "<a href=\"http://support.storecommander.com\" target=\"_blank\">" . _l("Please contact us for any sales inquiries you may have.") . "</a>");
                                            }
                                            die(_l("Error: your license is not found on our server, please contact support."));
                                        }
                                        die(_l("No update found."));
                                    }
                                    $dirStrSize = strlen(SC_PS_PATH_ADMIN_DIR);
                                    echo _l("Some files are not writable, please change the permission of these files:") . " (" . $writePermissionsOCT . ")" . "<br/><br/>";
                                    foreach ($notWritableFiles as $k => $file) {
                                        echo substr($file, $dirStrSize) . "<br/>";
                                        if (!($k > 20)) {
                                        }
                                        echo "...";
                                        die;
                                    }
                                    die;
                                }
                                function getWallet()
                                {
                                    global $spbas;
                                    $return = 0;
                                    $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                    $headers = array();
                                    $posts = array();
                                    $posts["KEY"] = "gt789zef132kiy789u13v498ve15nhry98";
                                    $posts["LICENSE"] = "#";
                                    $posts["URLCALLING"] = "#";
                                    $posts["SUBSCRIPTION"] = "1";
                                    $ret = makeCallToOurApi("Fizz/getAmount", $headers, $posts);
                                    if (!(!empty($ret["code"]) && isset($ret["wallet"]) && $ret["code"] == "200")) {
                                        goto OReDO;
                                    }
                                    $return = $ret["wallet"];
                                    Configuration::updateValue("SC_WALLET_AMOUNT", $return);
                                    OReDO:
                                    return $return;
                                }
                                function setScSession($item, $data)
                                {
                                    $scSessionCookie = new Cookie("scSession", '', time() + 604800);
                                    $scSessionCookie->sc_date_upd = date("Y-m-d H:i:s");
                                    switch ($item) {
                                        case "early_access":
                                            $prefix = "scService_";
                                            if (!($services = $scSessionCookie->getFamily($prefix))) {
                                                goto t2J4V;
                                            }
                                            foreach (array_keys($services) as $serviceWithPrefix) {
                                                unset($scSessionCookie->{$serviceWithPrefix});
                                            }
                                            t2J4V:
                                            if (!$data) {
                                                goto HyyDG;
                                            }
                                            foreach ($data as $service => $value) {
                                                $scSessionCookie->{$prefix . $service} = $value;
                                            }
                                            HyyDG:
                                            goto vUdRr;
                                    }
                                    vUdRr:
                                    return $scSessionCookie->write();
                                }
                                function getScSessionItemValue($item, $key)
                                {
                                    $scSessionCookie = new Cookie("scSession");
                                    switch ($item) {
                                        case "early_access":
                                            $prefix = "scService_";
                                            $serviceValue = $scSessionCookie->{$prefix . $key};
                                            if (empty($serviceValue)) {
                                            }
                                            return is_numeric($serviceValue) ? (int) $serviceValue : (string) $serviceValue;
                                        default:
                                    }
                                    return false;
                                }
                                if (!(true && !$ajax)) {
                                    goto fJ3Ll;
                                }
                                $wallet_amount = getWallet();
                                fJ3Ll:
                                if (!$ajax) {
                                    getExtensionsStatus();
                                    checkExtensionsStatus();
                                    getServicesStatus();
                                    goto j8u70;
                                }
                                checkExtensionsStatus();
                                j8u70:
                                if (!(defined("SC_TinyPNG_ACTIVE") && false)) {
                                    goto YX8HJ;
                                }
                                loadSettings();
                                YX8HJ:
                                if (defined("SC_GridEditor_ACTIVE") && false) {
                                    define("SC_GRIDSEDITOR_INSTALLED", true);
                                    goto mn8zH;
                                }
                                define("SC_GRIDSEDITOR_INSTALLED", false);
                                mn8zH:
                                if (defined("SC_GridEditorPro_ACTIVE") && false) {
                                    define("SC_GRIDSEDITOR_PRO_INSTALLED", true);
                                    goto bbh3j;
                                }
                                define("SC_GRIDSEDITOR_PRO_INSTALLED", false);
                                bbh3j:
                                if (defined("SC_Segmentation_ACTIVE") && false && _r("MEN_MAR_SEGMENTATION") && _r("MEN_TOO_EXTENSIONS")) {
                                    define("SC_SEGMENTS_DIR", "SC_DIRlib/php/extension/segmentation/segments/");
                                    define("SCSG", true);
                                    require_once "SC_DIRlib/php/extension/segmentation/ScSegment.php";
                                    require_once "SC_DIRlib/php/extension/segmentation/ScSegmentElement.php";
                                    require_once "SC_DIRlib/php/extension/segmentation/segment_hook.php";
                                    require_once "SC_DIRlib/php/extension/segmentation/segment_custom.php";
                                    $segmentHook = new SegmentHook();
                                    goto SUFXq;
                                }
                                define("SCSG", false);
                                SUFXq:
                                if (!(defined("SC_ExportOrders_ACTIVE") && false && _r("MENU_ORD_EXPORTORDERS"))) {
                                    goto YljI_;
                                }
                                if (defined("_SC_LOG_LIMIT_")) {
                                    goto rf810;
                                }
                                define("_SC_LOG_LIMIT_", "5242880");
                                rf810:
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrder.php";
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrderFields.php";
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrderFilter.php";
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrderFilterForm.php";
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrderMapping.php";
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrderMappingForm.php";
                                require_once "SC_DIRlib/php/extension/export_order/ExportOrderTools.php";
                                YljI_:
                                if (!(defined("SC_ExportCustomers_ACTIVE") && false && _r("MENU_CUS_EXPORTCUSTOMERS"))) {
                                    goto tt3rE;
                                }
                                if (defined("_SC_LOG_LIMIT_")) {
                                    goto P9uMX;
                                }
                                define("_SC_LOG_LIMIT_", "5242880");
                                P9uMX:
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomer.php";
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomerFields.php";
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomerFilter.php";
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomerFilterForm.php";
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomerMapping.php";
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomerMappingForm.php";
                                require_once "SC_DIRlib/php/extension/export_customer/ExportCustomerTools.php";
                                tt3rE:
                                function removeUnwantedFiles()
                                {
                                    if (!is_dir("SC_DIR_yakpro")) {
                                        goto WRRSV;
                                    }
                                    dirRemove("SC_DIR_yakpro");
                                    WRRSV:
                                }
                                $scExtensions_toDisabledInScTools = array("fixmyprestashop", "multiplefeatures", "win_grids_editor", "win_grids_editor_pro", "segmentation", "segmentproperties", "affiliation");
                                $psModuleManagementBoUrl = "../index.php?" . (version_compare(_PS_VERSION_, "1.5.0.0", ">=") ? "controller=AdminModules" : "tab=AdminModules") . "&token=" . $sc_agent->getPSToken("AdminModules");
                                if ($ajax) {
                                    goto hZKah;
                                }
                                $scModulesInfos = SCI::getScModulesInfos();
                                $menuConfiguration = array("Tools" => '', "ToolsActions" => '');
                                if (!SC_TOOLS) {
                                    goto Kxdat;
                                }
                                foreach ($sc_tools_list as $tool) {
                                    if (!in_array($tool, $scExtensions_toDisabledInScTools)) {
                                        if (!(file_exists(SC_TOOLS_DIR . $tool . "/menu.xml") && ($mc = simplexml_load_file(SC_TOOLS_DIR . $tool . "/menu.xml")))) {
                                            goto naS4B;
                                        }
                                        $menuConfiguration["Tools"] .= $mc->menuTools->content;
                                        $menuConfiguration["ToolsActions"] .= $mc->menuTools->actions;
                                        naS4B:
                                        goto lO4ta;
                                    }
                                    lO4ta:
                                }
                                if (!($menuConfiguration["Tools"] != '')) {
                                    goto qyC29;
                                }
                                $menuConfiguration["Tools"] .= "'<item id=\"sepTools\" type=\"separator\"/>'+";
                                qyC29:
                                Kxdat:
                                $menu_js_action = '';
                                $menu_js_action .= "if (id=='cat_tree'){\n        if(SC_PAGE=='cat_tree')\n        {\n            if (casState.ctrl == true){\n                window.open('index.php?page=cat_tree');\n            } else {\n                tree_mode='single';\n                cat.cells('a').expand();\n                cat_tb.setItemState('withSubCateg', false, true);\n                cat_productPanel.setText('" . _l("Products", 1) . " " . _l("of", 1) . "'+cat_tree.getItemText(catselection));\n            }\n        }else{\n            if (casState.ctrl == true){\n                window.open('index.php?page=cat_tree');\n            } else {\n                document.location='index.php?page=cat_tree';\n            }\n        }\n    }\n    if (id=='cat_grid'){\n        if(SC_PAGE=='cat_tree')\n        {\n            if (casState.ctrl == true){\n                window.open('index.php?page=cat_tree&displayAllProducts=1');\n            } else {\n                cat.cells('a').collapse();\n                catselection=1;\n                cat_tree.openItem(catselection);\n                cat_tree.selectItem(catselection,false);\n                cat_tb.setItemState('withSubCateg', true, true);\n                cat_productPanel.setText('" . _l("Products list", 1) . "');\n            }\n        }else{\n            if (casState.ctrl == true) {\n                window.open('index.php?page=cat_tree&displayAllProducts=1');\n            } else {\n                document.location='index.php?page=cat_tree&displayAllProducts=1';\n            }\n        }\n    }\n    if (id=='ser_page404'){\n        if (!dhxWins.isWindow('wPageNotFound'))\n        {\n            wPageNotFound = dhxWins.createWindow('wPageNotFound', 50, 50, 1000, \$(window).height()-75);\n            wPageNotFound.setText('" . _l("Page not found 404", 1) . "');\n            \$.get('index.php?ajax=1&act=ser_win-pagenotfound404_init',function(data){\n                \$('#jsExecute').html(data);\n            });\n        }\n    }\n    if (id=='ser_emptysmartycache'){\n        \$.get('index.php?ajax=1&act=ser_emptysmartycache',function(data){\n            dhtmlx.message({text:data,type:'info',expire:5000});\n        });\n    }\n    if (id=='cat_history'){\n        if (!dhxWins.isWindow('wCatHistory'))\n        {\n            wCatHistory = dhxWins.createWindow('wCatHistory', 50, 50, 940, \$(window).height()-75);\n            wCatHistory.setText('" . _l("Browse history", 1) . "'); //  and cancel modifications\n            \$.get('index.php?ajax=1&act=all_changehistory_init',function(data){\n                \$('#jsExecute').html(data);\n            });\n        }\n    }\n\n    if (id=='core_queuelogs'){\n        openQueueLogWindow();\n    }\n    if (id=='core_settings'){\n        openSettingsWindow();\n    }\n    if (id=='core_languagehelp'){\n        window.open('" . getScExternalLink("multi_language") . "');\n    }\n    if (id.substr(0,14)=='core_language_'){\n        \$.post('index.php?ajax=1&act=all_uisettings_update&id_lang='+SC_ID_LANG+'&'+new Date().getTime(), {'name':'forceSCLangIso', 'data':id.substr(14,2)},function(data){\n                document.location = document.location;\n            });\n    }\n    if (id=='core_languageupdate'){\n        if (!dhxWins.isWindow('wCoreUpdateTranslations'))\n        {\n            wCoreUpdateTranslations = dhxWins.createWindow('wCoreUpdateTranslations', 50, 50, 900, \$(window).height()-75);\n            wCoreUpdateTranslations.setText('" . _l("Store Commander translations update", 1) . "');\n            wCoreUpdateTranslations.attachURL('index.php?ajax=1&act=core_update_translations');\n            wCoreUpdateTranslations.setModal(true);\n        }else{\n            wCoreUpdateTranslations.show();\n        }\n    }\n    if (id=='cat_resetpricedropdates'){ ";
                                $menu_js_action .= " if (confirm('" . _l("Are you sure you want to reset prices drop dates?", 1) . "'))\n            {\n                \$.get('index.php?ajax=1&act=cat_resetpricedrop&action=dates', function(data){\n                      displayProducts();\n                });\n            } ";
                                $menu_js_action .= " }\n    if (id=='cat_resetpricedropreductions'){\n         if (confirm('" . _l("Are you sure you want to reset prices drop reductions?", 1) . "'))\n                {\n                    \$.get('index.php?ajax=1&act=cat_resetpricedrop&action=reductions', function(data){\n                          displayProducts();\n                        });\n                } ";
                                $menu_js_action .= " }\n    if (id=='cat_resetpricedrop'){ ";
                                $menu_js_action .= " if (confirm('" . _l("Are you sure you want to reset all prices drop?", 1) . "'))\n                {\n                    \$.get('index.php?ajax=1&act=cat_resetpricedrop&action=delsales', function(data){\n                          displayProducts();\n                        });\n                } ";
                                $menu_js_action .= " }\n    if (id=='cat_attributes'){\n        if (!dhxWins.isWindow('wAttributes'))\n        {\n            wAttributes = dhxWins.createWindow('wAttributes', 50, 50, 900, \$(window).height()-75);\n            wAttributes.setText('" . _l("Attributes and groups", 1) . "');\n            \$.get('index.php?ajax=1&act=cat_win-attribute_init',function(data){\n                    \$('#jsExecute').html(data);\n                });\n            wAttributes.attachEvent('onClose', function(win){\n                    wAttributes.hide();\n                    return false;\n                });\n        }else{\n            wAttributes.show();\n        }\n    }\n    if (id=='cat_features'){\n        if (!dhxWins.isWindow('wFeatures'))\n        {\n            wFeatures = dhxWins.createWindow('wFeatures', 50, 50, 900, \$(window).height()-75);\n            wFeatures.setText('" . _l("Features", 1) . "');\n            \$.get('index.php?ajax=1&act=cat_win-feature_init',function(data){\n                    \$('#jsExecute').html(data);\n                });\n            wFeatures.attachEvent('onClose', function(win){\n                    wFeatures.hide();\n                    return false;\n                });\n        }else{\n            wFeatures.show();\n        }\n    }\n\n    if (id=='cat_impexp_attr_translation' || id=='cat_impexp_feat_translation'){\n        if (!dhxWins.isWindow('wImpExpTranslation'))\n        {\n            wImpExpTranslation = dhxWins.createWindow('wImpExpTranslation', 50, 50, 900, \$(window).height()-75);\n            \$.get('index.php?ajax=1&act=cat_win-impexptranslation_init',function(data){\n                    \$('#jsExecute').html(data);\n                });\n        }else{\n            wImpExpTranslation.show();\n        }\n    }\n\n    if (id=='man_tree'){\n        if(SC_PAGE=='man_tree')\n        {\n            if (casState.ctrl == true) {\n                window.open('index.php?page=man_tree');\n            } else {\n                tree_mode='single';\n                man.cells('a').expand();\n            }\n        }else{\n            if (casState.ctrl == true) {\n                window.open('index.php?page=man_tree');\n            } else {\n                document.location='index.php?page=man_tree';\n            }\n        }\n    }\n    if (id == 'man_import') {\n        if (!dhxWins.isWindow('wManImport')) {\n            wManImport = dhxWins.createWindow('wManImport', 50, 50, 1100, \$(window).height() - 75);\n            wManImport.setText('" . _l("Import - Backup your base before any mass update!", 1) . "');\n            \$.get('index.php?ajax=1&act=man_win-import_init', function (data) {\n                \$('#jsExecute').html(data);\n            });\n            wManImport.attachEvent('onClose', function (win) {\n                wManImport.hide();\n                return false;\n            });\n        } else {\n            \$.get('index.php?ajax=1&act=man_win-import_init', function (data) {\n                \$('#jsExecute').html(data);\n            });\n            wManImport.show();\n        }\n    }\n\n    if (id=='sup_tree'){\n        if(SC_PAGE=='sup_tree')\n        {\n            if (casState.ctrl == true) {\n                window.open('index.php?page=sup_tree');\n            } else {\n                tree_mode='single';\n                sup.cells('a').expand();\n            }\n        }else{\n            if (casState.ctrl == true) {\n                window.open('index.php?page=sup_tree');\n            } else {\n                document.location='index.php?page=sup_tree';\n            }\n        }\n    }\n    ";
                                $menu_js_action .= "\n    if (id=='cus_groupmanagement'){\n        if (!dhxWins.isWindow('wGroupManagement'))\n        {\n            wGroupManagement = dhxWins.createWindow('wGroupManagement', 50, 50, 1050, \$(window).height()-75);\n            wGroupManagement.setText('" . _l("Customer groups", 1) . "');\n            \$.get('index.php?ajax=1&act=cus_win-groupmanagement_init',function(data){\n                    \$('#jsExecute').html(data);\n                });\n            wGroupManagement.attachEvent('onClose', function(win){\n                    wGroupManagement.hide();\n                    return false;\n                });\n        }else{\n            wGroupManagement.show();\n        }\n    } ";
                                $menu_js_action .= " if (id=='cat_import'){";
                                $menu_js_action .= " if (!dhxWins.isWindow('wImport')) {\n                         wImport = dhxWins.createWindow('wImport', 50, 50, 1100, \$(window).height()-75);\n                        wImport.setText('" . _l("Import - Backup your base before any mass update!", 1) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-import_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wImport.attachEvent('onClose', function(win){\n                                wImport.hide();\n                                return false;\n                            });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-import_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wImport.show();\n                    }\n                ";
                                $menu_js_action .= "\n            }\n             if (id=='cat_catimport'){";
                                $menu_js_action .= " if (!dhxWins.isWindow('wCatImport')) {\n                         wCatImport = dhxWins.createWindow('wCatImport', 50, 50, 1050, \$(window).height()-75);\n                        wCatImport.setText('" . _l("Import - Backup your base before any mass update!", 1) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-catimport_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wCatImport.attachEvent('onClose', function(win){\n                                wCatImport.hide();\n                                return false;\n                            });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-catimport_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wCatImport.show();\n                    }\n                ";
                                $menu_js_action .= "\n            }\n             if (id=='cat_catexport'){";
                                $menu_js_action .= " if (!dhxWins.isWindow('wCatExport')) {\n                         wCatExport = dhxWins.createWindow('wCatExport', 50, 50, 1050, \$(window).height()-75);\n                        wCatExport.setText('" . _l("Categories", 1) . " - " . _l("CSV Export", 1) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-catexport_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wCatExport.attachEvent('onClose', function(win){\n                                wCatExport.hide();\n                                return false;\n                            });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-catexport_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wCatExport.show();\n                    }\n                ";
                                $menu_js_action .= "\n            }\n                if (id=='cus_import'){";
                                $menu_js_action .= "\n                if (!dhxWins.isWindow('wImportCus')) {\n                    wImportCus = dhxWins.createWindow('wImportCus', 50, 50, 1100, \$(window).height()-75);\n                    wImportCus.setText('" . _l("Import - Backup your base before any mass update!", 1) . "');\n                    \$.get('index.php?ajax=1&act=cus_win-import_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    wImportCus.attachEvent('onClose', function(win){\n                            wImportCus.hide();\n                            return false;\n                        });\n                }else{\n                    \$.get('index.php?ajax=1&act=cus_win-import_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    wImportCus.show();\n                }\n            ";
                                $menu_js_action .= "\n            }\n                if(id=='cat_synchro_cats_positions'){\n                        if (!dhxWins.isWindow('wSynchroCatsPos'))\n                        {\n                            wSynchroCatsPos = dhxWins.createWindow('wSynchroCatsPos', 50, 50, 800, 500);\n                            wSynchroCatsPos.setText('" . _l("Synchronize the categories positions on multiple shops", 1) . "');\n                            \$.get('index.php?ajax=1&act=cat_win-categorysynch_init',function(data){\n                                    \$('#jsExecute').html(data);\n                                });\n                            wSynchroCatsPos.setModal(true);\n                        }else{\n                            \$.get('index.php?ajax=1&act=cat_win-categorysynch_init',function(data){\n                                    \$('#jsExecute').html(data);\n                                });\n                            wSynchroCatsPos.show();\n                            wSynchroCatsPos.setModal(true);\n                        }\n                }\n                if (id=='cat_management'){\n                    if (!dhxWins.isWindow('wCatManagement'))\n                    {\n                        wCatManagement = dhxWins.createWindow('wCatManagement', 0, 28, \$(window).width(), \$(window).height()-28);\n                        wCatManagement.setText('" . _l("Categories management", 1) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-catmanagement_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wCatManagement.attachEvent('onClose', function(win){\n                                wCatManagement.hide();\n                                return false;\n                            });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-catmanagement_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wCatManagement.show();\n                    }\n                }\n                if (id=='cat_specificprice'){\n                    if (!dhxWins.isWindow('wSpecificPrice'))\n                    { ";
                                $menu_js_action .= " wSpecificPrice = dhxWins.createWindow('wSpecificPrice', 0, 28, \$(window).width(), \$(window).height()-28);\n                        wSpecificPrice.setText('" . _l("Specific prices", 1) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-specificprice_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wSpecificPrice.attachEvent('onClose', function(win){\n                                wSpecificPrice.hide();\n                                return false;\n                            });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-specificprice_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wSpecificPrice.show();\n                    }\n                }\n                if (id=='cat_export'){ ";
                                if (!file_exists(SC_CSV_EXPORT_DIR) || !file_exists(SC_TOOLS_DIR) || !file_exists("SC_TOOLS_DIRcat_export/") || !file_exists("SC_TOOLS_DIRcat_categories_sel/")) {
                                    $menu_js_action .= "dhtmlx.message({text:'" . _l("To run exports, you need to install samples files from Tools > Installation", 1) . "<br/><a target=\"_blank\" href=\"" . getScExternalLink("support_csv_export_install") . "\">" . _l("Read more", 1) . "</a>',type:'error'});";
                                    goto Gpwk4;
                                }
                                $menu_js_action .= " if (!dhxWins.isWindow('wExport')) {\n                         wExport = dhxWins.createWindow('wExport', 50, 50, 1200, \$(window).height()-75);\n                        wExport.setText('" . _l("CSV Export", 1) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-export_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wExport.attachEvent('onClose', function(win){\n                                wExport.hide();\n                                return false;\n                            });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-export_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wExport.show();\n                    } ";
                                Gpwk4:
                                $menu_js_action .= " } ";
                                $as_version = SCI::getModuleVersion("pm_advancedsearch4");
                                if (!(SCI::moduleIsInstalled("pm_advancedsearch4") && version_compare($as_version, "4.12.0", ">=") && defined("SC_AdvancedSearchSeo_ACTIVE") && SC_AdvancedSearchSeo_ACTIVE)) {
                                    goto SfQEh;
                                }
                                $menu_js_action .= "\n                if (id=='cat_advancedsearchseo'){\n                    if (!dhxWins.isWindow('wAdvancedSearchSeo')) {\n                        wAdvancedSearchSeo = dhxWins.createWindow('wAdvancedSearchSeo', 50, 50, \$(window).width()-100, \$(window).height()-75);\n                        wAdvancedSearchSeo.setText('" . _l("%s - SEO Pages", 1, array("Advanced Search")) . "');\n                        \$.get('index.php?ajax=1&act=cat_win-advancedsearchseo_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                        wAdvancedSearchSeo.attachEvent('onClose', function(win){\n                            wAdvancedSearchSeo.hide();\n                            return false;\n                        });\n                    }else{\n                        \$.get('index.php?ajax=1&act=cat_win-advancedsearchseo_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wAdvancedSearchSeo.show();\n                    }\n                }\n        ";
                                SfQEh:
                                $menu_js_action .= " if (id=='ord_orders'){ ";
                                $menu_js_action .= " if(SC_PAGE=='ord_tree')\n                {\n                    if (casState.ctrl == true) {\n                        window.open('index.php?page=ord_tree');\n                    }\n                } else {\n                    if (casState.ctrl == true) {\n                        window.open('index.php?page=ord_tree');\n                    } else {\n                        document.location='index.php?page=ord_tree';\n                    }\n                }";
                                $menu_js_action .= " }\n        if(id=='ord_cartrules') {\n            if (!dhxWins.isWindow('wCartRules')) {\n                wCartRules = dhxWins.createWindow('wCartRules', 0, 28, \$(window).width(), \$(window).height()-28);\n                wCartRules.setText('" . _l("Discount vouchers (cart rules)", 1) . "');\n                \$.get('index.php?ajax=1&act=ord_win-cartrules_init',function(data){\n                        \$('#jsExecute').html(data);\n                    });\n                wCartRules.attachEvent('onClose', function(win){\n                        wCartRules.hide();\n                        return false;\n                    });\n            }else{\n                \$.get('index.php?ajax=1&act=ord_win-cartrules_init',function(data){\n                        \$('#jsExecute').html(data);\n                    });\n                wCartRules.show();\n            }\n        }\n        if(id=='ord_states') {\n            if (!dhxWins.isWindow('wOrderStates')) {\n                wOrderStates = dhxWins.createWindow('wOrderStates', 0, 28, \$(window).width()/1.1, \$(window).height()/1.1);\n                wOrderStates.center();\n                wOrderStates.setText('" . _l("Manage order statuses", 1) . "');\n                \$.get('index.php?ajax=1&act=ord_win-states_init',function(data){\n                        \$('#jsExecute').html(data);\n                    });\n                wOrderStates.attachEvent('onClose', function(win){\n                        wOrderStates.hide();\n                        return false;\n                    });\n            }else{\n                \$.get('index.php?ajax=1&act=ord_win-states_init',function(data){\n                        \$('#jsExecute').html(data);\n                    });\n                wOrderStates.show();\n            }\n        }\n        if(id=='ord_win_makeorder') {";
                                if (defined("SC_DEMO") && SC_DEMO || defined("SUB6TYP2") && in_array(SUB6TYP2, array(3, 4, 5, 7, 9, 10))) {
                                    $menu_js_action .= "\n            if (!dhxWins.isWindow('wMakeOrder')) {\n                wMakeOrder = dhxWins.createWindow('wMakeOrder', 50, 50, \$(window).width()-75, \$(window).height()-75);\n                wMakeOrder.maximize();\n                wMakeOrder.setText('" . _l("Create an order", 1) . "');\n                \$.get('index.php?ajax=1&act=ord_win-makeorder_init',function(data){\n                    \$('#jsExecute').html(data);\n                });\n                wMakeOrder.attachEvent('onClose', function(win){\n                    wMakeOrder.hide();\n                    return false;\n                });\n            }else{\n                \$.get('index.php?ajax=1&act=ord_win-makeorder_init',function(data){\n                    \$('#jsExecute').html(data);\n                });\n                wMakeOrder.show();\n            }";
                                    goto rEx2p;
                                }
                                $menu_js_action .= " window.open('" . getScExternalLink("support_creating_order") . "'); ";
                                rEx2p:
                                $menu_js_action .= " }";
                                $menu_js_action .= "\n                if (id=='cus_customers'){";
                                $menu_js_action .= "\n    if(SC_PAGE=='cus_tree')\n    {\n        if (casState.ctrl == true) {\n            window.open('index.php?page=cus_tree');\n        }\n    }else{\n        if (casState.ctrl == true) {\n            window.open('index.php?page=cus_tree');\n        } else {\n            document.location='index.php?page=cus_tree';\n        }\n    }";
                                $menu_js_action .= "\n                }\n                if (id=='cusm_customersservice'){";
                                $menu_js_action .= "\n            if(SC_PAGE=='cusm_tree')\n            {\n                if (casState.ctrl == true){\n                    window.open('index.php?page=cusm_tree');\n                }\n            }else{\n                if (casState.ctrl == true) {\n                    window.open('index.php?page=cusm_tree');\n                } else {\n                    document.location='index.php?page=cusm_tree';\n                }\n            }";
                                $menu_js_action .= "\n                }\n                if (id=='cus_tools_format_capitalize'){\n                    setFormatData('capitalize');\n                }\n                if (id=='cus_tools_format_uppercase'){\n                    setFormatData('uppercase');\n                }\n                if (id=='emailing'){\n                    alert('Not yet available');\n                }\n                if (id=='tools_clearcookies_all'){\n                    clearConfigCookie('all');\n                }\n                if (id=='config_ebay'){\n                    if (!dhxWins.isWindow('weBay'))\n                    {\n                        weBay = dhxWins.createWindow('weBay', 50, 50, 1000, \$(window).height()-75);\n                        weBay.setText('eBay');\n                        weBay.attachURL('../index.php?tab=AdminModules&configure=ebay&tab_module=market_place&module_name=ebay&token=" . $sc_agent->getPSToken("AdminModules") . "');\n                    }\n                }\n                if (id=='config_createquickaccess'){\n                    \$.get('index.php?ajax=1&act=core_createlink', function(data){\n                      dhtmlx.message({text:data,type:'info',expire:5000});\n                    });\n                }\n                if (id=='permissions'){\n                    if (!dhxWins.isWindow('wCorePermissions'))\n                    {\n                        wCorePermissions = dhxWins.createWindow('wCorePermissions', 50, 50, Math.min(\$(window).width()-100, 1000), \$(window).height()-75);\n                        wCorePermissions.setText('" . _l("User permissions", 1) . "');\n                        \$.get('index.php?ajax=1&act=core_permissions_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                    }\n                }\n                if (id=='config_createcsvimportsample'){\n                    \$.get('index.php?ajax=1&act=core_install_cat_import', function(data){\n                      dhtmlx.message({text:data,type:'info',expire:5000});\n                    });\n                }\n                if (id=='config_createcsvexportsample'){\n                    \$.get('index.php?ajax=1&act=core_install_cat_export', function(data){\n                      alert(data);\n                      document.location='index.php';\n                    });\n                }\n                if (id=='config_changehashdir'){\n                 ";
                                $menu_js_action .= "dhtmlx.confirm({\n                    title: '" . _l("Change security key", 1) . "',\n                    text: '" . _l("Changing the security key will change the name of Store Commander's security directory.<br/><br/><strong>Beware:</strong><br/>Everyone currently using SC will need to restart Store Commander from the backoffice.  Please let the users know!<br/><br/>If CRON tasks are in place, remember to change the URL path in the tasks configuration files.<br/><br/><a href=\"%s\" target=\"blank\">Get more information</a>", 1, array(getScExternalLink("support_change_security_key"))) . "',\n                    callback: function(result) {\n                        if(result==true)\n                        {\n                            \$.post('index.php?ajax=1&act=core_changehashdir&', {current_url: window.location.href}, function(data){\n                                if(data!=undefined && data!='' && data!=null)\n                                    document.location=data;\n                            });\n                        }\n                    }\n                });";
                                $menu_js_action .= "\n                }\n                if (id=='link_psfront'){\n                    window.open('SC_PS_PATH_RELindex.php');\n                } ";
                                $menu_js_action .= "if (id=='cms_tree'){\n        if(SC_PAGE=='cms_tree')\n        {\n            if (casState.ctrl == true) {\n                window.open('index.php?page=cms_tree');\n            } else {\n                tree_mode='single';\n                cms.cells('a').expand();\n                cms_tb.setItemState('withSubCateg', false, true);\n                cms_pagePanel.setText('" . _l("Cms", 1) . " " . _l("of", 1) . "'+cms_tree.getItemText(cmsselection));\n            }\n        }else{\n            if (casState.ctrl == true) {\n                window.open('index.php?page=cms_tree');\n            } else {\n                document.location='index.php?page=cms_tree';\n            }\n        }\n    }";
                                if (!SCMS) {
                                    goto kMIhZ;
                                }
                                $sql_shop = "SELECT id_shop, name\n                    FROM _DB_PREFIX_shop\n                    WHERE deleted != '1'";
                                $shops = Db::getInstance()->ExecuteS($sql_shop);
                                if (!(!empty($shops) && count($shops) > 1)) {
                                    goto G_Uqz;
                                }
                                foreach ($shops as $shop) {
                                    $url = Db::getInstance()->ExecuteS("SELECT *, CONCAT(\"http://\", domain, physical_uri, virtual_uri) AS url\n                    FROM _DB_PREFIX_shop_url\n                    WHERE id_shop = " . (int) $shop["id_shop"] . "\n                        AND active = \"1\"\n                    ORDER BY main DESC\n                    LIMIT 1");
                                    if (empty($url[0]["url"])) {
                                        goto bN29N;
                                    }
                                    $menu_js_action .= " if (id=='link_psfront_shop_" . $shop["id_shop"] . "'){\n                                window.open('" . $url[0]["url"] . "');\n                            } ";
                                    bN29N:
                                }
                                G_Uqz:
                                kMIhZ:
                                $menu_js_action .= "\n                if (id=='link_psbo'){\n                    window.open('../index.php');\n                }\n                if (id=='link_ps'){\n                    window.open('http://www.prestashop.com');\n                }\n                if (id=='mar_affiliation'){\n                    wAffiliation = dhxLayout.dhxWins.createWindow('wAffiliation', 0, 25, \$(window).width(), \$(window).height()-25);\n                    wAffiliation.setText('" . _l("Affiliation program", 1) . "');\n                    \$.get('index.php?ajax=2&p=affiliation/affiliation',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    wAffiliation.attachEvent('onClose', function(win){\n                            wAffiliation.hide();\n                        });\n                }\n                if (id=='teaser_affiliation_read'){ ";
                                $menu_js_action .= " window.open('" . getScExternalLink("affiliation_programm") . "'); ";
                                $menu_js_action .= "\n                }\n                if (id=='mar_segmentation' || id=='too_segmentation'){\n                    if (!dhxWins.isWindow('toolsSegmentationWindow'))\n                    {\n                        toolsSegmentationWindow = dhxWins.createWindow('toolsSegmentationWindow', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                        toolsSegmentationWindow.setText('" . _l("Segmentation", 1) . "');\n                        toolsSegmentationWindow.attachEvent('onClose', function(win){\n                                toolsSegmentationWindow.hide();\n                                return false;\n                            });\n                        \$.get('index.php?ajax=1&act=all_win-segmentation_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n\n                    }else{\n                        \$.get('index.php?ajax=1&act=all_win-segmentation_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        toolsSegmentationWindow.show();\n                    }\n                }\n                if (id=='teaser_segmentation_read' || id=='too_teaser_segmentation_read'){\n                    if (!dhxWins.isWindow('wSegTrialWindow'))\n                    {\n                        wSegTrialWindow = dhxWins.createWindow('wSegTrialWindow', 50, 50, 670, 550);\n                        wSegTrialWindow.setText('" . _l("Segments management", 1) . "');\n                    }\n                    wSegTrialWindow.attachURL('index.php?ajax=1&act=all_gettrialtime&id_lang='+SC_ID_LANG+'&item=segmentation');\n                }";
                                if (!getScSessionItemValue("early_access", "scc")) {
                                    goto ErZZ6;
                                }
                                $menu_js_action .= "\n                if(id=='scc_lab') {\n                    if (!dhxWins.isWindow('wScclab'))\n                    {\n                        wScclab = dhxWins.createWindow('wScclab', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                        wScclab.setText('SCC Lab');\n                        wScclab.attachEvent('onClose', function(win){\n                            wScclab.hide();\n                            return false;\n                        });\n                        \$.get('index.php?ajax=1&act=all_win-scclab_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    }else{\n                        \$.get('index.php?ajax=1&act=all_win-scclab_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                        wScclab.show();\n                    }\n                }";
                                ErZZ6:
                                if (!$scModulesInfos["scpdfcatalog"]["installed"]) {
                                    goto HWJ2z;
                                }
                                $menu_js_action .= "\n                if(id=='catalog_pdf_read') {\n                    window.open('../index.php?" . (version_compare(_PS_VERSION_, "1.5.0.0", ">=") ? "controller=AdminSCPDFCatalog" : "tab=AdminSCPDFCatalog") . "&token=" . $sc_agent->getPSToken("AdminSCPDFCatalog") . "');\n                    pushOneUsage('menu-bo-link-installed-scpdfcatalog');\n                }";
                                HWJ2z:
                                $menu_js_action .= "\n                if(id=='catalog_pdf_read_install') {\n                    window.open('" . $psModuleManagementBoUrl . "', '_blank');\n                }\n                if(id=='catalog_pdf_read_download') {\n                    \$.post('index.php?ajax=1&act=ser_download',{item:'CatalogPDF'}, function(response){\n                        let responseData = JSON.parse(response);\n                        if(responseData.status === 'error') {\n                            dhtmlx.message({text:responseData.message,type:responseData.status,expire:10000});\n                        } else {\n                            dhtmlx.message({text:responseData.message,type:responseData.status,expire:-1});\n                            window.open('" . $psModuleManagementBoUrl . "', '_blank');\n                        }\n                    });\n                }";
                                if (!false) {
                                    goto s7KE7;
                                }
                                $menu_js_action .= "if (id=='cus_export')\n                        {\n                            if (!dhxWins.isWindow('wExportCustomers'))\n                            {\n                                wExportCustomers = dhxWins.createWindow('wExportCustomers', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                                wExportCustomers.setText('" . _l("Customer Export Pro", 1) . "');\n                                wExportCustomers.attachEvent('onClose', function(win){\n                                        wExportCustomers.hide();\n                                        return false;\n                                    });\n                                \$.get('index.php?ajax=1&act=cus_win-export_init',function(data){\n                                    \$('#jsExecute').html(data);\n                                });\n                            }else{\n                                \$.get('index.php?ajax=1&act=cus_win-export_init',function(data){\n                                    \$('#jsExecute').html(data);\n                                });\n                                wExportCustomers.show();\n                            }\n                        }";
                                s7KE7:
                                $menu_js_action .= "if (id=='teaser_cus_export_read'){ ";
                                $menu_js_action .= " window.open('" . getScExternalLink("export_customer_pro") . "');\n                        pushOneUsage('menu-bo-link-scexportcustomers'); ";
                                $menu_js_action .= " }\n                if (id=='teaser_gridseditor_read'){ ";
                                $menu_js_action .= " window.open('" . getScExternalLink("interface_customization") . "'); ";
                                $menu_js_action .= " }\n                if (id=='win_grids_editor'){\n                    if (!dhxWins.isWindow('toolsSCGridsEditor'))\n                    {\n                        toolsSCGridsEditor = dhxWins.createWindow('toolsSCGridsEditor', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                        toolsSCGridsEditor.setText('" . _l("Interface customization", 1) . "');\n                        toolsSCGridsEditor.attachEvent('onClose', function(win){\n                                toolsSCGridsEditor.hide();\n                                return false;\n                            });\n                        \$.get('index.php?ajax=1&act=all_win-gridseditor_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n\n                    }else{\n                        \$.get('index.php?ajax=1&act=all_win-gridseditor_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        toolsSCGridsEditor.show();\n                    }\n                }\n                if (id=='win_terminator'){\n                    if (!dhxWins.isWindow('toolsTerminator'))\n                    {\n                        toolsTerminator = dhxWins.createWindow('toolsTerminator', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                        toolsTerminator.setText('" . _l("Shop cleaning and optimization", 1) . "');\n                        toolsTerminator.attachEvent('onClose', function(win){\n                                toolsTerminator.hide();\n                                return false;\n                            });\n                        \$.get('index.php?ajax=1&act=all_win-terminator_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n\n                    }else{\n                        \$.get('index.php?ajax=1&act=all_win-terminator_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        toolsTerminator.show();\n                    }\n                }\n                if (id=='fixmyprestashop'){\n                    if (!dhxWins.isWindow('wFixmyprestashop'))\n                    {\n                        wFixmyprestashop = dhxWins.createWindow('wFixmyprestashop', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                        wFixmyprestashop.setText('FixMyPrestashop');\n                        wFixmyprestashop.attachEvent('onClose', function(win){\n                                wFixmyprestashop.hide();\n                                return false;\n                            });\n                        \$.get('index.php?ajax=1&act=all_win-fixmyprestashop_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n\n                    }else{\n                        \$.get('index.php?ajax=1&act=all_win-fixmyprestashop_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wFixmyprestashop.show();\n                    }\n                }";
                                if (!$scModulesInfos["scaffiliation"]["installed"]) {
                                    goto wOUKG;
                                }
                                $menu_js_action .= "\n                if (id=='affiliation'){\n                    pushOneUsage('menu-bo-link-installed-scaffiliation');\n                    if (!dhxWins.isWindow('wAffiliation'))\n                    {\n                        wAffiliation = dhxWins.createWindow('wAffiliation', 0, 25, \$(window).width(), \$(window).height()-25);\n                        wAffiliation.setText('" . _l("Affiliation program", 1) . "');\n                        wAffiliation.attachEvent('onClose', function(win){\n                                wAffiliation.hide();\n                                return false;\n                            });\n                        \$.get('index.php?ajax=1&act=all_win-affiliation_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n\n                    }else{\n                        \$.get('index.php?ajax=1&act=all_win-affiliation_init',function(data){\n                                \$('#jsExecute').html(data);\n                            });\n                        wAffiliation.show();\n                    }\n                }";
                                wOUKG:
                                $menu_js_action .= "\n                if(id=='affiliation_install') {\n                    window.open('" . $psModuleManagementBoUrl . "', '_blank');\n                }\n                if(id=='affiliation_download') {\n                    \$.post('index.php?ajax=1&act=ser_download',{item:'Affiliation'}, function(response){\n                        let responseData = JSON.parse(response);\n                        if(responseData.status === 'error') {\n                            dhtmlx.message({text:responseData.message,type:responseData.status,expire:10000});\n                        } else {\n                            dhtmlx.message({text:responseData.message,type:responseData.status,expire:-1});\n                            window.open('" . $psModuleManagementBoUrl . "', '_blank');\n                        }\n                    });\n                }\n                if (id=='teaser_fixmyps_read'){ ";
                                $menu_js_action .= " window.open('" . getScExternalLink("fixmyprestashop") . "');\n                            pushOneUsage('menu-bo-link-scaffiliation'); ";
                                $menu_js_action .= " }\n\n                if (id=='teaser_terminator_read'){ window.open('" . getScExternalLink("module_terminator") . "'); }";
                                if (!false) {
                                    goto Qjien;
                                }
                                $menu_js_action .= "\n                        if (id=='acc_quickaccounting')\n                        {\n                            if (!dhxWins.isWindow('wExportOrders'))\n                            {\n                                wExportOrders = dhxWins.createWindow('wExportOrders', 50, 50, \$(window).width()-100, \$(window).height()-100);\n                                wExportOrders.setText('" . _l("Order Export Pro", 1) . "');\n                                wExportOrders.attachEvent('onClose', function(win){\n                                        wExportOrders.hide();\n                                        return false;\n                                    });\n                                \$.get('index.php?ajax=1&act=ord_win-export_init',function(data){\n                                    \$('#jsExecute').html(data);\n                                });\n                            }else{\n                                \$.get('index.php?ajax=1&act=ord_win-export_init',function(data){\n                                    \$('#jsExecute').html(data);\n                                });\n                                wExportOrders.show();\n                            }\n                        }   \n                    ";
                                Qjien:
                                $menu_js_action .= "if (id=='teaser_quickaccounting_read'){ ";
                                $menu_js_action .= " window.open('" . getScExternalLink("export_orders_pro") . "');\n                        pushOneUsage('menu-bo-link-scquickaccounting'); ";
                                $menu_js_action .= " }\n                if (id=='acc_vatscheduler'){\n                    wVATScheduler = dhxLayout.dhxWins.createWindow('wVATScheduler', 0, 25, \$(window).width(), \$(window).height()-25);\n                    wVATScheduler.setText('" . _l("VAT Scheduler", 1) . "'); ";
                                if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                                    $menu_js_action .= " wVATScheduler.attachURL('../index.php?controller=AdminModules&configure=scvatscheduler&token=" . $sc_agent->getPSToken("AdminModules") . "&tab_module=billing_invoicing&module_name=scvatscheduler'); ";
                                    goto KDERH;
                                }
                                $menu_js_action .= " wVATScheduler.attachURL('../index.php?tab=AdminModules&configure=scvatscheduler&token=" . $sc_agent->getPSToken("AdminModules") . "&tab_module=billing_invoicing&module_name=scvatscheduler'); ";
                                KDERH:
                                $menu_js_action .= "\n                    wVATScheduler.attachEvent('onClose', function(win){\n                            wVATScheduler.hide();\n                        });\n                }";
                                if (!SCI::moduleIsInstalled("scterminator")) {
                                    goto nPHlr;
                                }
                                if (version_compare(_PS_VERSION_, "1.5.0.0", ">=")) {
                                    $url = "index.php?controller=AdminTerminator&token=" . $sc_agent->getPSToken("AdminTerminator");
                                    goto rVI6D;
                                }
                                $url = "index.php?tab=AdminTerminator&token=" . $sc_agent->getPSToken("AdminTerminator");
                                rVI6D:
                                $menu_js_action .= "\n                    if (id=='terminator'){\n                        wTerminator = dhxLayout.dhxWins.createWindow('wTerminator', 0, 25, \$(window).width(), \$(window).height()-25);\n                        wTerminator.setText('" . _l("Database cleaning and optimization", 1) . "');\n                        wTerminator.attachURL('" . SC_PS_PATH_ADMIN_REL . $url . "');\n                        wTerminator.attachEvent('onClose', function(win){\n                                wTerminator.hide();\n                            });\n                    } ";
                                nPHlr:
                                $menu_js_action .= "\n                if (id=='link_pse'){\n                    window.open('https://www.storecommander.com');\n                }\n                if (id=='help_help'){\n                    window.open('" . getScExternalLink("support_home") . "');\n                }\n                if (id=='help_tips_display'){\n                    if (!dhxWins.isWindow('wTips'))\n                    {\n                        wTips = dhxWins.createWindow('wTips', 150, 30, 800, Math.min(725,\$(window).height()-30));\n                        wTips.button('park').hide();\n                        wTips.button('minmax').hide();\n                        wTips.setText('" . _l("Tips", 1) . " - " . _l("Find all tips in Help &gt; Tips", 1) . "');\n                        wTips.attachURL('tips/index.php?disp=fronttip&lang=" . $user_lang_iso . "&id_employee=" . $sc_agent->id_employee . "', true);\n                        wTips.attachEvent('onClose', function(win){\n                            return true;\n                        });\n                    }else{\n                        wTips.attachURL('tips/index.php?disp=fronttip&lang=" . $user_lang_iso . "&id_employee=" . $sc_agent->id_employee . "', true);\n                        wTips.show();\n                    }\n                }\n                if (id=='help_tips_settings'){\n                    if (!dhxWins.isWindow('wTips'))\n                    {\n                        wTips = dhxWins.createWindow('wTips', 150, 30, 800, Math.min(725,\$(window).height()-30));\n                        wTips.button('park').hide();\n                        wTips.button('minmax').hide();\n                        wTips.setText('" . _l("Tips", 1) . "');\n                        wTips.attachURL('tips/index.php?disp=preference&lang=" . $user_lang_iso . "&id_employee=" . $sc_agent->id_employee . "', true);\n                        wTips.attachEvent('onClose', function(win){\n                            return true;\n                        });\n                    }else{\n                        wTips.attachURL('tips/index.php?disp=preference&lang=" . $user_lang_iso . "&id_employee=" . $sc_agent->id_employee . "', true);\n                        wTips.show();\n                    }\n                }\n                if (id=='help_enterlicense'){\n                    if (!dhxWins.isWindow('wEnterLicense'))\n                    {\n                        wEnterLicense = dhxWins.createWindow('wEnterLicense', 300, 200, 600, 300);\n                        wEnterLicense.setModal(true);\n                        wEnterLicense.button('park').hide();\n                        wEnterLicense.button('minmax').hide();\n                        wEnterLicense.setText('" . _l("Enter your license key", 1) . "');\n                        wEnterLicense.attachURL('index.php?ajax=1&act=core_license&a=displaysetform', true);\n                        wEnterLicense.attachEvent('onClose', function(win){\n\n                            if (dhxWins.isWindow('wUpgradeLicense')) {setTimeout('wUpgradeLicense.setModal(true);',1);}\n                            return true;\n                        });\n                    }\n                }";
                                $menu_js_action .= "\n                if (id=='help_bug'){ ";
                                $menu_js_action .= "\n                    if (!dhxWins.isWindow('wBugReport'))\n                    {\n                        wBugReport = dhxWins.createWindow('wBugReport', 50, 50, 750, \$(window).height()-75);\n                        wBugReport.button('park').hide();\n                        wBugReport.button('minmax').hide();\n                        wBugReport.setText('Support');\n                    }else{\n                        wBugReport.show();\n                    }\n                    wBugReport.attachURL('" . getScExternalLink("contact") . "&email=" . $sc_agent->email . "&firstname=" . urlencode($sc_agent->firstname) . "&name=" . urlencode($sc_agent->lastname) . "&content_only=1');\n                    wBugReport.attachEvent('onClose', function(win){\n                        wBugReport.hide();\n                        return false;\n                    }); ";
                                $menu_js_action .= "\n                }\n                if (id=='help_updates' || id=='help_updates2'){\n                    window.open('" . getScExternalLink("support_update_history") . "');\n                }\n                if (id=='version' || id=='version2'){\n                    if (!dhxWins.isWindow('wCoreUpdate'))\n                    {\n                        wCoreUpdate = dhxWins.createWindow('wCoreUpdate', 50, 50, 900, \$(window).height()-75);\n                        wCoreUpdate.setText('" . _l("Store Commander update", 1) . "');\n                        wCoreUpdate.attachURL('index.php?ajax=1&act=core_update');\n                        wCoreUpdate.setModal(true);\n                    }else{\n                        wCoreUpdate.show();\n                    }\n                }\n                if (id=='cat_rebuildsumstock'){\n                    \$.get('index.php?ajax=1&act=cat_rebuildsumstock',function(data){\n                            dhtmlx.message({text:data,type:'info',expire:5000});\n                        });\n                }\n                if (id=='cat_rebuildleveldepth'){\n                    if (!dhxWins.isWindow('wRebuildLevelDepth'))\n                    {\n                        wRebuildLevelDepth = dhxWins.createWindow('wRebuildLevelDepth', 200, 100, 400, 250);\n                        wRebuildLevelDepth.setText('" . _l("Check and fix categories", 1) . "');\n                        wRebuildLevelDepth.attachEvent('onClose', function(win){\n                                wRebuildLevelDepth.hide();\n                                return false;\n                            });\n                        \$.post('index.php?ajax=1&act=cat_win-rebuildleveldepth_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n\n                    }else{\n                        \$.post('index.php?ajax=1&act=cat_win-rebuildleveldepth_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                        wRebuildLevelDepth.show();\n                    }\n                }\n                if (id=='cat_rebuildlangfield'){\n                    \$.get('index.php?ajax=1&act=cat_rebuildlangfield',function(data){\n                            dhtmlx.message({text:data,type:'info',expire:5000});\n                        });\n                }\n                if (id=='cat_rebuildproductprice'){\n                    if (confirm('" . _l("Are you sure you want to rebuild product prices?", 1) . "'))\n                        \$.get('index.php?ajax=1&act=cat_rebuildproductprice',function(data){\n                                dhtmlx.message({text:data,type:'info',expire:5000});\n                            });\n                }\n                if (id=='cat_fillcoverimage'){\n                    \$.get('index.php?ajax=1&act=cat_fillcoverimage',function(data){\n                            dhtmlx.message({text:data,type:'info',expire:5000});\n                        });\n                }\n                if (id=='help_test'){\n                    if (!dhxWins.isWindow('wTest'))\n                    {\n                        wTest = dhxWins.createWindow('wTest', 50, 50, 750, \$(window).height()-75);\n                        wTest.button('park').hide();\n                        wTest.button('minmax').hide();\n                        wTest.setText('Test');\n                    }else{\n                        wTest.show();\n                    }\n                    wTest.attachURL('index.php?ajax=1&act=test');\n                    wTest.attachEvent('onClose', function(win){\n                        wTest.hide();\n                        return false;\n                    });\n                }\n                if (id=='trends_shop'){\n                    if (!dhxWins.isWindow('wTrendsShop'))\n                    {\n                        wTrendsShop = dhxWins.createWindow('wTrendsShop', 50, 50, \$(window).width()-75, \$(window).height()-75);\n                        wTrendsShop.setText('" . _l("Stats and trends", 1) . "');\n                        \$.get('index.php?ajax=1&act=all_win-trendsshop_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    }else{\n                        wTrendsShop.show();\n                    }\n                    wTrendsShop.attachEvent('onClose', function(win){\n                        wTrendsShop.hide();\n                        return false;\n                    });\n                }\n                ";
                                $menu_js_action .= "if (id=='eservices'){\n                    if (!dhxWins.isWindow('weServices'))\n                    {\n                        weServices = dhxWins.createWindow('weServices', 50, 50, \$(window).width()-75, \$(window).height()-75);\n                        weServices.setText('" . _l("e-Services", 1) . " - " . _l("Managing your addons and services", 1) . "');\n                        \$.get('index.php?ajax=1&act=all_fizz_win-cart_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    }else{\n                        weServices.show();\n                    }\n                }\n                ";
                                $menu_js_action .= "\n                if (id=='eservices_project'){\n                    loadWindoweServicesProject();\n                }\n                if(id=='tools_links_manage'){\n                    openSettingsWindow('Application','Menu');\n                }\n                \n                if(id=='early_access') \n                {\n                    if (!dhxWins.isWindow('wEarlyAccess'))\n                    {\n                        wEarlyAccess = dhxWins.createWindow('wEarlyAccess', 50, 50, 330, 280);\n                        dhxWins.window('wEarlyAccess').center();\n                        wEarlyAccess.setText('" . _l("Early Access", 1) . "');\n                        \$.get('index.php?ajax=1&act=all_win-earlyaccess_init',function(data){\n                            \$('#jsExecute').html(data);\n                        });\n                    }else{\n                        wEarlyAccess.show();\n                        wEarlyAccess.bringToTop();\n                    }\n                }\n                ";
                                $eval = "?>" . $menuConfiguration["ToolsActions"];
                                ob_start();
                                eval($eval);
                                $menu_js_action .= ob_get_contents();
                                ob_end_clean();
                                $pdt_toolbar_js_action = '';
                                $pdt_toolbar_js_action = "\n        oldGridView=gridView;\n        gridView=id;\n\n        // UISettings\n        cat_grid._uisettings_name=cat_grid._uisettings_prefix+gridView;\n\n        cat_grid_tb.setItemText('gridview',gridnames[id]);\n        \$(document).ready(function(){\n                displayProducts();\n        }); ";
                                $ids = Tools::getValue("open_cms_grid", 0);
                                if (!empty($ids)) {
                                    $tmps = explode("-", $ids);
                                    $pdt_toolbar_js_action .= "\n                    open_cms_grid = true;\n                    display_cms_after_cat_select = true;\n                    display_cms_after_select_view = false;\n                    open_cms_id_cat = " . $tmps[0] . ";\n                    open_cms_id_page = " . $tmps[1] . ";\n                    open_cms_id_attr = " . (!empty($tmps[2]) ? $tmps[2] : "0") . ";\n\n                    cms_tree.openItem(open_cms_id_cat);\n                    cms_tree.selectItem(open_cms_id_cat,false);\n                    cmsselection=open_cms_id_cat; ";
                                    goto wVcKF;
                                }
                                $pdt_toolbar_js_action .= " open_cms_grid = false; ";
                                wVcKF:
                                $ids = Tools::getValue("open_man_grid", 0);
                                if (!empty($ids)) {
                                    $tmps = explode("-", $ids);
                                    $pdt_toolbar_js_action .= "\n                    open_man_grid = true;\n                    display_man_after_cat_select = false;\n                    display_man_after_select_view = false;\n                    open_man_id_cat = " . $tmps[0] . ";\n                    open_man_id_page = " . $tmps[1] . ";\n                    open_man_id_attr = " . (!empty($tmps[2]) ? $tmps[2] : "0") . ";\n\n                    man_tree.openItem(open_man_id_cat);\n                    man_tree.selectItem(open_man_id_cat,false);\n                    manselection=open_man_id_cat; ";
                                    goto g9RG6;
                                }
                                $pdt_toolbar_js_action .= " open_man_grid = false; ";
                                g9RG6:
                                $ids = Tools::getValue("open_sup_grid", 0);
                                if (!empty($ids)) {
                                    $tmps = explode("-", $ids);
                                    $pdt_toolbar_js_action .= "\n                    open_sup_grid = true;\n                    display_sup_after_cat_select = false;\n                    display_sup_after_select_view = false;\n                    open_sup_id_cat = " . $tmps[0] . ";\n                    open_sup_id_page = " . $tmps[1] . ";\n                    open_sup_id_attr = " . (!empty($tmps[2]) ? $tmps[2] : "0") . ";\n\n                    sup_tree.openItem(open_sup_id_cat);\n                    sup_tree.selectItem(open_sup_id_cat,false);\n                    supselection=open_sup_id_cat;";
                                    goto JFQhL;
                                }
                                $pdt_toolbar_js_action .= " open_sup_grid = false; ";
                                JFQhL:
                                $pluginProductProperties = array("Title" => '', "ToolbarButtons" => '', "ToolbarActions" => '', "ToolbarStateActions" => '', "HideToolbarButtons" => '', "doOnProductRowSelected" => '', "DisplayPlugin" => '');
                                $pluginCustomerProperties = array("Title" => '', "ToolbarButtons" => '', "ToolbarActions" => '', "ToolbarStateActions" => '', "HideToolbarButtons" => '', "doOnCustomerRowSelected" => '', "DisplayPlugin" => '');
                                $pluginOrderProperties = array("Title" => '', "ToolbarButtons" => '', "ToolbarActions" => '', "ToolbarStateActions" => '', "HideToolbarButtons" => '', "doOnOrderRowSelected" => '', "DisplayPlugin" => '');
                                $pluginCmsProperties = array("Title" => '', "ToolbarButtons" => '', "ToolbarActions" => '', "ToolbarStateActions" => '', "HideToolbarButtons" => '', "doOnCmsRowSelected" => '', "DisplayPlugin" => '');
                                $pluginManufacturerProperties = array("Title" => '', "ToolbarButtons" => '', "ToolbarActions" => '', "ToolbarStateActions" => '', "HideToolbarButtons" => '', "doOnManufacturerRowSelected" => '', "DisplayPlugin" => '');
                                $pluginSupplierProperties = array("Title" => '', "ToolbarButtons" => '', "ToolbarActions" => '', "ToolbarStateActions" => '', "HideToolbarButtons" => '', "doOnSupplierRowSelected" => '', "DisplayPlugin" => '');
                                if (!SC_TOOLS) {
                                    goto WvaQI;
                                }
                                foreach ($sc_tools_list as $tool) {
                                    if (!in_array($tool, $scExtensions_toDisabledInScTools)) {
                                        if (!(file_exists(SC_TOOLS_DIR . $tool . "/catProductProperties.xml") && ($pp = simplexml_load_file(SC_TOOLS_DIR . $tool . "/catProductProperties.xml")))) {
                                            goto nLwCi;
                                        }
                                        $pluginProductProperties["Title"] .= $pp->Property->Title;
                                        $pluginProductProperties["ToolbarButtons"] .= $pp->Property->ToolbarButtons;
                                        $pluginProductProperties["ToolbarActions"] .= $pp->Property->ToolbarActions;
                                        $pluginProductProperties["ToolbarStateActions"] .= $pp->Property->ToolbarStateActions;
                                        $pluginProductProperties["HideToolbarButtons"] .= $pp->Property->HideToolbarButtons;
                                        $pluginProductProperties["doOnProductRowSelected"] .= $pp->Property->doOnProductRowSelected;
                                        $pluginProductProperties["DisplayPlugin"] .= $pp->Property->DisplayPlugin;
                                        nLwCi:
                                        if (!(file_exists(SC_TOOLS_DIR . $tool . "/cusCustomerProperties.xml") && ($cp = simplexml_load_file(SC_TOOLS_DIR . $tool . "/cusCustomerProperties.xml")))) {
                                            goto l2bR6;
                                        }
                                        $pluginCustomerProperties["Title"] .= $cp->Property->Title;
                                        $pluginCustomerProperties["ToolbarButtons"] .= $cp->Property->ToolbarButtons;
                                        $pluginCustomerProperties["ToolbarActions"] .= $cp->Property->ToolbarActions;
                                        $pluginCustomerProperties["ToolbarStateActions"] .= $cp->Property->ToolbarStateActions;
                                        $pluginCustomerProperties["HideToolbarButtons"] .= $cp->Property->HideToolbarButtons;
                                        $pluginCustomerProperties["doOnCustomerRowSelected"] .= $cp->Property->doOnCustomerRowSelected;
                                        $pluginCustomerProperties["DisplayPlugin"] .= $cp->Property->DisplayPlugin;
                                        l2bR6:
                                        if (!(file_exists(SC_TOOLS_DIR . $tool . "/ordOrderProperties.xml") && ($op = simplexml_load_file(SC_TOOLS_DIR . $tool . "/ordOrderProperties.xml")))) {
                                            goto Esyj2;
                                        }
                                        $pluginOrderProperties["Title"] .= $op->Property->Title;
                                        $pluginOrderProperties["ToolbarButtons"] .= $op->Property->ToolbarButtons;
                                        $pluginOrderProperties["ToolbarActions"] .= $op->Property->ToolbarActions;
                                        $pluginOrderProperties["ToolbarStateActions"] .= $op->Property->ToolbarStateActions;
                                        $pluginOrderProperties["HideToolbarButtons"] .= $op->Property->HideToolbarButtons;
                                        $pluginOrderProperties["doOnOrderRowSelected"] .= $op->Property->doOnOrderRowSelected;
                                        $pluginOrderProperties["DisplayPlugin"] .= $op->Property->DisplayPlugin;
                                        Esyj2:
                                        if (!(file_exists(SC_TOOLS_DIR . $tool . "/cmsPageProperties.xml") && ($op = simplexml_load_file(SC_TOOLS_DIR . $tool . "/cmsPageProperties.xml")))) {
                                            goto XXZcZ;
                                        }
                                        $pluginCmsProperties["Title"] .= $op->Property->Title;
                                        $pluginCmsProperties["ToolbarButtons"] .= $op->Property->ToolbarButtons;
                                        $pluginCmsProperties["ToolbarActions"] .= $op->Property->ToolbarActions;
                                        $pluginCmsProperties["ToolbarStateActions"] .= $op->Property->ToolbarStateActions;
                                        $pluginCmsProperties["HideToolbarButtons"] .= $op->Property->HideToolbarButtons;
                                        $pluginCmsProperties["doOnCmsRowSelected"] .= $op->Property->doOnCmsRowSelected;
                                        $pluginCmsProperties["DisplayPlugin"] .= $op->Property->DisplayPlugin;
                                        XXZcZ:
                                        if (!(file_exists(SC_TOOLS_DIR . $tool . "/manManufacturerProperties.xml") && ($op = simplexml_load_file(SC_TOOLS_DIR . $tool . "/manManufacturerProperties.xml")))) {
                                            goto qJ0VI;
                                        }
                                        $pluginManufacturerProperties["Title"] .= $op->Property->Title;
                                        $pluginManufacturerProperties["ToolbarButtons"] .= $op->Property->ToolbarButtons;
                                        $pluginManufacturerProperties["ToolbarActions"] .= $op->Property->ToolbarActions;
                                        $pluginManufacturerProperties["ToolbarStateActions"] .= $op->Property->ToolbarStateActions;
                                        $pluginManufacturerProperties["HideToolbarButtons"] .= $op->Property->HideToolbarButtons;
                                        $pluginManufacturerProperties["doOnManufacturerRowSelected"] .= $op->Property->doOnManufacturerRowSelected;
                                        $pluginManufacturerProperties["DisplayPlugin"] .= $op->Property->DisplayPlugin;
                                        qJ0VI:
                                        goto dsOl4;
                                    }
                                    dsOl4:
                                }
                                if (!($pluginProductProperties["Title"] != '')) {
                                    goto axCnT;
                                }
                                $pluginProductProperties["Title"] = trim(trim($pluginProductProperties["Title"]), ",");
                                axCnT:
                                if (!($pluginCustomerProperties["Title"] != '')) {
                                    goto qvSDk;
                                }
                                $pluginCustomerProperties["Title"] = trim(trim($pluginCustomerProperties["Title"]), ",");
                                qvSDk:
                                if (!($pluginOrderProperties["Title"] != '')) {
                                    goto nWxhU;
                                }
                                $pluginOrderProperties["Title"] = trim(trim($pluginOrderProperties["Title"]), ",");
                                nWxhU:
                                if (!($pluginCmsProperties["Title"] != '')) {
                                    goto y0YAN;
                                }
                                $pluginCmsProperties["Title"] = trim(trim($pluginCmsProperties["Title"]), ",");
                                y0YAN:
                                if (!($pluginManufacturerProperties["Title"] != '')) {
                                    goto Avtux;
                                }
                                $pluginManufacturerProperties["Title"] = trim(trim($pluginManufacturerProperties["Title"]), ",");
                                Avtux:
                                WvaQI:
                                $prop_toolbar_js_action = "prop_tb._sb.setText('');";
                                $eval = "?>" . $pluginProductProperties["ToolbarActions"];
                                ob_start();
                                eval($eval);
                                $prop_toolbar_js_action .= ob_get_contents();
                                ob_end_clean();
                                $prop_toolbar_js_action .= " dhxLayout.cells('b').showHeader(); ";
                                hZKah:
                                class eServicesTools
                                {
                                    public static function checkHasFizz($price)
                                    {
                                        $wallet_amount = getWallet();
                                        if ($wallet_amount >= $price) {
                                            return true;
                                        }
                                        return false;
                                    }
                                }
                                class CutOut
                                {
                                    public static $Cutout_onePerImage = 0.2;
                                    public static function getApiId()
                                    {
                                        return "6441";
                                    }
                                    public static function getBaseUrl()
                                    {
                                        $api_key = "6441";
                                        $api_pass = "qhvhi44162d0n6brvgh3ohru8e1j1n3u0eogk9lmve3k7fmbghvf";
                                        $api_url = "https://6441:qhvhi44162d0n6brvgh3ohru8e1j1n3u0eogk9lmve3k7fmbghvf@clippingmagic.com/api/v1/";
                                        return "https://6441:qhvhi44162d0n6brvgh3ohru8e1j1n3u0eogk9lmve3k7fmbghvf@clippingmagic.com/api/v1/";
                                    }
                                    public static function getPrice($nb_images)
                                    {
                                        if (true) {
                                            return 0;
                                        }
                                        return self::$Cutout_onePerImage * $nb_images;
                                    }
                                    public static function payment($nb_images)
                                    {
                                        if (empty($nb_images)) {
                                            goto ua_Sv;
                                        }
                                        $licence = SCI::getConfigurationValue("SC_LICENSE_KEY");
                                        $headers = array();
                                        $posts = array();
                                        $posts["KEY"] = "gt789zef132kiy789u13v498ve15nhry98";
                                        $posts["LICENSE"] = "#";
                                        $posts["URLCALLING"] = "#";
                                        if (true) {
                                            $posts["amount"] = 0;
                                            goto piVgA;
                                        }
                                        $posts["amount"] = "-" . $nb_images * self::$Cutout_onePerImage;
                                        piVgA:
                                        $posts["reason"] = "cut out image";
                                        if (!(defined("IS_SUBS") && true)) {
                                            goto yBc50;
                                        }
                                        $posts["SUBSCRIPTION"] = "1";
                                        yBc50:
                                        $ret = makeCallToOurApi("Fizz/Transaction", $headers, $posts);
                                        if (!(!empty($ret["code"]) && $ret["code"] == "200")) {
                                            goto vtwAS;
                                        }
                                        Configuration::updateValue("SC_WALLET_AMOUNT", $ret["wallet"]);
                                        vtwAS:
                                        ua_Sv:
                                    }
                                    public static function upload($image_path)
                                    {
                                        if (eServicesTools::checkHasFizz(self::$Cutout_onePerImage) === true || SC_DEMO || defined("SUB9EHS4PLUS") && true) {
                                            $api_url = self::getBaseUrl() . "images";
                                            require_once "SC_DIRlib/php/Requests/Requests.php";
                                            Requests::register_autoloader();
                                            try {
                                                $header = array("Content-Type" => "multipart/form-data");
                                                $data = array("image" => new Requests_File($image_path));
                                                $response = Requests::post($api_url, $header, $data);
                                                if ($response->status_code == "200" && $response->success) {
                                                    $r = json_decode($response->body, true);
                                                    if (!empty($r["image"]["id"]) && !empty($r["image"]["secret"])) {
                                                        return $r["image"];
                                                    }
                                                    if (!empty($r["error"]["message"])) {
                                                        return array("type" => "error", "message" => $r["error"]["message"]);
                                                    }
                                                    nurng:
                                                    PVxuL:
                                                }
                                                return array("type" => "error", "message" => "error#" . $response->status_code);
                                            } catch (Exception $e) {
                                                return array("type" => "error", "message" => $e->getMessage());
                                            }
                                            hzMnj:
                                            return array("type" => "error", "message" => _l("An error occured. Please contact our support."));
                                        }
                                        return array("type" => "error", "message" => _l("You don't have enough Fizz in your wallet for this action. Please buy Fizz in e-Services menu."));
                                    }
                                    public static function download($id_image_cutout, $id_image)
                                    {
                                        $return = 0;
                                        $api_url = self::getBaseUrl() . "images/" . $id_image_cutout;
                                        $image_code = '';
                                        require_once "SC_DIRlib/php/Requests/Requests.php";
                                        Requests::register_autoloader();
                                        try {
                                            $response = Requests::get($api_url);
                                            if (!($response->status_code == "200" && !empty($response->body))) {
                                                goto xz1jK;
                                            }
                                            $image_code = $response->body;
                                            xz1jK:
                                        } catch (Exception $e) {
                                        }
                                        if (!isJson($image_code)) {
                                            $headers = array();
                                            $posts = array();
                                            $posts["KEY"] = "gt789zef132kiy789u13v498ve15nhry98";
                                            $posts["LICENSE"] = "#";
                                            $posts["URLCALLING"] = "#";
                                            $posts["type"] = "cutout";
                                            if (!(defined("IS_SUBS") && true)) {
                                                goto HkxEv;
                                            }
                                            $posts["SUBSCRIPTION"] = "1";
                                            HkxEv:
                                            $ret = makeCallToOurApi("Fizz/Project/GetByType", $headers, $posts);
                                            if (!(!empty($ret["code"]) && $ret["code"] == "200")) {
                                                goto UaiVp;
                                            }
                                            $projects = $ret["project"];
                                            UaiVp:
                                            if (empty($projects)) {
                                                goto XLYF4;
                                            }
                                            $id_project = $projects[0]["id_project"];
                                            $list_items = $projects[0]["list_items"];
                                            $res = explode("-", trim($list_items, "-"));
                                            $new_list_items = '';
                                            foreach ($res as $id) {
                                                if (!($id != $id_image)) {
                                                    goto IlRAG;
                                                }
                                                $new_list_items .= $id . "-";
                                                IlRAG:
                                            }
                                            if (empty($new_list_items)) {
                                                goto tN6cO;
                                            }
                                            $new_list_items = "-" . $new_list_items;
                                            tN6cO:
                                            $headers = array();
                                            $posts = array();
                                            $posts["KEY"] = "gt789zef132kiy789u13v498ve15nhry98";
                                            $posts["LICENSE"] = "#";
                                            $posts["URLCALLING"] = "#";
                                            $posts["list_items"] = $new_list_items;
                                            if (!(defined("IS_SUBS") && true)) {
                                                goto i_1_A;
                                            }
                                            $posts["SUBSCRIPTION"] = "1";
                                            i_1_A:
                                            $ret = makeCallToOurApi("Fizz/Project/Update/" . $id_project, $headers, $posts);
                                            XLYF4:
                                            cutout_createImage($id_image, $image_code);
                                            $return = 1;
                                            goto w0GnC;
                                        }
                                        $return = 0;
                                        w0GnC:
                                        return $return;
                                    }
                                }
                                class Dixit
                                {
                                    public static $Dixit_onePerWord = 0.1;
                                    public static $Dixit_onePerWordAdvanced = 0.14;
                                    public static $Dixit_cost_onePerWord = 0.06;
                                    public static $Dixit_cost_onePerWordAdvanced = 0.09;
                                    public static function getPrice($textes, $advanced = false)
                                    {
                                        $nb_words = dixit_getTotalNbWords($textes);
                                        $price = $nb_words * ($advanced ? self::$Dixit_onePerWordAdvanced : self::$Dixit_onePerWord);
                                        return $price;
                                    }
                                    public static function getCost($textes, $advanced = false)
                                    {
                                        $nb_words = dixit_getTotalNbWords($textes);
                                        $price = $nb_words * ($advanced ? self::$Dixit_cost_onePerWordAdvanced : self::$Dixit_cost_onePerWord);
                                        return $price;
                                    }
                                }
                                class CompressionImg
                                {
                                    public static function convertFizzToCredit($id_project, $params, &$fizz_amount, &$credit_amount)
                                    {
                                        $nb_fizz_to_decrement = (int) $params["fizz_to_decrement"];
                                        $lot_credit = (array) $params["lot_credit"];
                                        $url_params = (array) $params["url_params"];
                                        $project_params = (array) $params["project_params"];
                                        $error = false;
                                        if ($nb_fizz_to_decrement > 0) {
                                            if (array_key_exists($nb_fizz_to_decrement, $lot_credit)) {
                                                if (eServicesTools::checkHasFizz($nb_fizz_to_decrement)) {
                                                    $transaction_params = $url_params;
                                                    $transaction_params["amount"] = "-" . $nb_fizz_to_decrement;
                                                    $transaction_params["reason"] = "credit compression image";
                                                    $decrement_fizz_wallet = makeCallToOurApi("Fizz/Transaction", array(), $transaction_params);
                                                    if (!empty($decrement_fizz_wallet) && $decrement_fizz_wallet["code"] == 200) {
                                                        $fizz_amount = (double) $decrement_fizz_wallet["wallet"];
                                                        $credit_update_params = $url_params;
                                                        $project_params["allowed_image_amount"] += (int) $lot_credit[$nb_fizz_to_decrement]["amount"];
                                                        $credit_update_params["params"] = json_encode($project_params);
                                                        $update_project = makeCallToOurApi("Fizz/Project/Update/" . $id_project, array(), $credit_update_params);
                                                        if (!empty($update_project) && $update_project["code"] == 200) {
                                                            $credit_amount = (int) $project_params["allowed_image_amount"];
                                                            $message = $lot_credit[$nb_fizz_to_decrement]["label"] . " " . _l("image credits added to your project.");
                                                            goto GezUe;
                                                        }
                                                        $error = true;
                                                        $message = _l("Error") . _l(":") . " " . _l("Impossible to update project with %s image credits.", null, array($lot_credit[$nb_fizz_to_decrement]["label"])) . " " . _l("Please contact our support");
                                                        GezUe:
                                                        goto EKhpC;
                                                    }
                                                    $error = true;
                                                    $message = _l("Error") . _l(":") . " " . _l("Impossible to convert %s Fizz to %s image credits.", null, array($nb_fizz_to_decrement, $lot_credit[$nb_fizz_to_decrement]["label"])) . " " . _l("Please contact our support");
                                                    EKhpC:
                                                    goto xReF9;
                                                }
                                                $error = true;
                                                $message = _l("Error") . _l(":") . " " . _l("Not enough Fizz. Refill your wallet and re-start project") . " " . _l("Please contact our support");
                                                xReF9:
                                                goto fylf1;
                                            }
                                            $error = true;
                                            $message = _l("Error") . _l(":") . " " . _l("This amount of Fizz is wrong") . " (" . $nb_fizz_to_decrement . ")";
                                            fylf1:
                                            goto Tt4eo;
                                        }
                                        $error = true;
                                        $message = _l("Error") . _l(":") . " " . _l("This amount of Fizz is wrong") . _l(":") . "0";
                                        Tt4eo:
                                        return array("error" => $error, "message" => $message);
                                    }
                                }
                                // [PHPDeobfuscator] Implied script end
                                return;
                            }
                            $newLicense = Tools::getValue("license", '');
                            SCI::updateConfigurationValue("SC_LICENSE_KEY", $newLicense);
                            $DateEndSupport = sc_file_get_contents("https://www.storecommander.com/files/getsupport_" . $newLicense . "_getdatefull.php");
                            $local_settings["APP_TRENDS"]["value"] = 1;
                            saveSettings();
                            echo "Connecting.....<script>document.location.href='./index.php';</script>";
                            die;
                        }
                        die(_l("You are not allowed to use Store Commander.") . " <a href=\"" . SC_PS_PATH_ADMIN_REL . "index.php\">BackOffice</a>");
                    }
                    if ($same_empl_url) {
                        goto WN622;
                    }
                    SCI::addLog("SC - not same employee - cookie:" . $cookie_mail . " mail:" . $sc_agent->email);
                    WN622:
                    if (!isset($cookie)) {
                        goto ZlFeB;
                    }
                    $cookie->logout();
                    ZlFeB:
                    die(_l("You must be logged to use Store Commander.") . " <a href=\"" . SC_PS_PATH_ADMIN_REL . "index.php\">BackOffice</a>");
                }
                die(_l("You must be logged to use Store Commander.") . " Please check if you use an override: /override/classes/Cookie.php which could be incompatible.");
            }
            Db::getInstance()->Execute("DELETE FROM _DB_PREFIX_configuration WHERE name='SC_LICENSE_KEY'");
            Db::getInstance()->Execute("DELETE FROM _DB_PREFIX_configuration WHERE name='SC_LICENSE_KEY2'");
            die("Reset License ok");
        }
        die("All Store Commander files need to have the access rights set to " . $writePermissionsOCT . " minimum on your ftp");
    }
    echo time();
    die;
}
if (function_exists("file_get_contents")) {
    echo "file_get_contents : OK<br/>";
    goto Rhbsj;
}
echo "file_get_contents : KO<br/>";
Rhbsj:
if (function_exists("curl_init")) {
    echo "curl_init : OK<br/>";
    goto QBBCF;
}
echo "curl_init : KO<br/>";
QBBCF:
echo "allow_url_fopen : " . ini_get("allow_url_fopen") . "<br/>";
die;
