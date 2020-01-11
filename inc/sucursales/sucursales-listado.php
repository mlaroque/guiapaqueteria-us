<?php

wp_register_script( 'sucursales-listado', 
      get_stylesheet_directory_uri() . '/js/sucursales-listado.js', array('jquery'), null, true );
wp_enqueue_script( 'sucursales-listado' );

$post_parent = 0;
$post_parent_slug = "";


$departamentos_json = '[{"estado": "Alabama","siglas":"AL"},{"estado": "Alaska","siglas":"AK"},{"estado": "Arizona","siglas":"AZ"},{"estado": "Arkansas","siglas":"AR"},{"estado": "California","siglas":"CA"},{"estado": "Colorado","siglas":"CO"},{"estado": "Connecticut","siglas":"CT"},{"estado": "Delaware","siglas":"DE"},{"estado": "Florida","siglas":"FL"},{"estado": "Georgia","siglas":"GA"},{"estado": "Hawai","siglas":"HI"},{"estado": "Idaho","siglas":"ID"},{"estado": "Illinois","siglas":"IL"},{"estado": "Indiana","siglas":"IN"},{"estado": "Iowa","siglas":"IA"},{"estado": "Kansas","siglas":"KS"},{"estado": "Kentucky","siglas":"KY"},{"estado": "Louisiana","siglas":"LA"},{"estado": "Maine","siglas":"ME"},{"estado": "Maryland","siglas":"MD"},{"estado": "Massachussets","siglas":"MA"},{"estado": "Michigan","siglas":"MI"},{"estado": "Minnesota","siglas":"MN"}, {"estado": "Mississipi","siglas":"MS"}, {"estado": "Missouri","siglas":"MO"}, {"estado": "Montana","siglas":"MT"}, {"estado": "Nebraska","siglas":"NE"}, {"estado": "Nevada","siglas":"NV"}, {"estado": "New Hampshire","siglas":"NH"}, {"estado": "New Jersey","siglas":"NJ"}, {"estado": "New Mexico","siglas":"NM"}, {"estado": "New York","siglas":"NY"}, {"estado": "North Carolina","siglas":"NC"}, {"estado": "North Dakota","siglas":"ND"}, {"estado": "Ohio","siglas":"OH"}, {"estado": "Oklahoma","siglas":"OK"}, {"estado": "Oregon","siglas":"OR"}, {"estado": "Pennsylvania","siglas":"PA"}, {"estado": "Rhode Island","siglas":"RI"}, {"estado": "South Carolina","siglas":"SC"}, {"estado": "South Dakota","siglas":"SD"}, {"estado": "Tennessee","siglas":"TN"}, {"estado": "Texas","siglas":"TX"}, {"estado": "Utah","siglas":"UT"}, {"estado": "Vermont","siglas":"VT"}, {"estado": "Virginia","siglas":"VA"}, {"estado": "Washington","siglas":"WA"}, {"estado": "West Virginia","siglas":"WV"}, {"estado": "Wisconsin","siglas":"WI"}, {"estado": "Wyoming","siglas":"WY"}]';

$departamentos = json_decode($departamentos_json,true);


if($post->post_parent > 0){
  $post_id = $post->post_parent;
  $post_parent = $post->post_parent;
  $post_parent_obj = get_post($post->post_parent);
  $post_parent_slug = $post_parent_obj->post_name;
}else{
  $post_id = $post->ID;
  $post_parent = $post->ID;
  $post_parent_slug = $post->post_name;
}

  $args = array(
    'post_type' => 'empresas',
    'post_parent' => $post_id,
    'post__not_in' => array( $post->ID ),
    'orderby' => 'title',
    'order' => 'ASC',
    'post_status' => 'publish',
    'posts_per_page'=>-1
    );

  $departamentos_posts = get_posts($args);


  $departamentos_posts_arr = array();
  foreach($departamentos_posts as $departamento_post){
  		$tags = wp_get_post_tags($departamento_post->ID);

  		foreach($tags as $tag){
  			$estado = explode("(", $tag->name);
  			$estado_str = rtrim($estado[1],")");
        if (!array_key_exists($estado_str,$departamentos_posts_arr)){
            $departamentos_posts_arr[$estado_str] = array();
        }
        array_push($departamentos_posts_arr[$estado_str],$departamento_post);
  		}

  }

?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
    <?php foreach($departamentos as $departamento): ?>
      <?php if(count($departamentos_posts_arr[$departamento['siglas']]) > 0): ?>
      <div class="panel panel-suc">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a class="panel-sucursales collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo $departamento['estado'];?>" aria-expanded="true" aria-controls="<?php echo $departamento['estado'];?>">
          <?php echo $departamento['estado'];?>
            </a>
          </h4>
        </div>
        <div id="<?php echo $departamento['estado'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <ul class="fa-ul ul-suc">
               <?php
                  foreach($departamentos_posts_arr[$departamento['siglas']] as $sucursal_dep):
                ?>
                <li><i class="fa-li fa fa-angle-right"></i><a href="<?php echo get_permalink($sucursal_dep->ID); ?>"><?php echo $sucursal_dep->post_title; ?></a></li>
                <?php
                endforeach;
              ?>
            </ul>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endforeach;?>
    </div>
</div>
