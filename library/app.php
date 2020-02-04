<?php

/**
 * Theme settings
 *
 * @param array $settings
 * @return array
 */
function theme_app_settings($settings) {
    return json_decode(<<<JSON
    {
    "colorScheme": {
        "bodyColors": [
            "#3d3b3a",
            "#ffffff"
        ],
        "bgColor": "#ffffff",
        "colors": [
            "#f0885f",
            "#eccb93",
            "#625772",
            "#ecdb9e",
            "#a3dcec"
        ],
        "customColors": [
            {
                "color": "#b8943f",
                "status": 0
            },
            "#e6231e"
        ],
        "shadingContrast": "body-alt-color",
        "whiteContrast": "body-color",
        "bgContrast": "body-color",
        "name": "u12"
    },
    "fontScheme": {
        "name": "Roboto-OpenSans",
        "default": true,
        "isDefault": true,
        "fonts": {
            "heading": "Roboto, sans-serif",
            "text": "Open Sans, sans-serif",
            "accent": "Arial, sans-serif",
            "headingTitle": "Roboto",
            "textTitle": "Open Sans"
        }
    },
    "typography": {
        "name": "custom-page-typography-6",
        "title": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_1",
            "font-size": 6,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "subtitle": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_2",
            "font-size": 2.25,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h1": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_1",
            "font-size": 3.75,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h2": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_2",
            "font-size": 2.25,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h3": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_2",
            "font-size": 1.875,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h4": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_2",
            "font-size": 1.5,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h5": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_2",
            "font-size": 1.25,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h6": {
            "font-weight": "700",
            "text-transform": "capitalize",
            "line-height": "1_2",
            "font-size": 1.125,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "largeText": {
            "bold": false,
            "line-height": "1_6",
            "font-size": 1,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "text": {
            "bold": false,
            "line-height": "1.8",
            "font-size": 1.125,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "smallText": {
            "bold": false,
            "line-height": "1_6",
            "font-size": 0.875,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "link": {
            "letter-spacing": "1",
            "font-size": 1,
            "line-height": "1_8",
            "text-color": "palette-1-base",
            "margin-top": 20,
            "margin-bottom": 20,
            "color": false,
            "border": "1",
            "border-style": false,
            "border-color": "palette-1-base",
            "padding-bottom": "2px",
            "text-decoration": "none"
        },
        "button": {
            "letter-spacing": "1",
            "font-size": 1,
            "line-height": "1_4",
            "color": "palette-1-light-2",
            "margin-top": 20,
            "margin-bottom": 20,
            "gradient": "none",
            "text-transform": "uppercase",
            "bold": true,
            "text-color": "body-alt-color",
            "button-shape": "round",
            "border-radius": 50
        },
        "blockquote": {
            "font-style": "italic",
            "line-height": "1_6",
            "font-size": 1.25,
            "indent": 20,
            "border": 4,
            "border-color": "palette-1-base",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "metadata": {
            "font-size": 0.75,
            "line-height": "1_4",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "list": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "orderedlist": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "postContent": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "htmlBaseSize": 16,
        "theme": {
            "gradient": "",
            "image": ""
        }
    }
}
JSON
, true);
}
add_filter('nicepage_theme_settings', 'theme_app_settings');

function theme_analytics() {
?>
    
<?php
}
add_action('wp_head', 'theme_analytics', 0);


function theme_favicon() {
    $custom_favicon_id = get_theme_mod('custom_favicon');
    @list($favicon_src, ,) = wp_get_attachment_image_src($custom_favicon_id, 'full');
    if (!$favicon_src) {
        $favicon_src = "";
        if ($favicon_src) {
            $favicon_src = get_template_directory_uri() . '/images/' . $favicon_src;
        }
    }

    if ($favicon_src) {
        echo "<link rel=\"icon\" href=\"$favicon_src\">";
    }
}
add_action('wp_head', 'theme_favicon');