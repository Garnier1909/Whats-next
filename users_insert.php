<?php
// 1.DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DB Error'.$e->getMessage());
}


$name     = $_POST["name"];
$lid      = $_POST["lid"];
$mail     = $_POST["mail"];
$lpw      = $_POST["lpw"];
$gender   = $_POST["gender"];
$depart   = $_POST["depart"];
$sort     = $_POST["sort"];


//３．SQL文作成
$sql = "INSERT INTO gs_user_table(name, lid, mail, lpw, gender, depart, sort)VALUES(:name, :lid, :mail, :lpw, :gender, :depart, :sort)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":name",      $name);
$stmt->bindValue(":lid",       $lid);
$stmt->bindValue(":mail",      $mail);
$stmt->bindValue(":lpw",       $lpw);
$stmt->bindValue(":gender", $gender);
$stmt->bindValue(":depart",  $depart);
$stmt->bindValue(":sort",      $sort);

$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL Error:".$error[2]);
}else{
    //header("Location: 行き先ファイル名");
    header("Location: index.php");
    exit();
}


?>
