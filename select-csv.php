<?php

include 'header.php';


?>


<div class="container">
        <h1 class="my-4">Upload CSV File</h1>
        <form action="process_csv.php" method="post" enctype="multipart/form-data">
            <div class="file-upload" onclick="document.getElementById('csv_file').click();">
                <input type="file" name="csv_file" id="csv_file" accept=".csv" style="display: none;" required>
                <span id="file-name">Drag & drop or click to select file</span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>
    <style>
        .file-upload {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }
        .file-upload:hover {
            background-color: #f8f8f8;
        }
    </style>
    <script>
        document.getElementById('csv_file').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.getElementById('file-name').innerText = fileName;
        });
    </script>

<?php include 'footer.php';?>
