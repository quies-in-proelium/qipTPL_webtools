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

				<form method="post" action="index.php">

					<fieldset>
						<legend align="left">General</legend>	

							<label for="faction">Faction</label><br/>
							<select name="faction" id="faction">
								<optgroup label="BLUFOR">
									<option value="NATO">NATO</option>
									<option value="FIA">FIA</option>
								</optgroup>
								<optgroup label="INDFOR">
									<option value="AAF">AAF</option>
								</optgroup>
								<optgroup label="OPFOR">
									<option value="CSAT">CSAT</option>
								</optgroup>
								<optgroup label="CIVILIAN">
									<option value="CIV">CIV</option>
								</optgroup>
							</select>

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
						<legend align="left">Mission Tab</legend>	

							<label for="mission">Mission</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(mission);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_mission');" /><br/>
							<textarea name="mission" id="mission" rows="2"></textarea>
							<br/>
							<p class="help" id="help_mission">The words on this tab must convey the primary objective of the mission (and no more) in the most concise manner possible. For simple missions, aim for a single sentence. Example: <em>Recapture the outpost at Camp Rogain.</em></p>

					</fieldset>

					<fieldset>
						<legend align="left">Execution Tab</legend>	

							<label for="exec_intent">Commander's Intent</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(exec_intent);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_exec_intent');" /><br/>
							<textarea name="exec_intent" id="exec_intent" rows="2"></textarea>
							<br/>
							<p class="help" id="help_exec_intent">Provide the players with an idea of how they should aim to complete the mission. Example: <em>Suppress the enemy position with smoke and grenade fire before assaulting it.</em></p>


							<label for="exec_movement">Movement Plan</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(exec_movement);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_exec_movement');" /><br/>
							<textarea name="exec_movement" id="exec_movement" rows="2"></textarea>
							<br/>
							<p class="help" id="help_exec_movement">Outline any specific orders for moving the players around the map. Example: <em>All infantry squads move by truck to the road north of the camp, dismount and hold there until the enemy outpost has been suppressed, then assault the enemy positions directly (on foot).</em></p>


							<label for="exec_fire">Fire Support Plan</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(exec_fire);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_exec_fire');" /><br/>
							<textarea name="exec_fire" id="exec_fire" rows="2"></textarea>
							<br/>
							<p class="help" id="help_exec_fire">Identify any long range or artillery assets at the players' disposal (these could be player operated, or scripted). Example: <em>The CO can use his radio to request smoke rounds from the nearby firebase.</em></p>


							<label for="exec_special">Special Tasks</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(exec_special);" />
							<input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_exec_special');" /><br/>
							<textarea name="exec_special" id="exec_special" rows="2"></textarea>
							<br/>
							<p class="help" id="help_exec_special">Outline any specific actions the players must perform. Example: <em>Destroy the enemy tank using AT rocket fire.</em></p>


					</fieldset>

					<fieldset>
						<legend align="left">Administration Tab</legend>	

							<label for="admin">Administration</label><br/>
							<input type="button" value="Link Marker" class="formatter" onclick="insertAtCursor(admin);" /><input type="button" value="Toggle Help" class="formatter" onclick="toggle_visibility('help_admin');" /><br/>
							<textarea name="admin" id="admin" rows="2"></textarea>
							<br/>
							<p class="help" id="help_admin">There are no pre-defined sub-headings for this tab, but commonly covered topics include vehicles and special equipment (or lack thereof). Example (remember to include the font tags to correctly style sub-headings): <br/><br/><em>&lt;font size='18'&gt;VEHICLES&lt;/font&gt;<br/>
Each squad begins pre-mounted in a truck. CO, DC and attachments begin pre-mounted in their own trucks.
<br/><br/>
&lt;font size='18'&gt;SMOKE ROUNDS&lt;/font&gt;<br/>
All SLs and FTLs have been issued with extra smoke rounds for their UGLs.</em></p>


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

				$faction = $_POST["faction"];
				$situ_overall = $_POST["situ_overall"];
				$situ_friendly = $_POST["situ_friendly"];
				$situ_enemy = $_POST["situ_enemy"];
				$mission = $_POST["mission"];
				$exec_intent = $_POST["exec_intent"];
				$exec_movement = $_POST["exec_movement"];
				$exec_fire = $_POST["exec_fire"];
				$exec_special = $_POST["exec_special"];
				$admin = $_POST["admin"];
				$credits = $_POST["credits"];

				include("inc/fnc_clean.php");

				$situ_overall = clean ($situ_overall);
				$situ_friendly = clean ($situ_friendly);
				$situ_enemy = clean ($situ_enemy);
				$mission = clean ($mission);
				$exec_intent = clean ($exec_intent);
				$exec_movement = clean ($exec_movement);
				$exec_fire = clean ($exec_fire);
				$exec_special = clean ($exec_special);
				$admin = clean ($admin);
				$credits = clean ($credits);

				?>

<p>Use the code below to replace ALL the code in the file: <strong>f/briefing/f_briefing_<?php echo strtolower($faction); ?>.sqf</strong></p>

<pre>

// F3 - Briefing
// Credits: Please see the F3 online manual (http://www.ferstaberinde.com/f3/en/)
// ====================================================================================

// FACTION: <?php echo $faction . "\n"; ?>

// ====================================================================================

// TASKS
// The code below creates tasks. Two (commented-out) sample tasks are included.
// Note: tasks should be entered into this file in reverse order.

// _task2 = player createSimpleTask ["OBJ_2"];
// _task2 setSimpleTaskDescription ["IN DEPTH OBJECTIVE DESCRIPTION", "SHORT OBJECTIVE DESCRIPTION", "WAYPOINT TEXT"];
// _task2 setSimpleTaskDestination WAYPOINTLOCATION;
// _task2 setTaskState "Created";

// _task1 = player createSimpleTask ["OBJ_1"];
// _task1 setSimpleTaskDescription ["IN DEPTH OBJECTIVE DESCRIPTION", "SHORT OBJECTIVE DESCRIPTION", "WAYPOINT TEXT"];
// _task1 setSimpleTaskDestination WAYPOINTLOCATION;
// _task1 setTaskState "Created";

<?php if ($credits != "") { ?>
// ====================================================================================

// NOTES: CREDITS
// The code below creates the administration sub-section of notes.

_cre = player createDiaryRecord ["diary", ["Credits","
&lt;br/&gt;
<?php echo stripslashes($credits) . "\n"; ?>
&lt;br/&gt;&lt;br/&gt;
Made with F3 (http://www.ferstaberinde.com/f3/en/)
"]];
<?php } ?>

<?php if ($admin != "") { ?>
// ====================================================================================

// NOTES: ADMINISTRATION
// The code below creates the administration sub-section of notes.

_adm = player createDiaryRecord ["diary", ["Administration","
&lt;br/&gt;
<?php echo stripslashes($admin) . "\n"; ?>
"]];
<?php } ?>

<?php if ($exec_intent != "" OR $exec_movement != "" OR $exec_fire != "" OR $exec_special != "") { ?>
// ====================================================================================

// NOTES: EXECUTION
// The code below creates the execution sub-section of notes.

_exe = player createDiaryRecord ["diary", ["Execution","
<?php if ($exec_intent != "") { ?>
&lt;br/&gt;
&lt;font size='18'&gt;COMMANDER'S INTENT&lt;/font&gt;
&lt;br/&gt;
<?php echo stripslashes($exec_intent) . "\n"; ?>
<?php } ?>
<?php if ($exec_movement != "") { ?>
&lt;br/&gt;&lt;br/&gt;
&lt;font size='18'&gt;MOVEMENT PLAN&lt;/font&gt;
&lt;br/&gt;
<?php echo stripslashes($exec_movement) . "\n"; ?>
<?php } ?>
<?php if ($exec_fire != "") { ?>
&lt;br/&gt;&lt;br/&gt;
&lt;font size='18'&gt;FIRE SUPPORT PLAN&lt;/font&gt;
&lt;br/&gt;
<?php echo stripslashes($exec_fire) . "\n"; ?>
<?php } ?>
<?php if ($exec_special != "") { ?>
&lt;br/&gt;&lt;br/&gt;
&lt;font size='18'&gt;SPECIAL TASKS&lt;/font&gt;
&lt;br/&gt;
<?php echo stripslashes($exec_special) . "\n"; ?>
<?php } ?>
"]];
<?php } ?>

<?php if ($mission != "") { ?>
// ====================================================================================

// NOTES: MISSION
// The code below creates the mission sub-section of notes.

_mis = player createDiaryRecord ["diary", ["Mission","
&lt;br/&gt;
<?php echo stripslashes($mission) . "\n"; ?>
"]];
<?php } ?>

<?php if ($situ_overall != "" OR $situ_enemy != "" OR $situ_friendly != "") { ?>
// ====================================================================================

// NOTES: SITUATION
// The code below creates the situation sub-section of notes.

_sit = player createDiaryRecord ["diary", ["Situation","
<?php if ($situ_overall != "") { ?>
&lt;br/&gt;
<?php echo stripslashes($situ_overall) . "\n"; ?>
<?php } ?>
<?php if ($situ_enemy != "") { ?>
&lt;br/&gt;&lt;br/&gt;
&lt;font size='18'&gt;ENEMY FORCES&lt;/font&gt;
&lt;br/&gt;
<?php echo stripslashes($situ_enemy) . "\n"; ?>
<?php } ?>
<?php if ($situ_friendly != "") { ?>
&lt;br/&gt;&lt;br/&gt;
&lt;font size='18'&gt;FRIENDLY FORCES&lt;/font&gt;
&lt;br/&gt;
<?php echo stripslashes($situ_friendly) . "\n"; ?>
<?php } ?>
"]];
<?php } ?>

// ====================================================================================
</pre>

			<?php } ?>

		</div>
		
		<!-- NOTE: The footer is an include file. -->
		<?php include("inc/footer.php") ?>

	</body>
</html>