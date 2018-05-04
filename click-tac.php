<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        
<title>Phát hiện click ảo</title>

    <meta name="description" content="Phát hiện click ảo" />

</head>
 
<body>
    
    <?php 
        require_once('mylib.php');
        $results = $db->queryAllRows('SELECT distinct(IP) FROM k_visit WHERE click_tac=1');     
        foreach($results as $item){
            echo '<a href="/click-detail.php?IP='.$item['IP'].'">'.$item['IP'].'</a><br />';
        }
    ?>
    
</body>
</html>