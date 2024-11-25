<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $sub_category = mysqli_real_escape_string($con, $_POST['sub_category']);

    $category_query = "SELECT id FROM category WHERE category = '$category'";
    $category_result = mysqli_query($con, $category_query);

    $subCategoryCheck = "SELECT * FROM sub_category WHERE sub_category = '$sub_category'";
    $result = mysqli_query($con, $subCategoryCheck);

    if (mysqli_num_rows($result) > 0) {
        echo "This sub category is already registered.";
    } else {

        if (mysqli_num_rows($category_result) > 0) {
            $category_row = mysqli_fetch_assoc($category_result);
            $category_id = $category_row['id'];

            $query = "INSERT INTO sub_category (sub_category, category_id) VALUES ('$sub_category', '$category_id')";
            if (mysqli_query($con, $query)) {
                echo "Sub-category added successfully.";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error: Type not found.";
        }
    }
}
