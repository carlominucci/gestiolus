<?php include("header.php"); ?>
<?php include("menu.php"); ?>
  <div class="impostazioni">
  </div>
  <div id="contenuto">
    <table>
      <tr>
        <td>
          <table>
            <tr>
              <th>Gestione laboratori</th><th></th>
            <tr>
<?php
$querylab= $db->query("SELECT * FROM lab ORDER BY id");
$i=0;
while($entry = $querylab->fetchArray()){
  echo "<tr class=\"riga" . $i . "\"><td>";
  echo $entry[1];
  echo "</td><td><a class=\"bottone\" href=\"azione.php?azione=dellab&id=" . $entry[0] . "\">cancella</td></tr>";
  if($i > 0){ $i=0; }
  elseif($i == 0){ $i=$i+1; }
}
?>
            <tr class="riga<?php echo $i; ?>">
              <td>
                <form action="azione.php" method="post">
                <input class="caselladitesto" type="text" name="nome" />
              </td>
              <td>
                <input class="bottone" type="submit" value="aggiungi" />
                </form>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <table>
            <tr>
              <th>Gestione Tecnici</th><th></th>
            </tr>
<?php
$tecnici= $db->query("SELECT * FROM tecnici");
$i=0;
while($entry = $tecnici->fetchArray()){
  echo "<tr class=\"riga" . $i . "\"><td>";
  echo $entry[1];
  echo "</td><td><a class=\"bottone\" href=\"azione.php?";
  if($entry[2]==0){
    echo "azione=abilitatecnico&id=" . $entry[0] . "\">abilita";
  }elseif($entry[2]==1){
    echo "azione=disabilitatecnico&id=" . $entry[0] . "\">disabilita";
  }
  echo "</td></tr>";
  if($i > 0){ $i=0; }
  elseif($i == 0){ $i=$i+1; }
}
?>
            <tr class="riga<?php echo $i; ?>">
              <td>
                <form action="azione.php" method="post">
                <input class="caselladitesto" type="text" name="nome" />
              </td>
              <td>
                <input class="bottone" type="submit" value="aggiungi" />
                </form>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
  
<?php include("footer.php"); ?>