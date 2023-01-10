<?php
session_start();
include("funcs.php");

chkSsid();

try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DB Error:' . $e->getMessage());
}

//２．テーブル名"gs_an_table"のSQLを作成
$sql = "SELECT * FROM gs_an_table ORDER BY prim DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view = ""; //表示用文字列を格納する変数
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    //Selectデータで取得したレコードの数だけ自動でループする
    $view .= '<table id="table_home">';
    $view .= '<tr>';
    $view .= '<th>';
    $view .= '確認済み';
    $view .= '</th>';

    $view .= '<th>';
    $view .= 'タスク';
    $view .= '</th>';

    $view .= '<th>';
    $view .= '担当者';
    $view .= '</th>';

    $view .= '<th>';
    $view .= '期限';
    $view .= '</th>';

    $view .= '<th>';
    $view .= 'メモ';
    $view .= '</th>';

    $view .= '<th>';
    $view .= '重要度';
    $view .= '</th>';

    $view .= '<th>';
    $view .= '進捗';
    $view .= '</th>';

    $view .= '<th>';
    $view .= '編集';
    $view .= '</th>';

    $view .= '</tr>';


    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';

        // 完了ボタン
        $view .= '<td>';
        $view .= '<a href="delete.php?id=' . $res["id"] . '">';
        $view .= '[完了]';
        $view .= '</a>';
        $view .= '</td>';

        // タスク
        $view .= '<td>';
        $view .= $res["task"];
        $view .= '</td>';

        // 担当者
        $view .= '<td>';
        $view .= $res["incharge"];
        $view .= '</td>';

        // 期限
        $view .= '<td>';
        $view .= $res["deadline"];
        $view .= '</td>';

        // メモ
        $view .= '<td>';
        $view .= $res["note"];
        $view .= '</td>';

        // 重要度
        $view .= '<td>';
        if ($res["prim"] == 0) {

            $view .= '-';

        } else if($res["prim"] == 1){

            $view .= '!!';

        }else{
            $view .= '!!!';
        }
        $view .= '</td>';



        // 進捗
        $view .= '<td>';
        if ($res["progress"] == 0) {

            $view .= '△';

        } else if($res["progress"] == 1){

            $view .= '○';

        }else{
            $view .= '◎';
        }
        $view .= '</td>';

        // 編集ボタン
        $view .= '<td>';
        $view .= '<a href="detail.php?id=' . $res["id"] . '">[編集]</a>';
        $view .= '</td>';


        $view .= '</tr>'; //".="は文字と変数をくっつける時に使う
    }
    $view .= '</table>';
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>What's Next? | ホーム</title>
</head>

<body>

    <?php include("header.php"); ?>

    <main>
        <div id="bg100">
            <article style="padding-bottom:30px;">

                <h1>HOME</h1>

                <h3>タスク一覧（重要度順）</h3>

                <?php
                //表示用変数
                echo $view;
                ?>

                <button onclick="location.href='add_task.html'">＋タスクを追加</button>

            </article>
        </div>
    </main>
</body>

</html>