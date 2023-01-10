<?php
$id = $POST["id"];

//1.  DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DB Error' . $e->getMessage());
}

//２．POST値取得（POST数に合わせて増やす）
$name       = $_POST["name"];
$lid        = $_POST["lid"];
$mail       = $_POST["mail"];
$lpw        = $_POST["lpw"];
$gender     = $_POST["gender"];
$depart     = $_POST["depart"];
$sort       = $_POST["sort"];
$id         = $_POST["id"];

//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "UPDATE gs_user_table SET name=:name, lid=:lid, mail=:mail, lpw=:lpw, gender=:gender, depart=:depart, sort=:sort WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":name",      $name);
$stmt->bindValue(":lid",       $lid);
$stmt->bindValue(":mail",      $mail);
$stmt->bindValue(":lpw",       $lpw);
$stmt->bindValue(":gender", $gender);
$stmt->bindValue(":depart",  $depart);
$stmt->bindValue(":sort",      $sort);
$stmt->bindValue(":id",        $id);

$status = $stmt->execute();

//6. 画面遷移(select.php)
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL Error:" . $error[2]);
} else {
    header("Location: users_select.php");
    exit();
}

?>