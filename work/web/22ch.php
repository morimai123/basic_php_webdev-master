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

    // jsonファイルからPostクラスの配列を取得する
    $posts = readPostsFromJson();

    // 画面から入力した値を変数に入れる
    $newpost = $_GET["newpost"];

    // 現在日時を取得
    $newdate = new DateTime('now');
    $newdate = $newdate->format('Y-m-d H:i');

    // 入力された投稿と現在日時でPostクラスを作る
    $p = new Post($newdate, $newpost);
    array_push($posts, $p);
    // print_r($posts);
    // 新配列の要素を取り出す
    foreach ($posts as $i) {
        // オブジェクトを配列化
        $post = (array)$i;
        // print_r($post);
        $post2 = (array)$post;
        print_r($post2);

    }

    // keyを元に戻す方法が分からず(Postdttm、Postpost) 、、配列の中に配列を入れる方法も分からない、、    


    // 画面から入力した値をdata.jsonを配列で書き込み
    // $newposts = json_encode($posts, JSON_UNESCAPED_UNICODE);
    // file_put_contents("data.json", $newposts);


    // それぞれの投稿を取り出す
    foreach ($posts as $post) {
        // $post = new Post($post['date'], $post['post']);
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

    // data.jsonを読み込んで配列化
    function readPostsFromJson()
    {
        //data.jsonを開く
        $data_file_name = "data.json";
        $data = file_get_contents($data_file_name);
        // data.jsonを配列で読み込み
        $json = json_decode($data, true);
        print_r($json);
        echo "<br/>";
        echo "<br/>";
        $arr = array();
        foreach ($json as $j) {
            $post = new Post($j['date'], $j['post']);
            // print_r($post);
            // echo "<br/>";
            // echo "<br/>";
            array_push($arr, $post);
        }
        //  print_r($arr);
        return $arr;
    }

    ?>
</body>

</html>

</html>