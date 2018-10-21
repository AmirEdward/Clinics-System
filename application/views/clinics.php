<div class="container">
    <form action="<?php echo site_url('appointments/create')?>" method="post">
        <div class="form-group col-md-12">
            <label for="patientNumber">Patient Number:</label>
            <input type="text" name="patient_number" id="patientNumber" class="form-control" value="<?php echo set_value('patient_number')?>">
        </div>
        <div class="form-inline form-group col-md-4">
            <label for="patientName">Patient Name:</label>
            <input type="text" name="patient_name" id="patientName" class="form-control" value="<?= set_value('patient_name') ?>">
        </div>
        <?php if(isset($numberError)):?>
            <div class="form-group col-md-12">
                <div class="alert alert-danger"><?php echo $numberError;?></div>
            </div>
        <?php endif; ?>
        <div class="form-inline form-group col-md-4">
            <label for="mob">Mobile</label>
            <input type="number" name="mobile" id="mob" class="form-control" value="<?= set_value('mobile') ?>">
        </div>
        <div class="form-inline form-group col-md-4">
            <label for="gender">Gender F/M</label>
            <select name="gender" id="gender" class="form-control">
                <option></option>
                <option value="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                <option value="female" <?php echo set_select('gender', 'female');?>>Female</option>
            </select>
        </div>
        <div class="row"></div>
        <div class="form-group col-md-12">
            <label>Status:</label>

            <label class="radio-inline" for="confirmed">
                <input type="radio" name="status" value="Confirmed" id="confirmed" <?php echo  set_radio('status', 'Confirmed'); ?>>Confirmed
            </label>

            <label class="radio-inline" for="toConfirm">
                <input type="radio" name="status" value="To Confirm" id="toConfirm" <?php echo  set_radio('status', 'To Confirm'); ?>>To Confirm
            </label>

            <label class="radio-inline" for="treated">
                <input type="radio" name="status" value="Treated" id="treated" <?php echo  set_radio('status', 'Treated'); ?>>Closed - Patient Treated
            </label>

            <label class="radio-inline" for="skipped">
                <input type="radio" name="status" value="Skipped" id="skipped" <?php echo  set_radio('status', 'Skipped'); ?>>Closed - Visit Skipped
            </label>

            <label class="radio-inline" for="cancelled">
                <input type="radio" name="status" value="Cancelled" id="cancelled" <?php echo  set_radio('status', 'Cancelled'); ?>>Cancelled
            </label>
        </div>

        <div class="form-group col-md-6">
            <label class="control-label" for="clinics">Clinics</label>
            <select name="clinic" id="clinics" class="form-control">
                <option></option>
                <?php foreach($clinics as $clinic) : ?>
                    <?php echo "<option value=". $clinic['id'] . set_select('clinic', $clinic['id']). ">". $clinic['name'] ."</option>" ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row"></div>
        <div class="form-inline form-group col-sm-4">
            <label class="control-label" for="date">Appointment Date:</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-inline form-group col-sm-4">
            <label class="control-label" for="fromtime">Appointment Starts At:</label>
            <input type="time" name="from_time" id="fromtime" class="form-control">&nbsp;&nbsp;
        </div>
        <div class="form-inline form-group col-sm-4">
            <label class="control-label" for="totime">Appointment Ends At:</label>
            <input type="time" name="to_time" id="totime" class="form-control">
        </div>
        <div class="row"></div>
        <div class="form-group form-inline col-md-6">
            <label class="control-label" for="cost">Estimated Cost: </label>
            <input type="number" name="cost" id="cost" class="form-control"> USD
        </div>
        <div class="row"></div>
        <div class="form-group col-md-6">
            <label for="comments">Comments:</label><br>
            <textarea name="comments" cols="50" rows="5" id="comments"></textarea>
        </div>

        <div class="form-group col-md-12 text-center">
            <button type="submit" class="btn btn-primary col-md-5" name="create">Create/Save</button>
            <button type="reset" class="btn btn-info col-md-5 pull-right">Reset</button>
        </div>
    </form>
    <div class="col-md-12">
        <?php echo validation_errors(); ?>
    </div>
</div>