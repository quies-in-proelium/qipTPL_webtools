<?php $pageTitle = "Debriefings Code Generator"; ?>

<!DOCTYPE html>
<html>
	
	<!-- NOTE: The head is an include file. -->
	<?php include("inc/head.php") ?>

	<body> 
		
		<!-- NOTE: The header is an include file. -->
		<?php include("inc/header.php") ?>
		
		<!-- NOTE: The wrapper div is centered via CSS. -->
		<div id="wrapper">

			<h2><?php echo $pageTitle; ?></h2>

			<?php
			if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>

			<script type="text/javascript"> 
			// Author: http://alexking.org/blog/2003/06/02/inserting-at-the-cursor-using-javascript
			// Modified so it's safe across browser windows
			// Modified again to support this page (a web-editor for Arma 3 briefing files in F3)
			function insertAtCursor(myField) {
			  
			  var linkText = prompt('Enter the word(s) to link:','');
			  var markerName = prompt('Enter the name of the marker:','');

			  var doc = myField.ownerDocument;
			  //IE support
			  if (doc.selection) {
			    myField.focus();
			    sel = doc.selection.createRange();
			    sel.text = myValue;
			  }
			  //FF, hopefully others
			  else if (myField.selectionStart || myField.selectionStart == '0') {
			    var startPos = myField.selectionStart;
			    var endPos = myField.selectionEnd;
			    myField.value = myField.value.substring(0, startPos) + "<marker name = '" + markerName + "'>" + linkText + "</marker>"
			    				+ myField.value.substring(endPos, myField.value.length);
			  } 
			  // fallback to appending it to the field
			  else {
			    myField.value += myValue;
			  }
			}
			</script>

			<script type="text/javascript">
			// Author: Arvind Satyanarayan (http://blog.movalog.com/a/javascript-toggle-visibility/)
			<!--
			    function toggle_visibility(id) {
			       var e = document.getElementById(id);
			       if(e.style.display == 'block')
			          e.style.display = 'none';
			       else
			          e.style.display = 'block';
			    }
			//-->
			</script>

			<p>Complete the form below and click GENERATE DEBRIEFNGS CODE to generate the correct SQF code. Type normally - the following will happen when the SQF code is generated:</p>

			<ul>
				<li>Tags for new and blank lines are automatically inserted.</li>
				<li>Doublequotes are automatically converted to single quotes.</li>
			</ul>

			<p>All fields are optional. Endings left totally blank will be omitted from the generated SQF code.</p>

			<div class="briefingForm">

				<form method="post" action="debriefings.php">

					<fieldset>
						<legend align="left">Ending #1</legend>	

							<label for="end1_title">Title</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end1_title');" /><br/>
							<input type="text" name="end1_title" id="end1_title"></textarea>
							<br/>
							<p class="help" id="help_end1_title">Keep it short and direct. Example: <em>NATO Victory</em></p>

							<label for="end1_desc">Description</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end1_desc');" /><br/>
							<textarea name="end1_desc" id="end1_desc" rows="2"></textarea>
							<br/>
							<p class="help" id="help_end1_desc">Provide the player with a concise ending to the story of the mission. Example: <em>The enemy has been routed and your unit is being rotated back to the world.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Ending #2</legend>	

							<label for="end2_title">Title</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end2_title');" /><br/>
							<input type="text" name="end2_title" id="end2_title"></textarea>
							<br/>
							<p class="help" id="help_end2_title">Keep it short and direct. Example: <em>NATO Victory</em></p>

							<label for="end2_desc">Description</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end2_desc');" /><br/>
							<textarea name="end2_desc" id="end2_desc" rows="2"></textarea>
							<br/>
							<p class="help" id="help_end2_desc">Provide the player with a concise ending to the story of the mission. Example: <em>The enemy has been routed and your unit is being rotated back to the world.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Ending #3</legend>	

							<label for="end3_title">Title</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end3_title');" /><br/>
							<input type="text" name="end3_title" id="end3_title"></textarea>
							<br/>
							<p class="help" id="help_end3_title">Keep it short and direct. Example: <em>NATO Victory</em></p>

							<label for="end3_desc">Description</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end3_desc');" /><br/>
							<textarea name="end3_desc" id="end3_desc" rows="2"></textarea>
							<br/>
							<p class="help" id="help_end3_desc">Provide the player with a concise ending to the story of the mission. Example: <em>The enemy has been routed and your unit is being rotated back to the world.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Ending #4</legend>	

							<label for="end4_title">Title</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end4_title');" /><br/>
							<input type="text" name="end4_title" id="end4_title"></textarea>
							<br/>
							<p class="help" id="help_end4_title">Keep it short and direct. Example: <em>NATO Victory</em></p>

							<label for="end4_desc">Description</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end4_desc');" /><br/>
							<textarea name="end4_desc" id="end4_desc" rows="2"></textarea>
							<br/>
							<p class="help" id="help_end4_desc">Provide the player with a concise ending to the story of the mission. Example: <em>The enemy has been routed and your unit is being rotated back to the world.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Ending #5</legend>	

							<label for="end5_title">Title</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end5_title');" /><br/>
							<input type="text" name="end5_title" id="end5_title"></textarea>
							<br/>
							<p class="help" id="help_end5_title">Keep it short and direct. Example: <em>NATO Victory</em></p>

							<label for="end5_desc">Description</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end5_desc');" /><br/>
							<textarea name="end5_desc" id="end5_desc" rows="2"></textarea>
							<br/>
							<p class="help" id="help_end5_desc">Provide the player with a concise ending to the story of the mission. Example: <em>The enemy has been routed and your unit is being rotated back to the world.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Ending #6</legend>	

							<label for="end6_title">Title</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end6_title');" /><br/>
							<input type="text" name="end6_title" id="end6_title"></textarea>
							<br/>
							<p class="help" id="help_end6_title">Keep it short and direct. Example: <em>NATO Victory</em></p>

							<label for="end6_desc">Description</label><br/>
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_end6_desc');" /><br/>
							<textarea name="end6_desc" id="end6_desc" rows="2"></textarea>
							<br/>
							<p class="help" id="help_end6_desc">Provide the player with a concise ending to the story of the mission. Example: <em>The enemy has been routed and your unit is being rotated back to the world.</em></p>

					</fieldset>

					<input type="submit" value="Generate Debriefings Code" class="formButton">
				
				</form>

			</div>

			<?php } else {

				$end1_title = $_POST["end1_title"];
				$end1_desc = $_POST["end1_desc"];
				$end2_title = $_POST["end2_title"];
				$end2_desc = $_POST["end2_desc"];
				$end3_title = $_POST["end3_title"];
				$end3_desc = $_POST["end3_desc"];
				$end4_title = $_POST["end4_title"];
				$end4_desc = $_POST["end4_desc"];
				$end5_title = $_POST["end5_title"];
				$end5_desc = $_POST["end5_desc"];
				$end6_title = $_POST["end6_title"];
				$end6_desc = $_POST["end6_desc"];

				include("inc/fnc_clean.php");

				$end1_title = clean ($end1_title);
				$end1_desc = clean ($end1_desc);
				$end2_title = clean ($end2_title);
				$end2_desc = clean ($end2_desc);
				$end3_title = clean ($end3_title);
				$end3_desc = clean ($end3_desc);
				$end4_title = clean ($end4_title);
				$end4_desc = clean ($end4_desc);
				$end5_title = clean ($end5_title);
				$end5_desc = clean ($end5_desc);
				$end6_title = clean ($end6_title);
				$end6_desc = clean ($end6_desc);

				?>

<p>Open the file <strong>description.ext</strong> and find this bloc of code:</p>

<pre>
// ============================================================================================

// F3 - Briefing Template
// Credits: BIS - Please see the F3 online manual (http://www.ferstaberinde.com/f3/en/)

class CfgDebriefing
{
	class End1
	{
		title = "Ending #1";
		subtitle = "";
		description = "*** Insert debriefing #1 here. ***";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};

	class End2
	{
		title = "Ending #2";
		subtitle = "";
		description = "*** Insert debriefing #2 here. ***";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};

	class End3
	{
		title = "Ending #3";
		subtitle = "";
		description = "*** Insert debriefing #3 here. ***";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};

	class End4
	{
		title = "Ending #4";
		subtitle = "";
		description = "*** Insert debriefing #4 here. ***";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};

	class End5
	{
		title = "Ending #5";
		subtitle = "";
		description = "*** Insert debriefing #5 here. ***";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};

	class End6
	{
		title = "Ending #6";
		subtitle = "";
		description = "*** Insert debriefing #6 here. ***";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};

};

// ============================================================================================
</pre>

<p>Use the code below to replace ALL everything in that bloc:</p>

<pre>
// ============================================================================================

// F3 - Briefing Template
// Credits: BIS - Please see the F3 online manual (http://www.ferstaberinde.com/f3/en/)

class CfgDebriefing
{
<?php if ($end1_title != "" OR $end1_desc != "") { ?>
	class End1
	{
		title = "<?php echo stripslashes($end1_title); ?>";
		subtitle = "";
		description = "<?php echo stripslashes($end1_desc); ?>";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};
<?php } ?>

<?php if ($end2_title != "" OR $end2_desc != "") { ?>
	class End2
	{
		title = "<?php echo stripslashes($end2_title); ?>";
		subtitle = "";
		description = "<?php echo stripslashes($end2_desc); ?>";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};
<?php } ?>

<?php if ($end3_title != "" OR $end3_desc != "") { ?>
	class End3
	{
		title = "<?php echo stripslashes($end3_title); ?>";
		subtitle = "";
		description = "<?php echo stripslashes($end3_desc); ?>";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};
<?php } ?>

<?php if ($end4_title != "" OR $end4_desc != "") { ?>
	class End4
	{
		title = "<?php echo stripslashes($end4_title); ?>";
		subtitle = "";
		description = "<?php echo stripslashes($end4_desc); ?>";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};
<?php } ?>

<?php if ($end5_title != "" OR $end5_desc != "") { ?>
	class End5
	{
		title = "<?php echo stripslashes($end5_title); ?>";
		subtitle = "";
		description = "<?php echo stripslashes($end5_desc); ?>";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};
<?php } ?>

<?php if ($end6_title != "" OR $end6_desc != "") { ?>
	class End6
	{
		title = "<?php echo stripslashes($end6_title); ?>";
		subtitle = "";
		description = "<?php echo stripslashes($end6_desc); ?>";
		// pictureBackground = "";
		// picture = "";
		// pictureColor[] = {0.0,0.3,0.6,1};
	};
<?php } ?>

};

// ====================================================================================
</pre>

			<?php } ?>

		</div>
		
		<!-- NOTE: The footer is an include file. -->
		<?php include("inc/footer.php") ?>

	</body>
</html>