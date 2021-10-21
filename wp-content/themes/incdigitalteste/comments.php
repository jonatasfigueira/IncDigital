<?php 
$comments_args = array(
  // altera o texto do botao submit 
  'label_submit'=>'COMENTAR',
  // altera o titulo
  'title_reply'=>'<h5>Deixe um comentário</h5>',
  // remove texto ou HTML mostrado apos os campos de comentarios
  'comment_form_top' => 'ds',
  'comment_notes_before' => '',
  'comment_notes_after' => '',
  // redefine o textarea de comentarios
  'comment_field' => '<p class="comment-form-comment"> ' . 
                     '<textarea id="comment" name="comment" placeholder="Seu Comentário* " aria-required="true" class="form-control" rows=5></textarea></p>',
  // campos do formulario
  'fields' => apply_filters(
    'comment_form_default_fields',
    array(                      
      'author' => '<p class="comment-form-author">'  .
                  '<input id="author" class="form-control" placeholder="Seu Nome* " name="author" type="text" value="" size="30" aria-required="true" /></p>',
      'email' => '<p class="comment-form-email">'.
                 '<input id="email" class="form-control" placeholder="Seu E-mail* " name="email" type="text" value="" size="30" aria-required="true" /></p>',
      'url' => '<p class="comment-form-url">'.
               '<input id="url" class="form-control" placeholder="Seu Website" name="url" type="text" value="" size="30" /></p>'
    )
  ),
);
comment_form($comments_args);?>