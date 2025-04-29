  // Select the necessary elements
  const vehicleCards = document.querySelectorAll('.main-vehicle-card');
  const nextBtn = document.getElementById('vehicle-next-btn');
  const prevBtn = document.getElementById('vehicle-prev-btn');

  let currentCardIndex = 0; // To track the current card being displayed

  // Hide all cards except the first one
  vehicleCards.forEach((card, index) => {
      if (index !== 0) {
          card.style.display = 'none';
      }
  });

  // Function to show the next card
  nextBtn.addEventListener('click', () => {
      vehicleCards[currentCardIndex].style.display = 'none'; // Hide the current card
      currentCardIndex = (currentCardIndex + 1) % vehicleCards.length; // Move to the next card
      vehicleCards[currentCardIndex].style.display = 'block'; // Show the next card
  });

  // Function to show the previous card
  prevBtn.addEventListener('click', () => {
      vehicleCards[currentCardIndex].style.display = 'none'; // Hide the current card
      currentCardIndex = (currentCardIndex - 1 + vehicleCards.length) % vehicleCards.length; // Move to the previous card
      vehicleCards[currentCardIndex].style.display = 'block'; // Show the previous card
  });