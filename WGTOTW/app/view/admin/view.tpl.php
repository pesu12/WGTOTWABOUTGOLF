<h1><?=$title?></h1>


  <table style="width:100%">
      <tr>
        <img src=<?="http://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?d=mm&s=80"?> alt="" /></br>
        Användarnamn: <?=$user->acronym?></br>
        Epost: <?=$user->email?></br>
        Namn: <?=$user->name?></br>
        Lösenord: <?=$user->password?></br></br>
      </tr>
      </table>
<p><a href='<?=$this->url->create('index.php')?>'>Logga ut</a></p>
<p><a href='<?=$this->url->create('index.php/question/add')?>'>Skapa fråga</a></p>
<p><a href='<?=$this->url->create('index.php/tag/add')?>'>Skapa tag</a></p>
<p><a href='<?=$this->url->create('index.php')?>'>Svara på fråga</a></p>
<p><a href='<?=$this->url->create('index.php/admin/edit?id='.$user->id)?>'>Uppdatera användare</a></p>
