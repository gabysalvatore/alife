<?php

chmod("poll_result.txt", 0777);  // octal; correct value of mode

$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$Griffin = $array[0];
$WingedHorse = $array[1];
$Pegasus = $array[2];

if ($vote == 0) {
  $Griffin = $Griffin + 1;
}
if ($vote == 1) {
  $WingedHorse = $WingedHorse + 1;
}
if ($vote == 2) {
  $Pegasus = $Pegasus + 1;
}

//insert votes to txt file
$insertvote = $Griffin."||".$WingedHorse."||".$Pegasus;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2>Result:</h2>
<table>
<tr>
<td>Griffin:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($Griffin/($Griffin+$WingedHorse+$Pegasus),2)); ?>'
height='20'>
<?php echo(100*round($Griffin/($Griffin+$WingedHorse+$Pegasus),2)); ?>%
</td>
</tr>
<tr>
<td>WingedHorse:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($WingedHorse/($Griffin+$WingedHorse+$Pegasus),2)); ?>'
height='20'>
<?php echo(100*round($WingedHorse/($Griffin+$WingedHorse+$Pegasus),2)); ?>%
</td>
</tr>
<td>Pegasus:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($Pegasus/($Griffin+$WingedHorse+$Pegasus),2)); ?>'
height='20'>
<?php echo(100*round($Pegasus/($Griffin+$WingedHorse+$Pegasus),2)); ?>%
</td>
</tr>
<tr>
</table>
