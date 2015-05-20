<?php 
/*
	if (file_exists('./applications/notes/text.txt')) {
			
		$notes = array();
		$i = 0; 	
	 	$notes_file = fopen("./applications/notes/text.txt", "r") or die("Unable to open file!");
	 	while (!feof($notes_file)) {
	 		 		
	 		 		$notes[$i] = fgets($notes_file);
	 		 		++$i;

			}
		fclose($notes_file);
			array_pop($notes);
	 	for ($i=count($notes)-1; $i >=0 ; $i--) { 
	 		$note = explode('|', $notes[$i]);
	 		$j = $i+1;
	 		preg_match('/(?<=mmbiz\/)[\s\S]*?(?=\/0)/' , $note[3] , $match);
	 		$filename = $match[0];
	 		$note[3] = '/stepwechat/img/' . $filename;
	 		//$note[3] = GrabImage($note[3] ,  $filename);
	 		$notes[$i] = $note[0] . "|" . $note[1] . "|" . $note[2] . "|" . $note[3] ;
	 		echo "	<div class=\"note_feed\">
		 				<div class=\"note_title\">
		 					<a href=\"" . $note[1] . "\">" . $note[2] . "</a>
		 				</div>
		 				<div class=\"note_date\">
		 					<p>" . $note[0] . "</p>
		 				</div>
		 				<div class=\"note_img\">
		 					<a href=\"" . $note[1] . "\"><img width=100% src=\"" . $note[3] . "\"></a>
		 				</div>
	 				</div>";
	 	}
	 	$notes_file = fopen("./applications/notes/text.txt", "w");
		for ($i=0; $i < count($notes) ; $i++) { 
	 		fwrite($notes_file, $notes[$i] . "\n");
		}
		fclose($notes_file);
	} else {
		echo "File not exists!";
	}
*/
	$url = 'http://mmbiz.qpic.cn/mmbiz/swfZZx4m7zDzRv7oxkA7cNhtYhV92U1jmiaSAGQlNxOr89v6qbsppMpeMY2icNmTobhWzvmYmFUUBdZtabeI3xIQ/0';
	preg_match('/(?<=mmbiz\/)[\s\S]*?(?=\/0)/' , $url , $match);
	$filename = $match[0];
	echo GrabImage($url ,  $filename);
	/** 
	 * 通过图片的远程url，下载到本地 
	 * @param: $url为图片远程链接 
	 * @param: $filename为下载图片后保存的文件名 
	 */ 
	function GrabImage($url,$filename) {  
	 if($url==""):return false;endif;  
	 ob_start();  
	 readfile($url);  
	 $img = ob_get_contents();  
	 ob_end_clean();  
	 $size = strlen($img);  
	 //"./img/"为存储目录，$filename为文件名 
	 $fp2=@fopen("./img/".$filename, "a");  
	 fwrite($fp2,$img);  
	 fclose($fp2);  
	 return '/stepwechat/img/' . $filename;  
	 }  
 ?>