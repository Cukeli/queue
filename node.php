<?php
class Queue {
  private $head;
  private $tail;
  private $size;

  public function __construct() {
    $this->head = null;
    $this->tail = null;
    $this->size = 0;
  }

  public function enqueue($item) {
    $newNode = new Node($item);
    if ($this->tail === null) {
      $this->head = $newNode;
      $this->tail = $newNode;
    } else {
      $this->tail->next = $newNode;
      $this->tail = $newNode;
    }
    $this->size++;
  }

  public function dequeue() {
    if ($this->head === null) {
      return null;
    }
    $item = $this->head->data;
    $this->head = $this->head->next;
    if ($this->head === null) {
      $this->tail = null;
    }
    $this->size--;
    return $item;
  }

  public function isEmpty() {
    return $this->head === null;
  }
  
  public function size() {
    return $this->size;
  }
  public function peekback() {
    return $this->tail->data;
  }
  
  public function peekfront() {
    return $this->head->data;
  }
  
  public function getQueue() {
    $queue = array();
    $current = $this->head;
    while ($current !== null) {
      $queue[] = $current->data;
      $current = $current->next;
    }
    return $queue;
  }
}

class Node {
  public $data;
  public $next;

  public function __construct($data) {
    $this->data = $data;
    $this->next = null;
  }
}
?>

