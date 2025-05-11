



document.querySelector('.icon-find').addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector('.searching_bar').classList.toggle('active');
});


const hamburger = document.querySelector('.hamburger');
const categories = document.querySelector('.categories');

hamburger.addEventListener('click', () => {
    categories.classList.toggle('active');
});


const images = [
    'images/bicycle.jpg',
    'images/ski2.jpg',
    'images/ski3.webp'
];

let currentIndex = 0;
const slideshow = document.getElementById('slideshow');

setInterval(() => {

    slideshow.style.opacity = 0;
    setTimeout(() => {
        currentIndex = (currentIndex + 1) % images.length;
        slideshow.src = images[currentIndex];
        slideshow.style.opacity = 1;
    }, 1000);
}, 6000);






const sizeOptions = document.querySelectorAll('.size-option');

sizeOptions.forEach(option => {
    option.addEventListener('click', () => {
        sizeOptions.forEach(o => o.classList.remove('active'));
        option.classList.add('active');
    });
});




const mainImage = document.getElementById('mainImage');
const thumbnails = document.querySelectorAll('.thumbnail');


thumbnails.forEach(thumb => {
    thumb.addEventListener('click', () => {
        mainImage.src = thumb.src;
    });
});




const addImageBtn = document.getElementById('addImageBtn');
const fileInput = document.getElementById('fileInput');


addImageBtn.addEventListener('click', () => {
    fileInput.click();
});


fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    console.log("Nahraný súbor:", file);
});




const likeButton = document.querySelector('.like-button');
console.log("likeButton:", likeButton);
likeButton.addEventListener('click', function() {
    console.log("Klikol si na likeButton");
    this.classList.toggle('liked');
    const icon = this.querySelector('i');
    if (this.classList.contains('liked')) {
        icon.classList.remove('fa-heart-o');
        icon.classList.add('fa-heart');
    } else {
        icon.classList.remove('fa-heart');
        icon.classList.add('fa-heart-o');
    }
});
