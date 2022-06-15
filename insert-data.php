
<?php
function insertData($conn, $u_name, $u_email, $password)
{
    $u_name = trim(mysqli_real_escape_string($conn, htmlspecialchars($u_name)));
    $u_email = trim(mysqli_real_escape_string($conn, htmlspecialchars($u_email)));
    $password = trim(mysqli_real_escape_string($conn, htmlspecialchars($password)));

    // IF NAME OR EMAIL IS EMPTY
    if (empty($u_name) || empty($u_email ) || empty($password)) {
        return 'Please fill all required fields.';
    }
    //IF EMAIL IS NOT VALID
    elseif (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email address.';
    } else {
        $check_email = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '$u_email'");
        // IF THE EMAIL IS ALREADY IN USE
        if (mysqli_num_rows($check_email) > 0) {
            return 'This email is already registered. Please try another.';
        }

        // INSERTING THE USER DATA
        $query = mysqli_query($conn, "INSERT INTO `users`(`name`,`email`,`password`) VALUES('$u_name','$u_email', $password)");
        // IF USER INSERTED
        if ($query) {
            return true;
        }
        return 'Opps something is going wrong!';
    }
}