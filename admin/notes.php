<?php include_once('header.php'); ?>

		<div class="content">
			<h2 class="content-subhead">This is a lecture notes manage page</h2>
			<p>
				Fill in a correct URL, please.
			</p>
			<form class="pure-form ">
				<fieldset>
						<label for="notes_url">Notes URL</label>
						<input class="pure-u-2-3" id="notes_url" type="text" placeholder="It likes'http://mp.weixin.qq.com/s?....'">

						<div class="pure-button pure-button-primary" onclick="show_notes()">Confirm</div>
				</fieldset>
			</form>
			<p>
				<strong>Notice:</strong> Downloading the picture will be completed in about one minute because the Wechat official limit.
			</p>
			<div id="posted-table pure-u-1">
				<table class="pure-table pure-table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>POSTED TIME</th>
							<th>URL</th>
						</tr>
					</thead>

					<tbody id="posted_notes" >
						<?php include_once('../applications/notes/show.php'); notes_list(); ?>
					</tbody>					
				</table>				
			</div>
		</div>
<script type="text/javascript" src="js/show_notes.js"></script>

<?php include_once('footer.php'); ?>