<?php
$id = $_GET["id"];

//1.  DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DB Error:' . $e->getMessage());
}

//２．テーブル名"gs_user_table"のSQLを作成
$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$status = $stmt->execute();

//３．データ表示
$view = ""; //表示用文字列を格納する変数
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("*SQL Error:" . $error[2]);
} else {
    $res = $stmt->fetch(); //１行だけ取得する
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>What's Next? | ユーザー情報編集</title>
</head>

<body>

    <?php include("header.php"); ?>

    <!-- Main[Start] -->
    <main>
        <article>
            <form method="post" action="users_update.php">
                <div class="jumbotron">
                    <h1>ユーザー情報編集</h1>
                    <fieldset>
                        <table>
                            <tr>
                                <th>名前 : </th>
                                <td><input type="text" name="name" value="<?= $res["name"] ?>"></td>
                            </tr>

                            <tr>
                                <th>ログインID : </th>
                                <td><input type="text" name="lid" value="<?= $res["lid"] ?>"></td>
                            </tr>

                            <tr>
                                <th>メールアドレス : </th>
                                <td><input type="text" name="mail" value="<?= $res["mail"] ?>"></td>
                            </tr>

                            <tr>
                                <th>パスワード : </th>
                                <td><input type="text" name="lpw" value="<?= $res["lpw"] ?>"></td>
                            </tr>

                            <tr>
                                <th>性別 : </th>
                                <td>
                                    <?php
                                    if ($res["gender"] == 1) {
                                    ?>
                                        男性<input type="radio" name="gender" value="0">
                                        女性<input type="radio" name="gender" value="1" checked>
                                    <?php
                                    } else {
                                    ?>
                                        男性<input type="radio" name="gender" value="0" checked>
                                        女性<input type="radio" name="gender" value="1">
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <th>役職 : </th>
                                <td><input type="text" name="depart" value="<?= $res["depart"] ?>"></td>
                            </tr>

                            <tr>
                                <th>利用規模 : </th>
                                <td>
                                    <?php
                                    if ($res["sort"] == 1) {
                                    ?>
                                        個人<input type="radio" name="sort" value="0">
                                        法人<input type="radio" name="sort" value="1" checked>
                                    <?php
                                    } else {
                                    ?>
                                        個人<input type="radio" name="sort" value="0" checked>
                                        法人<input type="radio" name="sort" value="1">
                                    <?php
                                    }
                                    ?></td>
                            </tr>

                        </table>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <p><input type="submit" class="button" value="送信"></p>
                    </fieldset>
                </div>
            </form>
        </article>
    </main>
    <!-- Main[End] -->


</body>

</html>