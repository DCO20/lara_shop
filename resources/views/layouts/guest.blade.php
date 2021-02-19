<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/auth.css">
    
    <title>LaraShop</title>

    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contact">
        <div class="container">
                    <div class="row ">
                        <div class="col-6 ">
                            <p>
                                <i class="fas fa-envelope-open"></i> larashop@larashop.com  |
                                <i class="fas fa-mobile-alt"> 4444-0000</i>
                            </p>
                        </div>
                        <div class="col-6 text-end mtop8">
                            <a href=""><i class="fab fa-facebook-square"></i></a>
                            <a href=""><i class="fab fa-instagram-square"></i></a>
                            <a href=""><i class="fab fa-twitter-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            {{$slot}}

        <div class="footer mtop8">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-3 text-center">
                        <p> &copy; Todos os direitos reservados. <?= date('Y')?></p>
                    </div>
                </div>
                </div>
            </div>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
    </html>