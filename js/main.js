
/*-----------------------------*/ 
/* loading */ 
/*-----------------------------*/

document.addEventListener("DOMContentLoaded", function () {
  const loadingScreen = document.getElementById("loading-screen");
  const isTopPage = location.pathname === "/" || location.pathname === "/index.html"; // トップページ判定
  const isReload = performance.navigation.type === 1; // リロード判定

  // 「戻る操作」であればローディングを表示しない
  if (performance.navigation.type === 2) {
      loadingScreen.style.display = "none";
      return;
  }

  // トップページならローディングを表示
  if (isTopPage) {
      localStorage.setItem("visitedTopPage", "true");
      sessionStorage.removeItem("loaded"); // トップページでは常にローディングを表示
  }

  // `sessionStorage` に "loaded" がなければローディングを表示
  if (!sessionStorage.getItem("loaded") || isReload) {
      sessionStorage.setItem("loaded", "true"); // 設定（リロード時は再表示）

      // 3秒後にローディング画面をフェードアウト
      setTimeout(() => {
          loadingScreen.classList.add("hidden");
          setTimeout(() => {
              loadingScreen.style.display = "none";
          }, 1000);
      }, 2500);
  } else {
      // すでに "loaded" がある場合はローディングを非表示
      loadingScreen.style.display = "none";
  }

  // すべてのリンクにクリックイベントを設定（ページ移動時に `loaded` を保持）
  document.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", () => {
          // ページ遷移時に `loaded` は削除しない（戻ってきたときのため）
      });
  });
});



/*-----------------------------*/ 
/* news slide panel */ 
/*-----------------------------*/

//news slide-panel
// すべての .primary-btn を取得
const primaryButtons = document.querySelectorAll('.news__list');
const slidePanel = document.querySelector('.slide-panel');
const closeButton = document.querySelector('.modal-btn');

// クリックイベントを各ボタンに追加
primaryButtons.forEach(button => {
  button.addEventListener('click', (event) => {
    // クリックされたボタンの親要素 .item を取得
    const item = event.target.closest('.news__list');

    // .item から情報を取得
    const title = item.querySelector('.news_title').textContent;
    const text = item.querySelector('.news_text').innerHTML;
    const imgSrc = item.querySelector('.news_thumb img').src;

    // スライドパネルに情報を反映
    document.querySelector('.slide-panel-tittle h3').textContent = title;
    document.querySelector('.slide-panel-text').innerHTML = text;
    document.querySelector('.slide-panel-thumb img').src = imgSrc;

    // スライドパネルを表示
    slidePanel.classList.add('is-visible');
  });
});

// 閉じるボタンのイベント
closeButton.addEventListener('click', () => {
  slidePanel.classList.remove('is-visible');
});



/*-----------------------------*/ 
/* service accordion */ 
/*-----------------------------*/


let accordionDetails = '.js-details';
let accordionSummary = '.js-details-summary';
let accordionContent = '.js-details-content';
let speed = 500;

$(accordionDetails).on("mouseenter", function(event) {
  // summaryにis-activeクラスを切り替え
  $(this).find(accordionSummary).addClass("is-active");
  // open属性を付ける
  $(this).attr("open", "true");
  // いったんdisplay:none;してからslideDownで開く
  $(this).find(accordionContent).hide().slideDown(speed);
});

$(accordionDetails).on("mouseleave", function(event) {
  // summaryからis-activeクラスを削除
  $(this).find(accordionSummary).removeClass("is-active");
  // アコーディオンを閉じるときの処理
  $(this).find(accordionContent).slideUp(speed, function() {
    // アニメーションの完了後にopen属性を取り除く
    $(this).parent($(accordionDetails)).removeAttr("open");
    // display:none;を消して、ページ内検索にヒットするようにする
    $(this).show();
  });
});