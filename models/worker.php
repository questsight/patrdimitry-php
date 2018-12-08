<?php

class WorkerModel
{
  // Метод возвращает одну запись по id
  public static function getWorkerProfile( $id )
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error )
    {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }

    $connection -> set_charset( DB_CHARSET );

    $id = intval( $id );

    $query = "SELECT * FROM worker WHERE id = '$id'";
    $result = $connection -> query( $query );
    if ( !$result ) {
      die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
    }
    $workerProfile = $result -> fetch_assoc();
    return $workerProfile;

    $result -> close();
    $connection -> close();
  }

  // Метод возвращает список записей
  public static function getWorkerList( $id )
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error )
    {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }

    $connection -> set_charset( DB_CHARSET );

    //Удаление объекта
    if( $id ){
      $id = intval( $id );
      $query = "SELECT * FROM worker WHERE id = '$id'";
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
    $query = "SELECT id, lastname, firstname, patronymic, post, personnel_number FROM worker";
    $result = $connection -> query( $query );
    if ( !$result ) {
      die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
    }

    $workerList = array();
    $i = 0;
    while ( $row = $result -> fetch_assoc() ) {
      $workerList[ $i ][ 'id' ] = $row [ 'id' ];
      $workerList[ $i ][ 'lastname' ] = $row [ 'lastname' ];
      $workerList[ $i ][ 'firstname' ] = $row [ 'firstname' ];
      $workerList[ $i ][ 'patronymic' ] = $row [ 'patronymic' ];
      $workerList[ $i ][ 'post' ] = $row [ 'post' ];
      $workerList[ $i ][ 'personnel_number' ] = $row [ 'personnel_number' ];
      $i++;
    }
    return $workerList;

    $result -> close();
    $connection -> close();
  }
  
  public static function getWorkerAdd()
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

    if ( isset( $_POST[ 'lastname' ] ) && isset( $_POST[ 'firstname' ] ) && isset( $_POST[ 'patronymic' ] ) && isset( $_POST[ 'post' ] ) && isset( $_POST[ 'personnel_number' ] ) && isset( $_POST[ 'email' ] ) && isset( $_POST[ 'password' ] ) )
    {
      //Загрузка изображений на сервер
      if(  is_uploaded_file($_FILES["photo"]["tmp_name"])  )
      {
        $photo = DIRECTORY_SEPARATOR  .  'assets' .  DIRECTORY_SEPARATOR  .  'image' .  DIRECTORY_SEPARATOR  .  'worker' . DIRECTORY_SEPARATOR  .  'photo' . DIRECTORY_SEPARATOR . 'worker_' . mt_rand(0, 10000) .'_' . $_FILES["photo"]["name"];
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
      $address = sanitizeMySQL( $connection, 'address' );
      $metro = sanitizeMySQL( $connection, 'metro' );
      $post = sanitizeMySQL( $connection, 'post' );
      $personnel_number = sanitizeMySQL( $connection, 'personnel_number' );
      $education = sanitizeMySQL( $connection, 'education' );
      $rate = sanitizeMySQL( $connection, 'rate' );
      $hour_rate = sanitizeMySQL( $connection, 'hour_rate' );
      $operation_mode = sanitizeMySQL( $connection, 'operating_mode' );
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
        $query = "INSERT INTO worker ( id, photo, lastname, firstname, patronymic, birthday, mobile, phone, email, fb, vk, address, metro, post, personnel_number, education, rate, hour_rate, operating_mode, comment ) VALUES " . "( '$id', '$photo', '$lastname', '$firstname', '$patronymic', '$birthday', '$mobile', '$phone', '$email', '$fb', '$vk', '$address', '$metro', '$post', '$personnel_number', '$education', '$rate', '$hour_rate', '$operating_mode', '$comment' )";
      
        $result = $connection -> query( $query );
        if ( !$result )
        {
          unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
          $query = "DELETE FROM user WHERE id = '$id'";
          $result = $connection -> query( $query );
          die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
        } else {
          header( "Location: /worker/" );
        }
      }

      $result -> close();
      $connection -> close();
    }
  }
}
?>
