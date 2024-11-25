<?php

include "db.php";

$sql = "SELECT * FROM clients";
$result = mysqli_query($con, $sql) or die("Query Failed");

$output = "";

if (mysqli_num_rows($result) > 0) {

    $output = '<div class="table-responsive">
            <table id="contactsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Phone</th>
                        <th>Number</th>
                        <th>Joining</th>
                        <th>Company </th>
                        <th>Status</th>
                        <th>Boardcast</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>{$i}</td>
        <td>" . htmlspecialchars($row['name']) . "</td>
        <td>" . htmlspecialchars($row['email']) . "</td>
        <td>" . htmlspecialchars($row['contact']) . "</td>
        <td>" . htmlspecialchars($row['cellPhone']) . "</td>
        <td>" . htmlspecialchars($row['cellNumber']) . "</td>
        <td>" . htmlspecialchars($row['joining']) . "</td>
        <td>" . htmlspecialchars($row['companyName']) . "</td>
        <td>" . htmlspecialchars($row['clientStatus']) . "</td>
        <td>" . htmlspecialchars($row['clientBoardcast']) . "</td>
        <td>
            <button class='btn  btn-sm mx-2 edit-btn' data-eid='{$row['id']}'><i class='fa-regular fa-pen-to-square'></i></button>
        </td>
        <td>
            <button class='delete-btn btn  btn-sm' data-id='{$row['id']}'><i class='fa-solid fa-delete-left' ></i></button>
        </td>
    </tr>";
        $i++;
    }

    $output .= '</tbody></table></div>';
    echo $output;
} else {
    echo "<h2>No Record Found</h2>";
}
