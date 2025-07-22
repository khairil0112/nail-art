<?php
// Include database connection
include_once("../koneksi/koneksi.php");

// Fetch all users for the modal
$result_user = mysqli_query($conn, "SELECT * FROM user");
?>

<!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="teamModalLabel">Our Team Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php while ($user = mysqli_fetch_array($result_user)) { ?>
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <img src="../../admin/pages/user/photo/<?php echo htmlspecialchars($user['photo']); ?>" class="card-img-top rounded-3" alt="<?php echo htmlspecialchars($user['name']); ?>" style="max-height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo htmlspecialchars($user['name']); ?></h5>
                  <p class="card-text"><?php echo htmlspecialchars($user['address']); ?></p>
                  <a href="http://wa.me/62<?php echo htmlspecialchars($user['phone']); ?>" class="btn btn-outline-success" target="_blank">Contact: <?php echo htmlspecialchars($user['phone']); ?></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
