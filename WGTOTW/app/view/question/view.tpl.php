<h1><?=$title?></h1>

  <table style="width:100%">
      <tr>
        <?=$user->questionheader?></br>
        <?=$user->questiontext?></br></br>
      </tr>
      </table>
<p><a href='<?=$this->url->create('index.php/response/add')?>'>Svara på fråga</a></p>
<p><a href='<?=$this->url->create('index.php/comment/add')?>'>Lägg kommentar till fråga</a></p
