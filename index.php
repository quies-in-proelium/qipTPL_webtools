<?php $pageTitle = "Briefing Code Generator"; ?>

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

			<p>Complete the form below and click GENERATE BRIEFING CODE to generate the correct SQF code. Type normally - the following will happen when the SQF code is generated:</p>

			<ul>
				<li>Tags for new and blank lines are automatically inserted.</li>
				<li>Doublequotes are automatically converted to single quotes.</li>
			</ul>

			<p>All fields are optional. Tabs or sub-sections left blank will be omitted from the generated SQF code.</p>

			<div class="briefingForm">

				<form method="post" action="">

					<fieldset>
						<legend align="left">Mission Tab</legend>

							<label for="mission">Mission</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(mission);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_mission');" /><br/>
							<textarea name="mission" id="mission" rows="2"></textarea>
							<br/>
							<p class="help" id="help_mission">The words on this tab must convey the primary objective of the mission (and no more) in the most concise manner possible. For simple missions, aim for a single sentence. Example: <em>Recapture the outpost at Camp Rogain.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Situation Tab</legend>

							<label for="situ_overall">Situation</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(situ_overall);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_situ_overall');" /><br/>
							<textarea name="situ_overall" id="situ_overall" rows="2"></textarea>
							<br/>
							<p class="help" id="help_situ_overall">An opening paragraph conveys the essence of the situation. Try using two sentences: the first for the broader context (e.g. theatre level), the second for the local situation. Example: <em>At the height of the war, the island of Stratis is the focus of heavy fighting. The outpost at Camp Rogain has recently fallen to NATO forces.</em></p>

							<label for="situ_enemy">Enemy Forces</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(situ_enemy);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_situ_enemy');" /><br/>
							<textarea name="situ_enemy" id="situ_enemy" rows="2"></textarea>
							<br/>
							<p class="help" id="help_situ_enemy">Provide the CO with key information about the enemy: type, strength, armaments and position. You don't need to be exhaustive, or even wholly accurate; you can also use linked map markers. Example: <em>A platoon of NATO regulars, supported by a single tank, is dug in at Camp Rogain. Other NATO troops are patrolling the countryside to the south.</em></p>

							<label for="situ_friendly">Friendly Forces</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(situ_friendly);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_situ_friendly');" /><br/>
							<textarea name="situ_friendly" id="situ_friendly" rows="2"></textarea>
							<br/>
							<p class="help" id="help_situ_friendly">Provide the CO with a guide to any friendly, non-playable units in the AO (area of operations, where the mission takes place): type, strength, armaments and position. Again, linked markers are helpful here; you can also be more accurate and indicate their orders. If no friendly forces are present, don't use this sub-section. Example: <em>A company of CSAT troops has captured the airbase on the west of Stratis, but is low on fuel and immobile.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Credits Tab</legend>

							<label for="credits">Credits</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(credits);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_credits');" /><br/>
							<textarea name="credits" id="credits" rows="2"></textarea>
							<br/>
							<p class="help" id="help_credits">This is where you might want to add your own nick, and acknowledge everyone who helped you make the mission. Example: <em>Made with love for Community X by Y.</em></p>


					</fieldset>

					<input type="submit" value="Generate Briefing Code" class="formButton">

				</form>

			</div>

			<?php } else {

				$situ_overall = $_POST["situ_overall"];
				$situ_friendly = $_POST["situ_friendly"];
				$situ_enemy = $_POST["situ_enemy"];
				$mission = $_POST["mission"];
				$credits = $_POST["credits"];

				include("inc/fnc_clean.php");

				$situ_overall = clean($situ_overall);
				$situ_friendly = clean($situ_friendly);
				$situ_enemy = clean($situ_enemy);
				$mission = clean($mission);
				$credits = clean($credits);

            } ?>

<?php
$briefing = <<<'CONTENT'
CONTENT;

if ($mission != "") {
    $briefing .= <<<CONTENT
// ====================================================================================

// NOTES: MISSION
// The code below creates the mission sub-section of notes.

_mis = player createDiaryRecord ["diary", ["Mission","
$mission
"]];
CONTENT;
}

if ($situ_overall != "" OR $situ_enemy != "" OR $situ_friendly != "") {
    $briefing .= <<<CONTENT


// ====================================================================================

// NOTES: SITUATION
// The code below creates the situation sub-section of notes.

_sit = player createDiaryRecord ["diary", ["Situation","

CONTENT;

    if ($situ_overall != "") {
        $briefing .= <<<CONTENT
$situ_overall
&lt;br/&gt;
CONTENT;
    }

    if ($situ_enemy != "") {
        $briefing .= <<<CONTENT
&lt;br/&gt;
&lt;font size='18'&gt;ENEMY FORCES&lt;/font&gt;&lt;br/&gt;
$situ_enemy
&lt;br/&gt;
CONTENT;
    }
    if ($situ_friendly != "") {
        $briefing .= <<<CONTENT
&lt;br/&gt;
&lt;font size='18'&gt;FRIENDLY FORCES&lt;/font&gt;&lt;br/&gt;
$situ_friendly
CONTENT;
    }
    $briefing .= <<<CONTENT
&lt;br/&gt;
"]];
CONTENT;
}


if ($credits != "") {
    $briefing .= <<<CONTENT


// ====================================================================================

// NOTES: CREDITS
// The code below creates the administration sub-section of notes.

_cre = player createDiaryRecord ["diary", ["Credits","
$credits
&lt;br/&gt;
&lt;br/&gt;
Made with qipTPL Webtools (a modified version of F3 Webtools)
"]];
CONTENT;
}

?>


<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {?>

<!-- <form method="POST" action="createfile.php"> -->
<!--     <input type="hidden" name="briefing" value='<?php echo $briefing;?>'/> -->
<!--     <input type="submit" name="download" value="submit"/> -->
<!-- </form> -->

<p>Use the code below to replace ALL the code in the file: <strong>qipTPL/config/briefing.sqf</strong></p>
<pre class="all-copy">
<?php echo $briefing;?>
</pre>
<?php } ?>

		</div>

		<!-- NOTE: The footer is an include file. -->
		<?php include("inc/footer.php") ?>

	</body>
</html>
