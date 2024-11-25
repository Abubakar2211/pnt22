<?php include 'header.php';

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
?> 

<div class="content container">
    <div class="list-header d-flex justify-content-between align-items-center my-4">
        <h2>Add New Contact</h2>
    </div>

    <div class="form-container">
        <form method="POST" action="insert-contact.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="firstName" >
                </div>
                <div class="form-group col-md-6">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lastName" >
                </div>
                <div class="form-group col-md-6">
                    <label for="cell">Cell:</label>
                    <input type="text" class="form-control" id="cell" name="cell" >
                </div>
                <div class="form-group col-md-6">
                    <label for="landline">Landline:</label>
                    <input type="text" class="form-control" id="landline" name="landline">
                </div>
                 <div class="form-group col-md-6">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category" >
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="sub-category">Sub Category:</label>
                    <select class="form-control" id="sub-category" name="sub-category" >
                        <option value="">Select Sub Category</option>
                        <?php foreach ($sub_categories as $sub_category): ?>
                            <option value="<?php echo htmlspecialchars($sub_category); ?>"><?php echo htmlspecialchars($sub_category); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="country">Country:</label>
                    <select class="form-control" id="country" name="country" >
                        <option value="">Select Country</option>
                        <!-- Options will be dynamically added here -->
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">Religion:</label>
                    <input type="text" class="form-control" id="religion" name="religion">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control" id="website" name="website">
                </div>
                <div class="form-group col-md-6">
                    <label for="designation">Designation:</label>
                    <input type="text" class="form-control" id="designation" name="designation">
                </div>
                <div class="form-group col-md-6">
                    <label for="companyName">Company Name:</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    });
</script>

<?php include 'footer.php'; ?>
