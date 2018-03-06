<?php include ROOT . '/views/layout/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                
                    <div class="signup-form"><!--sign up form-->
                        <h2>Створення нового курсу!</h2>
                        <form action="#" method="post" enctype="multipart/form-data">
                            Name: <input type="text" name="name" required="required" placeholder="Name" value="<?php echo $name; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="Створити" />
                        </form>
                    </div><!--/sign up form-->
              
                  <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layout/footer.php'; ?>