<?php
class Database
{
  public static function getConnection()
  {
    define( 'DB_HOST', 'localhost' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_NAME', 'patrdimitry_db' );
    define( 'DB_CHARSET', 'utf8' );
    define( 'DB_COLLATION', 'utf8_general_ci' );
  }
}
?>
