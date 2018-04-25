<?php
$modules = array('sql', 'html_items', 'users');

foreach ($modules as $module) {
  include "modules/" . $module . ".php";
}
?>
