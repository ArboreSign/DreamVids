<div class="container">

	<h1 class="title">Contributeurs</h1>

	<div class="container">
<?php
$i = 1;
echo '<div class="row">';
foreach ($contributors as $cont)
{
	if ($i > 3)
	{
		$i = 1;
		echo '<div class="row">';
	}
?>
		<div class="col-lg-4">
			<h2><?php echo $cont['username']; ?></h2>
			<img src="<?php echo $cont['avatar']; ?>" class="img-circle" width="100">
			<p class="text-default">
				<?php echo $cont['description']; ?>
			</p>
			<p>
				<a class="btn btn-primary" href="<?php echo $cont['url']; ?>" target="_blank" role="button">
					<?php

						if ($cont['username'] == "Kassandra") { 

							echo "Suivez-la"; // C'est plus sympa pour Kassandra d'avoir un "Suivez-la" plutôt qu'un "Suivez-le" :P

						}

						else {

							echo "Suivez-le";

						}

					?>
				</a>
			</p>
		</div>
<?php
	if ($i == 3)
	{
		echo '</div>';
	}
	$i++;
}

if ($i <= 3)
{
	echo '</div>';
}
?>
	</div>
</div>