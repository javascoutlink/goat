<?php
include "../setup.php";

$user_id = $_GET['id'];
$user_info = get_user($user_id);
$timetable = get_timetable_user($user_id);
$locations = get_user_past_location($user_id);
$allergies = get_user_allergies($user_id);

?>
<!DOCTYPE html>
<html>
  <?php insert_header("User Info"); ?>
  <body>
    <div class="container">
      <?php
      echo "<div class='row'>";
      echo "<div class='col-md-2'>";
      echo "<img src='../profile_photos/" . $user_info['user_id'] . "." . $user_info['image_type'] . "'' style='width: 100%'>";
      echo "</div>";
      echo "<div class='col-md-9'>";
      echo "<div class='col-md-6'>";
      echo "<h1>" . $user_info['fname'] . " " . $user_info['lname'] . "</h1>";
      echo "<p>Jamboree ID: " . $user_info['user_id'];
      echo "<p>First Name: " . $user_info['fname'];
      echo "<p>Last Name: " . $user_info['lname'];
      echo "<p>Troop: " . $user_info['troop_name'];
      echo "<p>Birthday: " . $user_info['birthday'];
      echo "</div>";
      echo "<div class='col-md-6'>";
      echo "<h2>Address</h2>";
      echo "<p>" . $user_info['street'];
      echo "<p>" . $user_info['suburb'];
      echo "<p>" . $user_info['city'] . " " . $user_info['postcode'];
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "<div class='row'>";
      echo "<div class='col-md-8'>";
      echo "<h2>Contact Info</h2>";
      echo "<div class='col-md-6'>";
      echo "<h3>Primary Contact</h3>";
      echo "<p>Name: " . $user_info['prim_first'] . " " . $user_info['prim_last'];
      echo "<p>Mobile Phone: " . $user_info['prim_mobile'];
      echo "<p>Home Phone: " . $user_info['prim_home'];
      echo "<p>Email Address: " . $user_info['prim_email'];
      echo "</div>";
      echo "<div class='col-md-6'>";
      echo "<h3>Secondary Contact</h3>";
      echo "<p>Name: " . $user_info['scnd_first'] . " " . $user_info['scnd_last'];
      echo "<p>Mobile Phone: " . $user_info['scnd_mobile'];
      echo "<p>Home Phone: " . $user_info['scnd_home'];
      echo "<p>Email Address: " . $user_info['scnd_email'];
      echo "</div>";
      echo "<div class='col-md-6'>";
      echo "<h3>Emergency Contact</h3>";
      echo "<p>Name: " . $user_info['prim_first'] . " " . $user_info['prim_last'];
      echo "<p>Mobile Phone: " . $user_info['prim_mobile'];
      echo "<p>Home Phone: " . $user_info['prim_home'];
      echo "<p>Email Address: " . $user_info['prim_email'];
      echo "</div>";
      ?>
      </div>";
      <div class='col-md-4'>
      <h2>Medical Info</h2>
      <h3>Allergies</h3>
      <?php
      foreach ($allergies as $allergy) {
        echo "<p>Allergy Type: " . $allergy[0];
        echo "<p>Allergy Name: " . $allergy[1];
        echo "<p>Allergy Notes: " . $allergy[2];
      }
      ?>
      </div>
      </div>
      <h1>Jamboree Info</h1>
      <div class='row'>
      <div class='col-md-4'>
      <h2>Basic Info</h2>
      <?php
      echo "<p>Current Location: " . $user_info['loc_name'];
      echo "<p>Patrol: " . $user_info['patrol'];
      ?>
        </div>
        <div class='col-md-8'>
        <h2>Timetable</h2>
        <table style="width: 100%">
          <tr>
            <th>Event Name</th>
            <th>Event Time</th>
          </tr>
        <?php

        foreach ($timetable as $event) {
          echo "<tr>";
          echo "<td>" . $event['base_name'] . "</td>";
          echo "<td>" . date("l d F Y G:i", strtotime($event['event_start'] . $event['base_time'])) . "</td>";
          echo "</tr>";
        }
        ?>
        </table>
        </div>
        </div>
      <h2>Location Movements</h1>
      <table style="width: 100%">
        <tr>
          <th>Move ID</th>
          <th>Move From</th>
          <th>Move To</th>
          <th>Move Date</th>
          <th>Move Time</th>
        </tr>
      <?php
      foreach ($locations as $location) {
        echo "<tr>";
        echo "<td>" . $location[0] . "</td>";
        echo "<td>" . $location[1] . "</td>";
        echo "<td>" . $location[2] . "</td>";
        echo "<td>" . date("l d F Y", strtotime($location[5])) . "</td>";
        echo "<td>" . date("G:i:s", strtotime($location[5])) . "</td>";
        echo "</tr>";
      }
      ?>
      </table>
    </div>
  </body>
</html>
