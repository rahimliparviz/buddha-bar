<?php include('./includes/header.php') ?>
   <section id="contact_page">
        <div class="content">
            <div class="title">
                <h1><?php echo $page->title ?></h1>
            </div>
            <div class="con_list">
                <div class="left">
                    <div class="title">
                        <h4><?php echo $page->leave_us_message ?></h4>
                    </div>




    <?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Invalid name';
        }
        if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
          $subject_error = 'Invalid subject';
        }
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
        if(strlen($message) === 0){
          $message_error = 'Your message should not be empty';
        }
      }
    ?>


                    <form action="" name="contact" method="post">
                        <div class="input_">
                            <div class="name">
                                <img src="<?php echo $root;?>/image/icons/people.svg" alt="">
                                <div class="margin_">
                                    <input type="text" name="name" placeholder="<?php echo $page->name_placeholder ?>">
                                    <p class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></p>
                                </div>
                            </div>
                            <div class="mail">
                                <img src="<?php echo $root;?>/image/icons/envelope.svg" alt="">
                                <div class="margin_">
                                    <input type="text" name="email" placeholder="<?php echo $page->email_placeholder ?>">
                                    <p class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></p>
                                </div>
                            </div>
                        </div>
                        <div style="position: relative;" class="text_a">
                            <img src="<?php echo $root;?>/image/icons/note.svg" alt="">
                            <div class="abs">
                                <textarea name="message" id="" cols="30" rows="5" placeholder="<?php echo $page->message_placeholder ?>"></textarea>
                                <button name="submit" value="Submit" type="submit"><?php echo $page->button ?></button>

                            </div>
                            <p class="text-danger"><?php if(isset($message_error)) echo $message_error; ?></p>

                        </div>

                           <?php 

                                if(isset($_POST['submit']) && !isset($name_error) && !isset($email_error) && !isset($message_error)){

                                    $mail = wireMail(); // calling an empty wireMail() returns a wireMail object

                                    $mail->to($page->email);
                                    $mail->from = $email; // if you don't have set a default sender in config
                                    // or if you want to override that
                                    $mail->subject('Message');
                                    $mail->body($message);
                                    $numSent = $mail->send();


                                }
                            ?>



                    </form>








                </div>
                <div class="right">
                    <div class="title">
                        <h4><?php echo $page->contacts_title ?></h4>
                    </div>
                    <ul class="ul_">

                    <?php 
                    foreach($page->contacts as $c){

                    echo '<li>
                   
            
                        <a  href=""> <i style="margin-right: 10px" class="fa fa-'.$c->icon.'"></i> '.$c->contact.'</a>
                        </li>';
                    }
                    ?>
                        
                      
                    </ul>
                    <div class="soc_ul">

            
                        <ul>

                            <?php
                            foreach( $pages->get('template=footer')->socials as $social){

                            echo "<li> <a href='{$social->link}'>  <i class='fa fa-{$social->icon}'></i> </a></li>";
                                }   
                        ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="map"></div>
    </section>

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCVD3AutfC1kbphLKHYHtuHWXYskne1Yvk&.js"></script>

<?php include('./includes/footer.php') ?>

    <script type="text/javascript">
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(40.371828, 49.852323),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                "featureType": "all",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#000000"
                }, {
                    "lightness": 40
                }]
            }, {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#000000"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }, {
                "featureType": "administrative.country",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#e5c163"
                }]
            }, {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#c4c4c4"
                }]
            }, {
                "featureType": "administrative.neighborhood",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#e5c163"
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 21
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.business",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#e5c163"
                }, {
                    "lightness": "0"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#e5c163"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#575757"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#2c2c2c"
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#999999"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }]
            }]
        });

        var marker;

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.371828, 49.852323),
            map: map,
            icon: {
                url: '<?php echo $root;?>/image/icons/pin.svg',
                scaledSize: new google.maps.Size(50, 50)
            }
        });
    </script>



</body>

</html>