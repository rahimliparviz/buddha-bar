<?php include('./includes/header.php') ?>

<?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $phone = htmlspecialchars(stripslashes(trim($_POST['phone'])));
        $time = htmlspecialchars(stripslashes(trim($_POST['time'])));
        $date = htmlspecialchars(stripslashes(trim($_POST['date'])));
        $count = htmlspecialchars(stripslashes(trim($_POST['count'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Invalid name';
        }
   
        if(strlen($phone) === 0){
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
   


  <div class="reserv_pop">
      <form action="" method="post">
          <div class="tab_form">
              <img src="<?php echo $root."/image/icons/people.svg" ?>" alt="">
              <div class="margin_">
                  <input type="text" name="name" placeholder="<?php echo $page->name_placeholder ?>" class="name_surname">
                  <p class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></p>
              </div>
              <div class="flex_">
                  <div class="left">
                      <img src="<?php echo $root."/image/icons/phone.svg" ?>" alt="">
                      <div class="margin_">
                          <input type="text" name="phone" class="numeric" placeholder="<?php echo $page->phone ?>">
                          <p class="text-danger"><?php if(isset($phone_error)) echo $phone_error; ?></p>
                      </div>
                      <div class="input-group cal_date">
                          <div class="margin_">
                              <input type="text" name = "date" class="form-control" placeholder="<?php echo date('d/m/Y'); ?>">
                              <p class="text-danger"><?php if(isset($date_error)) echo $date_error; ?></p>
                          </div>
                          <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>



                      </div>
                  </div>
                  <div class="right">
                      <img src="<?php echo $root."/image/icons/people2.svg" ?>" alt="" class="person_sel">
                      <div class="margin_">
                          <select name="count" id="">
                              <?php for($i=1;$i<$page->max_people_count;$i++){ echo '<option value="'.$i.'">'.$i.' person</option>'; } ?>
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
                  <textarea name="message" id="" rows="1" placeholder="<?php echo $page->message_placeholder ?>"></textarea>
              </div>
          </div>
          <div class="submit text-center">
              <button name="submit" value="Submit" type="submit">
                  <?php echo $page->button ?>
              </button>
          </div>

        <?php 
        if(isset($_POST['submit']) && !isset($name_error) && !isset($phone_error) && !isset($time_error) && !isset($date_error)){

              $name;$phone;$date;$time;$date;

              $mail = wireMail(); // calling an empty wireMail() returns a wireMail object

              $mail->to($page->email);
              $mail->from = $email; // if you don't have set a default sender in config
              // or if you want to override that
              $mail->subject('Reservation');

              $mail->body(
                  'Name:' .$name. "\r\n".
                  'Phone:'.$phone. "\r\n".
                  'Date:'.$date."\r\n".
                  'Time:'.$time."\r\n".
                  'Message:'.$message);
              $numSent = $mail->send();

          }
          ?>
          
      </form>
        <div class="bg_img" style="background-image:url('<?php echo $page->page_img->url ?>')"></div>
    </div>
<?php
        if(isset($_SESSION['success'])){

                echo '

                    
                        <div class="thanks">

                        <div class="bg" style="background-image:url('.$page->thanks_cover_img->url.')">

                            <div class="desc">
                                <div>
                                <?php echo $page->thanks_message ?>
                                    <div class="close_">
                                        <img src="<?php echo $root."/image/icons/close.svg" ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                ';

        };
?>


    <?php include('./includes/footer.php') ?>