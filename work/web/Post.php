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
  //   public function setPost($post) {
  //     $date = new DateTime('now');
  //     $this->dttm = $date->format('Y年m月d日 H時i分s秒');
  //     $this->post = $post;
  //   }
  public function createNewPost($post)
  {
    $this->dttm = new DateTime('now');
    $this->post = $post;
  }

  public function setPost($post)
  {
    $this->post = $post;
  }

  public function setDatetime($dttm)
  {
    $this->dttm = $dttm;
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