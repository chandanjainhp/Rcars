<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once("commons/navigation.php"); ?>

    <div class="container">
        <h2 class="text-center">Available Cars</h2>

        <!-- Search and Filter Section -->
        <div class="row mb-4">
            <div class="col-md-12">
                <input type="text" id="searchBar" class="form-control" placeholder="Search for cars by model" onkeyup="filterCars()">
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="sortCars">Sort by</label>
                <select id="sortCars" class="form-control" onchange="sortCars()">
                    <option value="lowToHigh">Price: Low to High</option>
                    <option value="highToLow">Price: High to Low</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <label>Filter by Car Type</label>
                <div class="d-flex flex-column">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="SUV" id="typesSUV" onclick="filterCars()">
                        <label class="form-check-label" for="typesSUV">SUV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sedan" id="typesSedan" checked onclick="filterCars()">
                        <label class="form-check-label" for="typesSedan">Sedan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Hatchback" id="typesHatchback" checked onclick="filterCars()">
                        <label class="form-check-label" for="typesHatchback">Hatchback</label>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <label for="priceRange">Filter by Price Range</label>
                <input type="range" class="form-range" id="priceRange" min="50" max="500" step="50" onchange="filterCars()">
                <span id="priceRangeValue">$50 - $500</span>
            </div>
        </div>

        <!-- Date Selection -->
        <div class="row mb-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <label for="pickupDate1" class="form-label">Pickup Date</label>
                        <input type="datetime-local" id="pickupDate1" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <label for="pickupDate2" class="form-label">Return Date</label>
                        <input type="datetime-local" id="pickupDate2" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Car Cards -->
        <div class="row" id="carCards">
            <!-- Car cards will be dynamically added here via JavaScript -->
        </div>

        <!-- No Results Message -->
        <div id="noResults" class="alert alert-danger d-none text-center mt-4">No cars match your search/filter.</div>
    </div>

    <!-- Car Details Modal -->
    <div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carDetailsModalLabel">Car Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalCarImage" class="img-fluid" src="" alt="Car Image">
                    <h5 id="modalCarModel"></h5>
                    <p id="modalCarPrice"></p>
                    <p id="modalCarSpecs"></p>
                    
                    <!-- Additional Options -->
                    <h6 class="mt-3">Additional Options</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="insurance">
                        <label class="form-check-label" for="insurance">Insurance (+$20)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gps">
                        <label class="form-check-label" for="gps">GPS (+$10)</label>
                    </div>

                    <!-- Payment Method -->
                    <h6 class="mt-3">Payment Method</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="creditCard" required>
                        <label class="form-check-label" for="creditCard">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>

                    <!-- Terms and Conditions -->
                    <h6 class="mt-3">Terms and Conditions</h6>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">I agree to the terms and conditions.</label>
                    </div>

                    <!-- Price Summary -->
                    <h6 class="mt-3">Price Summary</h6>
                    <p>Number of Days: <span id="numDays">0</span></p>
                    <p>Daily Rate: $<span id="dailyRate">0</span></p>
                    <p>Total Price: $<span id="totalPrice">0</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmBooking">Book Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Message Section -->
    <section id="confirmationMessage" class="my-5 d-none">
        <div class="container">
            <h2 class="text-center">Booking Confirmed!</h2>
            <p>Your booking reference number is: <span id="bookingReferenceNumber"></span></p>
            <p>Thank you for choosing our car rental service!</p>
        </div>
    </section>

    <!-- Terms Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Here are the detailed terms and conditions for using our service.</p>
                    <!-- Add detailed terms here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Form -->
    <!-- Booking Form -->
<section id="bookingForm" class="my-5">
    <div class="container">
        <h2 class="text-center mb-4">Booking Form</h2>
        <form id="bookingDetailsForm" class="needs-validation" novalidate>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="bookingId" class="form-label">Booking ID</label>
                    <input type="text" class="form-control" id="bookingId" required>
                    <div class="invalid-feedback">Please enter your booking ID.</div>
                </div>
                <div class="col-md-6">
                    <label for="customerName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="customerName" required>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="customerEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="customerEmail" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="col-md-6">
                    <label for="customerPhone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="customerPhone" required>
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="customerAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="customerAddress" required>
                    <div class="invalid-feedback">Please enter your address.</div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary btn-lg px-5">Confirm Booking</button>
            </div>
        </form>
    </div>
</section>


    <!-- Update Booking Details Section -->
    <section id="updateBookingDetails" class="my-5">
        <div class="container">
            <h2 class="text-center mb-4">Update Booking Details</h2>
            <form id="updateBookingForm" class="needs-validation" novalidate>
        
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="bookingid" class="form-label">Booking id</label>
                        <input type="text" class="form-control" id="idbooking" required>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="updateCustomerName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updateCustomerName" required>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="updateCustomerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="updateCustomerEmail" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="updateCustomerPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="updateCustomerPhone" required>
                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="updateCustomerAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="updateCustomerAddress" required>
                        <div class="invalid-feedback">Please enter your address.</div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Update Booking</button>
                </div>
            </form>
        </div>
    </section>

    <section id="deleteBookingSection" class="my-5">
    <div class="container">
        <h2 class="text-center mb-4">Delete Booking</h2>
        <form id="deleteBookingForm" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="bookingId" class="form-label">Booking ID</label>
                <input type="text" class="form-control" id="bookingId" required>
                <div class="invalid-feedback">Please enter a valid booking ID.</div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-danger btn-lg px-5">Delete Booking</button>
            </div>
        </form>
        <div id="deleteResult" class="mt-3 text-center"></div>
    </div>
</section>



    <?php require_once("commons/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/carListing.js"></script>
</body>
</html>
