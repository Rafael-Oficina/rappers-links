<!doctype html>
<html lang="en">
<head>
  <?php
  include "conn.php";
  
  $rapper = $_GET['rapper'];
  $album = $_GET['album'];
  $id_album = $_GET['id_album'];
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title><?php echo "$album"; ?> Musics</title>
  <style>
    body {
      background-color: #222831;
      font-family: Tahoma, Verdana, sans-serif;
      color: #EEEEEE;
    }
    h1 {
      color: #EEEEEE;
    }
    select, input[type="submit"] {
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
      <?php
      echo '<a class="btn btn-light" href="http://localhost/2I-REDES-M7-TUTORIAL-RAFAEL-MARTINS-PP02/etapa2/" role="button"><i class="bi bi-house"></i></a><br><br>';
      echo '<img src="img/' . $id_album . '.png" alt="' . $album . ' cover" width="250px">';
      echo "<h1>$album</h1>";
      echo "<h3>By: $rapper</h3>";
      ?>
    </div>
    <div class="col-md-8">
      <?php
      $sql = "SELECT * FROM musicas WHERE id_album = '$id_album'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<form action="" method="post">';
        echo '<div class="btn-group-vertical" role="group" aria-label="Vertical checkbox toggle button group">';
        while ($row = $result->fetch_assoc()) {
          echo '<input type="checkbox" class="btn-check" name="checkArr[]" value="' . $row["musica"] . '" id="' . $row["musica"] . '" autocomplete="off">';
          echo '<label class="btn btn-outline-light" for="' . $row["musica"] . '">' . $row["musica"] . '</label>';
        }
        echo '</div>';
        echo '<input type="hidden" name="rapper" value="' . $id_album . '">';
        echo '<div class="mt-3">';
        echo '<input type="submit" class="btn btn-outline-light" name="submit" value="View Music Links">';
        echo '</div>';
        echo '</form>';
      } else {
        echo '<p>No results found.</p>';
      }

      if (isset($_POST['submit'])) {
        if (!empty($_POST['checkArr'])) {
          echo "<h2>Selected Music Links:</h2>";
          foreach ($_POST['checkArr'] as $musica) {
            $sql2 = "SELECT LINKS FROM musicas WHERE musica = '$musica'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
              while ($row2 = $result2->fetch_assoc()) {
                echo '<p><strong>' . $musica . ':</strong> <button onclick="window.open(\'' . $row2["LINKS"] . '\', \'_blank\')" class="btn btn-outline-light">Listen Music</button></p>';
              }
            }
          }
        } else {
          echo '<br><br><div class="error">Checkbox is not selected!</div>';
        }
      }
      ?>
    </div>
  </div>
</div>
</body>
</html>
