<center>
    <form method="POST" action="<?php echo $_SESSION['base_url'] . 'UserController/add_user' ?>">
        <input type="text" class="input_text" name='username' id='username' placeholder="Username"></br>
        <input type="password" class="input_text" name='password' id='password' placeholder="Password"></br>
        <input type="text" class="input_text" name='first_name' id='first_name' placeholder="First name"></br>
        <input type="text" class="input_text" name='last_name' id='last_name' placeholder="Last name"></br>
        <input type="text" class="input_text" name='phone_number' id='phone_number' placeholder="Phone number"></br>
        <input type="text" class="input_text" name='address' id='address' placeholder="Address"></br>
        <select name='type' id='type' class="input_text">
            <option value='user'>User</option>
            <option value='admin'>Admin</option>
        </select>
        </br>
        </br>
        <input type="submit" class="submit_button" value="Add User">
    </form>
</center>