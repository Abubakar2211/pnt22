<?php
session_start();
include 'header.php';

$csvData = $_SESSION['csv_data'] ?? [];
$formType = $_GET['formType'] ?? 'add_contact'; // Determine the form type

// Define fields with user-friendly names
$fields = ($formType === 'client') ? 
    [
        'name' => 'Name',
        'email' => 'Email',
        'contact' => 'Contact',
        'cellPhone' => 'Cell Phone',
        'cellNumber' => 'Cell Number',
        'joining' => 'Joining Date',
        'companyName' => 'Company Name',
        'clientStatus' => 'Client Status',
        'clientBoardcast' => 'Client Boardcast'
    ] : 
    [
        'type' => 'Type',
        'sub_type' => 'Sub Type',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'designation' => 'Designation',
        'email_id' => 'Email ID',
        'cell_number' => 'Cell Number',
        'phone_number' => 'Phone Number',
        'company_name' => 'Company Name',
        'category' => 'Category',
        'sub_category' => 'Sub Category',
        'website' => 'Website',
        'country' => 'Country',
        'city' => 'City',
        'D_O_B' => 'Date of Birth',
        'religion' => 'Religion',
        'facebook' => 'Facebook',
        'status' => 'Status'
    ];

if (empty($csvData)) {
    echo "No CSV data found.";
    exit;
}
?>

<div class="container">
    <h1 class="my-4">Map CSV Data - <?php echo ucfirst($formType); ?></h1>
    <form action="insert_data.php" method="post">
        <div class="row">
            <?php foreach ($csvData[0] as $index => $column): ?>
                <div class="col-md-4">
                    <div class="box border border-2 p-3 my-2">
                        <select class="form-control" name="mapping[<?php echo $index; ?>]" id="column_<?php echo $index; ?>">
                            <option value="">Select field</option>
                            <?php foreach ($fields as $dbField => $friendlyName): ?>
                                <option value="<?php echo $dbField; ?>"><?php echo $friendlyName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="border border-1 my-2 p-2">
                            <?php foreach ($csvData as $rowIndex => $row): ?>
                                <?php if ($rowIndex > 0): // Skip header row ?>
                                    <div><?php echo htmlspecialchars($row[$index]); ?> <hr class="my-1"></div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary my-4">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>
