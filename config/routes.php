<?php

return array(
  'patient/([0-9]+)/delete' => 'patient/list/$1',
  'patient/([0-9]+)' => 'patient/profile/$1',
  'patient/add' => 'patient/add',
  'patient' => 'patient/list',
  'schedule/current/([0-9]+)' => 'schedule/patient/$1',
  'schedule/plan/([0-9]+)' => 'schedule/patient/$1',
  'schedule/archive' => 'schedule/archive',
  'schedule/current' => 'schedule/current',
  'schedule/plan' => 'schedule/plan',
  'schedule' => 'schedule/common',
  'timesheet' => 'timesheet/common',
  'volunteer/([0-9]+)/delete' => 'volunteer/list/$1',
  'volunteer/([0-9]+)/edit' => 'volunteer/edit/$1',
  'volunteer/([0-9]+)' => 'volunteer/profile/$1',
  'volunteer/add' => 'volunteer/add',
  'volunteer' => 'volunteer/list',
  'worker/([0-9]+)/delete' => 'worker/list/$1',
  'worker/([0-9]+)' => 'worker/profile/$1',
  'worker/add' => 'worker/add',
  'worker' => 'worker/list',
  'account' => 'account/index',
  'logout' => 'user/logout',
  '' => 'user/login',
);

?>
