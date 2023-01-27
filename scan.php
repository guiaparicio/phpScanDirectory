<?php

    /* CONFIGS */
    $dir        = "/YOUR DIRECTORY HERE/"; // Enter the directory to be scanned here Ex: /home/myuser/var/www/html/
    $code       = file_get_contents("code.txt"); // Include the code to be searched for in this file
    $removeCode = false; // Set true if you want to remove the code when found
    $searchExtensions = ["js","php","txt"]; // Set types of files that will be searched

    echo "<body style='background-color:black; color: #00ff2a;'>";
    echo "Scan started...<br><br>";

    $it         = new RecursiveTreeIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS));
    $filesFound = 0;

    foreach($it as $path) {

        $ext = pathinfo($path, PATHINFO_EXTENSION);

        if (in_array($ext, $searchExtensions)){
            
            $path_real = str_replace("|","",$path);
            $path_real = str_replace("-/","",$path_real);
            $path_real = str_replace('\\',"",$path_real);
            $path_real = "/". ltrim($path_real);

            $content_file = file_get_contents($path_real);

            if(strpos($content_file, $code) !==  false){

                if($removeCode == true){
                    $new_content_file = str_replace($code, "", $content_file);
                    file_put_contents($path_real, $new_content_file);
                }
            
                echo $path."<br>";

                ++$filesFound;

            }

        }

    }

    echo "<br><br><strong>Files found:</strong> {$filesFound}";
    echo "</body>";