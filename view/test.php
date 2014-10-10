<?php
/**
 * Created by PhpStorm.
 * User: vagenas
 * Date: 10/10/2014
 * Time: 7:39 πμ
 */

//var_dump($callee->menu_page->option_form_fields);
// TODO Delete this file
$customCSSFieldProps = array(
    'required'    => false,
    'type'        => 'textarea',
    'name'        => '[custom_css]',
    'title'       => $this->__( 'Custom CSS to be applied to elements' ),
    'placeholder' => $this->__( 'Custom CSS to be applied to elements' ),
    'classes'     => 'text-area form-control',
    'id'          => 'custom-css',
    'rows'        => 10
);
$a = 64;
echo $callee->menu_page->option_form_fields->markup( $callee->menu_page->option_form_fields->value( $a ),$customCSSFieldProps);