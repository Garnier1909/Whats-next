<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <title>What's Next? | ログイン</title>
</head>

<body>

  <style>
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  </style>

  <header>
    <h1>What's next?</h1>
  </header>



  <main>
    <article>

      <form name="form1" action="login_act.php" method="post">
        <h1>ログイン</h1>
        ID : <input type="text" name="lid" />
        パスワード : <input type="password" name="lpw" />
        <p><input type="submit" class="button" value="ログイン" /></p>

        <p>新規登録は<a href="users.html" style="text-decoration:underline;">こちら</a>から</p>

      </form>
    </article>
  </main>

</body>

</html>