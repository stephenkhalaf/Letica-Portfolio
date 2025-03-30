<?php include "api/config/database.php" ?>
<?php
$sql = mysqli_query($conn, "SELECT * FROM pictures WHERE type = 'Selfies' LIMIT 1");
$user = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <met#aeb3b8et="utf-8">
        <title>Letica Robin</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
         <link rel="stylesheet" href="css/chat.css">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 sticky-lg-top vh-100">
                    <div class="d-flex flex-column h-100 text-center overflow-auto shadow" style="margin-top:5px;"> 
                        <img class="w-100 img-fluid mb-4" src="uploads/<?php echo $user['image']  ?>" alt="Image" style="width:250px;height:350px;object-fit:cover;">
                        <h1 class="text-primary mt-2">Letica Robin</h1>
                        <div class="mb-4" style="height: 22px;">
                            <h4 class="typed-text-output d-inline-block text-light"></h4>
                            <div class="typed-text d-none">Lover of Life, Hater of Boring, Infectious Laughter</div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto mb-3">
                            <a class="btn btn-secondary btn-square mx-1" href="https://x.com/stephen_khalaf"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" href="https://www.facebook.com/profile.php?id=100008812745092"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" href="https://www.linkedin.com/in/stephen-olumide-3971bb209/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" href="https://www.instagram.com/khalafstani/"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-top">
                            <a href="#contact" class="btn w-50 btn-scroll">Contact Me</a>
                            <a href="api/" class="btn w-50 btn-scroll">Admin</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
               
                    <!-- Portfolio Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s" id="portfolio">
                        <h1 class="title pb-3 mb-5">Portfolio</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 text-center mb-2">
                                        <ul class="list-inline mb-4" id="portfolio-flters">
                                            <li class="btn btn-secondary active"  data-filter="*"><i class="fa fa-star me-2"></i>All</li>
                                            <li class="btn btn-sm btn-outline-primary m-1" data-filter=".Selfies"><i class="fa fa-mobile-alt me-2"></i>Selfies</li>
                                            <li class= "btn btn-sm btn-outline-primary m-1" data-filter=".Quotes"><i class="fa fa-laptop-code me-2"></i>Quotes</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row portfolio-container">

                                
                                    <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM pictures");

                                        $limit = 4;
                                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $offset = ($page - 1) * $limit;
                                        $total = mysqli_num_rows($sql);
                                        $totalPages = ceil($total / $limit);

                                        $sql = mysqli_query($conn, "SELECT * FROM pictures ORDER BY id DESC LIMIT $limit OFFSET $offset");
                                        if(mysqli_num_rows($sql) > 0){
                                            while($row = mysqli_fetch_assoc($sql)){

                                        ?>
                                    <div class="col-md-6 mb-4 portfolio-item <?php echo $row['type'] ?>">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="uploads/<?php echo $row['image']  ?>" alt="" style="width:292px; height:292px; object-fit:cover">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a href="uploads/<?php echo $row['image']  ?>" data-lightbox="portfolio">
                                                    <i class="bi bi-plus text-light"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="pagination" id="pagination">
                                  <?php if ($page > 1): ?>
                                        <a href="index.php?page=<?= $page - 1; ?>#portfolio" onclick="scrollToPagination()">Previous</a>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <?php if ($i == $page): ?>
                                            <strong><?= $i; ?></strong>
                                        <?php else: ?>
                                            <a href="index.php?page=<?= $i; ?>#portfolio" onclick="scrollToPagination()"><?= $i; ?></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($page < $totalPages): ?>
                                        <a href="index.php?page=<?= $page + 1; ?>#portfolio" onclick="scrollToPagination()">Next</a>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </section>
                    <!-- Portfolio End -->

                    <!-- Contact Start -->
                    <section class="py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
                        <h1 class="title pb-3 mb-5">Contact Me</h1>
                        <div id="success"></div>
                        <form id="contactForm" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 bg-secondary" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" id="subject" name="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0 bg-secondary" placeholder="Leave a message here" id="message" name="message" style="height: 200px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="sendMessageButton">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Contact End -->

                    <!-- Footer Start -->
                    <section class="wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-secondary text-light text-center p-5">
                            <div class="d-flex justify-content-center mb-4">
                                <a class="btn btn-dark btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-dark btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <a class="text-light px-3 border-end" href="#">Privacy</a>
                                <a class="text-light px-3 border-end" href="#">Terms</a>
                                <a class="text-light px-3 border-end" href="#">FAQs</a>
                                <a class="text-light px-3" href="#">Help</a>
                            </div>
							
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							<p class="m-0">&copy; All Rights Reserved. Designed by <a href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </section>
                    <!-- Footer End -->
                </div>
            </div>
        </div>


    <!-- Chat Icon and Container -->
    <div class="chat-icon" id="chatIcon" >
        <img src="icons/chat.png" alt="Chat Icon" >
    </div>
    <div class="chat-container" id="chatContainer">
        <div class="chat-header">
            <h2> Chat App</h2>
        </div>
        <div class="chat-messages" id="chatMessages"></div>
        <div class="typing-indicator" id="typing-indicator">
            <span>Wait a minute...</span>
        </div>
        <div class="chat-input">
            <input type="text" id="messageInput" placeholder="Type a message..." autocomplete="off">
            <button id="sendButton">
            <svg viewBox="0 0 24 24">
                    <path d="M2 21l21-9L2 3v7l15 2-15 2v7z"/>
                </svg>
            </button>
        </div>
    </div>

        
        <!-- Back to Top -->
        <!-- <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a> -->
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/typed/typed.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="Javascript/message.js"></script>
        <script src="Javascript/chat.js"></script>
    </body>

    <script>
        function scrollToPagination() {
        const pagination = document.getElementById('portfolio');
        pagination.scrollIntoView({
            behavior: 'smooth'
        });
    }
    </script>
</html>
