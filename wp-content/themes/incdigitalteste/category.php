<?php
get_header();
?>

<?php include(TEMPLATEPATH . "/inc/introcategoria.php"); ?>

<section id="sec-blog">
<div class="container">
	<div class="row">
			<?php
		if ( have_posts() ) {

			while ( have_posts() ) { the_post(); ?>
			<div class="col-md-4 ">
				<div class="card mb-4 ">
					<?php the_post_thumbnail('blogsmall', array(
								'class' => 'card-img-top',
								'alt' => get_the_title()
							)); ?>
					<div class="card-body info-blog">
						<h2><?php the_title() ?></h2>
						<p class=""><?php echo get_excerpt(); ?></p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<a href="<?php the_permalink() ?>" class="btn1">Leia mais</a>
							</div>
							<small class="text-muted"><?php the_category();?></small>
						</div>
					</div>
				</div>
			</div> 
			<?php
				}
			}
			?> 
</div>
<div class="paginacao"> 
			<?php minha_paginacao();?>
	 
			</div>
</section>

<?php
get_footer();
?>