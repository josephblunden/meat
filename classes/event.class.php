<?php
class Event {
  private $_db;
  private $_mysqli;

  public function createEvent($eventName, $eventDate, $eventDesc, $authorName, $eventImg) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("INSERT INTO events(title, event_date, description, author, event_img) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $eventName, $eventDate, $eventDesc, $authorName, $eventImg);

   $stmt->execute();

   $stmt->close();
   $mysqli->close();
   header('Location: ./dashboard.php');
  }
  public function getAllEvents() {
    // Connecting to Database
    $db = $GLOBALS['gdb'];
    $mysqli = $db->getConnection();

   	// prepare and bind
   	$stmt = $mysqli->prepare("SELECT id, title, event_date, description, author, event_img FROM events");
     $stmt->execute();
     $stmt->bind_result($eventid, $tilte, $eventDate, $description, $author, $eventImg);
     while ($stmt->fetch()) {

       echo '<tr>';
         echo '<th scope="row">' .$eventid. '<td>' .$tilte. '</td> <td>' . $eventDate.'</td><td>' .$description.'</td><td>' .$author.'</td><td><a class="edit-button-a" href="editevent.php?edit=true&eventid='.$eventid.'"><button class="edit-button">Edit</button></i></a><a class="delete-button-a" href="events.php?delete=true&eventid='.$eventid.'"><button class="delete-button">Delete</button></a><a class="one-button-a" href="oneevent.php?one=true&eventid='.$eventid.'"><button class="one-button">Show</button></i></a>';
       echo '</tr>';
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
  //  $mysqli->close();
   return $eventArr;
 }


 public function updateEvents($eventid, $tilte, $eventDate, $description, $author, $eventImg) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

  // prepare and bind
  $stmt = $mysqli->prepare("UPDATE events SET title=?, event_date=?, description=?, author=?, event_img=? WHERE id=?");
  $stmt->bind_param("sssssi", $tilte, $eventDate, $description, $author, $eventImg, $eventid);
  $stmt->execute();

  // $stmt->close();
  // $mysqli->close();
  //header('Location: ./users.php?updated=true');
 }

 public function deleteEvent($eventid) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

  // prepare and bind
  $stmt = $mysqli->prepare("DELETE FROM events WHERE id=? LIMIT 1");
  $stmt->bind_param("i", $eventid);
  $stmt->execute();

  $stmt->close();
  //$mysqli->close();
  //header('Location: ./users.php?updated=true');
 }

 }

?>
