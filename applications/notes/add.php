<?php

	include_once('../simple_html_dom.php');

	if ($_POST["url"]) {
		
		$url = $_POST["url"];
		$dom = file_get_html($url);
		$title = trim(mb_substr($dom->find(('title'), 0)->innertext, 5));
		$title = ltrim($title , "|");
		$date = $dom->find(('em[id=post-date]'), 0)->innertext;
		$cover = $dom->find(('div[id=media]'), 0);
		
		if ($cover) {
			preg_match('/(?<=var cover = ")[\s\S]*?(?=")/', $cover->innertext , $img_url);
			$img = $img_url[0];
		} else {
			foreach ($dom->find('img') as $link) {
			
				$result = preg_match('/(?<=data-src=")[\s\S]*?(?=")/', $link , $img_url);
				if ($result) {
					$img = $img_url[0];break;
				}		
			}
		}
		$note_new = $date . "|" . $url . "|" . $title . "|" . $img ;
	}
	
	$notes = array();
	$i = 0; 	
 	$notes_file = fopen("notes.txt", "r") or die("Unable to open file!");
 	while (!feof($notes_file)) {
 		 		
 		 		$notes[$i] = rtrim(fgets($notes_file));
 		 		$note = explode('|', $notes[$i]);
 		 		
 		 		// check if post repeat
 		 		if ((trim($date) == trim($note[0]))&&(trim($title) == trim($note[2]))) {
 		 			
 		 			$repeat = true;
 		 		}
 		 		++$i;

 	}
 	fclose($notes_file);
 	array_pop($notes);

 	if (!empty($repeat)) {
 		echo "<tr><td>0</td><td>Error</td><td>The notes had posted! You don't need to post again!</td><tr>";
 	} else {
 		for ($i=0; $i < count($notes) ; $i++) { 
	 		$note = explode('|', $notes[$i]);
	 		if ($date < $note[0]) {
	 			$date = $note[0];
	 			$note_temp = $notes[$i];
	 			$notes[$i] = $note_new;
	 			$note_new = $note_temp;
	 		}
		}
		$notes[$i] = $note_new;
		$notes_file = fopen("notes.txt", "w");
		for ($i=0; $i < count($notes) ; $i++) { 
	 		fwrite($notes_file, $notes[$i] . "\n");
		}
		fclose($notes_file);
 	}

 	for ($i=count($notes)-1; $i >=0 ; $i--) { 
 		$note = explode('|', $notes[$i]);
 		$j = $i+1;
		echo "<tr><td>" . $j . "</td><td>" . $note[0] . "</td><td><a class =\"pure-button pure-u-1-1\" href=" . $note[1] . ">" . $note[2] . "</a></td><tr>";
 	}
?>