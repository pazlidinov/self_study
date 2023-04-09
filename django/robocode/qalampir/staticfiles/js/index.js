document.addEventListener('DOMContentLoaded', function () {
  let theme = localStorage.getItem('theme');

  if (theme == 'dark') {
    document.body.classList.add('dark');
    document.querySelector('#theme-active').classList.add('right');
  } else {
    document.body.classList.remove('dark');
  }

  if (document.querySelector('#theme-active').classList.contains('right')) {
    document.querySelector('#night').classList.add('active');
    document.querySelector('#day').classList.remove('active');
  } else {
    document.querySelector('#night').classList.remove('active');
    document.querySelector('#day').classList.add('active');
  }
});

document.addEventListener('DOMContentLoaded', function () {
  let theme = localStorage.getItem('theme');

  if (theme == 'dark') {
    document.body.classList.add('dark');
    document.querySelector('#theme-active-button').classList.add('right');
  } else {
    document.body.classList.remove('dark');
  }

  if (
    document.querySelector('#theme-active-button').classList.contains('right')
  ) {
    document.querySelector('#night-button').classList.add('active');
    document.querySelector('#day-button').classList.remove('active');
  } else {
    document.querySelector('#night-button').classList.remove('active');
    document.querySelector('#day-button').classList.add('active');
  }
});

document.querySelector('#theme-btn').addEventListener('click', function () {
  document.body.classList.toggle('dark');

  if (document.body.classList.contains('dark')) {
    localStorage.setItem('theme', 'dark');
    document.querySelector('#theme-active').classList.add('right');
  } else {
    document.querySelector('#theme-active').classList.remove('right');
    localStorage.setItem('theme', 'light');
  }
  if (document.querySelector('#theme-active').classList.contains('right')) {
    document.querySelector('#night').classList.add('active');
    document.querySelector('#day').classList.remove('active');
  } else {
    document.querySelector('#night').classList.remove('active');
    document.querySelector('#day').classList.add('active');
  }
});

document.querySelector('#theme-button').addEventListener('click', function () {
  document.body.classList.toggle('dark');

  if (document.body.classList.contains('dark')) {
    localStorage.setItem('theme', 'dark');
    document.querySelector('#theme-active-button').classList.add('right');
  } else {
    document.querySelector('#theme-active-button').classList.remove('right');
    localStorage.setItem('theme', 'light');
  }
  if (
    document.querySelector('#theme-active-button').classList.contains('right')
  ) {
    document.querySelector('#night-button').classList.add('active');
    document.querySelector('#day-button').classList.remove('active');
  } else {
    document.querySelector('#night-button').classList.remove('active');
    document.querySelector('#day-button').classList.add('active');
  }
});

document
  .querySelector('#toggle-navbar-qalampir')
  .addEventListener('click', function () {
    document.querySelector('.media-navbar').classList.add('show');
    document.querySelector('.media-navbar').classList.remove('hide');
    document.body.style.overflow = 'hidden';
  });
document
  .querySelector('#close-navbar-btn')
  .addEventListener('click', function () {
    document.querySelector('.media-navbar').classList.remove('show');
    document.querySelector('.media-navbar').classList.add('hide');
    document.body.style.overflow = 'auto';
  });

function playVideo(video) {
  // console.log(video);
  document.querySelector('#video-content').innerHTML = `
  <video id="video-modal" src="${video}" controls class="modal-video-content"></video>
  `;
}

function WidthSwiperBorder() {
  let list = document
    ?.querySelector('.mySwiper')
    ?.querySelectorAll('.swiper-slide');

  list?.forEach(function (item) {
    item
      .querySelector('.carousel-caption-content-item')
      .classList.remove('no-border');

    if (window.innerWidth > 991) {
      list[swiper.activeIndex + 3]
        ?.querySelector('.carousel-caption-content-item')
        ?.classList.add('no-border');
    } else if (window.innerWidth > 768 && window.innerWidth < 991) {
      list[swiper.activeIndex + 2]
        ?.querySelector('.carousel-caption-content-item')
        ?.classList.add('no-border');
    } else {
      item
        .querySelector('.carousel-caption-content-item')
        .classList.remove('no-border');
    }
  });
}

var prevScrollpos = window.pageYOffset;

/* Get the header element and it's position */
let ScrollUp = document.querySelector('.scrollUp');

ScrollUp.addEventListener('click', function () {
  window.scroll({
    top: 0,
    left: 0,
    behavior: 'smooth',
  });
});

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (currentScrollPos <= 160) {
    ScrollUp.classList.remove('show');
  } else {
    ScrollUp.classList.add('show');
  }
  // if (prevScrollpos >= currentScrollPos) {
  //   ScrollUp.classList.remove('show');
  // } else {
  //   ScrollUp.classList.add('show');
  // }

  prevScrollpos = currentScrollPos;
};

document
  .querySelector('#search-btn-nav')
  .addEventListener('click', function () {
    document
      .querySelector('.search-wrapper')
      ?.querySelector('.search-input')
      ?.classList.add('show');
    document.querySelector('#course').classList.add('hide');
  });

document
  .querySelector('#search-btn-close-nav')
  .addEventListener('click', function () {
    document
      .querySelector('.search-wrapper')
      ?.querySelector('.search-input')
      ?.classList.remove('show');
    document.querySelector('#course').classList.remove('hide');
  });
