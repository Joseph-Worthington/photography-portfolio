<?php
include './components/header.php';
?>
<div section = "hero">
    <div class="container">
        <h1>Photography Portfolio</h1>
    </div>
</div>
<div section="portfolio-block" class="portfolio-block">
    <div class="container">
      <div class="portfolio-card"> 
          <div class="content">
            <h2>Portfolio</h2>
              <p>Welcome to my photography portfolio! My name is [Your Name] and I am a passionate photographer with a love for capturing the world around me. With an eye for detail and a creative mind, I strive to create stunning images that tell a story and evoke emotion. From landscapes and cityscapes, to portraits and events, I have experience in a wide range of photography styles and am always eager to take on new challenges. Please take a look around and feel free to reach out with any questions or opportunities.</p>
              <div class="ctas">
                <a class="button outline black" href="./portfolio">Get in Touch</a>
              </div>
          </div>

        <?php

        
        $sql = "SELECT * FROM portfolio_image LIMIT 1";
        $query = $conn->query($sql);

        
        if ($query->num_rows > 0) {
            // output data of each row
            while($image =$query->fetch_assoc()):
  
              echo '<div class="portfolio-block-image">';

              echo '</div>';
            endwhile;
          } else {
            echo "0 results";
          }

        ?>
      </div>
    </div>
</div>
<div section ="cta-block" class="cta-block">
    <div class="container">
        <h2>Get in touch</h2>
        <span>For my availibility and to get a quote get in touch</span>
        <div class="ctas">
          <a class="button outline black" href="./contact">Get in Touch</a>
        </div>
    </div>
</div>


<?php
include './components/footer.php';
?>