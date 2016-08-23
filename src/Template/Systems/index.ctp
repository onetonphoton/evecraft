<!-- File: src/Template/Constellations/index.ctp -->
<h2 class="sub-header">Eve Online Systems</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>System Name</th>
                </tr>
              </thead>
              <tbody>
<?php

foreach ($systems as $system) {
    echo "<tr><td>".$system->id . "</td><td><a href='/evecraft/Systems/" . $system->id . "/'".$system->name . "</a></td></tr>";
}
?>
</tbody>
</table>
