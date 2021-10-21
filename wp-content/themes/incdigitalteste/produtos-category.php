<?php
get_header();

$term_slug = get_query_var('term'); // programming
$taxonomyName = get_query_var('taxonomy'); // job_category
$current_term = get_term_by('slug', $term_slug, $taxonomyName); // Object
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$pargs = array(
  'posts_per_page' => 12,
  'post_type' => 'vagas',
  'tax_query' => array(
    array(
      'taxonomy' => $taxonomyName,
      'field'    => 'slug',
      'terms' => $term_slug
    )
  ),
  'orderby' => 'date',
  'paged' => $paged
);

$the_query = new WP_Query($pargs);
?>

<!-- BEGIN JOBS -->
<div class="jobs page-default bg-white">
  <div class="page-title py-5 text-center bg-light">
    <h1><?= $current_term->name; ?></h1>
  </div>
  <div class="container py-5">
    <div class="row">
      <?php if (have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="col-md-4 pb-3">
            <div class="card mb-4 bg-light border-0">
              <div class="card-body">
                <span class="card-notify-badge">
                  <a href="<?= site_url() . '/' . get_the_terms(get_the_ID(), 'vagas_category')[0]->taxonomy . '/' . get_the_terms(get_the_ID(), 'vagas_category')[0]->slug . '/'; ?>">
                    <?= get_the_terms(get_the_ID(), 'vagas_category')[0]->name; ?>
                  </a>
                </span>
                <h4><?php the_title(); ?></h4>
                <p class="card-text">
                  <?php $excerpt = wp_trim_words(get_field('descricao'), $num_words = 10, $more = ' [...]'); ?>
                  <?php echo $excerpt; ?>
                </p>
                <a href="<?php the_permalink(); ?>">Saiba mais</a href="#">
              </div>
            </div>
          </div>
        <?php endwhile;
      else : ?>
        <div class="col-12">
          <p>Nada para mostrar aqui!</p>
        </div>
      <?php endif; ?>
    </div>
    <div class="row text-center">
      <div class="col-12">
        <?php wp_pagenavi(); ?>
      </div>
    </div>

  </div>
</div>
<!-- END JOBS -->

<?php get_footer(); ?>