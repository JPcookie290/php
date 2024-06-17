<?php

function e( $string ) : string {
    return htmlentities( $string, ENT_QUOTES, 'UTF-8', false);
}

function pdo_execute( PDO $pdo, string $sql, array $bindings = null) : false|PDOStatement {
    if ( ! $bindings ) {
        // Wenn keine Bindings vorhanden sind, wird die SQL-Anweisung ausgeführt und das Ergebnis zurückgegeben
        // Query führt dabei die SQL-Anweisung aus und gibt ein PDOStatement-Object zurück. Funktioniert nur ohne Anweisung (keine Bindings)
        return $pdo->query( $sql );
    }
    $statement = $pdo->prepare( $sql );
    foreach ($bindings as $key => $value) {
        if ( is_int( $value ) ) {
            $statement->bindValue( $key, $value, PDO::PARAM_INT );
        } else {
            $statement->bindValue( $key, $value );
        }
    }
    $statement->execute();
    
    return $statement;
}

function format_date( string $string ) : string {
    $date = date_create_from_format( 'Y-m-d H:i:s', $string );
    return $date->format( 'd M. Y' );
}