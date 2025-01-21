<!DOCTYPE html>
<html>
<head>
	<title>About browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container p-3">
		<p>browse.wf is an <a href="https://github.com/calamity-inc/browse.wf" target="_blank">open-source</a> website providing various tools for Warframe.</p>
		<h2>Raw Data</h2>
		<p>This domain aims to resolve Warframe's internal paths, returning data relevant to the queried object, with some examples being:</p>
		<ul>
			<li><a href="/Lotus/Language/Locations/Moon" target="_blank">/Lotus/Language/Locations/Moon</a> (Language tag)</li>
			<li><a href="/Lotus/Powersuits/Excalibur/Excalibur" target="_blank">/Lotus/Powersuits/Excalibur/Excalibur</a> (Warframe)</li>
			<li><a href="/Lotus/Weapons/Tenno/Melee/LongSword/LongSword" target="_blank">/Lotus/Weapons/Tenno/Melee/LongSword/LongSword</a> (Weapon)</li>
			<!--<li><a href="/Lotus/Powersuits/PowersuitAbilities/HelminthEfficiencyAbility" target="_blank">/Lotus/Powersuits/PowersuitAbilities/HelminthEfficiencyAbility</a> (Ability)</li>-->
			<li><a href="/Lotus/Interface/Icons/Player/LotusSymbol.png" target="_blank">/Lotus/Interface/Icons/Player/LotusSymbol.png</a> (Image)</li>
		</ul>
		<h3>Data Exploration</h3>
		<p>The <a href="https://github.com/callumlocke/json-formatter" target="_blank">JSON Formatter</a> extension is recommended, as it allows you to click on paths (strings starting with a slash).</p>
		<p>The following files from the <a href="https://github.com/calamity-inc/warframe-public-export-plus" target="_blank">warframe-public-export-plus</a> project are excellent starting points for data exploration:</p>
		<ul>
			<li><a href="warframe-public-export-plus/ExportAbilities.json" target="_blank">ExportAbilities</a></li>
			<li><a href="warframe-public-export-plus/ExportAchievements.json" target="_blank">ExportAchievements</a></li>
			<li><a href="warframe-public-export-plus/ExportArcanes.json" target="_blank">ExportArcanes</a></li>
			<li><a href="warframe-public-export-plus/ExportAvionics.json" target="_blank">ExportAvionics</a></li>
			<li><a href="warframe-public-export-plus/ExportBoosterPacks.json" target="_blank">ExportBoosterPacks</a></li>
			<li><a href="warframe-public-export-plus/ExportBundles.json" target="_blank">ExportBundles</a></li>
			<li><a href="warframe-public-export-plus/ExportChallenges.json" target="_blank">ExportChallenges</a></li>
			<li><a href="warframe-public-export-plus/ExportCustoms.json" target="_blank">ExportCustoms</a></li>
			<li><a href="warframe-public-export-plus/ExportDrones.json" target="_blank">ExportDrones</a></li>
			<li><a href="warframe-public-export-plus/ExportEnemies.json" target="_blank">ExportEnemies</a></li>
			<li><a href="warframe-public-export-plus/ExportFlavour.json" target="_blank">ExportFlavour</a></li>
			<li><a href="warframe-public-export-plus/ExportFocusUpgrades.json" target="_blank">ExportFocusUpgrades</a></li>
			<li><a href="warframe-public-export-plus/ExportFusionBundles.json" target="_blank">ExportFusionBundles</a></li>
			<li><a href="warframe-public-export-plus/ExportGear.json" target="_blank">ExportGear</a></li>
			<li><a href="warframe-public-export-plus/ExportIntrinsics.json" target="_blank">ExportIntrinsics</a></li>
			<li><a href="warframe-public-export-plus/ExportKeys.json" target="_blank">ExportKeys</a></li>
			<li><a href="warframe-public-export-plus/ExportMisc.json" target="_blank">ExportMisc</a></li>
			<li><a href="warframe-public-export-plus/ExportModSet.json" target="_blank">ExportModSet</a></li>
			<li><a href="warframe-public-export-plus/ExportNightwave.json" target="_blank">ExportNightwave</a></li>
			<li><a href="warframe-public-export-plus/ExportRailjackWeapons.json" target="_blank">ExportRailjackWeapons</a></li>
			<li><a href="warframe-public-export-plus/ExportRecipes.json" target="_blank">ExportRecipes</a></li>
			<li><a href="warframe-public-export-plus/ExportRegions.json" target="_blank">ExportRegions</a></li>
			<li><a href="warframe-public-export-plus/ExportRelics.json" target="_blank">ExportRelics</a></li>
			<li><a href="warframe-public-export-plus/ExportResources.json" target="_blank">ExportResources</a></li>
			<li><a href="warframe-public-export-plus/ExportRewards.json" target="_blank">ExportRewards</a></li>
			<li><a href="warframe-public-export-plus/ExportSentinels.json" target="_blank">ExportSentinels</a></li>
			<li><a href="warframe-public-export-plus/ExportSyndicates.json" target="_blank">ExportSyndicates</a></li>
			<li><a href="warframe-public-export-plus/ExportTextIcons.json" target="_blank">ExportTextIcons</a></li>
			<li><a href="warframe-public-export-plus/ExportUpgrades.json" target="_blank">ExportUpgrades</a></li>
			<li><a href="warframe-public-export-plus/ExportVendors.json" target="_blank">ExportVendors</a></li>
			<li><a href="warframe-public-export-plus/ExportWarframes.json" target="_blank">ExportWarframes</a></li>
			<li><a href="warframe-public-export-plus/ExportWeapons.json" target="_blank">ExportWeapons</a></li>
		</ul>
		<h3>Arbitrations</h3>
		<p>The data behind the <a href="/arbys" target="_blank">arbitration schedule</a> is stored in the <a href="arbys.txt" target="_blank">arbys.txt</a>. Furthermore, the data prior to Update 37 is also still available in the <a href="arbys-old.txt" target="_blank">arbys-old.txt</a>.</p>
		<h3>Live World State</h3>
		<p>For our <a href="/live" target="_blank">live world state tracker</a>, we have created <a href="https://oracle.browse.wf" target="_blank">the oracle</a>, which has many services, including providing current bounty challenges, invasion mission types, and deep archimedea modifiers.</p>
		<p>Additionally, there's the steel path incursions schedule in the <a href="sp-incursions.txt" target="_blank">sp-incursions.txt</a>.</p>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
