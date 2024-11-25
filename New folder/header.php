<?php include 'db.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNT ERP</title>
    <!-- Bootstrap CSS -->
 
    <!-- Font Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include necessary CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/hzghkgg7yf9c4ws2o7bpebhlpb6q43j42yhe0w6jn9s46ayl/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#emailBody',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
    </script>
    <style>
    .navbar-custom {
        background-color: black;
    }

    .navbar-custom .navbar-nav .nav-link {
        color: white;
    }

    .navbar-custom .navbar-nav .nav-link:hover {
        color: gray;
    }

    .horizontal-div {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: gray;
        padding: 10px 0;
        white-space: nowrap;
        z-index: 1000;
        /* Ensure it stays on top */
    }

    .horizontal-div a {
        display: inline-block;
        background-color: gray;
        color: white;
        padding: 10px;
        margin: 5px;
        text-align: center;
        border: 2px solid black;
        border-radius: 5px;
        text-decoration: none;
        position: relative;
    }

    .horizontal-div a:hover {
        background-color: darkgray;
    }

    .arrow-down {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid black;
        position: absolute;
        top: -17px;
        left: 50%;
        transform: translateX(-50%);
    }

    .nav-item {
        position: relative;
    }

    .nav-link.active {
        background-color: gray;
        color: white !important;
    }

    .dropdown-menu {
        z-index: 1001;
        /* Ensure it stays on top of the horizontal-div */
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#" style="color:white;">PNT Global</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="navbar-items">
                <!-- JavaScript will populate navbar items here -->
            </ul>
        </div>
    </nav>
    <br><br>