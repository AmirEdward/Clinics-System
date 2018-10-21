<div class="container">
    <form action="" method="get">
        <div class="form-group form-inline col-md-6">
            <label for="fromDate">From:</label>
            <input class="form-control" type="date" name="from_date" id="fromDate">
        </div>
        <div class="form-group form-inline col-md-6">
            <label for="toDate">To:</label>
            <input class="form-control" type="date" name="to_date" id="toDate">
        </div>
        <div class="form-group col-md-6 form-inline">
            <label for="patientNumber">Patient Number:</label>
            <input class="form-control" type="text" name="patient_number" id="patientNumber">
        </div>
        <div class="row"></div>
        <div class="form-group col-md-6 form-inline">
            <label for="clinic">Clinics:</label>
            <select class="form-control" name="clinic" id="clinic">
                <option></option>
                <?php foreach($clinics as $clinic) : ?>
                    <?php echo "<option value=". $clinic['id'] . ">". $clinic['name'] ."</option>" ?>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
    <table id="result" class="table table-hover">
        <thead>
            <th>Appointment Date</th>
            <th>Patient Number</th>
            <th>Patient Name</th>
            <th>Clinic</th>
            <th>Estimated Cost</th>
            <th>Status</th>
        </thead>
    </table>
</div>

<script>


</script>