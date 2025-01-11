<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Glyphs | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
	<style>
		#list
		{
			display: flex;
			flex-wrap: wrap;
		}

		.glyph
		{
			background: rgba(0, 0, 0, 0.15);
			margin: 5px;
		}

		.glyph img
		{
			width: 100%;
			height: 100%;
		}
	</style>
	<style id="scale-style">.glyph{width:100px;height:100px}</style>
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container-fluid pt-3">
		<div class="row">
			<div class="col-6">
				<label for="filter" class="form-label">Filter</label>
				<select class="form-control" id="filter">
					<option value="0">All Glyphs</option>
					<option value="1">Creator Glyphs</option>
					<option value="2">Universal Promo Code</option>
					<option value="3">Some Effort Required</option>
				</select>
			</div>
			<div class="col-6">
				<label for="scale" class="form-label">Scale</label>
				<input id="scale" type="range" class="form-range" min="32" value="100" max="256" style="margin-top:6px" />
			</div>
		</div>
		<div id="list" class="mt-3 mb-3"><p class="m-5">Loading...</p></div>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script>
		const exclude = {
			"/Lotus/Interface/Icons/Player/LavosAltAvatarBright.png": true,
			"/Lotus/Interface/Icons/Player/LavosAltAvatarDark.png": true,
			"/Lotus/Interface/Icons/Player/OctaviaPrimeBright.png": true,
			"/Lotus/Interface/Icons/Player/ZephyrDeluxeAvatar.png": true,
			"/Lotus/Interface/Icons/Player/LavosAvatarDark.png": true,
			"/Lotus/Interface/Icons/Player/LavosAvatarBright.png": true,
			"/Lotus/Interface/Icons/Player/OctaviaPrimeDark.png": true,
			"/Lotus/Interface/Icons/Player/ContentCreators/Dramakins.png": true,
			"/Lotus/Interface/Icons/Player/ContentCreators/Senastra23.png": true,
		};

		Promise.all([
			getDictPromise(),
			fetch("https://browse.wf/warframe-public-export-plus/ExportFlavour.json").then(res => res.json()),
			fetch("https://browse.wf/warframe-public-export-plus/ExportImages.json").then(res => res.json()),
			fetch("supplemental-data/glyphs.json").then(res => res.json())
			]).then(([ dict, ExportFlavour, ExportImages, supplementalGlyphData ]) =>
		{
			window.dict = dict;
			window.ExportFlavour = ExportFlavour;
			window.ExportImages = ExportImages;
			window.supplementalGlyphData = supplementalGlyphData;

			updateList();
			onLanguageUpdate = updateList;
		});

		function updateList()
		{
			const filter = document.getElementById("filter").value;

			document.getElementById("list").innerHTML = "";
			Object.entries(ExportFlavour)
			.filter(([uniqueName, item]) =>
			{
				return item.base == "/Lotus/Types/Items/AvatarImageItem"
				&& !(item.icon in exclude)
				&& (item.icon != "/Lotus/Interface/Icons/Player/LotusSymbol.png" || uniqueName == "/Lotus/Types/StoreItems/AvatarImages/AvatarImageDefault")
				&& (filter != 1 || uniqueName.substr(0, 48) == "/Lotus/Types/StoreItems/AvatarImages/FanChannel/")
				&& (filter != 2 || supplementalGlyphData[uniqueName]?.promo_code)
				&& (filter != 3 || (
						uniqueName in supplementalGlyphData
						&& !supplementalGlyphData[uniqueName].promo_code
						&& (
							supplementalGlyphData[uniqueName].twitch
							|| supplementalGlyphData[uniqueName].youtube
							|| supplementalGlyphData[uniqueName].discord
							|| supplementalGlyphData[uniqueName].twitter
							|| supplementalGlyphData[uniqueName].mixer
							|| supplementalGlyphData[uniqueName]["other-site"]
							|| supplementalGlyphData[uniqueName].markdown
							)
						)
					)
				;
			})
			.sort((a, b) => dict[a[1].name].localeCompare(dict[b[1].name]))
			.forEach(([uniqueName, item]) =>
			{
				const glyph = document.createElement("a");
				glyph.href = "/#q=" + encodeURIComponent(uniqueName);
				glyph.target = "_blank";
				glyph.className = "glyph";
				{
					const img = document.createElement("img");
					img.alt = img.title = (dict[item.name] ?? b[1].name);
					setImageSource(img, item.icon);
					glyph.appendChild(img);
				}
				document.getElementById("list").appendChild(glyph);
			});
		}

		document.getElementById("scale").oninput = function()
		{
			document.getElementById("scale-style").innerHTML = ".glyph{width:"+this.value+"px;height:"+this.value+"px}";
		};

		document.getElementById("filter").onchange = function()
		{
			updateList();
		};
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
