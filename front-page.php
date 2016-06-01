<?php
/**
 * The main template file.
 *
 * @package Abraham
 */

get_header(); ?>

<div <?php hybrid_attr( 'grid' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php if ( have_posts() ) : ?>

			<?php tha_content_while_before(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php tha_entry_before(); ?>

				<?php hybrid_get_content_template(); ?>

				<?php tha_entry_after(); ?>

			<?php endwhile; ?>

			<?php tha_content_while_after(); ?>

			<?php get_template_part( 'components/posts', 'pagination' ); ?>

		<?php else : // If no posts were found. ?>

			<?php get_template_part( 'content/none' ); ?>

		<?php endif; ?>

		<?php tha_content_bottom(); ?>

	</main><!-- /.content -->

	<?php tha_content_after(); ?>

	<?php hybrid_get_sidebar( 'primary' ); ?>

</div><!-- /.grid -->

<?php
get_footer();
