<?php include ROOT . '/views/layout/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-5 col-sm-offset-4 padding-right">
                
                <?php if (isset($errors) && is_array($errors)){ ?>
                    <ul>
                        <?php foreach ($errors as $error){ ?>
                            <li> - <?php echo $error; ?></li>
                        <?php }  ?>
                    </ul>
                <?php } ?>   

                <div class="signup-form"><!--sign up form-->
                    <?php if( $type !="bad"){ ?>
                        <h2>Edit course <b><?php echo $course[0]['name']; ?></b></h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p>Name:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $course[0]['name']; ?>"/>
                            <p><img style="width: 20%" src="/images/courses.jpg"</p>
                            <input type="submit" name="submit" class="btn btn-default" value="Редактировать" />
                        </form>
                    <?php } else {
                        echo "<h1>There is no such course!!!</h1>";  
                    }?>
                </div><!--/sign up form-->
             
                <h3><a href="/courses/<?php echo $course[0]['url']; ?>">Go back to course</a></h3>
                <br/>
                <br/>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layout/footer.php'; ?>