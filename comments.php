<h3 id="comments">
	<?php comments_number( esc_html__( 'no responses' ,'less-reloaded' ), esc_html__( 'one response' ,'less-reloaded' ), esc_html__( '% responses' ,'less-reloaded' ) ); esc_html_e( ' for ' ,'less-reloaded'); the_title(); ?>
</h3>
<?php the_comments_pagination( array(
	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'less-reloaded' ) . '</span>',
	'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'less-reloaded' ) . '</span>',
) );
?>
<ol class="commentlist">
	<?php wp_list_comments(); ?>
	<?php comment_form(); ?>
</ol>