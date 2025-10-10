

// すべての .primary-btn を取得
const primaryButtons = document.querySelectorAll('.primary-btn');
const slidePanel = document.querySelector('.slide-panel');
const closeButton = document.querySelector('.modal-btn');

// クリックイベントを各ボタンに追加
primaryButtons.forEach(button => {
  button.addEventListener('click', (event) => {
    // クリックされたボタンの親要素 .item を取得
    const item = event.target.closest('.item');

    // .item から情報を取得
    const title = item.querySelector('.item_title').textContent;
    const text = item.querySelector('.item_text').innerHTML;
    const imgSrc = item.querySelector('.item_thumb img').src;

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