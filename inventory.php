<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Inventory | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container pt-3">
		<p>If you play Warframe on PC, you can sync your inventory with browse.wf for some extra features and information. The data stays in your browser.</p>
		<h3>Upload your lastData.dat</h3>
		<ul>
			<li>If you use AlecaFrame, you can find this in the <code>%localappdata%/AlecaFrame</code> folder.</li>
			<li>Alternatively, you can get a fresh copy by running the <a href="https://github.com/Sainan/warframe-api-helper/releases/download/2123bfd/warframe-api-helper.exe" download>warframe-api-helper</a> while the game is running & you're logged in.</li>
		</ul>
		<input type="file" class="form-control" />
		<p id="status" class="d-none mt-2 mb-0">Your inventory data is currently as of <b id="sync-time"></b>. <a href="#" onclick="event.preventDefault();localStorage.removeItem('inventory');location.reload();">Want to remove it again?</a></p>
		<a id="donebtn" class="d-none mt-3 btn btn-secondary"></a>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script src="https://pluto-lang.org/wasm-builds/out/libpluto/0.9.5/libpluto.js"></script>
	<script src="https://pluto-lang.org/PlutoScript/plutoscript.js"></script>
	<script>
		function get_uploaded()
		{
			return new Promise((resolve, reject) =>
			{
				if (document.querySelector("input").files.length)
				{
					document.querySelector("input").files[0].arrayBuffer().then(ab =>
					{
						pluto_give_file("lastData.dat", new Uint8Array(ab));
						resolve(true);
					});
				}
				else
				{
					resolve(false);
				}
			});
		}

		function onInventoryUploaded(data)
		{
			localStorage.setItem("inventory", data);
			onGotInventory();
		}

		function onGotInventory()
		{
			const inventory = JSON.parse(localStorage.getItem("inventory"));
			document.getElementById("status").classList.remove("d-none");
			document.getElementById("sync-time").textContent = new Date(parseInt(inventory.LastInventorySync.$oid.substr(0, 8), 16) * 1000).toLocaleString();

			document.getElementById("donebtn").classList.remove("btn-secondary");
			document.getElementById("donebtn").classList.add("btn-primary");
			document.getElementById("donebtn").classList.remove("mt-3");
			document.getElementById("donebtn").classList.add("mt-2");
		}

		if (location.hash == "#for=invigorations")
		{
			document.getElementById("donebtn").textContent = "Back to Invigorations";
			document.getElementById("donebtn").href = "/invigorations";
			document.getElementById("donebtn").classList.remove("d-none");
		}

		if (localStorage.getItem("inventory"))
		{
			onGotInventory();
		}
	</script>
	<script type="pluto">
		local { crypto, json } = require "*"

		document.querySelector("input[type=file]"):addEventListener("change", function()
			if js_invoke("get_uploaded") then
				local key <const> = "LEO-ALEC\tEO-ALEC"
				local iv <const> = "\49\50\70\71\66\51\54\45\76\69\51\45\113\61\57\0"
				local data = io.contents("lastData.dat")
							|> crypto.decrypt|"aes-cbc-pkcs7", key, iv|
							|> json.decode|json.withnull + json.withorder|
				if data.InventoryJson then
					data = json.decode(data.InventoryJson, json.withnull + json.withorder)
				end
				js_invoke("onInventoryUploaded", json.encode(data))
			end
		end)
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
