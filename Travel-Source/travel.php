<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/index.css">

    <!--bootstraplongin-->
    <!--bootstraplongin-->
    <!--bootstraplongin-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
    <!-- Plugin file -->
    <link rel="stylesheet" href="bootstrap/css/addons/datatables.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/index2.css">
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/mdb.min.js"></script>
    <!-- Plugin file -->
    <script src="./js/addons/datatables.min.js"></script>

    <!--bootstraplongin-->
    <!--bootstraplongin-->
    <!--bootstraplongin-->
</head>

<body onload="javascript:getLocation()">
    <?php require_once 'header.php'; ?>
    <div class="container">
        <h3>Tìm kiếm địa điểm</h3>
        <div class="box">
        <form name="form" action="search.php" method="get">
            <div class="search">
                <input type="text" placeholder="Địa điểm" name="search">
                <button type="submit"  class="hiddenbutton" style="width: 0;height: 0;"><i class="fa fa-search" aria-hidden="true" ></i></button>
            </div>
        </form>
        </div>
        <form name="form" action="suggestion.php" method="get">
            <h3>Các dịch vụ gần tôi</h3>
            <h3>Bạn đang ở <span id="json-result"></span></h3>
            <input type="hidden" id="myLocation" name="myLocation">
            <div class="mx-auto" style="width: 200px;">
                <input style="width: 200px" type="submit" class="btn btn-success" value="Gợi ý địa điểm">
            </div>
            
        </form>



        <h3>Điểm du lịch nổi bật</h3>

        <div class="slide">
            <button class="btn btn-prev" onclick="next_slide()">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-next" onclick="prev_slide()">
                <i class="fas fa-chevron-right"></i>
            </button>

            <ul>
                <li class="slide-item ">
                    <a href="travel_detail.php?id=S1&idimg=Img1"><img alt="Qries" src="./img/anh1.png">
                              </a>
 <a href="tr"><img alt="Qries" src="./img/anh1.png">
                              </a>
                </li>
                <li class="slide-item">
                    <img src="./img/anh2.png" id="img2">
                </li>
                <li class="slide-item">
                    <img src="./img/anh3.png" id="img3">
                </li>
                <li class="slide-item">
                    <img src="./img/anh4.png" id="img4">
                </li>
                <li class="slide-item">
                    <img src="./img/anh5.png" id="img5">

                </li>


            </ul>

        </div>
    </div>
    <!----------------------->
    <?php require_once 'footer.php'; ?>
    <script type="text/javascript" src="./javascript/index.js"></script>
    <script>
        var result = document.getElementById("json-result");
        var iresult = document.getElementById("myLocation");
        const Http = new XMLHttpRequest();

        function getLocation() {
            console.log("getLocation Called");
            var bdcApi = "https://api.bigdatacloud.net/data/reverse-geocode-client"

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    bdcApi = bdcApi +
                        "?latitude=" + position.coords.latitude +
                        "&longitude=" + position.coords.longitude +
                        "&localityLanguage=en";
                    getApi(bdcApi);

                },
                (err) => {
                    getApi(bdcApi);
                }, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                });
        }

        function getApi(bdcApi) {
            Http.open("GET", bdcApi);
            Http.send();
            Http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myJson = this.responseText
                    const myObj = JSON.parse(myJson)
                    var location = myObj.principalSubdivision
                    result.innerHTML = location;
                    iresult.value = location;
                }
            };
        }
    </script>

</body>

</html>