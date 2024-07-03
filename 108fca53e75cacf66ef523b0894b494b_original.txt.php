function get_renewal_link()
    {
        if ('' != $this->renew_url) {
            return $this->renew_url;
        }
        $license_key = trim(get_option($this->theme_slug . "\x5f\x6c\151\x63\145\x6e\x73\x65\137\x6b\x65\x79", false));
        if ('' != $this->download_id && $license_key) {
            $url = esc_url($this->remote_api_url);
            $url .= "\x2f\x63\x68\x65\x63\153\x6f\x75\164\x2f\x3f\145\144\144\137\154\151\143\145\156\163\145\x5f\153\x65\171\x3d" . $license_key . "\x26\144\x6f\x77\156\x6c\x6f\141\x64\137\x69\x64\x3d" . $this->download_id;
            return $url;
        }
        return $this->remote_api_url;
    }
