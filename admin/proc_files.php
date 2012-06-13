<?php

//error_reporting(E_ALL);
if(!isset($_POST['upload'])&&!isset($_POST['configuration'])){
		echo "<div align=\"center\"><br /><br />No files or data were submitted.</div>";
		echo "<div align=\"center\"><br />Please try again. <a href=\"javascript:history.back();\">Click here.</a></b></div>";
		$ok=0;
		exit();
}

/*if(isset($_FILES)){
			if(isset($_FILES['flv_file']['error'])||isset($_FILES['xml_video1_cue']['error'])){
				if(isset($_FILES['flv_file']['error'])){
					echo "<div align=\"center\"><br /><br />There is a problem with your main flv video file</div>";
				}else if(isset($_FILES['xml_video1_cue']['error'])){
					echo "<div align=\"center\"><br /><br />There is a problem with your popup mp4 video file</div>";
				}
				
					echo "<div align=\"center\"><br />Please try again. <a href=\"javascript:history.back();\">Click here.</a></b></div>";
				$ok=0;
				exit();
			}
}*/

////////////////////////////////////////////////////////////////////////
//FILE UPLOAD - POP UP INFO PROCESSING
if(isset($_POST['upload'])){
	//validating file size 
	$temp_flv = $ok1 = isset($_FILES['flv_file']['name'])?$_FILES['flv_file']['tmp_name']:0;
	$temp_transl = $ok2 =  isset($_FILES['xml_transl_subtitles']['tmp_name'])?$_FILES['xml_transl_subtitles']['tmp_name']:0;
	$temp_transc = $ok3 =isset($_FILES['xml_transc_subtitles']['tmp_name'])?$_FILES['xml_transc_subtitles']['tmp_name']:0;
	for($x=0;$x<21;$x++){
		$temp_cue[$x] = $ok4[$x] = isset($_FILES['xml_video'.$x.'_cue']['tmp_name'])?$_FILES['xml_video'.$x.'_cue']['tmp_name']:0;
		$temp_btn[$x] = isset($_POST['xml_video'.$x.'_btn'])?$_POST['xml_video'.$x.'_btn']:0;
		$temp_btn_txt[$x] = isset($_POST['xml_video'.$x.'_btn_txt'])?$_POST['xml_video'.$x.'_btn_txt']:0;
		$temp_time[$x] = isset($_POST['xml_video'.$x.'_time'])?$_POST['xml_video'.$x.'_time']:0;
	//get vid numbers
	$vid_num= $ok5 =isset($_POST['video_num'])?$_POST['video_num']:0;
		if($temp_btn_txt[$x]){
			if(strlen($temp_btn_txt[$x])>21){
				echo "<br /><br /><br /><br /><div align=\"center\">The button text can't consist of more than 20 characters (including white spaces).</div>";
				echo "<div align=\"center\"> Please try again. <a href=\"javascript:history.back();\">Click here.</a></b></div>";
				$ok=0;
				exit();
			}
		}
		if($temp_time[$x]){
			if(strlen($temp_time[$x])>3){
				echo "<br /><br /><br /><br /><div align=\"center\">The cue time can't consist of more than 3 numbers</div>";
				echo "<div align=\"center\"> Please try again. <a href=\"javascript:history.back();\">Click here.</a></b></div>";
				$ok=0;
				exit();
			}
			if(!preg_match('/(\d\d\d)/',$temp_time[$x])){
				echo "<br /><br /><br /><br /><div align=\"center\">The entry for popup seconds can only consist of numbers.</div>";
				echo "<div align=\"center\">Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
				$ok=0;
				exit();
			}
		}
	}
	
	
	if ($ok1||$ok2||$ok3){
		$uploaded_size_flv = filesize($temp_flv);
		$uploaded_size_transl = filesize($temp_transl);
		$uploaded_size_transc = filesize($temp_transc);
		
		for($x=0;$x<21;$x++){
			$uploaded_size_cue[$x] = filesize($temp_cue[$x]);
		}
			
		//validating file name 
		$filename_flv = basename($_FILES['flv_file']['name']); 
		$filename_transl = basename($_FILES['xml_transl_subtitles']['name']);
		$filename_transc = basename($_FILES['xml_transc_subtitles']['name']); 
		$filename_transc = basename($_FILES['xml_transc_subtitles']['name']);
		for($x=0;$x<21;$x++){
			$filename_cue[$x] = basename($_FILES['xml_video'.$x.'_cue']['name']); 
		}
		
		//$match_flv=preg_match('/(\d\d).flv/',$filename_flv,$vid_number);
		//$match_transl=preg_match('/\d\d\_translation.xml/',$filename_transl);
		//$match_transc=preg_match('/\d\d\_transcript.xml/',$filename_transc);
		$match_vid_num=preg_match('/(\d\d?)/',$vid_num);
		$match_flv=preg_match('/(.*).flv/',$filename_flv);
		$match_transl=preg_match('/(.*).xml/',$filename_transl);
		$match_transc=preg_match('/(.*).xml/',$filename_transc);
		for($x=0;$x<21;$x++){
			if($temp_cue[$x]){
				$match_cue[$x] = preg_match('/(.*).mp4/',$filename_cue[$x]);
			}
		}
		

		
				
		//validating file type 
		$mimetype1 = $_FILES['flv_file']['type'];
		$mimetype2 = $_FILES['xml_transl_subtitles']['type'];
		$mimetype3 = $_FILES['xml_transc_subtitles']['type'];
		for($x=0;$x<21;$x++){
			if($temp_cue[$x]){
				$mimetype_cue[$x] = $_FILES['xml_video'.$x.'_cue']['type'];
			}
		}
		
		if($match_vid_num) {$ok5=1;	$vid_num=str_pad($vid_num,2,"0", STR_PAD_LEFT);}
		if(($mimetype1== "application/octet-stream")&&$match_flv) {$ok1=1;}
		if(($mimetype2== "application/xml")&&$match_transl) {$ok2=1;}
		if(($mimetype3== "application/xml")&&$match_transc) {$ok3=1;}
		for($x=0;$x<21;$x++){
			if($temp_cue[$x]){
				if(($mimetype_cue[$x]=="video/mp4")&&$match_cue[$x]){ $ok4[$x]=1; }
			}
		}
		
	}
	
	//Exit if not validated
	if($temp_flv&&$temp_transl&&$temp_transc){
		if ((0 < $_FILES['flv_file']['error']))//||($uploaded_size_flv > 30000000)
		{
			echo "<br /><br /><br /><br /><div align=\"center\">Your flv file is too large</div>";
			echo "<div align=\"center\">Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
			$ok=0;
			exit();
		}
		elseif ((0 < $_FILES['xml_transl_subtitles']['error'])||($uploaded_size_transl > 1500000))
		{
			echo "<br /><br /><br /><br /><div align=\"center\">Your translation xml file is too large</div>";
			echo "<div align=\"center\">Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
			$ok=0;
			exit();
		}elseif ((0 < $_FILES['xml_transl_subtitles']['error'])||($uploaded_size_transc > 1500000))
		{
			echo "<br /><br /><br /><br /><div align=\"center\">Your transcript xml file is too large</div>";
			echo "<div align=\"center\">Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
			$ok=0;
			exit();
		}
	}else{
			echo "<br /><br /><br /><br /><div align=\"center\">Some of the upload files were not selected</div>";
			echo "<div align=\"center\">Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
			$ok=0;
			exit();
	}
	
	for($x=0;$x<21;$x++){
		if($temp_cue[$x]){
			if ((0 < $_FILES['flv_file']['error'])||($uploaded_size_cue[$x] > 10000000))
			{
				echo "<br /><br /><br /><br /><div align=\"center\">One of the mp4 files is too large</div>";
				echo "<div align=\"center\">Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
				$ok4[$x]=0;
				exit();
			}
		}
	}

	if ($ok5==0)
	{
	echo "<br /><br /><br /><br /><br /><div align=\"center\">Sorry the video number can only consist of digits.<br />Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
	exit();
	}
	/*if ($ok1==0||$ok2==0||$ok3==0)
	{
	//echo "<br /><br /><br /><br /><br /><div align=\"center\">Sorry your file was not uploaded.<br /> You tried to upload a file with the wrong file type or didn't follow the naming convention.
	echo "<br /><br /><br /><br /><br /><div align=\"center\">Sorry your file was not uploaded.<br /> You tried to upload a file with the wrong file type.
	<br />Please try again.  <a href=\"javascript:history.back();\">Click here.</a></b></div>";
	exit();
	}*/
	
	//If everything is ok we try to upload it
	//if($ok1==1&&$ok2==1&&$ok3==1){
	if($ok1&&$ok2&&$ok3){
		$uploadfile="../videos/flv/".$vid_num.".flv" ;
		$result_upload_flv=move_uploaded_file($_FILES['flv_file']['tmp_name'], $uploadfile);
		chmod ("../videos/flv/".$vid_num.".flv", 0777); 
		$uploadfile="../subtitles/".$vid_num."_translation.xml" ;
		$result_upload_transl=move_uploaded_file($_FILES['xml_transl_subtitles']['tmp_name'], $uploadfile);
		chmod ("../subtitles/".$vid_num."_translation.xml", 0777); 
		$uploadfile="../subtitles/".$vid_num."_transcript.xml" ;
		$result_upload_transc=move_uploaded_file($_FILES['xml_transc_subtitles']['tmp_name'], $uploadfile);
		chmod ("../subtitles/".$vid_num."_transcript.xml", 0777); 
		$str_page= '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">'."\n".
					'<head>'."\n".
					'<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'."\n".
					'<title>COERLL Flash Player</title>'."\n".
					'<script src="../javascript/AC_RunActiveContent.js" language="javascript"></script>'."\n".
					'<script src="../javascript/video.js" language="javascript"></script>'."\n".
					'<script src="../javascript/swfobject.js" language="javascript"></script>'."\n".
					'<link href="../css/style.css" rel="stylesheet" />'."\n".
					'</head>'."\n".
					'<body onLoad="load_video();">'."\n".
					'<div id="video"></div>'."\n".
					'<p id="spacer"></p>'."\n".
					'<div id="footer"><a rel="license" class="cc-license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png"></a> <a href="http://coerll.la.utexas.edu/coerll/" target="_blank">COERLL</a> &bull; <a href="http://www.utexas.edu/cola/depts/spanish/" target="_blank">Dept of Spanish and Portuguese</a> &bull; <a href="http://www.utexas.edu" target="_blank">Unversity of Texas at Austin</a></div>'."\n".
					'</body>'."\n".
					'</html>';		
		
		$web_name=$vid_num.".html";
		$fhandle=fopen("../webpages/".$web_name,'w');
		fwrite($fhandle, $str_page);
		fclose($fhandle);
		
	}
	$result_upload_mp4[0]='';
	for($x=0;$x<21;$x++){
		if($temp_cue[$x]){
			if($ok4[$x]){ 
				$uploadfile="../videos/mp4/".$vid_num."_".$filename_cue[$x];
				$result_upload_mp4[$x]=move_uploaded_file($_FILES['xml_video'.$x.'_cue']['tmp_name'], $uploadfile);
			}else{
				$result_upload_mp4[$x]=0;
			}
		}
	}
	
	//write xml popup data file
	$str_cue='<?xml version="1.0" encoding="iso-8859-1"?>'."\n".'<captions>'."\n";
	
	for($x=0;$x<21;$x++){
		if($filename_cue[$x]){
			if($temp_btn[$x]&&$temp_btn_txt[$x]&&$temp_time[$x]){
			$quotes='"';
				$btn_num=($x%2)+1;
				$track=$x+1;
					
				$str_cue.="<p begin=".$quotes.$_POST['xml_video'.$x.'_time'].$quotes;
				$str_cue.=" video=".$quotes.$vid_num."_".$filename_cue[$x].$quotes;
				$str_cue.=" button=".$quotes.$btn_num.$quotes;
				$str_cue.=" color=".$quotes.$_POST['xml_video'.$x.'_btn'].$quotes;
				$str_cue.=" track=".$quotes.$track.$quotes.">";
				$str_cue.=$_POST['xml_video'.$x.'_btn_txt']."</p>"."\n";
				$mp4_file_success=1;
		
			}else{
	
				echo "<br /><br /><br /><br /><br /><div align=\"center\">Sorry your file was not uploaded.
				<br />You did not submit all required fields for the MP4 upload
				<br />Please try again.  <a href=\"javascript:history.back();\">Click here.</a></div>";exit();
			}	
		}
		
	}

	$str_cue.="\n"."</captions>";
	$fname=$vid_num."_buttonText.xml";
	
	if($filename_cue[0]){
		$fhandle=fopen("../popup_annotation/".$fname,'w');
		fwrite($fhandle, $str_cue);
		fclose($fhandle);
	}
		


//verification of file upload
if($result_upload_flv){
	echo "<br /><br /><br /><br /><br /><br /><div align=\"center\">Congrats. Your <strong>flv main video</strong> video file <strong>WAS UPLOADED</strong>.<br />";
}




if($result_upload_transl){
	echo "<br /><div align=\"center\">Congrats. Your <strong>xml translation</strong> file <strong>WAS UPLOADED</strong>.<br />";
}


if($result_upload_transc){
	echo "<br /><div align=\"center\">Congrats. Your <strong>xml transcript</strong> file <strong>WAS UPLOADED</strong>.";
}

if((in_array("0",$result_upload_mp4))||($result_upload_mp4[0]=='')){
		echo "<br /><br /><div align=\"center\"><strong>NO mp4 popup video files</strong> were uploaded</strong>.";

}else{
	echo "<br /><div align=\"center\">Congrats. Your <strong>mp4 popup video files</strong> <strong>WERE UPLOADED</strong>.<br />";
}

print 	"<br /><br />Check your<strong> new video page</strong> here :<a href=\"../webpages/$web_name\" target='_blank'><input type='button' value='".$web_name."' /></a>
				<br /><br /><br /><br /><br /><a href=\"upload.php\">  Click here to upload more</a>
				<br /><br /><a href=\"index.php\"><< BACK to ADMIN START PAGE </a>
				</div>";

		
}


////////////////////////////////////////////////////////////////////////
//PLAYER BUTTONS - CONFIGURATION
if(isset($_POST['configuration'])){
	$transl_btn=isset($_POST['transl_btn'])?$_POST['transl_btn']:0;
	$transc_btn=isset($_POST['transc_btn'])?$_POST['transc_btn']:0;
	
	if($transl_btn){
		if(strlen($transl_btn)>3){
			echo "<br /><br /><br /><br /><div align=\"center\">The button text can't consist of more than 3 characters</div>";
			echo "<div align=\"center\"><a href=\"configuration.php\"> Please try again. Click here.</a></b></div>";
			$ok=0;
			exit();
		}elseif(preg_match('/(\d+?)/',$transl_btn)){
			echo "<br /><br /><br /><br /><div align=\"center\">The button text can only consist of characters.</div>";
			echo "<div align=\"center\"><a href=\"configuration.php\"> Please try again. Click here.</a></b></div>";
			$ok=0;
			exit();
		}
	}
	
	if($transc_btn){
		if(strlen($transc_btn)>3){
			echo "<br /><br /><br /><br /><div align=\"center\">The button text can't consist of more than 3 characters</div>";
			echo "<div align=\"center\"><a href=\"configuration.php\"> Please try again. Click here.</a></b></div>";
			$ok=0;
			exit();
		}elseif(preg_match('/(\d+?)/',$transc_btn)){
			echo "<br /><br /><br /><br /><div align=\"center\">The button text can only consist of characters.</div>";
			echo "<div align=\"center\"><a href=\"configuration.php\"> Please try again. Click here.</a></b></div>";
			$ok=0;
			exit();
		}
	}
	
	
	
	if(($transl_btn)&&($transc_btn)){
		$button_txt="var1=$transl_btn&var2=$transc_btn&status=ok";
		$bhandle=fopen("../button_label/button_labels.txt",'w');
		$result_button=fwrite($bhandle, $button_txt);
		fclose($bhandle);
	}else{
		echo "<div align=\"center\">You forgot to submit one of the button texts.<br /><a href=\"javascript:history.back();\"> Please  click here and try again. Click here.</a></div>";exit();
	}
	
if($result_button){
	echo "<br /><br /><br /><br /><br /><div align=\"center\">The button labels of the player were changed.
	<br /><br /><a href=\"javascript:history.back();\">Click here</a> to change the button text again
	<br /><br />
	<br /><br /><a href=\"index.php\"><< BACK to ADMIN START PAGE </a></div>";
}else{
	echo "<div align=\"center\">You forgot to submit one of the button texts.<br /><a href=\"javascript:history.back();\"> Please  click here and try again. Click here.</a></div>";exit();
}
	
}


?>
