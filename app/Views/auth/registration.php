<?= $this->extend('templates/auth_template'); ?>

<?= $this->section('content'); ?>
<div class="vertical-align-wrap">
  <div class="vertical-align-middle">
    <div class="auth-box t-box">
      <div class="left">
        <div class="content">
          <div class="header">
            <div class="logo text-center">
              <h1 class="text-danger"><strong>ZooTube</strong></h1>
            </div>
            <p class="lead">Registration your account.</p>
          </div>
          <form class="form-auth-small" action="auth/regist" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="fullname" class="control-label sr-only">Full Name</label>
              <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" placeholder="Nama Lengkap" name="fullname" autofocus value="<?= old('fullname'); ?>">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('fullname'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="control-label sr-only">Email</label>
              <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?= old('email'); ?>">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('email'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="password1" class="control-label sr-only">Password</label>
              <input type="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" placeholder="Password" name="password1">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('password1'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="password2" class="control-label sr-only">Confirm Password</label>
              <input type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" placeholder="Konfirmasi Password" name="password2">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('password2'); ?>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Tanggal Lahir</span>
              </div>
              <input type="date" class="form-control <?= ($validation->hasError('birthday')) ? 'is-invalid' : ''; ?>" id="basic-url" aria-describedby="basic-addon3" name="birthday">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('birthday'); ?>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Jenis Kelamin</span>
              </div>
              <select name="gender" id="gender" class="form-control">
                <?php foreach ($gender as $g) : ?>
                  <option value="<?= $g; ?>"><?= $g; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            <div class="margin-top-30 text-danger">
              <i class="fa fa-arrow-left"></i><a href="/"> Back to Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>