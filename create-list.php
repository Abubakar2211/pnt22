<?php 
include 'header.php';

// Fetch categories and sub-categories from the database
$query = "SELECT DISTINCT `category`, `sub-category` FROM `contacts`";
$result = mysqli_query($con, $query);

$categories = [];
$sub_categories = [];

while ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row['category']) && !in_array($row['category'], $categories)) {
        $categories[] = $row['category'];
    }
    if (!empty($row['sub-category']) && !in_array($row['sub-category'], $sub_categories)) {
        $sub_categories[] = $row['sub-category'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $country = mysqli_real_escape_string($con, $_POST["country"]);
    $category = mysqli_real_escape_string($con, $_POST["category"]);
    $quantity = intval($_POST["quantity"]);
    $list_emails = ''; // empty string
    $status = 'no-record';

    $sql = "INSERT INTO `lists`(`list-name`, `quantity`, `country`, `category`, `list-emails`, `status`) 
            VALUES ('$name', '$quantity', '$country', '$category', '$list_emails', '$status')";

    if ($con->query($sql) === TRUE) {
        $last_id = $con->insert_id;
        header("Location: select-contact.php?list_id=$last_id&quantity=$quantity&category=$category&country=$country");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>List</h2>
    </div>

    <div class="form-container">
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="country">Country:</label>
                    <select class="form-control" id="country" name="country" >
                        <option value="">Select Country</option>
                        <!-- Options will be dynamically added here -->
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category" >
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="quantity">Quantity:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-outline-secondary" id="decrement">-</button>
                        </div>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="increment">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Fetch country data from REST Countries API
        $.ajax({
            url: 'https://restcountries.com/v3.1/all',
            dataType: 'json',
            success: function(data) {
                // Populate the country dropdown with fetched data
                data.forEach(function(country) {
                    $('#country').append(`<option value="${country.name.common}">${country.name.common}</option>`);
                });
            },
            error: function() {
                console.log('Error fetching country data');
            }
        });

        // Increment quantity
        $('#increment').click(function() {
            let quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        // Decrement quantity
        $('#decrement').click(function() {
            let quantity = parseInt($('#quantity').val());
            if (quantity > 1) {
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>

<?php
include 'footer.php';
?>
