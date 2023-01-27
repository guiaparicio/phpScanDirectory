# What does this script do?
PHP script that scans all files in a directory, identifying if there are chunks of text/code in each file, and capable of replacing or removing them.

![alt text](https://i.ibb.co/QcGYPY8/Screenshot-from-2023-01-27-14-06-44.png)

# Example of use: 
Search for files that contain malicious code chunks after a JS injection attack on your WordPress website

# Requeriments

```text

PHP7+

```

# Config

Before running the scan.php file, properly configure the variables existing at the beginning of the file.

```php


// Enter the directory to be scanned here Ex: /home/myuser/var/www/html/
$dir = "/YOUR DIRECTORY HERE/"; 

// Include the code to be searched for in this file
$code = file_get_contents("code.txt");

// Set true if you want to remove the code when found
$removeCode = false; 

// Set types of files that will be searched
$searchExtensions = ["js","php","txt"];


```

