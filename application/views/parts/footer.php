<script type="text/javascript">
    $('#patientNumber').blur(callajax);

    function callajax() {
        let id = $('#patientNumber').val();
        if (id) {
            $.ajax({
                url: "<?php echo site_url('/patients/ajaxfind')?>",
                type: "POST",
                data: {
                    patient_number: id
                },
                success: function (e) {
                    if ($.parseJSON(e)) {
                        $('#patientNumber')
                            .addClass('alert alert-success')
                            .focus(function () {
                                $(this).removeClass('alert alert-success');
                            });
                        let data = $.parseJSON(e);
                        $('#patientName').val(data.patient_name);
                        $('#mob').val(data.mobile);
                        $('#gender').val(data.gender);
                    } else {
                        $('#patientNumber').addClass('alert alert-danger').focus(function () {
                            $(this).removeClass('alert alert-danger');
                        });
                        $('#patientName').val('');
                        $('#mob').val('');
                        $('#gender').val('');
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        }

    }
    function cancel_edit() {
        window.location = "<?php echo $_SERVER['HTTP_REFERER'] ?? site_url('appointments')?>";
    }

    let table = $('#result').DataTable({
        searching: false,
        dom : 'Bfrtip',
        buttons : ['print', 'excel', 'pdf']
    });
    $('input, select').change(function () {
        table.rows().remove().draw();
        $.ajax({
            url: '<?php echo site_url("appointments/ajaxsearch")?>',
            data: $('form').serialize(),
            type: 'GET',
            success: function (data) {
                let a = $.parseJSON(data);
                $.each(a, function (index, value) {
                    let row = table.row.add([
                        value.date,
                        value.patient_number,
                        value.patient_name,
                        value.clinic,
                        value.cost,
                        value.status
                    ]);
                    row.draw();
                    $('#result tbody').on('dblclick', 'tr', function () {
                        window.location = '<?php echo site_url("appointments/edit/") ?>' + value.aid;
                    });
                });
            }
        })
    });
</script>
</body>
</html>