<?php

//$button_txt="var1=$transl_btn&var2=$transc_btn&status=ok";
$bhandle=fopen("../button_label/button_labels.txt",'r');
$result_button=fread($bhandle, filesize("../button_label/button_labels.txt"));
$button_txt_gen=explode("&", $result_button);
$button_txt_transl=explode("=",$button_txt_gen[0]);
$button_txt_transc=explode("=",$button_txt_gen[1]);


?>
<html>
<head>
<title>FLASH PLAYER CONFIGURATIONS</title>
<link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>
<body>


<h1>FLASH PLAYER CONFIGURATIONS</h1>

    <div id="back"><a href="index.php"><< BACK to TABLE OF CONTENTS</a></div>
    <br/>
<form method="post" enctype="multipart/form-data" action="../admin/proc_files.php" >
    <fieldset>
    <legend>1. DEFINE TEXT for PLAYER BUTTONS</legend>
        <table width="300">
            <tr>
                <td colspan="2">Flash player button text for the can only consist of max 3 letters</td>
            </tr>
            <tr>
                <td width="50">Language Button Translation:</td><td><input type="text" value="<?php echo $button_txt_transl[1]; ?>" size="3" name="transl_btn" /></td>
            </tr>
            <tr>
                <td>Language Button Transcript:</td><td><input type="text" value="<?php echo $button_txt_transc[1]; ?>" size="3" name="transc_btn" /></td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
    <legend>2. SUBMIT CHANGES</legend>
        <table>
            <tr>
                <td>*** required ***</td>
            </tr>
            <tr>
                <td>Click button below after you have entered the requird information.</td>
            </tr>
            <tr>
                <td><input name="configuration" type="submit" value="SUBMIT CONFIGURATIONS"></td>
            </tr>
        </table>
    </fieldset>
</form>

    <div id="back"><a href="index.php"><< BACK to TABLE OF CONTENTS</a></div>
</body>
</html>