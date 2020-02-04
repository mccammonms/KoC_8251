<?php
add_action('theme_content_styles', 'theme_single_content_styles');

function theme_single_body_class_filter($classes) {
    $classes[] = 'u-body';
    return $classes;
}
add_filter('body_class', 'theme_single_body_class_filter');

function theme_single_body_style_attribute() {
    return "";
}
add_filter('add_body_style_attribute', 'theme_single_body_style_attribute');


get_header();
theme_layout_before('post');

while (have_posts()) {
    $is_singular = is_singular();
    if ($is_singular) {
        the_post();
    }
    get_template_part('template-parts/single-content');

    if ($is_singular && (comments_open() || get_comments_number())) {
        comments_template();
    }

    get_template_part('template-parts/single-navigation');
}

theme_layout_after('post');
get_footer();
remove_action('theme_content_styles', 'theme_single_content_styles');
remove_filter('body_class', 'theme_single_body_class_filter');