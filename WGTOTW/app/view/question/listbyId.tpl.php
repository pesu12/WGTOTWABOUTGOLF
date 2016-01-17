<h1><?=$title?></h1>

  <div class='comments'>
    <?php //Create table?>
    <table style="width:100%">
      <?php foreach ($users as $user) : ?>
        <tr>
          <?php //Table first column with gavatar?>
          <td id="columnavatar">
            <p>
            <img class='sitelogo' src='<?=$this->url->asset("img/gavatar.png")?>' alt='Psweb Log'/>
          </p>
          </td>
          <?php //Table first column end?>

          <?php //Table second column with comments?>
          <td>
            <form method=get>
            <b><a href="<?= $this->url->create('me.php/question/edit').'?id=1' ?> "title="Svara på Fråga" class="id"></a></b><br/>
          </form
            <?php //The question content?>
            <span class="columcontent">
            <?=$user->questionheader?>
          </p>
            </span>
          </td>
          <?php //Table second column end?>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

<p><a href='<?=$this->url->create('index.php')?>'>Back to users menu.</a></p>
