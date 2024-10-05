 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Service</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assests/css/index.css">
</head>
<body>

<?php require_once("commons/navigation.php")
    ?>

<!-- Home Section -->
<section id="home" class="text-center hero">
    <h1>Welcome to Car Rental Service</h1>
    <p>Find the perfect car for your journey.</p>
    <a href="#carListing" class="btn btn-primary">Search Cars</a>
</section>

<!-- Car Listing Section -->
<section id="carListing" class="my-5">
    <div class="container">
        <h2 class="text-center">Available Cars</h2>
        <div class="form-row mb-4">
            <div class="form-group col-md-4">
                <label for="sortCars">Sort by</label>
                <select id="sortCars" class="form-control">
                    <option value="lowToHigh">Price: Low to High</option>
                    <option value="highToLow">Price: High to Low</option>
                </select>
            </div>
        </div>
        <div class="row" id="carCards">
            <!-- Car cards will be dynamically added here -->
        </div>
    </div>
</section>

<!-- Date Selection Section -->
<section id="dateSelection" class="my-5">
    <div class="container">
        <h2 class="text-center mb-4">Select Dates</h2>
        <form id="dateSelectionForm" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="pickupDate" class="form-label">Pickup Date and Time</label>
                    <input type="datetime-local" id="pickupDate" class="form-control" required>
                    <div class="invalid-feedback">
                        Please select a pickup date and time.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="returnDate" class="form-label">Return Date and Time</label>
                    <input type="datetime-local" id="returnDate" class="form-control" required>
                    <div class="invalid-feedback">
                        Please select a return date and time.
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5">Calculate Price</button>
            </div>
        </form>
        <div id="priceCalculation" class="mt-5">
            <h5 class="text-center">Price Summary</h5>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <p id="numberOfDays" class="mb-1">Number of Days: <span id="daysCount">0</span></p>
                    <p id="dailyRate" class="mb-1">Daily Rate: $<span id="dailyRateValue">0</span></p>
                    <p id="totalPrice" class="mb-1">Total Price: $<span id="totalPriceValue">0</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Section -->
<section id="booking" class="my-5">
    <div class="container">
        <h2 class="text-center mb-4">Booking Form</h2>
        <form id="bookingForm" class="needs-validation" novalidate>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="bookingId" class="form-label">Booking ID</label>
                    <input type="text" name="bookingId" class="form-control" id="bookingId" required>
                    <div class="invalid-feedback">
                        Please enter a valid booking ID.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="customerName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="customerName" required>
                    <div class="invalid-feedback">
                        Please enter your name.
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="customerEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="customerEmail" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="customerPhone" class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="customerPhone" required>
                    <div class="invalid-feedback">
                        Please enter a valid phone number.
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label for="customerAddress" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="customerAddress" required>
                    <div class="invalid-feedback">
                        Please enter your address.
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary btn-lg px-5">Confirm Booking</button>
            </div>
        </form>
    </div>
</section>

<!-- Additional Options Section -->
<section id="additionalOptions" class="my-5">
    <div class="container">
        <h2 class="text-center">Additional Options</h2>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="insurance" value="20">
                <label class="form-check-label" for="insurance">Add Insurance ($20)</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="gps" value="10">
                <label class="form-check-label" for="gps">Add GPS Rental ($10)</label>
            </div>
        </div>
    </div>
</section>

<!-- Car Details Modal -->
<div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Book Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Method Section -->
<section id="paymentMethod" class="my-5">
    <div class="container">
        <h2 class="text-center">Payment Method</h2>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="paymentMethod" id="creditCard" value="creditCard" required>
            <label class="form-check-label" for="creditCard">Credit Card</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="paymentMethod" id="cash" value="cash">
            <label class="form-check-label" for="cash">Cash on Pickup</label>
        </div>
    </div>
</section>

<!-- Confirmation Message Section -->
<div id="confirmationMessage" class="alert alert-success d-none text-center">
    <h4>Your booking has been confirmed!</h4>
    <p>Booking Reference Number: <span id="bookingReferenceNumber"></span></p>
</div>

<!-- Terms and Conditions Section -->
<section id="termsAndConditions" class="my-5">
    <div class="container">
        <h2 class="text-center">Terms and Conditions</h2>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="agreeTerms" required>
            <label class="form-check-label" for="agreeTerms">
                I agree to the <a href="#terms" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>.
            </label>
        </div>
    </div>
</section>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Here are the detailed terms and conditions...</p>
            </div>
        </div>
    </div>
</div>

   
   

<!-- Terms of Service Section -->
<section id="terms" class="my-5">
    <div class="container">
        <h2 class="text-center mb-4">Terms and Conditions</h2>
        <p>Welcome to our car rental service. By using our website and renting a vehicle, you agree to comply with and be bound by the following terms and conditions:</p>
        <h3>1. Rental Agreement</h3>
        <p>All rentals are subject to the terms of this agreement. By renting a vehicle, you acknowledge that you have read, understood, and agreed to these terms.</p>
        <!-- ... other terms content ... -->
    </div>
</section>

<!-- Privacy Policy Section -->
<section id="privacy" class="my-5">
    <div class="container">
        <h2 class="text-center mb-4">Privacy Policy</h2>
        <p>Your privacy is important to us. This Privacy Policy outlines how we collect, use, and protect your personal information when you use our car rental services.</p>
        <h3>1. Information We Collect</h3>
        <p>We may collect personal information from you when you make a reservation, including your name, email address, phone number, and payment information. We also collect data on how you interact with our website.</p>
        <!-- ... other privacy policy content ... -->
    </div>
</section>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <source src="assests/js/index.js" type="javascripty">

</body>
</html>