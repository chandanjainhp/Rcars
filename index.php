<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Service</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
 
</head>
<body>

<?php require_once("commons/navigation.php"); ?>

<!-- Home Section -->
<section id="home" class="text-center hero">
    <h1>Welcome to Car Rental Service</h1>
    <p>Find the perfect car for your journey.</p>
    <a href="#carListing" class="btn btn-primary">Search Cars</a>
</section>

<div class="container">
  <div class="jumbotron">
  <section id="howItWorks" class="my-5">
    <div class="container">
        <h2 class="section-title">How It Works</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <h4>Choose Car</h4>
                <p>Select from a wide range of vehicles.</p>
            </div>
            <div class="col-md-4">
                <h4>Book</h4>
                <p>Fill in your details and confirm your booking.</p>
            </div>
            <div class="col-md-4">
                <h4>Enjoy</h4>
                <p>Drive away and enjoy your journey!</p>
            </div>
        </div>
    </div>
</section>


<!-- Available Car Types -->
<section id="carTypes" class="my-5">
    <div class="container">
        <h2 class="section-title">Types of Available Car </h2>
        <ul class="list-group">
            <li class="list-group-item"><i class="fas fa-car"></i> Economy</li>
            <li class="list-group-item"><i class="fas fa-car-suv"></i> SUV</li>
            <li class="list-group-item"><i class="fas fa-car-side"></i> Luxury</li>
      
        </ul>
    </div>
</section>

<!-- Car Listing Section -->



<!-- Car Details Modal -->
<div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carDetailsModalLabel">Car Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalCarImage" class="img-fluid" src="" alt="">
                <h5 id="modalCarModel"></h5>
                <p id="modalCarPrice"></p>
                <p id="modalCarDetails"></p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Search -->
<section id="quickSearch" class="my-5">

</section>


<!-- How It Works -->

<!-- About Us -->
<section id="about" class="my-5">
    <div class="container">
        <h2 class="section-title">About Us</h2>
        <p>We are a leading car rental service offering a wide range of vehicles to suit every need. Our mission is to provide affordable and convenient car rental options to our customers.</p>
    </div>
</section>

<!-- Contact Information -->
<section id="contact" class="my-5">
    <div class="container">
        <h2 class="section-title">Contact Information</h2>
        <p>Email: support@carrental.com</p>
        <p>Phone: +1 234 567 8900</p>
    </div>
</section>
</div>


<?php require_once("commons/footer.php"); ?>
<script src="assets/js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>
