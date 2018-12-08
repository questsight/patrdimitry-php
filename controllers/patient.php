<?php
// Подключение модели
require_once( ROOT . '/models/patient.php' );
class PatientController
{
  public function actionList( $id )
  {
    $patientList = array();
    $patientList = PatientModel::getPatientList( $id );
    require_once( ROOT . '/views/patient/patient_list.php' );
    return true;
  }
  public function actionProfile( $id )
  {
    if ( $id ) {
      $patientProfile = PatientModel::getPatientProfile( $id );
      require_once( ROOT . '/views/patient/patient_profile.php' );
    }
    return true;
  }
  public function actionAdd()
  {
    $patientAdd = PatientModel::getPatientAdd();
    require_once( ROOT . '/views/patient/patient_add.php' );
    return true;
  }
  public function actionEdit()
  {
    $patientEdit = PatientModel::getPatientEdit();
    require_once( ROOT . '/views/patient/patient_edit.php' );
    return true;
  }
}
?>
