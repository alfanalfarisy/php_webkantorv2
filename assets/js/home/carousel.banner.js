$("#carouselBanner").owlCarousel({
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,

      loop: false,
    },
  },
  autoplay: true,
  rewind: true /* use rewind if you don't want loop */,
  margin: 20,
  items: 1,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,
});
