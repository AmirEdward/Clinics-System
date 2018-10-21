<div class="container">
    <div class="form-group col-md-12">
        <label>Patient Number:</label>
        <p class="form-control"><?php echo $appointment->patient_number; ?></p>
    </div>
    <div class="form-group col-sm-4">
        <label>Patient Name:</label>
        <p class="form-control"><?php echo $appointment->patient_name; ?> </p>
    </div>
    <div class="form-group col-sm-4">
        <label>Mobile:</label>
        <p class="form-control"><?php echo $appointment->mobile; ?></p>
    </div>
    <div class="form-group col-sm-4">
        <label>Gender</label>
        <p class="form-control"><?php echo $appointment->gender; ?></p>
    </div>
    <div class="form-group col-sm-6">
        <label>Clinic:</label>
        <p class="form-control"><?php echo $appointment->name; ?></p>
    </div>
    <form action="<?php echo site_url('appointments/update')?>" method="post">
        <input type="hidden" name="id" value="<?php echo $appointment->aid;?>">
        <div class="form-group col-md-12">
            <label>Status:</label>

            <label class="radio-inline" for="confirmed">
                <input type="radio" name="status" value="Confirmed" id="confirmed" <?php
                echo $appointment->status === 'Confirmed' ? 'checked' : '';
                echo  set_radio('status', 'Confirmed'); ?>>Confirmed
            </label>

            <label class="radio-inline" for="toConfirm">
                <input type="radio" name="status" value="To Confirm" id="toConfirm" <?php
                echo $appointment->status === 'To Confirm' ? 'checked' : '';
                echo  set_radio('status', 'To Confirm'); ?>>To Confirm
            </label>

            <label class="radio-inline" for="treated">
                <input type="radio" name="status" value="Treated" id="treated" <?php
                echo $appointment->status === 'Treated' ? 'checked' : '';
                echo  set_radio('status', 'Treated'); ?>>Closed - Patient Treated
            </label>

            <label class="radio-inline" for="skipped">
                <input type="radio" name="status" value="Skipped" id="skipped" <?php
                echo $appointment->status === 'Skipped' ? 'checked' : '';
                echo  set_radio('status', 'Skipped'); ?>>Closed - Visit Skipped
            </label>

            <label class="radio-inline" for="cancelled">
                <input type="radio" name="status" value="Cancelled" id="cancelled" <?php
                echo $appointment->status === 'Cancelled' ? 'checked' : '';
                echo  set_radio('status', 'Cancelled'); ?>>Cancelled
            </label>
        </div>
        <div class="form-inline form-group col-sm-4">
            <label for="date">Date:</label>
            <input class="form-control" type="date" name="date" id="date" value="<?php echo $appointment->date; ?>">
        </div>
        <div class="form-inline form-group col-sm-4">
            <label for="fromtime">From:</label>
            <input class="form-control" type="time" name="from_time" id="fromtime" value="<?php echo $appointment->from_time ?? ''; ?>">
        </div>
        <div class="form-inline form-group col-sm-4">
            <label for="totime">To:</label>
            <input class="form-control" type="time" name="to_time" id="totime" value="<?php echo $appointment->to_time ?? ''; ?>">
        </div>
        <div class="form-inline form-group col-sm-6">
            <label for="cost">Cost:</label>
            <input class="form-control" type="number" name="cost" id="cost" value="<?php echo $appointment->cost ?? ''; ?>"> USD
        </div>
        <div class="row"></div>
        <div class="form-group col-md-6">
            <label for="comments">Comments:</label><br>
            <textarea name="comments" cols="50" rows="5" id="comments"><?php echo $appointment->comments; ?></textarea>
        </div>
        <div class="form-group col-md-12 text-center">
            <button type="submit" class="btn btn-primary col-md-5" name="save">Save</button>
            <button onclick="cancel_edit()" type="button" class="btn btn-info col-md-5 pull-right" id="cancel">Cancel</button>
        </div>
        <div class="col-md-12">
            <?php echo validation_errors(); ?>
        </div>
    </form>
</div>