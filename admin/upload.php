<?php

error_reporting(E_ALL);
?>

<html>
<head>
<title>CREATE &amp; UPLOAD FILES</title>
<link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>
<body>
    
<h1>FILE UPLOAD</h1>

    <div id="back"><a href="index.php"><< BACK to ADMIN START PAGE </a></div>
    <br/>
<form method="post" enctype="multipart/form-data" action="proc_files.php" >
    <fieldset>
    <legend>1. UPLOAD MAIN VIDEO  - *** required *** - Create yourself</legend>
        <table>
            <tr>
                <td colspan="2" height="20"></td>
            </tr>
            <tr>
                <td colspan="2">Create FLV (Flash Video) file: <a href="start.php" target="_blank">Click here to see file requirements</a><br>
                <font size="-2">(Make sure the upload_max_filesize in php.ini is big enough to accomodate for your video file sizes.}</font>
</td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
                <td>Video Number:</td><td><input type="text" size="2" value="02" name="video_num" /> <font size="-2">(zero-padded 2 digit number, using numbers that have been used before will overwrite previous uploaded files)</font></td>
            </tr>
            <!--<tr>
                <td colspan="2">Naming convention: video 1 -> 01.flv</td>
            </tr>
            <tr>
                <td colspan="2"><h5>Warning!!: If you use the same video number as for previous numbers your existing video will be overwritten.</h5></td>
            </tr>-->
            <tr>
                <td>Upload FLV file:</td><td><input type="hidden" size="150000000" name="MAX_FILE_SIZE" /><input type="file" name="flv_file" /></td>
            </tr>
        </table>
    </fieldset>
    
    <fieldset>
    <legend>2. UPLOAD SUBTITLE: TRANSLATION  - *** required *** - Create yourself</legend>
        <table>
            <tr>
                <td colspan="2" height="20"></td>
            </tr>            
            <tr>
                <td colspan="2">
                	Create TRANSLATION subtitles: <a href="http://subtitle-horse.org/" target="_blank">Click here to create subtitle file with subtitle-horse</a>                
                </td>
            </tr>
            <tr>
                <td colspan="2">Upload XML file (<font size="-2"><b>Warning!!: Uploading files with same name as existing files will overwrite existing files</b></font>):</td><td><input type="hidden" size="15000000" name="MAX_FILE_SIZE" /><input type="file" name="xml_transl_subtitles" /></td>
            </tr>
            <tr>
                <td height="20">                	<br />
                  <fieldset>
                  <legend>XML code sample for head section</legend>
                  <textarea rows="17" cols="40"><?php echo
									'<head>'."\n".'<styling>'."\n".'<style id="1" tts:fontFamily="Arial"/>'."\n".'<style id="2" tts:textAlign="center"/>'."\n".'<style id="3" tts:color="white"/>'."\n".'<style id="4" tts:fontStyle="italic"/>'."\n".'<style id="5" tts:fontSize="16"/>'."\n".'<style id="6" tts:color="lime"/>'."\n".'<style id="7" tts:color="yellow"/>'."\n".'<style id="8" tts:color="red"/>'."\n".'<style id="9" tts:backgroundColor="transparent"/>'."\n".'<style id="G" style="1 2 6 5 9"/>'."\n".'<style id="W" style="1 2 3 5 9"/>'."\n".'<style id="Y" style="1 2 5 7 9"/>'."\n".'<style id="italic" style="1 2 3 4 5 9"/>'."\n".'</styling>'."\n".'</head>'; ?></textarea>
                  </fieldset>


                  <fieldset>
                    <legend>sample code for subtitle</legend>
                    <textarea rows="1" cols="70"><?php echo '<p begin="00:00:01.0" end="00:00:02.9" style="W">1st translation subtitle line</p>'; ?></textarea>
                  </fieldset>                  
</td>
            </tr>
            <!--<tr>
                <td colspan="2">Naming convention: video 1 -> 01_translation.xml</td>
            </tr>-->
            <tr>
                <td colspan="2"></td>
            </tr>
        </table>
    </fieldset>
    
    <fieldset>
    <legend>3. UPLOAD SUBTITLE: TRANSCRIPT  - *** required *** - Create yourself</legend>
        <table>
            <tr>
                <td colspan="2" height="20"></td>
            </tr>
            <tr>
                <td colspan="2">Create TRANSLATION subtitles: <a href="http://subtitle-horse.org/" target="_blank">Click here to create subtitle file with subtitle-horse</a></td>
            </tr>
            <tr>
                <td>Upload XML file (<font size="-2"><b>Warning!!: Uploading files with same name as existing files will overwrite existing files</b></font>):</td><td><input type="hidden" size="15000000" name="MAX_FILE_SIZE" /><input type="file" name="xml_transc_subtitles" /></td>
            </tr>
            <tr>
                <td height="20">                	<br />
                  <fieldset>
                  <legend>XML code sample for head section</legend>
                  <textarea rows="17" cols="40"><?php echo
									'<head>'."\n".'<styling>'."\n".'<style id="1" tts:fontFamily="Arial"/>'."\n".'<style id="2" tts:textAlign="center"/>'."\n".'<style id="3" tts:color="white"/>'."\n".'<style id="4" tts:fontStyle="italic"/>'."\n".'<style id="5" tts:fontSize="16"/>'."\n".'<style id="6" tts:color="lime"/>'."\n".'<style id="7" tts:color="yellow"/>'."\n".'<style id="8" tts:color="red"/>'."\n".'<style id="9" tts:backgroundColor="transparent"/>'."\n".'<style id="G" style="1 2 6 5 9"/>'."\n".'<style id="W" style="1 2 3 5 9"/>'."\n".'<style id="Y" style="1 2 5 7 9"/>'."\n".'<style id="italic" style="1 2 3 4 5 9"/>'."\n".'</styling>'."\n".'</head>'; ?></textarea>
                  </fieldset>
                  
                  <fieldset>
                    <legend>sample code for subtitle</legend>
                    <textarea rows="1" cols="70"><?php echo '<p begin="00:00:01.0" end="00:00:02.9" style="W">1st translation subtitle line</p>'; ?></textarea>
                  </fieldset>                  
                  </td>
            </tr>
            <!--<tr>
                <td colspan="2">Naming convention: video 1 -> 01_transcript.xml</td>
            </tr>-->
            <tr>
                <td colspan="2"></td>
            </tr>
        </table>
    </fieldset>
    
    <a name="popup_wizard"></a><fieldset>
    <legend>4. UPLOAD POPUP VIDEOS  - *** required *** -  Can be build with help of below form</legend>
        <table>
            <tr>
                <td colspan="5" height="10"></td>
            </tr>
            <tr>
                <td colspan="2"><p><font size="-2"><b>Warning!!: Uploading files with same name as existing files will overwrite existing files</b></font><br /><font size="-2">(Make sure the upload_max_filesize in php.ini is big enough to accomodate for your video file sizes.}</font>
</p></td>
            </tr>
            <tr>
                <td colspan="5" height="10"></td>
            </tr>
            <tr>
                <td>BROWSE FOR MP4 FILE</td>
                <td>BUTTON TEXT</td>
                <td width="20"></td>
                <td>BUTTON COLOR</td>
                <td width="20"></td>
                <td>POPUP SHOULD APPEAR ...</td>
            </tr>
            <?php for($x=0;$x<21;$x++){ ?>
            <tr>
                <td><input type="hidden" size="15000000" name="MAX_FILE_SIZE" /><input type="file" name="xml_video<?php echo $x ?>_cue" /></td>
                <td> <input type="text" size="20" name="xml_video<?php echo $x ?>_btn_txt" value="enter text"> </td>
                <td></td>
                <td>yellow <input type="radio" name="xml_video<?php echo $x ?>_btn" value="Y"> white <input type="radio" name="xml_video<?php echo $x ?>_btn" value="W"> green <input type="radio" name="xml_video<?php echo $x ?>_btn" value="G"></td>
                <td></td>
                <td>after <input type="text" size="3" name="xml_video<?php echo $x ?>_time" value="000"> second </td>
            </tr>
            <?php } ?>
        </table>
    </fieldset>
    
        <table>
            <tr>
                <td height="20"></td>
            </tr>
            <tr>
                <td>Click button below after you have entered the requird information.</td>
            </tr>
            <tr>
                <td><input name="upload" type="submit" value="SUBMIT FILES &amp; DATA"></td>
            </tr>
        </table>
    
</form>
    
    <div id="back"><a href="index.php"><< BACK to ADMIN START PAGE </a></div>
</body>
</html>