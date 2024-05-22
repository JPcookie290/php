<?php
function e( $string ): string {
    return htmlentities( $string, ENT_QUOTES, 'UTF-8', false);
}

function check_string( string $input ): bool {
    $length = strlen($input);
    if ( !empty($input) ||  $length < 3 || $length > 100 ) {
        return false;
    }
    return true;
}

function check_age( string $input ): bool {
    $number = (int) $input;
    if ( empty($input) || $number < 12 || $number > 100 ) {
        return false;
    }
    return true;
}

// function check_gender( array $input ): bool {

// }

// function check_mail( string $input ): bool {

// }

// function check_street( string $input ): bool {

// }

// function check_phone( string $input ): bool {

// }

// function check_image( $input ): bool {

// }