<?php

class serialkeys
{
    private $config;
    private $db;
    private $currency;
    const SALT = '8g%r9HDve*';
    public function __construct($registry)
    {
        $this->config = $registry->get('config');
        $this->db = $registry->get('db');
        $this->currency = $registry->get('currency');
    }
    public function sendKeys($order_id, $product_id, $price, $tax, $quantity)
    {
        if (!self::checkLicense($this->config->get('module_serialkeys_license_key'))) {
            return false;
        }
        $order_query = $this->db->query("SELECT * FROM DB_PREFIXorder WHERE order_id='" . (int) $order_id . "'");
        $order_info = $order_query->row;
        $product_info_query = $this->db->query("SELECT * FROM DB_PREFIXproduct p LEFT JOIN DB_PREFIXproduct_description pd ON (p.product_id=pd.product_id) WHERE p.product_id='" . $product_id . "' AND pd.language_id='" . (int) $order_info['language_id'] . "'");
        $product_info = $product_info_query->row;
        if (!$product_info['sk_template']) {
            return false;
        }
        $template_query = $this->db->query("SELECT * FROM DB_PREFIXproduct_template_description WHERE id='" . (int) $product_info['sk_template'] . "' AND language_id='" . (int) $order_info['language_id'] . "'");
        $template = $template_query->row['description'];
        $serialkeys_query = $this->db->query("SELECT * FROM DB_PREFIXproduct_sk WHERE product_id='" . (int) $product_id . "' AND order_id='" . (int) $order_id . "'");
        $serialkeys = array();
        foreach ($serialkeys_query->rows as $row) {
            $serialkeys[] = '<span>' . $row['serialkey'] . '</span><br/>';
        }
        $keys = '<br/><span>' . implode("", $serialkeys) . '</span><br/>';
        $template = str_replace('{page_title}', $this->config->get('module_serialkeys_title')[$order_info['language_id']], $template);
        $template = str_replace('{product_name}', $product_info['name'], $template);
        $template = str_replace('{price}', $this->currency->format(($price + $tax) * $quantity, $order_info['currency_code'], $order_info['currency_value']), $template);
        $template = str_replace('{serial_number}', $keys, $template);
        if ($product_info['sk_link']) {
            $template = str_replace('{download_link}', $product_info['link'], $template);
        } else {
            $template = str_replace('{download_link}', '', $template);
        }
        $html = "<!doctype html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><body>";
        $html .= html_entity_decode($template);
        $html .= "</body></html>";
        $mail = new Mail($this->config->get('config_mail_engine'));
        $mail->protocol = $this->config->get('config_mail_protocol');
        $mail->parameter = $this->config->get('config_mail_parameter');
        $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
        $mail->smtp_username = $this->config->get('config_mail_smtp_username');
        $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
        $mail->smtp_port = $this->config->get('config_mail_smtp_port');
        $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
        $mail->setTo($order_info['email']);
        $mail->setFrom($this->config->get('config_email'));
        $mail->setSender(html_entity_decode($order_info['store_name'], ENT_QUOTES, 'UTF-8'));
        $mail->setSubject(html_entity_decode($this->config->get('module_serialkeys_subject')[$order_info['language_id']] . ' ' . $product_info['name'], ENT_QUOTES, 'UTF-8'));
        $mail->setHtml($html);
        $mail->send();
        return true;
    }
    public static function checkLicense($key)
    {
        try {
            if (empty($_SERVER['HTTP_HOST'])) {
                throw new Exception("Invalid host.");
            }
            if (md5(self::SALT . md5($_SERVER['HTTP_HOST'])) != $key && (!preg_match('/^www\\./', $_SERVER['HTTP_HOST']) && md5(self::SALT . md5('www.' . $_SERVER['HTTP_HOST'])) != $key)) {
                throw new Exception("Invalid license key.");
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
