<?php
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