<?php

class Post
{
  private $post;
  private $dttm;

  public function __construct($dttm, $post)
  {
    $this->setDatetime($dttm);
    $this->setPost($post);
  }

  public function createNewPost($dttm, $post)
  {
    if (isset($_GET['message'])) {
      $this->dttm = new DateTime('now');
      // print_r($newDate);
      // $jsonの配列に、新しいデータを追加
      $post = $_GET['message'];
      $this->post = $post;
  }
  }

  public function setDatetime($dttm)
  {
   
      $this->dttm = $dttm;
    
  }

  public function setPost($post)
  {
    $this->post = $post;
  }


  public function getDatetime()
  {
    return $this->dttm;
  }

  public function getPost()
  {
    return $this->post;
  }
}

?>
</body>

</html>