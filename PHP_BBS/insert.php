<?php

//入力チェック
if(
    !isset($_POST["name"]) || $_POST["name"]==""  ||
    !isset($_POST["os"]) || $_POST["os"]==""  ||
   
    !isset($_POST["rank"]) || $_POST["rank"]==""  ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]==""  
   
){
    exit('入力エラー:全て入力を完了させてください');
}


//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$name = $_POST["name"];
$os = $_POST["os"];
$_POST['os'] == "PC"  ?  "checked" : "" ;
$_POST['os'] == "PS4"  ?  "checked" : "" ;
$_POST['os'] == "Xbox" ? "checked" : "" ;
$_POST['os'] == "Switch" ? "checked" : "" ; 
$rank = $_POST["rank"];
$_POST['rank'] == "ブロンズ"  ?  "checked" : "" ;
$_POST['rank'] == "シルバー"  ?  "checked" : "" ;
$_POST['rank'] == "ゴールド" ? "checked" : "" ;
$_POST['rank'] == "プラチナ" ? "checked" : "" ; 
$_POST['rank'] == "ダイヤモンド" ? "checked" : "" ; 
$_POST['rank'] == "マスター" ? "checked" : "" ; 
$_POST['rank'] == "プレデター" ? "checked" : "" ; 

$naiyou = $_POST["naiyou"];

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
// mamppの方は
// $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost', 'root', 'root');

try {
    $pdo = new PDO('mysql:dbname=apex;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO apex_table(id, name, os, rank, naiyou,
indate )VALUES(NULL, :a1, :a2, :a3, :a4, sysdate())");



$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $os, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $rank, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();






//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: index.php");
    exit;
}


?>