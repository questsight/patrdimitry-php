<?php
// Подключение модели
require_once( ROOT . '/models/volunteer.php' );
class VolunteerController
{
  public function actionList( $id )
  {
    $volunteerList = array();
    $volunteerList = VolunteerModel::getVolunteerList( $id );
    require_once( ROOT . '/views/volunteer/volunteer_list.php' );
    return true;
  }
  public function actionProfile( $id )
  {
    if ( $id ) {
      $volunteerProfile = VolunteerModel::getVolunteerProfile( $id );
      require_once( ROOT . '/views/volunteer/volunteer_profile.php' );
    }
    return true;
  }
  public function actionAdd()
  {
    $volunteerAdd = VolunteerModel::getVolunteerAdd();
    require_once( ROOT . '/views/volunteer/volunteer_add.php' );
    return true;
  }
  public function actionEdit( $id )
  {
    $volunteerEdit = VolunteerModel::getVolunteerEdit( $id );
    require_once( ROOT . '/views/volunteer/volunteer_edit.php' );
    return true;
  }
}
?>
