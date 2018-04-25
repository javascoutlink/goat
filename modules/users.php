<?php
function get_user($user_id) {
  if (isset($conn)) {
    $user_query = "SELECT p.user_id, p.fname, p.lname, p.patrol, t.troop_name, p.street, p.city, p.suburb, p.postcode, p.prim_home, p.prim_mobile, p.troop, p.prim_email, p.prim_first, p.prim_last, p.scnd_home, p.scnd_mobile, p.scnd_email, p.scnd_first, p.scnd_last, p.gender, p.birthday, l.loc_name, ";
    $user_query .= "p.image_type, p.emer_home, p.emer_mobile, p.emer_email, p.emer_first, p.emer_last ";
    $user_query .= "FROM people p ";
    $user_query .= "JOIN troops t ON t.troop_id = p.troop ";
    $user_query .= "JOIN current_locations c ON c.user_id = p.user_id ";
    $user_query .= "JOIN locations l ON l.loc_id = c.location_id ";
    $user_query .= "WHERE p.user_id = " . $user_id;
    $user_result = mysqli_query($conn, $user_query);
  } else {
    echo 'Unfortunately SQL functionality is not working at the moment.';
  }
}

function get_user_past_location($user_id) {
  if (isset($conn)) {
    $location_query = "SELECT movements.move_id, x.loc_name, y.loc_name, people.fname, people.lname, movements.move_time ";
    $location_query .= "FROM movements ";
    $location_query .= "LEFT JOIN locations x ON movements.move_from = x.loc_id ";
    $location_query .= "LEFT JOIN locations y ON y.loc_id = movements.move_to ";
    $location_query .= "JOIN people ON people.user_id = movements.move_user ";
    $location_query .= "WHERE move_user = " . $user_id;
    $location_result = mysqli_query($conn, $location_query);
  } else {
    
  }
}
?>
