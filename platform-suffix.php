<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
	<title>Platform Suffix | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container pt-3">
		<div class="row">
			<div class="col-lg-6">
				<div class="card mb-3">
					<h4 class="card-header">Name and Platform to Suffixed Name</h4>
					<div class="card-body">
						<form class="input-group" onsubmit="event.preventDefault();partial2full();">
							<input id="partial-name" type="text" class="form-control" value="" placeholder="[DE]Steve" />
							<span class="input-group-text">on</span>
							<select id="platform" class="form-control">
								<option value="0">PC</option>
								<option value="1">PlayStation</option>
								<option value="2">Xbox</option>
								<option value="3">Switch</option>
								<option value="4">Mobile</option>
							</select>
							<input type="submit" class="btn btn-primary" />
						</form>
						<p id="partial2full-res" class="card-text text-center mt-3"></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card mb-3">
					<h4 class="card-header">Suffixed Name to Platform</h4>
					<div class="card-body">
						<form class="input-group" onsubmit="event.preventDefault();full2platform();">
							<input id="full-name" type="text" class="form-control" value="" placeholder="[DE]Steve#277" />
							<input type="submit" class="btn btn-primary" />
						</form>
						<p id="full2platform-res" class="card-text text-center mt-3"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require "components/commonjs.html"; ?>
	<script src="https://pluto-lang.org/wasm-builds/out/libpluto/0.9.5/libpluto.js"></script>
	<script src="https://pluto-lang.org/PlutoScript/plutoscript.js"></script>
	<script type="pluto" src="platform-suffix.pluto"></script>
	<script>
		async function partial2full()
		{
			document.getElementById("partial2full-res").textContent = document.getElementById("partial-name").value + "#" + (await pluto_invoke("get_discriminator", document.getElementById("partial-name").value, parseInt(document.getElementById("platform").value))).toString().padStart(3, "0");
		}

		const platform_names = [ "PC", "PlayStation", "Xbox", "Switch", "Mobile", "Invalid" ];
		async function full2platform()
		{
			const arr = document.getElementById("full-name").value.split("#");
			let i = 0;
			for (; i != 5; ++i)
			{
				if (await pluto_invoke("get_discriminator", arr[0], i) == arr[1])
				{
					break;
				}
			}
			document.getElementById("full2platform-res").textContent = platform_names[i];
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
