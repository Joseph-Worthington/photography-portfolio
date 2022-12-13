    
<section class="edit-modal" data-imgID="">
    <div class="conatiner">
        <h2>How would you like to edit this image?</h2>

        <form method="post">
            <fieldset>
            <input type="hidden" id="imageid" name="imageid"/>
                <label for="alt-text">Alt Text</label>
                <input type='alt-text' name='alt-text' id='alt-text' max-length="255" required>
                <button type="submit">Edit Image</button>
            </fieldset>
        </form>
    </div>
</section>
        
<?php

if (isset($_POST['submit'])) :
//Make sure the alt-text has been filled in
    if (
        !isset($_POST["alt-text"])
    ) {
        exit("You must submit a title, a description and an image");
    }

    //Check for any special characters and convert to html entities
    $alt_txt = htmlspecialchars($_POST["alt-text"]);
    $id=$_POST["imageid"];

    $sql = "INSERT INTO portfolio_image (alt_text) VALUES ($alt_txt) WHERE id = $id";
    $query = $conn->query($sql);

endif; 

?>

