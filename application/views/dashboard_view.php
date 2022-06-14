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

  <form action="/result/save" method="post">
    <div class="container">
      <div class="col-2">
        <select class="form-control mb-2" name=" country_id">
          <?php foreach ($countries as $country) { ?>
            <option value="<?php echo  $country['id']; ?>" <?php if ($countryId === $country['id']) { ?> selected <?php } ?>><?php echo $country['name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-2">
        <select class="form-control mb-2" name="weapon_id">
          <?php foreach ($weapons as $weapon) { ?>
            <option value="<?php echo  $weapon['id']; ?>" <?php if ($weaponId === $weapon['id']) { ?> selected <?php } ?>><?php echo $weapon['name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-2">
        <input class="form-control mb-2" type="number" name="amount">
      </div>
      <input type="hidden" name="user_email" value="<?php echo $email; ?>" />
      <div class="col-1">
        <input class="btn btn-primary mb-2" type="submit" name="submit" value="Submit">
      </div>
    </div>
    </div>
  </form>

</body>

</html>