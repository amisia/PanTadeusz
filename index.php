<html>

<head>

 <meta charset="utf-8">
 <title>Czytaj !</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script></head>
 <link rel="stylesheet" href="stylePT.css">
</head>
<body>
  <header class="page-header text-center">
    <h1>Pan Tadeusz, czyli ostatni zajazd na Litwie</h1>
    <h2>historia szlachecka z roku 1911-1912 we dwunastu księgach wierszem</h2>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h1>Spis ksiąg</h1>
          </div>
          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation"><a href="index.php?ksiega=pierwsza">Księga 1</a></li>
              <li role="presentation"><a href="index.php?ksiega=druga">Księga 2</a></li>
              <li role="presentation"><a href="index.php?ksiega=trzecia">Księga 3</a></li>
              <li role="presentation"><a href="index.php?ksiega=czwarta">Księga 4</a></li>
              <li role="presentation"><a href="index.php?ksiega=piata">Księga 5</a></li>
              <li role="presentation"><a href="index.php?ksiega=szosta">Księga 6</a></li>
              <li role="presentation"><a href="index.php?ksiega=siodma">Księga 7</a></li>
              <li role="presentation"><a href="index.php?ksiega=osma">Księga 8</a></li>
              <li role="presentation"><a href="index.php?ksiega=dziewiata">Księga 9</a></li>
              <li role="presentation"><a href="index.php?ksiega=dziesiata">Księga 10</a></li>
              <li role="presentation"><a href="index.php?ksiega=jedenasta">Księga 11</a></li>
              <li role="presentation"><a href="index.php?ksiega=dwunasta">Księga 12</a></li>
            </ul>
          </div>
        </div>

        <form action="send.php" method="POST">
          <div class="form-group">
            <label for="title">Tytuł refleksji</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="tytuł refleksji">
          </div>
          <div class="form-group">
            <label for="reflection">Treść</label>
            <input type="text" class="form-control" id="reflection" name="reflection" placeholder="treść refleksji">
          </div>

          <button type="submit" class="btn btn-default">Wyślij</button>
        </form>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tytuł</th>
              <th>Refleksje</th>
            </tr>
          </thead>
          <tbody>
             <?php
                $servername = "10.254.94.2";
                $database = "s174328";
                $username = "s174328";
                $password = "9311130874513";

                $connection = pg_connect("host=$servername port=5432 user=$username dbname=$database password=$password");

                if(!$connection){
                  echo "buu";
                } else {
                  $query="SELECT * from reflectionspt;";
                  $result=pg_query($connection, $query);
                  if($result){
                    while ($row = pg_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>".$row[0]."</td>";
                      echo "<td>".$row[1]."</td>";
                      echo "<td>".$row[2]."</td>";
                    }

                  }
                  else{
                    echo "<tr><td colspan=3>Brak danych lub błąd</td></tr>";
                  }
                }
              ?>
          </tbody>
        </table>
      </div>    
    </div>
  </div>


</body>


</html>