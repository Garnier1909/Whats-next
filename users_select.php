<?php
try {

    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DB Error' . $e->getMessage());
}

//２．テーブル名"gs_user_table"のSQLを作成
//課題：ソート降順/5レコードのみ取得
$sql = "SELECT * FROM gs_user_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view = ""; //表示用文字列を格納する変数
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("*SQL Error:" . $error[2]);
} else {
    //Selectデータで取得したレコードの数だけ自動でループする
    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';

        //削除へのリンク作成
        $view .= '<td>';
        $view .= '<a href="users_delete.php?id=' . $res["id"] . '">';
        $view .= '[ユーザー削除]';
        $view .= '</a>';
        $view .= '</td>';

        $view .= '<td>' . $res["name"] . '</td>';
        $view .= '<td>' . $res["lid"] . '</td>';
        $view .= '<td>' . $res["mail"] . '</td>';
        $view .= '<td>' . $res["lpw"] . '</td>';

        // 性別
        if ($res["gender"] == 0) {
            $view .= '<td>男</td>';
        } else {
            $view .= '<td>女</td>';
        }

        $view .= '<td>' . $res["depart"] . '</td>';

        // 利用規模
        if ($res["sort"] == 0) {
            $view .= '<td>個人</td>';
        } else {
            $view .= '<td>法人</td>';
        }

        $view .= '<td style="text-align:right;">';
        $view .= '<a href="users_detail.php?id=' . $res["id"] . '">';
        $view .= '[編集]';
        $view .= '</a>';
        $view .= '</td>';

        $view .= '</tr>'
            . PHP_EOL;  //PHP_EOLは改行コード
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>What's Next? | メンバー管理</title>
</head>

<body>

    <?php include("header.php"); ?>

    <main>
        <article>
            <h1>メンバー管理</h1>
            <table id="table_us">
                <tr>
                    <th>ユーザー削除</th>
                    <th>名前</th>
                    <th>ログインID</th>
                    <th>メールアドレス</th>
                    <th>パスワード</th>
                    <th>性別</th>
                    <th>役職</th>
                    <th>利用規模</th>
                    <th>編集</th>
                </tr>

                <?php
                echo $view;
                ?>

            </table>

            <button onclick="location.href='select.php'"> ホームに戻る</button>

        </article>
    </main>
</body>

</html>