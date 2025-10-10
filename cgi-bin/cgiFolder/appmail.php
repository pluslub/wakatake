<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

/**
 * テンプレートに対応したメール送信クラス
 */
class AppMail {

  protected $content;
  protected $lang;
  protected $subject;
  protected $options;
  protected $headers = "";
  protected $footers = "";
  
  /**
   * コンストラクタ
   * @access    public
   * @param     String    $tplfile    テンプレートファイルのパス
   * @param     String    $lang       メール送信時の言語指定
   */
  public function __construct($tplfile, $lang = "ja") {
  	$this->content = $this->convert(file_get_contents($tplfile));
  	$this->lang = $lang;
  }
  
  /**
   * @access    public
   * @param     String    $matches       設定する件名
   */
  public function setSubject($matches) {
    $this->subject = $matches;
  }
  
  /**
   * @access    public
   * @param     String    $matches       設定するメールヘッダ
   */
  public function setHeaders($matches) {
  	$this->headers = $matches;
  }
  public function setFooters($matches) {
    $this->footers = $matches;
  }
  
  protected function replace_options($matches) {
  	if (array_key_exists($matches[1], $this->options)) {
      return $this->options[$matches[1]];
    } else {
      return "";
    }
  }
  
  protected function extract_subject($matches) {
  	//$this->subject = trim($matches[1]);
  	trim($matches[1]);
  	return "";
  }
  
  /**
 * テンプレートにマップの値をセットしてメールを指定された先に送信します。
   * @access    public
   * @param     String    $to    メール送信先
   * @param     String    $from  メール送信元
   * @param     String    $reply Reply-Toの値
   * @param     Array     $opts  テンプレートに当てはまるマップ
   */
  public function send($to, $from, $reply, $opts) 
  {
    $this->options = $opts;
    
    //$content = $this->headers;
    // テンプレートにマップの値をセット
    $content .= preg_replace_callback('/\{\$([a-z0-9_]+)\}/',
                 array($this, "replace_options"), $this->content);
	//$content .= $this->footers;
	
	// これをしないとメールヘッダが化けてしまう
	// http://kawama.jp/archives/2007/11/mb_send_mail.html
	// http://www.securehtml.jp/utf-8/php_utf_mail.html
	mb_language("uni");
	
    //mb_language($this->lang);
    $enc = "UTF-8";
    $mail_subject = mb_convert_encoding($this->subject, $enc, mb_detect_encoding($this->subject));
    $mail_content = mb_convert_encoding($content, $enc, mb_detect_encoding($content));
    
    //// 一時的にファイル保存
    //$fp = fopen("log.txt", "w");
    //fwrite($fp, $mail_content);
    //fclose($fp);
    
    //$result = mb_send_mail($to, $this->subject, $content, "From:{$from} \nReply-To:{$reply}");
    $result = mb_send_mail($to, $mail_subject, $mail_content, "From:{$from} \nReply-To:{$reply}");
    //BrovalBox対応 From:の後にスペースがないと送信ができない。
    if($result){
    }else{
    $result = mb_send_mail($to, $mail_subject, $mail_content, "From: {$from} \nReply-To:{$reply}");
    }
    $this->options = NULL;
    $this->subject = NULL;
    
    mb_language($this->lang);
    
    return $result;
  }
  
  private function convert($str)
  {
  	return mb_convert_encoding($str, "UTF-8", mb_detect_encoding($str) );
  }
}
?>

