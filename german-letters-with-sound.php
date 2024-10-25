<?php
/*
Plugin Name: German letters with sound
Description: A plugin that plays sounds when pressing the letters.
Version: 1.0
Author: Karin Ekenberg
*/

 //basic security
 if(!defined('ABSPATH')){
    echo 'You should not be here!';
    exit;
}
function lsp_enqueue_scripts() {
    wp_enqueue_script('lsp-main-js', plugin_dir_url(__FILE__) . 'js/lsp-main.js', array('jquery'), null, true);
    wp_enqueue_style('lsp-main-css', plugin_dir_url(__FILE__) . 'css/lsp-style.css');
}
add_action('wp_enqueue_scripts', 'lsp_enqueue_scripts');

function lsp_display_letters() {
    // Stora och små tyska bokstäver
    $uppercase_letters = array_merge(range('A', 'Z'), ['Ä', 'Ö', 'Ü']);
    $lowercase_letters = array_merge(range('a', 'z'), ['ä', 'ö', 'ü', 'ß']);
    
    $output = '<div class="lsp-container">';
    
    // Loop genom stora bokstäver och matcha dem med motsvarande små bokstäver
    foreach ($uppercase_letters as $index => $uppercase_letter) {
        // Hämta motsvarande liten bokstav
        $lowercase_letter = $lowercase_letters[$index];
        
        // Skapa en div som innehåller både stora och små bokstäver
        $output .= '<div class="lsp-letter" data-uppercase="' . $uppercase_letter . '" data-lowercase="' . $lowercase_letter . '">';
        $output .= $uppercase_letter . ' ' . $lowercase_letter;
        $output .= '</div>';
    }

    // Lägg till en separat div för ß
    $output .= '<div class="lsp-letter" data-uppercase="-" data-lowercase="ß">';
    $output .= 'ß';
    $output .= '</div>';
    
    $output .= '</div>';
    return $output;
}


add_shortcode('letter_sound_player', 'lsp_display_letters');