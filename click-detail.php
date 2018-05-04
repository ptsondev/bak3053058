<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <title>Phát hiện click ảo</title>
    
</head>
 
<body>
    
    <?php 
        require_once('mylib.php');
        $ip = htmlspecialchars($_REQUEST['IP']);
        $results = $db->queryAllRows('SELECT * FROM k_visit WHERE IP=?', $ip);     
        foreach($results as $item){
            echo $item['IP'].' - '.date('H:i:s d/m/y', $item['time']). ' - '.$item['url'].'<br />';
        }
    ?>
    
</body>
</html>