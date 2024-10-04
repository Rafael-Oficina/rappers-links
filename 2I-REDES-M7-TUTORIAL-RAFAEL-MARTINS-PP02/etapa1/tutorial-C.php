<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PHP - Get Multiple Checkbox Value DEMO</title>
  <style>
    label {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 20px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    line-height: 25px;
    }

    /* Hide the browser's default checkbox */
    label input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    }

    /* Create a custom checkbox */
    span {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #cccccc;
    }

    label:hover input~span {
    background-color: #cccccc;
    }

    label input:checked~span {
    background-color: #1A33FF;
    }

    span:after {
    content: "";
    position: absolute;
    display: none;
    }

    label input:checked~span:after {
    display: block;
    }

    label span:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <form action="" method="post" class="mb-3">
      <label>
        Apple
        <input type="checkbox" name="checkArr[]" value="Apple">
        <span></span>
      </label>
      <label>
        Banana
        <input type="checkbox" name="checkArr[]" value="Banana">
        <span></span>
      </label>
      <label>
        Coconut
        <input type="checkbox" name="checkArr[]" value="Coconut">
        <span></span>
      </label>
      <label>
        Blueberry
        <input type="checkbox" name="checkArr[]" value="Blueberry">
        <span></span>
      </label>
      <input type="submit" name="submit" value="Choose options" />
    </form>

    <?php
      if(isset($_POST['submit'])){
          if(!empty($_POST['checkArr'])){
            foreach($_POST['checkArr'] as $checked){
              echo $checked . '<br>';
            }
          } else {
            echo '<div class="error">Checkbox is not selected!</div>';
          }
      }
    ?>
  </div>

</body>
</html>