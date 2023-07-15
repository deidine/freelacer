<!--Author: Muhamad Miguel Emmara-->
<!--Student ID: 18022146-->
<!--Email: ryf2144@autuni.ac.nz-->

<!--
    Description of File:
    Main / Home page
-->

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=#&libraries=places"></script>
<style>
    .dropdown-menu{
  display: none;
  position: absolute;
  background-color:  black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-menu a {
  color:rgb(77, 15, 128);
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-menu a:hover {
  background-color: rgb(103, 28, 165);
  color: white;
}

.dropdown:hover .dropdown-menu {display: block;}

</style>
</head>
<?php

/*
|--------------------------------------------------------------------------
| Access Restriction
|--------------------------------------------------------------------------
|
| Here is the declaration that user or visitor
| can access the page
| all the define('MY_CONSTANT', 1) meaning pages that can be access.
|
*/

define('MY_CONSTANT', 1);

/*
|--------------------------------------------------------------------------
| Title Variable
|--------------------------------------------------------------------------
|
| Title variable used to
| make dynamic title depending
| on the page where user are on.
|
*/

$title = "Cabs Online | Book A Taxi Ride With Us Today!";

/*
|--------------------------------------------------------------------------
| Require frontend/header
|--------------------------------------------------------------------------
|
| include file
| frontend/header
| for displaying the header
|
*/

require dirname(__FILE__) . "/includes/frontend/header.php"; ?>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <?php

    /*
|--------------------------------------------------------------------------
| Require frontend/nav
|--------------------------------------------------------------------------
|
| include file
| frontend/nav
| for displaying the navbar
|
*/

    require 'includes/frontend/nav.php';
    ?>
    
    <!-- Start: Header Blue -->
    <header class="header-blue">

        <div class="container hero">
            <div id="image-taxi-row" class="row">
                <!-- Start: Text -->
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 text-center">
                    <h1 data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" style="color: #3b3b3b;font-weight: bold;">

                        <strong>وظائف  الفريق كالتالى
                            </strong><br>
                        <strong> </strong><br>
                    </h1>
                    <p data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" style="color: #3b3b3b;font-weight: bold;"><strong><em>
                        
    

                                 تصميم مواقع الكترونيه
                                <br>تصميم متجر الالكتروني
                               <br> مونتاج فديوهات (مجموعة مونترين)
                               <br>اعلانات مموله
                               <br>تصميمات سوشيال ميديا
                               <br>تصميمات لوجو وبنرات وإعلانات
                                 تصميمات موشن جرافيك
                            </em></strong><br></p>
                    <a class="btn btn-light btn-lg action-button" role="button" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1000" data-aos-once="true" href="worker-info.php" style="background: #f6b800;"> معرفة اكثر عن القادة</a>
                    <a class="btn btn-dark btn-lg" role="button" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1000" data-aos-once="true" href="booking.php" style="border-radius: 40px;">حجز خدمات</a>
                    <div class="container mt-3">
                        <img data-aos="zoom-in-up" data-aos-duration="500" style="border-radius: 0px 80px 0px 80px ;" data-aos-delay="500" data-aos-once="true" class="img-fluid max-width: 70% taxi-image" src="assets/img/logo3.jpeg" width="304" height="236">
                    </div>

                </div><!-- End: Text -->

            </div>
        </div>
    </header>
    <!-- End: Header Blue -->
    <section id="about" style="margin-top: -75px;">
        <div class="container">
            <div class="row row-about">
                <div class="col-lg-12 text-center" data-aos="zoom-in" data-aos-duration="500" data-aos-once="true">
                    <h3 class="text-muted section-subheading"><i class="fa fa-dot-circle-o" style="color: rgb(254,209,54);"></i><br><strong>خدمات موقع قادة المستقبل</strong><br></h3>
                    <div id="div-about" class="text-center">
                        <h2 class="text-uppercase"><strong>كالتالى</strong><br></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group timeline">
                        <li class="list-group-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/service1.jpeg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>تصميم متجر الالكتروني</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
                                        لدينا فريق متخصص في بناء متاجر الكترونيه وفريق مستعد لخدمتكم علئ الدوام من اجل اسعاد رغائبكم و متطلعاتكم
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/service2.jpeg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>تصميم مواقع الكترونيه </strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
                                        لدينا فريق متخصص في بناء المواقع الكترونيه الويب خصوصا وفريق مستعد لخدمتكم علئ الدوام من اجل اسعاد رغائبكم
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/service3.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong> تصميمات السوشيال ميديا</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">عشان تقدر توصل منتجك للعميل وتوضح فكرته لازم يكون في تصميم يروج لفكرة منتجك وده هيتوفر من خلال تصميمات السوشيال ميديا ومتاح أيضا تصميم كروت شخصيه تصميم غلاف فيسبوك وصفحات تجاريه تصميم صور مصغرة تصميم منيوهات مطاعم
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/service4.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>المونتاج </strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">المونتاج لا يعني مجرد تركيب وإلصاق كادر بأخر حتى النهاية، بل هو فن إبداعي تفكيري، يهدف إلى الكشف عن الرؤية الفنية والإبداعية للمحتوى
                                        نقدم لكم
                                        قطع المقاطع الاحترافي .
                                        إضافة النصوص واللوجوهات .
                                        إضافة انتقالات .
                                        إزالة كروما .
                                        تركيب مشاهد وترتيبها .
                                        تعديل الالوان Colering.
                                        إضافة موسيقى في الخلفية والمؤثرات الصوتية .
                                        إضافة ترجمة .
                                        عمل انترو احترافي .
                                        إضافة تعديلات وإزالة التشويش من الصوت .
                                        عمل Tracking .
                                        إضافة المشاهد الخارجية المناسبة للموضوع.
                                        عمل فيديوهات video gragh.
                                        تصدير الفيديو بجودة 1080p و 4K
                                        وبصيغة mp4.
                                        اعداد الفيديو علي مقاس face book, you tube
                                        Instagram, Snapchat, Youtube shorts
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item " data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-square img-fluid" src="assets/img/about/service7.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>مصمم جرافيك ومونتير</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">مصمم جرافيك ومونتير فيديوهات
                                        تصميم شعار مميز وفريد، ويمكنني تصميم غلاف للكتب والكتب الإلكترونية وغلاف لأي مجلة، وأيضا تصميم وتعديل منشورات لجميع منصات التواصل الإجتماعي بكل إحترافية ودقة، ويمكنني كتابة أي تقرير إلكتروني بأسرع وقت وبدقة عالية، وتصميم قائمة دعاية لأي مطعم أو محل تجاري بطريقة مميزة وملفتة للنظر، تصميم صور مصغرة لمنصة اليوتيوب، وتصميم بطاقات وكروت دعايا وإعلان، وتصميم نشرة إعلانية مميزة ورائعة، وكتابة سيرة ذاتية مميزة لأي موظف أو طالب أو أي عميل في أي مجال وبإحترافية عالية، وأيضاً مونتاج لأي فيديو أو ملف صوتي أو صورة.
                                        تتميز تصميماتي بالدقة والبساطة وتتميز بأنها فريدة من نوعها، والسرعة في إنجاز المهام، وتسليم الشغل قبل المعاد المحدد، ومتاح أيضاً التعديل على التصميمات كما يشاء العميل، ومتاح أيضاً إضافة وتغيير أي شيء في التصميم في أي وقت حتى بعد الإستلام.
                                        إرضاء العميل هو هدفنا وهدف فريق قادة المستقبل.
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/service6.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong> </strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">  </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item " data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="assets/img/about/service5.jpg">
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Start: Highlight Phone -->
    <!-- <section class="highlight-phone" style="background: rgb(255,192,0);">
        <div id="booking-cta" class="container text-center">
            <h3>Book A Ride Now</h3>
            <form class="row g-3" method="POST" action="booking.php">
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked required>
                            <img src="./assets/img/cars/Scooter.png" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" required>
                            <img src="./assets/img/cars/Hatchback.png" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" required>
                            <img src="./assets/img/cars/Suv.png" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4" required>
                            <img src="./assets/img/cars/Sedan.png" alt="Car 4">
                        </label>

                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5" required>
                            <img src="./assets/img/cars/Van.png" alt="Car 5">
                        </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <input type="text" class="form-control" id="sbname" placeholder="🏡 From Address..." name="sbname">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="dsbname" placeholder="🏡 To..." name="dsbname">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="☎️ Phone Number" name="phone">
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="pickUpDate" name="pickUpDate">
                </div>
                <div class="col-12">
                    <input class="btn btn-dark btn-lg" type="submit" name="book-button" style="border-radius: 40px;;" value="Book A Ride">
                </div>
            </form>
        </div>
    </section>End: Highlight Phone -->
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(254,251,240);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
                        <div class="div-title">
                            <h2>من نحن</h2>
                        </div>
                        <p style="color: rgb(0,0,0);"><strong><em>    شركة موثوقة ذات خبرات كثيرة</em></strong><br></p>
                        <p>
                        لدينا سنوات عمل خبرة الشركة لها خبرة كبيرة فى المجال حيث تعمل فى المجال من ويعمل بها عدد كبير من المهندسين والعمل ذوى الكفائة والخبرة تقوم شركة قادة المستقبل بعمل ١-تصميم مواقع الكترونيه 2-تصميم متجر الالكتروني 3- مونتاج فديوهات (مجموعة مونترين) 4-اعلانات مموله 5-تصميمات سوشيال ميديا 6-تصميمات لوجو وبنرات وإعلانات 7-تصميمات موشن جرافيك


                        </p>
                    </div><!-- End: Intro -->
                </div>
                <video src="assets/futureleader.mp4" width="500px" height="500px" controls></video>    
                <div class="col-sm-4">
                    <!-- Start: Smartphone -->
                    
                    <div class="d-none d-md-block phone-mockup taxi-about-img">
                        <a class="btn btn-primary" role="button" href="booking.php" style="margin-left: -4px;background: rgb(59,59,59);">>حجز خدمات</a>
                    <!-- <img class="device" src="assets/img/logo2.jpeg"> -->
                        <div class="screen"></div>
                    </div><!-- End: Smartphone -->
                </div>
            </div>
        </div>
    </section>
    <!-- End: Highlight Phone -->
    <section data-aos="zoom-in" data-aos-duration="1150" data-aos-once="true" class="py-5">
        <h3 id="seen" class="text-center">قريبا على</h3>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><a href="https://www.google.com/" target="_blank"><img class="img-fluid d-block mx-auto" src="assets/img/clients/google.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="https://www.facebook.com/" target="_blank"><img class="img-fluid d-block mx-auto" src="assets/img/clients/facebook.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="https://www.airbnb.co.nz/" target="_blank"><img class="img-fluid d-block mx-auto" src="assets/img/clients/airbnb.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="https://www.netflix.com/" target="_blank"><img class="img-fluid d-block mx-auto" src="assets/img/clients/netflix.jpg"></a></div>
            </div>
        </div>
    </section>
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(255,192,0);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
                        <h5 style="color: rgb(0,0,0);">أنضم للفريق<br></h5>
                        <h2><strong>
                                كن قائد من قادة المستقبل
                            </strong><br></h2>
                    </div><!-- End: Intro -->
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-lg btn-dark driver-btn" role="button" href="problem.php">ابلاغ عن مشكلة</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Highlight Phone -->
    <section id="services" style="padding-top: 90px;background: #111111;color: rgb(255,255,255);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="margin-top: -20px;">
                    <h3 class="text-muted section-subheading"><i class="fa fa-dot-circle-o" style="background: rgba(254,209,54,0);color: rgb(254,209,54);"></i><br><strong></strong><br></h3>
                    <h2 class="text-uppercase section-heading benefit-space">لماذا ستختارنا </h2>
                </div>
            </div>
            <div class="row text-center align-up">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fas fa-child fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">الدقة المهارة السرعة في انجاز العمل</h4>
                    <p class="text-muted">
                        لان ارضائك هدفنا
                    </p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-drivers-license-o fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">الاعضاء قي الفريق لديهم الخبرة</h4>
                    <p class="text-muted"> لان ارضائك هدفنا
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-dollar fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">أسعار بسيطة</h4>
                    <p class="text-muted">
                        مقارنة مع المواقع الاخرى نحن الاقل تكلفة </p>
                </div>
            </div>
        </div>
    </section>

    <?php

    /*
|--------------------------------------------------------------------------
| Require frontend/footer
|--------------------------------------------------------------------------
|
| include file
| frontend/footer
| for displaying the footer
|
*/

    require 'includes/frontend/footer.php';

    ?>

    <script>
        let map = new google.maps.Map(document.getElementById("maps"), {
            mapId: '8e0a97af9386fef',
            center: {
                lat: 0.4764885246421527,
                lng: 101.38129313475055
            },
            zoom: 17,
            disableDefaultUI: true
        });
        // 18.113821, -15.999571
        const markers = [
            ["<b>Hendy Saputra 2003113132</b>", 20.518596023025236, -13.053905340657941, "./img/male.svg", 38, 31, google.maps.Animation.BOUNCE],
            ["<b>Seteven 2003114203</b>", 20.518186559047493, -13.053701492778698, "./img/boy.svg", 26, 29, google.maps.Animation.BOUNCE],
            ["<b>Elvina Carolina 2003111123</b>", 20.518814570832536, -13.0531033601883, "./img/girl.svg", 24, 30, google.maps.Animation.BOUNCE],
            ["<marquee><b>centre du ville atar mauritanie </hb></marquee>", 20.51859351097246, -13.05389058850339, "./img/flag.svg", 25, 31, google.maps.Animation.DROP]
        ];

        for (let i = 0; i < markers.length; i++) {
            const currMarker = markers[i];

            const marker = new google.maps.Marker({
                position: {
                    lat: currMarker[1],
                    lng: currMarker[2]
                },
                map,
                title: currMarker[0],
                icon: {
                    url: currMarker[3],
                    scaledSize: new google.maps.Size(currMarker[4], currMarker[5])
                },
                animation: currMarker[6]
            });

            const infowindow = new google.maps.InfoWindow({
                content: currMarker[0]
            });

            if (i == 3) {
                infowindow.open(map, marker);
            }

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            })
        }
    </script>

</body>

</html>