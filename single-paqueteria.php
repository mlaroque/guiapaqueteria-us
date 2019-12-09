<?php

global $post;


if ($post->post_parent > 0){

include("single-paqueteria-hija.php");

}else{

include("single-paqueteria-padre.php");

}

?>