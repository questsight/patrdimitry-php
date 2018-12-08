<?php
class PatientModel
{
  // Метод возвращает одну запись по id
  public static function getPatientProfile( $id )
  {
    $database = Database::getConnection();
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    if ( $connection -> connect_error ) {
      die( 'При подключении к базе данных произошла ошибка: ' . $connection -> connect_error );
    }
    $connection -> set_charset( DB_CHARSET );
    $id = intval( $id );
    $query = "SELECT * FROM patient WHERE id = '$id'";
    $result = $connection -> query( $query );
    if ( !$result ) {
      die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
    }
    $patientProfile = $result -> fetch_assoc();
    return $patientProfile;
    $result -> close();
  }
  // Метод возвращает список записей
  public static function getPatientList( $id )
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
      $query = "SELECT * FROM patient WHERE id = '$id'";
      $result = $connection -> query( $query );
      if ( !$result ) {
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      }
      $row = $result -> fetch_assoc();
      $photo = $row ['photo'];
      unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
      $query = "DELETE FROM patient WHERE id = '$id'";
      $result = $connection -> query( $query );
      if ( !$result ) {
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      }
    }
    $query = "SELECT id, lastname, firstname, patronymic, metro, head_nurse FROM patient";
    $result = $connection -> query( $query );
    if ( !$result ) {
      die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
    }
    $patientList = array();
    $i = 0;
    while ( $row = $result -> fetch_assoc() ) {
      $patientList[ $i ][ 'id' ] = $row [ 'id' ];
      $patientList[ $i ][ 'lastname' ] = $row [ 'lastname' ];
      $patientList[ $i ][ 'firstname' ] = $row [ 'firstname' ];
      $patientList[ $i ][ 'patronymic' ] = $row [ 'patronymic' ];
      $patientList[ $i ][ 'metro' ] = $row [ 'metro' ];
      $patientList[ $i ][ 'head_nurse' ] = $row [ 'head_nurse' ];
      $i++;
    }
    return $patientList;
    $result -> close();
  }
  public static function getPatientAdd()
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
    
    if ( isset( $_POST[ 'lastname' ] ) && isset( $_POST[ 'firstname' ]) && isset( $_POST[ 'patronymic' ] ))
    {
      //Загрузка изображений на сервер
      if(  is_uploaded_file($_FILES["photo"]["tmp_name"])  )
      {
        $photo = DIRECTORY_SEPARATOR  .  'assets' .  DIRECTORY_SEPARATOR  .  'image' .  DIRECTORY_SEPARATOR  .  'patient' . DIRECTORY_SEPARATOR  .  'photo' . DIRECTORY_SEPARATOR . 'patient_' . mt_rand(0, 10000) .'_' . $_FILES["photo"]["name"];
        move_uploaded_file
        (
          $_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $photo          
        );
      }
      $lastname = sanitizeMySQL( $connection, 'lastname' );
      $firstname = sanitizeMySQL( $connection, 'firstname' );
      $patronymic = sanitizeMySQL( $connection, 'patronymic' );
      $birthday = sanitizeMySQL( $connection, 'birthday' );
      $description = sanitizeMySQL( $connection, 'description' );
      $mobile = sanitizeMySQL( $connection, 'mobile' );
      $phone = sanitizeMySQL( $connection, 'phone' );
      $email = sanitizeMySQL( $connection, 'email' );
      $fb = sanitizeMySQL( $connection, 'fb' );
      $vk = sanitizeMySQL( $connection, 'vk' );
      $address = sanitizeMySQL( $connection, 'address' );
      $metro = sanitizeMySQL( $connection, 'metro' );
      $contact_person = sanitizeMySQL( $connection, 'contact_person' );
      $head_nurse = sanitizeMySQL( $connection, 'head_nurse' );
      $core_begin = sanitizeMySQL( $connection, 'core_begin' );
      $core_end = sanitizeMySQL( $connection, 'core_end' );
      $comment = sanitizeMySQL( $connection, 'comment' );
      $diagnosis = sanitizeMySQL( $connection, 'diagnosis' );
      $difficulty_care = sanitizeMySQL( $connection, 'difficulty_care' );
      $concomitant_disease= sanitizeMySQL( $connection, 'concomitant_disease' );
      $situation = sanitizeMySQL( $connection, 'situation' );
      $recommendation = sanitizeMySQL( $connection, 'recommendation' );
      $medical_comment = sanitizeMySQL( $connection, 'medical_comment' );
      $doctor_recommendation = sanitizeMySQL( $connection, 'doctor_recommendation' );
      $need_products = sanitizeMySQL( $connection, 'need_products' );
      $need_medicament = sanitizeMySQL( $connection, 'need_medicament' );
      $need_etc = sanitizeMySQL( $connection, 'need_etc' );
      $hours_nurse = sanitizeMySQL( $connection, 'hours_nurse' );
      $hours_organizations = sanitizeMySQL( $connection, 'hours_organizations' );
      $cost_organizations = sanitizeMySQL( $connection, 'cost_organizations' );
      $compensations_ward = sanitizeMySQL( $connection, 'compensations_ward' );
      $compensations_etc = sanitizeMySQL( $connection, 'compensations_etc' );

      $query = "INSERT INTO patient ( photo, lastname, firstname, patronymic, birthday, description, mobile , phone, email, fb, vk, address, metro, contact_person, head_nurse, core_begin, core_end, comment, diagnosis, difficulty_care, concomitant_disease, situation, recommendation, medical_comment, doctor_recommendation, need_products, need_medicament, need_etc, hours_nurse, hours_organizations, cost_organizations, compensations_ward, compensations_etc ) VALUES " . "( '$photo', '$lastname', '$firstname', '$patronymic', '$birthday', '$description', '$mobile', '$phone', '$email', '$fb', '$vk', '$address', '$metro', '$contact_person', '$head_nurse', '$core_begin', '$core_end', '$comment', '$diagnosis', '$difficulty_care', '$concomitant_disease', '$situation', '$recommendation', '$medical_comment', '$doctor_recommendation', '$need_products', '$need_medicament', '$need_etc', '$hours_nurse', '$hours_organizations', '$cost_organizations', '$compensations_ward', '$compensations_etc' )";
      
      $result = $connection -> query( $query );
      if ( !$result )
      {
        unlink( $_SERVER['DOCUMENT_ROOT'] . $photo );
        die( 'При выполнении запроса к базе данных произошла ошибка: ' . $connection -> error );
      } else {
        header( "Location: /patient/" );
      }

      $result -> close();
      $connection -> close();
    }    
  }
}
?>
