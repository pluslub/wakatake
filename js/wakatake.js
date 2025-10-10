

const target_rtl = '.gallery03 .splide-a';
    const target_ltr = '.gallery03 .splide-b';

    //共通オプション
    const commonOptions = {
      type: 'loop',
      arrows: false,
      drag: 'free',
      flickPower: 300,
      pagination: false,
      autoWidth: true,
      autoHeight: true,
      autoScroll: {
        speed: 1,
        pauseOnHover: false,
        pauseOnFocus: true,
      },
      breakpoints: {
        600: {
          autoScroll: {
            speed: 0.3
          }
        }
      }
    }



    // スライド方向：右から左
    const rtlOptions = {
      ...commonOptions,
      direction: 'rtl'
    };
    // スライド方向：左から右
    const ltrOptions = {
      ...commonOptions,
      direction: 'ltr'
    };



    const rtlSplide = new Splide(target_rtl, rtlOptions);
    rtlSplide.mount(window.splide.Extensions);

    const ltrSplide = new Splide(target_ltr, ltrOptions);
    ltrSplide.mount(window.splide.Extensions);