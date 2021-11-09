<?php

function mesMenusWordpress()
{
    register_nav_menus(
        array(
            'header-menu' => __('Zone menu header'), 
            'footer-menu' => __('Zone menu footer'), 
        )
        );
}

add_action('init', 'mesMenusWordpress');