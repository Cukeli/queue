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
<!DOCTYPE html>
<html>
  <head>
    <title>Rectangle with button</title>
    <style>
      /* Style for the rectangle */
      .rectangle {
        width: 700px;
        height: 400px;
        background-color: #C0C0C0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        line-height: 15px; /* center the text vertically */
      }
      /* Style for the button */
      .rectangle button {
        margin-top: 30px;
        padding: 10px 20px;
        background-color: #000080;
        color: white;
        border: none;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="rectangle">
      
	  


	  <h2>Queue</h2>
	  
	  <form method="post">
		<label for="item">Item:</label>
		<input type="text" id="item" name="item">
		<br>
		
		<input type="submit" value="Enqueue" name="enqueue">
		<input type="submit" value="Dequeue" name="dequeue">
	  </form>
	  <ul>
		<?php
		session_start();
		
		
		if (!isset($_SESSION['queue'])) {
		  $_SESSION['queue'] = new Queue();
		}
		$queue = $_SESSION['queue'];

		if (isset($_POST['enqueue'])) {
		  $item = $_POST['item'];
		  $queue->enqueue($item);
		}

		if (isset($_POST['dequeue'])) {
		  $queue->dequeue();
		}
		
		echo"<p>Now Serving : ".$queue->peekfront()."</p>";
		echo"<p>Last Number : ".$queue->peekback()."</p>";
		if (!$queue->isEmpty()) {
		  $current = $queue->getQueue();
		  foreach ($current as $item) {
			echo "<li>$item</li>";
		  }
		   echo "<p> Number of items in the queue: ".$queue->size()."</p>";
		} else {
		  echo "<li>Queue is empty</li>";
		}
		?>
	  </ul>
	  
	 
		
	</div>
  </body>
</html>
