

<form id="login-form" class="form-regular form-center" method="post">
        <h1>Log in</h1>
        <?php if ($is_invalid): ?>
                <p><em>Invalid login</em></p>
        <?php endif; ?>
        <div class="d-flex flex-column">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" maxlength="128" aria-label="E-mail" placeholder="E-mail"
                        value="<?= htmlspecialchars($user["gmail"] ?? '') ?>">
        </div>

        <div class="d-flex flex-column">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" maxlength="255" aria-label="Password"
                        placeholder="Password">
        </div>

        <button type="submit">Log in</button>
        <a class="" href="<?php echo $gotoSignUp; ?>">Create account</a>
</form>