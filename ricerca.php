<?php include("header.php"); ?>
<?php include("menu.php"); ?>
  <div class="ricerca">
  </div>
  <div id="contenuto">
    <div class="riga0">Inserisci le chiavi di ricerca:
      <form action="azione.php?azione=cerca" method="post">
        <input class="caselladitesto" type="text" name="chiave" />
        <input class="bottone" type="submit" value="Cerca" />
      </form>
    </div>
  </div>
<?php include("footer.php"); ?>