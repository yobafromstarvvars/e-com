<form id="signup-form" class="form-regular form-center" action="_signup-process.php" method="post">
<h1>Sign Up</h1>
<div class="d-flex flex-column">
        <label for="Name">Name</label>
            <input id="Name"
                    name="name"
                    type="text"
                    maxlength="128"
                    aria-label="Name"
                    placeholder="Name"
                    required>
</div>

<div class="d-flex flex-column">
    <label for="email">Email</label>
    <input id="email" 
    required name="email"
            type="email" 
            maxlength="128" 
            aria-label="E-mail" 
            placeholder="E-mail">
</div>


<div class="d-flex flex-column">    
    <label for="password">Password</label>
    <input id="password" 
            name="password"
            name="password"
            type="password" 
            maxlength="255" 
            aria-label="Password" 
            placeholder="Password"
            required>
</div>

<div class="d-flex flex-column">
            <label for="password_repeat">Repeat password</label>
    <input id="password_repeat" 
            name="password_repeat"
            type="password" 
            maxlength="255" 
            aria-label="Password" 
            placeholder="Repeat password"
            required>
</div>

    <button type="submit">Sign Up</button>        
    <a class="signin-button" href="<?php echo $gotoLogin; ?>">I have an account</a>
</form>