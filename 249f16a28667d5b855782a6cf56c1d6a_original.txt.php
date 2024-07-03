<?php

/* #1: PHPDeobfuscator eval output */ 
    use vendor\ekipisi\metabase\config as Config;
    class ControllerExtensionFeedMetaBase extends Controller
    {
        private $error = array();
        public function __construct($registry)
        {
            parent::__construct($registry);
            $this->load->language(Config::metabase_path);
            $this->load->model("setting/setting");
            $this->load->model("setting/store");
            $this->load->model("localisation/language");
            $this->load->model("localisation/currency");
        }
        public function index()
        {
            $heading_title = $this->language->get("heading_title") . " v" . Config::metabase_version;
            $data["heading_title"] = $heading_title;
            $data["lang"] = $this->config->get("config_admin_language");
            $this->document->setTitle($heading_title);
            $this->document->addScript("view/javascript/ekipisi/lib/bootstrap-notify/bootstrap-notify.js");
            $this->document->addStyle("view/javascript/ekipisi/ekipisi.css");
            $this->document->addScript("view/javascript/ekipisi/ekipisi.js");
            $this->document->addScript("view/javascript/ekipisi/metabase.js");
            if (!isset($this->request->get["store_id"])) {
                $this->request->get["store_id"] = 0;
            }
            $store = $this->getCurrentStore($this->request->get["store_id"]);
            $metabase = $this->model_setting_setting->getSetting(Config::metabase_name_small, $store["store_id"]);
            $data["languages"] = $this->model_localisation_language->getLanguages();
            $data["currencies"] = $this->model_localisation_currency->getCurrencies();
            $data["stores"] = array_merge(array(0 => array("store_id" => "0", "name" => $this->config->get("config_name") . " (" . $this->language->get("text_default") . ")", "url" => HTTP_SERVER, "ssl" => HTTPS_SERVER)), $this->model_setting_store->getStores());
            $data["store"] = $store;
            if ($this->request->server["REQUEST_METHOD"] == "POST" && $this->validate()) {
                $this->model_setting_setting->editSetting(Config::metabase_name_small, $this->request->post, $this->request->post["store_id"]);
                $this->session->data["success"] = $this->language->get("text_success");
                $this->response->redirect($this->url->link(Config::metabase_path, "store_id=" . $this->request->post["store_id"] . "&user_token=" . $this->session->data["user_token"], true));
            }
            if (isset($this->error["warning"])) {
                $data["error_warning"] = $this->error["warning"];
            } else {
                $data["error_warning"] = '';
            }
            if (isset($this->session->data["success"])) {
                $data["success"] = $this->session->data["success"];
                unset($this->session->data["success"]);
            } else {
                $data["success"] = '';
            }
            $data["breadcrumbs"] = array();
            $data["breadcrumbs"][] = array("text" => $this->language->get("text_home"), "href" => $this->url->link("common/dashboard", "user_token=" . $this->session->data["user_token"], true));
            $data["breadcrumbs"][] = array("text" => $this->language->get("text_extensions"), "href" => $this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"], true));
            $data["breadcrumbs"][] = array("text" => $this->language->get("heading_title"), "href" => $this->url->link(Config::metabase_path, "store_id=" . $store["store_id"] . "&user_token=" . $this->session->data["user_token"], true));
            $data["gtins"] = array("UPC" => "upc", "EAN" => "ean", "JAN" => "jan", "ISBN" => "isbn", $this->language->get("text_default") => "default");
            $tags = array("feed_metabase_status", "feed_metabase_category", "feed_metabase_manufacturer", "feed_metabase_currency", "feed_metabase_language", "feed_metabase_gtin", "feed_metabase_additional_image");
            foreach ($tags as $tag) {
                if (isset($this->request->post[$tag])) {
                    $data[$tag] = $this->request->post[$tag];
                } elseif (isset($metabase[$tag])) {
                    $data[$tag] = $metabase[$tag];
                } else {
                    if ($tag == "feed_metabase_category" || $tag == "feed_metabase_manufacturer") {
                        $data[$tag] = array();
                    } else {
                        $data[$tag] = '';
                    }
                }
            }
            $this->load->model("catalog/category");
            $data["categories"] = array();
            $filter = array("sort" => "name");
            $categories = $this->model_catalog_category->getCategories($filter);
            foreach ($categories as $category) {
                $data["categories"][] = array("category_id" => $category["category_id"], "name" => strip_tags(html_entity_decode($category["name"], ENT_QUOTES, "UTF-8")));
            }
            $this->load->model("catalog/manufacturer");
            $data["manufacturers"] = array();
            $manufacturers = $this->model_catalog_manufacturer->getManufacturers($filter);
            foreach ($manufacturers as $manufacturer) {
                $data["manufacturers"][] = array("manufacturer_id" => $manufacturer["manufacturer_id"], "name" => $manufacturer["name"], "sort_order" => $manufacturer["sort_order"], "selected" => isset($this->request->post["selected"]) && in_array($manufacturer["manufacturer_id"], $this->request->post["selected"]));
            }
            $data["feed_metabase_url"] = str_replace("//", "/", $store["ssl"] . "/index.php?route=extension/feed/meta_base&store_id=" . $this->request->get["store_id"]);
            if (isset($metabase["feed_metabase"])) {
                $data["feed_metabase"] = $metabase["feed_metabase"];
            } else {
                $data["feed_metabase"] = array();
            }
            if (empty($data["feed_metabase"]["license"]["name"])) {
                $data["domain"] = base64_encode($_SERVER["SERVER_NAME"]);
                $data["mid"] = "TWV0YSBCYXNl";
                $data["base64"] = base64_decode($data["lang"] == "tr-tr" ? "PGRpdiBjbGFzcz0iYWxlcnQgYWxlcnQtd2FybmluZyBmYWRlIGluIj4KCQkJPGJ1dHRvbiB0eXBlPSJidXR0b24iIGNsYXNzPSJjbG9zZSIgZGF0YS1kaXNtaXNzPSJhbGVydCIgYXJpYS1oaWRkZW49InRydWUiPsOXPC9idXR0b24+CgkJCTxoND5VeWFyxLEhIE1vZMO8bMO8biBsaXNhbnNzxLF6IGJpciBzw7xyw7xtw7xuw7wga3VsbGFuxLF5b3JzdW51eiEKCQkJPC9oND4KCQkJPHA+RG/En3J1IGnFn2xleWnFnywgZGVzdGVrIHZlIGfDvG5jZWxsZW1lbGVyZSBlcmnFn2ltIHNhxJ9sYW1hayBpw6dpbiBsaXNhbnMga29kdW51enUgZ2lybWVuaXogZ2VyZWttZWt0ZWRpci48L3A+CgkJCTxwPk1ldGEgQmFzZSBGZWVkIHYxIG1vZMO8bMO8IGnDp2luIGhlcmhhbmdpIGJpciDDvGNyZXQgw7ZkZW1lZGVuCgkJCQk8Yj4KCQkJCQk8YSBjbGFzcz0idGV4dC13YXJuaW5nIiBocmVmPSJodHRwczovL3N1cHBvcnQuZWtpcGlzaS5jb20udHIvc3VibWl0LXRpY2tldC80LWxpY2VuY2UtY29kZS1saXNhbnMta29kdSIgdGFyZ2V0PSJfYmxhbmsiPmxpc2FucyBrb2R1Jm5ic3A7PGkgY2xhc3M9ImZhIGZhLWV4dGVybmFsLWxpbmsiPjwvaT4KCQkJCQk8L2E+CgkJCQk8L2I+CgkJCQl0YWxlcCBlZGViaWxpcnNpbml6Li48L3A+CgkJCTxkaXYgc3R5bGU9ImhlaWdodDoxNXB4OyI+PC9kaXY+CgkJCTxhIGNsYXNzPSJidG4gYnRuLXdhcm5pbmciIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKSIgb25jbGljaz0iJCgnYVtocmVmPSN0YWJfc3VwcG9ydF0nKS50cmlnZ2VyKCdjbGljaycpIj48aSBjbGFzcz0iZmEgZmEta2V5IiBhcmlhLWhpZGRlbj0idHJ1ZSI+PC9pPiZuYnNwO0xpc2FucyBrb2R1bnV6dSBnaXJpbjwvYT4KCQk8L2Rpdj4=" : "CQk8ZGl2IGNsYXNzPSJhbGVydCBhbGVydC13YXJuaW5nIGZhZGUgaW4iPgoJCQk8YnV0dG9uIHR5cGU9ImJ1dHRvbiIgY2xhc3M9ImNsb3NlIiBkYXRhLWRpc21pc3M9ImFsZXJ0IiBhcmlhLWhpZGRlbj0idHJ1ZSI+w5c8L2J1dHRvbj4KCQkJPGg0Pldhcm5pbmchIFlvdSBhcmUgdXNpbmcgYW4gdW5saWNlbnNlZCB2ZXJzaW9uIG9mIHRoZSBtb2R1bGUhPC9oND4KCQkJPHA+VG8gZW5zdXJlIHByb3BlciBmdW5jdGlvbmluZywgYWNjZXNzIHN1cHBvcnQsIGFuZCByZWNlaXZlIHVwZGF0ZXMsIHlvdSBuZWVkIHRvIGVudGVyIHlvdXIgbGljZW5zZSBjb2RlLjwvcD4KCQkJPHA+WW91IGNhbiByZXF1ZXN0IGEKCQkJCTxiPgoJCQkJCTxhIGNsYXNzPSJ0ZXh0LXdhcm5pbmciIGhyZWY9Imh0dHBzOi8vc3VwcG9ydC5la2lwaXNpLmNvbS50ci9zdWJtaXQtdGlja2V0LzQtbGljZW5jZS1jb2RlLWxpc2Fucy1rb2R1IiB0YXJnZXQ9Il9ibGFuayI+bGljZW5zZSBjb2RlJm5ic3A7PGkgY2xhc3M9ImZhIGZhLWV4dGVybmFsLWxpbmsiPjwvaT4KCQkJCQk8L2E+CgkJCQk8L2I+CgkJCQlmb3IgdGhlIE1ldGEgQmFzZSBGZWVkIHYxIG1vZHVsZSBmcmVlIG9mIGNoYXJnZS48L3A+CgkJCTxkaXYgc3R5bGU9ImhlaWdodDoxNXB4OyI+PC9kaXY+CgkJCTxhIGNsYXNzPSJidG4gYnRuLXdhcm5pbmciIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKSIgb25jbGljaz0iJCgnYVtocmVmPSN0YWJfc3VwcG9ydF0nKS50cmlnZ2VyKCdjbGljaycpIj4KCQkJCTxpIGNsYXNzPSJmYSBmYS1rZXkiIGFyaWEtaGlkZGVuPSJ0cnVlIj48L2k+Jm5ic3A7RW50ZXIgeW91ciBsaWNlbnNlIGNvZGU8L2E+CgkJPC9kaXY+");
            } else {
                $data["ekipisi"] = $data["feed_metabase"]["license"];
            }
            $data["user_token"] = $this->session->data["user_token"];
            $data["action"] = $this->url->link(Config::metabase_path, "user_token=" . $this->session->data["user_token"], true);
            $data["cancel"] = $this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"] . "&type=feed", true);
            $data["path"] = Config::metabase_path;
            $data["currency"] = $this->config->get("config_currency");
            $data["support_url"] = "https://support.ekipisi.com.tr/";
            $data["open_ticket_url"] = "https://support.ekipisi.com.tr/submit-ticket";
            $data["license_ticket_url"] = "https://support.ekipisi.com.tr/submit-ticket/4-license-code-lisans-kodu";
            $data["tab_generalsettings"] = $this->load->view(Config::metabase_path . "/tab_generalsettings", $data);
            $data["tab_support"] = $this->load->view(Config::metabase_path . "/tab_support", $data);
            $data["header"] = $this->load->controller("common/header");
            $data["column_left"] = $this->load->controller("common/column_left");
            $data["footer"] = $this->load->controller("common/footer");
            $this->response->setOutput($this->load->view(Config::metabase_path, $data));
        }
        protected function validate()
        {
            if (!$this->user->hasPermission("modify", Config::metabase_path)) {
                $this->error["warning"] = $this->language->get("error_permission");
            }
            return !$this->error;
        }
        public function install()
        {
            $languages = $this->model_localisation_language->getLanguages();
            $stores = array_merge(array(0 => array("store_id" => "0", "name" => $this->config->get("config_name"), "url" => HTTP_SERVER, "ssl" => HTTPS_SERVER)), $this->model_setting_store->getStores());
            for ($x = 0; $x < count($stores); $x++) {
                $setting["feed_metabase_status"] = 1;
                $this->model_setting_setting->editSetting(Config::metabase_name_small, $setting, $stores[$x]["store_id"]);
            }
        }
        public function uninstall()
        {
            $this->model_setting_setting->editSetting(Config::metabase_name_small, array());
        }
        private function getCurrentStore($store_id)
        {
            if ($store_id && $store_id != 0) {
                $store = $this->model_setting_store->getStore($store_id);
            } else {
                $store["store_id"] = 0;
                $store["name"] = $this->config->get("config_name");
                $store["ssl"] = HTTPS_CATALOG;
            }
            return $store;
        }
    }
/* END:#1 */
