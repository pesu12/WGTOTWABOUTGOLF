<h1><?=$title?></h1>

<img src=<?="http://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?d=mm&s=80"?> alt="" />
Namn: <?=$user->name?></br></br>
  <table style="width:100%">
      <tr>
        Fråga: <?=$user->Question?></br>
      </tr>
  </table>
  </br>
  </br>
