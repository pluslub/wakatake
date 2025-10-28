<?php
//デバッグ用
ini_set('display_errors', "On");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //メール送信
    //データ取得
    $confirm = $_POST['confirm'];
    $inquiry_name = $_POST['inquiry-name'];
    $inquiry_number = $_POST['inquiry-number'];
    $inquiry_email = $_POST['inquiry-email'];
    $textarea = $_POST['textarea'];
    $chk = $_POST['privacy'];

    $to = "ws@wakatake.info";
    // タイムゾーンの設定
    date_default_timezone_set('Asia/Tokyo');

    // 使用言語（日本語）の設定
    mb_language("ja");
    mb_internal_encoding("UTF-8");

    // 自動返信メール件名
    $reply_subject = "お問い合わせを受付いたしました";

    // 自動返信メール本文
    $message_text = "この度は、お問い合わせ頂き誠にありがとうございます。"."\n";
    $message_text .= "下記の内容でお問い合わせを受付いたしました。"."\n\n";
    $message_text .= "お名前：" . $inquiry_name . "\n";
    $message_text .= "電話番号：" . $inquiry_number . "\n";
    $message_text .= "メールアドレス：" . $inquiry_email . "\n";
    $message_text .= "お問い合わせ内容：" . $textarea . "\n\n\n";
    $message_text .= "ーーーーーーーーーーー"."\n";
    $message_text .= "社会福祉法人若竹会"."\n";
    $message_text .= "滋賀県草津市川原町298-1"."\n";
    $message_text .= "TEL:077-569-5697"."\n";
    $message_text .= "https://www.wakatake.info/"."\n";
    $message_text .= "ーーーーーーーーーーー"."\n\n";

    // 自動返信メールヘッダー情報
    $fromEmail = $to;
    $fromName = "社会福祉法人若竹会";
    $headers = "From: " . mb_encode_mimeheader($fromName,"UTF-8") . " <" . $fromEmail . ">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=ISO-2022-JP\r\n";

    // 自動返信メールの送信
    mb_send_mail($inquiry_email, $reply_subject, $message_text, $headers);

    //通知メール送信
    $subject = "採用ページよりお問い合わせがありました";

    $reply_text .= "お名前：" . $inquiry_name . "\n";
    $reply_text .= "電話番号：" . $inquiry_number . "\n";
    $reply_text .= "メールアドレス：" . $inquiry_email . "\n";
    $reply_text .= "お問い合わせ内容：" . $textarea . "\n";

    mb_send_mail($to, $subject, $reply_text, $headers);
    $success_message = "送信完了いたしました。";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:url" content="ページのURL（絶対パス）" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="求人・採用ページ 滋賀県草津市にある社会福祉法人若竹会で職業指導員、生活支援員、訪問介護支援員を募集しています。" />
  <meta property="og:description" content="求人・採用ページ 滋賀県草津市にある社会福祉法人若竹会で職業指導員、生活支援員、訪問介護支援員を募集しています。働きやすい環境で充実した生活を送りましょう。" />
  <meta property="og:site_name" content="社会福祉法人若竹会 求人・採用ページ" />
  <meta property="og:image" content="url" />  
  <title>求人・採用ページ 職業指導員、生活支援員、介護・訪問支援員</title>
  <link rel="icon" href="./assets/images/favicon_bg_wht.png" type="image/png" sizes="32x32">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/reset.css">
  <!-- <link rel="stylesheet" href="/css/slick-theme.css"/> -->
  <link rel="stylesheet" href="./css/slick.css"/>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <h1>社会福祉法人<span>若竹会</span></h1>
  <main class="wrapper">
    <header>
      <nav>
        <a href="#"><p>社会福祉法人若竹会<span>採用ページ</span></p></a>
        <div class="hamburger">
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
        </div>
        <div class="drawer-menu">
          <ul class="drawer-menu-list" id="page-link">
            <div class="hamburger">×</div>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="https://www.wakatake.info/">トップ ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="https://www.wakatake.info/">法人トップ ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="#environment">職場環境 ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="#recruit-welfare">募集要項 ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="#company-information">会社概要 ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="#access">アクセス ></a></li>
          </ul>
        </div>
        <a href="./contact.php">
          <div class="form-open">ENTRY</div>
        </a>
        <div class="modal-container">
          <div class="modal-body">
            <div class="modal-close">×</div>
            <form class="modal-content" method="post">
              <h2> エントリーフォーム</h2>
              <ul class="modal-content__inner">
                <li>
                  <label for="name">お名前</label><span>必須</span><br>
                  <input type="text" id="name" name="user-name">
                </li>
                <li>
                  <label for="number">電話番号</label><span>必須</span><br>
                  <input type="number" id="number" name="user-number" required>
                </li>
                <li>
                  <label for="email">メールアドレス</label><span>必須</span>
                  <input type="email" id="email" name="user-email" required>
                </li>
                <li>
                  <label for="school">学校名</label><span>必須</span><br>
                  <input type="text" id="school" name="user-school" required>
                </li>
                <li>
                  <label for="category">学部</label><span>必須</span><br>
                  <input type="text" id="category" name="school-category" required>
                </li>
                <li>
                  <label for="graduate">卒業予定年月日</label><span>必須</span><br>
                  <input type="text" id="graduate" name="school-graduate" required>
                </li>
                <li>
                  <label for="first-hope">第一希望日</label><span>必須</span><br>
                  <input type="text" id="first-hope" name="user-first-hope" required>
                </li>
                <li>
                  <label for="second-hope">第二希望日</label><br>
                  <input type="text" id="second-hope" name="user-second-hope">
                </li>
                <li>
                  <label for="third-hope">第三希望日</label><br>
                  <input type="text" id="third-hope" name="user-third-hope">
                </li>
              </ul>
              <a href="./privacy policy.html" target="_blank" rel="noopener noreferrer"><input type="checkbox">プライバシーポリシーに同意する</a>
              <p><input type="text" value="送信する"></p>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <?php
      if(!empty($success_message)) {
    ?>
      <section class="mainvisual">
      <div class="first-content">
      <h2 style="margin-top:30vh; text-align:center; color: #2b5de5"><?php echo $success_message ?><br>
      <br>
      <a href="#">戻る</a>
      </h2>
      </div>
      </section>
    <?php
      } else {
    ?>
    <!-- メインビジュアル -->
    <section class="mainvisual">
      <div class="first-content">
        <img src="./assets/images/mainvisual.jpg" alt="メインビジュアル">
        <p class="catch">障がいという分け隔てが</p>
        <p class="catch">なくなる</p><br>
        <p class="catch">社会を目指して</p>
        <div class="first-content__text-area">
          <h2> Our Mission</h2>
          <p>
            若竹会では障がいの有無に関係なく、大人になれば自らが選択した場所で働き、自分らしく暮らす事が大切だと考えています。
          </p>
          <p>
            誰かに決められるのではなく、自分の意思で人生を進んでいく。
          </p>
          <p>
            個人が成長し、誰もが自己表現のできる社会を目指します。
          </p>
        </div>
      </div>
    </section>

    <!-- 若竹会の行動宣言 -->

    <section class="actions">
      <div class="actions-inner">
        <span>Our Actions</span>
        <h2>若竹会の行動宣言</h2>
        <p>
          若竹会は人権尊重と障がい福祉の精神を基盤とし、障がいのある人が自立に向けて逞しく心豊かに生き抜く力を育み、障がい者という区別がなくなる社会を目指して行動しています。
        </p>
      </div>
      <ul class="actions-list">
        <li>
          <div class="actions-img">
            <img src="./assets/images/card01.jpg" alt="image">
            <img class="text-img" src="./assets/images/effort.png" alt="努力">
            <h3>
              福祉だけでなく、幅広く社会全体を<br>捉えて考えています。
            </h3>
            <div class="actions-text">
              <p>
                福祉分野の専門性を高める事だけでなく、社会の一部と考え、福祉以外の様々な知識と経験も高めていくことが大切ではないでしょうか。
              </p>
            </div>
          </div>
        </li>
        <li>
          <div class="actions-img">
            <img src="./assets/images/card02.jpg" alt="image">
            <img class="text-img" src="./assets/images/friends.png" alt="仲間">
            <h3>
              互いを支え合う「互助」「共助」<br>の共生社会を目指します。
            </h3>
            <div class="actions-text">
              <p>
                障がいの有無に関係なく、互いの立場を理解し人権を尊重しなければなりません。
              </p>
            </div>
          </div>
        </li>
        <li>
          <div class="actions-img">
            <img src="./assets/images/card03.jpg" alt="image">
            <img class="text-img" src="./assets/images/decision.png" alt="信念">
            <h3>
              誰のために、なんのためにを常に<br>考えて行動します。
            </h3>
            <div class="actions-text">
              <p>
                若竹会を利用する方の意思を尊重し、自己表現に向けて行動し、全ての方から信頼を得られるように努力します。
              </p>
            </div>
          </div>
        </li>
        <li>
          <div class="actions-img">
            <img src="./assets/images/card04.jpg" alt="image">
            <img class="text-img" src="./assets/images/passion.png" alt="情熱">
            <h3>
              誰もが自分らしく輝ける社会の<br>実現に向けて活動します。
            </h3>
            <div class="actions-text">
              <p>
                多様性は強みであると考えています。互いを尊重して認め合うことができる社会は豊かで誰にも優しいことだと思っています。
              </p>
            </div>
          </div>
        </li>
      </ul>
    </section>

    <!-- 職場環境 -->
    <section class="environment" id="environment">
      <p>Working Environment</p>
      <h2>職場環境</h2>
      <ul class="environment-container">
        <li>
          <img src="./assets/images/point01.png" alt="ポイント01">
          <h3>資格取得の為の実務経験<br>が積める</h3>
          <p>
            各専門資格には実務経験が必須<br>ですが、若竹会で経験を積むこ<br>とができます。
          </p>
        </li>
        <li>
          <img src="./assets/images/point02.png" alt="ポイント02">
          <h3>有給や育休など充実した<br>休暇制度</h3>
          <p>
            休みをしっかりと取り、仕事も<br>プライベートも充実した生活を<br>送れます。
          </p>
        </li>
      </ul>
      <ul class="environment-container__list">
        <li>
          <h4>取得可能な資格</h4>
          <p class="license">介護福祉士</p>
          <p class="license">社会福祉士</p>
          <p class="license">サービス管理責任者</p>
          <p class="license">精神保健福祉士</p>
          <p class="license">その他</p>
        </li>
        <li>
          <h4>有給取得率</h4>
          <img src="./assets/images/84.png" alt="84%">
        </li>
        <li>
          <h4>育休休暇率</h4>
          <img src="./assets/images/100.png" alt="100%">
        </li>
        <li>
          <h4>育休休暇復職率</h4>
          <img src="./assets/images/100.png" alt="100%">
        </li>
        <li>
          <h4>新卒採用枠</h4>
          <p>2<span>名</span> 〜 4<span>名</span></p>
        </li>
        <li>
          <h4>平均残業時間</h4>
          <p>1.5時間</p>
        </li>
      </ul>
      <div class="scroll-infinity">
        <h4>働きやすさを追求する若竹会</h4>
        <div class="scroll-infinity__text">
          <p>
            若竹会では、従業員の仕事に対する熱意や生活の質を高めるための取り組みを行っています。
          </p>
          <p>
            平均残業時間はわずか1.5時間で、プライベートも大切にできます。
          </p>
          <p>
            また、わくわくリフレッシュ手当という特別な制度を導入し、心身ともにリフレッシュしてもらったり自己成長の機会をサポートしています。
          </p>
          <p>
            私たちと共に、充実した毎日を送りましょう。
          </p>
        </div>
        <div class="scroll-infinity__wrap">
          <ul class="scroll-infinity__list scroll-infinity__list--left">
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-01.jpg"/></li>                        
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-02.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-03.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-04.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-05.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-06.jpg"/></li>
          </ul>
          <ul class="scroll-infinity__list scroll-infinity__list--left">
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-01.jpg"/></li>                        
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-02.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-03.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-04.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-05.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide1-06.jpg"/></li>
          </ul>
        </div>
      </div>
      <div class="scroll-infinity">
        <h4>育児と両立する方も多数</h4>
        <div class="scroll-infinity__text">
          <p>
            結婚している方が多く、子供が熱を出しても「職員の交代は出来るけどお母さんの交代は無理だから帰ってあげて」という雰囲気が職場全体にあります。
          </p>
          <p>
            育児休暇などの制度はもちろんですが、制度に囚われない人の気持ちの面で「働きやすい」と言ってくれる方が多いです。
          </p>
          <p>
            人の人生に向き合う仕事だからこそ、誰にでも起こりうる出産や育児、介護といったライフイベントに合わせ、末永く働ける職場環境を整えています。
          </p>
        </div>
        <div class="scroll-infinity__wrap">
          <ul class="scroll-infinity__list scroll-infinity__list--right">
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-01.jpg"/></li>                        
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-02.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-03.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-04.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-05.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-06.jpg"/></li>
          </ul>
          <ul class="scroll-infinity__list scroll-infinity__list--right">
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-01.jpg"/></li>                        
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-02.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-03.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-04.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-05.jpg"/></li>
            <li class="scroll-infinity__item"><img src="./assets/images/slide2-06.jpg"/></li>
          </ul>
        </div>
      </div>
      <div class="environment-result">
        <h4>2024年度採用実績</h4>
        <div class="environment-result__content">
          <p>新卒採用</p><p>男性</p><p>女性</p>
        </div>
        <div class="environment-result__content-detail">
          <p>0<span>名</span></p><p>2<span>名</span></p>
        </div>
        <div class="environment-result__content">
          <p>第二新卒<br>既卒採用</p><p>男性</p><p>女性</p>
        </div>
        <div class="environment-result__content-detail">
          <p>0<span>名</span></p><p>0<span>名</span></p>
        </div>
      </div> 
    </section>

    <!-- 採用までの流れ -->
    <section class="employment">
      <div class="employment-title">
        <p>Flow of Employment</p>
        <h2>採用までの流れ</h2>
      </div>
      <ul class="employment-container">
        <li class="employment-list">
          <h5>STEP1</h5>
          <img src="./assets/images/guide.png" alt="職場見学">
          <p>職場見学</p>
        </li>
        <li class="employment-list">
          <h5>STEP2</h5>
          <img src="./assets/images/sp.png" alt="スマートフォン">
          <p>応募</p>
        </li>
        <li class="employment-list">
          <h5>STEP3</h5>
          <img src="./assets/images/meeting.png" alt="面接">
          <p>面接</p>
        </li>
        <li class="employment-list">
          <h5>STEP4</h5>
          <img src="./assets/images/results.png" alt="合否">
          <p>合否</p>
        </li>
      </ul>
      <small>※場合により2次面接を実施する事があります。</small>
    </section>

    <!-- 先輩社員の声 -->
    <section class="interview">
      <div class="interview-title">
        <p>Interview</p>
        <h2>先輩社員の声</h2>
      </div>

      <!-- カルーセルスライダー -->
      <div class="content_area">
        <div class="slick-slider">
          <!-- スタッフ１ -->
          <div class="slick-item">
            <div class="comment-box">
              <p>みなさんと一緒に利用者さんの支援に携われたら嬉しいです！ぜひお待ちしています！</p>
            </div>
            <img src="./assets/images/stuff-01.png" alt="スタッフ1">
            <p>R6年入社/新卒採用<br>生活支援員</p>
            <a href="" class="md-btn" data-target="modal01">
              <p>インタビュー</p>
            </a>
          </div>

          <!-- スタッフ2 -->
          <div class="slick-item">
            <div class="comment-box">
              <p>これから共に頑張っていきましょう！みなさんをお待ちしています！</p>
            </div>
            <img src="./assets/images/stuff-02.png" alt="スタッフ2">
            <p>R3年入社/既卒採用<br>職業指導員</p>
            <a href="" class="md-btn" data-target="modal02">
              <p>インタビュー</p>
            </a>
          </div>

            <!-- スタッフ3 -->
          <div class="slick-item">
            <div class="comment-box">
              <p>色々な経験ができる職場です。見学で雰囲気を見て考えていただけたらと思います。</p>
            </div>
            <img src="./assets/images/stuff-03.png" alt="スタッフ3">
            <p>R2年入社/既卒採用<br>生活支援員</p>
            <a href="" class="md-btn" data-target="modal03">
              <p>インタビュー</p>
            </a>
          </div>

            <!-- スタッフ4 -->
          <div class="slick-item">
            <div class="comment-box">
              <p>みなさんと一緒に利用者さんの支援に携われたら嬉しいです！ぜひお待ちしています！</p>
            </div>
            <img src="./assets/images/stuff-04.png" alt="スタッフ4">
            <p>R3年入社/新卒採用<br>職業指導員</p>
            <a href="" class="md-btn" data-target="modal04">
              <p>インタビュー</p>
            </a>
          </div>

            <!-- スタッフ5 -->
          <div class="slick-item">
            <div class="comment-box">
              <p>いろいろな場所を見て比較し、自分のやりたいことにチャレンジしていただけたらと思います！</p>
            </div>
            <img src="./assets/images/stuff-05.png" alt="スタッフ5">
            <p>H30年入社/新卒採用<br>訪問支援員</p>
            <a href="" class="md-btn" data-target="modal05">
              <p>インタビュー</p>
            </a>
          </div>

          <!-- スタッフ6 -->
          <div class="slick-item">
            <div class="comment-box">
              <p>あなたの新たな一歩を是非若竹会で！！</p>
            </div>
            <img src="./assets/images/stuff-06.png" alt="スタッフ6">
            <p>H25年入社/既卒入社<br>職業指導員</p>
            <a href="" class="md-btn" data-target="modal06">
              <p>インタビュー</p>
            </a>
          </div>
        </div>
      </div>
      
      <!-- スタッフ１ モーダル -->
      <div id="modal01" class="modal">
        <div class="md-overlay md-close"></div>
          <div class="md-contents">
            <a href="" class="md-xmark md-close">
              <span></span>
              <span></span>
            </a>
            <div class="md-inner">
              <img src="./assets/images/stuff-01.png" alt="スタッフ1">
              <p>R6年入社/新卒採用<br>生活支援員</p>
              <div class="interview-text">
                <h6>Q1 やりがいを感じる時はどんな時ですか？</h6>
                <p>利用者からお礼を言われる時です。<br>就職してまだ半年も経ってないですが、利用者と話をして、行動した時に「ありがとう」と言われると、こっちもやってよかったと思うし、ちゃんとできたと思うし安心して次もできると自信につながりました。</p>
                <h6>Q2 若竹会に決めた理由なんですか？</h6>
                <p>小学生の時のお祭りでパンを販売しに来ていたり、ワークステーションのところで家族でパンを購入したりというきっかけがあり、福祉の仕事に就くと決めるときに、若竹会なら知っていると所だからという理由で初めは選びました。</p>
                <p>見学をした際に利用者が生き生きしているのを見て、私でもできると思い、応募しました。</p>
                <h6>Q3 心に残っているエピソードはありますか？</h6>
                <p>利用者の方に名前を呼んでもらったことです。そこから話が弾んだりして楽しい事。</p>
                <p>シンプルで当たり前のようなことですが、1番嬉しかったし、安心しました。</p>
                <h6>Q4 若竹会の雰囲気はどうでしょうか？</h6>
                <p>若竹会の山寺作業所はアットホームだと思います。</p>
                <p>利用者との距離も近く、話しかけやすく、過ごしやすい雰囲気だと思います。硬くならず、肩の力を抜いて、自分らしく仕事ができると思います。</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- スタッフ2 モーダル -->
      <div id="modal02" class="modal">
        <div class="md-overlay md-close"></div>
          <div class="md-contents">
            <a href="" class="md-xmark md-close">
              <span></span>
              <span></span>
            </a>
            <div class="md-inner">
              <img src="./assets/images/stuff-02.png" alt="スタッフ2">
              <p>R3年入社/既卒採用<br>職業指導員</p>
              <div class="interview-text">
                <h6>Q1 やりがいを感じる時はどんな時ですか？</h6>
                <p>利用者の方の成長を感じたときにやりがいを感じます。</p>
                <p>支援している利用者の方が、毎日の就労訓練の中で「自信がついて表情が明るくなった」「敬語が使えるようになった」「自分から指示を仰げるようになった」など毎日の積み重ねの中で成長していく瞬間を見ると、とてもやりがいがある仕事だと感じます。</p>
                <h6>Q2 若竹会に決めた理由なんですか？</h6>
                <p>幅広い業務内容と先輩職員の人柄に惹かれて若竹会に決めました。</p>
                <p>業務内容については、若竹福祉総合学院の仕事、パン屋の仕事、就職活動に関する仕事など、様々な業務に携わることができることに魅力を感じました。</p>
                <p>また職場見学に行ったときに先輩職員と話をする中で、みなさんとても話しやすく、仕事に対して誠実に向き合っているなと感じました。</p>
                <p>私も若竹会で様々な仕事に向き合いながら、一緒に働く先輩や上司から多くのことを学びたいと思い、この職場を選びました。                  </p>
                <h6>Q3 心に残っているエピソードはありますか？</h6>
                <p>ある利用者の方が就職されて一般企業でお仕事をされており、仕事上で辛いことを乗り越えられた時に、「ワークステーションで訓練をしていて良かったです！」と言ってくれたことが心に残っています。</p>
                <p>その方は若竹会で就労訓練をしていたおかげで辛いことを乗り越えられたとお話してくれました。とても心に残り、救われるような思いになりました。                  </p>
                <h6>Q4 若竹会の雰囲気はどうでしょうか？</h6>
                <p>周りとコミュニケーションが取りやすく、良い雰囲気だと思います。</p>
                <p>具体的には、仕事での困りごとがあればすぐに相談できますし、自分の意見やアイディアがあれば提案しやすい雰囲気です。                  </p>
                <p>定期的に法人内のイベントもあり、若竹会の他事業所の職員とも交流する機会があります。</p>
                <p>年齢が近い職員も多いので楽しいコミュニケーションも活発です。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- スタッフ3 モーダル -->
      <div id="modal03" class="modal">
        <div class="md-overlay md-close"></div>
          <div class="md-contents">
            <a href="" class="md-xmark md-close">
              <span></span>
              <span></span>
            </a>
            <div class="md-inner">
              <img src="./assets/images/stuff-03.png" alt="スタッフ3">
              <p>R6年入社/新卒採用<br>生活支援員</p>
              <div class="interview-text">
                <h6>Q1 やりがいを感じる時はどんな時ですか？</h6>
                <p>利用者さんが苦手だった事を率先して取り組んでいた姿を見た時にやりがいを感じます。</p>
                <h6>Q2 若竹会に決めた理由なんですか？</h6>
                <p>コロナが流行りだし高卒で経験がない私では施設見学すら断られる中で優しく対応して頂き、見学の際には利用者さんと職員さんが楽しそうに話しているのを見て決めました。</p>
                <h6>Q3 心に残っているエピソードはありますか？</h6>
                <p>若竹作業所の方たちとディズニーランド旅行に行ったことです。</p>
                <p>2年間関わらせて頂いた職員さんや利用者さんとの旅行は普段とは違い作業以外の顔が見れてとても楽しかったです。</p>
                <h6>Q4 若竹会の雰囲気はどうでしょうか？</h6>
                <p>いつもパワフルなイメージがあり他の部署の職員さんも会った時には話しかけに来て下さったり利用者さんも「元気にしてる？」など声をかけに来てくださいます。</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- スタッフ4 モーダル -->
      <div id="modal04" class="modal">
        <div class="md-overlay md-close"></div>
          <div class="md-contents">
            <a href="" class="md-xmark md-close">
              <span></span>
              <span></span>
            </a>
            <div class="md-inner">
              <img src="./assets/images/stuff-04.png" alt="スタッフ4">
              <p>R3年入社/新卒採用<br>職業指導員</p>
              <div class="interview-text">
                <h6>Q1 やりがいを感じる時はどんな時ですか？</h6>
                <p>日々利用者さんの支援に携わっている中で、その人に合った支援を見つけられた時、できることが増えた瞬間、この２つは特にこの仕事をしていてやりがいを感じます。</p>
                <p>毎日関わっている中で、時にはうまく思いが伝わらない時もありますが、時間はかかっても少しずつ成長している姿を見ると、自分のことのように嬉しくなります。</p>
                <h6>Q2 若竹会に決めた理由なんですか？</h6>
                <p>大学生の時にインターンで山寺作業所に行き、ある活動の中で、利用者さんのできるようになったことをすぐに共有し、職員の方も利用者さんも一緒になって喜ばれている姿を見て、私もこの法人のチームの１人になり、利用者支援に携われたらと思うようになりました。</p>
                <p>三年経った今でもその思いは変わらず、利用者さんの成長を大切に、みんなで支援して行けたらと思っています。</p>
                <h6>Q3 心に残っているエピソードはありますか？</h6>
                <p>私自身、仕事をする中でうまく行かず気持ちが落ち込んだ時、その様子に気づいた利用者さんが「僕も悩んだ時あったんですよ！気持ちわかります！」と声をかけてくれました。</p>
                <p>私はその言葉に救われ、利用者さんを支援しているだけでなく、時には職員が支えてもらっていることもあるのだと気づかされました。</p>
                <p>このことから、私自身も日々の利用者さんの小さな変化にも気づき、その人に応じた声掛けを大事にしたいと思っています。</p>
                <h6>Q4 若竹会の雰囲気はどうでしょうか？</h6>
                <p>今まで経験したことのない新しいことに挑戦できたり、何か困りごとがあれば相談しやすい雰囲気だと思います。</p>
                <p>私自身、今年度からワークステーションだけでなく若竹福祉総合学院の支援にも入らせていただけることになり、先輩職員の方々に相談させていただきながら、学院生一人ひとりに応じた声掛けや関わり方を勉強させていただいています。</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- スタッフ5 モーダル -->
      <div id="modal05" class="modal">
        <div class="md-overlay md-close"></div>
          <div class="md-contents">
            <a href="" class="md-xmark md-close">
              <span></span>
              <span></span>
            </a>
            <div class="md-inner">
              <img src="./assets/images/stuff-05.png" alt="スタッフ5">
              <p>H30年入社/新卒採用<br>訪問支援員</p>
              <div class="interview-text">
                <h6>Q1 やりがいを感じる時はどんな時ですか？</h6>
                <p>現在、ヘルプステーションわかたけで訪問支援や外出支援をしていますが、利用者さんの中には1人で外出することや他者と関わることに強い不安感をもっておられる方も多くいらっしゃいます。</p>
                <p>支援の中で買い物や外食などの人と関わる経験を積み重ね、「次はこれをしてみたいです」と自ら話をされる姿を見たときに、新しいことにチャレンジするきっかけ作りのお手伝いができたのかなと思い、やりがいを感じました。</p>
                <h6>Q2 若竹会に決めた理由なんですか？</h6>
                <p>就職活動をする中でいくつかの施設を見学・体験しましたが、若竹会では利用者さんと一対一で話をする機会を用意してもらえたこと、そこで利用者さんが「ここに来て成長できた」と話しておられるのを聞いて、私もここで働いたら利用者さんと一緒に成長できるかも…と思ったからです。</p>
                <h6>Q3 心に残っているエピソードはありますか？</h6>
                <p>1年目にワークステーションわかたけ（就労移行支援施設）で働いている頃に出会った利用者さんで就労訓練で注意を受けるとすぐに落ち込み作業が手につかなくなる方がおられましたが、訓練をしていく中で注意を受けてもすぐに切り替えて次の作業に取り組むことができるようになっていました。</p>
                <p>その変化をご本人に伝えると「僕はここに来てなかったら、就職しても怒られただけで引きこもりになっていたかもしれない」「ここに来てよかった」という言葉を聞けた時に利用者さんの成長に少しでも関わる仕事ができてよかったなと思い、これからも頑張ろうと思った記憶があります。</p>
                <h6>Q4 若竹会の雰囲気はどうでしょうか？</h6>
                <p>毎年新しいことにチャレンジをしていて、活気のある職場だと思います。対人支援の職場ということもあり、思いやりのある職員さんが多いと感じます。</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- スタッフ6 モーダル -->
      <div id="modal06" class="modal">
        <div class="md-overlay md-close"></div>
          <div class="md-contents">
            <a href="" class="md-xmark md-close">
              <span></span>
              <span></span>
            </a>
            <div class="md-inner">
              <img src="./assets/images/stuff-06.png" alt="スタッフ6">
              <p>R6年入社/新卒採用<br>生活支援員</p>
              <div class="interview-text">
                <h6>Q1 やりがいを感じる時はどんな時ですか？</h6>
                <p>シンプルですが、利用者さんができなかった事が出来るようになったときや利用者さん達の笑顔が日々増えていく事を実感した時です。</p>
                <h6>Q2 若竹会に決めた理由なんですか？</h6>
                <p>理念に共感出来た事は勿論ですが、利用者さん、職員共に穏やかで笑顔が多く施設全体の雰囲気がとても良かったからです。</p>
                <h6>Q3 心に残っているエピソードはありますか？</h6>
                <p>今まで数々の若竹会のイベントがあり、参加させていただきましたが、その中でも職員、利用者さん全員で伊勢旅行に行った事が心に強く残っています。</p>
                <p>普段とは違う利用者さん達の雰囲気や笑顔、色んな事を一緒に楽しめた事が良かったです。</p>
                <h6>Q4 若竹会の雰囲気はどうでしょうか？</h6>
                <p>幅広い年齢層の男女が働いており、多様な価値観や考え方を持った従業員との楽しいコミュニケーションが活発です。</p>
                <p>入職して2回出産で育児休業を取得させて頂きましたが、育児休暇もしっかり取得でき、さらに復帰後も子供の体調不良などの事情で急な休みが必要になったときも、スケジュール調整やほかの従業員のサポートによって協力できるようにしてくださってるので仕事と子育ての両立も実現し働きやすい環境です。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- 募集要項・福利厚生 -->
    <section class="welfare" id="recruit-welfare">
      <div class="tabs">
        <input id="recruit" type="radio" name="tab_item" checked>
        <label class="tab_item" for="recruit"><h2 class="recruit">募集要項</h2></label>
        <input id="welfare" type="radio" name="tab_item">
        <label class="tab_item" for="welfare"><h2 class="welfare-label">給与・福利厚生</h2></label>

        <!-- 募集要項 -->
        <div class="tab_content" id="recruit_content">
          <div class="tab_content_description">
            <h3>職種</h3>
            <p>
              総合職（職業指導員/生活指導員/訪問介護職員）
              <span>※訪問介護職は資格必須</span>
            </p>
            <h3>仕事内容</h3>
            <p>
              障がいのある人が自立し、地域の中で生きがいを持って働きながら暮らしていくためのサポートを行います。
            </p>
            <h3>応募資格</h3>
            <p>
              短大/専門/高専/大学/大学院卒業/<br>
              第二新卒/見込みの方
            </p>
            <h3>勤務部署</h3>
            <h4>職業指導員</h4>
            <h5>若竹作業所</h5><span class="dashed"></span>
            <p>
              障がいにより一般企業等での就労が困難な方に働く場を提供するとともに、知識及び能力の向上のために必要な支援を行います。
            </p>
            <h5>ワークステーションわかたけ</h5><span class="dashed"></span>
            <p>
              軽作業の下請けや企業での清掃業務などを通じて、障がいのある人が自己実現のための就労に必要なスキルを身に付ける支援を行います。
            </p>
            <h4>生活指導員</h4>
            <h5>山寺作業所</h5><span class="dashed"></span>
            <p>
              重度の障がいをお持ちの方に抱え上げない介護の実践による入浴、排泄の支援や余暇活動の機会の提供など、安定した日常生活に向けた支援を行います。
            </p>
            <h4>訪問介護支援員</h4>
            <h5>ヘルプステーションわかたけ/<br>ケア湖風介護サービス</h5><span class="dashed"></span>
            <p>
              介護が必要な障害をお持ちの方のご自宅に訪問し生活の支援を行います。<br>
              <span>※日によっては勤務部署が変わる場合がございます。</span>
            </p>
            <h3>勤務時間</h3>
            <p>シフト制</p>
            <ul class="working-hours">
              <li>8：30~17：30/休憩時間60分</li>
              <li>8：30~17：15/休憩時間45分</li>
            </ul>
            <p class="working-hours2">訪問介護職員(シフト制)</p>
            <p class="working-hours2">8：00~21：00のうち時間労働/休憩1時間</p>
          </div>
        </div>

        <!-- 給与・福利厚生 -->
        <div class="tab_content" id="welfare_content">
          <div class="tab_content_description-2">
            <h3>給与</h3>
            <ul class="payroll-treatment">
              <li>
                <p>短大/専門/高専卒業見込みの方</p>
                <p>月給：189,800円（一律手当含む）</p>
              </li>
              <li>
                <p>大学/大学院卒業見込みの方</p>
                <p>月給：226,800円（一律手当含む）</p>
              </li>
            </ul>
            <h3>手当</h3>
            <ul class="payroll-treatment">
              <li>一律処遇改善手当：26,000円
                <p>
                  ※一律手当の金額は、給与と同じ単位（月給制であれば月単位、年棒制であれば年単位）で支給される金額です。
                </p>
              </li>
              <li>その他手当</li>
              <li>住宅手当：上限27,000円</li>
              <li>資格手当：5,000円</li>
              <li>健康診断付加検診</li>
              <li>福祉関係資格取得サポート（費用・休暇）</li>
              <li>自己啓発、スキルアップ等の各種研修受講</li>
              <li>わくわくリフレッシュ手当</li>
            </ul>
            <h3>昇給</h3>年1回
            <h3>賞与</h3>年3回<span>4.7ヶ月分（業績による）</span>
            <h3>休日</h3>
            <ul class="payroll-treatment">
              <li>週休二日制</li>
              <li>年間休日：123日</li>
              <li>有給休暇：10日/半年に1回付与</li>
              <li>休暇制度：GW休暇、年末年始休暇、慶弔休暇</li>
            </ul>
            <h3>福利厚生</h3>
            <ul class="payroll-treatment">
              <li>社会保険完備</li>
              <li>健康保険、厚生年金、雇用保険<br>労働災害補償保険（労災）</li>
              <li>その他制度</li>
              <li>退職金制度、再雇用制度（65歳まで）</li>
            </ul>
            <div class="skill-up-container">
              <div class="skill-up-container__inner">
                <h4>研修制度</h4>
                <p>外部研修や<br>民間研修多数あり！</p>
                <p>サービス管理研修/<br>相談支援専門員研修</p>
              </div>
              <div class="skill-up-container__inner">
                <h4>サポート体制</h4>
                <p>資格取得の為の出勤スケジュールは自由に調整できる！</p>
              </div>
            </div>
            <h3>使用期間</h3>
            <p>３ヶ月：労働条件の変更なし</p>
          </div>
        </div>
      </div>
    </section>

    <!-- 理事長挨拶 -->
    <section class="president">
      <div class="president-container">
        <div class="president-container__inner">
          <img src="./assets/images/president.jpg" alt="理事長">
          <div class="president-name">
            <p>権田　五雄</p>
            <span>理事長</span>
          </div>
          <div class="president-catch">
            <p class="catch">人と地域を</p>
            <p class="catch">支える力を育む</p>
          </div>
        </div>
        <div class="president-container__text">
          <p>
            若竹会では障がいの「ある」「ない」に関係なく、その人らしい選択ができる社会が望ましいのではと考えています。
          </p>
          <p>
            障がいを理由にその人らしい選択ができないことや選択肢すら用意されていない社会に問題があるのではないか。
          </p>
          <p>
            誰もが自分の夢や希望に向かってチャレンジできること、社会はそのチャレンジを受け止め、福祉はチャレンジを応援する役割を担っていると言えるでしょう。
          </p>
          <p>
            若竹会は福祉を取り巻く社会の変化に対して柔軟に対応することで、人権の尊重と障がい福祉の精神を守っていくことができると思っています。
          </p>
          <p>
            障がいのある方と共に成長し、明るく豊かな人生を見守り続けながら、障がいという分け隔てが無くなる社会をめざしていきたいと考えています。
          </p>
        </div>
      </div>
    </section>

    <!-- 会社概要 -->
    <section class="company-information" id="company-information">
      <div class="company-information__title">
        <p>Company Information</p>
        <h2>会社概要</h2>
      </div>
      <ul class="company-information__list">
        <li>
          <h3>事業内容</h3>
          <ul class="company-information__category">
            <li>第二種社会福祉事業</li>
            <li>・障がい福祉サービス事業の経営</li>
            <li>・移動支援事業の経営</li>
            <li>・特定相談支援事業の経営</li>
          </ul>
        </li>
        <li>
          <h3>設立</h3>
          <p>1989年9月</p>
        </li>
        <li>
          <h3>資本金</h3>
          <p>社会福祉法人のため資本金はありません。</p>
        </li>
        <li>
          <h3>従業員数</h3>
          <p>58名(令和5年度時)</p>
        </li>
        <li>
          <h3>売上高</h3>
          <p>2億4000万(2023年度)
          </p>
        </li>
        <li>
          <h3>代表者</h3>
          <p>権田　五雄</p>
        </li>
        <li>
          <h3>事業所</h3>
          <ul class="company-information__place">
            <li><a href="https://www.wakatake.info/wakatake/">若竹作業所</a></li>
            <li><a href="https://www.wakatake.info/yamadera/">山寺作業所</a></li>
            <li><a href="https://wakatake-ws.com/">ワークステーションわかたけ</a></li>
            <li><a href="https://www.wakatake.info/care/">ケア湖風介護サービス/<br>ヘルプステーションわかたけ</a></li>
            <li>グループホーム若竹</li>
          </ul>
        </li>
      </ul>
    </section>

    <!-- アクセス -->
    <section class="access" id="access">
      <div class="access-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6533.706900067618!2d135.95012327647004!3d35.0353959728027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600173b260831441%3A0x51962852222919ad!2z44CSNTI1LTAwMjIg5ruL6LOA55yM6I2J5rSl5biC5bed5Y6f55S677yS77yZ77yX4oiS77yT!5e0!3m2!1sja!2sjp!4v1720154705714!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="access-address">
        <span>Access</span>
        <h2>社会福祉法人若竹会<br>法人本部</h2>
        <p>滋賀県草津市川原町297-3　2F</p>
        <p>質問やご不明点等がございまいしたら、こちらよりお問い合わせください。</p>
      </div>
      <div class="access-contact" id="inquiry">
        <h3><a href="tel:077-569-5697">TEL/077-569-5697</a></h3>
        <div class="modal-inquiry__open">フォームでのお問い合わせ</div>
        <div class="modal-inquiry__container">
          <div class="modal-inquiry__body">
            <div class="modal-inquiry__close">×</div>
            <form class="modal-inquiry" method="post"　action="index.php" onsubmit="return confirm_end()">
              <h2>お問い合わせフォーム</h2>
                  <ul class="user-information">
                    <li>
                      <label for="user-name">お名前</label><span>必須</span><br>
                      <input type="text" id="user-name" name="inquiry-name" required>
                    </li>
                    <li>
                      <label for="user-number">電話番号</label><span>必須</span><br>
                      <input type="number" id="user-number" name="inquiry-number" required>
                    </li>
                    <li>
                      <label for="inquiry-email">メールアドレス</label><span>必須</span><br>
                      <input type="email" id="inquiry-email" name="inquiry-email" required>
                    </li>
                    <li>
                      <label for="textarea">お問い合わせ内容</label><span>必須</span><br>
                      <textarea id="textarea" name="textarea" cols="30" rows="10" required></textarea>
                    </li>
                  </ul>
                  <a href="./privacy-policy.html" target="_blank" rel="noopener noreferrer"><input type="checkbox" name="privacy" required>プライバシーポリシーに同意する</a>
                  <p><input type="submit" name="confirm" value="送信する"></p>
            </form>
          </div>
        </div>
        <div class="access-act">
          <h3>エントリーをご希望の方はこちら！</h3>
          <a href="./contact.php"><div class="form-open-2"><p>エントリー ></p></div></a>
          <div class="modal-close"></div>
        </div>
      </div>
    </section>
    <?php
      }
    ?>
    <!-- フッター -->
    <footer>
      <div class="footer-container">
        <ul class="footer-container__links">
          <li><a href="https://www.wakatake.info/">法人トップ</a></li>
          <li>
            <a href="https://wakatake-ws.com/">ワークステーションわかたけ</a>
            <ul class="footer-container__links-workstation">
              <li><a href="https://wakatake-ws.com/school.html">若竹福祉総合学院</a></li>
              <li><a href="https://wakatake-ws.com/bakery&cafe.html">Bakery&Cafe わかたけ</a></li>
              <li><a href="https://pluslab.wakatake.info/">Plus らぼ</a></li>
            </ul>
          </li>
          <li><a href="https://www.wakatake.info/wakatake/">若竹作業所</a></li>
          <li><a href="https://www.wakatake.info/yamadera/">山寺作業所</a></li>
          <li><a href="https://www.wakatake.info/care/">ケア湖風介護サービス/<br>ヘルプステーションわかたけ</a></li>
        </ul>
        <div class="page-top">
          <a href="#">↑</a>
        </div>
      </div>
      <small>© 社会福祉法人若竹会</small>
    </footer>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.BgSwitcher/0.4.3/jquery.bgswitcher.js" integrity="sha512-9LIlD0iFGe6zp/JGs+8U4j010oFIUuka+LqQpTYycGLgU1lyqO5hy8+lpO3wSCVptbcCFIWd7LrEh95F5axYOw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="./js/main.js"></script>    
</body>
</html>