<?php

/**
 * --------------------------------------------------------------------------
 * Platform Configuration
 * --------------------------------------------------------------------------
 */

return [

    /**
     * --------------------------------------------------------------------------
     * Admin theme configuration.
     * --------------------------------------------------------------------------
     * This value is required. And used to set your template for your backand
     * administration system.
     *
     * Current theme names.
     * -----------------------
     * - skin-blue
     * - skin-blue-light
     * - skin-yellow
     * - skin-yellow-light
     * - skin-green
     * - skin-green-light
     * - skin-purple
     * - skin-purple-light
     * - skin-red
     * - skin-red-light
     * - skin-black
     * - skin-black-light
     */
    'theme' => 'skin-blue',

    /**
     * --------------------------------------------------------------------------
     * Site admin configuration
     * --------------------------------------------------------------------------
     * The name and email address off the sbtie administrator. We preffered
     * to set your developer as the administrator
     */
    'admin' => [
        'name'  => 'Tim Joosten',
        'email' => 'Topairy@gmail.com'
    ],
    
    /**
     * --------------------------------------------------------------------------
     * Site admin configuration
     * --------------------------------------------------------------------------
     * The info about the responsible person for the group domain.
     * This person will also get the emails about the rental requests. 
     * And also will be used to send emails about the rentals.
     */
    'rental' => [
        'name'      => 'Leo Willems',
        'email'     => 'leowillems@telenet.be',
        'telephone' => '',
    ],
];