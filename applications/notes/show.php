<?php
	
	function notes_list()
	{
		if (file_exists('../applications/notes/notes.txt')) {
			
			$notes = array();
			$i = 0; 	
		 	$notes_file = fopen("../applications/notes/notes.txt", "r") or die("Unable to open file!");
		 	while (!feof($notes_file)) {
		 		 		
		 		 		$notes[$i] = fgets($notes_file);
		 		 		++$i;

 			}
 			array_pop($notes);
		 	for ($i=count($notes)-1; $i >=0 ; $i--) { 
		 		$note = explode('|', $notes[$i]);
		 		$j = $i+1;
		 		echo "<tr><td>" . $j . "</td><td>" . $note[0] . "</td><td><a class =\"pure-button pure-u-1-1\" href=" . $note[1] . ">" . $note[2] . "</a></td><tr>";
		 	}	 	
		 	fclose($notes_file);
		} else {
			echo "File not exists!";
		}
	}

	function notes_img_list()
	{
		if (file_exists('../applications/notes/notes.txt')) {
			
			$notes = array();
			$i = 0; 	
		 	$notes_file = fopen("../applications/notes/notes.txt", "r") or die("Unable to open file!");
		 	while (!feof($notes_file)) {
		 		 		
		 		 		$notes[$i] = fgets($notes_file);
		 		 		++$i;

 			}
 			array_pop($notes);
		 	for ($i=count($notes)-1; $i >=0 ; $i--) { 
		 		$note = explode('|', $notes[$i]);
		 		$j = $i+1;
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
		 	fclose($notes_file);
		} else {
			echo "File not exists!";
		}
	}
?>