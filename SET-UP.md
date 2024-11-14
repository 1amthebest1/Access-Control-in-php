## This is a basic implementation of AC, that works based on php session username which is taken from the cookie in the browser...

## -Pre-requisites

-php installed

-mysql installed

If you have apache2 installed.
This is configuration you need to add in apache2/conf-available, if you want to use phpmyadmin


     
    Alias /phpmyadmin /usr/share/phpmyadmin
    <Directory /usr/share/phpmyadmin>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>


You can start apache server using

sudo systemctl restart apache2

You can start mysql server using

sudo systemctl restart mysql
