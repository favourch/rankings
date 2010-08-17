<?php

include('config.php');

include($dm->headerFile());

?>
<h3>Select Year</h3>
<ul>
<?php foreach($dm->Year()->findAll('yearName desc') as $y) : ?>
	<li><a href="year.php?y=<?php echo $y->yearId; ?>"><?php echo $y->yearName; ?></a></li>
<?php endforeach; ?>
</ul>
<?php

include($dm->footerFile());

