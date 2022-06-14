<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Table Result</title>
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



    <table class="table" align="center" border="1">
        <tr>
            <th></th>
            <?php foreach ($weapons as $weapon) { ?>
                <th><?php echo $weapon['name']; ?></th>
            <?php } ?>
        </tr>

        <?php foreach ($countries as $country) { ?>
            <tr>
                <td><?php echo $country['name']; ?></td>
                <?php foreach ($weapons as $weapon) { ?>
                    <td>
                        <?php
                        $chislo = 0;

                        foreach ($results as $result) {
                            if (isset($result[$country['name']][$weapon['name']])) {
                                $chislo += (int) $result[$country['name']][$weapon['name']];
                            }
                        } ?>
                        <?php echo $chislo . '%'; ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>

</html>