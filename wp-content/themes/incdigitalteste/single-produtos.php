<?php
// Template Name: Single Produtos
get_header();
?>   
  <section id="single-produto">
    <div class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
      <div class="grid-6">
      <?php 
            $slides = get_field('galeria_produto');
            if( $slides ): ?>


        <div class="productZoom">
        <ul class="zoomImg">
          <?php foreach( $slides as $slide ): ?>

          <li>
            <img class="img" src="<?php the_field('imagem_destacada_produto'); ?>" data-zoom-image="<?php the_field('imagem_destacada_produto'); ?>"/>
          </li>

          <?php endforeach; ?>
        </ul>

        <ul id="zoomNav" class="zoomNav">
          <li>
            <a href="#" data-image="<?php echo $slide['alt']; ?>">
              <img src="<?php echo $slide['url']; ?>" />
            </a>
          </li> 
        </ul>
      </div>
      <?php endif; ?> 
        <?php endwhile; ?>
        <?php endif; ?> 
    </div>
   
      <div class="grid-6">
        <h2>Analisador Finecare III Plus</h2>
        <span>Registro ANVISA: 80537410046</span>
        <p>O Finecare III Plus - Point of Care (POC) possui total compatibilidade com os testes executados e o mesmo desempenho clínico dos modelos da linha Finecare. O Finecare III Plus foi desenvolvido para atender clientes com rotinas maiores e permite execução de até 80 testes por hora, sendo 20 testes simultâneos.</p>
      </div>
 

    </div> 
  </section>

<?php get_footer(); ?>