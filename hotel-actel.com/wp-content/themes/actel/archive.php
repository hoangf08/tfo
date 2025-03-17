<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package actel
 */

get_header();
?>

<div class="con_title">
	<h2 class="ttl"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/st_topics.svg" alt="TOPICS" width="192"></span><span class="jp">トピックス</span></h2>
</div>

<section class="con_topics">
	<div class="con_inner">
		<h2 class="st_high"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/topics/st_topicslist.svg" alt="TOPICS LIST" width="248"></span></h2>
		<div class="wrap_post">
			<?php if ( have_posts() ) : ?>
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>
				<li>
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<p class="date"><?php echo get_the_date(); ?></p>
						<?php
							$cat = get_the_category();
							$cat_name = $cat[0]->cat_name;
							if($cat[0]->slug == 'important') {
								$cat_important = ' cate-important';
							} else {
								$cat_important = '';
							}
						?>	
						<p class="cate<?php echo $cat_important; ?>"><span><?php echo $cat_name; ?></span></p>
						<?php the_title( '<p class="title">', '</p>' ); ?>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
		<?php the_posts_pagination( array(
			'prev_text' => '<i class="icon-angle-left"></i>前へ',
			'next_text' => '次へ<i class="icon-angle-right"></i>',
		)); ?>
	</div>
</section>

<?php
get_footer();
