<?php



    $file =$_GET['file'];
    $fileName = "PDFFiles/".$file;
    echo $fileName;
    header("Content-type:application/pdf");
    header('Content-Disposition: inline; filename="' . $fileName . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    // header("Content-length : ".filesize($fileName));
    @readfile($fileName);
?>