<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Live World State | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
	<style>abbr { text-decoration: underline dotted; cursor: help; text-decoration-skip-ink: none; }</style>
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container-fluid pt-3">
		<p>This tool shows you everything that's going on in Warframe <i>right now</i> in a hopefully useful way. It is still in active development, so, if you have feedback, <a href="https://github.com/calamity-inc/browse.wf/issues/15" target="_blank">please let us know</a>.</p>
		<div class="row">
			<div class="col-xl-4">
				<div class="row">
					<div class="col-xl-12 col-md-6">
						<div class="card mb-3">
							<h4 class="card-header">Environments</h4>
							<div class="card-body overflow-auto">
								<table class="table table-hover table-sm table-borderless mb-0">
									<tr>
										<th id="poe-name" class="w-50">Plains of Eidolon</th>
										<td id="poe" class="w-50">Fetching data...</td>
									</tr>
									<tr>
										<th id="vallis-name" class="w-50">Orb Vallis</th>
										<td id="vallis" class="w-50"></td>
									</tr>
									<tr>
										<th id="deimos-name" class="w-50">Cambion Drift</th>
										<td id="deimos" class="w-50">Fetching data...</td>
									</tr>
									<tr>
										<th id="zariman-name" class="w-50">Zariman</th>
										<td id="zariman" class="w-50">Fetching data...</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mb-3">
							<h4 class="card-header" id="arby-header">Arbitration</h4>
							<div class="card-body">
								<p class="card-text"><b id="arby-what">Loading...</b> <span id="arby-where"></span> (<span id="arby-tier">F</span> Tier)</p>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-md-6">
						<div class="card mb-3">
							<h4 class="card-header">News</h4>
							<div class="card-body overflow-auto" style="height:192px" id="news-body">
								Loading...
							</div>
						</div>
						<div class="card mb-3">
							<h4 class="card-header" id="sortie-header">Sortie</h4>
							<div class="card-body">
								<table class="table table-sm table-borderless table-hover mb-0" id="sortie-table">
									<tr><th>Fetching data...</th></tr>
									<tr><td>&nbsp;</td></tr>
									<tr><td>&nbsp;</td></tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8">
				<div class="card mb-3">
					<h4 class="card-header" id="bounties-header">Bounties</h4>
					<div class="card-body overflow-auto">
						<h5 id="HexSyndicate-name">The Hex</h5>
						<table class="table table-hover table-sm table-borderless mb-0" id="HexSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>65-70</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>75-80</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>85-90</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>95-100</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>105-110</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>115-120</td>
							</tr>
						</table>
						<h5 id="EntratiLabSyndicate-name" class="mt-3">Cavia</h5>
						<table class="table table-hover table-sm table-borderless mb-0" id="EntratiLabSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td>55-60</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>65-70</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>75-80</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>95-100</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>115-120</td>
							</tr>
						</table>
						<h5 id="ZarimanSyndicate-name" class="mt-3">The Holdfasts</h5>
						<table class="table table-hover table-sm table-borderless mb-0" id="ZarimanSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td>50-55</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>60-65</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>70-75</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>90-95</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>110-115</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4">
				<div class="card mb-3">
					<h4 class="card-header" id="labConquest-header">Deep Archimedea</h4>
					<div class="card-body overflow-auto">
						<table class="table table-sm table-borderless table-hover mb-2" id="labConquest-missions">
							<tr><th>Fetching data...</th></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						<table class="table table-sm table-borderless mb-0">
							<tr id="labConquest-fv"><td>&nbsp;</td></tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="common.js?os2"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script>
		const dicts_promise = Promise.all([ getDictPromise(), getOSDictPromise() ]);
		const ExportRegions_promise = fetch("https://browse.wf/warframe-public-export-plus/ExportRegions.json").then(res => res.json());
		const ExportChallenges_promise = fetch("https://browse.wf/warframe-public-export-plus/ExportChallenges.json").then(res => res.json());
		const eMissionType_promise = fetch("https://browse.wf/warframe-public-export-plus/supplementals/eMissionType.json").then(res => res.json());

		ExportRegions_promise.then(res => window.ExportRegions = res);
		ExportChallenges_promise.then(res => window.ExportChallenges = res);
		eMissionType_promise.then(res => window.eMissionType = res);

		function formatExpiry(expiry)
		{
			expiry -= expiry % 1000; expiry += 1000; // normalise the ms so everything ticks at the same time
			const time = new Date().getTime();
			let delta = expiry - time;
			if (delta < 1_000)
			{
				return "Updating...";
			}
			let units = [];
			if (delta >= 86_400_000)
			{
				units.push(Math.trunc(delta / 86_400_000) + "d");
				delta %= 86_400_000;
			}
			if (delta >= 3_600_000 || units.length)
			{
				units.push(Math.trunc(delta / 3_600_000) + "h");
				delta %= 3_600_000;
			}
			if (delta >= 60_000 || units.length)
			{
				units.push(Math.trunc(delta / 60_000) + "m");
				delta %= 60_000;
			}
			units.push(Math.trunc(delta / 1_000).toString().padStart(2, "0") + "s");
			return units.join(" ");
		}

		function createExpiryBadge(expiry)
		{
			const span = document.createElement("span");
			span.setAttribute("data-timestamp", expiry);
			span.className = "badge text-bg-secondary";
			span.textContent = formatExpiry(expiry);
			return span;
		}

		function setDatum(name, value, expiry)
		{
			const elm = document.getElementById(name);
			elm.textContent = value + " ";
			elm.appendChild(createExpiryBadge(expiry));
		}

		function updateVallis()
		{
			const EPOCH = new Date("November 10, 2018 08:13:48 UTC").getTime();
			const time = new Date().getTime();
			const cycle = Math.trunc((time - EPOCH) / 1600000);
			const cycleStart = EPOCH + cycle * 1600000;
			const cycleEnd = cycleStart + 1600000;
			const cycleColdStart = cycleStart + 400000;
			window.refresh_vallis_at = time > cycleColdStart ? cycleEnd : cycleColdStart;
			setDatum("vallis", time > cycleColdStart ? "❄️ Cold" : "☀️ Warm", refresh_vallis_at);
		}
		updateVallis();

		function updateDayNightCycle()
		{
			const time = new Date().getTime();
			const cycleNightStart = bountyCycleExpiry - 3_000_000;
			window.refresh_day_night_cycle_at = time > cycleNightStart ? bountyCycleExpiry : cycleNightStart;
			setDatum("poe", time > cycleNightStart ? "🌑 Night" : "☀️ Day", refresh_day_night_cycle_at);
			setDatum("deimos", time > cycleNightStart ? "🌑 Vome" : "☀️ Fass", refresh_day_night_cycle_at);
		}

		const allyNames = {
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/AmirAllyAgent": "Amir",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/AoiAllyAgent": "Aoi",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/ArthurAllyAgent": "Arthur",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/EleanorAllyAgent": "Eleanor",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/LettieAllyAgent": "Lettie",
			"/Lotus/Types/Gameplay/1999Wf/ProtoframeAllies/QuincyAllyAgent": "Quincy",
		};

		function updateBountyCycleLocalised()
		{
			setDatum("zariman", dict[bountyCycle.zarimanFaction == "FC_GRINEER" ? "/Lotus/Language/Game/Faction_GrineerUC" : "/Lotus/Language/Game/Faction_CorpusUC"], bountyCycle.expiry);
			setDatum("bounties-header", "Bounties", bountyCycle.expiry);
			for (const syndicateTag of ["HexSyndicate", "EntratiLabSyndicate", "ZarimanSyndicate"])
			{
				const rows = document.getElementById(syndicateTag + "-table").querySelectorAll("tr");
				for (let i = 0; i != bountyCycle.bounties[syndicateTag].length; ++i)
				{
					const node = ExportRegions[bountyCycle.bounties[syndicateTag][i].node];
					rows[i].querySelector(".mission").textContent = dict[node.name];
					if (!bountyCycle.bounties[syndicateTag][i].ally)
					{
						rows[i].querySelector(".mission").textContent += " (" + toTitleCase(dict[node.missionName]) + ")";
					}
					else
					{
						rows[i].querySelector(".ally").textContent = allyNames[bountyCycle.bounties[syndicateTag][i].ally];
					}
					const challenge = ExportChallenges[bountyCycle.bounties[syndicateTag][i].challenge];
					rows[i].querySelector(".challenge").textContent = dict[challenge.description].split("\r\n").pop().split("|COUNT|").join(challenge.requiredCount);
				}
			}
		}

		function updateBountyCycle()
		{
			window.refresh_bounty_cycle_at = undefined;
			fetch("https://oracle.browse.wf/bounty-cycle").then(res => res.json()).then(bountyCycle =>
			{
				window.bountyCycle = bountyCycle;
				window.bountyCycleExpiry = bountyCycle.expiry;
				window.refresh_bounty_cycle_at = Math.max(new Date().getTime(), bountyCycleExpiry) + 3000;
				updateDayNightCycle();
				updateBountyCycleLocalised();
			});
		}

		function updateNames()
		{
			document.getElementById("poe-name").textContent = dict["/Lotus/Language/Locations/EidolonPlains"];
			document.getElementById("vallis-name").textContent = dict["/Lotus/Language/Locations/VenusLandscape"];
			document.getElementById("deimos-name").textContent = dict["/Lotus/Language/InfestedMicroplanet/SolarMapDeimosLandscapeName"];
			document.getElementById("zariman-name").textContent = dict["/Lotus/Language/Zariman/ZarimanRegionName"];
			document.getElementById("HexSyndicate-name").textContent = dict["/Lotus/Language/1999/MessengerHexName"];
			document.getElementById("EntratiLabSyndicate-name").textContent = dict["/Lotus/Language/EntratiLab/EntratiGeneral/EntratiLabSyndicateName"];
			document.getElementById("ZarimanSyndicate-name").textContent = dict["/Lotus/Language/Syndicates/ZarimanName"];
		}

		function updateArby()
		{
			const currentHour = parseInt((new Date().getTime() / 1000) / 3600) * 3600;
			const epochHour = parseInt(arbys[0][0] / 3600) * 3600;
			const currentHourIndex = (currentHour - epochHour) / 3600;
			const arr = arbys[currentHourIndex];
			const node = ExportRegions[arr[1]];
			window.refresh_arby_at = (currentHour + 3600) * 1000;
			setDatum("arby-header", osdict["/Lotus/Language/Menu/AlertHardMode"], refresh_arby_at);
			document.getElementById("arby-what").textContent = toTitleCase(dict[node.missionName]) + " - " + dict[node.factionName];
			document.getElementById("arby-where").textContent = "@ " + dict[node.name] + ", " + dict[node.systemName];
			document.getElementById("arby-tier").textContent = arbyTiers[arr[1]] ?? "F";
		}

		function updateWeeklyLocalised()
		{
			setDatum("labConquest-header", osdict["/Lotus/Language/Conquest/SolarMapLabConquestNode"], refresh_weekly_at);
			const tbody = document.createElement("tbody");
			for (const mission of weekly.labConquestMissions)
			{
				const tr = document.createElement("tr");
				{
					const th = document.createElement("th");
					th.textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_" + mission.type] ?? mission.type);
					tr.appendChild(th);
				}
				{
					const td = document.createElement("td");
					const abbr = document.createElement("abbr");
					abbr.textContent = osdict["/Lotus/Language/Conquest/MissionVariant_LabConquest_" + mission.variant];
					abbr.setAttribute("data-bs-toggle", "tooltip");
					abbr.setAttribute("data-bs-title", osdict["/Lotus/Language/Conquest/MissionVariant_LabConquest_" + mission.variant + "_Desc"]);
					new bootstrap.Tooltip(abbr);
					td.appendChild(abbr);
					tr.appendChild(td);
				}
				for (let i = 0; i != 2; ++i)
				{
					const td = document.createElement("td");
					const abbr = document.createElement("abbr");
					abbr.textContent = osdict["/Lotus/Language/Conquest/Condition_" + mission.conditions[i]];
					abbr.setAttribute("data-bs-toggle", "tooltip");
					abbr.setAttribute("data-bs-title", osdict["/Lotus/Language/Conquest/Condition_" + mission.conditions[i] + "_Desc"]);
					new bootstrap.Tooltip(abbr);
					td.appendChild(abbr);
					tr.appendChild(td);
				}
				tbody.appendChild(tr);
			}
			document.getElementById("labConquest-missions").innerHTML = "";
			document.getElementById("labConquest-missions").appendChild(tbody);
			document.getElementById("labConquest-fv").innerHTML = "";
			for (const fv of weekly.labConquestFrameVariables)
			{
				const td = document.createElement("td");
				const abbr = document.createElement("abbr");
				abbr.textContent = osdict["/Lotus/Language/Conquest/PersonalMod_" + fv];
				abbr.setAttribute("data-bs-toggle", "tooltip");
				abbr.setAttribute("data-bs-title", osdict["/Lotus/Language/Conquest/PersonalMod_" + fv + "_Desc"]);
				new bootstrap.Tooltip(abbr);
				td.appendChild(abbr);
				document.getElementById("labConquest-fv").appendChild(td);
			}
		}

		function updateWeekly()
		{
			window.refresh_weekly_at = undefined;
			fetch("https://oracle.browse.wf/weekly").then(res => res.json()).then(weekly =>
			{
				window.weekly = weekly;
				window.refresh_weekly_at = weekly.expiry * 1000;
				updateWeeklyLocalised();
			});
		}

		function updateNewsTicker()
		{
			if (window.worldState && window.redtext)
			{
				window.refresh_news_sources_at = new Date().getTime() + 60_000;
			}

			const items = [];
			if (window.worldState)
			{
				const LanguageCode = (localStorage.getItem("lang") ?? "en");
				for (const event of window.worldState.Events)
				{
					let msg = event.Messages.find(x => x.LanguageCode == LanguageCode)?.Message;
					msg ??= event.Msg;
					if (msg && msg != "/Lotus/Language/CommunityMessages/JoinDiscord")
					{
						items.push({
							type: event.Community ? "success" : "primary",
							data: msg,
							time: Math.trunc(event.Date.$date.$numberLong / 1000),
							link: event.Prop
						});
					}
				}
			}
			if (window.redtext)
			{
				for (const event of window.redtext)
				{
					items.push({
						type: "danger",
						data: event.data.split("WALLOPS :")[1],
						time: event.time
					});
				}
			}
			items.sort((a, b) => b.time - a.time);
			document.getElementById("news-body").innerHTML = "";
			for (let i = 0; i != items.length; ++i)
			{
				const p = document.createElement("p");
				p.className = "card-text mb-1 text-" + items[i].type;
				if (items[i].link)
				{
					const a = document.createElement("a");
					a.className = "text-" + items[i].type;
					a.textContent = items[i].data;
					a.href = items[i].link;
					a.target = "_blank";
					p.appendChild(a);
				}
				else
				{
					p.textContent = items[i].data;
				}
				document.getElementById("news-body").appendChild(p);
			}
			document.querySelector("#news-body > :last-child").classList.remove("mb-1");
		}

		async function updateNewsSources()
		{
			window.refresh_news_sources_at = undefined;

			const sourcesToUpdate = {
				events: true,
				redtext: true,
			};
			if (window.worldState || window.redtext)
			{
				const meta = await fetch("https://oracle.browse.wf/news-meta").then(res => res.json());
				if (window.worldState)
				{
					sourcesToUpdate.events = (window.events_earmark != meta.latestEvent);
				}
				if (window.redtext)
				{
					sourcesToUpdate.redtext = (window.redtext[window.redtext.length - 1].time != meta.latestRedtext);
				}
			}

			if (sourcesToUpdate.events)
			{
				updateWorldState();
			}
			if (sourcesToUpdate.redtext)
			{
				fetch("https://oracle.browse.wf/redtext.json?" + new Date().getTime()).then(res => res.json()).then(redtext =>
				{
					window.redtext = redtext;
					updateNewsTicker();
				});
			}

			if (!sourcesToUpdate.events && !sourcesToUpdate.redtext)
			{
				window.refresh_news_sources_at = new Date().getTime() + 60_000;
			}
		}

		function updateWorldState()
		{
			window.refresh_world_state_at = undefined;
			fetch("https://oracle.browse.wf/worldState.json?" + new Date().getTime()).then(res => res.json()).then(worldState =>
			{
				window.worldState = worldState;
				window.events_earmark = Math.trunc(worldState.Events[worldState.Events.length - 1].Date.$date.$numberLong / 1000);
				updateNewsTicker();

				if (!window.bountyCycle)
				{
					window.bountyCycleExpiry = parseInt(worldState.SyndicateMissions.find(x => x.Tag == "HexSyndicate").Expiry.$date.$numberLong);
					updateDayNightCycle();
				}

				updateSortie();
			});
		}

		const sortieModifiers = {
			"SORTIE_MODIFIER_LOW_ENERGY": "Energy Reduction",
			"SORTIE_MODIFIER_IMPACT": "Enemy Physical Enhancement (Impact)",
			"SORTIE_MODIFIER_SLASH": "Enemy Physical Enhancement (Slash)",
			"SORTIE_MODIFIER_PUNCTURE": "Enemy Physical Enhancement (Puncture)",
			"SORTIE_MODIFIER_EXIMUS": "Eximus Stronghold",
			"SORTIE_MODIFIER_MAGNETIC": "Enemy Elemental Enhancement (Magnetic)",
			"SORTIE_MODIFIER_CORROSIVE": "Enemy Elemental Enhancement (Corrosive)",
			"SORTIE_MODIFIER_VIRAL": "Enemy Elemental Enhancement (Viral)",
			"SORTIE_MODIFIER_ELECTRICITY": "Enemy Elemental Enhancement (Electricity)",
			"SORTIE_MODIFIER_RADIATION": "Enemy Elemental Enhancement (Radiation)",
			"SORTIE_MODIFIER_GAS": "Enemy Elemental Enhancement (Gas)",
			"SORTIE_MODIFIER_FIRE": "Enemy Elemental Enhancement (Heat)",
			"SORTIE_MODIFIER_EXPLOSION": "Enemy Elemental Enhancement (Blast)",
			"SORTIE_MODIFIER_FREEZE": "Enemy Elemental Enhancement (Cold)",
			"SORTIE_MODIFIER_TOXIN": "Enemy Elemental Enhancement (Toxin)",
			"SORTIE_MODIFIER_POISON": "Enemy Elemental Enhancement (Toxin)",
			"SORTIE_MODIFIER_HAZARD_RADIATION": "Radiation Hazard",
			"SORTIE_MODIFIER_HAZARD_MAGNETIC": "Electromagnetic Anomalies",
			"SORTIE_MODIFIER_HAZARD_FOG": "Dense Fog",
			"SORTIE_MODIFIER_HAZARD_FIRE": "Fire",
			"SORTIE_MODIFIER_HAZARD_ICE": "Cryogenic Leakage",
			"SORTIE_MODIFIER_HAZARD_COLD": "Extreme Cold",
			"SORTIE_MODIFIER_ARMOR": "Augmented Enemy Armor",
			"SORTIE_MODIFIER_SHIELDS": "Enhanced Enemy Shields",
			"SORTIE_MODIFIER_SECONDARY_ONLY": "Pistol Only",
			"SORTIE_MODIFIER_SHOTGUN_ONLY": "Shotgun Only",
			"SORTIE_MODIFIER_SNIPER_ONLY": "Sniper Only",
			"SORTIE_MODIFIER_RIFLE_ONLY": "Assault Rifle Only",
			"SORTIE_MODIFIER_MELEE_ONLY": "Melee Only",
			"SORTIE_MODIFIER_BOW_ONLY": "Bow Only",
		};

		function setWorldStateExpiry(expiry)
		{
			if (!window.refresh_world_state_at || refresh_world_state_at > expiry)
			{
				window.refresh_world_state_at = expiry;
			}
		}

		async function updateSortie()
		{
			await dicts_promise;
			await eMissionType_promise;
			const sortie = worldState.Sorties.find(x => new Date().getTime() >= x.Activation.$date.$numberLong && new Date().getTime() < x.Expiry.$date.$numberLong);
			setWorldStateExpiry(sortie.Expiry.$date.$numberLong);
			setDatum("sortie-header", toTitleCase(osdict["/Lotus/Language/Menu/SortieMissionName"]), sortie.Expiry.$date.$numberLong);
			const tbody = document.createElement("tbody");
			for (const variant of sortie.Variants)
			{
				const tr = document.createElement("tr");
				const th = document.createElement("th");
				th.textContent = toTitleCase(dict[eMissionType.find(x => x.tag == variant.missionType).name]);
				tr.appendChild(th);
				const td = document.createElement("td");
				td.textContent = sortieModifiers[variant.modifierType];
				tr.appendChild(td);
				tbody.appendChild(tr);
			}
			document.getElementById("sortie-table").innerHTML = "";
			document.getElementById("sortie-table").appendChild(tbody);
		}

		function loadScriptPromise(src)
		{
			return new Promise((resolve, reject) =>
			{
				const script = document.createElement("script");
				script.src = src;
				script.onload = resolve;
				script.onerror = reject;
				document.documentElement.appendChild(script);
			});
		}

		Promise.all([dicts_promise, ExportRegions_promise, ExportChallenges_promise]).then(function()
		{
			updateBountyCycle();
		});

		Promise.all([
			fetch("https://browse.wf/arbys.txt").then(res => res.text()),
			loadScriptPromise("supplemental-data/arbyTiers.js"),
			ExportRegions_promise,
			dicts_promise
		]).then(([arbys]) =>
		{
			window.arbys = arbys.split("\n").map(line => line.split(",")).filter(arr => arr.length == 2);
			updateArby();
		});

		dicts_promise.then(([dict, osdict]) =>
		{
			window.dict = dict;
			window.osdict = osdict;
			updateNames();
			onLanguageUpdate = function()
			{
				updateNames();
				if (window.bountyCycle)
				{
					updateBountyCycleLocalised();
				}
				if (window.arbys)
				{
					updateArby();
				}
				if (window.weekly)
				{
					updateWeeklyLocalised();
				}
				if (window.worldState)
				{
					updateNewsTicker();
					updateSortie();
				}
			};

			updateWeekly();
		});

		updateNewsSources(); // does updateWorldState

		setInterval(function()
		{
			for (const elm of document.querySelectorAll(".badge[data-timestamp]"))
			{
				elm.textContent = formatExpiry(elm.getAttribute("data-timestamp"));
			}
		}, 100);

		setInterval(function()
		{
			if (new Date().getTime() >= window.refresh_vallis_at)
			{
				updateVallis();
			}
			if (window.refresh_day_night_cycle_at && new Date().getTime() >= window.refresh_day_night_cycle_at)
			{
				updateDayNightCycle();
			}
			if (window.refresh_bounty_cycle_at && new Date().getTime() >= window.refresh_bounty_cycle_at)
			{
				updateBountyCycle();
			}
			if (window.refresh_arby_at && new Date().getTime() >= window.refresh_arby_at)
			{
				updateArby();
			}
			if (window.refresh_news_sources_at && new Date().getTime() >= window.refresh_news_sources_at)
			{
				updateNewsSources();
			}
			if (window.refresh_world_state_at && new Date().getTime() >= window.refresh_world_state_at)
			{
				updateWorldState();
			}
		}, 500);
	</script>
</body>
</html>
