        <?php include ROOT . '/views/layout/header.php'; ?>
     
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                           <div class="panel-group category-products">
                                <div class="search">
                                    <h4>Find what you need here</h4>

                                    <form action="/find/" method="post" >
                                      
                                        <input  type="text"  name="search" id="search" list="courses">
                                        <datalist id="courses">
                                            <?php  foreach ($coursesAll as  $value) {?>
                                                <option value="<?php echo $value['name']; ?>">
                                            <?php }  ?>
                                        </datalist>
                                        <input type="submit" value="Search">
                                      </form>
                                </div>
                           </div>

                            <div class="panel-group category-products">
                                <h2>Reccomends courses:</h2>
                                <?php foreach ($coursesList as $course): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/courses/<?php echo $course['url'];?>">
                                                    <?php echo $course['name'];?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        
                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Reccomends courses</h2>

                            <div class="slider"   >
                                <?php foreach ($coursesList as $course){
                                    ?>
                                    <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/images/courses.jpg">
                                                    <a href="/courses/<?php echo $course['url']; ?>" class="name_course">
                                                        <?php echo strtoupper($course['name']) . "&id = ". $course['id_c']; ?>
                                                    </a>
                                                 
                                                </div>
                                                

                                                <?php  if($admin){  ?>
                                                <p class="edit_delete" style="text-align: center;">
                                                    <span><a href="/course/edit/<?php echo $course['id_c']; ?>">Edit course</a></span>
                                                    <span><a href="/course/delete/<?php echo $course['id_c']; ?>">Delete course</a></span>
                                                </p>
                                                <?php }  ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <a class="left recommended-item-control" id="prev"> < </a>
                            <a class="right recommended-item-control" id="next"> > </a>

                        </div><!--/recommended_items-->
                        
                        <hr/>

                   
                    </div>
                </div>

            </div>
        </section>
        <script type="text/javascript">
                                
          

        </script>
       <?php  include ROOT. '/views/layout/footer.php'; // підключення моделі  ?>
    </body>
</html>