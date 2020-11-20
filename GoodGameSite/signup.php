<?php
include_once 'include/header.php';
?>
   <div class="main-wrapper">
        
        <form class="signup-form" action="include/signupScript.php" method="POST">
            <table class="signup-table">
                <th colspan="2" ><h3>SIGN UP</h3></th>
                <tr>
                    <td>
                        First name:
                    </td>
                    <td>
                        <input type="text" name="firstname" placeholder="First name">
                    </td>
                </tr>
                  <tr>
                    <td>
                        Last name:
                    </td>
                    <td>
                        <input type="text" name="lastname" placeholder="Last name">
                    </td>
                </tr>
                  <tr>
                    <td>
                        E-mail:
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="E-mail">
                    </td>
                </tr>
                  <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>
                  <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>
                  <tr>
                      <td colspan="2" align="center">
                        <button type="submit" name="submit">Sign up</button>
                    </td>
                </tr>
            </table>
        </form>
    </div> 
<?php
include_once 'include/footer.php';
?>


