// Function to handle the loading of the home section and car types
document.addEventListener('DOMContentLoaded', function () {
    // Load available car types
    loadCarTypes();
});

// Function to load car types dynamically (this can be expanded with API calls)
function loadCarTypes() {
    const carTypes = [
        { name: 'Economy', icon: 'fas fa-car' },
        { name: 'SUV', icon: 'fas fa-car-suv' },
        { name: 'Luxury', icon: 'fas fa-car-side' },
    ];

    const carTypesList = document.querySelector('#carTypes .list-group');
    carTypes.forEach(carType => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item';
        listItem.innerHTML = `<i class="${carType.icon}"></i> ${carType.name}`;
        carTypesList.appendChild(listItem);
    });
}

// Function to fetch car details (this will later integrate with PHP for real data)
function fetchCarDetails(carId) {
    // Sample car details (replace this with an API call)
    const carDetails = {
        1: { model: 'Toyota Corolla', price: 50, details: 'A reliable and fuel-efficient car.' },
        2: { model: 'Ford Explorer', price: 70, details: 'A spacious and comfortable SUV.' },
        3: { model: 'BMW 5 Series', price: 120, details: 'A luxury sedan with advanced features.' },
    };

    const car = carDetails[carId];
    if (car) {
        document.getElementById('modalCarModel').innerText = car.model;
        document.getElementById('modalCarPrice').innerText = `$${car.price}`;
        document.getElementById('modalCarDetails').innerText = car.details;

        // Show the car details modal
        const modal = new bootstrap.Modal(document.getElementById('carDetailsModal'));
        modal.show();
    } else {
        alert('Car details not found.');
    }
}

// Event listener for the quick search section
document.getElementById('quickSearch').addEventListener('submit', function (event) {
    event.preventDefault();
    const searchTerm = document.getElementById('searchTerm').value.toLowerCase();
    
    // Add logic to search cars based on the search term
    // This is a placeholder for where you might call an API to filter cars
    alert('Search feature is not yet implemented. Searching for: ' + searchTerm);
});

// Example function to handle a button click for car selection
function onCarSelect(carId) {
    fetchCarDetails(carId);
}
