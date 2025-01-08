const this_page_nav_link = document.querySelector(".nav-link.active");
if (this_page_nav_link)
{
	this_page_nav_link.onclick = event => event.preventDefault();
}

// Localisation

function getDictPromise()
{
	return fetch("https://browse.wf/warframe-public-export-plus/dict." + (localStorage.getItem("lang") ?? "en") + ".json").then(res => res.json());
}

function getOSDictPromise()
{
	return fetch("https://oracle.browse.wf/dicts/" + (localStorage.getItem("lang") ?? "en") + ".json?2").then(res => res.json());
}

function setLanguage(code)
{
	setLanguageIndicator(code);
	localStorage.setItem("lang", code);
	const promises = [ getDictPromise() ];
	if (window.osdict)
	{
		promises.push(getOSDictPromise());
	}
	Promise.all(promises).then(([ dict, osdict ]) =>
	{
		window.dict = dict;
		window.osdict = osdict;
		if ("onLanguageUpdate" in window)
		{
			onLanguageUpdate();
		}
	});
}

function setLanguageIndicator(code)
{
	document.querySelectorAll(".dropdown-item[data-lang]").forEach(elm => elm.classList.remove("active"));
	const item = document.querySelector(".dropdown-item[data-lang=" + code + "]");
	item.classList.add("active");
	document.getElementById("lang-dropdown").textContent = item.textContent;
}

if (localStorage.getItem("lang"))
{
	setLanguageIndicator(localStorage.getItem("lang"));
}

function toTitleCase(str)
{
	return str.replace(/[^\s\-]+/g, word => word.charAt(0).toUpperCase() + word.substr(1).toLowerCase());
}

// Images

function setImageSource(img, icon)
{
	if (ExportImages[icon]?.forumName)
	{
		img.src = "https://media.invisioncic.com/Mwarframe/pages_media/" + ExportImages[icon].forumName + ".png";
	}
	else if (ExportImages[icon]?.contentHash)
	{
		img.src = "https://content.warframe.com/PublicExport" + icon + "!" + ExportImages[icon].contentHash;
	}
	else
	{
		img.src = "https://browse.wf" + icon;
	}
}

// Text icons

function resolveTextIcons(text)
{
	return text.replaceAll(/<[^>]+>/g, (match) => {
		const name = match.split("<").join("").split(">").join("");
		if (ExportTextIcons[name]?.DIT_AUTO)
		{
			return "<img alt='<" + name + ">' style='height:1em;position:relative;bottom:2px' src='https://browse.wf" + ExportTextIcons[name].DIT_AUTO + "' />";
		}
		//console.warn("Failed to resolve text icon:", name);
		return "&lt;" + name + "&gt;";
	});
}
