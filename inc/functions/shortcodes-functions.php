<?php
//Buscador de empresas near me (cerca)
add_shortcode( 'buscador_sucursales', 'buscador_sucursales');

function buscador_sucursales( $content){

        $GLOBALS['buscar_sucursales'] = "si";

     /*    if (!wp_script_is( $handle, $list )) {
            wp_register_script( 'busc_zip_se_init.js', get_stylesheet_directory_uri().'/js/busc_zip_se_init.js');
            wp_enqueue_script( 'busc_zip_se_init.js','',array(),false,true );
        }
        if (!wp_script_is( $handle, $list )) {
            wp_register_script( 'typeahead', get_stylesheet_directory_uri().'/js/typeahead.min.js');
            wp_enqueue_script( 'typeahead','',array(),false,true ); 
        }*/
        if (!wp_script_is( $handle, $list )) {
            wp_register_script( 'buscar_sucursales.js', get_stylesheet_directory_uri().'/js/buscar_sucursales.js');
            wp_enqueue_script( 'buscar_sucursales.js','',array(),false,true );
        }

        #TODO investigar que hace esto para ver si lo incorporo o no
        ob_start();
        get_template_part("inc/template","buscador");
        $content .= ob_get_clean();
        
    return $content;
}

//Buscador de sucursales que se apoya en el código de buscador de códigos postales
add_shortcode( 'resultados_sucursales', 'resultados_sucursales');

function resultados_sucursales( $atts, $content = null){

        $a = shortcode_atts( array(
            'ciudad' => ''
        ), $atts );

        if($a['ciudad']){
            $GLOBALS['ciudad'] = $a['ciudad'];
        }

       /* if (!wp_script_is( $handle, $list )) {
            wp_register_script( 'resultados_sucursales.js', get_stylesheet_directory_uri().'/js/resultados_sucursales.js');
            wp_enqueue_script( 'resultados_sucursales.js','',array(),false,true );
        }*/

        ob_start();
        get_template_part("inc/sucursales/sucursales-paqueterias-en-detalles");
        $content .= ob_get_clean();
        
    return $content;
}

//Cotizador
add_shortcode( 'cotizador', 'cotizador');

function cotizador( $content){

    ob_start();
    get_template_part("cotizador");
    $content .= ob_get_clean();
        
    return $content;
}

//Listado de paqueterias
add_shortcode( 'listado_paqueterias', 'listado_paqueterias');

function listado_paqueterias( $content){

    ob_start();
    get_template_part("inc/shortcodes/paqueterias","listado");
    $content .= ob_get_clean();
        
    return $content;
}

//Listado de paqueterias
add_shortcode( 'tabla_envios', 'tabla_envios');

function tabla_envios( $atts, $content = null){

        $a = shortcode_atts( array(
            'tipo' => '',
            'lineas' => 4
        ), $atts );

        $GLOBALS['tipo_tabla'] = $a['tipo'];
        $GLOBALS['num_lineas'] = $a['lineas'];

    ob_start();
    get_template_part("inc/shortcodes/envios","tabla-precios");
    $content .= ob_get_clean();
        
    return $content;
}

?>