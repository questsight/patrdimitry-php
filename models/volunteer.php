<?php
class VolunteerModel
{
  // Метод возвращает одну запись по id
  public static function getVolunteerProfile( $id )
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error ) {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }
    $connection -> set_charset( DB_CHARSET );
    $id = intval( $id );
    $query = "SELECT * FROM volunteer WHERE id = '$id'";
    $result = $connection -> query( $query );
    if ( !$result ) {
      die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
    }
    $volunteerProfile = $result -> fetch_assoc();
    return $volunteerProfile;
    $result -> close();
  }
  // Метод возвращает список записей
  public static function getVolunteerList( $id )
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error ) {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }
    $connection -> set_charset( DB_CHARSET );
    
    //Удаление записи по id
    if( $id ){
      $id = intval( $id );
      $query = "SELECT * FROM volunteer WHERE id = '$id'";
      $result = $connection -> query( $query );
      if ( !$result ) {
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      }
      $row = $result -> fetch_assoc();
      $photo = $row ['photo'];
      unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
      $query = "DELETE FROM user WHERE id = '$id'";
      $result = $connection -> query( $query );
      if ( !$result ) {
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      }
    }
    $query = "SELECT id, lastname, firstname, patronymic, mobile, email, specialization, birthday FROM volunteer";
    $result = $connection -> query( $query );
    if ( !$result ) {
      die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
    }
    $volunteerList = array();
    $i = 0;
    while ( $row = $result -> fetch_assoc() ) {
      $volunteerList[ $i ][ 'id' ] = $row [ 'id' ];
      $volunteerList[ $i ][ 'lastname' ] = $row [ 'lastname' ];
      $volunteerList[ $i ][ 'firstname' ] = $row [ 'firstname' ];
      $volunteerList[ $i ][ 'patronymic' ] = $row [ 'patronymic' ];
      $volunteerList[ $i ][ 'mobile' ] = $row [ 'mobile' ];
      $volunteerList[ $i ][ 'email' ] = $row [ 'email' ];
      $volunteerList[ $i ][ 'specialization' ] = $row [ 'specialization' ];
      $i++;
    }
    return $volunteerList;
    $result -> close();
  }
  public static function getVolunteerAdd()
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error )
    {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }

    $connection -> set_charset( DB_CHARSET );

    function sanitizeString( $var )
    {
      $var = stripslashes( $var );
      $var = htmlentities( $var, ENT_QUOTES, 'UTF-8' );
      $var = strip_tags( $var );
      return $var;
    }

    function sanitizeMySQL( $connection, $var )
    {
      $var = $connection -> real_escape_string( $_POST[ $var ] );
      $var = sanitizeString( $var );
      return $var;
    }

    if ( isset( $_POST[ 'lastname' ] ) && isset( $_POST[ 'firstname' ] ) && isset( $_POST[ 'email' ] ) && isset( $_POST[ 'password' ] ) )
    {
      
      //Загрузка изображений на сервер
      if(  is_uploaded_file($_FILES["photo"]["tmp_name"])  )
      {
        $photo = DIRECTORY_SEPARATOR  .  'assets' .  DIRECTORY_SEPARATOR  .  'image' .  DIRECTORY_SEPARATOR  .  'volunteer' . DIRECTORY_SEPARATOR  .  'photo' . DIRECTORY_SEPARATOR . 'volunteer_' . mt_rand(0, 10000) .'_' . $_FILES["photo"]["name"];
        move_uploaded_file
        (
          $_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $photo          
        );
      }
      $lastname = sanitizeMySQL( $connection, 'lastname' );
      $firstname = sanitizeMySQL( $connection, 'firstname' );
      $patronymic = sanitizeMySQL( $connection, 'patronymic' );
      $birthday = sanitizeMySQL( $connection, 'birthday' );
      $mobile = sanitizeMySQL( $connection, 'mobile' );
      $phone = sanitizeMySQL( $connection, 'phone' );
      $email = sanitizeMySQL( $connection, 'email' );
      $login = sanitizeMySQL( $connection, 'email' );
      $fb = sanitizeMySQL( $connection, 'fb' );
      $vk = sanitizeMySQL( $connection, 'vk' );
      $education = sanitizeMySQL( $connection, 'education' );
      $specialization = sanitizeMySQL( $connection, 'specialization' );
      $comment = sanitizeMySQL( $connection, 'comment' );
      $password = sanitizeMySQL( $connection, 'password' );

      $query = "INSERT INTO user ( login, password ) VALUES " . "( '$login', '$password' )";
      $result = $connection -> query( $query );
      
      if ( !$result )
      {
        unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      } else {
        $id = $connection->insert_id;
        $query = "INSERT INTO volunteer ( id, photo, lastname, firstname, patronymic, birthday, mobile, phone, email, fb, vk, education, specialization, comment ) VALUES " . "( '$id', '$photo', '$lastname', '$firstname', '$patronymic', '$birthday', '$mobile', '$phone', '$email', '$fb', '$vk', '$education', '$specialization', '$comment' )";
        
        $result = $connection -> query( $query );
        if ( !$result )
        {
          unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
          $query = "DELETE FROM user WHERE id = '$id'";
          $result = $connection -> query( $query );
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        } else {
          header( "Location: /volunteer/" );
        }
      }
      
      $result -> close();
      $connection -> close();
    }    
  }
  public static function getVolunteerEdit( $id )
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error ) {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }
    $connection -> set_charset( DB_CHARSET );
    $id = intval( $id );
    if(  is_uploaded_file($_FILES["photo"]["tmp_name"])  )
    {
      $query = "SELECT * FROM volunteer WHERE id = '$id'";
      $result = $connection -> query( $query );
      $row = $result -> fetch_assoc();
      $photo = $row ['photo'];
      unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
      $photo = DIRECTORY_SEPARATOR  .  'assets' .  DIRECTORY_SEPARATOR  .  'image' .  DIRECTORY_SEPARATOR  .  'volunteer' . DIRECTORY_SEPARATOR  .  'photo' . DIRECTORY_SEPARATOR . 'volunteer_' . mt_rand(0, 10000) .'_' . $_FILES["photo"]["name"];
      move_uploaded_file
      (
        $_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $photo          
      );
      $query = "UPDATE volunteer SET photo = '$photo' WHERE id='$id'";
      $result = $connection -> query( $query );
      if ( !$result )
      {
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      }
    }
    if($_POST[ 'lastname' ] || $_POST[ 'firstname' ] || $_POST[ 'patronymic' ] || $_POST[ 'birthday' ] || $_POST[ 'mobile' ] || $_POST[ 'phone' ] || $_POST[ 'email' ] || $_POST[ 'password' ] || $_POST[ 'fb' ] || $_POST[ 'vk' ] || $_POST[ 'education' ] || $_POST[ 'specialization' ] || $_POST[ 'comment' ]|| $_POST[ 'photo' ])
    {
      function sanitizeString( $var )
      {
        $var = stripslashes( $var );
        $var = htmlentities( $var, ENT_QUOTES, 'UTF-8' );
        $var = strip_tags( $var );
        return $var;
      }

      function sanitizeMySQL( $connection, $var )
      {
        $var = $connection -> real_escape_string( $_POST[ $var ] );
        $var = sanitizeString( $var );
        return $var;
      }    
    
      if($_POST[ 'lastname' ]){
        $lastname = sanitizeMySQL( $connection, 'lastname' );
        $query = "UPDATE volunteer SET lastname = '$lastname' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
    
      if($_POST[ 'firstname' ]){
        $firstname = sanitizeMySQL( $connection, 'firstname' );
        $query = "UPDATE volunteer SET firstname = '$firstname' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'patronymic' ]){
        $patronymic = sanitizeMySQL( $connection, 'patronymic' );
        $query = "UPDATE volunteer SET patronymic = '$patronymic' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'birthday' ]){
        $birthday = sanitizeMySQL( $connection, 'birthday' );
        $query = "UPDATE volunteer SET birthday = '$birthday' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'mobile' ]){
        $mobile = sanitizeMySQL( $connection, 'mobile' );
        $query = "UPDATE volunteer SET mobile = '$mobile' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'phone' ]){
        $phone = sanitizeMySQL( $connection, 'phone' );
        $query = "UPDATE volunteer SET phone = '$phone' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'email' ]){
        $email = sanitizeMySQL( $connection, 'email' );
        $query = "UPDATE volunteer SET email = '$email' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
        $query = "UPDATE user SET login = '$email' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'password' ]){
        $password = sanitizeMySQL( $connection, 'password' );
        $query = "UPDATE user SET password = '$password' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'fb' ]){
        $fb = sanitizeMySQL( $connection, 'fb' );
        $query = "UPDATE volunteer SET fb = '$fb' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'vk' ]){
        $vk = sanitizeMySQL( $connection, 'vk' );
        $query = "UPDATE volunteer SET vk = '$vk' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'education' ]){
        $education = sanitizeMySQL( $connection, 'education' );
        $query = "UPDATE volunteer SET education = '$education' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'specialization' ]){
        $specialization = sanitizeMySQL( $connection, 'specialization' );
        $query = "UPDATE volunteer SET specialization = '$specialization' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
      
      if($_POST[ 'comment' ]){
        $comment = sanitizeMySQL( $connection, 'comment' );
        $query = "UPDATE volunteer SET comment = '$comment' WHERE id='$id'";
        $result = $connection -> query( $query );
        if ( !$result )
        {
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        }
      }
    
      header( "Location: /volunteer/" ); 
    } else {
      $query = "SELECT * FROM volunteer WHERE id = '$id'";
      $result = $connection -> query( $query );
      if ( !$result ) {
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      }
      $volunteerEdit = $result -> fetch_assoc();
      return $volunteerEdit;
      die( $volunteerEdit['specialization'] );
    }

    $result -> close();
    $connection -> close();
  }
}
?>