<?php

# === api
# ==================================================

# busca usuarios em nome
$app->get('/users/name', function() use ($app) {

  $name = $app->request->get('n');
  if ( $name ) {
    $results = [];

    $toDisplay = 0;
    $perPage = 15;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $count = Users::where('name','LIKE',"%{$name}%")->count();
    $totalPages = ceil($count / $perPage);

    # execucao da busca
    $results = Users::where('name','LIKE',"%{$name}%")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia1 WHERE id = users.id))")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia2 WHERE id = users.id))")
    ->orderByRaw("name LIMIT ?, ?", [$startAt, $perPage])
    ->get();
  
    
    # paginacao
    $firstPage = "<a href='http://localhost/pp/users/name?n=$name&page=1'>First page</a> ";
    $lastPage = "<a href='http://localhost/pp/users/name?n=$name&page=$totalPages'>Last page ($totalPages)</a> ";;
    echo $firstPage, "\n";

    # pagina possui anterior
    if($page > 1) { 
      $toDisplay = $page - 1;
      $previousPage = "<a href='http://localhost/pp/users/name?n=$name&page=$toDisplay'>Previous page ($toDisplay)</a> ";

      echo $previousPage, "\n";
      # pagina possui anterior e proximo
      if($page < $totalPages) { 
        $toDisplay = $page + 1;
        $nextPage = "<a href='http://localhost/pp/users/name?n=$name&page=$toDisplay'>Next page ($toDisplay)</a> ";
      echo $nextPage, "\n";
      }

      # pagina possui apenas proximo
    } else if ($page < $totalPages){ 
        $toDisplay = $page + 1;
        $nextPage = "<a href='http://localhost/pp/users/name?n=$name&page=$toDisplay'>Page $toDisplay</a> "; 
        echo $nextPage, "\n";
      }
    echo $lastPage, "\n";

    $message = $count . ' results';
    return helpers::jsonResponse(false, $message, $results );
  }

});

# busca usuarios em username
$app->get('/users/username', function() use ($app) {

  $username = $app->request->get('u');
  if ( $username ) {
    $results = [];
    $toDisplay = 0;
    $perPage = 15;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $count = Users::where('username','LIKE',"%{$username}%")->count();
    $totalPages = ceil($count / $perPage);

    # execucao da busca
    $results = Users::where('username','LIKE',"%{$username}%")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia1 WHERE id = users.id))")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia2 WHERE id = users.id))")
    ->orderByRaw("name LIMIT ?, ?", [$startAt, $perPage])
    ->get();
     
    
    # paginacao
    $firstPage = "<a href='http://localhost/pp/users/name?n=$username&page=1'>First page</a> ";
    $lastPage = "<a href='http://localhost/pp/users/name?n=$username&page=$totalPages'>Last page ($totalPages)</a> ";;
    echo $firstPage, "\n";

    # pagina possui anterior
    if($page > 1) { 
      $toDisplay = $page - 1;
      $previousPage = "<a href='http://localhost/pp/users/name?n=$username&page=$toDisplay'>Previous page ($toDisplay)</a> ";

      echo $previousPage, "\n";
      # pagina possui anterior e proximo
      if($page < $totalPages) { 
        $toDisplay = $page + 1;
        $nextPage = "<a href='http://localhost/pp/users/name?n=$username&page=$toDisplay'>Next page ($toDisplay)</a> ";
      echo $nextPage, "\n";
      }

      # pagina possui apenas proximo
    } else if ($page < $totalPages){ 
        $toDisplay = $page + 1;
        $nextPage = "<a href='http://localhost/pp/users/name?n=$username&page=$toDisplay'>Page $toDisplay</a> "; 
        echo $nextPage, "\n";
      }
    echo $lastPage, "\n";

    $message = $count . ' results';
    return helpers::jsonResponse(false, $message, $results );
  }

});

$app->get('/', function() use ($app) {});
