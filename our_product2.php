<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seneth Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <?php require('inc/links.php'); ?>
    <style>
        .product-img {
            max-height: 100%;
            width: 100%;
            object-fit: contain;
            padding: 5px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
            border-radius: 15px;
            transition: transform 0.5s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }
        .text-start {
            text-align: left !important;
        }
        .card-footer h4 {
            font-size: 1.2rem;
            margin-right: 15px;
        }
        .btn-link {
            text-decoration: none;
            color: #ffa500;
        }
        .btn-link:hover {
            color: #ff8c00;
        }
    </style>
</head>

<body class="index-page">

    <?php require('inc/header.php'); ?>
    
    <header id="header" class="header sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="assets/img/logo.png" alt="">
            </a>
           
            
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" >HOME<br></a></li>
                    <li><a href="about.php" >ABOUT US</a></li>
                    <li class="dropdown"><a style="cursor: pointer;" class="active"><span>OUR PRODUCTS</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
    
  
    <section id="products" class="products section">
        <div class="container section-title">
            <h2>Our Products<br></h2>
            <p><span>No Preservatives</span> <span class="description-title">Nutritional Confectionaries</span></p>
        </div>

        <div class="container">
            <div class="row d-flex">
                <?php
                include('connection/connection.php'); 
                $sql = "SELECT id, name, image FROM Nutritional";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='main-card col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-5 d-flex'>";
                        echo "<a href='our_product_description2.php?id=" . $row['id'] . "&category=NutritionalDetails'>";
                        echo "<div class='card d-flex flex-column align-items-center p-3 w-100 mx-2' style='border-radius: 15px;  height: 100%;'>";
                        
                        // Product image centered vertically
                        echo "<div class='image-container d-flex align-items-center justify-content-center' style='height: 250px;'>";
                        echo "<img src='project/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='product-img mb-4'/>";
                        echo "</div>";
    
                        // Product name on one line, "Read More" on another line
                        echo "<div class='card-footer mt-auto w-100 text-center'>";
                        echo "<h4 class='text-start mb-3' style='font-size: 1.1rem;'>" . htmlspecialchars($row['name']) . "</h4>";
                        echo "<a href='our_product_description2.php?id=" . $row['id'] . "&category=NutritionalDetails' class='fw-bold' style='color: #ffa500;'>Read More</a>";
                        echo "</div>";
    
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No products found.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <?php require('inc/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    

    <!-- Your custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
