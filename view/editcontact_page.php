<center>
    <?php while ($row = mysqli_fetch_array($this->db_data)): ?>
        <form method="POST" action="<?php echo $_SESSION['base_url'] . 'ContactController/update_contact/' . $row['id'] ?>">
            <input type="text" name="name" class="input_text" value="<?php echo $row['name']; ?>"></br>
            <input type="text" name="phone_number" id="phone_number" class="input_text" value="<?php echo $row['phone_number']; ?>"></br>
            <input type="text" name="address" class="input_text" value="<?php echo $row['address']; ?>"></br>
            </br>
            </br>
            <input type="submit" class="submit_button" value="Update Contact">
        </form>
    <?php endwhile; ?>
</center>