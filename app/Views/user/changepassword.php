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
          <h1 class="panel-title">Ubah Password</h1>

          <!-- Divider -->
          <div class="bottom-divider"></div>
          <!-- End of Divider -->

          <?php if (session()->getFlashdata('pesanError')) : ?>
            <div class="row">
              <div class="col-sm-6">
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('pesanError'); ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <form action="/user/changePass" method="POST" class="margin-top-30">
            <?= csrf_field(); ?>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Password Lama</label>
              <div class="col-sm-4">
                <input type="password" class="form-control" id="email" name="oldpass" placeholder="Password Lama">
                <div class="invalid-feedback text-left text-danger">
                  <small><?= $validation->getError('oldpass'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Password Baru</label>
              <div class="col-sm-4">
                <input type="password" class="form-control" id="email" name="password1" placeholder="Password Baru">
                <div class="invalid-feedback text-left text-danger">
                  <small><?= $validation->getError('password1'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
              <div class="col-sm-4">
                <input type="password" class="form-control" id="email" name="password2" placeholder="Ulangi Password Baru">
                <div class="invalid-feedback text-left text-danger">
                  <small><?= $validation->getError('password2'); ?></small>
                </div>
              </div>
            </div>

            <div class="form-group row margin-top-30">
              <div class="col-sm-2"></div>
              <div class="col-sm-4 demo-button">
                <input type="submit" class="btn btn-primary" value="Perbarui Data">
              </div>
            </div>

          </form>
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