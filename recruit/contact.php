<?php
//デバッグ用
//ini_set('display_errors', "On");

//フラグ初期化
$flag = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //データ取得
  $confirm = isset($_POST['confirm']);
  $send = isset($_POST['send']);
  $user_name = $_POST['user-name'];
  $user_number = $_POST['user-number'];
  $user_email = isset($_POST['user-email']);
  $user_school = isset($_POST['user-school']);
  $school_category = isset($_POST['school-category']);
  $school_graduate = $_POST['school-graduate'];
  $user_first_hope = $_POST['user-first-hope'];
  $user_second_hope = $_POST['user-second-hope'];
  $user_third_hope = $_POST['user-third-hope'];
  $chk = isset($_POST['privacy']);
  
  //確認画面へ
  if(!empty($confirm)) {
      //エラー処理
      $errors = [];
      
      // 氏名
      if (empty($_POST['user-name'])) {
          $errors['user-name'] = 'お名前を入力してください。';
      }
      //電話番号
      if (empty($_POST['user-number'])) {
          $errors['user-number'] = '電話番号を入力してください。';
      }
      // Eメール
      if (empty($_POST['user-email'])) {
          $errors['user-email'] = 'メールアドレスを入力してください。';
      } elseif (!filter_var($_POST['user-email'], FILTER_VALIDATE_EMAIL)) {
          $errors['user-email'] = '正しいEメールアドレスを入力してください。';
      }
      // 学校名
      if (empty($_POST['user-school'])) {
          $errors['user-school'] = '学校名を入力してください。';
      }
      // 学部
      if (empty($_POST['school-category'])) {
          $errors['school-category'] = '学部名を入力してください。';
      }

      // 卒業予定年月日
      if (empty($_POST['school-graduate'])) {
          $errors['school-graduate'] = '卒業予定年月日を入力してください。';
      }
      $schooldate = explode('-', $_POST['school-graduate']);
      if (count($schooldate) !== 3) {
          $errors['school-graduate'] = '日付を正しい形式で入力してください';
      } elseif (!checkdate($schooldate[1], $schooldate[2], $schooldate[0])) {
          $errors['school-graduate'] = '日付を正しい日付で入力してください';
      }

      // 第一希望日
      if (empty($_POST['user-first-hope'])) {
          $errors['user-first-hope'] = '第一希望日を入力してください。';
      }
      $hope1 = explode('-', $_POST['user-first-hope']);
      if (count($hope1) !== 3) {
          $errors['user-first-hope'] = '日付を正しい形式で入力してください';
      } elseif (!checkdate($hope1[1], $hope1[2], $hope1[0])) {
          $errors['user-first-hope'] = '日付を正しい日付で入力してください';
      }
      $hope2 = explode('-', $_POST['user-second-hope']);
      if (!empty($_POST['user-second-hope'])) {
        if (count($hope2) !== 3) {
            $errors['user-second-hope'] = '日付を正しい形式で入力してください';
        } elseif (!checkdate($hope2[1], $hope2[2], $hope2[0])) {
            $errors['user-second-hope'] = '日付を正しい日付で入力してください';
        }
      }
      $hope3 = explode('-', $_POST['user-third-hope']);
      if (!empty($_POST['user-third-hope'])) {
        if (count($hope3) !== 3) {
            $errors['user-third-hope'] = '日付を正しい形式で入力してください';
        } elseif (!checkdate($hope3[1], $hope3[2], $hope3[0])) {
            $errors['user-third-hope'] = '日付を正しい日付で入力してください';
        }
      }
      // プライバシーポリシーに同意する
      if (empty($_POST['privacy'])) {
          $errors['privacy'] = '「プライバシーポリシーに同意する」にチェックを入れてください。';
      }
      

      if (empty($errors)) {
        //確認画面へ
        $flag = 1;
      } else {
        //エラー表示
        $flag = 0;
      }

  } elseif(!empty($send)) {
    
#    $to = "ws@wakatake.info";
    $to = "mayufc3s@sc4.so-net.ne.jp";
// タイムゾーンの設定
    date_default_timezone_set('Asia/Tokyo');

    // 使用言語（日本語）の設定
    mb_language("ja");
    mb_internal_encoding("UTF-8");

    // 自動返信メール件名
    $reply_subject = "エントリーを受付いたしました";

    // 自動返信メール本文
    $reply_text = "この度は、エントリー頂き誠にありがとうございます。"."\n";
    $reply_text .= "下記の内容で受付いたしました。"."\n";
    $reply_text .= "日程が決定いたしましたら、改めて担当者より下記連の絡先にご連絡させていただきます。"."\n\n";
    $reply_text .= "お名前：" . $user_name . "\n";
    $reply_text .= "電話番号：" . $user_number . "\n";
    $reply_text .= "メールアドレス：" . $user_email . "\n";
    $reply_text .= "学校名：" . $user_school . "\n";
    $reply_text .= "学部：" . $school_category . "\n";
    $reply_text .= "卒業予定年月日：" . $school_graduate . "\n";
    $reply_text .= "第一希望日：" . $user_first_hope . "\n";
    $reply_text .= "第二希望日：" . $user_second_hope . "\n";
    $reply_text .= "第三希望日：" . $user_third_hope . "\n\n";
    $reply_text .= "ーーーーーーーーーーー"."\n";
    $reply_text .= "社会福祉法人若竹会"."\n";
    $reply_text .= "滋賀県草津市川原町298-1"."\n";
    $reply_text .= "TEL:077-569-5697"."\n";
    $reply_text .= "https://www.wakatake.info/"."\n";    
    $reply_text .= "ーーーーーーーーーーー"."\n\n";

    // 自動返信メールヘッダー情報
    $fromEmail = $to;
    $fromName = "ワークステーションわかたけ";
    $headers = "From: " . mb_encode_mimeheader($fromName,"UTF-8") . " <" . $fromEmail . ">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=ISO-2022-JP\r\n";

    // 自動返信メールの送信
    mb_send_mail($user_email, $reply_subject, $reply_text, $headers);

    //通知メール送信
    $subject = "エントリーフォームより応募がありました";

    $message_body .= "お名前：" . $user_name . "\n";
    $message_body .= "電話番号：" . $user_number . "\n";
    $message_body .= "メールアドレス：" . $user_email . "\n";
    $message_body .= "学校名：" . $user_school . "\n";
    $message_body .= "学部：" . $school_category . "\n";
    $message_body .= "卒業予定年月日：" . $school_graduate . "\n";
    $message_body .= "第一希望日：" . $user_first_hope . "\n";
    $message_body .= "第二希望日：" . $user_second_hope . "\n";
    $message_body .= "第三希望日：" . $user_third_hope . "\n";

    mb_send_mail($to, $subject, $message_body, $headers);
    $success_message = "送信完了いたしました。";
    $flag = 3;
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
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
  <!--<link rel="stylesheet" href="/css/slick-theme.css"/> -->
  <link rel="stylesheet" href="./css/slick.css"/>
  <link rel="stylesheet" href="./css/style.css">
  <?php 
    if($flag == 3) {
  ?>
    <meta http-equiv="refresh" content="3;url=https://wakatake-ws.com/pluslab/test/">
  <?php 
      }
  ?>
</head>

<body>
  <h1>社会福祉法人<span>若竹会</span></h1>
  <main class="wrapper">
    <header>
      <nav>
        <a href="./index.php"><p>社会福祉法人若竹会<span>採用ページ</span></p></a>
        <div class="hamburger">
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
        </div>
        <div class="drawer-menu">
          <ul class="drawer-menu-list" id="page-link">
            <div class="hamburger">×</div>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="./index.html">採用ページ ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="https://www.wakatake.info/">法人トップ ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="./index/#environment">職場環境 ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="./index/#recruit-welfare">募集要項 ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="./index/#company-information">会社概要 ></a></li>
            <li class="drawer-menu-item"><a class="drawer-menu-item-link" href="./index/#access">アクセス ></a></li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- メインビジュアル -->
    <section class="mainvisual">
      <div class="first-content">
        <?php 
          if($flag == 0) {
            $user_name = isset($user_name) ? $user_name : '';
            $err_user_name = isset($errors['user-name']) ? $errors['user-name'] : '';
            $err_user_number = isset($errors['user-number']) ? $errors['user-number'] : '';
            $err_user_email = isset($errors['user-email']) ? $errors['user-email'] : '';
            $err_user_school = isset($errors['user-school']) ? $errors['user-school'] : '';
            $err_school_category = isset($errors['school-category']) ? $errors['school-category'] : '';
            $err_school_graduate = isset($errors['school-graduate']) ? $errors['school-graduate'] : '';
            $err_user_first_hope = isset($errors['user-first-hope']) ? $errors['user-first-hope'] : '';
            $err_user_second_hope = isset($errors['user-second-hope']) ? $errors['user-second-hope'] : '';
            $err_user_third_hope = isset($errors['user-third-hope']) ? $errors['user-third-hope'] : '';
            $err_privacy = isset($errors['privacy']) ? $errors['privacy'] : '';
            
        ?>
        <form class="modal-content" method="post" action="contact.php">
          <h2> エントリーフォーム</h2>
            <ul class="modal-content__inner">
              <li>
                <label for="name">お名前</label><span>必須</span><br>
                <input type="text" id="name" name="user-name" value="<?php echo $user_name?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_name?></div>
              </li>
              <li>
                <label for="number">電話番号</label><span>必須</span><br>
                <input type="number" id="number" name="user-number" value="<?php echo $user_number?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_number ?></div>
              </li>
              <li>
                <label for="email">メールアドレス</label><span>必須</span>
                <input type="email" id="email" name="user-email" value="<?php echo isset($user_email) ? $user_email : '' ?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_email ?></div>
              </li>
              <li>
                <label for="school">学校名</label><span>必須</span><br>
                <input type="text" id="school" name="user-school" value="<?php echo isset($user_school) ? $user_school : '' ?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_school ?></div>
              </li>
              <li>
                <label for="category">学部</label><span>必須</span><br>
                <input type="text" id="category" name="school-category" value="<?php echo isset($school_category) ? $school_category : '' ?>">
                <div style="color:red;padding:10px;"><?php echo $err_school_category ?></div>
              </li>
              <li>
                <label for="graduate">卒業予定年月日</label><span>必須</span><br>
                <input type="date" id="graduate" name="school-graduate" value="<?php echo $school_graduate?>">
                <div style="color:red;padding:10px;"><?php echo $err_school_graduate ?></div>
              </li>
              <li>
                <label for="first-hope">第一希望日</label><span>必須</span><br>
                <input type="date" id="first-hope" name="user-first-hope" value="<?php echo $user_first_hope?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_first_hope ?></div>
              </li>
              <li>
                <label for="second-hope">第二希望日</label><br>
                <input type="date" id="second-hope" name="user-second-hope" value="<?php echo $user_second_hope?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_second_hope ?></div>
              </li>
              <li>
                <label for="third-hope">第三希望日</label><br>
                <input type="date" id="third-hope" name="user-third-hope" value="<?php echo $user_third_hope?>">
                <div style="color:red;padding:10px;"><?php echo $err_user_third_hope ?></div>
              </li>
            </ul>
            <a href="/privacy-policy.html" target="_blank" rel="noopener noreferrer"><input type="checkbox" name="privacy">プライバシーポリシーに同意する</a>
            <div style="color:red;padding:10px;"><?php echo $err_privacy ?></div>

            <p><input type="submit" name="confirm" value="送信する"></p>
          </form>
        <?php 
          } elseif ($flag == 1) {
        ?>
          <form class="modal-content" method="post" action="contact.php">
          <h2>確認画面</h2>
          以下の内容で送信いたします。
          よろしければ、送信ボタンをクリックしてください。
            <ul class="modal-content__inner">
              <li style="margin-bottom: 1.8rem;">
                <label for="name" style="font-weight: bold;">お名前</label><br>
                <?php echo $user_name ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="number" style="font-weight: bold;">電話番号</label><br>
                <?php echo $user_number ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="mail" style="font-weight: bold;">メールアドレス</label><br>
                <?php echo isset($user_email) ? $user_email : ''; ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="school" style="font-weight: bold;">学校名</label><br>
                <?php echo $user_school ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="category" style="font-weight: bold;">学部</label><br>
                <?php echo $school_category ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="graduate" style="font-weight: bold;">卒業予定年月日</label><br>
                <?php echo $school_graduate ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="first-hope" style="font-weight: bold;">第一希望日</label><br>
                <?php echo $user_first_hope ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="second-hope" style="font-weight: bold;">第二希望日</label><br>
                <?php echo $user_second_hope ?>
              </li>
              <li style="margin-bottom: 1.8rem;">
                <label for="third-hope" style="font-weight: bold;">第三希望日</label><br>
                <?php echo $user_third_hope ?>
              </li>
            </ul>
            <input type="hidden" name="user-name" value="<?php echo $user_name ?>">
            <input type="hidden" name="user-number" value="<?php echo $user_number ?>">
            <input type="hidden" name="user-email" value="<?php echo $user_email ?>">
            <input type="hidden" name="user-school" value="<?php echo $user_school ?>">
            <input type="hidden" name="school-category" value="<?php echo $school_category ?>">
            <input type="hidden" name="school-graduate" value="<?php echo $school_graduate ?>">
            <input type="hidden" name="user-first-hope" value="<?php echo $user_first_hope ?>">
            <input type="hidden" name="user-second-hope" value="<?php echo $user_second_hope ?>">
            <input type="hidden" name="user-third-hope" value="<?php echo $user_third_hope ?>">
            <p><input class="edit" type="submit" name="back" value="修正する" style="background-color: var(--bgColor); border: solid 1px #4B7BE8; color: #4B7BE8;"></p>
            <p><input type="submit" name="send" value="送信する"></p>
          </form>
        <?php 
          } elseif($flag == 3) {
        ?> 
          <div class="modal-content">
            <h2>送信を完了いたしました。</h2>
          </div>
        <?php
          }
        ?>
      </div>
    </section>

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