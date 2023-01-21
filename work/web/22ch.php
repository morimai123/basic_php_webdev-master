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
    $message = $_GET['message'];
    // echo $message;

    require_once('Post.php');
    // $JSON_FILE_NAME = "./posts.json";

    function readPostsFromJson()
    {
        $datafilename = "posts.json";
        $datajson = file_get_contents($datafilename);
        $json = json_decode($datajson, true);
        return $json;
    }
    $json = readPostsFromJson();

    // Print_r($json);
    // echo "<br>";
    if (isset($_GET['message'])) {
        $newDatetime = new DateTime();
        $newDate = $newDatetime->format('Y-m-d H:i:s');
        // print_r($newDate);
        // $jsonの配列に、新しいデータを追加
        $json[] = [
            "date" => $newDate,
            "post" => $message
        ];
        // Print_r($json);   
        // 連想配列をjson形式の文字列データに変換、JSON_UNESCAPED_UNICODE：Unicodeエスケープさせないようにする
        $newJson = json_encode($json, JSON_UNESCAPED_UNICODE);
        // jsonファイルに書き込み
        file_put_contents("posts.json", $newJson);
    }


    foreach ($json as $post) {
        // newを用いてインスタンスを生成する際には引数を与えることができ、その引数の値が__constructメソッド（$dttm, $post)に渡されます。
        $post = new Post($post["date"], $post["post"]);
        echo "<div class ='card'>";
        echo "<div class ='dttm'>" . $post->getDatetime() . "</br></div>";
        echo "<div class ='post'>" . $post->getPost() . "</br></div>";
        echo "</div>";
    }

    echo '<form action="index.html" method="get">';
    echo "<div class ='back'>" .'<p><input type="submit" name="submitBtn" value="コメントを入力する"></p>'. "</div>";
    echo '</form>';
    ?>
</body>

</html>