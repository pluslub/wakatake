

/*============== bg画像スライダー ================*/


const mediaQuery = window.matchMedia('(max-width: 1100px)');
 
// ページが読み込まれた時に実行
handle(mediaQuery);
 
// ウィンドウサイズを変更しても実行（ブレイクポイントの監視）
mediaQuery.addListener(handle);
 
function handle(mm) {
  if (mm.matches) {
    // ウィンドウサイズ768px以下のときの処理
  } else {
    $(function($) {
      $('body').bgSwitcher({
        images: ['./assets/images/pc-bg_school.jpg', './assets/images/pc-bg_bakery.jpg','./assets/images/pc-bg_wakatake.jpg','./assets/images/pc-bg_yamadera.jpg','./assets/images/pc-bg_flower.jpg'], // 切り替える背景画像を指定
        interval: 10000, // 背景画像を切り替える間隔を指定 3000=3秒
        loop: true, // 切り替えを繰り返すか指定 true=繰り返す　false=繰り返さない
        shuffle: false, // 背景画像の順番をシャッフルするか指定 true=する　false=しない
        effect: "fade", // エフェクトの種類をfade,blind,clip,slide,drop,hideから指定
        duration: 2000, // エフェクトの時間を指定します。
        easing: "swing" // エフェクトのイージングをlinear,swingから指定
      });
    });
  }
}


/*============== ハンバーガーメニュー toggle ================*/

$('.hamburger').on('click',function(){
  $('.drawer-menu').toggleClass('slide-in');
});

/*============== ページ内リンク 指定箇所にスムーススクロール ================*/

$('#page-link a[href*="#"]').click(function () {
  var elmHash = $(this).attr('href'); //ページ内リンクのHTMLタグhrefから、リンクされているエリアidの値を取得
  var pos = $(elmHash).offset().top;  //idの上部の距離を取得
  $('body,html').animate({scrollTop: pos}, 500); //取得した位置にスクロール。500の数値が大きくなるほどゆっくりスクロール
  return false;
});



/*============== 先輩社員の声  カルーセルスライダー  ================*/

// jQuery(function ($)  test {
  $('.slick-slider').slick({
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type=”button” class=”slick-prev”></button>',
    nextArrow: '<button type=”button” class=”slick-next”></button>'
  });
  // });


/*============== 先輩社員の声 モーダルウィンドウ ================*/

$(function(){
  $(".md-btn").each(function(){
    $(this).on('click',function(e){
      e.preventDefault();
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).find('.md-overlay,.md-contents').fadeIn();
    });
  });
  $('.md-close').on('click',function(){
    $('.md-overlay,.md-contents').fadeOut();
  });
});


/*============== モーダルウィンドウ （お問い合わせフォーム） ================*/

$(function(){
  // 変数に要素を入れる
  var open = $('.modal-inquiry__open'),
    close = $('.modal-inquiry__close'),
    container = $('.modal-inquiry__container');

  //開くボタンをクリックしたらモーダルを表示する
  open.on('click',function(){ 
    container.addClass('active');
    return false;
  });

  //閉じるボタンをクリックしたらモーダルを閉じる
  close.on('click',function(){  
    container.removeClass('active');
  });

  //モーダルの外側をクリックしたらモーダルを閉じる
  $(document).on('click',function(e) {
    if(!$(e.target).closest('.modal-inquiry__container').length) {
      container.removeClass('active');
    }
  });
});


/*============== ページトップ スムーススクロール ================*/

// #page-topをクリックした際の設定
$('#page-top').click(function () {
	$('body,html').animate({
			scrollTop: 0//ページトップまでスクロール
	}, 10000);//ページトップスクロールの速さ。数字が大きいほど遅くなる
	return false;//リンク自体の無効化
});




/*============== フォーム インプットスタイル ================*/

document.querySelector('#graduate').addEventListener('change', event => {
  const target = event.target;
  target.setAttribute('date-date', target.value);
}, false);

document.querySelector('#first-hope').addEventListener('change', event => {
  const target = event.target;
  target.setAttribute('date-date', target.value);
}, false);

document.querySelector('#second-hope').addEventListener('change', event => {
  const target = event.target;
  target.setAttribute('date-date', target.value);
}, false);

document.querySelector('#third-hope').addEventListener('change', event => {
  const target = event.target;
  target.setAttribute('date-date', target.value);
}, false);


