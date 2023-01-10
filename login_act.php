<?php
//最初にSESSIONを開始
session_start();

//POST値
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1.  DB接続します
include("funcs.php");
//1.  DB接続します
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//2. データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw";
$stmt = $pdo->prepare("$sql"); //* PasswordがHash化の場合→条件はlidのみ
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw); //* PasswordがHash化する場合はコメントする
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();  //SESSIONのIDを取得
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: select.php");
}else{
  //Login失敗時(Logout経由)
  header("Location: index.php");
}

exit();


