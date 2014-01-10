<center>
    <form method="POST" id='add_contact_form' action="<?php echo $_SESSION['base_url'] . 'ContactController/addcontact' ?>">
        <input type="text" name="name" id='' class="input_text" placeholder="Name"></br>
        <input type="text" name="phone_number" id='phone_number' class="input_text" placeholder="Phone Number"></br>
        <input type="text" name="address" id='address' class="input_text" placeholder="Address"></br>
        </br>
        </br>
        <input type="submit" class="submit_button" value="Add Contact">
    </form>
</center>