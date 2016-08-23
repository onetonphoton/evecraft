<!-- File: src/Template/Constellations/index.ctp -->
<h2 class="sub-header">Eve Online Constellations</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>System ID's in Constellation</th>

                </tr>
              </thead>
              <tbody>
<?php

foreach ($constellation->systems as $system) {
    echo "<tr><td><a href='/evecraft/Systems/" . $system->id . "'>".$system->id . "</a></td></tr>";
}
?>
</tbody>
</table>
