<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seneth Ptoducts</title>
    <?php require('inc/links.php'); ?>
    <style>
        .product-line-container {
            margin: 50px auto;
        }
        .product-line-text h2 {
            font-size: 2.6rem;
            line-height: 1.2;
            color: #a4c639; /* Light Green */
            font-weight: 600;
        }
        .product-line-text h2 span {
            color: #006600; /* Dark Green */
        }
        .product-item {
            text-align: center;
            margin: 0%;
        }
        .product-item .product-image {
            padding: 50px 40px 0px 40px;
            border-radius: 10px;
            
        }
        .product-item .product-image img {
            width: 100%;
            max-width: 280px;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
            transform: scale(1.2);
            transition: transform 0.5s;
            box-shadow: rgba(0, 0, 0, 2) 0px 25px 20px -20px;
            z-index: 2;
        }
        .product-item .product-image img:hover{
          transform: scale(1.25);
        }
        .product-item p {
            margin-top: 35px;
            font-size: 1.3rem;
            color: #006600;
            font-weight: bold;
        }
        /* Custom background colors for each product */
        .bg-product-1 { background-color: #ffc107; } /* Example color */
        .bg-product-2 { background-color: #ff5722; }
        .bg-product-3 { background-color: #e91e63; }
        .bg-product-4 { background-color: #8d6e63; }
    </style>
</head>

<body class="index-page">

    <?php require('inc/header.php'); ?>
    <header id="header" class="header sticky-top">
    
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <img src="assets/img/logo.png" alt="">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">HOME<br></a></li>
                    <li><a href="about.php" >ABOUT US</a></li>
                    <li class="dropdown"><a style="cursor: pointer;"><span>OUR PRODUCTS</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li class="dropdown"><a href="our_product1.php"><span>Frozen No Preservatives</span></a></li>
                            <li class="dropdown"><a href="our_product2.php"><span>No Preservatives Nutritional Confectionaries</span></a></li>
                            <li class="dropdown"><a href="our_product3.php"><span>Organic No Preservatives</span></a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up mb-3 mb-md-0">Welcome to Seneth Exports Pvt Ltd</h1>
            <p data-aos="fade-up" data-aos-delay="100">
                With over 30 years in the Sri Lankan food industry, we offer natural, plant-based foods that promote health and harmony with nature. 
                Our preservative-free, vegan products are crafted with care and backed by top certifications, supporting your journey to wellness and spiritual growth.
            </p>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!--productnews section-->
    <section class="productSlideshowe">
        <div class="container d-flex justify-content-center " data-aos="fade-up">
            <div id="carouselExampleIndicators" class="carousel slide col-12 col-sm-10" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded">
                  <div class="carousel-item active">
                    <img src="assets/img/slide/one.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/slide/three.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/slide/two.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!--featuring pruducts-->

    <section class="home_product_featuring section">
        <div class="container-fluid product-line-container">
            <div class="row align-items-center mx-md-4 mx-sm-2">
                <!-- Text Section -->
                <div class="col-lg-2 text-start product-line-text mb-2" data-aos="fade-right" data-aos-delay="100">
                    <h2>CHOICE <br> <span>YOUR</span> <br>LINE</h2>
                </div>
                <!-- Product List Section -->
                <div class="col-lg-10">
                    <div class="row d-flex">
                            <div class="col-md-4 product-item" data-aos="fade-up" data-aos-delay="200">
                                <a href="our_product1.php">
                                <div class="product-image bg-product-1">
                                    <img src="assets/img/slide/one.png" alt="Sausage">
                                </div>
                                <p>Frozen No Preservatives</p>
                                </a>
                            </div>
                            <div class="col-md-4 product-item" data-aos="fade-up" data-aos-delay="300">
                                <a href="our_product2.php">
                                <div class="product-image bg-product-2">
                                    <img src="assets/image/main-products/catagory 2.png" alt="Sausage">
                                </div>
                                <p>No Preservatives Nutritional Confectionaries</p>
                                </a>
                            </div>   
                            <div class="col-md-4 product-item" data-aos="fade-up" data-aos-delay="400">
                                <a href="our_product3.php"> 
                                <div class="product-image bg-product-3">
                                    <img src="assets/image/main-products/ctagory3.png" alt="Sliced">
                                </div>
                                <p>Organic No Preservatives</p>
                                </a>
                            </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Capabilities">

        <div class="container section-title mt-4" data-aos="fade-up">
            <p><span>Our Capabilities </span> <span class="description-title">and Benefits</span></p>
        </div>

        <div class="container mb-2 align-item-center">

            <div class="row d-flex">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Decades of Expertise in the Food Industry.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Healing and Plant-Based Nutrition.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Natural, Preservative-Free Products.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="400" >
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Stringent Quality Standards and Certifications.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="500">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Promoting Holistic Health.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="600" >
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Commitment to Sustainability.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="700">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Innovation Backed by Generational Wisdom.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="800">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Spiritual and Compassionate Approach to Food.</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <?php require('inc/footer.php'); ?>
    
    
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>