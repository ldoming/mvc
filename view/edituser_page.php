<center>
    <?php while ($row = mysqli_fetch_array($this->db_data)): ?>
        <form method="POST" action="<?php echo $_SESSION['base_url'] . 'UserController/update_user/' . $row['id'] ?>">
            <input type="text" class="input_text" name='username' value="<?php echo $row['username'] ?>"/></br>
            <input type="text" class="input_text" name='first_name' value="<?php echo $row['first_name'] ?>"/></br>
            <input type="text" class="input_text" name='last_name' value="<?php echo $row['last_name'] ?>"/></br>
            <input type="text" class="input_text" name='phone_number' id='phone_number' value="<?php echo $row['phone_number'] ?>"/></br>
            <input type="text" class="input_text" name='address' value="<?php echo $row['address'] ?>"/></br>
            <select name='type' class="input_text">
                <option value='user' <?php echo $row['type'] == 'admin' ? 'selected="selected"' : null ?> >User</option>
                <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'Administrator') : ?>
                    <option value='admin' <?php echo $row['type'] == 'admin' ? 'selected="selected"' : null ?> >Admin</option>
                <?php endif; ?>
            </select>
            </br>
            </br>
            <input type="submit" class="submit_button" value="Update User">
        </form>
    <?php endwhile; ?>
</center>