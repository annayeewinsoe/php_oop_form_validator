<?php

require('validator.php');

if (isset($_POST['submit'])) {
    $validator = new Validator($_POST);
    $errors = $validator->validate_form();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Create a new user</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" 
                value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            <p class="error"><?php echo $errors['username'] ?? '' ?></p>

            <label for="email">Email:</label>
            <input type="text" name="email" 
                value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            <p class="error"><?php echo $errors['email'] ?? '' ?></p>

            <input type="submit" value="Create" name="submit">
        </form>
    </div>
</body>

</html>