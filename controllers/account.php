<?php
require_once( ROOT . '/models/user.php' );
class AccountController
{
  public function actionIndex()
  {
    $userID = UserModel::checkLogged();
    require_once( ROOT . '/views/common/account.php' );
    return true;
  }
}
?>
