<?php
/**
 * Comments template.
 *
 * @package ShearwaterVF
 */

if (post_password_required()) {
    return;
}
?>
<div id="comments" class="entry-content">
    <?php if (have_comments()) : ?>
        <h2><?php esc_html_e('Comments', 'shearwater-vf'); ?></h2>
        <ol><?php wp_list_comments(array('style' => 'ol')); ?></ol>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>
