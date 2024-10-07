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


    <div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search by model...">
</div>
<div class="mb-3">
    <select id="sortSelect" class="form-select">
        <option value="">Sort by</option>
        <option value="lowToHigh">Price: Low to High</option>
        <option value="highToLow">Price: High to Low</option>
    </select>
</div>


    <div class="container mt-4"> <!-- Added missing < to div -->
<!-- #region --> <div class="jumbotron">
        <!-- Date Selection -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="pickupDate1" class="form-label">Pickup Date</label>
                <input type="datetime-local" id="pickupDate1" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="pickupDate2" class="form-label">Return Date</label>
                <input type="datetime-local" id="pickupDate2" class="form-control" required>
            </div>
        </div>

        <!-- Car Cards -->
         <div class="row" id="carCards">
                <!-- Car cards will be dynamically added here -->
            </div>

            <form id="bookingForm">
    <input type="hidden" name="user_id" value="1"> <!-- User ID should be dynamic -->
    <input type="hidden" name="car_id" value="1">  <!-- Car ID should be dynamic -->

    <label for="rental_start_date">Rental Start Date:</label>
    <input type="datetime-local" name="rental_start_date" required><br>

    <label for="rental_end_date">Rental End Date:</label>
    <input type="datetime-local" name="rental_end_date" required><br>

    <label for="insurance">Insurance:</label>
    <input type="checkbox" name="insurance" value="1"><br>

    <label for="gps">GPS:</label>
    <input type="checkbox" name="gps" value="1"><br>

    <label for="payment_method">Payment Method:</label>
    <select name="payment_method" required>
        <option value="credit_card">Credit Card</option>
        <option value="paypal">PayPal</option>
    </select><br>

    <label for="terms_agreed">I agree to the terms and conditions:</label>
    <input type="checkbox" name="terms_agreed" value="1" required><br>

    <label for="number_of_days">Number of Days:</label>
    <input type="number" name="number_of_days" id="number_of_days" required><br>

    <label for="daily_rate">Daily Rate:</label>
    <input type="text" name="daily_rate" id="daily_rate" value="100.00" required><br>

    <label for="total_price">Total Price:</label>
    <input type="text" name="total_price" id="total_price" readonly><br>

    <button type="submit" class="btn btn-primary">Book Car</button>
</form>

<div id="message"></div> Area to display success or error messages -->

        <!-- Car Details Jumbotron -->
<!--        
            <h1 class="display-4">Car Details</h1>
            <img id="modalCarImage" class="img-fluid" src="" alt="Car Image">
            <h5 id="modalCarModel"></h5>
            <p id="modalCarPrice"></p>
            <p id="modalCarSpecs"></p>

            <hr class="my-4">

            <h6 class="mt-3">Additional Options</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="insurance">
                <label class="form-check-label" for="insurance">Insurance (+$20)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gps">
                <label class="form-check-label" for="gps">GPS (+$10)</label>
            </div>

            <h6 class="mt-3">Payment Method</h6>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="creditCard" required>
                <label class="form-check-label" for="creditCard">Credit Card</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required>
                <label class="form-check-label" for="paypal">PayPal</label>
            </div>

            <h6 class="mt-3">Terms and Conditions</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">I agree to the terms and conditions.</label>
            </div>

            <h6 class="mt-3">Price Summary</h6>
            <p>Number of Days: <span id="numDays">0</span></p>
            <p>Daily Rate: $<span id="dailyRate">0</span></p>
            <p>Total Price: $<span id="totalPrice">0</span></p>

            <hr class="my-4">

            <button type="button" class="btn btn-secondary" id="closeJumbotron">Close</button>
            <button type="button" class="btn btn-primary" id="confirmBooking">Book Now</button>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once("commons/footer.php"); ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/carListing.js"></script>
</body>

</html>
