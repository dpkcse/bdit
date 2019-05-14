<div class = "row">
    <div class = "col-md-5 col-md-offset-3">
        <div class = "login-panel panel panel-default">
            <div class = "panel-heading">
                <h3 class = "panel-title">Please Login </h3>
            </div>
            <div class = "panel-body">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                echo form_open("auth/admin_login/login", $attributes);
                ?>
                <?php echo $this->session->flashdata('msg'); ?>
                <fieldset style = " padding: 15px;">
                    <div class = "form-group has-feedback">
                        <input type = "text" id = "username" name = "username" class = "form-control" placeholder = "Email"
                               value = "<?php echo set_value('username'); ?>" />
                        <span class = "glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class = "text-danger"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class = "form-group has-feedback">
                        <input type = "password" id = "password" name = "password" placeholder = "Password"
                               class = "form-control"
                               value = "<?php echo set_value('password'); ?>" />
                        <span class = "glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class = "text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                    <br />
                    <input class = "btn btn-lg btn-success btn-block" name = "submit" type = "submit" id = "submit"
                           value = "login">
                    <!--<div class="checkbox">
                         <label>
                             <input name="remember" type="checkbox" value="Remember Me">Remember Me
                         </label>
                         <span class="signup"><a id="showsignup" data-toggle='modal' data-target='#myModalRegistration' href="javascript:void(0)">(Sign Up)</a></span>
                     </div>
                     <a id="show_modal" class="forgot_pass_signin"  href="javascript:void(0)" data-toggle='modal' data-target='#myModalForgotPassword'>(Forgot Password?)</a>
                 -->
                </fieldset>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
