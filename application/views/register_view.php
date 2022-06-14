<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <form action="/user/save" method="post">
            <div class="col-sm-3">
                <label>email</label><br>
                <input name="email" class="form-control" type="text" required placeholder="email"><br>
                <label>password</label><br>
                <input name="password" class="form-control" type="password" required placeholder="password"><br>
                <label>confirm password</label><br>
                <input name="confirm_password" class="form-control" type="password" required placeholder="confirm password"><br>
                <?php if ($error_messages) : ?>
                    <?php foreach ($error_messages as $error_message) : ?>
                        <p style="color:red;"><?= $error_message ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="btn">
            <br><input type="submit" class="btn btn-primary btn-sm" value="Registration" />
            </div>
        </form>
    </div>
</body>

</html>