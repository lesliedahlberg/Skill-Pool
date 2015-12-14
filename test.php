<!-- JS file -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="lib/js/jquery.easy-autocomplete.min.js"></script>

<!-- CSS file -->
<link rel="stylesheet" href="lib/css/easy-autocomplete.min.css">

<input id="basics" />
<script>
var options = {
	url: function(phrase) {
		return "api/autocomplete_for_add_skills.php?search=" + phrase + "&format=json";
	},

  listLocation: "result",
	getValue: "name"
};

$("#basics").easyAutocomplete(options);</script>
<!-- Using jQuery with a CDN -->
