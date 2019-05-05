<div class="login-content">

    <form method="post" role="form" id="form_login" action="<?php echo site_url('employee/attendance_create'); ?>">
        <div class="form-group">
            <input type="email" class="input-field" name="email" placeholder="<?php echo get_phrase('email');?>"
                required autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" class="input-field" name="password"
                placeholder="<?php echo get_phrase('password');?>" required>
            <input type="hidden" name="type" value="<?php echo $type; ?>">
        </div>
        <button type="submit" class="btn btn-primary"><?php echo get_phrase($type) ?><i class="fa fa-lock"></i></button>
    </form>

</div>
</div>