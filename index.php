<?php
include 'db.php';

$settingsSql = "SELECT * FROM site_settings WHERE id = 1";
$settingsResult = mysqli_query($conn, $settingsSql);
$siteSettings = mysqli_fetch_assoc($settingsResult);

if (!$siteSettings) {
    die("Website settings not found.");
}


$menuSql = "SELECT * FROM menus ORDER BY sort_order ASC";
$menuResult = mysqli_query($conn, $menuSql);
?>

<?php
include 'db.php';

$sql = "SELECT * FROM menus ORDER BY sort_order ASC";
$result = mysqli_query($conn, $sql);
?>

<?php
include 'db.php';

$sql = "SELECT * FROM banners";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
content="width=device-width,initial-scale=1.0">

    <title><?php echo htmlspecialchars($siteSettings['academy_name']); ?></title>

    <link rel="stylesheet"href="style.css">

    <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet">
     
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body> 
    <!--Header-->
<header>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        
        <div class="container">

            
               
<a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">

    <img src="images/logo.jpg"
         alt="<?php echo htmlspecialchars($siteSettings['academy_name']); ?>"
         width="45"
         class="me-2">

    <?php echo htmlspecialchars($siteSettings['academy_name']); ?>

</a>

              

            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

            
<ul class="navbar-nav ms-auto">

    <?php while ($row = mysqli_fetch_assoc($menuResult)) { ?>

        <li class="nav-item <?php echo ($row['menu_name'] == 'Join Now') ? 'ms-lg-2' : ''; ?>">

            <a
                class="<?php echo ($row['menu_name'] == 'Join Now') ? 'btn btn-primary' : 'nav-link'; ?>"
                href="<?php echo htmlspecialchars($row['menu_link']); ?>"
            >
                <?php echo htmlspecialchars($row['menu_name']); ?>
            </a>

        </li>

    <?php } ?>

</ul>


            </div>

        </div>

    </nav>
</header>
    

    
   <!-- Notice Bar -->
<section class="notice-bar">

    <div class="notice-title">
        LATEST UPDATES
    </div>

    <div class="notice-content">
        <div class="notice-moving-text">
            Admissions Open for UPSC Foundation Batch 2026
            &nbsp;&nbsp; | &nbsp;&nbsp;
            Free Demo Classes Available
            &nbsp;&nbsp; | &nbsp;&nbsp;
            New Batch Starting Soon
            &nbsp;&nbsp; | &nbsp;&nbsp;
            Start Your Civil Services Preparation Today
        </div>
    </div>

</section>
   
<!--Hero-->
<section class="hero-section">

    <div class="container">

        <div class="row align-items-center">

            <!-- Left Side -->
            <div class="col-lg-7">

                <h1 class="display-4 fw-bold">
                    <?php echo nl2br(htmlspecialchars($siteSettings['home_heading'])); ?>
                </h1>

                <p class="lead">
                    <?php echo nl2br(htmlspecialchars($siteSettings['home_description'])); ?>
                </p>

                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#demoModal">
                    Book Free Demo
                </button>

            </div>

            <!-- Right Side -->
            <div class="col-lg-5">

                <img src="images/padho.jpg"
                     class="img-fluid"
                     alt="IAS preparation">

            </div>

        </div>

    </div>

</section>


    <!--Features-->
    
<section class="features-section">

    <div class="container">

        <div class="text-center mb-5">

        </div>

        <div class="row g-4">

            <!-- Features -->
<section class="features-section">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Features</h2>
            <p>Everything you need for your UPSC preparation.</p>
        </div>

        <div class="row g-3">

            <!-- Feature 1 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h5>Expert Faculty</h5>
                    <p>Learn from experienced faculty.</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                    <h5>Personal Guidance</h5>
                    <p>Get proper preparation guidance.</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                    <h5>Test Series</h5>
                    <p>Regular tests for practice.</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                    <h5>Study Material</h5>
                    <p>Quality notes and resources.</p>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-book-open"></i></div>
                    <h5>Current Affairs</h5>
                    <p>Daily current affairs updates.</p>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-laptop"></i></div>
                    <h5>Online Classes</h5>
                    <p>Learn from anywhere.</p>
                </div>
            </div>

            <!-- Feature 7 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-bullseye"></i></div>
                    <h5>Exam Strategy</h5>
                    <p>Smart strategies for UPSC.</p>
                </div>
            </div>

            <!-- Feature 8 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-book"></i></div>
                    <h5>NCERT Guidance</h5>
                    <p>Build your basic concepts.</p>
                </div>
            </div>

            <!-- Feature 9 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                    <h5>Answer Writing</h5>
                    <p>Improve your writing skills.</p>
                </div>
            </div>

            <!-- Feature 10 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-trophy"></i></div>
                    <h5>Topper Guidance</h5>
                    <p>Learn from successful students.</p>
                </div>
            </div>

            <!-- Feature 11 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-chart-column"></i></div>
                    <h5>Performance Analysis</h5>
                    <p>Track your preparation.</p>
                </div>
            </div>

            <!-- Feature 12 -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-handshake"></i></div>
                    <h5>Doubt Support</h5>
                    <p>Clear your doubts regularly.</p>
                </div>
            </div>

        </div>

    
    <!-- Enquiry Section -->
<section class="enquiry-section">

    <div class="container">

        <div class="row align-items-center">

            <!-- Left Side -->
            <div class="col-lg-6">

                <h2 class="fw-bold">
                    Get Free Career Counselling
                </h2>

                <p>
                    Confused about your UPSC preparation?
                    Talk to our counsellors and get the right guidance.
                </p>

                <ul>
                    <li>Personalised guidance</li>
                    <li>Course and batch information</li>
                    <li>Preparation strategy</li>
                    <li>Free counselling session</li>
                </ul>

            </div>

            <!-- Right Side - Form -->
            <div class="col-lg-6">

                <div class="enquiry-box">

                    <h4 class="fw-bold mb-4">
                        Enquire Now
                    </h4>

                  <form action="submit_enquiry.php" method="POST" enctype="multipart/form-data">

    <input 
        type="text"
        name="name"
        class="form-control mb-3"
        placeholder="Your Name"
        required
        minlength="3"
    >

    <input 
        type="email"
        name="email"
        class="form-control mb-3"
        placeholder="Email Address"
        required
    >

    <input 
        type="tel"
        name="mobile"
        class="form-control mb-3"
        placeholder="Mobile Number"
        pattern="[0-9]{10}"
maxlength="10"
minlength="10"
oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
required
    >

    <select name="course" class="form-select mb-3" required>

    <option value="" selected disabled>Select Course</option>

    <option value="UPSC Foundation">UPSC Foundation</option>
    <option value="UPSC Prelims">UPSC Prelims</option>
    <option value="UPSC Mains">UPSC Mains</option>


    </select>


     <input 
        type="file"
        name="image_path"
        class="form-control mb-3"
         required
    >

    <button type="submit" class="btn btn-primary w-100">
        Get Free Counselling
    </button>

</form>
                </div>

            </div>

        </div>

    </div>

</section>

    
    
    <!--Slider + News-->
<section class="slider-news-section">

    <div class="container">

        <div class="row g-4">

            <!-- Image Slider -->
            <div class="col-lg-8">

                <div id="iasCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">

<div class="carousel-inner">

    <?php
    $first = true;

    while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">

            <img
                src="<?php echo htmlspecialchars($row['image_path']); ?>"
                class="d-block w-100"
                alt="IAS Students">

        </div>

    <?php
        $first = false;
    }
    ?>

</div>

                    <!-- Previous -->
                    <button 
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#iasCarousel"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <!-- Next -->
                    <button 
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#iasCarousel"
                        data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                </div>

            </div>


            <!-- News Panel -->
            <div class="col-lg-4">

                <div class="news-box">

                    <h4 class="fw-bold mb-3">
                        IAS News & Updates
                    </h4>

                    <div class="news-list">

    <div class="news-moving">

        <p>UPSC Civil Services Examination 2026 updates</p>

        <p>New Foundation Batch admissions open</p>

        <p>Free demo classes available</p>

        <p>Current Affairs sessions every week</p>

        <p>UPSC preparation guidance for beginners</p>

        <p>UPSC preparation strategy sessions available</p>

    </div>

</div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Our Achievers -->
<section class="achievers-section">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Achievers</h2>
            <p>Our students who achieved success in Civil Services.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="achiever-card">

                    <div class="achiever-image">
                        <img src="images/bacche4.jpg" alt="Our Achiever">
                    </div>

                    <div class="achiever-content">
                        <h5>IAS Achiever</h5>
                        <p>UPSC AIR 50 </p>
                    </div>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="achiever-card">

                    <div class="achiever-image">
                        <img src="images/bacche5.jpg" alt="Our Achiever">
                    </div>

                    <div class="achiever-content">
                        <h5>IAS Achiever</h5>
                        <p>UPSC AIR 6 </p>
                    </div>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="achiever-card">

                    <div class="achiever-image">
                        <img src="images/bacche6.jpg" alt="Our Achiever">
                    </div>

                    <div class="achiever-content">
                        <h5>IAS Achiever</h5>
                        <p>UPSC AIR 9 </p>
                    </div>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="achiever-card">

                    <div class="achiever-image">
                        <img src="images/bacche7.jpg" alt="Our Achiever">
                    </div>

                    <div class="achiever-content">
                        <h5>IAS Achiever</h5>
                        <p>UPSC AIR 5 </p>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

    <!--Achievers-->
    <section>
    </section> 

    <!--Moving resources-->
<section class="resources-section">

    <div class="container">

        <div class="text-center mb-4">
            <h2 class="fw-bold">Our Resources</h2>
            <p>Explore our learning resources and study material.</p>
        </div>

        <marquee behavior="scroll" direction="left" scrollamount="15">

            <img src="images/a1.jpg" alt="Resource">
            <img src="images/a2.jpg" alt="Resource">
            <img src="images/a3.jpg" alt="Resource">
            <img src="images/a4.jpg" alt="Resource">
            <img src="images/a5.jpg" alt="Resource">
            <img src="images/a6.jpg" alt="Resource">

        </marquee>

    </div>

</section>

    <!--FAQ-->
    <!-- FAQ -->
<section class="faq-section">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p>Find answers to common questions about our UPSC courses.</p>
        </div>

        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">
                        What courses does Vedant IAS Academy offer?
                    </button>
                </h2>

                <div id="faq1" class="accordion-collapse collapse show"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We offer UPSC Foundation, Prelims and Mains preparation courses.
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">
                        Are demo classes available?
                    </button>
                </h2>

                <div id="faq2" class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, students can book a free demo class before enrolling.
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">
                        Do you provide study material?
                    </button>
                </h2>

                <div id="faq3" class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, students receive study material and preparation resources.
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq4">
                        How can I contact the academy?
                    </button>
                </h2>

                <div id="faq4" class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can contact our academy through the enquiry form or counselling section.
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

    <!--footer-->
<footer class="footer-section">

    <div class="container">

        <div class="row g-4">

            <!-- About -->
            <div class="col-lg-4 col-md-6">
                <h4>Vedant IAS Academy</h4>
                <p>
                    Prepare for the Civil Services Examination
                    with expert guidance, quality study material
                    and structured preparation.
                </p>
            </div>


            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5>Quick Links</h5>

                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>


            <!-- Courses -->
            <div class="col-lg-3 col-md-6">
                <h5>Our Courses</h5>

                <ul class="footer-links">
                    <li><a href="#">UPSC Foundation</a></li>
                    <li><a href="#">UPSC Prelims</a></li>
                    <li><a href="#">UPSC Mains</a></li>
                    <li><a href="#">Test Series</a></li>
                </ul>
            </div>


            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <h5>Contact Us</h5>

                <p><i class="fa-solid fa-location"></i> Delhi, India</p>
                <p><i class="fa-solid fa-phone"></i> +91 98765 43210</p>
                <p><i class="fa-solid fa-circle-info"></i>info@vedantiasacademy.com</p>
            </div>

        </div>


        <hr>


        <div class="footer-bottom text-center">
            <p>
                © 2026 Vedant IAS Academy. All Rights Reserved.
            </p>
        </div>

    </div>

</footer>

    <!-- Free Demo -->
<section class="free-demo-section">

    <div class="container">

        <div class="demo-box text-center">

            <h2 class="fw-bold">
                Book Your FREE Demo
            </h2>

            <p>
                Experience our teaching methodology before you enroll.
            </p>

            <button 
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#demoModal">
                Book Free Demo
            </button>

        </div>

    </div>

</section>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Free Demo Modal -->
<div class="modal fade" id="demoModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Book Your FREE Demo
                </h5>

                <button 
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>
<div class="modal-body">

    
<form action="submit_enquiry.php" method="POST">

    <label class="form-label">Your Name <span class="text-danger">*</span></label>
    <input
        type="text"
        name="name"
        class="form-control mb-3"
        placeholder="Your Name"
        required
        minlength="3"
    >

    <label class="form-label">Email Address <span class="text-danger">*</span></label>
    <input
        type="email"
        name="email"
        class="form-control mb-3"
        placeholder="Email Address"
        required
    >

    <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
    <input
        type="tel"
        name="mobile"
        class="form-control mb-3"
        placeholder="Mobile Number"
        pattern="[0-9]{10}"
        maxlength="10"
        minlength="10"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
        required
    >

    <label class="form-label">Select Course <span class="text-danger">*</span></label>
    <select name="course" class="form-select mb-3" required>
        <option value="" selected disabled>Select Course</option>
        <option value="UPSC Foundation">UPSC Foundation</option>
        <option value="UPSC Prelims">UPSC Prelims</option>
        <option value="UPSC Mains">UPSC Mains</option>
    </select>

    <p class="text-muted small">
        <span class="text-danger">*</span> Required fields
    </p>

    <button type="submit" class="btn btn-primary w-100">
        Submit
    </button>

</form>

</div>

        </div>

    </div>

</div>
    </body>
</html>