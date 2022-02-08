<main>

  <h2 class="mt-3">Delete hotel</h2>

  <form method="post">

    <div class="form-group">
      <p>Do you really want to delete the hotel <strong><?=$obHotel->name?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="index.php">
        <button type="button" class="btn btn-success">Cancel</button>
      </a>

      <button type="submit" name="delete" class="btn btn-danger">Delete</button>
    </div>

  </form>

</main>