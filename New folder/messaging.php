<?php
include 'header.php';
include 'db.php'; // Include your database connection file

// Function to parse list-emails data and return array of email addresses
function parseEmails($emails) {
    $emails = trim($emails); // Remove any leading/trailing whitespace
    if (strpos($emails, '[') === 0) {
        // JSON format
        $emails = json_decode($emails, true);
        return $emails ?: [];
    } elseif (strpos($emails, ',') !== false) {
        // Comma-separated format
        $emails = explode(',', $emails);
        return array_map('trim', $emails);
    } else {
        // Single email format
        return [$emails];
    }
}

// Fetch all lists from database for initial population
$query = "SELECT id, `list-name`, `list-emails` FROM lists";
$result = mysqli_query($con, $query);

// Create an array to store all lists and their emails
$lists = [];
while ($row = mysqli_fetch_assoc($result)) {
    $lists[$row['id']] = [
        'name' => $row['list-name'],
        'emails' => parseEmails($row['list-emails'])
    ];
}
?>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/hzghkgg7yf9c4ws2o7bpebhlpb6q43j42yhe0w6jn9s46ayl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#emailBody',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>

<div class="container">
    <h2 class="mt-5">Compose Email</h2>
    <form action="send_email.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="list_id">Select List:</label>
            <select class="form-control" id="list_id" name="list_id" required>
                <option value="" disabled selected>Select a list</option>
                <!-- Populate dropdown with list names from the database -->
                <?php foreach ($lists as $list_id => $list) : ?>
                    <option value="<?php echo $list_id; ?>" data-emails="<?php echo htmlspecialchars(json_encode($list['emails'])); ?>"><?php echo $list['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group" id="recipient_group" style="display: none;">
            <label for="recipient">Recipients:</label>
            <select class="form-control" id="recipient" name="recipient[]" multiple required>
                <!-- Recipients will be dynamically populated by JavaScript -->
            </select>
        </div>
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject" >
        </div>
        <div class="form-group">
            <label for="emailBody">Email Body:</label>
            <textarea class="form-control" id="emailBody" name="emailBody"></textarea>
        </div>
        <div class="form-group">
            <label for="attachment">Attachment:</label>
            <input type="file" class="form-control-file" id="attachment" name="attachment">
        </div>
        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>
</div>

<?php include 'footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var listSelect = document.getElementById('list_id');
    var recipientSelect = document.getElementById('recipient');
    var recipientGroup = document.getElementById('recipient_group');

    listSelect.addEventListener('change', function() {
        var selectedListId = this.value;
        var selectedOption = this.options[this.selectedIndex];
        var recipientEmails = JSON.parse(selectedOption.getAttribute('data-emails'));

        // Clear previous options
        recipientSelect.innerHTML = '';

        // Populate recipient select with emails
        recipientEmails.forEach(function(email) {
            var option = document.createElement('option');
            option.value = email;
            option.text = email;
            recipientSelect.appendChild(option);
        });

        // Show the recipient select group
        recipientGroup.style.display = 'block';
    });
});
</script>
