<?php
function site_head()
{
  $site_head = require_once( ROOT . '/views/includes/site_head.php' );
}
function site_header()
{
  $site_header = require_once( ROOT . '/views/includes/site_header.php' );
}
function site_footer()
{
  $site_footer = require_once( ROOT . '/views/includes/site_footer.php' );
}
function age( $birthday ) {
  $birthday_timestamp = strtotime( $birthday );
  $age = date( 'Y' ) - date( 'Y', $birthday_timestamp );
  if (date( 'md', $birthday_timestamp ) > date('md') ) {
    $age--;
  }
  return $age;
}
?>
