<?php
include "db.php";

// Get type and sub_type from the POST request
$type = isset($_POST['type']) ? $_POST['type'] : '';
$sub_type = isset($_POST['sub_type']) ? $_POST['sub_type'] : '';

// Prepare SQL with type and sub_type filtering
$sql = "SELECT * FROM contacts WHERE 1=1";

// Filter by type if selected
if (!empty($type)) {
    $sql .= " AND type = '" . mysqli_real_escape_string($con, $type) . "'";
}

// Filter by sub_type if selected (no validation, directly using sub_type as string)
if (!empty($sub_type)) {
    $sql .= " AND sub_type = '" . mysqli_real_escape_string($con, $sub_type) . "'";
}


// Execute the query
$result = mysqli_query($con, $sql) or die("Query Failed: " . mysqli_error($con));

// print $sub_type;
echo "<script>console.log('PHP says: " . $sub_type . "');</script>";
// Generate the output
$output = '<table id="contactsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.s</th>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Cell Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

// Populate the table with data
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td><input type='checkbox' class='record-checkbox' value='" . $row['id'] . "'></td>
            <td>{$i}</td>
            <td>" . htmlspecialchars($row['first_name']) . "</td>
            <td>" . htmlspecialchars($row['cell_number']) . "</td>
            <td>" . htmlspecialchars($row['email_id']) . "</td>";

        // Generate the status dropdown
        $status_query = "SELECT * FROM contacts_status";
        $status_result = mysqli_query($con, $status_query);

        $output .= "<td>
            <select name='status' class='status-dropdown form-control' data-id='{$row['id']}'>";

        while ($status_row = mysqli_fetch_assoc($status_result)) {
            $selected = ($row['status'] == $status_row['status']) ? 'selected' : '';
            $output .= "<option value='" . htmlspecialchars($status_row['status']) . "' $selected>" . htmlspecialchars($status_row['status']) . "</option>";
        }

        $output .= "</select>
        </td>";

        // Add action buttons
        $output .= "<td class='d-flex justify-content-around'>
            <button class='edit-btn btn btn-sm' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
            <button class='delete-btn btn btn-sm' data-id='{$row['id']}'><i class='fa-solid fa-delete-left'></i></button>
        </td>
        </tr>";

        $i++;
    }
} else {
    $output .= "<tr><td colspan='7'>No Record Found</td></tr>";
}

$output .= '</tbody></table>';
echo $output;
?>
