<?php if(count($appointments)): ?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Patient Number</th>
                <th>Patient Name</th>
                <th>Clinic</th>
                <th>Date</th>
                <th>From</th>
                <th>To</th>
                <th>Status</th>
                <th>Cost</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($appointments as $appointment): ?>
                <tr>
                    <td><?php echo $appointment->patient_number; ?></td>
                    <td><?php echo $appointment->patient_name; ?></td>
                    <td><?php echo $appointment->name; ?></td>
                    <td><?php echo $appointment->date; ?></td>
                    <td><?php echo $appointment->from_time ?? ''; ?></td>
                    <td><?php echo $appointment->to_time ?? ''; ?></td>
                    <td><?php echo $appointment->status; ?></td>
                    <td><?php echo $appointment->cost . " USD" ?? ''; ?></td>
                    <td><?php echo $appointment->comments; ?></td>
                    <td><a href="<?php echo site_url('/appointments/edit/') . $appointment->aid ?>" class="btn btn-info">Edit</a></td>
                    <td><a href="<?php echo site_url('/appointments/delete/') . $appointment->aid ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>