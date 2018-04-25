<?php
function get_user_past_location($user_id) {
  require "sql.php";

  if (isset($conn)) {
    $location_query = "SELECT movements.move_id, x.loc_name, y.loc_name, people.fname, people.lname, movements.move_time ";
    $location_query .= "FROM movements ";
    $location_query .= "LEFT JOIN locations x ON movements.move_from = x.loc_id ";
    $location_query .= "LEFT JOIN locations y ON y.loc_id = movements.move_to ";
    $location_query .= "JOIN people ON people.user_id = movements.move_user ";
    $location_query .= "WHERE move_user = " . $user_id;
    $location_result = mysqli_query($conn, $location_query);

    $result = [];
    while ($row = mysqli_fetch_array($location_result)) {
      array_push($result, $row);
    }
    return $result;
  } else {
    echo 'Unfortunately SQL functionality is not working at the moment.';
  }
}
    HttpResponse(503);
?>
