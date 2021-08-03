<?php
	require("header.php");
?>
		<main>
			<script src="swap.js"></script>
			<div id="gallery">
				<ul id="imglist">
				<li>
					<a href="no1.png" title="Sumatran Tiger">
					<img src="no1t.png" alt="tiger"></a>
				</li>
				<li>
					<a href="no2.png" title="Holland Lop">
					<img src="no2t.png" alt="rabbit"></a>
				</li>
				<li>
					<a href="no3.png" title="Dusky Shark">
					<img src="no3t.png" alt="shark"></a>
				</li>
				<li>
					<a href="no4.png" title="Thorny Devil">
					<img src="no4t.png" alt="lizard"></a>
				</li>
				</ul>
				<p><img id="enlarged" src="no1.png" alt=""></p>
				<p id="caption">Sumatran Tiger</p>
			</div>
		</main>
<?php
	require("footer.php");
?>