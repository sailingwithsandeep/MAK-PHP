<?php
include "./config/config.php";


include './includes/header.php';?>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="POST" action="authenticate.php" >
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail"  name="username" id="username"" placeholder="Enter Username..." ></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password"  id="pwd" name="password"></div>
                                        <div class="form-group">
                                            
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" value="login" name="login">Login</button>
                                       
                                    </form>
                                    <br>
                                        <?php 
                                        if(isset($_REQUEST["err"]))
                                            $msg="Invalid username or Password";
                                        ?>
                                        <p style="color:red;">
                                        <?php if(isset($msg))
                                        {
                                            
                                        echo $msg;
                                        }
                                        ?>
                                        </p>
                                    <div class="text-center"><a href="./Surveyor/index.php">Surveyor Login</a></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


