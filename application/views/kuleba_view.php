<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container">
            <div class="col">
                <button class="btn btn-navbar"><a href="/user/logout">Logout</a></button>
                <button class="btn btn-navbar"><a href="/result">To The Table</a></button>
                <button class="btn btn-navbar"><a href="/kuleba">Became Kuleba</a></button>
                <button class="btn btn-navbar"><a href="/comment">Комментарии Мировых Пидеров</a></button>
                <div class="d-flex justify-content-end">
                    <?php echo $_SESSION['email'] ?>
                </div>
            </div>
        </div>
    </nav>

    <form action="/country/save" method="post">
        <div class="container">
            <div class="col-2 mb-1">
                <label>Country</label><br>
                <input type="text" class="form-control" name="country_name">
            </div>
            <input type="submit" class="btn btn-primary" name="saveCountry" value="Save Country">
        </div>
    </form>
    <form action="/weapon/save" method="post">
        <div class="container">
            <div class="col-2 mb-1">
                <label>Weapon</label><br>
                <input type="text" class="form-control" name="weapon_name">
            </div>
            <input type="submit" class="btn btn-primary" name="saveWeapon" value="Save Weapon">
        </div>
        </div>
    </form>

</body>

</html>