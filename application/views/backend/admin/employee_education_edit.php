<?php 
    $education_id = $this->db->get_where('educational_background', array('user_id' => $row['user_id']))->row()->education_id;

    if($education_id != null){
     
        $education = $this->db->get_where('educational_background', array('user_id' => $row['user_id']))->row();
        
    }

    
?>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('elementary_school'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="elementary_school"
            value="<?php if($education_id != null) { echo $education->elementary_school; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('elementary_date_graduated'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="elementary_date_grad"
            value="<?php if($education_id != null) { echo $education->elementary_date_grad; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('highschool'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="highschool"
            value="<?php if($education_id != null) { echo $education->highschool; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('highschool_date_graduated'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="highschool_date_grad"
            value="<?php if($education_id != null) { echo $education->highschool_date_grad; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('college_school'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="college_school"
            value="<?php if($education_id != null) { echo $education->college_school; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('college_date_graduated'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="college_date_grad"
            value="<?php if($education_id != null) { echo $education->college_date_grad; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('course'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="course"
            value="<?php if($education_id != null) { echo $education->course; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('special_skills'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="special_skills"
            value="<?php if($education_id != null) { echo $education->special_skills; } ?>">
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('others'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="others"
            value="<?php if($education_id != null) { echo $education->others; } ?>">
        <input type="hidden" name="user_id" value="<?php  echo $row['user_id'];  ?>">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-info"><?php echo get_phrase('save_changes'); ?></button>
    </div>
</div>