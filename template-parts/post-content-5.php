<?php $skip_min_height = false; ?><?php global $wp_query; if ($wp_query->max_num_pages > 1): ?><section class="u-clearfix u-section-5" id="sec-f625">
  <div class="u-clearfix u-sheet u-sheet-1">
    <ul class="responsive-style1 u-pagination u-unstyled u-pagination-1"><?php
            global $wp_query;
            
            if ($wp_query->max_num_pages > 1) {
                $pagination_links = paginate_links(array(
                    'base' 			=> str_replace(999999999, '%#%', get_pagenum_link(999999999, false)),
                    'format' 		=> '',
                    'current' 		=> max(1, get_query_var('paged')),
                    'total' 		=> $wp_query->max_num_pages,
                    'type'			=> 'array',
                    'prev_text'     => __('&#x3008;', 'kc_scc_v3'),
                    'next_text'     => __('&#x3009;', 'kc_scc_v3'),
                    'end_size'      => 1,
                    'mid_size'      => 1,
                ));
    
                foreach ($pagination_links as $idx => &$link) {
                    if (strpos($link, 'aria-current=') !== false) {
                        $active_idx = $idx;
                    }
                    $link = preg_replace(
                        array(
                            '/class=(["\'])([^"\']*?)page-numbers/',
                        ),
                        array(
                            'style="padding: 16px 28px;" class=$1$2 u-button-style u-nav-link',
                        ),
                        $link
                    );
                }
    
                foreach ($pagination_links as $idx => &$link) {
                    $li_class = 'u-nav-item u-pagination-item';
                    if ($idx === $active_idx) {
                        $li_class .= ' active';
                    }
                    if (strpos($link, 'class="prev') !== false) {
                        $li_class .= ' prev';
                    }
                    if (strpos($link, 'class="next') !== false) {
                        $li_class .= ' next';
                    }
                    if (strpos($link, 'dots"') !== false) {
                        $li_class .= ' u-pagination-separator';
                    }
                    echo '<li class="' . $li_class . '">' . $link . '</li>';
                }
            }
            ?></ul>
  </div>
</section><?php endif; ?><?php if ($skip_min_height) { echo "<style> .u-section-5, .u-section-5 .u-sheet {min-height: auto;}</style>"; } ?>