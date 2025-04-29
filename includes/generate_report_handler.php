<?php
    include "../classes/dbh.php";
    include "../classes/admin_controls.php";

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="gameReport.csv"');

    $handler = new adminHandler();

    $data=$handler->getReport();

    $fp = fopen('php://output', 'wb');
    fputcsv($fp, array('game_id', 'game_name', 'game_genre', 'game_desc', 'total_ratings', 'avg_ratings','total_comments'));

    foreach ( $data as $row ) {
        $arr=array($row['game_id'],
        $row['game_name'],
        $row['game_genre'],
        $row['game_desc'],
        $row['total_ratings'],
        $row['avg_ratings'],
        $row['total_comments']
        );

        fputcsv($fp, $arr);
    }
    fclose($fp);
?>