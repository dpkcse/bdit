<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/admin_login/login';


$route['Status/Drawing'] = "reports/drawing";
$route['Status/Delivery'] = "reports/delivery";
$route['Status/Production'] = "reports/production";
$route['Delivery'] = "projects/PlanDelivery";
$route['Production'] = "projects/PlanProduction";
$route['Drawing'] = "projects/ProjectPanel";
$route['Control'] = "projects";
$route['Stuff'] = "employee";
$route['StuffControl'] = "employee/employeePanel";
$route['Home'] = "dashboard";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
