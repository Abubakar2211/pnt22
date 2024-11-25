<!doctype html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }
    main {
        flex: 1;
    }
</style>
<body>
    <!-- Navbar -->


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">My Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="types.php">Type</a></li>
                    <li class="nav-item"><a class="nav-link" href="team.php">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="suppliers.php">Suppliers</a></li>
                    <li class="nav-item"><a class="nav-link" href="sub-types.php">Sub-Types</a></li>
                    <li class="nav-item"><a class="nav-link" href="sub-category.php">Sub-Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="country.php">Country</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="city.php">City</a></li>
                    <li class="nav-item"><a class="nav-link" href="category.php">Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="religion.php">Religion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5 ">
        <div class="row">
            <div class="col-md-3 mb-4">
                <a href="types.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Type</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="team.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Team</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="suppliers.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Suppliers</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="sub-types.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Sub-Types</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="sub-category.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Sub-Category</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="country.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Country</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="contacts.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Contacts</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="clients.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Clients</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="city.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">City</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="category.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Category</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="religion.php" class="text-decoration-none">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">Religion</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        <p class="mb-0">&copy; 2024 My Dashboard</p>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
