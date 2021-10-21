<?php
// Template Name: Home
get_header();
?>
    <section class="section-products">
        <div class="container">
            <div class="section-title">
                <h2>Diagnóstico</h2>
                <span>Linhas</span>
                <div class="section-line"> </div>
                <div class="section-circle"> </div>
            </div>
            <ul class="product-list">
                <?php
                $args = array (
                        'post_type' => 'produtos',
                        'order'   => 'ASC',
                        'posts_per_page' => 6,
                    );
                    $the_query = new WP_Query ( $args );
                ?>

                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                <li class="grid-4 product-box">
                    <figure>
                        <img src="<?php the_field('imagem_destacada_produto'); ?>" alt="<?php get_the_title()?>"/>
                        <i class="fas fa-search"></i> 
                        <a href="<?php the_permalink(); ?>"></a>
                    </figure>

                    <div class="product-info">
                        <h2><?php the_title();?></h2>
                        <p><?php echo get_excerpt(); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>"  class="product-btn">Conheça os testes</a>
                </li>   
                <?php endwhile; else: endif; ?>     
            </ul>
        </div>
 
    </section>

<?php get_footer(); ?>