<?php

include "db.php";

$sql = "SELECT types.type, sub_types.sub_type, sub_types.id 
        FROM sub_types 
        INNER JOIN types ON types.id = sub_types.type_id";
$result = mysqli_query($con, $sql) or die("Query Failed");

$output = "";

if (mysqli_num_rows($result) > 0) {

    $output = '<div class="table-responsive">
            <table id="typesTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Type</th>
                        <th>Sub Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>{$i}</td>
        <td>" . htmlspecialchars($row['type']) . "</td>
        <td>" . htmlspecialchars($row['sub_type']) . "</td>
        <td>
            <button class='btn btn-sm mx-2 edit-btn' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
        </td>
        <td>
            <button class='delete-btn btn btn-sm' data-id='{$row['id']}'><i class='fa-solid fa-delete-left'></i></button>
        </td>
    </tr>";
        $i++;
    }

    $output .= '</tbody></table></div>';
    echo $output;
} else {
    echo "<h2>No Record Found</h2>";
}

?>
