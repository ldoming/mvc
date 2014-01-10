<center>

    <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/contactregister_page'; ?>">+ADD Contact</a>
    </br></br>
    <table id="contact_page" cellspacing="0">
        <thead>
            <tr>
                <td>Name</td>
                <td>Phone Number</td>
                <td>Address</td>
                <td>Date Created</td>
                <td>Date Last Updated</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($this->db_data)): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['created_datetime']; ?></td>
                    <td><?php echo $row['updated_datetime']; ?></td>
                    <td>
                        &nbsp;
                        <?php if ($_SESSION['id'] == $row['user_id'] && $_SESSION['type'] == 'User') { ?>
                            <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/editcontact_page/' . $row['id'] ?>">Edit</a> 
                            | 
                            <a href="<?php echo $_SESSION['base_url'] . 'ContactController/delete_contact/' . $row['id'] ?>">Delete</a>
                        <?php } else if ($_SESSION['type'] == 'Administrator') { ?>
                            <a href="<?php echo $_SESSION['base_url'] . 'DisplaysController/editcontact_page/' . $row['id'] ?>">Edit</a> 
                            | 
                            <a href="<?php echo $_SESSION['base_url'] . 'ContactController/delete_contact/' . $row['id'] ?>">Delete</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</center>