<?php include("header.php"); ?>
<?php include("menu.php"); ?>
  <div class="report">
  </div>
  <div id="contenuto">
    <form action="report.php" method="post">
      <table>
        <tr class="riga1">
          <td>Seleziona il nome:</td>
          <td>
            <select class="bottone" name="filtro">
              <option value="tutti">Tutti</option>
            </select>
          </td>
          <td>
            <input class="bottone" type="submit" value="filtra" />
          </td>
      </table>
    </form>
    <table>
      <tr>
        <th>Computer</th>
        <th>Ubicazione</th>
        <th>Problema riscontrato</th>
        <th>Soluzione</th>
        <th>Data Apertura</th>
        <th>Data Chiusuma</th>
        <th>Nome</th>
      </tr>
    </table>
  </div>
<?php include("footer.php"); ?>