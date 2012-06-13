<?php


?>

<html>
<head>
<title>INFORMATION AND INSTRUCTIONS</title>
<link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>
<body>
<h1>BASIC SETUP INFORMATION </h1>

    <div id="back"><a href="index.php"><< BACK to ADMIN START PAGE </a></div>
    <br/>
    <fieldset>
    <legend><h3>INSTALLATION &amp; FILE SETUP:</h3></legend>
        <table>
            <tr>
                <td colspan="2">
                <ol>
                <br />
                <h3><li>Extract zip archive and copy/move content with or without folder to your web server</li></h3>
                <h3><li>Make the /videos/flv/ folder writable</li></h3>
                <h3><li>Main video setup (1 video per page)</li></h3>
                	<ol>
                    	<li><strong>file name:</strong> e.g. 01.flv (zero-padded 2 digit file name)</li>
                    	<li><strong>file folder:</strong> /videos/flv/</li>
                    	<li><strong>file extension:</strong> .flv</li>
                    	<li><strong>video dimensions:</strong> 338 x 507 (custom size, all other sizes will still play, but may be distorted)</li>
                      <li><strong>Possible ways to create a flv file from mp4</strong></li>
                          <ul>
                          <li><strong>MAC</strong>:
                          <br/><a href="http://www.adobe.com/support/downloads/detail.jsp?ftpID=4868">Adobe Media Encoder</a>
                          <br/><a href="http://www.ffmpegx.com/download.html">ffmpegx</a> (use video tab <a href="http://www.ffmpegx.com/video.html">instructions</a>)
                          </li>
                          <li><strong>PC:</strong>
                          <br/><a href="http://www.adobe.com/support/downloads/product.jsp?product=160&platform=Windows">Adobe Media Encoder</a> (used to ship with Adobe CS4, now sold separately) 
                          <br/><a href="http://www.sharewareguide.net/article/Tip/flv-encoder:-how-to-convert-mpg--mp4--m4v--mov--rm--avi--mpeg--wmv-to-flv-file.html">AVS video converter</a>
                          </li>
                          </ul>
                    </ol>
                <h3><li>Popup videos (unlimited number of popup video files)</li></h3>
                	<ol>
                    	<li><strong>file name:</strong>  <br/> filename1.mp4 <br/>filename2.mp4<br/>filename3.mp4<br/>etc.</li>
                    	<li><strong>file folder:</strong> /videos/mp4/ </li>
                    	<li><strong>file format:</strong> mp4 video with  H.264 encoding</li>
                    	<li><strong>file extension:</strong> .mp4</li>
                    	<li><strong>video dimensions:</strong> 262 x 350 (custom size, all other sizes will still play, but may be distorted)</li>
                    </ol>
                <h3><li>Subtitles (2 xml files required)</li></h3>
                	<ol>
                    	<li><strong>file folder:</strong> /subtitles/</li>
                    	<li><strong>file name:</strong> e.g. 01_translation.xml, 01_transcript.xml</li>
                    	<li><strong>file format:</strong> file with Extensible Markup Language</li>
                    	<li><strong>file extension:</strong> .xml</li>
                    	<li><strong>Code format:</strong> <a href="http://edutechwiki.unige.ch/en/Timed_Text" title="timed-text code format">Timed text XML code</a></li>
                      
                      <li>See <a href="upload.php">samples code or use subtitle-horse</a> to create these xml files</li>
                    </ol>
                <h3><li>Popup button &amp; video info (1 xml file required)</li></h3>
                	<ol>
                    	<li><strong>file location:</strong> /popup_annotation/</li>
                    	<li><strong>file name:</strong> e.g. 01_buttonText.xml </li>
                    	<li><strong>file format:</strong> file with Extensible Markup Language</li>
                    	<li><strong>file extension:</strong> .xml</li>
                      <li>Use <a href="upload.php#popup_wizard">popup upload wizard</a> to place videos and create xml file</li>
                    </ol>
                <h3><li>Webpage</li></h3>
                	<ol>
                    	<li><strong>file folder:</strong> /webpages/</li>
                    	<li><strong>file name:</strong> e.g. 01.html (zero-padded 2 digit file name)</li>
                    	<li><strong>file format:</strong> HTML webpage</li>
                    	<li><strong>file extension:</strong> .html</li>
                    </ol>
                <h3><li><a href="configuration.php">Configure</a> Flash player language button labels</li></h3>

                </ol>
                
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
    <legend><h3>EXP. SETUP OF A SECOND VIDEO</h3></legend>
    To create another video place the follwing files in appropriate folder
    <ul>
      <li><strong>Main video:</strong> /videos/02.flv</li>
      <li><strong>Popup video files:</strong> /videos/mp4/filename1.mp4, /videos/mp4/filename2.mp4</li>
      <li><strong>Subtitles:</strong> /subtitles/02_translation.xml, /subtitles/02_transcript.xml</li>
      <li><strong>Popup button &amp; video info:</strong> /popup_annotation/ 02_buttonText.xml</li>
      <li><strong>Webpage:</strong> /webpages/02.html</li>
    </ul>
    
    
    </fieldset>
    <div id="back"><a href="index.php"><- BACK to ADMIN START PAGE </a></div>

</body>
</html>