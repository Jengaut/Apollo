const slide = document.getElementById('full-slide');
const banner = slide.querySelector('.banner');
const prev = slide.querySelector('.prev');
const next = slide.querySelector('.next');
const slides = banner.querySelectorAll('li');

let currentSlide = 0;
const slideCount = slides.length;


function changeSlide(n) {
  slides[currentSlide].classList.remove('active');
  currentSlide = (n + slideCount) % slideCount;
  slides[currentSlide].classList.add('active');
}


function prevSlide() {
  changeSlide(currentSlide - 1);
}

function nextSlide() {
  changeSlide(currentSlide + 1);
}


prev.addEventListener('click', prevSlide);
next.addEventListener('click', nextSlide);


$(document).ready(function () {
  function nav() {
    $(".nav-toggle").click(function () {
      $(".nav").toggleClass("open");
    });
  }

  nav();
});

$(document).ready(function () {
  $("a").on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;

      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        800,
        function () {
          window.location.hash = hash;
        }
      );
    }
  });
});

const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // empêcher l'envoi du formulaire

  const email = form.querySelector('input[type=email]').value;
  const sujet = form.querySelector('input[type=text]').value;
  const message = form.querySelector('textarea').value;

  console.log('Adresse e-mail:', email);
  console.log('Sujet:', sujet);
  console.log('Message:', message);

  // Envoyer les données à un script côté serveur pour l'envoi par e-mail
});