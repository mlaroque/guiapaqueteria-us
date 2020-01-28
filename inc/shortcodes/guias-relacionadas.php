<?php
  global $cat;
  global $tag;
?>

<div class="container-fluid BGgrisC">
  <div class="container">
    <div class="row fastGuides">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center">Preguntas frecuentes:</h2>
          </div>
          <div class="clearfix"></div>
      <?php

      global $post;

      $guias_cat = array();
      $guias_cat_ids = "";
      if($cat !== ""){
           $args = array(
          'post_type' => 'guias',
          'cat' => $cat,
          'post_per_page' => -1
        );

        $guias_cat = get_posts($args);
        $guias_cat_ids = array();
        foreach($guias_cat as $guia_cat){
          array_push($guias_cat_ids, $guia_cat->ID);
         }

      }

      if($tag === "" && !empty($guias_cat_ids) > 0){
          $tag = -1;
      }
      
      $args = array(
          'post_type' => 'guias',
          'tag' => $tag,
          'post_per_page' => -1,
          'post__not_in' => $guias_cat_ids
      );

      $guias_tag = get_posts($args);
      $guias = array_merge($guias_cat,$guias_tag);

      foreach($guias as $guia):
      ?>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left fastGuid">
            <a href="<?php echo get_permalink($guia->ID); ?>">
              <div class="cont">
                <img src="<?php get_the_post_thumbnail_url($guia->ID);?>" class="img-responsive">
              <h3><?php echo $guia->post_title; ?></h3>
              <p><?php echo wp_trim_words( $guia->post_content, 40, '...' );?></p>
              </div>
              </a>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>