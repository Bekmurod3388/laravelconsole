** Environment Setup, Downloading and Running the Project **
Either clone this repository or download its zipped folder (if you donwload zip file, please unzip it)
In order to run this project, you need a web server and mysql (for example, XAMPP server, all included)

* after installing XAMPP (or your own web and db servers), start them
* create new database named **task3**   type(utf-8 general_ci) (e.g., use yourhost/phpadmin if you install XAMPP)
* please open terminal
* cd into the project folder which is earlier unzipped or cloned
* run project by typing:
    * composer install
    * php artisan migrate --seed

** Console commands for task **
1) php artisan task:client         - show clients table
2) php artisan task:addclient      - add new client
3) php artisan task:purchase       - show purchase table
4) php artisan task:addproduct     - add new product
5) php artisan task:action         - actions are as follows (to send SMS and Email notifications)
    * select type sending e-mail or sms (0 or 1)
    * select e-mail or phone_number 
    * select product name

You can see sending email or sms to send successfully 
If you register your email address in the database table, please open your email address and check it once you receive notification!

For sending SMS, if you have a SMS-Gateway from Uzbekistan, I can also implement this part!

All logs are logged in the table inserted too.
