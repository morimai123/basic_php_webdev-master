<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>

<body>
    <?php
    require_once('Post.php');

    function readPostsFromJson()
    {
        //jsonファイルを開く
        $data_file_name = "data.json";
        $data = file_get_contents($data_file_name);
        // data.jsonを配列で読み込み
        $json = json_decode($data, true);
        return $json;
    }

    $posts = readPostsFromJson();
    // 画面から入力した値を変数に入れる
    $newpost = $_GET["newpost"];

    if (isset($_GET["newpost"])) {
        // 現在日時を取得
        $newdate = new DateTime('now');
        $newdate = $newdate->format('Y-m-d H:i');
        // 入力された値と現在日時を配列に入れる
        $array["date"] = $newdate;
        $array["post"] = $newpost;
        array_push($posts, $array);
        // 画面から入力した値をdata.jsonを配列で書き込み
        $newposts = json_encode($posts, JSON_UNESCAPED_UNICODE);
        file_put_contents("data.json", $newposts);
    }

    foreach ($posts as $post) {
        $post = new Post($post['date'], $post['post']);
        // $post->createNewPost($newpost);
        //Postクラスのget関数を使って表示
        echo "<div class ='card'>";
        echo "<div class ='dttm'>" .  $post->getDatetime() . "</br></div>";
        echo "<div class ='post'>" .  $post->getPost() . "</br></div>";
        echo "</div>";
    }
    // for ($i = 0; $i <= count($posts) - 1; $i++) {
    //   echo "<div class ='card'>";
    //   echo "<div class ='dttm'>" . $posts[$i]->dttm . "</br></div>";
    //   echo "<div class ='post'>" . $posts[$i]->post . "</br></div>";
    //   echo "</div>";
    // }
    ?>
</body>

</html>