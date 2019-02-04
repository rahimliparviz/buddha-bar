<?php include('./includes/header.php') ?>


<?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $phone = htmlspecialchars(stripslashes(trim($_POST['phone'])));
        $time = htmlspecialchars(stripslashes(trim($_POST['time'])));
        $date = htmlspecialchars(stripslashes(trim($_POST['date'])));
        $count = htmlspecialchars(stripslashes(trim($_POST['count'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
        $service = htmlspecialchars(stripslashes(trim($_POST['service'])));

        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Name field is required';
        }
   
        if(strlen($phone) < 3){
            $phone_error = 'Phone number required';
          }


//        if(!preg_match("/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]+$/", $time)){
//            $time_error = 'Invalid time';
//          }
        if(!preg_match("/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/i",$date)){
        $date_error = 'Invalid date';
        }

        if(!preg_match("/^[0-9]*$/",$count)){
            $count_error = 'Invalid input provided';
            }

      }
    ?>
  <section id="services_page">
        <div class="content">
            <div class="title">
                <h1>
                  <?php echo $page->page_title ?>
                </h1>
            </div>
            <div class="serv_list">
                <div class="item bday_">
                    <div class="info">
                        <h1> <?php echo $page->services[0]->services_title ?></h1>
                    </div>
                    <div class="photo" style="background-image:url('<?php echo $page->services[0]->services_back_img->url ?>')"></div>
                </div>
                <div class="item banquet_">
                <div class="info">
                        <h1> <?php echo $page->services[1]->services_title ?></h1>
                    </div>
                    <div class="photo" style="background-image:url('<?php echo $page->services[1]->services_back_img->url ?>')"></div>
                </div>
            </div>
            <div class="form_sec">
                <div class="tab_con">
                    <ul class="nav ul" role="tablist">
                        <li role="presentation" class="s active" data-service="<?php echo $page->services[0]->services_title ?>" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $page->services[0]->services_title ?> </a></li>
                        <li role="presentation" class="s"  data-service="<?php echo $page->services[1]->services_title ?>" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><?php echo $page->services[1]->services_title ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <form action="" method="post">
                                <input class="service_input" type="hidden" name="service" value="<?php echo $page->services[0]->services_title ?>" >
                                <div class="tab_form">
                                    <img src="<?php echo $root."/image/icons/people.svg" ?>" alt="" class="person_sel">
                                    <div class="margin_">
                                        <input type="text" name="name" placeholder="Your name" class="name_surname">
                                        <p class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></p>

                                    </div>


                                    <div class="flex_">
                                        <div class="left">
                                            <img src="<?php echo $root."/image/icons/phone.svg" ?>" alt="">

                                            <div class="margin_">
                                                <input type="text" class="numeric" name="phone" placeholder="Your phone number">
                                                <p class="text-danger"><?php if(isset($phone_error)) echo $phone_error; ?></p>

                                            </div>

                                            <div class="input-group cal_date">
                                                <input type="text" name="date" class="form-control" placeholder="<?php echo date('d/m/Y'); ?>">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <img src="<?php echo $root."/image/icons/people2.svg" ?>" alt="" class="person_sel">
                                            <div class="margin_">
                                                <select name="count" id="">
                                                    <?php
                                                    for($i=1;$i<$page->max_people_count;$i++){echo '<option value="'.$i.'">'.$i.'person</option>';  }  ?>
                                                </select>
                                                <p class="text-danger"><?php if(isset($count_error)) echo $count_error; ?></p>

                                            </div>
                                            <div class="input-group date cal_time">
                                                <input type="text" name="time" class="form-control" placeholder="20:00">
                                                <p class="text-danger"><?php if(isset($time_error)) echo $time_error; ?></p>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="area">
                                        <img src="<?php echo $root."/image/icons/note.svg" ?>" alt="">
                                        <div class="margin_">
                                            <textarea  name="message" id="" rows="1" placeholder="Note - Special request"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit text-center">
                                    <button name="submit" value="Submit" type="submit">
                                       <?php echo $page->button ?>
                                    </button>
                                </div>



                                <?php

                                if(isset($_POST['submit']) && !isset($name_error) && !isset($phone_error) && !isset($date_error)   && !isset($time_error)
                                    && !isset($count_error) )

                                {
                                    $name;$phone;$date;$time;$count;

                                    $mail = wireMail(); // calling an empty wireMail() returns a wireMail object

                                    $mail->to($page->email);
                                    $mail->from = $email; // if you don't have set a default sender in config
                                    // or if you want to override that
                                    $mail->subject('Service');

                                    $mail->body(
                                            'Name:' .$name. "\r\n".
                                            'Service type: '.$service."\r\n".
                                            'Phone:'.$phone. "\r\n".
                                            'Date:'.$date."\r\n".
                                            'Time:'.$time."\r\n".
                                            'Count of people:'.$count."\r\n".
                                            'Special request'.$message);
                                    $numSent = $mail->send();

                                }
                                ?>















                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('./includes/footer.php') ?>


     <div class="pop_up bday">
        <div class="close_">
        <img src=" <?php echo $root."/image/icons/close1.svg" ?>  " alt="">
        </div>
        <div class="owl-carousel owl-theme owl-carousel-default owl-carousel-class-light serv_sld_pop">

        <?php 
            foreach($page->services[0]->images as $img){
              echo '
              <div class="item">
                <img src="'.$img->url.'" alt="">
            </div>
              
              ';
            }
         ?>
             </div>
        <div class="desc">
          <?php echo $page->services[0]->services_desc ?>
        </div>

    </div>
    <div class="pop_up banquet">
        <div class="close_">
            <img src=" <?php echo $root."/image/icons/close1.svg" ?>  " alt="">
        </div>
        <div class="owl-carousel owl-theme owl-carousel-default owl-carousel-class-light serv_sld_pop">
          <?php 
            foreach($page->services[1]->images as $img){
              echo '
              <div class="item">
                <img src="'.$img->url.'" alt="">
            </div>
              
              ';
            }
         ?>
             </div>
        <div class="desc">
          <?php echo $page->services[1]->services_desc ?>
        </div>
    </div>
    