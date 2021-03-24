<?php

//1.  DB接続
// rootの後の''は入力不要 mampはrootいれるらしい
try {
$pdo = new PDO('mysql:dbname=apex;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ登録SQL select表示

$stmt = $pdo->prepare("SELECT * FROM apex_table");
$status = $stmt->execute();


//データ表示
$view="";
if($status==false){
  
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //自動ループ　&nbsp;=半角スペース
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $view .= "<p>";
    // $view .= $result["id"].".";
    // $view .= "&nbsp;";
    $view .= "名前【ID】:".$result["name"];
    $view .= "&nbsp;"."&nbsp;";
    $view .= "環境:".$result["os"];
    $view .= "&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;";
    $view .= "投稿日時:". $result["indate"];
    $view .= "<br>";
    $view .= "RANK:";
    $view .= $result["rank"];
    $view .= "<br>";
    $view .= $result["naiyou"];
    
    $view .= "</p>";
  }

}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEXフレンド募集</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
<link href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css" rel="stylesheet">
  <link href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/4-1-2/css/4-1-2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=2">
    
</head>


<body>
<div id="splash">
    <div id="splash_text"></div>
  </div>

  <!-- <main>
        <div id="container">
    <p>ローディング後、この画面が見えます。<br>ローディングで使用したライブラリ：<a href="https://kimmobrunfeldt.github.io/progressbar.js/" target="_blank">https://kimmobrunfeldt.github.io/progressbar.js/</a></p>
        /container</div>
  </main> -->
<!--==============JQuery読み込み===============-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<!--IE11用※対応しなければ削除してください-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>

<!--自作のJS-->
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/4-1-2/js/4-1-2.js"></script>
<script src="moov.js"></script>
<header>apexフレンド募集</header>

<form method="post" action="insert.php">
  <div class="apexbox">
   <fieldset>
    <legend>入力してください！</legend>
     <label>ID：<input type="text" name="name"　></label>
     <label>環境:<input type="radio" name="os" value="PC">PC</label>
     <label>　<input type="radio" name="os"    value="PS4">PS4</label>
     <label>　<input type="radio" name="os"    value="Xbox">Xbox</label>
     <label>　<input type="radio" name="os"    value="Switch">Switch<br></label>

     <label>rank:<input type="radio" name="rank" value="ブロンズ">ブロンズ</label>
     <label>  <input type="radio" name="rank" value="シルバー">シルバー</label>
     <label>　<input type="radio" name="rank" value="ゴールド">ゴールド</label>
     <label>　<input type="radio" name="rank" value="プラチナ">プラチナ</label>
     <label>　<input type="radio" name="rank" value="ダイヤモンド">ダイヤモンド</label>
     <label>　<input type="radio" name="rank" value="マスター">マスター</label>
     <label>　<input type="radio" name="rank" value="プレデター">プレデター</label>
    
     </fieldset>
     <fieldset>
     <legend>詳細</legend>
    
    
     <label><textArea name="naiyou" rows="10" cols="80" placeholder="ここに入力※誹謗中傷等や荒らし行為は無しでお願いします"　class="button"></textArea></label><br>
     <input type="submit" value="投稿">
    </fieldset>
  </div>


</form>


<!-- //保存したものの表示 -->
<div class="box">
    <div class="box2"><?=$view?></div>
</div>
    
</body>
</html>
