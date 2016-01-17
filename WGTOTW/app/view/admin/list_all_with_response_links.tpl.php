<h1><?=$title?></h1>

  <table style="width:100%">
    <?php foreach ($users as $user) : ?>
      <tr>
        <img src=<?="http://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?d=mm&s=80"?> alt="" />
        <form method=get>
        <b><a href="<?= $this->url->create('me.php/admin')."/idlink/". $user->id?> "title="Namn" class="id"><?=$user->name?></a></b><br/>
      </br>
      </form
      </tr>
    <?php endforeach; ?>
      </table>

<p><a href='<?=$this->url->create('index.php')?>'>Back to users menu.</a></p>
