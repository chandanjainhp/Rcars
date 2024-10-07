document.addEventListener('DOMContentLoaded', function () {
    // Elements
    const searchInput = document.getElementById('searchInput');
    const sortSelect = document.getElementById('sortSelect');
    const carCards = document.getElementById('carCards');
    const bookingForm = document.getElementById('bookingForm');
    const numberOfDaysInput = document.getElementById('number_of_days');
    const dailyRateInput = document.getElementById('daily_rate');
    const totalPriceInput = document.getElementById('total_price');

    // Function to fetch and display cars
    function fetchCars() {
        const searchValue = searchInput.value;
        const sortValue = sortSelect.value;
        const url = `config/fetch_cars.php?search=${searchValue}&sort=${sortValue}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                carCards.innerHTML = ''; // Clear current car cards
                data.forEach(car => {
                    const carCard = `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="${car.image}" class="card-img-top" alt="${car.model}">
                            <div class="card-body">
                                <h5 class="card-title">${car.model}</h5>
                                <p class="card-text">Price: $${car.price}</p>
                                <button class="btn btn-primary" onclick="selectCar(${car.id}, '${car.model}', ${car.price})">Select Car</button>
                            </div>
                        </div>
                    </div>`;
                    carCards.insertAdjacentHTML('beforeend', carCard);
                });
            });
    }

    // Function to select a car and update the form
    window.selectCar = function (carId, carModel, dailyRate) {
        bookingForm.car_id.value = carId;
        dailyRateInput.value = dailyRate;
        alert(`Car selected: ${carModel}`);
    };

    // Calculate total price on number of days change
    numberOfDaysInput.addEventListener('input', function () {
        const numberOfDays = parseInt(numberOfDaysInput.value);
        const dailyRate = parseFloat(dailyRateInput.value);
        if (!isNaN(numberOfDays) && !isNaN(dailyRate)) {
            totalPriceInput.value = (numberOfDays * dailyRate).toFixed(2);
        }
    });

    // Form submission
    bookingForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(bookingForm);
        fetch('config/booking.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('message').innerText = 'Booking successful!';
                } else {
                    document.getElementById('message').innerText = 'Error: ' + data.error;
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Trigger search and sorting
    searchInput.addEventListener('input', fetchCars);
    sortSelect.addEventListener('change', fetchCars);

    // Initial fetch of cars
    fetchCars();
});
