<?php global $purified_content; global $post;?>

<div class="col-12 col-sm-5 col-md-4 col-lg-4 float-left">
	<div class="indice-B p-3 m5">
		<p><b>Indíce</b></p>
			 <ol class="mb-0">
			<?php 
				preg_match_all('/<h2(.*?)>(.*?)<\/h2/s', $post->post_content, $matches_global, PREG_PATTERN_ORDER); 
				 foreach($matches_global[2] as $match):

			?>
				<li><a href="#<?php echo $id_text; ?>"><?php echo $match; ?></a></li>
			<?php endforeach; ?>

			</ol>

   	</div>
   </div>

<?php 

		function replace_with_ids($m) {

			$id_text_tmp =	preg_replace("/<br\W*?\/>/", "\n", $m[2]);
			$id_text_tmp =	preg_replace( "/\r|\n/", "", $id_text_tmp );
			$id_text = strtolower(urlencode($id_text_tmp));
     
 			return "<h2 id='".$id_text."'>" . $id_text_tmp . "</h2>";         			
 		}

		$purified_content = preg_replace_callback("/<h2(.*?)>(.*?)(?=<\/h2>)/s",'replace_with_ids', $purified_content);

?>