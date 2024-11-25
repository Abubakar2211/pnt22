<?php
include "db.php";

$sql_type = "SELECT * FROM types";
$result_type = mysqli_query($con, $sql_type);

$sql_sub_types = "SELECT * FROM sub_types";
$result_sub_types = mysqli_query($con, $sql_sub_types);

$sql_status = "SELECT * FROM contacts_status";
$result_status = mysqli_query($con, $sql_status);
?>

<!-- Bulk Status Update -->
<div class="bulk-status-update mb-3">
    <select id="bulk-status-dropdown" class="form-control d-inline w-auto">
        <option value="" disabled selected>Choose Status</option>
        <?php while ($row = mysqli_fetch_assoc($result_status)) : ?>
        <option value="<?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></option>
        <?php endwhile; ?>
    </select>
    <button id="bulk-update-btn" class="btn btn-primary">Update Selected</button>
</div>

<!-- Dropdown Filters -->
<div class="row">
    <div class="mb-3 col-md-6">
        <label for="type" class="form-label">Type:</label>
        <select name="type" class="form-control" id="type">
            <option value="">Choose a type</option>
            <?php while ($row = mysqli_fetch_assoc($result_type)) : ?>
            <option value="<?= $row['id'] ?>"><?= $row['type'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3 col-md-6">
        <label for="sub_type" class="form-label">Sub Type:</label>
        <select name="sub_type" class="form-control" id="sub_type">
            <option value="">Choose a sub type</option>
            <!-- Subtype options will be loaded dynamically  sub type a kahan se-->
        </select>
    </div>
</div>
<!-- Table Placeholder -->
<div class="table-responsive" id="contactsTableContainer">
    <!-- Table data will be loaded here via AJAX -->
</div>

<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

// This hides my two tables. 

$(document).ready(function() {
    filterData();

    $('#type, #sub_type').change(function() {
        filterData();
    });
});

function filterData() {
    var type = $('#type').val();
    var sub_type = $('#sub_type').val();

    $.ajax({
        url: 'contacts-fetch-table.php',
        type: 'POST',
        data: {
            type: type,
            sub_type: sub_type
        },
        success: function(response) {
            $('#contactsTableContainer').html(response);

            if ($.fn.DataTable.isDataTable('#contactsTable')) {
                $('#contactsTable').DataTable().destroy();
            }
            $('#contactsTable').DataTable();
        }
    });
}


//It is checking my type and matching it to bring any subtype related to the type I have selected.

$(document).ready(function() {
    $('#type, #sub_type').change(function() {
        filterData();
    });
});
$('#type').change(function() {
    var typeId = $(this).val();
    if (typeId) {
        $.ajax({
            url: 'get-subtypes.php',
            type: 'POST',
            data: {
                type_id: typeId
            }, // Send selected type_id
            success: function(response) {

                $('#sub_type').html(response);
            }
        });
    } else {
        $('#sub_type').html('<option value="">Choose a sub type</option>');
    }
});

// Update Modal change the type and sub_types

$(document).on("change", "#type", function() {
    var typeId = $(this).val(); 

    if (typeId) {
        $.ajax({
            url: "get_sub_types.php", 
            type: "POST",
            data: { type_id: typeId },
            dataType: "json",
            success: function(data) {
                var subTypeDropdown = $("#sub_type");
                subTypeDropdown.empty(); 
                subTypeDropdown.append("<option value=''>Choose a Sub Type</option>");

                $.each(data, function(index, subType) {
                    subTypeDropdown.append(
                        "<option value='" + subType.id + "'>" + subType.sub_type + "</option>"
                    );
                });
            },
        });
    } else {
        $("#sub_type").empty().append("<option value=''>Choose a Sub Type</option>");
    }
});

</script>
<?php
include("footer.php");
?>