<!-- File: src/Template/Constellations/index.ctp -->
<h2 class="sub-header">Eve Online Constellations</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Constellation Name</th>
                </tr>
              </thead>
              <tbody>
<?php

foreach ($constellations as $constellation) {
    echo "<tr><td>".$constellation->id . "</td><td><a href='/evecraft/Constellations/" . $constellation->id . "'>".$constellation->name . "</a></td></tr>";
}
?>
</tbody>
</table>
