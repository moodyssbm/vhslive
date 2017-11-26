<?php
    $vote = $_REQUEST['vote'];

    //get content of textfile
    $filename = "poll_result.txt";
    $filename2 = "/home/pi/Documents/Code/Electron/media-entry/data/selected.csv";
    $content = file($filename);
    $content2 = file($filename2);

    //put content in array
    $array = explode("||", $content[0]);
    $array2 = explode("|", $content2[0]);
    $yes = $array[0];
    $no = $array[1];

    if ($vote == 0) {
        $yes = $yes + 1;
    }
    if ($vote == 1) {
        $no = $no + 1;
    }

   //insert votes to txt file
    $insertvote = $yes."||".$no;
    $fp = fopen($filename,"w");
    fputs($fp,$insertvote);
    fclose($fp);
?>

<h2>Result:</h2>
    <table>
        <tr>
            <td><?php echo($array2[0]);?></td>
            <td>
                <img src="./img/poll.gif"
                width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
                height='20'>
                <?php echo(100*round($yes/($no+$yes),2)); ?>%
            </td>
        </tr>
        <tr>
            <td><?php echo($array2[1]);?></td>
            <td>
                <img src="./img/poll.gif"
                width='<?php echo(100*round($no/($no+$yes),2)); ?>'
                height='20'>
                <?php echo(100*round($no/($no+$yes),2)); ?>%
            </td>
        </tr>
    </table>