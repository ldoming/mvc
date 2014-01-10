<center>
    <h1>Log in Page</h1>
    <form method="POST" action="<?php echo $_SESSION['base_url'].'LoginLogoutController/login'?>">
        <input type="text" name='username' id='username' class="input_text" placeholder="Username"/></br>
        <input type="password" name='password' id='password' class="input_text" placeholder="Password"/>
        </br>
        </br>
        <a href="<?php echo $_SESSION['base_url'] . 'LoginLogoutController/profileregister_page' ?>" style="font-weight: normal;">Register</a>
        &nbsp;|&nbsp;
        <input type="submit"  class="submit_button" value="Login">
    </form>
</center>


