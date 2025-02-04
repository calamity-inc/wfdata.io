<!DOCTYPE html>
<html>
<head>
	<title>KIM Convo Locator | browse.wf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="https://browse.wf/Lotus/Interface/Icons/Categories/GrimoireModIcon.png">
</head>
<body data-bs-theme="dark">
	<?php require "components/navbar.php"; ?>
	<div class="container pt-3">
		<div id="loading">
			<p>Loading, please wait...</p>
		</div>
		<div id="content" class="d-none">
			<input id="query" type="text" class="form-control mb-2" placeholder="Enter (part of) a message you want to locate..." />
			<div id="results"></div>
		</div>
	</div>
</body>
<?php require "components/commonjs.html"; ?>
<script>
	if (location.host == "kim.browse.wf" && location.pathname == "/convo-locator.html")
	{
		location.pathname = "/convo-locator";
	}

	const chatroom_to_username = {
		"ArthurDialogue_rom.dialogue": "Broadsword",
		"EleanorDialogue_rom.dialogue": "Salem",
		"LettieDialogue_rom.dialogue": "Belladona ~{@",
		"JabirDialogue_rom.dialogue": "H16h V0l7463",
		"AoiDialogue_rom.dialogue": "xX GLIMMER Xx",
		"QuincyDialogue_rom.dialogue": "Soldja1Shot1kil",
		"HexDialogue_rom.dialogue": "The Hex",
	};

	Promise.all([
		fetch("https://kim.browse.wf/dicts/" + (localStorage.getItem("lang") ?? "en") + ".json").then(res => res.json()),
		fetch("https://kim.browse.wf/ArthurDialogue_rom.dialogue.json").then(res => res.json()),
		fetch("https://kim.browse.wf/EleanorDialogue_rom.dialogue.json").then(res => res.json()),
		fetch("https://kim.browse.wf/LettieDialogue_rom.dialogue.json").then(res => res.json()),
		fetch("https://kim.browse.wf/JabirDialogue_rom.dialogue.json").then(res => res.json()),
		fetch("https://kim.browse.wf/AoiDialogue_rom.dialogue.json").then(res => res.json()),
		fetch("https://kim.browse.wf/QuincyDialogue_rom.dialogue.json").then(res => res.json()),
		fetch("https://kim.browse.wf/HexDialogue_rom.dialogue.json").then(res => res.json())
	]).then(([ dict, ArthurDialogue_rom, EleanorDialogue_rom, LettieDialogue_rom, JabirDialogue_rom, AoiDialogue_rom, QuincyDialogue_rom, HexDialogue_rom ]) => {
		window.kim_dict = dict;
		window.chatrooms = {
			"ArthurDialogue_rom.dialogue": { nodes: ArthurDialogue_rom, convos: {} },
			"EleanorDialogue_rom.dialogue": { nodes: EleanorDialogue_rom, convos: {} },
			"LettieDialogue_rom.dialogue": { nodes: LettieDialogue_rom, convos: {} },
			"JabirDialogue_rom.dialogue": { nodes: JabirDialogue_rom, convos: {} },
			"AoiDialogue_rom.dialogue": { nodes: AoiDialogue_rom, convos: {} },
			"QuincyDialogue_rom.dialogue": { nodes: QuincyDialogue_rom, convos: {} },
			"HexDialogue_rom.dialogue": { nodes: HexDialogue_rom, convos: {} },
		};
		for (const [chatroom_name, chatroom] of Object.entries(chatrooms))
		{
			for (const node of chatroom.nodes)
			{
				if (node.type == "/EE/Types/Engine/StartDialogueNode")
				{
					const convo = node.name;
					//convo_to_chatroom[convo] = chatroom_name;
					const pending = [ node.id ];
					const done = [];
					while (pending.length != 0)
					{
						const node_id = pending.pop();
						if (done.find(x => x == node_id))
						{
							continue;
						}
						done.push(node_id);
						const n = chatroom.nodes[node_id];
						if (n.true_choices)
						{
							for (const choice of n.true_choices)
							{
								pending.push(choice);
							}
							for (const choice of n.false_choices)
							{
								pending.push(choice);
							}
						}
						else
						{
							for (const choice of n.choices)
							{
								pending.push(choice);
							}
						}
					}
					chatroom.convos[convo] = done;
				}
			}
		}

		const params = new URLSearchParams(location.hash.toString().replace("#", ""));
		if (params.has("q"))
		{
			document.getElementById("query").value = params.get("q");
			doLocate();
		}

		document.getElementById("loading").classList.add("d-none");
		document.getElementById("content").classList.remove("d-none");
	});

	onLanguageUpdate = function()
	{
		fetch("https://kim.browse.wf/dicts/" + (localStorage.getItem("lang") ?? "en") + ".json").then(res => res.json()).then(dict =>
		{
			window.kim_dict = dict;
			doLocate();
		})
	};

	function node_id_to_convo(chatroom, node_id)
	{
		for (const [convo, convo_node_ids] of Object.entries(chatroom.convos))
		{
			for (const convo_node_id of convo_node_ids)
			{
				if (convo_node_id == node_id)
				{
					return convo;
				}
			}
		}
		console.error("node_id_to_convo failed", chatroom, node_id);
	}

	function normaliseText(text)
	{
		return text.toLowerCase().split("‘").join("'").split("’").join("'");
	}

	function doLocate()
	{
		const lang = localStorage.getItem("lang") || "en";
		const query = normaliseText(document.getElementById("query").value);
		if (query.length >= 3)
		{
			location.hash = "q=" + encodeURIComponent(query);
			document.getElementById("results").innerHTML = "";
			const results_set = {};
			for (const [chatroom_name, chatroom] of Object.entries(chatrooms))
			{
				for (const node of chatroom.nodes)
				{
					if (node.type == "/EE/Types/Engine/DialogueNode" || node.type == "/EE/Types/Engine/PlayerChoiceDialogueNode")
					{
						let text = kim_dict[node.name] ?? node.name;
						if (node.vars)
						{
							for (const [k, v] of Object.entries(node.vars))
							{
								text = text.split("|"+k+"|").join(kim_dict[v] ?? v);
							}
						}
						text = text.split("<RETRO_EMOJI_HEART>").join("<3");

						if (normaliseText(text).indexOf(query) != -1)
						{
							const convo = node_id_to_convo(chatroom, node.id);

							let sender_name = "Drifter";
							if (node.type == "/EE/Types/Engine/DialogueNode")
							{
								sender_name = chatroom_to_username[chatroom_name];
								if (node.nickname_override)
								{
									sender_name = node.nickname_override;
									if (kim_dict[sender_name])
									{
										sender_name = kim_dict[sender_name];
									}
								}
							}

							const slug = convo + "+++" + sender_name + "+++" + text;
							if (slug in results_set)
							{
								continue;
							}
							results_set[slug] = true;

							const p = document.createElement("p");
							p.className = "mb-1";
							p.textContent = sender_name + ": " + text + " (" + convo + " • ";
							{
								const a = document.createElement("a");
								a.href = "https://kim.browse.wf/flowcharts_svg/" + lang + "/" + chatroom_name + "/" + convo + ".svg";
								a.target = "_blank";
								a.textContent = "Flowchart";
								p.appendChild(a);
							}
							p.innerHTML += " • ";
							{
								const a = document.createElement("a");
								a.href = "kimulacrum#chatroom=" + chatroom_name + "&dialogue=" + convo;
								a.target = "_blank";
								a.textContent = "Kimulacrum";
								p.appendChild(a);
							}
							p.innerHTML += ")";
							document.getElementById("results").appendChild(p);
						}
					}
				}
			}
		}
		else
		{
			location.hash = "";
			document.getElementById("results").innerHTML = "<p>Please enter at least 3 characters.</p>";
		}
	}
	document.getElementById("query").oninput = doLocate;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
