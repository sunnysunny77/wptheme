<form id="contact_form">
    <fieldset class="row justify-content-center">
        <legend class="col-48">
            <h2>Contact us</h2>
        </legend>
        <label class="col-48 row" for="name">Enter your name:
            <input class="col-48" type="text" name="name" id="name" autocomplete="on" required>
        </label>
        <label class="col-48 row" for="email">Enter your email:
            <input class="col-48" type="email" name="email" id="email" autocomplete="on" required>
        </label>
        <label class="col-48 row" for="message">Enter your message:
            <textarea class="col-48" name="message" id="message" maxlength="1000" rows="6" required></textarea>
        </label>    
    </fieldset>
    <input type="submit" value="Send">
</form>