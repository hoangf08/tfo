<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package actel
 */

get_header();
?>

<div class="con_title">
	<h2 class="ttl"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/st_topics.svg" alt="TOPICS" width="192"></span><span class="jp">トピックス</span></h2>
</div>

<article class="con_topics_detail">
	<div class="con_inner">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<header class="entry-header">
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
			
			<h3 class="title"><?php the_title(); ?></h3>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<?php endwhile; ?>
		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		<div class="pager">
			<ul>
				<li class="prev">
					<?php previous_post_link('%link', '<i class="icon-angle-left"></i>前の記事'); ?>
				</li>
				<li class="next">
					<?php next_post_link('%link', '次の記事<i class="icon-angle-right"></i>'); ?>
				<li class="back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>topics/"><i class="icon-angle-left-double"></i>一覧に戻る</a></li>
			</ul>
		</div>
	</div>
</article>

<?php
get_footer();
