<?php
class Event {
  private $_db;
  private $_mysqli;
  //creating events
  public function createEvent($eventName, $eventDate, $eventDesc, $authorName, $eventImg) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("INSERT INTO events(title, event_date, description, author, event_img) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $eventName, $eventDate, $eventDesc, $authorName, $eventImg);

   $stmt->execute();

   $stmt->close();
  //  $//mysqli->close();
   header('Location: ./dashboard.php');
  }
  //getting all events && serch query
  public function getAllEvents() {
    // Connecting to Database
    $db = $GLOBALS['gdb'];
    $mysqli = $db->getConnection();

    $sql_select = "SELECT id, title, event_date, description, author, event_img FROM events";

    // prepate with a search query
    if(isset($_GET['query'])) {
      $query = $_GET['query'];
      // changes characters used in html to their equivalents, for example: < to &gt;
      $query = htmlspecialchars($query);
      // makes sure nobody uses SQL injection
    //  $query = $mysqli -> mysql_real_escape_string($query);
      $sql_select = "SELECT id, title, event_date, description, author FROM events WHERE title LIKE '%".$query."%'";
    }
   	// prepare and bind
    $stmt = $mysqli->prepare($sql_select);
     $stmt->execute();
     $stmt->bind_result($eventid, $tilte, $eventDate, $description, $author, $eventImg);
     while ($stmt->fetch()) {

        echo'<a href="oneevent.php?one=true&eventid='.$eventid.'">
              <div class="vidburdir-card">
                <div class="event-content">
                  <div class="event-title">
                    '.$tilte.'
                  </div><br/>
                  <div class="event-date">
                    '.$eventDate.'
                  </div>
                  <div class="event-description">
                    '.$description.'
                  </div>
                </div>
              </div>
            </a>
       ';
     }

  }
 // Get all user info from user table by user_id
 public function getEventsById($eventid) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

    // prepare and bind
    $stmt = $mysqli->prepare("SELECT title, event_date, description, author, event_img FROM events	WHERE id =?");
    $stmt->bind_param('i', $eventid);
    $stmt->execute();
    $stmt->bind_result($tilte, $eventDate, $description, $author, $eventImg);

    // Only returning info from 1 user so I will create an array that I can easily work with on my page
    $eventArr;
    while ($stmt->fetch()) {
      $eventArr['title'] = $tilte;
      $eventArr['eventDate'] = $eventDate;
      $eventArr['description'] = $description;
      $eventArr['author'] = $author;
      $eventArr['eventid'] = $eventid;
      $eventArr['eventImg'] = $eventImg;
    }

   // Close connection
   $stmt->close();
  //  $//mysqli->close();
   return $eventArr;
 }

 // updating events
 public function updateEvents($eventid, $tilte, $eventDate, $description, $author, $eventImg) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

  // prepare and bind
  $stmt = $mysqli->prepare("UPDATE events SET title=?, event_date=?, description=?, author=?, event_img=? WHERE id=?");
  $stmt->bind_param("sssssi", $tilte, $eventDate, $description, $author, $eventImg, $eventid);
  $stmt->execute();

  // $stmt->close();
  // $//mysqli->close();
  //header('Location: ./users.php?updated=true');
 }
//deleting events by id
 public function deleteEvent($eventid) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

  // prepare and bind
  $stmt = $mysqli->prepare("DELETE FROM events WHERE id=? LIMIT 1");
  $stmt->bind_param("i", $eventid);
  $stmt->execute();

  $stmt->close();
  //$//mysqli->close();
  //header('Location: ./users.php?updated=true');
 }

}

?>
