<?php
//1.  DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}


$task       = $_POST["task"];
$incharge   = $_POST["incharge"];
$deadline   = $_POST["deadline"];
$note       = $_POST["note"];
$prim       = $_POST["prim"];
$progress   = $_POST["progress"];



//３．SQL文作成
$sql = "INSERT INTO gs_an_table(task, incharge, deadline, note, prim, progress, indate)VALUES(:task, :incharge, :deadline, :note, :prim, :progress, sysdate())";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":task", $task);
$stmt->bindValue(":incharge", $incharge);
$stmt->bindValue(":deadline", $deadline);
$stmt->bindValue(":note", $note);
$stmt->bindValue(":prim", $prim);
$stmt->bindValue(":progress", $progress);

//5. SQL実行
$status = $stmt->execute();

//6. 画面遷移(select.php)
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    //header("Location: 行き先ファイル名");
    header("Location: select.php");
    exit();
}

?>