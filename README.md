Captioned-Pop-Up-Commentary-Flash-Player
========================================

A COERLL flash player template to be used with two language captions and pop up commentary


INSTALLATION & FILE SETUP:
========================================

1. Extract zip archive and copy/move content with or without folder to your web server

2. Make the /videos/flv/ folder writable

3. Main video setup (1 video per page)
	1. file name: e.g. 01.flv (zero-padded 2 digit file name)
	2. file folder: /videos/flv/
	3. file extension: .flv
	4. video dimensions: 338 x 507 (custom size, all other sizes will still play, but may be distorted)
	5. Possible ways to create a flv file from mp4
		MAC: 
		Adobe Media Encoder 
		ffmpegx (use video tab instructions)
		PC: 
		Adobe Media Encoder (used to ship with Adobe CS4, now sold separately) 
		AVS video converter

4. Popup videos (unlimited number of popup video files)
	1. file name: filename1.mp4, filename2.mp4, filename3.mp4, etc.
	2. file folder: /videos/mp4/
	3. file format: mp4 video with H.264 encoding
	4. file extension: .mp4
	5. video dimensions: 262 x 350 (custom size, all other sizes will still play, but may be distorted)

5. Subtitles (2 xml files required)
	1. file folder: /subtitles/
	2. file name: e.g. 01_translation.xml, 01_transcript.xml
	3. file format: file with Extensible Markup Language
	4. file extension: .xml
	5. Code format: Timed text XML code
	6. See samples code in /admin/upload.php or use subtitle-horse to create these xml files

6. Popup button & video info (1 xml file required)
	1. file location: /popup_annotation/
	2. file name: e.g. 01_buttonText.xml
	3. file format: file with Extensible Markup Language
	4. file extension: .xml
	5. Use popup upload wizard /admin/upload.php#popup_wizard to place videos and create xml file

7. Webpage
	1. file folder: /webpages/
	2. file name: e.g. 01.html (zero-padded 2 digit file name)
	3. file format: HTML webpage
	4. file extension: .html
	5. Configure Flash player language button labels