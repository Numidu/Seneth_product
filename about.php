<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seneth Ptoducts</title>
    <?php require('inc/links.php'); ?>
    <style>
      body{
        background-color: #f5fdf5; /* Light background for the entire page */
      }
    </style>
  </head>

  <body class="index-page">
    <?php require('inc/header.php'); ?>
    <header id="header" class="header sticky-top">
      <div
        class="container position-relative d-flex align-items-center justify-content-between"
      >
        <a
          href="index.php"
          class="logo d-flex align-items-center me-auto me-xl-0"
        >
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <img src="assets/img/logo.png" alt="" />
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
              <a href="index.php">HOME<br /></a>
            </li>
            <li><a href="about.php" class="active">ABOUT US</a></li>
            <li class="dropdown">
              <a style="cursor: pointer"
                ><span>OUR PRODUCTS</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i
              ></a>
              <ul>
                <li class="dropdown">
                  <a href="our_product1.php"
                    ><span>Frozen No Preservatives</span></a
                  >
                </li>
                <li class="dropdown">
                  <a href="our_product2.php"
                    ><span
                      >No Preservatives Nutritional Confectionaries</span
                    ></a
                  >
                </li>
                <li class="dropdown">
                  <a href="our_product3.php"
                    ><span>Organic No Preservatives</span></a
                  >
                </li>
              </ul>
            </li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title">
        <h2>About Us<br /></h2>
        <p>
          <span>Learn More</span>
          <span class="description-title">About Us</span>
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container vision-mission-section">
        <div class="row gy-4">
        <div class="col-md-12 mb-5 we-are">
          <h2>We Are,</h2>
          
          <!-- Short paragraph -->
          <p id="shortText">
              Seneth Exports pvt Ltd backed by the experience of more than three
              decades in the Sri Lankan food Industry both for local market and
              Exports, Comes as a collection of Healing foods that the most
              sensitive inner system soothes, and heals having in mind foremost
              the vegan nutrition.
              <a id="seeMoreBtn" class="seeMoreBtn" onclick="toggleText()">See More</a> <!-- 'See More' button added here -->
          </p>
          
          <!-- Hidden paragraph -->
          <p id="moreText" style="display: none;">
              If we are nothing but carbon, hydrogen and oxygen, The science of interdependence of living cells of all
              organs of all living beings and the prime intention of sustaining
              by only the plant based diet to nourish and protect until this
              bundle of energy dissolves to the Mother Earth for circulation. My
              father in mid sixties while walking, showed his cupped hand
              saying, The soil this cupped hand can contain is what we are
              Originated from the same elements, nourished by the same elements,
              and perished to the same Earth! one day. And what is there to grab
              but to live in Harmony with Nature. His first action of the day
              was to bow down to the rising sun that keeps everything alive!
              Collected to a basket of foods, Combining, Natural, Healthy, vegan
              Healing food solutions without preservatives Food, manufactured
              under stringent quality conditions supported by the Best of
              Certifications Towards maintaining good health avoiding
              degenerative diseases. And a mind aligned towards spirituality to
              discover one's own ability to unfold divinity within oneself. No
              one can do this for you as it is a journey of self-searching for
              Truth, unwinding the mind engrossed for an innumerable time with
              greed, hatred, and illusion until one develops the ability to
              see things as they truly are.
              <a id="seeLessBtn" class="seeMoreBtn" onclick="toggleText()">See Less</a> <!-- 'See Less' button added here -->
          </p>
        </div>

        <script>
          function toggleText() {
            var moreText = document.getElementById("moreText");
            var seeMoreBtn = document.getElementById("seeMoreBtn");
            var shortText = document.getElementById("shortText");
            var seeLessBtn = document.getElementById("seeLessBtn");

            if (moreText.style.display === "none") {
              moreText.style.display = "inline";
              seeMoreBtn.style.display = "none"; // Hide the 'See More' button
            } else {
              moreText.style.display = "none";
              seeMoreBtn.style.display = "inline"; // Show the 'See More' button again
            }
          }
        </script>


          <div class="row mb-5 justify-content-center mx-auto">
            <div class="col-lg-4 text-center">
              <img src="assets/img/vision-icon.png" alt="Vision Icon" />
            </div>
            <div class="col-lg-6 inner">
              <h2>Our Vision</h2>
              <p>
                Is to reach the world of veganism with a range of healing food
                created with the best of natural ingredients inherent to the
                Pearl of the Indian Ocean reaching consumers who look for the
                Best in plant based food.
              </p>
            </div>
          </div>

          <div class="row mb-5 justify-content-center mx-auto">
            <div class="col-lg-4 text-center order-md-last">
              <img src="assets/img/mission-icon.png" alt="Vision Icon" />
            </div>
            <div class="col-lg-6 inner">
              <h2>Our Mission</h2>
              <p>
                Promoting plant based in higher nutrition, kinder to the
                sensitive inner system to heal and overcome toxicity in body and
                mind to be compassionate in thoughts, words, and actions to
                balance the chemical profile of the brain whilest cleansing, the
                whole body system.
              </p>
            </div>
          </div>

          <div class="col-md-12 we-are">
            <h2>People oriented journey</h2>
            <p>
              The three Directors who represent three generations share the
              vividness and enthusiasm of good food as organic and healthy
              offerings Dulani Weerasinghe's strongly pursuing on organic and
              healthy food has been a Great Inspiration for the creation of
              Seneth Exports pvt Ltd, supported by the knowledge gained by
              learning Holistic nutrition program of Nutrophoria College of
              Holistic nutrition of Canada by Sunanda Weerasinghe.
            </p>
            <h5>The products</h5>
            <p>
              Ready to eat, Ready to use yet No preservatives minimal processing
              to enhance your main meals Creating A feast of Nature! On the
              table.
            </p>
          </div>
        </div>
      </div>

      <div class="container my-5 managment-team">
        <h2 class="text-center mb-5">Management Team</h2>
        <div class="row text-center">
          <!-- Team Member 1 -->
          <div class="col-lg-4 team-member">
            <div class="member">
              <img
                src="assets/img/director bord/member-1.jpg"
                alt="Team Member 1"
                class="img-fluid rounded-circle mb-3"
                style="width: 200px; height: 200px"
              />
              <h5>Sunanda Weerasinghe</h5>
              <p class="position">Managing Director</p>
              <p class="description">
                Past President Sri lanka <br />
                food processor association 2014/2015
              </p>
            </div>
          </div>
          <!-- Team Member 2 -->
          <div class="col-lg-4 team-member">
            <div class="member">
              <img
                src="assets/img/director bord/member-2.jpg"
                alt="Team Member 2"
                class="img-fluid rounded-circle mb-3"
                style="width: 200px; height: 200px"
              />
              <h5>Dulani Weerasinghe</h5>
              <p class="position">Director</p>
            </div>
          </div>
          <!-- Team Member 3 -->
          <div class="col-lg-4 team-member">
            <div class="member">
              <img
                src="assets/img/director bord/member-3.jpg"
                alt="Team Member 3"
                class="img-fluid rounded-circle mb-3"
                style="width: 200px; height: 200px"
              />
              <h5>Rahal Dulneth Silva</h5>
              <p class="position">Director</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <?php require('inc/footer.php'); ?>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
