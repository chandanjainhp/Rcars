<!-- Footer -->
<footer class="bg-light text-center py-4"> 
    <div class="container">
        <p>&copy; 2023 Car Rental Service. All rights reserved.</p>
        <a href="#terms">Terms of Service</a> | 
        <a href="#privacy">Privacy Policy</a>
        <p id="current-time"></p>
    </div>
</footer>

<script>
    function updateTime() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
        document.getElementById('current-time').innerText = now.toLocaleTimeString(undefined, options);
    }

    // Update the time immediately
    updateTime();
    // Update the time every second
    setInterval(updateTime, 1000);
</script>
