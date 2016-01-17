<h1><?=$title?></h1>

  <table style="width:100%">

    <?php foreach ($users as $user) : ?>
      <tr>
        <?=$user->tagtext?></br>
        <b><a href="<?= $this->url->create('me.php/question')."/id/". $user->id?> "title="Fråga" class="id"><?=$user->Question?></a></b><br/>
      </tr>
    <?php endforeach; ?>
      </table>

<p><a href='<?=$this->url->create('index.php')?>'>Back to users menu.</a></p>
