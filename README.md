# Udoy5678_bloodbank.github.io


-Laravel 5.2
-PHP 5.5
-localhost/phpmyadmin
#Run Command:
-php artisan migrate
-php artisan serve
#Required:
-Nexmo account for sms api

#About Blood Bank

----
It's a dynamic blood bank website in which donors and users are verified by sms.
--For generating sms verification i use nexmp sms api demo by which we can simply peroforms  donors/users verification.

After verifying donor detailed information store into our database. 
--For searching donors users use GPS tracking system by which he/she can locate nearby donors and also can perform custom search for finding donors in case of scarcity of blood in his/her area.

Then he/she can contact with donors through sms.
----
To see all defined routes and corresponding controller methods use `php artisan route:list` console command
