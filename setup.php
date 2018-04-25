<?php
$modules = array('sql', 'html_items', 'users', 'location', 'timetables');

foreach ($modules as $module) {
  include "modules/" . $module . ".php";
}
?>
