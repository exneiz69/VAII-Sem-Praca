<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Community</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="public/styles.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-custom navbar-expand-lg mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="?c=home"><i class="bi bi-controller me-1"></i>Game Community</a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="?c=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=screenshots">Screenshots</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=videos">Videos</a>
                </li>
                <?php if (\App\Authorization::isLogged()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=home&a=myAccount">My Account</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=home&a=registration">Sign-in</a>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="search" aria-label="Search">
                <button class="btn" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>
<?= $contentHTML ?>


