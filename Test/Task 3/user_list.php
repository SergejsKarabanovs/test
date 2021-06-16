<?php require_once("php/init.php");?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/subscribers.css">
  <title>Subsription</title>
</head>

<body>

  <form action="" method="post">

    <div class="margin">
      <input type="text" name="searchInput" placeholder="Search for">
      <button type="submit" name="searchButton" value="searchButton">Search</button>
    </div>

    <div class="margin">
      <button type="submit" name="showAll" value="showAll">Show All emails</button>
    </div>

    <div class="margin">
      <table>
        <caption><strong>Sort by</strong></caption>
        <tr>
          <td><?php Email::createButtons(); ?></td>
        </tr>
      </table>
    </div>


    <div>
      <table>
        <caption><strong>Subscribers</strong></caption>
        <thead>
          <tr>
            <th>Id</th>
            <th class="sort">Email</th>
            <th class="sort">Date</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>
          <?php $results = Email::show_email_table(); Email::delete_email();?>

          <?php foreach ($results as $email) : ?>

          <tr>
            <td><?php echo $email->id; ?></td>
            <td><?php echo $email->email; ?></td>
            <td><?php echo $email->date; ?></td>
            <td><button type="submit" name="checkedProduct[]" value="<?php echo $email->id; ?>" id="<?php echo $email->id; ?>">Delete</button></td>
          </tr>

          <?php endforeach; ?>
          </div>
        </tbody>
      </table>
    </div>

  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/sort_email_table.js" charset="utf-8"></script>

</body>
</html>
