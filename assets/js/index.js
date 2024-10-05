$(document).ready(function() {
    let selectedCar = null;
    let totalPrice = 0;

    // Fetch car data from the database
    fetchCarData();

    // Handle "View Details" button click
    $(document).on('click', '.view-details', handleViewDetails);

    // Handle date selection form submission
    $('#dateSelectionForm').on('submit', function(event) {
        event.preventDefault();
        updatePriceSummary();
    });

    // Update total price when additional options are selected
    $('#insurance, #gps').on('change', updatePriceSummary);

    // Handle booking form submission
    $('#bookingForm').on('submit', function(event) {
        event.preventDefault();
        if (validateBooking()) {
            handleBookingConfirmation();
        }
    });

    function fetchCarData() {
        $.ajax({
            url: 'fetch_cars.php',
            method: 'GET',
            dataType: 'json',
            success: function(cars) {
                renderCars(cars);
                setupCarSorting(cars);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching car data:", error);
            }
        });
    }

    function renderCars(carList) {
        const carCardsContainer = $('#carCards');
        carCardsContainer.empty();
        carList.forEach(car => {
            carCardsContainer.append(`
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="${car.image}" class="card-img-top" alt="${car.model}">
                        <div class="card-body">
                            <h5 class="card-title">${car.model}</h5>
                            <p class="card-text">$${parseFloat(car.price).toFixed(2)} per day</p>
                            <button class="btn btn-primary view-details" data-id="${car.id}" data-model="${car.model}" data-price="${car.price}" data-details="${car.details}">View Details</button>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    function setupCarSorting(cars) {
        $('#sortCars').on('change', function() {
            const selectedValue = $(this).val();
            let sortedCars = cars.sort((a, b) => {
                return selectedValue === 'lowToHigh' 
                    ? parseFloat(a.price) - parseFloat(b.price)
                    : parseFloat(b.price) - parseFloat(a.price);
            });
            renderCars(sortedCars);
        });
    }



    function handleViewDetails() {
        const carId = $(this).data('id');
        const model = $(this).data('model');
        const price = $(this).data('price');
        const details = $(this).data('details');
        const image = $(this).closest('.card').find('img').attr('src');

        selectedCar = { id: carId, model, price, details, image };

        $('#modalCarImage').attr('src', image);
        $('#modalCarModel').text(model);
        $('#modalCarPrice').text(`Price: $${parseFloat(price).toFixed(2)} per day`);
        $('#modalCarDetails').text(details);

        $('#carDetailsModal').modal('show');
        updateBookingSummary();
    }

    function updatePriceSummary() {
        if (!selectedCar) {
            alert("Please select a car first.");
            return;
        }

        const pickupDate = new Date($('#pickupDate').val());
        const returnDate = new Date($('#returnDate').val());
        const numberOfDays = Math.max(Math.ceil((returnDate - pickupDate) / (1000 * 3600 * 24)), 1);

        const dailyRate = parseFloat(selectedCar.price);
        totalPrice = numberOfDays * dailyRate;

        if ($('#insurance').is(':checked')) totalPrice += 20;
        if ($('#gps').is(':checked')) totalPrice += 10;

        $('#daysCount').text(numberOfDays);
        $('#dailyRateValue').text(dailyRate.toFixed(2));
        $('#totalPriceValue').text(totalPrice.toFixed(2));

        updateBookingSummary();


        const carId = 1; // replace with the actual car ID you want to fetch
        fetch(`your-api-url?car_id=${carId}`)
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error('Error:', error));

    }

    function updateBookingSummary() {
        if (selectedCar) {
            const pickupDate = $('#pickupDate').val();
            const returnDate = $('#returnDate').val();
            const insuranceSelected = $('#insurance').is(':checked') ? 'Yes' : 'No';
            const gpsSelected = $('#gps').is(':checked') ? 'Yes' : 'No';
            const paymentMethod = $('input[name="paymentMethod"]:checked').val() || 'Not selected';

            $('#bookingSummary').html(`
                <p>Model: ${selectedCar.model}</p>
                <p>Price: $${parseFloat(selectedCar.price).toFixed(2)} per day</p>
                <p>Pickup Date: ${pickupDate}</p>
                <p>Return Date: ${returnDate}</p>
                <p>Insurance: ${insuranceSelected}</p>
                <p>GPS: ${gpsSelected}</p>
                <p>Payment Method: ${paymentMethod}</p>
                <p>Total Price: $${totalPrice.toFixed(2)}</p>
            `);
        }
    }

    function validateBooking() {
        // Add validation logic here (for example, check if all required fields are filled)
        return true;
    }

    function handleBookingConfirmation() {
        if (!selectedCar) {
            alert("Please select a car first.");
            return;
        }

        const bookingData = {
            car_id: selectedCar.id,
            total_price: totalPrice.toFixed(2),
            pickup_date: $('#pickupDate').val(),
            return_date: $('#returnDate').val(),
            insurance: $('#insurance').is(':checked') ? 1 : 0,
            gps: $('#gps').is(':checked') ? 1 : 0,
            payment_method: $('input[name="paymentMethod"]:checked').val(),
            name: $('input[name="name"]').val(),
            email: $('input[name="email"]').val(),
            phone: $('input[name="phone"]').val()
        };

        // Log the booking data for debugging
        console.log("Booking Data:", bookingData);

        $.ajax({
            url: 'submit_booking.php',  // Link to the PHP file that handles the booking
            method: 'POST',
            data: bookingData,
            dataType: 'json',   // Expect a JSON response
            success: function(response) {
                if (response.success) {
                    $('#bookingReferenceNumber').text(response.booking_id);
                    $('#confirmationMessage').removeClass('d-none');

                    // Scroll to confirmation message
                    $('html, body').animate({
                        scrollTop: $('#confirmationMessage').offset().top
                    }, 800);
                } else {
                    alert("Booking failed: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error submitting booking:", error);
                alert("An error occurred while submitting your booking. Please try again.");
            }
        });
    }
});

       function updateBooking() {
        // Logic for updating the booking
        alert("Booking Updated");
    }

    function deleteBooking() {
        const bookingId = document.getElementById('bookingId').value;
        if (confirm(`Are you sure you want to delete the booking with ID: ${bookingId}?`)) {
            // Logic for deleting the booking
            alert("Booking Deleted");
        }  
    
  