<?php include("header.php"); ?>
<?php include("menu.php"); ?>
  <div class="lista">
  </div>
  <div id="contenuto">
    <?php
    $db = new MyDB();
    $resultlista= $db->query('SELECT * FROM guasti WHERE stato = \'0\' ORDER BY data_apertura');
    $resulttecnici = $db->query('SELECT * FROM tecnici WHERE punteggio = 1');

    ?>
    <table>
      <tr>
        <th>Computer</th>
        <th>Ubicazione</th>
        <th>Problema riscontrato</th>
        <th>Data</th>
        <th>Soluzione</th>
        <th>Azione</th>
      </tr>
    <?php
    $i=0;
    while($entry = $resultlista->fetchArray()){
      echo "<form action=\"azione.php?azione=chiudi\" method=\"POST\">";
      echo "<input type=\"hidden\" name=\"id\" value=\"" . $entry[0] . "\" />";
      echo "<tr class=\"riga" . $i . "\"><td>" . $entry[1] .
      "</td><td>" . $entry[2] .
      "</td><td>" . $entry[3] . "<div class=\"segnalato\">segnalato da: <b>" . $entry[4] . "</b></div>" .
      "</td><td>" . str_replace("-", "/", $entry[5]) .
      "</td><td>
      <textarea class=\"caselladitesto\" name=\"soluzione\" rows=\"4\" cols=\"20\"></textarea>" .
      "</td><td>";
      echo "<select name=\"tecnico\" class=\"bottone\">";
      while($tecnici = $resulttecnici->fetchArray()){
        echo "<option value=\"" . $tecnici[0] . "\">" . $tecnici[1] . "</option>";
      }
      echo "</select>";
      echo "<input class=\"bottone\" type=\"submit\" value=\"chiudi\" />";
      echo "</form><br />";
      echo "<form action=\"azione.php?azione=elimina\" method=\"POST\">";
      echo "<input class=\"bottone\" type=\"submit\" value=\"elimina\" />";
      echo "</form>";
      echo "</td></tr>";
      if($i > 0){ $i=0; }
      elseif($i == 0){ $i=$i+1; }
    }
    
    ?>
    </table>
  </div>
<?php include("footer.php"); ?>



