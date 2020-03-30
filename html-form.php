/* 
 * You can copy and paste the following form from here into your own template
 * please remember to inculde the form.css file and appropriate .php and style it as you like. 
 * add "required" attribute where you find suitable.
 * add, edit or delete any of the "good fields" except the honeypot ones.
 * remove all comments so the bots don't analize or identify the protection by them.
 * Have fun adapting it for use with logins, booking forms etc.. acctually, why not contributing to the project?
 */

/* CONTACT FORM START */

<?php 
session_start(); //put this in the first line of your file (or at least before any other output)
$_SESSION['when'] = rand(10,99).date("U"); //timestamp and some random nums to make it harder to guess what it is 
?> 

<form method="POST" action="form-process.php">
<input class="fields" type="text" value="Your name" name="name" id="contact-name"> /* good field */
<input class="fields" type="email" value="Contact email" name="email" id="contact-email"> /* good field */
<input class="fields" type="text" value="Phone number" name="number" id="contact-number"> /* good field */
<input class="fields" type="text" value="" name="city" id="contact-city"> /* honeypot 1 */
<input class="fields" type="text" value="" name="county" id="contact-county"> /* honeypot 2 */
/* <input class="fields" type="text" value="" name="state" id="contact-state">  honeypot 3 - disabled for css reasons, uncomment here and in css to work or just delete it all*/
<input type="hidden" value="" name="zip" id="contact-zip"> /* honeypot 4 */ 
<input class="fields" type="text" value="" name="surname" id="contact-surname"> /* honeypot 5 */ 
<input class="fields" type="text" value="City" name="city2" id="contact-city2"> /* good field */
<input class="fields" type="text" value="County" name="county2" id="contact-county2"> /* good field */ 
<input class="fields" type="text" value="State" name="state2" id="contact-state2"> /* good field */
<input type="hidden" value="<?php echo $_SESSION['when']; ?>" name="control" id="control"> /* dont remove*/
<input type="textarea" name="message" id="message"> /* good field */
</form>
<script>
var h5 = document.getElementById("contact-surname");
h5.parentNode.removeChild(h5);
</script>

/* CONTACT FORM END */
