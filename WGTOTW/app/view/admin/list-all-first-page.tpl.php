<h1><?=$title?></h1>

  <table style="width:100%">
    <?php foreach ($users as $user) : ?>
      <tr>
        Namn: <?=$user->name?></br></br>
      </tr>
    <?php endforeach; ?>
      </table>
