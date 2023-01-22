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
$newpost = $_GET["newpost"];
echo $newpost;
  require_once('Post.php');

  function readPostsFromJson()
  {
    //jsonファイルを開く
    $data_file_name = "data.json";
    $data = file_get_contents($data_file_name);
    $json = json_decode($data, true);
    return $json;
    }
    $posts = readPostsFromJson();

    if(isset($_GET["newpost"])){
      $newdate = new DateTime('now');
      $newdate = $newdate->format('Y-m-d H:i');
      print_r($newdate);
    //   file_put_contents($json_filename, json_encode($array, JSON_UNESCAPED_UNICODE), LOCK_EX
    }else{

    }

    //jsonファイルを$postに入れPostクラスをインスタンス化。引数で中身を渡す。
    
    foreach($posts as $post) {
       $post = new Post($post['date'],$post['post']);

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