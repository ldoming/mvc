<center>
    Hello <?php echo isset($_SESSION['first_name']) ? '<span id="name_header">' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</span> (' . $_SESSION['type'] . ')' : null ?> 
    |
    <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/viewprofile_page' ?>">Profiles</a>
    |
    <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/viewcontacts_page' ?>">Contacts</a>
    |
    <a href="<?php echo $_SESSION['base_url'] . 'LoginLogoutController/logout' ?>">Logout</a>
    |
</center>
</br></br>

