<?php ob_start(); ?>
<?php include_once"database.php" ?>
<?php include_once"layout/header.php" ?>

    <!-- Navigation -->
    <?php include_once"layout/navigation.php" ?>

    <?php 
        if(isset($_POST['submit'])){
            $to = "ghisasuke2019@gmail.com";
            $email = $_POST['email'];
            $subject = wordwrap($_POST['subject']),70;
            $body = $_POST['body'];

            mail($to, $subject, $body,$email);
        }
     ?>
       
            
    <!-- Page Content -->
    <div class="container">

        <div class="row">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact US</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required="">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="key" class="form-control" placeholder="About Subject title " required="">
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="" class="form-control" cols="30" rows="10" placeholder="What you want to say us">Keep Going I like you are site</textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="send" required="">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        </div>
        <!-- /.row -->

        <hr>

    <?php include_once"layout/footer.php" ?>