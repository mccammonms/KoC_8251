<?php
add_action('theme_content_styles', 'theme_blog_content_styles');

function theme_index_body_class_filter($classes) {
    $classes[] = 'u-body';
    return $classes;
}
add_filter('body_class', 'theme_index_body_class_filter');

function theme_index_body_style_attribute() {
    return "";
}
add_filter('add_body_style_attribute', 'theme_index_body_style_attribute');

get_header();
theme_layout_before('blog');
?>

<?php if (is_home() && ! is_front_page()) : ?>
    <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
<?php endif; ?>

<?php if (is_search()) : ?>
    <header class="page-header">
        <h1 class="page-title"><?php printf(__('Search Results for: %s', 'kc_scc_v3'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
    </header>
<?php endif; ?>

<?php
if (have_posts()) {

    global $wp_query;
    $first_repeatable = 0;
    $last_repeatable = 3;

    $template_used = array();
    $templates_count = 5;

    $blog_sections_count = $last_repeatable + 1;

    if ($blog_sections_count) {
        for ($template_idx = 0; have_posts(); $template_idx = ($template_idx + 1) % $blog_sections_count) {
            if ($template_idx < $first_repeatable && !empty($template_used[$template_idx])) {
                if ($blog_sections_count == $first_repeatable) {
                    break;
                } else {
                    continue;
                }
            }
            $template_used[$template_idx] = true;

            $is_singular = is_singular();
            if ($is_singular) {
                the_post();
            }
            get_template_part('template-parts/post-content-' . ($template_idx + 1));

            if ($is_singular && (comments_open() || get_comments_number())) {
                comments_template();
            }
        }
        for ($template_idx = $last_repeatable + 1; $template_idx < $templates_count; $template_idx++) {
            get_template_part('template-parts/post-content-' . ($template_idx + 1));
        }
    }
    // If no content, include the "No posts found" template.
} else {
    get_template_part('template-parts/content', 'none');
}

theme_layout_after('blog');
get_footer();
remove_action('theme_content_styles', 'theme_blog_content_styles');
remove_filter('body_class', 'theme_index_body_class_filter');
