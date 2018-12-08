<?php
require_once( ROOT . '/models/timesheet.php' );
class TimesheetController
{
  public function actionCommon()
  {
    $timesheetCommon = TimesheetModel::getTimesheetCommon();
    require_once( ROOT . '/views/timesheet/timesheet_common.php' );
    return true;
  }
}
?>
