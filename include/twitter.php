<?php

class Twitter
{

 public $tweets_title = array();
 public $tweets_desc = array();
 public $tweets_published = array();
 public $tweets_link = array();

        public function __construct($username) {

  //Load tweets from user timeline.
  $result = simplexml_load_file("http://twitter.com/statuses/user_timeline/".$username.".rss");

  //Iteration of XML object
  foreach(get_object_vars($result) as $property => $value) {

   //Iteration of each Item
   if(isset($value->item)) {
    for ($iterator = 0; $iterator < count($value->item); $iterator++) {
     $this->tweets_title[$iterator] = $value->item[$iterator]->title;
     $this->tweets_desc[$iterator] = $value->item[$iterator]->description;
     $this->tweets_published[$iterator] = $value->item[$iterator]->pubDate;
     $this->tweets_link[$iterator] = $value->item[$iterator]->link;
    }
   }
  }
 }

        public function getTweetTitle($number) {
  return $this->tweets_title[$number][0];
 }

 public function getTweetDescription($number) {
  return $this->tweets_desc[$number][0];
 }

 public function getTweetPublishedDate($number) {
  return $this->tweets_published[$number][0];
 }

 public function getTweetLink($number) {
  return $this->tweets_link[$number][0];
 }
}

?>
