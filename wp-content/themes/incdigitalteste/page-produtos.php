<?php
// Template Name: Produtos
get_header();
?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php
			$args = array (
				'post_type' => 'produtos',
				'order'   => 'ASC',
                 
			);
			$the_query = new WP_Query ( $args );
		?>
        <section id="sec-vagaspub">
            <!-- <h2 class="title-section">Vagas publicadas</h2> -->
            <div class="container">
                <div class="row">
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-4 ">
                        <div class="ccard mb-4  box-vagas">
                            <div class="info-vagaspub">
                                <span><?php echo get_the_term_list( $post->ID, 'categoria-vaga', '', ' '); ?></span>
                                <h2><?php the_title();?></h2>
                                <p><?php echo get_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn2">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; else: endif; ?>
	            	<?php wp_reset_query(); wp_reset_postdata(); ?>
                </div>
            </div>
        </section>

<?php endwhile; else: endif; ?>

<?php get_footer(); ?>