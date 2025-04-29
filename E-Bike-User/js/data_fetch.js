let offset = 9; // Initial offset for the next load

document.getElementById('show-more').addEventListener('click', function() {
    // AJAX call to load more data
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "load_more.php?offset=" + offset, true);
    xhr.onload = function() {
        if (this.status == 200) {
            const response = this.responseText.trim();
            if (response) {
                // Insert new cards before the show-buttons div
                document.getElementById('card-container').insertAdjacentHTML('beforeend', response);
                offset += 9; // Increase offset for the next load
                // Show the 'Show Less' button after new content is loaded
                document.getElementById('show-less').style.display = 'inline-block';
            } else {
                // No more data to load, hide the Show More button
                document.getElementById('show-more').style.display = 'none';
            }
        }
    };
    xhr.send();
});

document.getElementById('show-less').addEventListener('click', function() {
    // Hide all cards except the first 9
    const cards = document.querySelectorAll('#card-container .card');
    for (let i = 9; i < cards.length; i++) {
        cards[i].style.display = 'none';
    }

    // Reset the offset and button states
    offset = 9;
    document.getElementById('show-more').style.display = 'inline-block'; // Show the 'Show More' button again
    document.getElementById('show-less').style.display = 'none'; // Hide the 'Show Less' button
});
