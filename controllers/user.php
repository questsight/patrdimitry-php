<?php

// Подключение модели
require_once( ROOT . '/models/user.php' );
class UserController
{
  public function actionLogin()
  {
    $login = '';
    $password = '';
    if ( isset( $_POST[ 'submit' ] ) ) {
      $login = $_POST[ 'login' ];
      $password = $_POST[ 'password' ];
      $errors = false;

      // Валидация полей
      if ( !UserModel::checkLogin( $login ) ) {
        $errors[] = 'Неправильный логин';
      }

      if ( !UserModel::checkPassword( $password ) ) {
        $errors[] = 'Пароль не должен быть короче 6 символов';
      }

      // Проверка пользователя
      $userID = UserModel::checkUserData( $login, $password );
      if ( $userID == false ) {
        $errors[] = 'Неправильный логин или пароль';
      } else {
        UserModel::authorization( $userID );
        header( "Location: /account/" );
      }
    }
    require_once( ROOT . '/views/common/login.php' );
    return true;
  }

  public function actionLogout() {
    session_start();
    unset( $_SESSION[ 'user' ] );
    header( "Location: /" );
  }
}

?>
