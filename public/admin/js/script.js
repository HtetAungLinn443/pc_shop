const sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const themeToggler = document.querySelector('.theme-toggler');

// show side bar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

// close
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

// change theme
themeToggler.addEventListener('click', () => {

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

})

// dark and Light
let darkMode = localStorage.getItem('darkMode');

const darkModeToggle = document.querySelector('#dark-mode-toggle');

const enableDarkMode = () => {
    document.body.classList.add('dark-mode');
    localStorage.setItem('darkMode', 'enabled');

}

const disableDarkMode = () => {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('darkMode', null);

}

if (darkMode === 'enabled') {
    enableDarkMode();
}

darkModeToggle.addEventListener('click', () => {
    darkMode = localStorage.getItem('darkMode');
    if (darkMode !== 'enabled') {
        enableDarkMode();

    } else {
        disableDarkMode();

    }
});

// jquery menu active
$(document).ready(function() {
    // active menu
    $('.aside__sidebar a').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    })

    // Active Filter Member
    $('.filter-member a').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    })


});
