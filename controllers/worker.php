<?php

// Подключение модели
require_once( ROOT . '/model/worker.php' );

class WorkerController
{
  public function actionList( $id )
  {
    $workerList = array();
    $workerList = WorkerModel::getWorkerList( $id );
    require_once( ROOT . '/view/worker/worker__list.php' );
    return true;
  }

  public function actionProfile( $id )
  {
    if ( $id ) {
      $workerProfile = WorkerModel::getWorkerProfile( $id );
      require_once( ROOT . '/view/worker/worker__profile.php' );
    }
    return true;
  }

  public function actionAdd()
  {
    $workerAdd = WorkerModel::getWorkerAdd();
    require_once( ROOT . '/view/worker/worker__add.php' );
    return true;
  }
}

?>
