
/*-----------------------------------------*/
// pc header メガメニュー
/*-----------------------------------------*/

// メガメニューを開閉するボタンのセレクターです。
const megaMenuButtons = document.querySelectorAll(".js-button-megaMenu");

// メニューが開いている状態を示すクラス名です。
const openClass = "is-open";

/**
 * メガメニューの開閉を制御するイベントハンドラです。
 * @param {Event} e - クリックイベントオブジェクトです。
 */
const menuToggleAction = (e) => {
  const button = e.currentTarget;
  const currentMegaMenu = button.closest(".js-megaMenu");
  const isOpened = currentMegaMenu.classList.contains(openClass);

  // 他のメガメニューを閉じる処理
  document.querySelectorAll(`.js-megaMenu.${openClass}`).forEach((megaMenu) => {
    if (megaMenu !== currentMegaMenu) {
      megaMenu.classList.remove(openClass);
      // 他のボタンのaria-expanded属性をfalseに設定
      megaMenu
        .querySelector(".js-button-megaMenu")
        .setAttribute("aria-expanded", "false");
    }
  });

  // 現在のメガメニューの開閉状態を切り替え
  currentMegaMenu.classList.toggle(openClass, !isOpened);

  // aria-expanded属性の値を現在の状態に応じて設定
  button.setAttribute("aria-expanded", String(!isOpened));
};

// 各メガメニューボタンにクリックイベントハンドラを設定します。
megaMenuButtons.forEach((button) => {
  button.addEventListener("click", menuToggleAction);
});



/*------------------------------*/
/* sp header ハンバーガーメニュー */
/*------------------------------*/

// ハンバーガーボタン
let hamburgerBtn = document.getElementById('header-hamburger');
// ハンバーガーウィンドウ
let hamburgerWindw = document.getElementById('hamburger-window');

/**
 * ハンバーガーメニューの開閉を制御
 */
hamburgerBtn.addEventListener('click', () => {
  // ハンバーガーメニューのopenとcloseの状態を制御
  if (hamburgerBtn.classList.contains('active')) {
    hamburgerBtn.classList.remove('active');
  } else {
    hamburgerBtn.classList.add('active');
  }
  // ハンバーガーウィンドウの表示状態を制御
  if (hamburgerWindw.classList.contains('open')) {
    hamburgerWindw.classList.remove('open');
  } else {
    hamburgerWindw.classList.add('open');
  }
});

// button要素がクリックされたらアコーディオンを開閉する
const menuBtns = document.querySelectorAll('.acordion-btn');
const menuLists = document.querySelectorAll('.acordion');

menuBtns.forEach((element, index) => {
  element.addEventListener('click', function () {
    menuBtns[index].classList.toggle('is-open');
    menuLists[index].classList.toggle('is-open');
  });
});










