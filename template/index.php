<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intetics</title>
</head>
<body>
    <h1>Intetics Test Task</h1>

    <form action="/App/Service/upload.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="story">Tell us your story:</label>
        </p>
        <textarea id="story" name="story" rows="10" cols="50">
            <?php
                if(isset($_SESSION['id'])) {
                    echo $this->data['data']->getContent();
                } else {
                   echo 'You can enter here anything you want.';
                }
            ?>
        </textarea>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
        <p>
            <button type="submit">Send</button>
        </p>
    </form>

</body>
</html>