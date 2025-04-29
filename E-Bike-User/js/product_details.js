const sliderWrapper = document.querySelector('.slider-wrapper');
const productImages = document.querySelectorAll('.product_images');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

let currentIndex = 0;
let totalImages = productImages.length;

// Function to slide to the next image
nextBtn.addEventListener('click', () => {
  if (currentIndex < totalImages - 1) {
    currentIndex++;
  } else {
    currentIndex = 0; // Loop back to the first image
  }
  updateSlider();
});

// Function to slide to the previous image
prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
  } else {
    currentIndex = totalImages - 1; // Loop back to the last image
  }
  updateSlider();
});

// Function to update the slider position based on current index
function updateSlider() {
  const translateX = -currentIndex * 100; // Calculate translation percentage
  sliderWrapper.style.transform = `translateX(${translateX}%)`; // Slide the images horizontally
}

