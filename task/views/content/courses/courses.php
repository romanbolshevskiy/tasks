<?php   //include_once ROOT. '/components/Cart.php'; // підключення моделі 
        include ROOT . '/views/layout/header.php'; ?>
        
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right">
                        <div class="features_items"><!--features_items-->
                            <div class="courses">
                                <h3>All tasks</h3>
                                <p class="hid">Скрить отмеченние елементи</p>
                                <p class="del">Удалить отмеченние елементи</p>
                                <progress  style="width: 70%;" id="pro" value="2" max="4"></progress>
                                <?php
                                if(!$courses_list_menu){ echo "<h4>There are no information in this page</h4>";}
                                else { 
                                    foreach ($courses_list_menu as  $course){ 
                                        ?>
                                        <div class="c ind">  
                                            <input type="checkbox" name="<?php echo $course['id_c']; ?>">
                                            <form action="" method="post" style="display: inline-block;" id="editt_form" class="norm">
                                                <input type="hidden" name="id" placeholder="Имя" value="<?php echo $course['id_c']; ?>" style="padding: 13px;"/>
                                                <input  type="text" name="name" placeholder="Имя" value="<?php echo $course['name']; ?>" class="input1 course_click"/>
                                                <input type="submit" name="submit" class="submit btn btn-default" value="Сохранить" />
                                            </form>
                                            <p class="edit_delee">
                                                <span><a href="/course/delete/<?php echo $course['id_c']; ?>">Delete </a></span>
                                            </p>
                                          
                                        </div>
                                      

                                <?php }  }
                                echo "<div class='clear'>";
                                ?>
                                <div class="creation">
                                    <h4>Створити блок завдань</h4>
                                    <form action="#" method="post">
                                        <input type="text" name="name" required="required" placeholder="Добавити елемент" value="<?php echo $name; ?>"/>
                                        <input type="submit" name="submit" class="btn btn-default" value="Створити" />
                                    </form>
                                      
                                </div>
                            </div>
                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
                                
            $("#editt_form").submit(function() {
                $.ajax({
                    type: "POST",
                    url : "/course/modern/", //на іншу сторінку тому треба інший екшн створювати для того
                    data: $(this).serialize(),
                    error: function(data){
                        console.log("Error");
                    },
                    success: function(data){
                        console.log(data);
                        console.log("good");
                    }
                }).done(function() {
                  console.log("Done.");
                });

                return false;
            });


            // видалення

            var arr = [];

            $(".ind input[type='checkbox']").blur(function () {
                // витягнути ід чекбоксів
                var c = $(this).attr('name');  
                arr.push(c);
                console.log(arr);
                $('.del').val(arr);

            });


            $(".del").click(function() {

                $(".ind input[type='checkbox']:checked").hide();
                $(".ind input[type='checkbox']:checked").parent('.ind').hide();

                var data = {
                    arr : arr
                }

                $.ajax({
                    url : "/course/cutdelete", //на іншу сторінку тому треба інший екшн створювати для того
                    method: "POST",
                    data: data,
                    error: function(data){
                        console.log("Error");
                    },
                    success: function(data){
                        console.log(data);
                        console.log("good");
                    }
                }).done(function() {
                  console.log("Done.");
                });

                return false;
            });


        </script>           

       <?php  include ROOT. '/views/layout/footer.php'; // підключення моделі  ?>
    </body>
</html>