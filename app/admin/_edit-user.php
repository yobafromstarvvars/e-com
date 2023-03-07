<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_edit-user-process.php" method="post">
<h1>Edit user "<?=$user["name"]?>"</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required
            value="<?= htmlspecialchars($user["name"]) ?>">

    <label for="email">Email</label>
    <input id="email" 
     name="email"
            type="email" 
            maxlength="128" 
            aria-label="E-mail" 
            placeholder="E-mail"
            required
            value="<?= htmlspecialchars($user["email"]) ?>">
    
    <label for="password">Password</label>
    <input id="password" 
            name="password"

            type="text" 
            maxlength="255" 
            aria-label="Password" 
            placeholder="Password"
            >
   
    <label for="is_admin">Is admin</label>
    <input id="is_admin" 
            name="is_admin"
            type="checkbox" 
            <?php if($user["is_admin"]==1)echo "checked"?>>
    <label for="is_active">Is active</label>
    <input id="is_active" 
            name="is_active"
            type="checkbox" 
            <?php if($user["is_active"]==1)echo "checked"?>>
    
    <input type="hidden" name="id" value="<?=$_POST['id']?>">
    <button type="submit">Edit user</button>        
    
</form>
</div>