<?php

  $message = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $message = '<div class="alert alert-success">Executed with success!</div>';
        break;

      case 'error':
        $message = '<div class="alert alert-danger">Action not executed!</div>';
        break;
    }
  }

  $results = '';
  foreach($hotel as $hotel){
    $results .= '<tr>
                      <td>'.$hotel->id.'</td>
                      <td>'.$hotel->name.'</td>
                      <td>'.$hotel->city.'</td>
                      <td>'.$hotel->description.'</td>
                      <td>'.($hotel->standard == 's' ? 'Standard Double' : 'Premium Double').'</td>
                      <td>'.($hotel->opened == 'y' ? 'Opened' : 'Closed').'</td>
                      <td>
                        <a href="edit.php?id='.$hotel->id.'">
                          <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <a href="delete.php?id='.$hotel->id.'">
                          <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                      </td>
                    </tr>';
  }

  $results = strlen($results) ? $results : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              No registered hotel
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$message?>

  <section>
    <a href="register.php">
      <button class="btn btn-success">New hotel</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Amenities</th>
            <th>Room Types</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?=$results?>
        </tbody>
    </table>

  </section>


</main>