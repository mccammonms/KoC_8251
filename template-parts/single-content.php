<?php global $post;
if (!theme_the_post()) return;
 $post0 = $post;
 ?>
<?php $skip_min_height = false; ?><section class="u-clearfix u-section-1" id="sec-20fb">
  <div class="u-clearfix u-sheet u-sheet-1">
    <?php if ($post0 !== null) { ?><?php
                            $post_image = theme_get_post_image(array('class' => 'u-blog-control u-expanded-width u-image u-image-default u-image-1', 'default' => '/images/default-image.jpg'));
                            if ($post_image) echo $post_image; else { echo '<div class="hidden-image"></div>'; $skip_min_height = true; } ?><?php } ?>
    <?php if ($post0 !== null) { ?><h2 class="u-blog-control u-custom-font u-expanded-width u-heading-font u-text u-text-1">
      <?php if (!is_singular()): ?><a class="u-post-header-link" href="<?php the_permalink(); ?>"><?php endif; ?><?php the_title(); ?><?php if (!is_singular()): ?></a><?php endif; ?>
    </h2><?php } ?>
    <div class="u-metadata u-metadata-1">
      <?php if ($post0 !== null) { ?><span class="u-meta-date u-meta-icon"><?php if($post->post_type !== "page"){ echo get_the_date(); }?></span><?php } ?>
      <?php if ($post0 !== null) { ?><?php $categories = theme_get_category_list(); if ($categories):?><span class="u-meta-category u-meta-icon"><?php echo $categories; ?></span><?php endif; ?><?php } ?>
      <?php if ($post0 !== null) { ?><?php if (comments_open()): ?><span class="u-meta-comments u-meta-icon"><a class="u-textlink" href="<?php echo get_comments_link(); ?>">
                                        <?php _e(sprintf(__('Comments (%d)', 'kc_scc_v3'), (int)get_comments_number())); ?>
                                   </a></span><?php endif; ?><?php } ?>
    </div>
    <?php if ($post0 !== null) { ?><div class="u-blog-control u-expanded-width-sm u-expanded-width-xl u-expanded-width-xs u-post-content u-text u-text-2"><?php echo is_singular() ? theme_get_content() : theme_get_excerpt(); ?></div><?php } ?>
  </div>
</section><?php if ($skip_min_height) { echo "<style> .u-section-1, .u-section-1 .u-sheet {min-height: auto;}</style>"; } ?>
