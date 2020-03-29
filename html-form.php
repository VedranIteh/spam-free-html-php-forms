/* 
 * You can copy and paste one of the following forms from here into your own template
 * please remember to inculde the form.css file and appropriate .php and style it as you like. 
 * add "required" attribute where you find suitable.
 * add or remove any field except the honeypot ones.
 * remove all comments so the bots don't analize or identify by them.
 */

/* CONTACT FORM */

<input type="text" value="Your name" name="name" id="contact-name">
<input type="email" value="Contact email" name="email" id="contact-email">
<input type="text" value="Phone number" name="number" id="contact-number">
<input type="text" value="City" name="city" id="contact-city"> /* honeypot 1 */
<input type="text" value="County" name="county" id="contact-county"> /* honeypot 2 */
/* <input type="text" value="State" name="state" id="contact-state">  honeypot 3 - disabled for css reasons, uncomment here and in css to work or just delete it all*/
<input type="hidden" value="zip" name="zip" id="contact-zip"> /* honeypot 4 */ 
<input type="text" value="City" name="city2" id="contact-city2"> 
<input type="text" value="County" name="county2" id="contact-county2"> 
<input type="text" value="State" name="state2" id="contact-state2"> 
<input type="hidden" value="<?php echo  ?>" name="control" id="control"> 
<input type="textarea" name="message" id="message"> 
