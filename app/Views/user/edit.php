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
          <h1 class="panel-title">Edit Profile</h1>

          <!-- Divider -->
          <div class="bottom-divider"></div>
          <!-- End of Divider -->

          <form action="/user/update" method="POST" class="margin-top-30">
            <?= csrf_field(); ?>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>

              </div>
            </div>
            <div class="form-group row">
              <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-4">
                <input type="fullname" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname']; ?>">
                <div class="invalid-feedback text-left text-danger">
                  <small><?= $validation->getError('fullname'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="birthday" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="birthday" value="<?= date('Y-m-d', $user['birthday']); ?>">
                <div class="invalid-feedback text-left text-danger">
                  <small><?= $validation->getError('birthday'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-4">
                <select name="gender" id="gender">
                  <?php foreach ($gender as $g) : ?>
                    <option value="<?= $g; ?>" <?= ($g == $user['gender']) ? 'selected' : ''; ?>><?= $g; ?></option>
                  <?php endforeach; ?>
                </select>
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