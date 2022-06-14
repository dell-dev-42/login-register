<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Comments</title>
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

    <div class="comments-container">
        <form action="/comment/save" method="post">
            <div class="col-2">
                <select class="form-control" name="politic">
                    <?php foreach ($politics as $politic) { ?>
                        <option value="<?php echo  $politic['id']; ?>" <?php if ($politic_id === $politic['id']) { ?> selected <?php } ?>><?php echo $politic['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="comment-box col-2">
                <textarea class="form-control" name="comment" cols="15" rows="2"></textarea>
            </div>
            <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Comment">
        </form>
    </div>
    <div>
        <h3>
            <?php
            function displayComments($parent_id = 0, $commentModel, $politics)
            { ?>
                <div style="margin-left: <?php echo $parent_id * 25 ?>px;">
                    <h3>
                        <?php foreach ($commentModel->getParentComments($parent_id) as $commentChild) { ?>
                            <h3>Author: <?php echo $commentChild['politic_name']; ?></h3>
                            <span>
                                <?php echo $commentChild['comment']; ?>
                            </span>
                            <div class="comment-container">
                                <form action="/comment/save" method="post">
                                    <div class="col-2">
                                        <select class="form-control" name="politic">
                                            <?php foreach ($politics as $politic) { ?>
                                                <option value="<?php echo  $politic['id']; ?>"><?php echo $politic['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="comment-box col-2">
                                        <textarea class="form-control" name="comment" cols="15" rows="1"></textarea>
                                    </div>
                                    <input type="hidden" name="parent_id" value="<?php echo $commentChild['id']; ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" name="save_comment" value="Comment">
                                </form>
                            </div>

                            <?php displayComments($commentChild['id'], $commentModel, $politics); ?>
                        <?php } ?>
                    </h3>
                </div>
            <?php }

            displayComments(0, $commentModel, $politics);
            ?>
        </h3>
    </div>
</body>

</html>