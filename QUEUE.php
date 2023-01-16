<?php
class Queue {
  private $queue;

  public function __construct() {
    $this->queue = array();
  }

  public function enqueue($item) {
    array_push($this->queue, $item);
  }

  public function dequeue() {
    return array_shift($this->queue);
  }

  public function isEmpty() {
    return empty($this->queue);
  }
  
  public function size() {
  return count($this->queue);
  }
  
  public function getQueue() {
  return $this->queue;
  }

}

?>