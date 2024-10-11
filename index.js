//  Scroll-to-Top Button
window.onscroll = function() {
    const scrollTopBtn = document.getElementById("scrollTop");
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
};


document.getElementById("scrollTop").onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};


// scroll-triggered animations
window.addEventListener('scroll', function() {
    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach(element => {
        const position = element.getBoundingClientRect().top;
        if (position < window.innerHeight - 150) {
            element.classList.add('show');
        }
    });
});

//  form validation
const form = document.querySelector('form');
form.addEventListener('submit', function(event) {
    const name = form.elements['name'].value;
    const email = form.elements['email'].value;
    const message = form.elements['message'].value;
    
    if (!name || !email || !message) {
        alert('All fields are required!');
        event.preventDefault();
    }
});

// swipper function
let currentIndex = 0;
const projectSlider = document.querySelector('.project-slider');
const projectCards = document.querySelectorAll('.project-card');
const dots = document.querySelectorAll('.dot');

// update slides
function updateSliderPosition() {
    projectCards.forEach((card, index) => {
        if (index === currentIndex) {
            card.style.display = 'block'; 
        } else {
            card.style.display = 'none';
        }
    });
    updateActiveDot();
}

// Function to go to the next project
function showNextProject() {
    if (currentIndex < projectCards.length - 1) {
        currentIndex++;
    } else {
        currentIndex = 0; 
    }
    updateSliderPosition();
}

// Function to go to the previous project
function showPreviousProject() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = projectCards.length - 1; 
    }
    updateSliderPosition();
}

// Function to handle the pagination dots
function goToProject(index) {
    currentIndex = index;
    updateSliderPosition();
}

// Function to update the active dot
function updateActiveDot() {
    dots.forEach(dot => dot.classList.remove('active'));
    dots[currentIndex].classList.add('active');
}

setInterval(showNextProject, 5000);

