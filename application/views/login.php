

<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <?php echo form_open('Login/admin_login');?>
<?php if( $error =$this->session->flashdata('login_failed')): ?>
    <div class="row">
    <div class="col-lg-6">
    <div class="alert alert-dismissible alert-warning">
        <?= $error; ?>
    </div>
    </div>
    </div>
  <?php endif; ?>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-lg-2">
         <label for="inputEmail" control-label">Email</label>
         </div>
         <div class="col-lg-4">
        <!--<input class="form-control" id="inputEmail" placeholder="Email" type="text" name="username">-->
         <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]);  ?>
      </div>
          </div>
          <div class="row">
          <div class="col-lg-2" style="margin-top:20px">
           <label for="inputPassword" control-label">Password</label>
          </div>
          <div class="col-lg-4 login">
           <?php echo form_input(['name'=>'password','class'=>'form-control','placeholder'=>'Password','type'=>'password']);  ?>
         </div>

         </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
           <button type="submit" class="btn btn-primary" name="login">Login</button>
        </div>
      </div>
    </div>
  </div>
</div>


