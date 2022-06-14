<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="/user/check" method="post">
            <div class="col-sm-3">
                <label>email</label><br>
                <input name="email" class="form-control" type="text" placeholder="email"><br>
                <label>password</label><br>
                <input name="password" class="form-control" type="password" placeholder="password"><br>
            </div>
            <div class="btn">
                <input type="submit" class="btn btn-primary btn-sm" value="Confirm" />
            </div>
            <div class="btn">
                <a href="/register" class="btn btn-primary btn-sm">Register</a>
            </div>
        </form>
    </div>
</body>

</html>