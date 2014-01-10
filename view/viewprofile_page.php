<center>

    <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/profileregister_page'; ?>">+ADD Profile</a>
    </br></br>
    <table id="profile_page"  cellspacing="0">
        <thead>
            <tr>
                <td>Username</td>
                <td>Password</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Phone number</td>
                <td>Address</td>
                <td>Type</td>
                <td>Date Created</td>
                <td>Data Last Updated</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($this->db_data)): ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td>*********</td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['created_datetime']; ?></td>
                    <td><?php echo $row['updated_datetime']; ?></td>
                    <td>
                        &nbsp;
                        <?php if ($_SESSION['id'] == $row['id'] && $_SESSION['type'] == 'User') { ?>
                            <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/edituser_page/' . $row['id'] ?>">Edit</a> 
                        <?php } else if ($_SESSION['type'] == 'Administrator') { ?>
                            <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/edituser_page/' . $row['id'] ?>">Edit</a> 
                            <?php if ($_SESSION['id'] != $row['id']): ?>
                                | 
                                <a href="<?php echo $_SESSION['base_url'] . 'UserController/delete_user/' . $row['id'] ?>">Delete</a>
                            <?php endif; ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</center>