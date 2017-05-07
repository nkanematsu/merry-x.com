<?php header("Content-Type:text/html;charset=UTF-8"); ?>
<?php
//==========================================================
//  メールフォームシステム ver.0.96
//  eWeb http://www.eweb-design.com/
//==========================================================

// このファイルの名前
$script ="contact.php";

// メールを送信するアドレス(複数指定する場合は「,」で区切る)
$to = "info@merry-x.com";

// 送信されるメールのタイトル
$sbj = "お問い合わせフォーム";

// 送信確認画面の表示(する=1, しない=0)
$chmail = 1;

// 送信後に自動的にジャンプする(する=1, しない=0)
// 0にすると、送信終了画面が表示されます。
$jpage = 0;

// 送信後にジャンプするページ(送信後にジャンプする場合)
$next = "http://www.xxxx.com/";

// 差出人は、送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性を「email」にしてください。
$from_add = 1;

// 差出人に送信内容確認メールを送る(送る=1, 送らない=0)
// 送る場合は、メール入力欄のname属性を「email」にしてください。
$remail = 1;

// 差出人に送信確認メールを送る場合のメールのタイトル
$resbj = "送信ありがとうございました";

// 必須入力項目を設定する(する=1, しない=0)
$esse = 0;

// 必須入力項目(入力フォームで指定したname)
$eles = array();

//--------------------------------------------------------------------
// 以上で基本的な設定は終了です。
// 以下の変更は自己責任でお願いします。(行数はデフォルト時)
// 未入力画面のレイアウト → 88行目周辺
// 送信メールのレイアウト → 103行目周辺
// 差出人への送信確認メールのレイアウト → 128行目周辺
// 送信確認画面のレイアウト → 163行目周辺
// 送信終了画面のレイアウト → 194行目周辺
// 送信確認画面や終了画面のヘッダとフッタ → 209行目周辺
//--------------------------------------------------------------------

$sendm = 0;
foreach($_POST as $key=>$var) {
  if($var == "eweb_submit") $sendm = 1;
}

// 文字の置き換え
$string_from = "＼";
$string_to = "ー";

// 未入力項目のチェック
if($esse == 1) {
  $flag = 0;
  $length = count($eles) - 1;
  foreach($_POST as $key=>$var) {
    $key = strtr($key, $string_from, $string_to);
    if($var == "eweb_submit") ;
    else {
      for($i=0; $i<=$length; $i++) {
        if($key == $eles[$i] && empty($var)) {
          $errm .= "<FONT color=#ff0000>「".$key."」は必須入力項目です。</FONT><BR>\n";
          $flag = 1;
        }
      }
    }
  }
  foreach($_POST as $key=>$var) {
    $key = strtr($key, $string_from, $string_to);
    for($i=0; $i<=$length; $i++) {
      if($key == $eles[$i]) {
        $eles[$i] = "eweb_ok";
      }
    }
  }
  for($i=0; $i<=$length; $i++) {
    if($eles[$i] != "eweb_ok") {
      $errm .= "<FONT color=#ff0000>「".$eles[$i]."」が未選択です。</FONT><BR>\n";
      $eles[$i] = "eweb_ok";
      $flag = 1;
    }
  }
  if($flag == 1){
    htmlHeader();
?>


<!--- 未入力があった時の画面 --- 開始 --------------------->

入力エラー<BR><BR>
<?php echo $errm; ?>
<BR><BR>
<INPUT type="button" value="前画面に戻る" onClick="history.back()">

<!--- 終了 --->


<?php 
    htmlFooter();
    exit(0);
  }
}
//--- メールのレイアウトの編集 --- 開始 ------------------->

$body="「".$sbj."」からの発信です\n\n";
$body.="-------------------------------------------------\n\n";
foreach($_POST as $key=>$var) {
  $key = strtr($key, $string_from, $string_to);
  if(get_magic_quotes_gpc()) $var = stripslashes($var);
  if($var == "eweb_submit") ;
  else $body.="[".$key."] ".$var."\n";
}
$body.="\n-------------------------------------------------\n\n";
$body.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
$body.="ホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n\n";

//--- 終了 --->


if($remail == 1) {
//--- 差出人への送信確認メールのレイアウトの編集 --- 開始 ->

$rebody="ありがとうございました。\n";
$rebody.="以下の内容が送信されました。\n\n";
$rebody.="-------------------------------------------------\n\n";
foreach($_POST as $key=>$var) {
  $key = strtr($key, $string_from, $string_to);
  if(get_magic_quotes_gpc()) $var = stripslashes($var);
  if($var == "eweb_submit") ;
  else $rebody.="[".$key."] ".$var."\n";
}
$rebody.="\n-------------------------------------------------\n\n";
$rebody.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
$reto = $_POST['email'];
$rebody=mb_convert_encoding($rebody,"JIS","UTF-8");
$resbj="=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($resbj,"JIS","UTF-8"))."?=";
$reheader="From: $to\nReply-To: ".$to."\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();

//--- 終了 --->
}

$body=mb_convert_encoding($body,"JIS","UTF-8");
$sbj="=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($sbj,"JIS","UTF-8"))."?=";
if($from_add == 1) {
  $from = $_POST['email'];
  $header="From: $from\nReply-To: ".$_POST['email']."\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
} else {
  $header="Reply-To: ".$_POST['email']."\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
}
if($chmail == 0 || $sendm == 1) {
  mail($to,$sbj,$body,$header);
    if($remail == 1) { mail($reto,$resbj,$rebody,$reheader); }
}
else { htmlHeader();
?>

<!--- 送信確認画面のレイアウトの編集 --- 開始 ------------->

<h4>以下の内容で間違いがなければ、「送信する」ボタンを押してください。</h4>
<FORM action="<? echo $script; ?>" method="POST">
<? echo $err_message; ?>
<div align="center" style="font-size:13px;">
<TABLE width="90%" bgcolor="#cccccc" cellspacing="1" cellpadding="3">
<?php
foreach($_POST as $key=>$var) {
  $key = strtr($key, $string_from, $string_to);
  if(get_magic_quotes_gpc()) $var = stripslashes($var);
  $var = htmlspecialchars($var);
  print("<TR bgcolor=#ffffff><TD bgcolor=#eeeeee>".$key."</TD><TD>".$var);
?>
<INPUT type="hidden" name="<?= $key ?>" value="<?= $var ?>">
<?php
  print("</TD></TR>\n");
}
?>
</TABLE>
</div>
<BR>
<div align="center"><INPUT type="hidden" name="eweb_set" value="eweb_submit">
<INPUT type="submit" value="送信する">
<INPUT type="button" value="前画面に戻る" onClick="history.back()"></div>
</FORM>

<!--- 終了 --->


<?php htmlFooter(); } if(($jpage == 0 && $sendm == 1) || ($jpage == 0 && ($chmail == 0 && $sendm == 0))) { htmlHeader(); ?>

	<h4>お問い合わせを送信いたしました。</h4>
  <p style="font-size:13px; line-height:140%; margin:8px 15px;">お問い合わせありがとうございます。</p>
  <p style="font-size:13px; line-height:140%; margin:8px 15px;">担当者が確認次第、折り返しご連絡させていただきますので今しばらくお待ちください。</p>
  <p style="font-size:13px; line-height:140%; margin:8px 15px;">万が一2～3日経っても連絡がない場合は、入力・記入間違い等考えられますので、再度ご連絡いただきますようお願いいたします。</p>
  <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>


<!--- 終了 --->


<?php htmlFooter(); } else if(($jpage == 1 && $sendm == 1) || $chmail == 0) { header("Location: ".$next); } function htmlHeader() { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/basetemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="auther" content="Merry'X Co,Ltd" />
<meta name="description" content="ビル清掃 オフィス清掃 マンション清掃のメリエックス株式会社です。オフィスビル、ショッピングセンター、ホテル、病院･医療施設、学校、老人施設などのビル清掃、保守点検、設備管理、ビルメンテナンスをおこなっています。" />
<meta name="keywords" content="清掃,掃除,ビル清掃,オフィス清掃,マンション清掃,建設CAD,メリエックス株式会社" />
<title>ビル清掃 オフィス清掃 メリエックス株式会社</title>
<!-- InstanceBeginEditable name="doctitle" --><!-- InstanceEndEditable -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script type="text/javascript" src="js/yuga.js" charset="utf-8"></script>
<script type="text/javascript" src="js/tab.js"></script>
<link href="css/thickbox.css" rel="stylesheet" type="text/css"/>
<link href="default.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16254623-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head><body>
<div id="Wrapper">
	<div id="Header">
		<h1>ビル清掃 オフィス清掃 マンション清掃 メリエックス株式会社</h1>
		<div><a href="index.html"><img src="img/spacer.gif" width="292" height="67" /></a></div>
	</div>
	<div id="Navi">
	<ul>
		<li><img src="img/nv_ttl.jpg" class="btn" /></li>
		<li><a href="office.html"><img src="img/nv1.jpg" alt="オフィス清掃" class="btn" /></a></li>
		<li><a href="wax.html"><img src="img/nv2.jpg" alt="ワックス清掃" class="btn" /></a></li>
		<li><a href="carpet.html"><img src="img/nv3.jpg" alt="カーペット清掃" class="btn" /></a></li>
		<li><a href="house.html"><img src="img/nv4.jpg" alt="ハウスクリーニング" class="btn" /></a></li>
		<li><a href="aircon.html"><img src="img/nv5.jpg" alt="エアコン清掃" class="btn" /></a></li>
		<li><a href="apaman.html"><img src="img/nv6.jpg" alt="アパート・マンション清掃" class="btn" /></a></li>
	</ul>
	<p class="bar"><img src="img/dbar.jpg" /></p>
	<ol>
		<li><a href="corp.html"><img src="img/snv1.jpg" alt="会社概要" class="btn" /></a></li>
		<li><a href="contact.html"><img src="img/snv2.jpg" alt="お問い合わせ" class="btn" /></a></li>
		<li><a href="privacy.html"><img src="img/snv3.jpg" alt="個人情報保護" class="btn" /></a></li>
	</ol>
	<p class="bar"><img src="img/dbar.jpg" /></p>
	<p class="addr">
	<img src="img/cname.jpg" alt="メリエックス株式会社" /><br />
	〒124-0022<br />
	東京都葛飾区奥戸2-8-15<br />
	TEL : 03-3693-7502<br />
	FAX : 03-3696-5140</p>
	</div>
	<div id="inBox">
	<!-- InstanceBeginEditable name="contents" -->
	<div class="topImages2"><img src="img/top_contact.jpg" /></div>
	<h2 class="contact">お問い合わせ</h2>
	<h3>清掃業務・建設CADに関するご質問がございましたらお気軽にお問い合わせください。<br />
		お急ぎの方は、お電話にてお願いします。</h3>
<?php } function htmlFooter() { ?>
<!-- InstanceEndEditable -->	</div>
	<div id="Links"><a href="office.html">オフィス清掃</a>|<a href="wax.html">ワックス清掃</a>|<a href="carpet.html">カーペット清掃</a>|<a href="house.html">ハウスクリーニング</a>|<a href="aircon.html">エアコン清掃</a>|<a href="apaman.html">アパート・マンション清掃</a>|<a href="corp.html">会社概要</a>|<a href="contact.html">お問い合わせ</a>|<a href="privacy.html">個人情報保護</a></div>
</div>
<div id="Footer">2013© Merry'X Co,Ltd. copyrights reserved.</div>
</body>
<!-- InstanceEnd --></html>
<?php } ?>