<div class="main">
<form style="margin:0; width:80%;" class="form-regular form-center" action="_add-user-process.php" method="post">
<h1>Add user</h1>
<label for="Name">Name</label>
    <input id="Name" 
            name="name"
            type="text" 
            maxlength="128" 
            aria-label="Name" 
            placeholder="Name"
            required>

    <label for="email">Email</label>
    <input id="email" 
     name="email"
            type="email" 
            maxlength="128" 
            aria-label="E-mail" 
            placeholder="E-mail"
            required>
    
    <label for="password">Password</label>
    <input id="password" 
            name="password"

            type="text" 
            maxlength="255" 
            aria-label="Password" 
            placeholder="Password"
            required>
   
    <label for="is_admin">Is admin</label>
    <input id="is_admin" 
            name="is_admin"
            type="checkbox" 
            >
    <label for="is_active">Is active</label>
    <input id="is_active" 
            name="is_active"
            type="checkbox" 
            checked>
            
    <button type="submit">Create user</button>        
    
</form>
</div>