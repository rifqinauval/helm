<!-- Begin Page Content -->
<div class="container-fluid">


  <div class="row">

    <div class="col-lg-6">
<!-- form ubah pass -->

      <form action="<?= base_url('user/changepassword'); ?>" method="post">
        <?= $this->session->flashdata('message'); ?>
        <div class="form-group">
          <label for="current_password">Curent Password</label>
          <input type="password" class="form-control" id="current_password" name="current_password">
          <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <label for="new_password1">New Password</label>
          <input type="password" class="form-control" id="new_password1" name="new_password1">
          <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <label for="new_password2">Repeat Password</label>
          <input type="password" class="form-control" id="new_password2" name="new_password2">
          <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary"> Change Password</button>
        </div>


      </form>


    </div>



  </div>






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->