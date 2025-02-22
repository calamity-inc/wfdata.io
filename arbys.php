<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Arbitration Schedule | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!--<link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Arby%27s_logo.svg/1200px-Arby%27s_logo.svg.png">-->
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
	<style>
		#log h3:not(:first-child)
		{
			margin-top: 1rem;
		}

		#log span, #log b
		{
			display: block;
			margin-bottom: 1px;
		}
	</style>
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="p-3">
		<p>
			The next <select id="select-days">
				<option value="1">24 hours</option>
				<option value="7">7 days</option>
				<option value="30" selected>30 days</option>
				<option value="90">90 days</option>
				<option value="365">12 months</option>
				<option value="9999999999">eon</option>
			</select> of arbitrations, in <select id="select-tz">
				<option id="local-time-option" value="local">local time</option>
				<option value="zulu">universal time (UTC+0)</option>
			</select>, using <select id="select-hourfmt">
				<option value="mil">military time</option>
				<option value="24">24-hour time</option>
				<option value="12">12-hour time</option>
			</select>.
		</p>
		<div class="row">
			<div id="log" class="col-xl-6 mb-3">
				<p>Loading, please wait...</p>
			</div>
			<div class="col-xl-6">
				<table class="table">
					<thead>
						<td></td>
						<th colspan="2">Next Occurrence</th>
					</thead>
					<tbody>
						<tr id="next-type-2"><th><input id="filter-type-2" type="checkbox" class="form-check-input" checked /> <label for="filter-type-2">Survival</label></th><td></td><td></td></tr>
						<tr id="next-type-8"><th><input id="filter-type-8" type="checkbox" class="form-check-input" checked /> <label for="filter-type-8">Defense</label></th><td></td><td></td></tr>
						<tr id="next-type-13"><th><input id="filter-type-13" type="checkbox" class="form-check-input" checked /> <label for="filter-type-13">Interception</label></th><td></td><td></td></tr>
						<tr id="next-type-17"><th><input id="filter-type-17" type="checkbox" class="form-check-input" checked /> <label for="filter-type-17">Excavation</label></th><td></td><td></td></tr>
						<tr id="next-type-21"><th><input id="filter-type-21" type="checkbox" class="form-check-input" checked /> <label for="filter-type-21">Infested Salvage</label></th><td></td><td></td></tr>
						<tr id="next-type-27"><th><input id="filter-type-27" type="checkbox" class="form-check-input" checked /> <label for="filter-type-27">Defection</label></th><td></td><td></td></tr>
						<tr id="next-type-33"><th><input id="filter-type-33" type="checkbox" class="form-check-input" checked /> <label for="filter-type-33">Disruption</label></th><td></td><td></td></tr>
						<tr id="next-type-34"><th><input id="filter-type-34" type="checkbox" class="form-check-input" checked /> <label for="filter-type-34">Void Flood</label></th><td></td><td></td></tr>
						<tr id="next-type-35"><th><input id="filter-type-35" type="checkbox" class="form-check-input" checked /> <label for="filter-type-35">Void Cascade</label></th><td></td><td></td></tr>
						<tr id="next-type-36"><th><input id="filter-type-36" type="checkbox" class="form-check-input" checked /> <label for="filter-type-36">Void Armageddon</label></th><td></td><td></td></tr>
						<tr id="next-type-38"><th><input id="filter-type-38" type="checkbox" class="form-check-input" checked /> <label for="filter-type-38">Alchemy</label></th><td></td><td></td></tr>
						<tr id="next-tier-S"><th><input id="filter-tier-S" type="checkbox" class="form-check-input" checked /> <label for="filter-tier-S">S Tier</label></th><td></td><td></td></tr>
						<tr id="next-tier-A"><th><input id="filter-tier-A" type="checkbox" class="form-check-input" checked /> <label for="filter-tier-A">A Tier</label></th><td></td><td></td></tr>
						<tr id="next-tier-B"><th><input id="filter-tier-B" type="checkbox" class="form-check-input" checked /> <label for="filter-tier-B">B Tier</label></th><td></td><td></td></tr>
						<tr id="next-tier-C"><th><input id="filter-tier-C" type="checkbox" class="form-check-input" checked /> <label for="filter-tier-C">C Tier</label></th><td></td><td></td></tr>
						<tr id="next-tier-D"><th><input id="filter-tier-D" type="checkbox" class="form-check-input" checked /> <label for="filter-tier-D">D Tier</label></th><td></td><td></td></tr>
						<tr id="next-tier-F"><th><input id="filter-tier-F" type="checkbox" class="form-check-input" checked /> <label for="filter-tier-F">F Tier</label></th><td></td><td></td></tr>
						<tr id="next-fc-0"><th><input id="filter-fc-0" type="checkbox" class="form-check-input" checked /> <label for="filter-fc-0">Grineer</label></th><td></td><td></td></tr>
						<tr id="next-fc-1"><th><input id="filter-fc-1" type="checkbox" class="form-check-input" checked /> <label for="filter-fc-1">Corpus</label></th><td></td><td></td></tr>
						<tr id="next-fc-2"><th><input id="filter-fc-2" type="checkbox" class="form-check-input" checked /> <label for="filter-fc-2">Infested</label></th><td></td><td></td></tr>
						<tr id="next-fc-3"><th><input id="filter-fc-3" type="checkbox" class="form-check-input" checked /> <label for="filter-fc-3">Corrupted</label></th><td></td><td></td></tr>
						<tr id="next-fc-7"><th><input id="filter-fc-7" type="checkbox" class="form-check-input" checked /> <label for="filter-fc-7">The Murmur</label></th><td></td><td></td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script src="supplemental-data/arbyTiers.js"></script>
	<script>
		const days = [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ];
		const months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];

		function loc(key)
		{
			return dict[key] ?? key;
		}

		function totwo(num)
		{
			if (num < 10)
			{
				return "0" + num;
			}
			return num;
		}

		function formattz(offset)
		{
			if (offset == 0)
			{
				return "UTC+0";
			}
			offset /= 60;
			if (offset < 0)
			{
				return "UTC+" + (offset * -1);
			}
			return "UTC-" + offset;
		}
		document.getElementById("local-time-option").textContent += " (" + formattz(new Date().getTimezoneOffset()) + ")";

		function formathour(hour)
		{
			switch (document.getElementById("select-hourfmt").value)
			{
			case "mil": default: // This is the default because it indicates when zulu time is used, making it easier to parse screenshots of the schedule.
				return totwo(hour) + "00" + (document.getElementById("select-tz").value == "zulu" ? "Z" : "");

			case "24":
				return totwo(hour) + ":00";

			case "12":
				return ((hour % 12) == 0 ? "12" : (hour % 12)) + (hour >= 12 ? "pm" : "am");
			}
		}

		const params = new URLSearchParams(location.hash.replace("#", ""));
		if (params.has("days"))
		{
			document.getElementById("select-days").value = params.get("days");
		}
		else if ("userAgentData" in navigator && navigator.userAgentData.mobile)
		{
			document.getElementById("select-days").value = 1;
		}
		if (params.has("tz"))
		{
			document.getElementById("select-tz").value = params.get("tz");
		}
		if (params.has("hourfmt"))
		{
			document.getElementById("select-hourfmt").value = params.get("hourfmt");
		}
		if (params.has("exclude"))
		{
			params.get("exclude").split(".").forEach(opt =>
			{
				const checkbox = document.getElementById("filter-" + opt);
				if (checkbox)
				{
					checkbox.checked = false;
				}
			});
		}

		Promise.all([
			getDictPromise(),
			fetch("https://browse.wf/warframe-public-export-plus/ExportRegions.json").then(res => res.json()),
			fetch("https://browse.wf/arbys.txt").then(res => res.text())
		]).then(([ dict, ExportRegions, arbys ]) => {
			window.dict = dict;
			window.ExportRegions = ExportRegions;
			window.arbys = arbys.split("\n").map(line => line.split(",")).filter(arr => arr.length == 2);
			onLanguageUpdate = function()
			{
				updateLog();
				updateFilterNamesForLocale();
			};
			onLanguageUpdate();
		});

		function updateFilterNamesForLocale()
		{
			document.querySelector("label[for=filter-type-2]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Survival"]);
			document.querySelector("label[for=filter-type-8]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Defense"]);
			document.querySelector("label[for=filter-type-13]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Territory"]);
			document.querySelector("label[for=filter-type-17]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Excavation"]);
			document.querySelector("label[for=filter-type-21]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Purify"]);
			document.querySelector("label[for=filter-type-27]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Evacuation"]);
			document.querySelector("label[for=filter-type-33]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Artifact"]);
			document.querySelector("label[for=filter-type-34]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Corruption"]);
			document.querySelector("label[for=filter-type-35]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_VoidCascade"]);
			document.querySelector("label[for=filter-type-36]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Armageddon"]);
			document.querySelector("label[for=filter-type-38]").textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_Alchemy"]);

			document.querySelector("label[for=filter-fc-0]").textContent = dict["/Lotus/Language/Game/Faction_GrineerUC"];
			document.querySelector("label[for=filter-fc-1]").textContent = dict["/Lotus/Language/Game/Faction_CorpusUC"];
			document.querySelector("label[for=filter-fc-2]").textContent = dict["/Lotus/Language/Game/Faction_InfestationUC"];
			document.querySelector("label[for=filter-fc-3]").textContent = dict["/Lotus/Language/Game/Faction_OrokinUC"];
			document.querySelector("label[for=filter-fc-7]").textContent = dict["/Lotus/Language/Game/Faction_MITW"];
		}

		function updateLog()
		{
			console.time("updateLog");

			const zulu = (document.getElementById("select-tz").value == "zulu");

			window.currentHour = Math.trunc(Date.now() / 3600000) * 3600;

			const epochHour = arbys[0][0];
			const currentHourIndex = (currentHour - epochHour) / 3600;

			// Update log
			const currentYear = zulu ? new Date().getUTCFullYear() : new Date().getFullYear();
			let remainingArbys = parseInt(document.getElementById("select-days").value) * 24;
			let lastArbyDay = -1;
			document.getElementById("log").innerHTML = "";
			for (let i = currentHourIndex; i != arbys.length && remainingArbys-- > 0; ++i)
			{
				const arr = arbys[i];

				const thisArbyGrade = (arbyTiers[arr[1]] ?? "F");
				if (!document.getElementById("filter-tier-" + thisArbyGrade).checked)
				{
					continue;
				}

				const node = ExportRegions[arr[1]];
				if (!document.getElementById("filter-type-" + node.missionIndex).checked
					|| !document.getElementById("filter-fc-" + node.factionIndex).checked
					)
				{
					continue;
				}

				const date = new Date(arr[0] * 1000);
				const thisArbyHour = zulu ? date.getUTCHours() : date.getHours();
				const thisArbyDay = zulu ? date.getUTCDate() : date.getDate();								

				if (thisArbyDay != lastArbyDay)
				{
					lastArbyDay = thisArbyDay;
					const thisArbyWeekDay = zulu ? date.getUTCDay() : date.getDay();
					const thisArbyMonth = zulu ? date.getUTCMonth() : date.getMonth();
					const thisArbyYear = zulu ? date.getUTCFullYear() : date.getFullYear();
					let h3 = document.createElement("h3");
					h3.textContent = days[thisArbyWeekDay] + ", " + months[thisArbyMonth] + " " + thisArbyDay;
					if (thisArbyYear != currentYear)
					{
						h3.textContent += ", " + thisArbyYear;
					}
					document.getElementById("log").appendChild(h3);
				}

				let span = document.createElement(arr[0] == currentHour ? "b" : "span");
				span.setAttribute("data-timestamp", arr[0]);
				span.textContent = formathour(thisArbyHour) + " • " + toTitleCase(loc(node.missionName)) + " - " + dict[node.factionName] + " @ " + loc(node.name) + ", " + loc(node.systemName) + " (" + thisArbyGrade + " tier";
				if ("darkSectorData" in node)
				{
					span.textContent += ", " + (node.darkSectorData.resourceBonus * 100).toFixed(0) + "% resource bonus";
				}
				span.textContent += ")";
				document.getElementById("log").appendChild(span);
			}
			if (document.getElementById("log").children.length == 0)
			{
				let span = document.createElement("span");
				span.textContent = "I've looked through " + (arbys.length - currentHourIndex) + " arbitrations but not a one matches your filters. :/";
				document.getElementById("log").appendChild(span);
			}

			// Update table
			document.querySelectorAll("table tbody tr").forEach(tr => {
				tr.setAttribute("data-starved", "true");
				tr.children[1].innerHTML = "N/A";
				tr.children[2].innerHTML = "N/A";
			});
			for (let i = currentHourIndex; i != arbys.length && document.querySelector("[data-starved]"); ++i)
			{
				const arr = arbys[i];

				const date = new Date(arr[0] * 1000);
				const node = ExportRegions[arr[1]];

				const thisArbyHour = zulu ? date.getUTCHours() : date.getHours();
				const thisArbyDay = zulu ? date.getUTCDate() : date.getDate();
				const thisArbyWeekDay = zulu ? date.getUTCDay() : date.getDay();
				const thisArbyMonth = zulu ? date.getUTCMonth() : date.getMonth();

				const thisArbyGrade = (arbyTiers[arr[1]] ?? "F");

				{
					const tr = document.getElementById("next-tier-" + thisArbyGrade);
					if (tr.children[1].innerHTML == "N/A")
					{
						tr.removeAttribute("data-starved");
						tr.children[1].setAttribute("data-timestamp", arr[0]);
						tr.children[1].textContent = days[thisArbyWeekDay] + ", " + months[thisArbyMonth] + " " + thisArbyDay + ", " + formathour(thisArbyHour);
						tr.children[2].textContent = toTitleCase(loc(node.missionName)) + " - " + dict[node.factionName] + " @ " + loc(node.name) + ", " + loc(node.systemName);
						if ("darkSectorData" in node)
						{
							tr.children[2].textContent += " (" + (node.darkSectorData.resourceBonus * 100).toFixed(0) + "% resource bonus)";
						}
					}
				}
				{
					const tr = document.getElementById("next-type-" + node.missionIndex);
					if (tr.children[1].innerHTML == "N/A")
					{
						tr.removeAttribute("data-starved");
						tr.children[1].setAttribute("data-timestamp", arr[0]);
						tr.children[1].textContent = days[thisArbyWeekDay] + ", " + months[thisArbyMonth] + " " + thisArbyDay + ", " + formathour(thisArbyHour);
						tr.children[2].textContent = dict[node.factionName] + " @ " + loc(node.name) + ", " + loc(node.systemName);
						if ("darkSectorData" in node)
						{
							tr.children[2].textContent += " (" + (node.darkSectorData.resourceBonus * 100).toFixed(0) + "% resource bonus)";
						}
					}
				}
				{
					const tr = document.getElementById("next-fc-" + node.factionIndex);
					if (tr.children[1].innerHTML == "N/A")
					{
						tr.removeAttribute("data-starved");
						tr.children[1].setAttribute("data-timestamp", arr[0]);
						tr.children[1].textContent = days[thisArbyWeekDay] + ", " + months[thisArbyMonth] + " " + thisArbyDay + ", " + formathour(thisArbyHour);
						tr.children[2].textContent = toTitleCase(loc(node.missionName)) + " - " + loc(node.name) + ", " + loc(node.systemName);
						if ("darkSectorData" in node)
						{
							tr.children[2].textContent += " (" + (node.darkSectorData.resourceBonus * 100).toFixed(0) + "% resource bonus)";
						}
					}
				}
			}

			// Ensure data stays up-to-date
			if (!("updater" in window))
			{
				window.updater = setInterval(function()
				{
					if (window.currentHour != (parseInt((Date.now() / 1000) / 3600) * 3600))
					{
						updateLog();
					}
				}, 1000);
			}

			console.timeEnd("updateLog");
		}

		function saveSettings()
		{
			let hash = "days=" + encodeURIComponent(document.getElementById("select-days").value)
					+ "&tz=" + encodeURIComponent(document.getElementById("select-tz").value)
					+ "&hourfmt=" + encodeURIComponent(document.getElementById("select-hourfmt").value)
					;

			const filtered_away = [];
			document.querySelectorAll("input[type=checkbox]").forEach(elm =>
			{
				if (!elm.checked)
				{
					filtered_away.push(elm.id.substr(7)); // "filter-"
				}
			});
			if (filtered_away.length != 0)
			{
				hash += "&exclude=" + encodeURIComponent(filtered_away.join("."));
			}

			location.hash = hash;
		}

		document.querySelectorAll("select, input[type=checkbox]").forEach(elm =>
		{
			elm.onchange = function()
			{
				if ("arbys" in window)
				{
					updateLog();
				}
				saveSettings();
			};
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
