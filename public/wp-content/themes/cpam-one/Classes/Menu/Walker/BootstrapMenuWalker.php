<?php
/**
* @name BootstrapMenuWalker
* @package Menu/Walker
* @author Vaelia
* @version 1.0.0
* @abstract Override every steps of wp_nav_menu()
*/
class BootstrapMenuWalker extends Walker_Nav_Menu {
    private static $_INDENT_ = "\t";

    /**
    * Define the top container element (<ul>)
    */
    public function start_lvl(&$output, $depth=0, $args=[]) {}

    public function start_el(&$output, $item, $depth=0, $args=[], $id=0){
        //var_dump($item);

        $indent = ( $depth ) ? str_repeat( self::_INDENT_, $depth ) : '';

        // Sets two variables
        $classNames = "";
        $value = "";
        
        // Gets the class already defined for item
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        
        // Add bootstrap classes to the array
        $classes[] = "menu-item-" . $item->ID;
        $classes[] = "nav-item";
        
        // Finally, join all classes needed in a string
        $classNames = implode( " ", apply_filters( "nav_menu_css_class",  $classes, $item ) );
        $classNames = $classNames ? " class=\"" . esc_attr( $classNames ) . "\"" : "";
        
        // Same thing for the "id" attribute
        $id = apply_filters( "nav_menu_item_id", "menu-item-". $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
        // Concatenation of the output with
        // the beginning of the new li element
        $output .= $indent . "<li" . $id . $value . $classNames .">";
        
        // Sets the inner li element
        $atts = array();
        $atts["title"]  = ! empty( $item->attr_title ) ? $item->attr_title : "";
        $atts["target"] = ! empty( $item->target )     ? $item->target     : "";
        $atts["href"]   = ! empty( $item->url ) ? $item->url : "";
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        
        $attributes = "";
        
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( "href" === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= " " . $attr . "=\"" . $value . "\"";
            }
        }

        $item_output = "";
        $item_output .= "<a data-rel=\"" . $args->before . "\" class=\"nav-link\"" . $attributes . ">";
        $item_output .= $args->link_before . apply_filters( "the_title", $item->title, $item->ID ) . $args->link_after;
        $item_output .= "</a>";
        $item_output .= $args->after;

        $output .= apply_filters( "walker_nav_menu_start_el", $item_output, $item, $depth, $args );
    }

    public function end_el(&$ouput, $item, $depth=0, $args=[])  {}
    
    public function end_lvl(&$output, $depth=0, $args=[]) {}
}