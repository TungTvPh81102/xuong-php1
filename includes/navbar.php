<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="login.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Enter email id">
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="login" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Comment System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['auth_user_id'])) {

                        echo '  <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</a>';
                    } else {
                        echo '  <a class="nav-link" href="logout.php">Logout</a>';
                    }
                    ?>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h4><?= $_SESSION['auth_name'] ?? "" ?></h4>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>