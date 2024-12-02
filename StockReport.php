<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="format.css">
<link rel="stylesheet" href="format-custom.css">
</head>
<body>
<h2>Stock Rankings<span class="developer">Lamar Burns</span></h2>

<<form>
<label>ranking: </label> <input class="number" type="number" name="ranking" value="15" /> 
<input type="submit" value="query" />
</form> 
<br />
<p> <ol>
<li>highlight (green) companies with a market cap greater or equal to 40 billion dollars </li>
 <li>highlight (red) companies with a market cap less than or equal to .15 billion dollars </li>
 <p>
  <table>
<thead>
  <tr>
<th>rank</th>
<th>symbol</th>
<th>company</th>
<th>quant</th>
<th>sa authors</th>
<th>wall street</th>
<th>market cap in billions</th>
</tr>
</thead>
<tbody>
 <?php 
include( 'function.php');
$file = fopen("./data/TopStocks.csv","r"); 
$count = 0;

$row = fgetcsv(stream: $file);

while(! feof(stream: $file));
{
$row = fgetcsv(stream: $file);
$rank = $row[0];
$symbol = $row[1];
$companyName = $row[2];
$quant = $row[3];
$saAuthors = $row[4];
$wallStreet = $row[5];
$marketCap= $row[6];
?>
<tr class="">
<td><?= $rank ?></td>
<td><?= $symbol ?></td>
<td><?= $companyName ?></td>
<td class="number"><?= qpa($quant) ?></td>
<td class="number"><?= qpa($saAuthors) ?></td>
<td class="number"><?= qpa($wallStreet) ?></td>
<td class="number"><?= money_in_billions ($marketCap) ?></td> 
</tr>

<?php
 $count++;
 if ($count > 30){
 return;
}
 }
fclose($file); ?>
<tbody>
<table>
<body>
<tml>