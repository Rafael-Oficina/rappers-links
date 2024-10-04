<!doctype html>
<html lang="en">
<head>
  <?php
  include "conn.php";
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>RAPPERS LINKS</title>
  <style>
    /* CSS Styling */
    body {
      background-color: #222831;
      font-family: Tahoma, Verdana, sans-serif;
      color: #EEEEEE;
    }

    select, input[type="submit"] {
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Choose a RAPPER</h1>
      <br>
      <form action="" method="post">
        <select name="rapper" class="form-select" aria-label="Default select example">
          <option selected disabled selected>Select a rapper</option>
          <option value="Playboi Carti">Playboi Carti</option>
          <option value="Travis Scott">Travis Scott</option>
        </select>
        <input type="submit" class="btn btn-outline-light" name="submit_rapper" value="VIEW ARTIST">
      </form>
      <br><br>
    </div>
<?php
if (isset($_POST['submit_rapper'])) {
  if (!empty($_POST['rapper'])) {
    $selected = $_POST['rapper'];
    $sql = "SELECT * FROM albums WHERE artista = '$selected'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="col">';
      echo '<h1>Select an Album</h1>';
      echo '<form action="" method="post">';
      echo '<div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">';
      while ($row = $result->fetch_assoc()) {
        $album = $row["album"];
        echo '<input type="radio" class="btn-check" name="album" id="' . $album . '" value="' . $album . '" autocomplete="off">';
        echo '<label class="btn btn-outline-light " for="' . $album . '">' . $album . '</label>';
      }
      echo '</div>';
      echo '<input type="hidden" name="rapper" value="' . $selected . '">';
      echo '<div class="mt-3">';
      echo '<input type="submit" class="btn btn-outline-light" name="submit_album" value="View Album">';
      echo '</div>';
      echo '</form>';
      echo '</div>';
    } else {
      echo '<p>No results found.</p>';
    }
  } else {
    echo '<p>Please select a rapper.</p>';
  }
}


if (isset($_POST['submit_album'])) {
  if (!empty($_POST['album'])) {
    $selected_album = $_POST['album'];
    $selected_rapper = $_POST['rapper'];

    $sql2 = "SELECT id_album FROM albums WHERE album = '$selected_album'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $id_album = $row['id_album'];

      echo "<h2>You selected the album: $selected_album</h2>";
      echo "<h2>ID Album: $id_album</h2>";
      header("Location: result.php?rapper=" . urlencode($selected_rapper) . "&album=" . urlencode($selected_album) . "&id_album=" . urlencode($id_album));
      exit;
    } else {
      echo "<h2>Album not found.</h2>";
    }
  } else {
    echo "<h2>Please select an album.</h2>";
  }
}

?>
</div>
</body>
</html>
