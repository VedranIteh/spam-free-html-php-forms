# Spam-free contact form
Secure, spam blocking, bot deferring, contact forms, login dialogs and more ... without annoying captchas.

# Step by step intall Instructions:
1. download and include form.css or just copy/paste from it into your own style file
2. put form-process in your root dir (www or public_html)
3. copy and paste the php snipet and form html (including javascript) into your contact template.
4. test it! Either you get an email, or your IP and message gets logged in contact.log in your www dir
5. optional, if you have a possibility use the log file for fail2ban or something simillar.
6. optional, edit form-process.php where commented and manipulate the submitted data differently 

# How it works
1. CSRF - no submitting directly to the server. 
2. Time trap - no submitting faster than a human would
3. Honeypots - a series of honeypots hidden in different manners, non of which will be filled by a human
4. referral check - accept submits only from your forms
5. RBL - check the visitors IP against a well known spammers database

Need help setting it up?
http://media.infoteh.hr
