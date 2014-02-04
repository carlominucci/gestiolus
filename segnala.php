<?php include("header.php"); ?>
<?php include("menu.php"); ?>
  <div class="segnala">
  </div>
  <div id="contenuto">

<form action="azione.php?azione=aggiungiguasto" method="post">
<table>
  <tr>
    <td>Seleziona Laboratorio</td>
      <td>
        <select name="tecnico" class="bottone">
<?php
$query=$db->query("SELECT * FROM lab");
while($entry = $query->fetchArray()){
  echo $entry[1];
  echo "<option value=\"" . $entry[0] . "\">" . $entry[1] . "</option>";
}
?>
        </select>
      <td>
    </tr>
    <tr class="riga0">
      <td>Nome computer</td>
      <td>
        <input class="caselladitesto" type="text" name="nomepc" />
      </td>
    </tr>
    <tr class="riga1">
      <td>Descrizione dettagliata<br />del tipo di problema</td>
      <td><textarea class="caselladitesto" name="guasto" rows="6" cols="48"></textarea></td>
    </tr>
    <tr class="riga0">
      <td>Segnalato da: </td>
      <td>
        <input class="caselladitesto" type="text" name="nome" />
      </td>
    </tr>
    <tr class="riga1">
      <td></td>
      <td>
        <input class="bottone" type="image" id="canvasImg" />
      </td>
    </tr>
</table>
</form>

  </div>
<?php include("footer.php"); ?>