<?php
/*
    Title: Run a PHP Script in the Background After a Form Has Been Submitted
    Auther: Sandeep Yadav
    Description: Here we can run a PHP file (script) in background, This process is hidden to the end user.  
*/

// put your email address here to see the script in action 
$email = 'test@site.com';

// don't let user kill the script by hitting the stop button 
ignore_user_abort(true); 

// don't let the script time out 
set_time_limit(0); 

// start output buffering
ob_start();  

usleep(1500000); // do some stuff...

// now force PHP to output to the browser... 
$size = ob_get_length(); 
header("Content-Length: $size"); 
header('Connection: close'); 
ob_end_flush(); 
ob_flush(); 
flush(); // yes, you need to call all 3 flushes!
if (session_id()) session_write_close(); 


usleep(120000000); // do some stuff

mail($email, 'PHP Background Running', "You close the browser but we process this script..");
