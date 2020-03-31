/* 
 * You can copy and paste the following php snippet and form from here into your own template
 * please remember to inculde the form.css file and appropriate .php and style it as you like. 
 * add "required" attribute where you find suitable.
 * add, edit or delete any of the "good fields" except the honeypot ones.
 * remove all comments so the bots cant't identify the protection you're using.
 * Have fun adapting it for use with logins, booking forms etc.. acctually, why not contributing to the project?
 */

/* put this snippet in the first line of your file (or at least before any other output) */
<?php 
session_start(); 
$_SESSION['when'] = rand(10,99).date("U"); //timestamp and some random nums to make it harder to guess what it is 
?> 

/* CONTACT FORM START */
<form method="POST" action="form-process.php">
<input class="fields" type="text" placeholder="Your name" name="name" id="contact-name"> /* good field */
<input class="fields" type="email" placeholder="Contact email" name="email" id="contact-email"> /* good field */
<input class="fields" type="text" placeholder="Phone number" name="number" id="contact-number"> /* good field */
<input class="fields" type="text" placeholder="city" name="city" id="contact-city"> /* honeypot 1 */
<input class="fields" type="text" placeholder="county" name="county" id="contact-county"> /* honeypot 2 */
<!-- <input class="fields" type="text" placeholder="state" name="state" id="contact-state"> -->  /* honeypot 3 - disabled for css reasons, uncomment here and in css to work or just delete it all*/
<input type="hidden" placeholder="zip" name="zip" id="contact-zip"> /* honeypot 4 */ 
<input class="fields" type="text" placeholder="Surname" name="surname" id="contact-surname"> /* honeypot 5 */ 
<input class="fields" type="text" placeholder="City" name="city2" id="contact-city2"> /* good field */
<input class="fields" type="text" placeholder="County" name="county2" id="contact-county2"> /* good field */ 
<input class="fields" type="text" placeholder="State" name="state2" id="contact-state2"> /* good field */
<input type="hidden" placeholder="<?php echo $_SESSION['when']; ?>" name="control" id="control"> /* dont remove*/
<input type="textarea" name="message" id="message"> /* good field */
</form>
<script>
var h5 = document.getElementById("contact-surname");
h5.parentNode.removeChild(h5);
</script>

/* CONTACT FORM END */
