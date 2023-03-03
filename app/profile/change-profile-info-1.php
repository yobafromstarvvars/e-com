<?php
$mysqli = require DB_CONNECT;
$sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
?>

<form class="form-regular form-center" action="change-profile-info-process.php" method="post">
<h1>Change profile info</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            value = "<?= htmlspecialchars($user["name"])?>"
            required>

    <label for="email">Email</label>
    <input id="email" 
    required name="email"
            type="email" 
            maxlength="128" 
            aria-label="E-mail" 
            placeholder="E-mail"
            value = "<?= htmlspecialchars($user["email"])?>">
            
    <h1>Change password</h1>
    <label for="password">Password</label>
    <input id="password" 
            name="password"
            name="password"
            type="password" 
            maxlength="255" 
            aria-label="Password" 
            placeholder="Password">

            <label for="password_repeat">Repeat password</label>
    <input id="password_repeat" 
            name="password_repeat"
            type="password" 
            maxlength="255" 
            aria-label="Password" 
            placeholder="Repeat password">

    <button type="submit">Change profile info</button>        
</form>