<?= $this->extend('templates/auth_template'); ?>

<?= $this->section('content'); ?>
<div class="vertical-align-wrap">
  <div class="vertical-align-middle">
    <div class="auth-box ">
      <div class="left">
        <div class="content">
          <div class="header">
            <div class="logo text-center">
              <h1 class="text-danger"><strong>ZooTube</strong></h1>
            </div>
            <p class="lead">Login to your account</p>
            <?php if (session()->getFlashdata('pesanSuccess')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesanSuccess'); ?>
              </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesanError')) : ?>
              <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesanError'); ?>
              </div>
            <?php endif; ?>
          </div>
          <form class="form-auth-small" action="auth/login" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="email" class="control-label sr-only">Email</label>
              <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" autofocus value="<?= old('email'); ?>">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('email'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="control-label sr-only">Password</label>
              <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
              <div class="invalid-feedback text-left">
                <?= $validation->getError('password'); ?>
              </div>
            </div>
            <div class="row">
              <!-- <div class="col form-group d-inline">
                <label class="fancy-checkbox element-left">
                  <input type="checkbox">
                  <span>Remember me</span>
                </label>
              </div> -->
              <div class="col form-group d-inline text-right justify-content-end">
                <small><a href="#">Forgot password?</a></small>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            <div class="bottom">
              <div class="pt-3 text-success">
                <span class="helper-text"> <i class="fa fa-fw fa-user-plus"></i> <a href="/registration">Registration</a></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>