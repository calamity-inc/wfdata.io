<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Live World State | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
	<style>
		abbr { text-decoration: underline dotted; text-decoration-skip-ink: none; }
		[data-bs-toggle=tooltip] { cursor: help; }
		[data-notif-toggle], [data-notif-toggle] > span { text-decoration:none;cursor:pointer }
		.card-block:not(:last-child) { margin-bottom: .5rem; }
	</style>
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
						<div class="card mb-3">
							<div class="card-header d-flex">
								<h4 class="mb-0">News</h4>
								<a class="m-auto me-2" data-notif-toggle="news"></a>
							</div>
							<div class="card-body overflow-auto" id="news-body" style="height:200px">
								Loading...
							</div>
						</div>
						<div class="card mb-3">
							<h4 class="card-header">Alerts</h4>
							<div class="card-body" id="alerts-body">Loading...</div>
						</div>
					</div>
					<div class="col-xl-12 col-md-6">
						<div class="card mb-3">
							<h4 class="card-header" id="darvo-header">Darvo's Deal</h4>
							<div class="d-flex">
								<img style="height:64px;width:64px;margin:10px" id="darvo-icon" />
								<div class="card-body ps-1">
									<p class="mb-1"><b id="darvo-item">Loading...</b> &middot; <span id="darvo-stock">0</span> In Stock</p>
									<p class="card-text"><del id="darvo-ogprice">0</del> <b id="darvo-price">0</b> Platinum (-<span id="darvo-discount">0</span>%)</p>
								</div>
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
						<div class="card mb-3">
							<h4 class="card-header" id="baro-header">Baro Ki'Teer</h4>
							<div class="card-body">
								<p id="baro-soon" class="mb-0">Baro's next visit will be at <b class="baro-where">Loading...</b>.</p>
								<div id="baro-now" class="d-none">
									<p>Baro is currently at <b class="baro-where"></b>.</p>
									<table class="table table-sm table-hover table-borderless mb-0" id="baro-table"></table>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<h4 class="card-header">KinePage</h4>
							<div class="card-body" id="pgr">No new messages. Scanning...</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8">
				<div class="card mb-3">
					<h4 class="card-header" id="bounties-header">Bounties</h4>
					<div class="card-body overflow-auto" id="bounties-body">
						<h5 id="HexSyndicate-name">The Hex</h5>
						<table class="table table-hover table-sm table-borderless mb-0" id="HexSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>65-70</td>
								<td>1000/<wbr/>1500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>75-80</td>
								<td>2000/<wbr/>3000</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>85-90</td>
								<td>3000/<wbr/>4500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>95-100</td>
								<td>4000/<wbr/>6000</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>105-110</td>
								<td>5000/<wbr/>7500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td class="ally"></td>
								<td>115-120</td>
								<td>6000/<wbr/>9000</td>
							</tr>
						</table>
						<h5 id="EntratiLabSyndicate-name" class="mt-3">Cavia</h5>
						<table class="table table-hover table-sm table-borderless mb-0" id="EntratiLabSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td>55-60</td>
								<td>1000/<wbr/>1500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>65-70</td>
								<td>2000/<wbr/>3000</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>75-80</td>
								<td>3000/<wbr/>4500</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>95-100</td>
								<td>4000/<wbr/>6000</td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>115-120</td>
								<td>5000/<wbr/>7500</td>
							</tr>
						</table>
						<h5 id="ZarimanSyndicate-name" class="mt-3">The Holdfasts</h5>
						<table class="table table-hover table-sm table-borderless mb-0" id="ZarimanSyndicate-table">
							<tr>
								<th class="mission">Fetching data...</th>
								<td class="challenge"></td>
								<td>50-55</td>
								<td>1/2&nbsp;<abbr class="vq-abbr">VQ</abbr></td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>60-65</td>
								<td>2/3&nbsp;<abbr class="vq-abbr">VQ</abbr></td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>70-75</td>
								<td>3/5&nbsp;<abbr class="vq-abbr">VQ</abbr></td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>90-95</td>
								<td>4/6&nbsp;<abbr class="vq-abbr">VQ</abbr></td>
							</tr>
							<tr>
								<th class="mission"></th>
								<td class="challenge"></td>
								<td>110-115</td>
								<td>5/8&nbsp;<abbr class="vq-abbr">VQ</abbr></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="card mb-3">
					<h4 class="card-header" id="invasions-header">Invasions</h4>
					<div class="card-body overflow-auto">
						<table class="table table-sm table-hover table-borderless mb-0" id="invasions-table"><tbody><tr><td>Loading...</td></tr></tbody></table>
					</div>
				</div>
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
		<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>
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
					const span = document.createElement("span");
					span.textContent = dict[challenge.description].split("\r\n").pop().split("|COUNT|").join(challenge.requiredCount);
					addTooltip(span, dict[challenge.name]);
					rows[i].querySelector(".challenge").innerHTML = "";
					rows[i].querySelector(".challenge").appendChild(span);
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
			const currentHour = Math.trunc((new Date().getTime() / 1000) / 3600) * 3600;
			const epochHour = arbys[0][0];
			const currentHourIndex = (currentHour - epochHour) / 3600;
			const arr = arbys[currentHourIndex];
			const node = ExportRegions[arr[1]];
			window.refresh_arby_at = (currentHour + 3600) * 1000;
			setDatum("arby-header", osdict["/Lotus/Language/Menu/AlertHardMode"], refresh_arby_at);
			document.getElementById("arby-what").textContent = toTitleCase(dict[node.missionName]) + " - " + dict[node.factionName];
			document.getElementById("arby-where").textContent = "@ " + dict[node.name] + ", " + dict[node.systemName];
			document.getElementById("arby-tier").textContent = arbyTiers[arr[1]] ?? "F";
		}

		function addTooltip(elm, title)
		{
			elm.setAttribute("data-bs-toggle", "tooltip");
			elm.setAttribute("data-bs-title", title);
			new bootstrap.Tooltip(elm);
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
					addTooltip(abbr, osdict["/Lotus/Language/Conquest/MissionVariant_LabConquest_" + mission.variant + "_Desc"]);
					td.appendChild(abbr);
					tr.appendChild(td);
				}
				for (let i = 0; i != 2; ++i)
				{
					const td = document.createElement("td");
					const abbr = document.createElement("abbr");
					abbr.textContent = osdict["/Lotus/Language/Conquest/Condition_" + mission.conditions[i]];
					addTooltip(abbr, osdict["/Lotus/Language/Conquest/Condition_" + mission.conditions[i] + "_Desc"]);
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
				addTooltip(abbr, osdict["/Lotus/Language/Conquest/PersonalMod_" + fv + "_Desc"]);
				td.appendChild(abbr);
				document.getElementById("labConquest-fv").appendChild(td);
			}
		}

		function updateWeekly()
		{
			window.refresh_weekly_at = undefined;
			Promise.all([
				fetch("https://oracle.browse.wf/weekly").then(res => res.json()),
				dicts_promise
			]).then(([weekly]) =>
			{
				window.weekly = weekly;
				window.refresh_weekly_at = weekly.expiry * 1000;
				updateWeeklyLocalised();
			});
		}

		function updateNewsTicker()
		{
			let highest_time = 0;
			const items = [];
			if (window.worldState)
			{
				const LanguageCode = (localStorage.getItem("lang") ?? "en");
				for (const event of window.worldState.Events)
				{
					const time = Math.trunc(event.Date.$date.$numberLong / 1000);
					if (time > highest_time)
					{
						highest_time = time;
					}
					let msg = event.Messages.find(x => x.LanguageCode == LanguageCode)?.Message;
					msg ??= event.Msg;
					if (msg && msg != "/Lotus/Language/CommunityMessages/JoinDiscord")
					{
						items.push({
							type: event.Community ? "success" : "primary",
							data: msg,
							time: time,
							link: event.Prop
						});
					}
				}
			}
			if (window.redtext)
			{
				for (const event of window.redtext)
				{
					if (event.time > highest_time)
					{
						highest_time = event.time;
					}
					items.push({
						type: "danger",
						data: event.data.split("WALLOPS :")[1],
						time: event.time
					});
				}
			}
			items.sort((a, b) => b.time - a.time);

			if (window.news_notify_after && localStorage.getItem("live.notif.news"))
			{
				for (let i = items.length; i-- != 0; )
				{
					if (items[i].time > news_notify_after)
					{
						sendNotification(items[i].data);
					}
				}
			}
			if (window.worldState && window.redtext)
			{
				window.refresh_news_sources_at = new Date().getTime() + 60_000;
				window.news_notify_after = highest_time;
			}

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
				const meta = await fetch("https://oracle.browse.wf/min").then(res => res.json());
				if (window.worldState)
				{
					sourcesToUpdate.events = (window.events_earmark != meta.latestEvent || worldState.Alerts.length != meta.alerts);
				}
				if (window.redtext)
				{
					sourcesToUpdate.redtext = (window.redtext[window.redtext.length - 1].time != meta.latestRedtext);
				}
				if (window.dailyDeal)
				{
					document.getElementById("darvo-stock").textContent = (dailyDeal.AmountTotal - meta.darvoSold);
				}
				if (window.num_invasions && window.num_invasions != meta.invasions)
				{
					updateInvasions();
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

		function updateWorldStateLocalised()
		{
			updateNewsTicker();
			updateSortie();
			updateKinePage();
			updateDarvosDeal();
			updateBaro();
			updateAlerts();
		}

		function updateWorldState()
		{
			window.refresh_world_state_at = undefined;
			fetch("https://oracle.browse.wf/worldState.json?" + new Date().getTime()).then(res => res.json()).then(worldState =>
			{
				window.worldState = worldState;

				if (!window.bountyCycle)
				{
					window.bountyCycleExpiry = parseInt(worldState.SyndicateMissions.find(x => x.Tag == "HexSyndicate").Expiry.$date.$numberLong);
					updateDayNightCycle();
				}

				window.events_earmark = 0;
				for (const event of worldState.Events)
				{
					const time = Math.trunc(event.Date.$date.$numberLong / 1000);
					if (time > events_earmark)
					{
						events_earmark = time;
					}
				}

				updateWorldStateLocalised();
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
			if (new Date().getTime() > expiry)
			{
				expiry = new Date().getTime() + 3000;
			}
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

		function updateKinePage()
		{
			const Tmp = JSON.parse(worldState.Tmp ?? "{}");
			const lang_code = (localStorage.getItem("lang") ?? "en");
			if (Tmp.pgr && Tmp.pgr[lang_code])
			{
				document.getElementById("pgr").textContent = Tmp.pgr[lang_code];
			}
		}

		async function updateDarvosDeal()
		{
			window.dailyDeal = worldState.DailyDeals.find(x => new Date().getTime() >= x.Activation.$date.$numberLong && new Date().getTime() < x.Expiry.$date.$numberLong);
			setDatum("darvo-header", "Darvo's Deal", dailyDeal.Expiry.$date.$numberLong);
			setWorldStateExpiry(dailyDeal.Expiry.$date.$numberLong);
			const item_data = await getItemDataPromise(dailyDeal.StoreItem);
			await dicts_promise;
			document.getElementById("darvo-item").textContent = dict[item_data.name];
			document.getElementById("darvo-icon").src = "https://browse.wf/" + item_data.icon;
			document.getElementById("darvo-stock").textContent = (dailyDeal.AmountTotal - dailyDeal.AmountSold);
			document.getElementById("darvo-ogprice").textContent = dailyDeal.OriginalPrice;
			document.getElementById("darvo-price").textContent = dailyDeal.SalePrice;
			document.getElementById("darvo-discount").textContent = dailyDeal.Discount;
		}

		async function updateBaro()
		{
			await dicts_promise;
			await ExportRegions_promise;
			document.querySelectorAll(".baro-where").forEach(x => x.textContent = dict[ExportRegions[worldState.VoidTraders[0].Node].name] + ", " + dict[ExportRegions[worldState.VoidTraders[0].Node].systemName]);
			if (worldState.VoidTraders[0].Manifest)
			{
				document.getElementById("baro-soon").classList.add("d-none");
				document.getElementById("baro-now").classList.remove("d-none");

				setWorldStateExpiry(worldState.VoidTraders[0].Expiry.$date.$numberLong);
				setDatum("baro-header", "Baro Ki'Teer", worldState.VoidTraders[0].Expiry.$date.$numberLong);

				for (const item of worldState.VoidTraders[0].Manifest)
				{
					getItemNamePromise(item.ItemType);
				}

				const items = [];
				for (const item of worldState.VoidTraders[0].Manifest)
				{
					const data = { ...item, ...(await getItemDataPromise(item.ItemType)) };
					if (data.compatName)
					{
						data.__type = 0;
					}
					else if (data.damagePerShot)
					{
						data.__type = 1;
					}
					else
					{
						data.__type = 2;
					}
					items.push(data);
				}
				items.sort((a, b) => a.__type - b.__type);

				const tbody = document.createElement("tbody");
				for (const item of items)
				{
					const tr = document.createElement("tr");
					{
						const td = document.createElement("td");
						td.textContent = await getItemNamePromise(item.ItemType);
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.className = "text-end";
						td.textContent = item.PrimePrice;
						tr.appendChild(td);
					}
					{
						const td = document.createElement("td");
						td.className = "text-end";
						td.textContent = item.RegularPrice.toLocaleString();
						tr.appendChild(td);
					}
					tbody.appendChild(tr);
				}
				document.getElementById("baro-table").innerHTML = "";
				document.getElementById("baro-table").appendChild(tbody);
			}
			else
			{
				document.getElementById("baro-soon").classList.remove("d-none");
				document.getElementById("baro-now").classList.add("d-none");

				setWorldStateExpiry(worldState.VoidTraders[0].Activation.$date.$numberLong);
				setDatum("baro-header", "Baro Ki'Teer", worldState.VoidTraders[0].Activation.$date.$numberLong);				
			}
		}

		async function updateAlerts()
		{
			if (worldState.Alerts.length != 0)
			{
				const promises = [eMissionType_promise];
				for (const alert of worldState.Alerts)
				{
					promises.push(getFactionNamePromise(alert.MissionInfo.faction));
					for (const reward of alert.MissionInfo.missionReward.items)
					{
						promises.push(getItemNamePromise(reward));
					}
				}
				await Promise.all(promises);

				document.getElementById("alerts-body").innerHTML = "";
				for (const alert of worldState.Alerts)
				{
					const block = document.createElement("div");
					block.className = "card-block";
					{
						const span = document.createElement("span");
						span.className = "d-block";
						{
							const b = document.createElement("b");
							b.textContent = toTitleCase(dict[eMissionType.find(x => x.tag == alert.MissionInfo.missionType).name]) + " - " + (await getFactionNamePromise(alert.MissionInfo.faction));
							span.appendChild(b);
						}
						span.innerHTML += " (" + alert.MissionInfo.minEnemyLevel + "-" + alert.MissionInfo.maxEnemyLevel + ") @ "+ dict[ExportRegions[alert.MissionInfo.location].name] + ", " + dict[ExportRegions[alert.MissionInfo.location].systemName] + " ";
						span.appendChild(createExpiryBadge(alert.Expiry.$date.$numberLong));
						setWorldStateExpiry(alert.Expiry.$date.$numberLong);
						block.appendChild(span);
					}
					{
						const span = document.createElement("span");
						span.className = "d-block";
						span.textContent = alert.MissionInfo.missionReward.credits.toLocaleString() + " Credits";
						block.appendChild(span);
					}
					for (const reward of alert.MissionInfo.missionReward.items)
					{
						const span = document.createElement("span");
						span.className = "d-block";
						span.textContent = await getItemNamePromise(reward);
						block.appendChild(span);
					}
					document.getElementById("alerts-body").appendChild(block);
				}
			}
			else
			{
				document.getElementById("alerts-body").textContent = "None right now.";
			}
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

		const item_data_promises = {};
		function getItemDataPromise(uniqueName)
		{
			uniqueName = uniqueName.split("/Lotus/StoreItems/").join("/Lotus/");
			if (!item_data_promises[uniqueName])
			{
				item_data_promises[uniqueName] = fetch("https://browse.wf" + uniqueName).then(res => res.json());
			}
			return item_data_promises[uniqueName];
		}

		async function getItemNamePromise(uniqueName)
		{
			const item_data = await getItemDataPromise(uniqueName);
			if (item_data.resultType)
			{
				const result_name = await getItemNamePromise(item_data.resultType);
				return dict["/Lotus/Language/Items/BlueprintAndItem"].split("|ITEM|").join(result_name);
			}
			if (item_data.category && item_data.era)
			{
				return dict["/Lotus/Language/Relics/VoidProjectionName"].split("|ERA|").join(item_data.era).split("|CATEGORY|").join(item_data.category);
			}
			await dicts_promise;
			return dict[item_data.name];
		}

		async function getFactionNamePromise(tag)
		{
			if (!window.eFaction_promise)
			{
				window.eFaction_promise = fetch("https://browse.wf/warframe-public-export-plus/supplementals/eFaction.json").then(res => res.json())
			}
			return dict[(await eFaction_promise).find(x => x.tag == tag).name];
		}

		async function updateInvasionsLocalised()
		{
			const tbody = document.createElement("tbody");
			let last_node = "";
			window.num_invasions = 0;
			for (const invasion of invasions)
			{
				const tr = document.createElement("tr");
				{
					const th = document.createElement("th");
					if (last_node != invasion.node)
					{
						++num_invasions;
						const node = ExportRegions[invasion.node];
						th.textContent = dict[node.name] + ", " + dict[node.systemName];
						last_node = invasion.node;
					}
					tr.appendChild(th);
				}
				{
					const td = document.createElement("td");
					const span = document.createElement("span");
					span.textContent = dict[invasion.ally == "FC_GRINEER" ? "/Lotus/Language/Game/Faction_GrineerUC" : "/Lotus/Language/Game/Faction_CorpusUC"];
					addTooltip(span, "Your ally");
					td.appendChild(span);
					tr.appendChild(td);
				}
				{
					const td = document.createElement("td");
					const span = document.createElement("span");
					span.textContent = toTitleCase(dict["/Lotus/Language/Missions/MissionName_" + invasion.missions[0]]);
					addTooltip(span, "Next: " + toTitleCase(dict["/Lotus/Language/Missions/MissionName_" + invasion.missions[1]]));
					td.appendChild(span);
					tr.appendChild(td);
				}
				{
					const td = document.createElement("td");
					td.textContent = invasion.allyPay[0].ItemCount + "x " + await getItemNamePromise(invasion.allyPay[0].ItemType);
					tr.appendChild(td);
				}
				tbody.appendChild(tr);
			}
			setDatum("invasions-header", "Invasions", refresh_invasions_at);
			document.getElementById("invasions-table").querySelectorAll("[data-bs-toggle=tooltip]").forEach(x => bootstrap.Tooltip.getInstance(x).dispose());
			document.getElementById("invasions-table").innerHTML = "";
			document.getElementById("invasions-table").appendChild(tbody);
		}

		function updateInvasions()
		{
			window.refresh_invasions_at = undefined;
			fetch("https://oracle.browse.wf/invasions").then(res => res.json()).then(async (res) =>
			{
				const promises = [dicts_promise, ExportRegions_promise];
				for (const invasion of res.invasions)
				{
					promises.push(getItemNamePromise(invasion.allyPay[0].ItemType));
				}
				await Promise.all(promises);

				window.invasions = res.invasions;
				window.refresh_invasions_at = res.expiry * 1000;

				updateInvasionsLocalised();
			});
		}

		Promise.all([dicts_promise, ExportRegions_promise, ExportChallenges_promise]).then(function()
		{
			updateBountyCycle();
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
					updateWorldStateLocalised();
				}
				if (window.invasions)
				{
					updateInvasionsLocalised();
				}
			};

			Promise.all([
				fetch("https://browse.wf/arbys.txt").then(res => res.text()),
				loadScriptPromise("supplemental-data/arbyTiers.js"),
				ExportRegions_promise
			]).then(([arbys]) =>
			{
				window.arbys = arbys.split("\n").map(line => line.split(",")).filter(arr => arr.length == 2);
				updateArby();
			});
		});

		updateWeekly();
		updateNewsSources(); // does updateWorldState
		updateInvasions();

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
			if (window.refresh_invasions_at && new Date().getTime() >= window.refresh_invasions_at)
			{
				updateInvasions();
			}
		}, 500);

		function sendNotification(text)
		{
			const toast = document.createElement("div");
			toast.className = "toast align-items-center text-bg-primary border-0";
			const div = document.createElement("div");
			div.className = "d-flex";
			const body = document.createElement("div");
			body.className = "toast-body";
			body.textContent = text;
			div.appendChild(body);
			const button = document.createElement("button");
			button.className = "btn-close btn-close-white me-2 m-auto";
			button.setAttribute("data-bs-dismiss", "toast");
			div.appendChild(button);
			toast.appendChild(div);
			new bootstrap.Toast(document.querySelector(".toast-container").appendChild(toast)).show();

			if (Notification.permission == "granted")
			{
				new Notification(text);
			}
		}

		function refreshNotifStatus(elm)
		{
			const enabled = localStorage.getItem("live.notif." + elm.getAttribute("data-notif-toggle"));
			const span = document.createElement("span");
			span.textContent = enabled ? "🔕" : "🔔";
			addTooltip(span, enabled ? "Disable Notifications" : "Enable Notifications");
			elm.querySelectorAll("[data-bs-toggle=tooltip]").forEach(x => bootstrap.Tooltip.getInstance(x).dispose());
			elm.innerHTML = "";
			elm.appendChild(span);
		}

		document.querySelectorAll("[data-notif-toggle]").forEach(elm =>
		{
			refreshNotifStatus(elm);
			elm.onclick = function()
			{
				if (localStorage.getItem("live.notif." + elm.getAttribute("data-notif-toggle")))
				{
					localStorage.removeItem("live.notif." + elm.getAttribute("data-notif-toggle"));
				}
				else
				{
					localStorage.setItem("live.notif." + elm.getAttribute("data-notif-toggle"), "1");
					if (Notification.permission != "granted")
					{
						Notification.requestPermission().then((permission) =>
						{
							sendNotification("This is an example notification.");
						});
					}
				}
				refreshNotifStatus(elm);
			};
		});

		document.querySelectorAll(".vq-abbr").forEach(elm => addTooltip(elm, "Voidplume Quills"));
	</script>
</body>
</html>
