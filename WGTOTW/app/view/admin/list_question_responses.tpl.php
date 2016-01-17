<h1><?=$title?></h1>

  <table style="width:100%">
    <?php foreach ($users as $user) : ?>
      <tr>
        <img src=<?="http://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?d=mm&s=80"?> alt="" /></br>
        Namn: <?=$user->name?></br></br>
        Fråga: <?=$user->questionheader?></br></br>
        Svar: <?=$user->Response?></br></br>        
      </tr>
    <?php endforeach; ?>
      </table>

<p><a href='<?=$this->url->create('index.php')?>'>Back to users menu.</a></p>
