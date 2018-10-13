<?php
$the_folder = 'qr_codes';
$zip_file_name = 'qrcodes.zip';

class FlxZipArchive extends ZipArchive {
    /** Add a Dir with Files and Subdirs to the archive;;;;; @param string $location Real Location;;;;  @param string $name Name in Archive;;; @author Nicolas Heimann;;;; @access private  **/
    public function addDir($location, $name) {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    } // EO addDir;

    /**  Add Files & Dirs to archive;;;; @param string $location Real Location;  @param string $name Name in Archive;;;;;; @author Nicolas Heimann * @access private   **/
    private function addDirDo($location, $name) {
        $name .= '/';         $location .= '/';
        // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))    {
            if ($file == '.' || $file == '..') continue;
            // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    }
}

$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE)    {
    $za->addDir($the_folder, basename($the_folder)); $za->close();
}
else  { echo 'Could not create a zip archive';}
?>
<html>
<head>
</head>
<body>
<script type="text/javascript">
    var element = document.createElement('a');
    element.setAttribute('href', 'qrcodes.zip');
    element.setAttribute('download', 'qrcodes.zip');
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
    window.location.href='/';
</script>
</body>
</html>
