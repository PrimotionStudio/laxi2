You will need access to the Developer API on Twitter. If you give them a good reason at the time of request, they usually accept it quickly. I recommend you not to look like a spammer :)

2 - Download the script and upload it to an FTP subfolder of your hosting or your local PHP server (Xampp or similar)

3 - Replace the main values ​​of index.php with your keys: CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET)

4 - Substitute the values ​​you want to look for in the $input array (be careful with the quotes)

5 - Substitute the response for each value in the $corrections array

6 - Run the script URL in your browser (or create a cronjob or scheduled task to call it periodically unattended).
