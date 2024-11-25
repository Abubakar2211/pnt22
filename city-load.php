<?php

include "db.php";

$sql = "SELECT country.country, city.city, city.id 
        FROM city 
        INNER JOIN country ON country.id = city.country_id";
$result = mysqli_query($con, $sql) or die("Query Failed");

$output = "";

if (mysqli_num_rows($result) > 0) {

    $output = '<div class="table-responsive">
            <table id="typesTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>{$i}</td>
        <td>" . htmlspecialchars($row['country']) . "</td>
        <td>" . htmlspecialchars($row['city']) . "</td>
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
