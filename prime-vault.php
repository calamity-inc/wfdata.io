<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Prime Vault | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container pt-3">
		<h3>In Rotation</h3>
		<ul id="inrotation"></ul>
		<h3>Prime Resurgence</h3>
		<ul id="resurgence"></ul>
		<h3>Vaulted</h3>
		<ul id="vaulted"></ul>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script>
		const STATE_VAULTED = 0;
		const STATE_RESURGENCE = 1;
		const STATE_INROTATION = 2;

		Promise.all([
			getDictPromise(),
			fetch("https://browse.wf/warframe-public-export-plus/ExportRelics.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportRewards.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportRecipes.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportWeapons.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportWarframes.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportSentinels.json").then(res => res.json()),
			fetch("https://raw.githubusercontent.com/calamity-inc/warframe-worldstate-history/senpai/worldState.json").then(res => res.json()),
			]).then(function([ dict, ExportRelics, ExportRewards, ExportRecipes, ExportWeapons, ExportWarframes, ExportSentinels, worldState ])
		{
			window.dict = dict;
			window.ExportRelics = ExportRelics;
			window.ExportRewards = ExportRewards;
			window.ExportWeapons = ExportWeapons;
			window.ExportWarframes = ExportWarframes;
			window.ExportSentinels = ExportSentinels;

			console.time("build component_to_item");
			window.component_to_item = {};
			for (const [type, recipe] of Object.entries(ExportRecipes))
			{
				component_to_item[type] = recipe.resultType;
				for (const ingredient of recipe.ingredients)
				{
					component_to_item[ingredient.ItemType] = recipe.resultType;
				}
			}
			console.timeEnd("build component_to_item");

			console.time("build VarziaItems");
			window.VarziaItems = {};
			for (const offering of worldState.PrimeVaultTraders[0].Manifest)
			{
				VarziaItems[offering.ItemType.split("/Lotus/StoreItems/").join("/Lotus/")] = true;
			}
			console.timeEnd("build VarziaItems");

			console.time("build MissionRewards");
			window.MissionRewards = {};
			for (const deck of Object.values(ExportRewards))
			{
				for (const tier of deck)
				{
					for (const reward of tier)
					{
						MissionRewards[reward.type.split("/Lotus/StoreItems/").join("/Lotus/")] = true;
					}
				}
			}
			console.timeEnd("build MissionRewards");

			console.time("build items");
			window.items = {};
			for (const [type, relic] of Object.entries(ExportRelics))
			{
				if (relic.quality == "VPQ_BRONZE" && relic.era != "Requiem")
				{
					const state = type in MissionRewards
									? STATE_INROTATION
									: type in VarziaItems
										? STATE_RESURGENCE
										: STATE_VAULTED
									;
					for (const reward of ExportRewards[relic.rewardManifest][0])
					{
						if (reward.type != "/Lotus/StoreItems/Types/Recipes/Components/FormaBlueprint")
						{
							const item = component_to_item[reward.type.split("/Lotus/StoreItems/").join("/Lotus/")];
							if (!items[item] || state > items[item])
							{
								items[item] = state;
							}
						}
					}
				}
			}
			console.timeEnd("build items");

			updateList();
			onLanguageUpdate = updateList;
		});

		function updateList()
		{
			const state_to_elm = {};
			state_to_elm[STATE_VAULTED] = document.getElementById("vaulted");
			state_to_elm[STATE_RESURGENCE] = document.getElementById("resurgence");
			state_to_elm[STATE_INROTATION] = document.getElementById("inrotation");
			for (const div of Object.values(state_to_elm))
			{
				div.innerHTML = "";
			}
			let named_items = [];
			for (const [item, state] of Object.entries(items))
			{
				const name = dict[ExportWarframes[item]?.name] ?? dict[ExportWeapons[item]?.name] ?? dict[ExportSentinels[item]?.name];
				if (name)
				{
					named_items.push({
						key: item,
						name: name.split("<ARCHWING>").join("").trim(),
						state
					});
				}
				else
				{
					console.info("discarding", item);
				}
			}
			named_items = named_items.sort((a, b) => a.name.localeCompare(b.name));
			for (const item of named_items)
			{
				const li = document.createElement("li");
				li.textContent = item.name + " ";
				{
					const a = document.createElement("a");
					a.textContent = "(Wiki)";
					a.href = "https://warframe.fandom.com/wiki/" + encodeURIComponent(item.name);
					a.target = "_blank";
					li.appendChild(a);
				}
				{
					const span = document.createElement("span");
					span.textContent = " ";
					li.appendChild(span);
				}
				{
					const a = document.createElement("a");
					a.textContent = "(browse.wf)";
					a.href = "/#q=" + encodeURIComponent(item.key);
					a.target = "_blank";
					li.appendChild(a);
				}
				state_to_elm[item.state].appendChild(li);
			}
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
