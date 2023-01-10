<?php
$id = $_GET["id"];

//1.  DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DB Error:' . $e->getMessage());
}

//２．テーブル名"gs_an_table"のSQLを作成
$sql = "SELECT * FROM gs_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$status = $stmt->execute();

//３．データ表示
$view = ""; //表示用文字列を格納する変数
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL Error:" . $error[2]);
} else {
    $res = $stmt->fetch(); //１行だけ取得する
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>What's Next? | タスク編集</title>
</head>

<body>

    <?php include("header.php"); ?>

    <main>
        <article>
            <form method="post" action="update.php">
                <h1>タスクを編集</h1>
                <table>
                    <tr>
                        <th>タスク：</th>
                        <td><input type="text" name="task" size="20" value="<?= $res["task"] ?>"></td>
                    </tr>

                    <tr>
                        <th>担当者：</th>
                        <td><input type="text" name="incharge" size="20" value="<?= $res["incharge"] ?>"></td>
                    </tr>

                    <tr>
                        <th>期限：</th>
                        <td><input type="text" name="deadline" size="20" value="<?= $res["deadline"] ?>"></td>
                    </tr>

                    <tr>
                        <th>メモ：</th>
                        <td><textarea rows="3" name="note" cols="30"><?= $res["note"] ?></textarea></td>
                    </tr>

                    <tr>
                        <th>重要度：</th>
                        <td>
                            <?php
                            if ($res["prim"] == 0) {
                            ?>

                                低<input type="radio" name="prim" value="0" checked>&emsp;
                                中<input type="radio" name="prim" value="1">&emsp;
                                高<input type="radio" name="prim" value="2">


                            <?php
                            } else if ($res["prim"] == 1) {
                            ?>
                                低<input type="radio" name="prim" value="0">&emsp;
                                中<input type="radio" name="prim" value="1" checked>&emsp;
                                高<input type="radio" name="prim" value="2">

                            <?php
                            } else {
                            ?>

                                低<input type="radio" name="prim" value="0">&emsp;
                                中<input type="radio" name="prim" value="1">&emsp;
                                高<input type="radio" name="prim" value="2" checked>

                            <?php
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>進捗：</th>
                        <td>
                            <?php
                            if ($res["progress"] == 0) {
                            ?>

                                未着手<input type="radio" name="progress" value="0" checked>&emsp;
                                途中<input type="radio" name="progress" value="1">&emsp;
                                完了<input type="radio" name="progress" value="2">

                            <?php
                            } else if ($res["progress"] == 1) {
                            ?>
                                未着手<input type="radio" name="progress" value="0">&emsp;
                                途中<input type="radio" name="progress" value="1" checked>&emsp;
                                完了<input type="radio" name="progress" value="2">

                            <?php
                            } else {
                            ?>

                                未着手<input type="radio" name="progress" value="0">&emsp;
                                途中<input type="radio" name="progress" value="1">&emsp;
                                完了<input type="radio" name="progress" value="2" checked>

                            <?php
                            }
                            ?>
                        </td>
                    </tr>

                </table>

                <input type="hidden" name="id" value="<?= $id ?>">
                <p><input type="submit" class="button" value="送信"></p>

            </form>
        </article>
    </main>
</body>

</html>