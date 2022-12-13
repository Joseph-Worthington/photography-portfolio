<?php
include './components/header.php';
?>
<section class="portfolio">
  <div class="container">

  <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])):?>
  <form method="POST" action="add.php" class="image-upload" enctype="multipart/form-data">
    <h2>Upload new image</h2>
    <fieldset>
      <label for="image" >Your file :</label>
      <input type="file" name="image" id="image" accept="image/jpeg" required>

    <button class="fill black" type="submit">Add Image</button>

    </fieldset>
  </form>

  <?php endif;?>

    <div class = "portfolio-hero">
      <h1>Portfolio</h1>

      <div class="category-menu">
        <ul>
          <li ><a class="button outline black" href="portfolio?filter=nature">Nature</a></li>
          <li><a class="button outline black"href="portfolio?filter=horses">Horses</a></li>
          <li><a class="button outline black" href="portfolio?filter=vechiles">Vehicles</a></li>
          <li><a class="button outline black" href="portfolio?filter=military">Military</a></li>
          <li><a class="button outline black" href="portfolio?filter=activities">Activities</a></li>
          <li><a class="button outline black" href="portfolio?filter=landmarks">Landmarks</a></li>
        </ul>
      </div>
    </div> 

    <div class="portfolio-grid">


     
      <?php

      if(isset($_GET['filter'])):

        $cat = $_GET['filter'];


        $sql =  "SELECT * FROM portfolio_image AS pi LEFT JOIN image_categories AS icat ON pi.id = icat.image_id RIGHT JOIN categories AS cat ON icat.category_id = cat.id WHERE cat.category_slug = '".$cat."'";

        $query = $conn->query($sql);

        // print_r($query);


        if ($query->num_rows > 0) {
          // output data of each row
          while($image =$query->fetch_assoc()):

            echo '<div class="image-card">';

              echo "<img style='background-color:black;' data-id='".$image['image_id']."' alt='' src='".$image['url']."'>";

              if (isset($_SESSION['id']) && isset($_SESSION['user_name'])):
              echo'<div class="edit-options">';
                  echo'
                  <form method="POST" action="delete.php">
                    <input type="hidden" name="id" value="'. $image['id'].'">
                    <button class="fill black" type="submit">Delete</button>
                  </form>
                  ';
              echo'</div>';

              endif;

            echo '</div>';

          endwhile;
        } else {
          echo "0 results";
        }


      else:

        $sql = "SELECT * FROM portfolio_image";
        $query = $conn->query($sql);

        if ($query->num_rows > 0) {
          // output data of each row
          while($image =$query->fetch_assoc()):

            echo '<div class="image-card">';

              echo "<img style='background-color:black;' data-id='".$image['id']."' alt='' src='".$image['url']."'>";

              if (isset($_SESSION['id']) && isset($_SESSION['user_name'])):
              echo'<div class="edit-options">';
                  echo'
                  
                  <form method="POST" action="delete.php">
                    <input type="hidden" name="id" value="'. $image['id'].'">
                    <button class="fill black" type="submit">Delete</button>
                  </form>
                  ';
              echo'</div>';

              endif;

            echo '</div>';

          endwhile;
        } else {
          echo "0 results";
        }
      endif;
      ?>
    </div>
  </div>
</section> 



<?php
include './components/footer.php';
?>