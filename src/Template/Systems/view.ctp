<h2>Solar System: <?php echo $system->name ?></h2>
<h3>Security Status: <?php
  $securityStatus = round($system->securityStatus, 2);
  echo $securityStatus;
?></h3>
<div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $securityStatus*100; ?>" aria-valuemin="0" aria-valuemax="100" style="background-color: #5cb85c; width: <?php echo $securityStatus*100; ?>%;"><span class="sr-only"><?php echo $securityStatus; ?></span></div>
</div>
