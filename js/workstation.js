

/*---------------------------------------------*/
/* school parallax (gsap) */
/*---------------------------------------------*/

//parallax
gsap.to(".parallax__container", {
  yPercent: -50,
  ease: "none",
  scrollTrigger: {
    trigger: ".parallax__container",
    // start: "top bottom", // the default values
    // end: "bottom top",
    scrub: true
  }, 
});


gsap.to("#class-img01", {
  yPercent: -65,
  ease: "none",
  scrollTrigger: {
    trigger: "#class-img01",
    // start: "top bottom", // the default values
    // end: "bottom top",
    scrub: true
  }, 
});


gsap.to("#class-img02", {
  yPercent: 25,
  ease: "none",
  scrollTrigger: {
    trigger: "#class-img02",
    // start: "top bottom", // the default values
    // end: "bottom top",
    scrub: true
  }, 
});


gsap.to("#class-img03", {
  yPercent: -85,
  ease: "none",
  scrollTrigger: {
    trigger: "#class-img03",
    // start: "top bottom", // the default values
    // end: "bottom top",
    scrub: true
  }, 
});


/*---------------------------------------------*/
/* plusらぼ slide */
/*---------------------------------------------*/
new Splide(".splide", {
  type: "loop",
  perPage: 3.5,
  perMove: 1,
  gap: "5%",
}).mount();






//slider
const slider = document.querySelector('.slider');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

// 1回のスクロールで動く量
const scrollAmount = 240;

// 前ボタン
prevBtn.addEventListener('click', () => {
    slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
});

// 次ボタン
nextBtn.addEventListener('click', () => {
    slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
});