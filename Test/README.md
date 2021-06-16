# Task 1 & Task 2.

To run these tasks locally, just download Task 1&2 folders and open in Your browser:

”Task 1.html”;
”Task 2.html”;

Special notes:
1. The page is pixel-perfect.
2. Font with custom items is used. Instead of using font awesome, I downloaded images provided by design link and made a custom font(icomoon).
3. A success message appears in the place of the form(Page is modified, not redirected to another page with success message).

# Task 3.

1. To run the project locally, please download and install latest version of "XAMPP" or analog program, to simulate server on Your computer.

Note! Choose to download version without virtual machine("VM")
Link 1: https://www.apachefriends.org/download.html
Link 2: https://sourceforge.net/projects/xampp/

If links above doesn't work. Go to https://www.google.com/

2. After the program is installed, find "XAMPP" folder on Your computer. Inside it, find "htdocs" folder and make shortcut of it on the desktop.

3. "htdocs" folder will be used to store project files.

4. Save folder "Task 3" in "htdocs" folder.

5.Check that "icomoon" folder have permission of "Read & Write" for everyone:
  5.1 Right click on "icomoon" folder, click on get info.
  5.2 Open Sharing & Permissions tab.
  5.3 Set "everyone" privilege to "Read & Write".
  Note! If this step is missed, custom font with icons will not be displayed.

6. Open XAMPP, go to "Manage Servers" tab, select:
  6.1 "MySQL Database" and click start(red lamp should become green)
  6.2 "Apache Web Server" and click start(red lamp should become green)

7. Open Your browser and go to localhost/Task 3/Task 3.php to add new subscriber's email (25 emails will be added automatically through .sql file).
8. Go to localhost/Task 3/user_list.php to check all added emails. (click on Subscribers table's headers: "Email","Data" to sort the table)
9. Go to localhost/Task 3/user_list_pagination.php to check email table with pagination. Pagination is present on the list with 10 emails per page.
