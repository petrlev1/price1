<?php


//формирование цены
function priceNacenka($price, $procent) {
	
	if ( $price <= 100 ) { $procent = 100; }
			 
			 elseif ( $price > 100 and $price <= 200 ) { $procent = 80; }
				
			 elseif ( $price > 200 and $price <= 350 ) { $procent = 70; }
		
		     elseif ( $price > 350 and $price <= 500 ) { $procent = 60; }
		
		 elseif ( $price > 500 and $price <= 1000 ) { $procent = 50; }
		
		 elseif ( $price > 1000 and $price <= 2000 ) { $procent = 35; }
		
		 elseif ( $price > 2000 and $price <= 3000 ) { $procent = 25; }
		
		 elseif ( $price > 3000 and $price <= 4000 ) { $procent = 20; }
		
		 elseif ( $price > 4000 ) { $procent = 15; }
	
	$FuncPriceNacenka = floor ($price+$price*$procent/100);
	
	return $FuncPriceNacenka;
}


//переименование разделов
function renameCategories ($FuncLine) {
	
	$renameCat = str_replace ( '00-00001840','Анальные стимуляторы -> Интимная гигиена',
			str_replace ('00-00009228','Анальные стимуляторы',
			str_replace ('00-00011099','Анальные стимуляторы -> Керамика',
			str_replace ('00-00000125','Анальные стимуляторы -> С вибрацией',
			str_replace ('00-00011061','Анальные стимуляторы -> Стеклянные',
			str_replace ('00-00000022','Анальные стимуляторы -> Без вибро',
			str_replace ('00-00000026','Анальные стимуляторы -> Стимуляторы простаты',
			str_replace ('00-00000035','Анальные стимуляторы -> Анальные цепочки, шарики',
			$FuncLine
			 ))))))));
			
			return $renameCat;
	
}

	
	
	
	
	


$fp = file_get_contents("test4.csv");

$line = explode( "\n",$fp );
$sumLines = count($line);


for ($i = 0; $i < $sumLines; $i++) {
	
$lineCell = explode( ";",$line[$i] );

$line1 = $lineCell[0].";".$lineCell[1].";".$lineCell[2].";".$lineCell[3].";".$lineCell[4].";".$lineCell[5].";".$lineCell[6].";".$lineCell[7].";".$lineCell[8].";".$lineCell[9].";".$lineCell[10].";".$lineCell[11].";".$lineCell[12].";";

$price = $lineCell[6];

$priceNacenka = priceNacenka($price,$procent);


//переименование разделов
$renameCategories = renameCategories ($line1);
print $renameCategories;



$lineCellImg = explode ( ",",$lineCell[13] );


$sumImg = count($lineCellImg);




// Основная картинка - ставим символ после картинки + убираем кавычки и пробелы
print str_replace ("\"","",trim($lineCellImg[0]));
print "|";



    for ( $x = 1; $x < $sumImg; $x++  ) {
		
	//trim - убирает пробелы и кавычки вначале и в конце строки
	print str_replace ("\"","",trim($lineCellImg[$x])) . ";" . $priceNacenka;; 
	
	
	//убираем последний символ - точнее ставим | везде кроме последней картинки
	$aa = $sumImg - 1;
	if ( $x != $aa ) { print "|"; }
	
    }
	
	print "<br>";
	
	

	
}



?>