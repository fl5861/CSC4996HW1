This Project is a Homework Assignment for CSC4996 Senior Project
by Ty Austin (Access ID: fl5861) Winter 2018 Semester

To-Do List Application

A simple to do list application that allows users to add, remove and view a list of tasks.  Tasks can be assigned due dates and a status (Pending, Started, Complete, Late.)  The list also keeps track of the number of tasks for each status as well as a total count of all tasks.  Users can filter the list by clicking on the count for that status.

This application utilizes XAMP stack architecture, please make sure that you have it installed and running the Apache and MySql modules.  This application utilizes the localhost database, so please make sure it is accessible.  

Setup:
1. Obtain files from github repository:
https://github.com/fl5861/CSC4996HW1

2.  Ensure the php files are saved into the 'htdocs' folder located in your xampp install (usually in C:/xampp/htdocs)

3.  If this is your first time running this application, run the 'setup.php' script through the local host, this will create the necessary database and table.  You can do this by typing 'localhost/setup.php' into your internet browser.  DO NOT run the scripts by opening them, this will not work.

NOTE: Please have your phpmyadmin username set as 'root' and password set to blank.  These are typically the defaults when you first install xampp.  Otherwise, you can modify the scripts to match your username and password.

To modify the scripts, open them in notepad and locate (depending on the file):

$connect = new mysqli('localhost', $user, $pass, $db);
or
$connection = new mysqli('localhost', $user, $pass, $db);

change $user and $pass to your cooresponding username and password for phpmyadmin

4.  Run the 'connect.php' script to start the application.  You run this by typing 'localhost/connect.php' into your web browser.  

If you have any issues, you can also view the included video.
