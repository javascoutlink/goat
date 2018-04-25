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

  if (isset($conn)) {
  } else {
  }
}
?>
