<?php
$path = $_SERVER["REQUEST_URI"];
if (strpos($path, "?") !== false)
{
	http_response_code(400);
	exit;
}

// Let's not waste our time if we know we won't find anything
if (substr($path, 0, 7) != "/Lotus/")
{
	// We can be nice and account for typos tho :)
	if (substr($path, 0, 2) == "//")
	{
		http_response_code(301);
		header("Location: /".ltrim($path, "/"));
	}
	exit;
}

function finishWithData($data)
{
	http_response_code(200);
	header("Content-Type: application/json");
	echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	exit;
}

// If it's a specific kind of path, we know exactly where to look.
if (substr($path, 0, 16) == "/Lotus/Language/")
{
	$dict_en = json_decode(file_get_contents("warframe-public-export-plus/dict.en.json"), true);
	if (array_key_exists($path, $dict_en))
	{
		finishWithData([
			"en" => $dict_en[$path],
			"de" => json_decode(file_get_contents("warframe-public-export-plus/dict.de.json"), true)[$path],
			"es" => json_decode(file_get_contents("warframe-public-export-plus/dict.es.json"), true)[$path],
			"fr" => json_decode(file_get_contents("warframe-public-export-plus/dict.fr.json"), true)[$path],
			"it" => json_decode(file_get_contents("warframe-public-export-plus/dict.it.json"), true)[$path],
			"ja" => json_decode(file_get_contents("warframe-public-export-plus/dict.ja.json"), true)[$path],
			"ko" => json_decode(file_get_contents("warframe-public-export-plus/dict.ko.json"), true)[$path],
			"pl" => json_decode(file_get_contents("warframe-public-export-plus/dict.pl.json"), true)[$path],
			"pt" => json_decode(file_get_contents("warframe-public-export-plus/dict.pt.json"), true)[$path],
			"ru" => json_decode(file_get_contents("warframe-public-export-plus/dict.ru.json"), true)[$path],
			"tc" => json_decode(file_get_contents("warframe-public-export-plus/dict.tc.json"), true)[$path],
			"th" => json_decode(file_get_contents("warframe-public-export-plus/dict.th.json"), true)[$path],
			"tr" => json_decode(file_get_contents("warframe-public-export-plus/dict.tr.json"), true)[$path],
			"uk" => json_decode(file_get_contents("warframe-public-export-plus/dict.uk.json"), true)[$path],
			"zh" => json_decode(file_get_contents("warframe-public-export-plus/dict.zh.json"), true)[$path],
		]);
	}
	exit;
}
if (substr($path, 0, 18) == "/Lotus/Syndicates/")
{
	$ExportSyndicates = json_decode(file_get_contents("warframe-public-export-plus/ExportSyndicates.json"), true);
	$tag = end(explode("/", $path));
	if (array_key_exists($tag, $ExportSyndicates))
	{
		finishWithData($ExportSyndicates[$tag]);
	}
	exit;
}
if (substr($path, 0, 18) == "/Lotus/Types/Ship/")
{
	$ExportDrones = json_decode(file_get_contents("warframe-public-export-plus/ExportDrones.json"), true);
	if (array_key_exists($path, $ExportDrones))
	{
		finishWithData($ExportDrones[$path]);
	}
	exit;
}
if (substr($path, 0, 21) == "/Lotus/Types/Enemies/")
{
	$ExportEnemies = json_decode(file_get_contents("warframe-public-export-plus/ExportEnemies.json"), true);
	if (array_key_exists($path, $ExportEnemies["avatars"]))
	{
		finishWithData($ExportEnemies["avatars"][$path]);
	}
	exit;
}
if (substr($path, 0, 24) == "/Lotus/Types/DropTables/")
{
	$ExportEnemies = json_decode(file_get_contents("warframe-public-export-plus/ExportEnemies.json"), true);
	if (array_key_exists($path, $ExportEnemies["droptables"]))
	{
		finishWithData($ExportEnemies["droptables"][$path]);
	}
	exit;
}
if (substr($path, 0, 24) == "/Lotus/Weapons/CrewShip/")
{
	$ExportRailjackWeapons = json_decode(file_get_contents("warframe-public-export-plus/ExportRailjackWeapons.json"), true);
	if (array_key_exists($path, $ExportRailjackWeapons))
	{
		finishWithData($ExportRailjackWeapons[$path]);
	}
	exit;
}
if (substr($path, 0, 26) == "/Lotus/Upgrades/Mods/Sets/")
{
	$ExportModSet = json_decode(file_get_contents("warframe-public-export-plus/ExportModSet.json"), true);
	if (array_key_exists($path, $ExportModSet))
	{
		finishWithData($ExportModSet[$path]);
	}
	exit;
}
if (substr($path, 0, 26) == "/Lotus/Types/BoosterPacks/")
{
	$ExportBoosterPacks = json_decode(file_get_contents("warframe-public-export-plus/ExportBoosterPacks.json"), true);
	if (array_key_exists($path, $ExportBoosterPacks))
	{
		finishWithData($ExportBoosterPacks[$path]);
	}
	exit;
}
if (substr($path, 0, 30) == "/Lotus/Types/Game/Projections/")
{
	$ExportRelics = json_decode(file_get_contents("warframe-public-export-plus/ExportRelics.json"), true);
	if (array_key_exists($path, $ExportRelics))
	{
		finishWithData($ExportRelics[$path]);
	}
	exit;
}
if (substr($path, 0, 30) == "/Lotus/Upgrades/Mods/Railjack/")
{
	$ExportAvionics = json_decode(file_get_contents("warframe-public-export-plus/ExportAvionics.json"), true);
	if (array_key_exists($path, $ExportAvionics))
	{
		finishWithData($ExportAvionics[$path]);
	}
	exit;
}
if (substr($path, 0, 31) == "/Lotus/Types/Game/MissionDecks/")
{
	$ExportRewards = json_decode(file_get_contents("warframe-public-export-plus/ExportRewards.json"), true);
	if (array_key_exists($path, $ExportRewards))
	{
		finishWithData($ExportRewards[$path]);
	}
	exit;
}
if (substr($path, 0, 34) == "/Lotus/Types/Game/VendorManifests/")
{
	$ExportVendors = json_decode(file_get_contents("warframe-public-export-plus/ExportVendors.json"), true);
	if (array_key_exists($path, $ExportVendors))
	{
		finishWithData($ExportVendors[$path]);
	}
	exit;
}
if (substr($path, 0, 35) == "/Lotus/Upgrades/Mods/FusionBundles/")
{
	$ExportFusionBundles = json_decode(file_get_contents("warframe-public-export-plus/ExportFusionBundles.json"), true);
	if (array_key_exists($path, $ExportFusionBundles))
	{
		finishWithData($ExportFusionBundles[$path]);
	}
	exit;
}

// If we have an idea what it might be, we can start there first.
if (substr($path, 0, 37) == "/Lotus/Powersuits/PowersuitAbilities/"
	|| substr($path, 0, 45) == "/Lotus/Powersuits/Archwing/ArchwingAbilities/"
	)
{
	$ExportAbilities = json_decode(file_get_contents("warframe-public-export-plus/ExportAbilities.json"), true);
	if (array_key_exists($path, $ExportAbilities))
	{
		finishWithData($ExportAbilities[$path]);
	}
	$ExportWarframes = json_decode(file_get_contents("warframe-public-export-plus/ExportWarframes.json"), true);
	foreach ($ExportWarframes as $warframeUniqueName => $warframe)
	{
		foreach ($warframe["abilities"] as $ability)
		{
			if ($ability["uniqueName"] == $path)
			{
				//$ability["browse.wf:owner"] = $warframeUniqueName; // ambiguous with primes etc
				finishWithData($ability, JSON_PRETTY_PRINT);
			}
		}
	}
}
else if (substr($path, 0, 34) == "/Lotus/Upgrades/CosmeticEnhancers/")
{
	$ExportArcanes = json_decode(file_get_contents("warframe-public-export-plus/ExportArcanes.json"), true);
	if (array_key_exists($path, $ExportArcanes))
	{
		finishWithData($ExportArcanes[$path]);
	}
	// Could also be a Peculiar mod
}
else if (substr($path, 0, 18) == "/Lotus/Powersuits/")
{
	$ExportWarframes = json_decode(file_get_contents("warframe-public-export-plus/ExportWarframes.json"), true);
	if (array_key_exists($path, $ExportWarframes))
	{
		finishWithData($ExportWarframes[$path]);
	}
}
else if (substr($path, 0, 13) == "/Lotus/Types/")
{
	if (substr($path, 0, 18) == "/Lotus/Types/Game/")
	{
		$ExportArcanes = json_decode(file_get_contents("warframe-public-export-plus/ExportArcanes.json"), true);
		if (array_key_exists($path, $ExportArcanes))
		{
			finishWithData($ExportArcanes[$path]);
		}
	}
	else if (substr($path, 0, 18) == "/Lotus/Types/Keys/")
	{
		$ExportKeys = json_decode(file_get_contents("warframe-public-export-plus/ExportKeys.json"), true);
		if (array_key_exists($path, $ExportKeys))
		{
			finishWithData($ExportKeys[$path]);
		}
	}
	else if (substr($path, 0, 24) == "/Lotus/Types/Challenges/")
	{
		$ExportChallenges = json_decode(file_get_contents("warframe-public-export-plus/ExportChallenges.json"), true);
		if (array_key_exists($path, $ExportChallenges))
		{
			finishWithData($ExportChallenges[$path]);
		}
	}

	$ExportGear = json_decode(file_get_contents("warframe-public-export-plus/ExportGear.json"), true);
	if (array_key_exists($path, $ExportGear))
	{
		finishWithData($ExportGear[$path]);
	}
}
else if (substr($path, 0, 22) == "/Lotus/Upgrades/Focus/")
{
	$ExportFocusUpgrades = json_decode(file_get_contents("warframe-public-export-plus/ExportFocusUpgrades.json"), true);
	if (array_key_exists($path, $ExportFocusUpgrades))
	{
		finishWithData($ExportFocusUpgrades[$path]);
	}
}

// Broad search
{
	$ExportBundles = json_decode(file_get_contents("warframe-public-export-plus/ExportBundles.json"), true);
	if (array_key_exists($path, $ExportBundles))
	{
		finishWithData($ExportBundles[$path]);
	}
}
{
	$ExportCustoms = json_decode(file_get_contents("warframe-public-export-plus/ExportCustoms.json"), true);
	if (array_key_exists($path, $ExportCustoms))
	{
		finishWithData($ExportCustoms[$path]);
	}
}
{
	$ExportFlavour = json_decode(file_get_contents("warframe-public-export-plus/ExportFlavour.json"), true);
	if (array_key_exists($path, $ExportFlavour))
	{
		finishWithData($ExportFlavour[$path]);
	}
}
{
	$ExportResources = json_decode(file_get_contents("warframe-public-export-plus/ExportResources.json"), true);
	if (array_key_exists($path, $ExportResources))
	{
		finishWithData($ExportResources[$path]);
	}
}
{
	$ExportSentinels = json_decode(file_get_contents("warframe-public-export-plus/ExportSentinels.json"), true);
	if (array_key_exists($path, $ExportSentinels))
	{
		finishWithData($ExportSentinels[$path]);
	}
}
{
	$ExportUpgrades = json_decode(file_get_contents("warframe-public-export-plus/ExportUpgrades.json"), true);
	if (array_key_exists($path, $ExportUpgrades))
	{
		finishWithData($ExportUpgrades[$path]);
	}
}
{
	$ExportWeapons = json_decode(file_get_contents("warframe-public-export-plus/ExportWeapons.json"), true);
	if (array_key_exists($path, $ExportWeapons))
	{
		finishWithData($ExportWeapons[$path]);
	}
}
{
	$ExportRecipes = json_decode(file_get_contents("warframe-public-export-plus/ExportRecipes.json"), true);
	if (array_key_exists($path, $ExportRecipes))
	{
		finishWithData($ExportRecipes[$path]);
	}
}

// For StoreItems, try non-StoreItem equivalent.
if (substr($path, 0, 18) == "/Lotus/StoreItems/")
{
	http_response_code(307);
	header("Location: /Lotus/".substr($path, 18));
}
