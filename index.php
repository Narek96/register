<?php
include ('errorCheck.php');
include ('static-data.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="refresh.js"></script>
    <script src="jquery.js"></script>
    <script src="registor.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="registor.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class='' id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" class='<?php echo isset($_SESSION['is_registering']) && $_SESSION['is_registering'] ? "active" : ""?>' id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="auth\login.php"
                                  method="post"
                                  role="form"
                                  style="<?php echo !isset($_SESSION['is_registering']) ? 'display: block;' : 'display: none;'?>">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" action="auth\registor.php"
                                  method="post" role="form"
                                  style="<?php echo isset($_SESSION['is_registering']) && $_SESSION['is_registering'] ? 'display: block;' : 'display: none;'?>">
                                <div class="form-group">
                                    <input type="text" name="firstName" id="firstName" tabindex="1" class="form-control" placeholder="FirstName" value="">
                                    <span style="font-size: 12px;color: red;padding: 2px; "><?php echo error('firstName'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastName" id="lastName" tabindex="1" class="form-control" placeholder="LastName" value="">
                                    <span style="font-size: 12px;color: red;padding: 2px; "><?php echo error('lastName'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    <span style="font-size: 12px;color: red;padding: 2px; "><?php echo error('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    <span style="font-size: 12px;color: red;padding: 2px; "><?php echo error('confirm_password'); ?></span>
                                </div>
                                <div class="form-group select-group" style="display: inline-flex;">
                                    <select aria-label="Day" title="Day" name="birthday_day" id="bay">
                                        <option value="">Days</option>
                                        <?php
                                            for($i = 0; $i <= 31; $i++ ) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <select aria-label="Month" title="Month" name="birthday_month" id="bay">
                                        <option value="">Month</option>
                                        <?php
                                            foreach($months as $key => $value):
                                                $newKey = $key + 1;
                                                echo '<option value="'. $newKey .'">'.$value.'</option>';
                                            endforeach;
                                        ?>
                                    </select>
                                    <select aria-label="Year" title="Year" name="birthday_year" id="Year">
                                        <option value="">Year</option>
                                        <?php
                                            for($i = 1907; $i <= 2017; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit"  name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
session_unset();
session_destroy();
?>
</body>

</html>