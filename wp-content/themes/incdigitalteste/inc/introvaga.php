<section class="intro-vaga">
	<div class="container">
    <span><?php echo get_the_term_list( $post->ID, 'categoria-vaga', '', ' '); ?></span>
    <h1><?php the_title(); ?></h1>
	</div>
</section>