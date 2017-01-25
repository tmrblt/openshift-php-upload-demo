<?php
$datadir = "/opt/app-root/src/uploaded";
/* Display all file except core application files */
if ($handle = opendir($datadir)) {
   while (false !== ($file = readdir($handle))) {
          /* This is to exclude files from being shown on the screen - probably a better way of doing this */
          if ($file != ".gitkeep" && $file != "lost+found" && $file != "." && $file != ".." && $file != "index.php" && $file != "OpenStack.php" && $file != "README.md" && $file != "upload.php" && $file != ".openshift" && $file != ".vimrc" && $file != ".bash_profile" && $file != ".bash_history" && $file != "config.php" && $file != "ufo.php") {
            $thelist .= '<li><a href="/uploaded/'.$file.'">'.$file.'</a></li>';
            /* $thelist .= '<li><a href="'. $datadir . $file . '">'.$file.'</a></li>'; */
          }
       }
  closedir($handle);
  }
echo "<h4>List of files:</h4>";
echo "<ul>" . $thelist . "</ul>";
echo '<a href="./index.html">Home Page</a><br>';
?>
