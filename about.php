<?php
include './components/header.php';
?>
<div section="about-block" class="about-block">
    <div class="container">
        <div class="about-grid">
            <div class="content">
                <h2>About Me</h2>
                <p>Hi there! My name is [Name] and I am a professional photographer based in [City], [State]. I specialize in [Type of Photography] and have been capturing stunning images for [Number] years.</p>
                <p>I fell in love with photography at a young age and have been honing my skills ever since. I am passionate about capturing the beauty and emotion of every moment, and I strive to create unique and unforgettable images for my clients.</p>
                <p>In addition to my [Type of Photography] expertise, I also offer a range of photography services, including [Other Services]. I am available for shoots in [City] and beyond, and I would love the opportunity to capture your special moments.</p>
                <p>Please feel free to browse my portfolio and contact me with any questions or to book a shoot. I can't wait to work with you!</p>
            </div>
            <?php
            
            $sql = "SELECT * FROM portfolio_image ORDER BY RAND() LIMIT 1;";
            $query = $conn->query($sql);

            
            if ($query->num_rows > 0) {
                // output data of each row
                while($image =$query->fetch_assoc()):
                
                    echo '<div class="about-card">';

                    echo "<img style='background-color:black;' data-id='".$image['id']."' alt='' src='".$image['url']."'>";


                echo '</div>';
                endwhile;
            } else {
                echo "0 results";
            }

            ?>
        </div>
    </div>
</div>
<?php
include './components/footer.php';
?>