<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Portal ogloszeniowy</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
	<header>
		<h2>Kategorie ogloszen</h2>
	</header>
	<section id="pl">
		<ol>
			<li>Ksiazka</li>
			<li>Muzyka</li>
			<li>Filmy</li>
		</ol>
		<img src="ksiazki.jpg">
		<table>
			<tr>
				<td>Lista ogloszen</td>
				<td>Cena ogloszenia</td>
				<td>Bonus</td>
			</tr>
			<tr>
				<td>1 - 10</td>
				<td>1 PLN</td>
				<td rowspan="3">Subskrypcja newslettera to upust 0.20 na ogloszenie</td>
			</tr>
			<tr>
				<td>11 - 50</td>
				<td>0 - 80 PLN</td>
			</tr>
			<tr>
				<td>51 i wiecej</td>
				<td>0 - 60 PLN</td>
			</tr>
		</table>
	</section>
	<section id="pp">
		<h2>Ogloszenia kategorii ksiazki</h2>
			<?php 
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'ogloszenia');
		$stan1 = mysqli_select_db($id_polaczenia, 'ogloszenia');
		if($stan1 == true) echo "wybrano baze ogloszenia";
		else echo "nie wybrano";
			$zapytanie = 'SELECT ogloszenie.id, tytul, tresc, telefon FROM ogloszenie, uzytkownik WHERE kategoria = 1 AND uzytkownik.id = ogloszenie.uzytkownik_id';
			$id_zapytanie = mysqli_query($id_polaczenia, $zapytanie);
			
			if ($id_zapytanie->num_rows > 0) {
			// output data of each row
				while($row = $id_zapytanie->fetch_assoc()) {
					echo "<h3>". $row["id"]. " " . $row["tytul"]. "</h3><p>" . $row["tresc"] . "</p><p>telefon kontaktowy: " . $row["telefon"] . "</p>";
					}
			} else {
				echo "0 results";
				}
			
		mysqli_close($id_polaczenia);
	?>
	</section>
	<footer>
		<p>Portal ogloszeniowy opracowal/a 01245678910</p>
	</footer>
</body>
</html>