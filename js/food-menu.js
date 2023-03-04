const foodMenus = document.querySelectorAll('.day-menu');

const showHeader = document.querySelector('.food-list');

const showAboutUs = document.querySelectorAll('.bio');

const gallery = document.querySelectorAll('.image-link');

window.addEventListener('scroll', checkHeader);

checkHeader();

function checkHeader(){
    const triggerBottom = window.innerHeight / 5 * 3.5;
    const showHeaderTop = showHeader.getBoundingClientRect().top;

    if(showHeaderTop < triggerBottom) {
        showHeader.classList.add('show');
    } else {
        showHeader.classList.remove('show');
    }
}

window.addEventListener('scroll', checkMenus);

checkMenus();

function checkMenus() {
    const triggerBottom = window.innerHeight / 5 * 4.2;
    foodMenus.forEach((menu) => {
        const menuTop = menu.getBoundingClientRect().top;

        if(menuTop < triggerBottom) {
            menu.classList.add('show');
        } else {
            menu.classList.remove('show');
        }
    });
}

window.addEventListener('scroll', checkAboutUs);

checkAboutUs();

function checkAboutUs() {
    const triggerBottom = window.innerHeight / 5 * 5;
    showAboutUs.forEach((bio) => {
        const menuTop = bio.getBoundingClientRect().top;

        if(menuTop < triggerBottom) {
            bio.classList.add('show');
        } else {
            bio.classList.remove('show');
        }
    });
}

window.addEventListener('scroll', checkGallery);

checkGallery();

function checkGallery() {
    const triggerBottom = window.innerHeight / 5 * 5;
    gallery.forEach((photo) => {
        const menuTop = photo.getBoundingClientRect().top;

        if(menuTop < triggerBottom) {
            photo.classList.add('show');
        } else {
            photo.classList.remove('show');
        }
    });
}




