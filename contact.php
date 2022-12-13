<?php
include './components/header.php';
?>
<div class="contact-block">
    <div class="container">
        <form action="/submit-form" method="POST">
            <h2>Get In Touch</h2>
            <p>I will get back to you as soon as possible with my availability and a quote for your event/photoshoot</p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<?php
include './components/footer.php';
?>