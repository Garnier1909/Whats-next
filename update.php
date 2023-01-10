<?php
$id = $POST["id"];

//1.  DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//２．POST値取得（POST数に合わせて増やす）
$task       = $_POST["task"];
$incharge   = $_POST["incharge"];
$deadline   = $_POST["deadline"];
$note       = $_POST["note"];
$prim    = $_POST["prim"];
$progress   = $_POST["progress"];
$id         = $_POST["id"];


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "UPDATE gs_an_table SET task=:task, incharge=:incharge, deadline=:deadline, note=:note, prim=:prim, progress=:progress WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":task", $task);
$stmt->bindValue(":incharge", $incharge);
$stmt->bindValue(":deadline", $deadline);
$stmt->bindValue(":note", $note);
$stmt->bindValue(":prim", $prim);
$stmt->bindValue(":progress", $progress);
$stmt->bindValue(":id", $id);

//5. SQL実行
$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //header("Location: 行き先ファイル名");
    header("Location: select.php");
    exit();
}

?>