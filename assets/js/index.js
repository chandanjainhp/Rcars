// Fetch available cars from the server
async function fetchCars() {
    try {
        const response = await fetch('config/fetch_cars.php'); // PHP endpoint to fetch cars
        const cars = await response.json();
        displayCars(cars);
    } catch (error) {
        console.error('Error fetching cars:', error);
    }
}

// Display cars in the carCards section
function displayCars(cars) {
    const carCardsContainer = document.getElementById('carCards');
    carCardsContainer.innerHTML = ''; // Clear existing cards

    if (cars.length === 0) {
        carCardsContainer.innerHTML = '<div class="alert alert-danger">No cars available.</div>';
        return;
    }

    cars.forEach(car => {
        const card = `
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="${car.image}" class="card-img-top" alt="${car.model}">
                    <div class="card-body">
                        <h5 class="card-title">${car.model}</h5>
                        <p class="card-text">$${car.price}</p>
                        <button class="btn btn-primary" onclick="showCarDetails('${car.id}')">View Details</button>
                    </div>
                </div>
            </div>
        `;
        carCardsContainer.insertAdjacentHTML('beforeend', card);
    });
}

// Show car details in the modal
function showCarDetails(carId) {
    fetch(`fetch_car_details.php?id=${carId}`) // PHP endpoint to get car details
        .then(response => response.json())
        .then(car => {
            document.getElementById('modalCarImage').src = car.image;
            document.getElementById('modalCarModel').innerText = car.model;
            document.getElementById('modalCarPrice').innerText = `$${car.price}`;
            document.getElementById('modalCarDetails').innerText = car.details; // Car specifications/details

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('carDetailsModal'));
            modal.show();
        });
}

// Initialize fetch when the page loads
document.addEventListener('DOMContentLoaded', fetchCars);
