<?php
    $vote = $_REQUEST['vote'];

    //get content of textfile
    $filename = "./poll/poll_result.txt";  // temp
    $filename2 = "./poll/selected.txt";      // temp
    $content = file($filename);
    $content2 = file($filename2);

    //put content in array
    $array = explode("||", $content[0]);
    $array2 = explode("|", $content2[0]);
    $a = $array[0];
    $b = $array[1];
    $c = $array[2];

    if ($vote == 0) {
        $a = $a + 1;
    }
    if ($vote == 1) {
        $b = $b + 1;
    }
    if ($vote == 2) {
        $c = $c + 1;
    }

   //insert votes to txt file
    $insertvote = $a."||".$b."||".$c;
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
                width='<?php echo(100*round($a/($b+$a+$c),2)); ?>'
                height='20'>
                <?php echo(100*round($a/($b+$a+$c),2)); ?>%
            </td>
        </tr>
        <tr>
            <td><?php echo($array2[1]);?></td>
            <td>
                <img src="./img/poll.gif"
                width='<?php echo(100*round($b/($b+$a+$c),2)); ?>'
                height='20'>
                <?php echo(100*round($b/($b+$a+$c),2)); ?>%
            </td>
        </tr>
        <tr>
            <td><?php echo($array2[2]);?></td>
            <td>
                <img src="./img/poll.gif"
                width='<?php echo(100*round($c/($b+$a+$c),2)); ?>'
                height='20'>
                <?php echo(100*round($c/($b+$a+$c),2)); ?>%
            </td>
        </tr>
    </table>