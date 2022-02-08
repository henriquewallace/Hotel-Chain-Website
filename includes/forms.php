<main>

  <section>
    <a href="index.php">
      <button class="btn btn-success">Previous</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Hotel Name</label>
      <input type="text" class="form-control" name="name" value="<?=$obHotel->name?>">
    </div>

    <div class="form-group">
      <label>City</label>
      <input type="text" class="form-control" name="city" value="<?=$obHotel->city?>">
    </div>

    <div class="form-group">
      <label>Amenities</label>
      <textarea class="form-control" name="description" rows="5"><?=$obHotel->description?></textarea>
    </div>

    <div class="form-group">
      <label>Room Type</label>

      <div>
          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="standard" value="s"> Standard Double
            </label>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="standard" value="p" <?=$obHotel->standard == 'p' ? 'checked' : ''?>> Premium Double
            </label>
          </div>
      </div>

    <div class="form-group">
      <label>Status</label>

      <div>
          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="opened" value="y" checked> Opened
            </label>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="opened" value="n" <?=$obHotel->opened == 'n' ? 'checked' : ''?>> Closed
            </label>
          </div>
      </div>

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>

  </form>

</main>