<div id="sidenav">
  <div class="sidenav-main">
    <a href="<?php echo $gotoHome?>"><span class="material-icons">home</span><br>Home</a>
    <a href="<?php echo $gotoCatalog?>"><span class="material-icons">piano</span><br>Catalog</a>
    <?php //<a href="<?php echo $gotoHistory?\>"><span class="material-icons">history</span><br>History</a> ?>
    <hr />
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deliverModal"><span class="material-icons">place</span><br>Deliver to</button>
    <a href="<?php echo $gotoAbout?>"><span class="material-icons">info</span><br>About</a>
  </div>
  
  <div class="sidenav-footer">
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#languageModal">
      <span class="material-icons">language</span>
    </button>

  </div>
</div>

<!-- Modal language -->
<div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-body">
        <div class="d-flex align-items-center justify-content-between">
          <h1 class="modal-title fs-5" id="languageModalLabel">Interface language</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <button type="button" class="btn position-relative" data-bs-dismiss="modal" aria-label="Close">
                <span class="material-icons position-absolute end-0 bottom-0 me-3 mb-4 text-success">check_circle</span>
                <figure class=" figure border border-secondary p-3 rounded">
                  <img src="<?=ROOTURL?>assets/img/english.png" alt="English interface" class="p-0 m-0 figure-img img-fluid rounded language-img object-fit-cover">
                  <figcaption class="figure-caption text-light text-center fs-5">English</figcaption>
                </figure>
              </button>
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php

// Import database
require_once ROOTPATH ."/scripts/db.php";
$db = new db(dbname:DATABASE);
$sql = "SELECT * FROM destination LIMIT 10";
$res = $db->query($sql)->fetchAll();

?>

<!-- Modal delivery -->
<div class="modal fade" id="deliverModal" tabindex="-1" aria-labelledby="deliverModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-body">
        <div class="d-flex align-items-center justify-content-between">
          <h1 class="modal-title fs-5" id="deliverModalLabel">Delivery destination</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container my-3">
          <select class="form-select mb-2" data-bs-theme="dark"  aria-label="Default select example">
            <option selected>Choose destination</option>
            <?php foreach($res as $destination): ?>
              <option value="<?=$destination['name']?>"><?=$destination['name']?></option>
            <?php endforeach; ?>
          </select>
          <button class="btn bg-secondary-subtle float-end" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark">Choose</button>
        </div>
      </div>
      
    </div>
  </div>
</div>