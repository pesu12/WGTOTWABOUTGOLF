<h1><?=$title?></h1>

  <table style="width:100%">
      <tr>
        Id: <?=$id?></br>
        Acronym: <?=$user->acronym?></br>
        Email: <?=$user->email?></br>
        Name: <?=$user->name?></br></br>
      </tr>
      </table>
<p><a href='<?=$this->url->create('index.php/users')?>'>Back to users menu.</a></p>
