<?php

class XstudiozCommonSetupTasks
{
    public function __construct()
    {
        $this->addFeatures();
        $this->removeEmojis();

        add_action('wp_enqueue_scripts', [$this, 'styles']);
        add_action('wp_enqueue_scripts', [$this, 'scripts']);
        add_action('after_setup_theme', [$this, 'menus'], 0);
    }

    function removeEmojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
    }

    function addFeatures()
    {
        add_theme_support('menus');
        add_theme_support('title');
        add_theme_support('post-thumbnails');
    }

    function scripts()
    {
        wp_enqueue_script('jquery');
    }

    function styles()
    {
        wp_enqueue_style('bootstrap-5', get_theme_file_uri('css/scss/bootstrap.css'));
        wp_enqueue_style('fontawesome-4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
        wp_enqueue_style('theme-style-sheet', get_theme_file_uri('style.css'));
    }

    function menus()
    {
        register_nav_menus(array(
            'primary_menu' => __('Header Menu', 'text_domain'),
            'footer_menu' => __('Footer Menu', 'text_domain'),
        ));
    }
}