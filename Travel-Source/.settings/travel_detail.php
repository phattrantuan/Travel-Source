<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <style type="text/css">


  </style>
</head>
<body>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/food.css">
    <link rel="stylesheet" href="./css/comment.css">
    <link rel="stylesheet" href="./css/comment.fix.css">
    <link rel="stylesheet" href="./css/star.css">
       <link rel="stylesheet" href="./css/commentadded.css">
       <link rel="stylesheet" href="./css/zoom.css">
       <style>

</style>
<?php require_once 'header.php';?>

<?php 
   $userid = 0;
$servicename = "";
$address="";
$description="";
$open= "";
$close="";
$price="";
$idimage="";
$idservice="";
$numberrate = 0;
$averageratestar = 0;
$averageratestarnotodd = 0;
$map = "";




$query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `idservice` LIKE "%'. @$_GET['id'].'%"');
            
              if ($row = mysqli_fetch_assoc($query2)) {
                   $servicename = $row['servicename'] ;
                   $address = $row['address'] ;
                   $description = $row['description'] ;
                   $open = $row['openn'] ;
                   $close = $row['closee'] ;
                   $price = $row['price'] ;
                   $idimage = $row['idimage'] ;
                   $map = $row['map'];
                 

              }

$query3 = mysqli_query($conn, 'SELECT * FROM `picture` WHERE `idimage` LIKE "%'. @$_GET['idimg'].'%"');
            
              if ($row = mysqli_fetch_assoc($query3)) {
                   $picture1 = $row['picture1'] ;
                   $picture2 = $row['picture2'] ;
                   $picture3 = $row['picture3'] ;
                   $picture4 = $row['picture4'] ;
    
                 

              }


$query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $_GET['id'].'"');
              if ($row14 = mysqli_fetch_array($query14)) {
$averageratestar =round($row14[0], 1);

$averageratestarnotodd =floor($row14[0]);



              }


 ?>
    <div class="container">
    <div class="header">
            <div class="row1">
                <h2> <?php echo $servicename;?> </h2>
                <div class="confirm">
                    <span><i class="fas fa-check-circle"></i></span>
                    ???? x??c nh???n
                </div>
                <div class="option">
                    <div class="save">
                        <i class="far fa-heart"></i>
                        <span>L??u</span>
                    </div>
                    <div class="share">
                        <i class="far fa-share-square"></i>
                        <span>Chia s???</span>
                    </div>
                </div>
            </div>

            <div class="row2">
                <div class="rate">
                
                    <?php 
                               $query10 = mysqli_query($conn, 'SELECT Count(*) FROM `rate` WHERE `idservice` =  "'.@$_GET['id'].'"');
            
              if ($row10 = mysqli_fetch_array($query10)) {
                  

                $numberrate=$row10['Count(*)'];

              

              }
                     ?>
                   <b>   <?php echo $numberrate?> ????nh gi??</b>
                </div>
                <div class="type">
                    <span>?????a ??i???m du l???ch h???p d???n c???a Vi???t Nam</span>
                </div>
            </div>
            
            <div class="row3">
               
                <div>
                    <span><i class="fas fa-phone"></i> </span>
                   Th??ng tin li??n h???: 03213821389
                </div>
                <div class="time">
                    <span><i class="fas fa-clock"></i> </span>
                  <?php echo $open."-".$close."" ?>
                </div>

            </div>


        </div>

        <!------------------------------------>
        
        <div class="main">
            <div class="rating">
                <h3>????nh gi?? </h3>
                <div class="danhgia">
                    <div class="icon">
                        <b class="rate-total"><?php echo $averageratestar; ?></b>
                  <?php 
                    if($averageratestarnotodd==4){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>




                        <?php } ?>

                     <?php 
                    if($averageratestarnotodd==5){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>




                        <?php } ?>


 <?php 
                    if($averageratestarnotodd==3){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>




                        <?php } ?>


 <?php 
                    if($averageratestarnotodd==2){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                       <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                         <i class="far fa-star"></i>




                        <?php } ?>
                         <?php 
                    if($averageratestarnotodd==1){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                       <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                         <i class="far fa-star"></i>




                        <?php } ?>


                        <b> <?php echo $numberrate ?> ????nh gi??</b>  
                    </div>
                    <span> <?php echo $address; ?> </span>
                    <span> Gi?? : <?php echo $price; ?> VND </span>
                </div>
                <div class="border"></div>
                <div class="xephang">
                    <h4>X???p h???ng</h4>
                    <div class="row">
                        <span><i class="fas fa-hamburger"></i></span>
                        &nbsp ????? ??n
                        <span class="xyz">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                    <div class="row">
                        <span><i class="fas fa-concierge-bell"></i></span>
                        &nbsp  D???ch v???
                        <span class="xyz">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                    <div class="row">
                        <span><i class="far fa-gem"></i></span>
                        &nbsp Gi?? tr???
                        <span class="xyz">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="img">
                    <img src="img/<?php echo $picture1; ?>" alt="" class="img-container">
                    <div>
                        <img src="img/<?php echo $picture2; ?>" alt="" class="img-small">
                        <img src="img/<?php echo $picture3; ?>" alt="" class="img-small">
                        <img src="img/<?php echo $picture4; ?>" alt="" class="img-small">
                    </div>
                    <div class="photo-librari">
                        <span>
                            <i class="fas fa-camera"></i>
                        </span>
                        Xem t???t c??? c??c ???nh
                    </div>
                </div>
                
                <div class="xyzz">
                    <div class="detail">
                        <div>
                            <div>
                                <div>
                                    <h2>Chi ti????t</h2>
                                </div>
                                <div>
                                    <div>
                                     
                                        <div> <?php echo $description; ?> </div>
                                    </div>
                                   
                                </div>
                                <div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="address">
                        <div>
                            <div>
                                <div>
                                    <h2>?????a ??i???m v?? th??ng tin li??n h???</h2>
                                        <span class="map">
                                        <?php echo $map; ?>
                                        </span>
                                        <span>
                                            <a>
                                                <span> <?php echo $address; ?> </span>
                                                <span></span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        
    <!--comment --> <!--comment --> <!--comment --> <!--comment -->
    <section >
            <div class="rating-box">
                <div class="rating-header">
                    <h4>????nh gi??</h4>
                    <span>  <?php echo $numberrate ?> ????nh gi??</span>
                    <button class="btn cmt-btn">Vi???t ????nh gi??</button>
                </div>

<!--Handle Code-->
<form action="" method="post" enctype="multipart/form-data">
                <div class="stars">
 
    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"  value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star"  value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star"  value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star"  value="1"/>
    <label class="star star-1" for="star-1"></label>
 
</div>
                <div class="cmt-input">
                    <input type="text" placeholder="Vi???t ????nh gi??(B???t bu???c)" name="txt-rate">
                    <br>
                    <br>
                     <input type="text" placeholder="?????t ti??u ????? cho b??i ????nh gi?? c???a b???n(B???t bu???c)" name="txt-rate-title">
                     <br>
                    <br>
                    <h5>B???n ??i khi n??o(B???t bu???c)</h5>
                
                    <input type="date" name="bday" min="2000-01-02" placeholder="B???n ??i khi n??o" ><br><br>
                    <h5>B???n ??i c??ng ai</h5>
               
                       
<select class="browser-default custom-select" name="gowithwho" style="width: 595px;
    height: 50px;
    border-radius:10px;">
                                    <option value="Gia ????nh(Tr??? nh???)" selected ><span>Gia ????nh(Tr??? nh???)</span></option>
                                    <option value="C???p ????i" ><span>C???p ????i</span></option>
                                    <option value="Gia ????nh(Thanh thi???u ni??n)"  >Gia ????nh(Thanh thi???u ni??n)<span></span></option>
                                    <option value="B???n b??"  >B???n b??<span></span></option>
                                    <option value="Doanh nghi???p"  >Doanh nghi???p<span></span></option>
                                    <option value="M???t M??nh"  >M???t M??nh<span></span></option>
</select>

                
<br><br>
                    <h5>Ch???n ???nh b???n mu???n chia s???</h5>
               

                     <input type="file" name="fileUpload" value="">

                    <button type="submit">
                        <span>Send</span>
                    </button>
                </div>

 

<?php 

    $checkfile = 0;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(@$_SESSION['username']==null)
    {
         echo '<p class="star-input">????ng nh???p tr?????c khi b??nh lu???n b???n ??i<p/>';
    }



 if (empty($_POST['star'])  ){
               echo '<p class="star-input">B???n c?? th??? t???ng t??i v??i ng??i sao<p/>';
            }


if (empty(@$_POST['txt-rate-title']&&@$_POST['bday']&&@$_POST['txt-rate'] )  ){
               echo '<p class="star-input">Vui l??ng ??i???n ?????y ????? th??ng tin<p/>';
            }



 ///IMG
    if ( isset($_FILES['fileUpload'])) {

                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["fileUpload"]["name"];
        $filetype = $_FILES["fileUpload"]["type"];
        $filesize = $_FILES["fileUpload"]["size"];
    
        // X??c minh ph???n m??? r???ng t???p
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)&&@$_FILES["fileUpload"]["name"]!=null)
        {
             echo '<p class="star-input"> Vui l??ng ch???n file h???p l???!<p/>';
             $checkfile = 1;
        }



  ///IMG

if(!empty($_POST['star']) && @$_SESSION['username']!=null&&!empty($_POST['txt-rate-title']&&$_POST['bday']&&$_POST['txt-rate'] )&&$checkfile!=1){


 
   
    $query6 = mysqli_query($conn, 'SELECT * FROM `user` WHERE `email` = "'.@$_SESSION['username'].'"');
            
              if ($row6 = mysqli_fetch_assoc($query6)) {
                  
                   $userid = $row6['userid'] ;
                 

              }
             

   $lenhsql = "INSERT INTO rate VALUES ('".$userid."', '".@$_GET['id']."', '".@$_POST['txt-rate']."','".@$_POST['star']."', '".@$_POST['txt-rate-title']."', '".@$_POST['gowithwho']."', '".@$_POST['bday']."', '".@$_FILES['fileUpload']['name']."', '', '', '', '')";
    $thucthi=mysqli_query($conn,$lenhsql) or die ("Khong them duoc");
    if (!$thucthi) {
        echo " Kh??ng b??nh lu???n ???????c !";
    }else{

      
    
       move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'img/' . $_FILES['fileUpload']['name']);
        // echo "<p>upload th??nh c??ng <p><br/>";
        //echo '<p>D?????ng d???n: upload/' . $_FILES['fileUpload']['name'] . '<br><p>';
        //echo '<p>Lo???i file: ' . $_FILES['fileUpload']['type'] . '<br><p>';
        //echo '<p>Dung l?????ng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB<p>';
    
       
       
      
            echo " <h3><a href='index.php'>????nh gi?? c???a b???n ???? ???????c ghi l???i.</a></h3>";

        
    }
}
///IMG
    
   


     //fix insert when f5



     
    
}
}





 ?>

<script> // fix insertdata when refresh
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


</form>

<!--Handle Code-->





            <div class="comment">
                <h4>Xem ????nh gi??</h4>
                <?php 
                        $query8 = mysqli_query($conn, 'SELECT * FROM `rate` WHERE `idservice` =  "'.$_GET['id'].'"');
            
              while ($row8 = mysqli_fetch_assoc($query8)) { 

        
                  
                   $query9 = mysqli_query($conn, 'SELECT * FROM `user` WHERE `userid` =  "'.$row8['userid'].'"');
                   while ($row9 = mysqli_fetch_assoc($query9)) {
                       // code...
                   

                 ?>






                <div class="list-cmt">
                        <div class="cmt-item">
                            <div class="user-info">
                                <div class="user-info__img">
                                    <img src="./img/avatar.png" alt="User Img">
                                </div>
                                <div class="user-info__basic">
                                    <div class="header">    
                                        <h5 class="mb-0"><?php echo $row9['username'];  ?> </h5>
                                        <?php if($row8['ratestar']=="5" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                              <i class="fas fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="4" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                           <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="3" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                              <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="2" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                              <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="1" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                              <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                  <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    

                                    </div>
                                      <h5 class="text-cmt"><?php echo $row8['title'];  ?> </h5>
                                    <p class="text-cmt"><?php echo $row8['comment'];  ?> </p>
                                    <div class="time">
                                        <strong>Ng??y ?????n th??m : </strong>
                                        <span> <?php echo $row8['times'];  ?></span>



                                    </div>
                                    <?php 
                                            if($row8['imgshare']!=null)
                                            {

                                           

                                     ?>
                                     <p><img id="zoom" src="img/<?php echo $row8['imgshare'];  ?>" alt="Sakura" class="imgshare" style="  width: 150px;
    height: 150px;    image-rendering: pixelated;
    object-fit: contain;" /></p>
 
 <?php } ?>

                         <?php 
                                            if($row8['imgshare']==null)
                                            {

                                           

                                     ?>
                                    
 
 <?php } ?>

                                </div>
                            </div>
                            <div class="dropdown open">
                                <a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="triggerId1">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil mr-1"></i>
                                        B??o c??o ????nh gi??
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                </div>

            <?php   }} ?>
            </div>

        </section>



        
        <script>
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const btn = $(".rating-header button")
        const input = $(".rating-box .cmt-input")
        
        btn.onclick = ()=>{
            input.style.display = "block";
        }
    </script>
        <!------------------------------------>
    <?php require_once 'footer.php';?>

</body>
</html>