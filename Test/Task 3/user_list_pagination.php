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
  <div class="center">
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
          <?php Email::delete_email();?>

          <?php

          $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

          $items_pre_page = 10;

          $items_total_count = Email::count_all();


          $paginate = new Paginate($page, $items_pre_page, $items_total_count);

          $sql = "SELECT * FROM subscribers ";
          $sql .= "LIMIT {$items_pre_page} ";
          $sql .= "OFFSET {$paginate->offset()}";
          $results = Email::find_by_query($sql);

           ?>


          <?php foreach ($results as $email) : ?>

          <tr>
            <td><?php echo $email->id; ?></td>
            <td><?php echo $email->email; ?></td>
            <td><?php echo $email->date; ?></td>
            <td><button type="submit" name="checkedProduct[]" value="<?php echo $email->id; ?>" id="<?php echo $email->id; ?>">Delete</button></td>
          </tr>

          <?php endforeach; ?>
              </tbody>
            </table>
          </div>


    <div class="pagination">

      <?php

      if($paginate->page_total() > 1){

        if($paginate->has_previous()){
          echo "<a class=no_previous href='user_list_pagination.php?page={$paginate->previous()}'>&laquo;</a>";
        }


        for ($i=1; $i <= $paginate->page_total(); $i++) {
          if($i == $paginate->current_page){
            echo "<a class=previous href='user_list_pagination.php?page={$i}'>{$i}</a>";
          } else {
            echo "<a href='user_list_pagination.php?page={$i}'>{$i}</a>";
          }
        }


        if($paginate->has_next()){
          echo "<a href='user_list_pagination.php?page={$paginate->next()}'>&raquo;</a>";
        }
      }

       ?>

  </div>
</div>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/sort_email_table.js" charset="utf-8"></script>

</body>
</html>
