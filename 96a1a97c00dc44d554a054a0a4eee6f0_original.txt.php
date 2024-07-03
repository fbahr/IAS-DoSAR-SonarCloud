<?php

function license_menu()
{
    $strings = $this->strings;
    add_menu_page($strings["theme-license"], $strings["theme-license"], "manage_options", $this->theme_slug . '', array($this, "license_page"), "dashicons-admin-network");
}
