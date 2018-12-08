<?php
require_once( ROOT . '/models/schedule.php' );
class ScheduleController
{
  public function actionCommon()
  {
    $scheduleCommon = ScheduleModel::getScheduleCommon();
    require_once( ROOT . '/views/schedule/schedule_common.php' );
    return true;
  }
  public function actionArchive()
  {
    $scheduleArchive = ScheduleModel::getScheduleArchive();
    require_once( ROOT . '/views/schedule/schedule_archive.php' );
    return true;
  }
  public function actionCurrent()
  {
    $scheduleCurrent = ScheduleModel::getScheduleCurrent();
    require_once( ROOT . '/view/schedule/schedule_current.php' );
    return true;
  }
  public function actionPlan()
  {
    $schedulePlan = ScheduleModel::getSchedulePlan();
    require_once( ROOT . '/views/schedule/schedule_plan.php' );
    return true;
  }
}
?>
