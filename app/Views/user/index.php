<?= $this->extend('templates/index'); ?>

<?= $this->Section('content'); ?>

<!-- MAIN -->
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- OVERVIEW -->
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h1 class="panel-title">User</h1>

          <!-- Divider -->
          <div class="bottom-divider"></div>
          <!-- End of Divider -->

          <?php if (session()->getFlashdata('pesanSuccess')) : ?>
            <div class="row">
              <div class="col-sm-6">
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('pesanSuccess'); ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="card" style="width: 30rem;">
            <div class="card-body">
              <h5 class="card-title"><?= $user['fullname']; ?></h5>
              <p class="card-text">Jenis Kelamin : <?= $user['gender']; ?></p>
              <p class="card-text">Email : <?= $user['email']; ?></p>
              <p class="card-text">Tanggal Lahir : <?= date('d F Y', $user['birthday']); ?></p>
              <a href="user/edit" class="btn btn-info">Edit</a>
            </div>
          </div>
        </div>
      </div>


      <!-- END OVERVIEW -->
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>

<?= $this->endSection(); ?>