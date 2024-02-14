<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0cec92e36b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/binocles/css/style.css">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">Бинокулюс</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Оплата и доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О компании</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    
    <main class="container py-3">
        <?= $content ?>
    </main>


    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 px-3 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 Бинокулюс, Inc</p>
    
            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-md-0 me-md-auto link-dark text-decoration-none">
            <i class="fa-solid fa-binoculars"></i>
            </a>
    
            <ul class="nav col-md-4 justify-content-center">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Каталог</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Акции</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Оплата и доставка</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Контакты</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">О компании</a></li>
            </ul>
        </footer>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>