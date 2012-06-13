// JavaScript Document

function load_video()
{
	var s1 = new SWFObject('../flash_player/01.swf','video','570','400','9','#dae5eb');
	//s1.addParam('allowscriptaccess','always');
	s1.addParam('allowfullscreen','true');
	s1.addParam("wmode", "transparent");
	s1.write('video');
}