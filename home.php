<?php
    session_start();
    require_once('db/dbhelper.php');
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        $name = $_SESSION['user']['fullname'];
    }
    // var_dump($_SESSION['user']['username']);
	// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelix</title>
    <link rel="stylesheet" href="./assest/css/main.css">
    <link rel="stylesheet" href="./assest/css/base.css">
    <link rel="stylesheet" href="./assest/css/grid.css">
    <!-- <link rel="stylesheet" href="./assest/css/offers.css"> -->
    <link rel="stylesheet" href="./assest/css/offers-responsive.css">
    <link rel="stylesheet" href="./assest/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assest/font/beyond_the_mountains.otf">
</head>
<style>
    .header__login-register:hover{
        color: var(--hover-color);

    }
    .header__body-link:hover{
        text-decoration: none;
        color: red;
    }
    .header__login-login::after{
        height: 40%;
    }
    .user{
        position: relative;
        display: inline-block;
        color: white;
    }
    
    
    .user_list{
        padding: 0px;
        list-style: none;
        margin: 0px;
        position: fixed;
        top: 40%;
        right: 1px;
        background-image: linear-gradient(rgba(231, 55, 13, .55), rgba(29, 4, 62, .55));
        z-index: 8;
        display: block;
        border-radius: 36px;
    }

    .user:hover .user_list{
        display: block;
    }

    .user_list::before{
        content: "";
        position: absolute;
        top: -10px;
        right: 3px;
        width: 70%;
        height: 20px;
        background-color: transparent;  
        
    }
    .user_item{
        padding: 6px 16px;    
        text-align: center;

    }

    .user_link{
        color: #fff;
        text-decoration: none;
        /* font-size: 15px; */
        font-weight: 600;
        /* font-family: Brush Script MT; */
    }

    .user_link:hover{
        color: #e6f506;
        text-decoration: none;
    }
</style>
<body>
    <div class="main">
        <div class="over-lay js-overlay">
            
            <div class="over-lay__body-close js-close-icon">
                <i class="fas fa-times"></i>
            </div>

            <div class="over-lay__body-content">
                <img src="./assest/img/glogo.webp" alt="">
                <ol class="over-lay__body-list">
                    <li class="over-lay__body-item">
                        <a href="#" class="over-lay__body-link">home</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./about-us.php" class="over-lay__body-link">about us</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./offers.php" class="over-lay__body-link">offers</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./news.php" class="over-lay__body-link">news</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./contact.php" class="over-lay__body-link">contact</a>
                    </li>
                </ol>
            </div>
        
        </div>
        <header class="header">
            <div class="header__heading">
                <div class="grid wide">
                    <div class="row">
                        <div class="col l-6 m-6">
                            <div class="header__link" style="">
                                <a href="tel:+84 342 517 826" class="header__link-phone">+84 342 517 826</a>
                                
                                <ul class="header__link-list">
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fas fa-globe"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col l-6 m-6">
                            <div class="header__login">
                            <a href="./loginRes/logout.php" class="header__login-login" style="display:inline-flex">logout</a>
                                <?php
                                    
                                        if($user_id == 1){
                                            echo '
                                                <a href="./admin/" class="header__login-register">Admin</a>  
                                            ';
                                        }
                                        else{
                                            echo '
                                            <a href="" class="user" style="">'.$name.'</a>  
                                            ';
                                        }
                                    
                                ?>
                            <ul class="user_list">
                                <li class="user_item"><a class="user_link" href="./admin/ticket/ticketUser.php">Địa Điểm Đã Đặt</a></li>
                                <li class="user_item"><a class="user_link" href="./loginRes/infoUser.php?id=<?php echo $user_id ?>">Thông Tin Cá Nhân</a></li>
                                <li class="user_item"><a class="user_link" href="./loginRes/changePassword.php">Thay Đổi Mật Khẩu</a></li>
                                <li class="user_item"><a class="user_link" href="./feedback.php">Phản Hồi</a></li>                              
                            </ul>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>

            <nav class="header__nav" style="height: 90px; top: 36px">
                <div class="grid wide">
                    <div class="header__body">
                        <a href="#" class="header__body-logo">
                            <img src="./assest/img/glogo.webp" alt="" class="logo__img">
                            <span class="logo__tittle">travelix</span>
                        </a>

                        <ul class="header__body-list hi-on-tablet-mobile">
                            <li class="header__body-item">
                                <a href="#" class="header__body-link">home</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./about-us.php" class="header__body-link">about us</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./offers.php" class="header__body-link">order</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./news.php" class="header__body-link">news</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./contact.php" class="header__body-link">contact</a>
                            </li>
                        </ul>

                        <div class="header__body-icon">
                            <label for="open-search" class="header__body-search">
                                <i class="fas fa-search"></i>
                                <input type="checkbox" name="" id="open-search" class="check" hidden>
                                <input type="text" class="search" placeholder="Search...">
                            </label>
    
                            <div class="header__body-menu-icon js-header__body-menu-icon">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav> 
        </header>

        <div class="slider">
            <div class="grid wide">
                <div class="slider-tittle">
                    <h1 class="slider-tittle__heading">discover</h1>
                    <h2 class="slider-tittle__sub-heading">the world</h2>
                </div>

                <button href="" class="slider-btn btn">3D1H</button>
            </div>
        </div>

        <div class="container">
            
            <div class="container__tour">
                <div class="container__tour-content">
                    <div class="grid wide">
                        <div class="container__content-body">
                            <h1 class="container__content-heading">We have the best tours</h1>
                            <p class="container__content-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
                            <div class="container__content-list">
                                <div class="row">
                                    <?php
                                        $sql = "select * from places order by updated_at DESC limit 3";
                                        $places = $connect->query($sql);
                                        if($places->num_rows > 0){

                                            while($placeItem = $places->fetch_assoc()){
                                                $time = $placeItem['updated_at'];
                                                $date = explode(' ', $time);
                                                // var_dump($date);
                                                // echo $date;
                                                echo '
                                                <div class="col l-4 m-12 c-12">
                                                    <div class="container__content-list-item" style="background-image: var(--overlay-color), url('.$placeItem['thumbnail'].');">
                                                        <div class="content__box-tour">
                                                            <h3 class="container__content-list-item-heading" style="width: 45%; font-size: 15px">'.$date[0].'</h3>
                                                            <div class="container__content-list-item-body">
                                                                <p class="container__content-list-item-name" style="font-size: 21px">'.$placeItem['title'].'</p>
                                                                <p class="container__content-list-item-price">'.number_format($placeItem['price']).' VNĐ</p>
                                                                <p class="container__content-list-item-rating">
                                                                ';
                                                                if($placeItem['rating'] == 2){
                                                                    echo '
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                    ';
                                                                }
                                                                else if($placeItem['rating'] == 3){
                                                                    echo '
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                    ';
                                                                }
                                                                else if($placeItem['rating'] == 4){
                                                                    echo '
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                    ';
                                                                }
                                                                else{
                                                                    echo '
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                    ';
                                                                }
                                                                
                                                                    
                                                                echo '
                                                                </p>
                
                                                            </div>
                                                            <a href="book.php?id='.$placeItem['id'].'" class="btn container__content-list-item-btn">
                                                                <span class="container-list-btn__tittle">BOOK NOW</span>
                                                                <span class="hello"></span>
                                                                <span class="hello"></span>
                                                                <span class="hello"></span>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
            <div class="container__offers">
                <div class="grid wide">
                    <div class="container__content-body">
                        <h1 class="container__content-heading">THE BEST OFFERS WITH ROOMS</h1>
                        <div class="row">
                            <?php
                                $sql = "SELECT hotel.*, places.id as place_id, places.title as placeTitle  FROM hotel, places WHERE hotel.place_id = places.id order by updated_at desc limit 4";
                                $result = $connect->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo '
                                        <div class="col l-6 m-12 c-12">
                                            <div class="container__offers-body-item">

                                                <div class="row">
                                                    <div class="col l-6 m-6 c-12">
                                                        <div class="container__offers-item" style="background-image: url('.$row['thumbnail'].');">
                                                            <a href="" class="container__offers-item-tittle">'.$row['name'].'</a>                                                  
                                                        </div>
                                                    </div>
                                                    <div class="col l-6 m-6 c-12">
                                                        <div class="container__offers-content">
                                                            <div class="container__offers-content-header">
                                                                <span class="container__offers-header-price" style="font-size: 26px">'.number_format($row['price']).' VNĐ</span>                                                              
                                                            </div>


                                                            <p class="container__content-list-item-rating mg-0">
                                                            ';
                                                            if($row['rating'] == 2){
                                                                echo '
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                ';
                                                            }
                                                            if($row['rating'] == 3){
                                                                echo '
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                ';
                                                            }
                                                            if($row['rating'] == 4){
                                                                echo '
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                                ';
                                                            }
                                                            if($row['rating'] == 5){
                                                                echo '
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                                ';
                                                            }
                                                            echo '
                                                        
                                                            </p>
                
                                                            <p class="container__offers-content-text">
                                                                Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor.
                                                            </p>
                
                                                            <div class="container__offers-content-list-img">
                                                                <h3>Địa điểm: <span style="color: #d60a9d">'.$row['placeTitle'].'</span></h3>                                                          
                                                            </div>
                
                                                            <a href="./admin/ticket/detail.php?place_id='.$row['place_id'].'&hotel_id='.$row['id'].'" class="container__offers-content-more">SEE MORE</a>
                                                        </div>
                                                    </div>
                
                                                </div>
                                            </div>
                                            
                                        </div>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container__feed-back">
                <div class="grid wide">
                    <div class="container__content-body">
                        <h1 class="container__content-heading">WHAT OUR CLIENTS SAY ABOUT US</h1>
                        <div class="container__feed-back-body">
                            <div class="row">
                                <?php
                                    $sql = "select feedback.*, users.thumbnail as userThumbnail, users.fullname as userName from feedback, users where users.id = feedback.user_id order by id desc limit 3";
                                    $feedback = $connect->query($sql);
                                    if($feedback->num_rows > 0){
                                        while($row = $feedback->fetch_assoc()){
                                            echo '
                                            <div class="col l-4 mt-16 m-8 m-l-2 c-12">
                                                <div class="container__feed-back-body-item" style="background-image: url('.$row['userThumbnail'].');">
                                                    <img src="./assest/img/icon-feedback.webp" alt="" class="container__feed-back-item-img">
            
                                                    <div class="container__feed-back-item-info">
                                                        <p class="item-info__name">'.$row['userName'].'</p>
                                                        <p class="item-info__day">'.$row['created_at'].'</p>
                                                    </div>
            
                                                    <div class="container__feed-back-item-text">
                                                        <h4 class="container__feed-back-item-text-header">" '.$row['title'].' "</h4>
                                                        <p class="container__feed-back-item-text-tittle" >'.$row['content'].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container__trending">
                <div class="grid wide">
                    <div class="container__content-body">
                        <h1 class="container__content-heading">TRENDING NOW</h1>
                        <div class="container__trending-list">
                            <div class="row">
                                <?php
                                    $sql = "select * from hotel order by rating desc limit 4";
                                    $hotels = $connect->query($sql);
                                    if($hotels->num_rows > 0){
                                        while($row = $hotels->fetch_assoc()){
                                            echo '
                                            <div class="col l-3 m-6 c-12">
                                                <div class="container__trending-item">
                                                    <div class="row">                                              
                                                            <div class="col l-4 container__trending-item-img">
                                                                <img src="'.$row['thumbnail'].'" alt="" class="trending-img">
                                                            </div>
                                                        
                                                            <div class="col l-8 container__trending-item-info">
                                                                <a href="" class="container__trending-item-heading">'.$row['name'].'</a>
                                                                <p class="container__trending-item-price">'.number_format($row['price']).' VNĐ</p>
                                                                
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            ';
                                        }
                                    }
                                ?>
                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

        <footer class="footer"> 
            <div class="footer-test">
                <div class="grid wide">
                    <div class="row">
                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <div class="header__body-logo">
                                    <img src="./assest/img/glogo.webp" alt="" class="logo__img">
                                    <span class="logo__tittle">travelix</span>
                                </div>
    
                                <p class="footer__item-des">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula pretium.
                                </p>
    
                                <ul class="footer__item-list">
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fas fa-globe"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <h3 class="footer__item-heading">BLOG POSTS</h3>
                                <div class="footer__item-blog">
                                    <div class="footer__item-blog-item">
                                        <div class="blog__img-test">
                                            <img src="./assest/img/blog tour.webp" alt="" class="footer__item-blog-item-img">
                                        </div>
                                        <div class="footer__item-blog-item-des">
                                            <a href="" class="footer__item-blog-item-link">Travel with us this year</a>
                                            <p class="footer__item-blog-item-day">July 20, 2021</p>
                                        </div>
                                    </div>
                                    <div class="footer__item-blog-item">
                                        <div class="blog__img-test">
                                            <img src="./assest/img/offder-blog.webp" alt="" class="footer__item-blog-item-img">
                                        </div>
                                        <div class="footer__item-blog-item-des">
                                            <a href="" class="footer__item-blog-item-link">Travel with us this year</a>
                                            <p class="footer__item-blog-item-day">July 20, 2021</p>
                                        </div>
                                    </div>
                                    <div class="footer__item-blog-item">
                                        <div class="blog__img-test">
                                            <img src="./assest/img/offer-blog-2.webp" alt="" class="footer__item-blog-item-img">
                                        </div>
                                        <div class="footer__item-blog-item-des">
                                            <a href="" class="footer__item-blog-item-link">Travel with us this year</a>
                                            <p class="footer__item-blog-item-day">July 20, 2021</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <h3 class="footer__item-heading">TAGS</h3>
                                <div class="footer__item-tags">
                                    <ul class="footer__item-tags-list">
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">design</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">fashion</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">music</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">video</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">party</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">photography</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">adventure</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">travel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <h3 class="footer__item-heading">CONTACT INFO</h3>
                                <div class="footer__item-contact">
                                    <ul class="footer__item-contact-list">
                                        <li class="footer__item-contact-item">
                                            <a href="" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">4127 Raoul Wallenber 45b-c Gibraltar</span>
                                            </a>
                                        </li>

                                        <li class="footer__item-contact-item">
                                            <a href="tel:+84 945 999 917" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">+84 945 999 917</span>
                                                    
                                            </a>
                                        </li>

                                        <li class="footer__item-contact-item">
                                            <a href="mailto:travelix@gmail.com" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">travelix@gmail.com</span>
                                                    
                                            </a>
                                        </li>

                                        <li class="footer__item-contact-item">
                                            <a href="" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">www.newbiedev.com</span>
                                                   
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="copy-right">Copyright © 2021 <a href="">3D1H</a></div>
            </div>
        </footer> 
    </div>
<style>
    .container__feed-back-item-text{
        width: 100%;
        background: rgba(49, 18, 75, 0.6);
    }

    
</style>
    

    <script src="./JS/test.js">
        
    </script>
</body>
</html>