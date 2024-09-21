<div id="search-result">
  <h3>System Users</h3>
  <div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Username</th>
      </tr>
      <?php
      $count = 1;
      // Fetch and display all users, regardless of access level
      if ($user->list_users() != false) {
        foreach ($user->list_users() as $value) {
          extract($value);
      ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><a href="index.php?page=settings&action=profile&id=<?php echo $user_id; ?>"><?php echo $user_lastname . ', ' . $user_firstname; ?></a></td>
              <td><?php echo $user_access; ?></td>
              <td><?php echo $username; ?></td>
            </tr>
      <?php
          $count++;
        }
      } else {
        echo "No Record Found.";
      }
      ?>
    </table>
  </div>
</div>
