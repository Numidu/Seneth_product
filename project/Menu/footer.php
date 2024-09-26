<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Ensure the HTML and body take up the full height */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Main content area */
        .content {
            flex: 1;
        }

        /* Footer Styling */
        .footer {
            background-color: #8EACCD; /* Footer background color */
            padding: 40px 0;
            color: #FEF9D9;
        }

        .footer h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer p {
            margin: 0;
            font-size: 0.95rem;
        }

        .footer .icon {
            font-size: 1.8rem;
            margin-right: 15px;
            color: #FEF9D9;
        }

        .footer .social-links a {
            font-size: 1.5rem;
            margin-right: 15px;
            color: #DEE5D4;
            transition: color 0.3s ease-in-out;
        }

        .footer .social-links a:hover {
            color: #FEF9D9; /* Hover color */
        }

        .footer .address, .footer .contact, .footer .hours {
            margin-bottom: 20px;
        }

        .copyright {
            color: #DEE5D4;
            font-size: 0.85rem;
            border-top: 1px solid #DEE5D4;
            padding-top: 20px;
        }

        /* Scroll to Top Button */
        #scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #8EACCD;
            color: #FEF9D9;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease-in-out;
            z-index: 1000;
        }

        #scroll-top:hover {
            background-color: #FEF9D9;
            color: #8EACCD;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .footer h4 {
                font-size: 1rem;
            }

            .footer .icon {
                font-size: 1.5rem;
            }

            .footer .social-links a {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Main Content goes here -->
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-3">
                <!-- Address Section -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>A108 Adam Street<br>New York, NY 535022</p>
                    </div>
                </div>
                
                <!-- Contact Section -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com
                        </p>
                    </div>
                </div>
                
                <!-- Opening Hours Section -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat:</strong> 11AM - 23PM<br>
                            <strong>Sunday:</strong> Closed
                        </p>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
