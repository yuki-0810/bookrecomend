<?php
	define("Associate_tag", "kurami22-22"); // アソシエイトタグ
	define("Access_Key_ID", "AKIAJ2KD7YSDWYUNRSNQ"); // アクセスキー
	define("Secret_Access_Key", "f+ajEf40QQyTwB1CAkuwAz5/7Dryuvau7nQpDDkt"); // シークレットキー

	
	if( $user_type === 'Ot'){
		$i = 0;
		$search_terms_A = array('多動力','生涯投資家','サピエンス全史');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
			    echo "<p><a href=\"" . $item_url . "\" target=\"_blank\">" . $item_title . "</a><br>";
				echo '<img src="' .$item_img. '"/>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}


	//レコメンドブック①
	//$amazon_url = ItemSearch("Books", "影響力");
	//echo '<h1>検索結果</h1><p>'.$amazon_url.'</p>';
    //
	//$amazon_xml=simplexml_load_string(file_get_contents($amazon_url));
	//foreach($amazon_xml->Items->Item as $item) {
	//	$i++;
    //
	//    $item_title = $item->ItemAttributes->Title; // 商品名
	//    $item_url = $item->DetailPageURL; // 商品へのURL
	//	$item_img = $item->MediumImage->URL;
	//         
	//    echo "<p><a href=\"" . $item_url . "\" target=\"_blank\">" . $item_title . "</a><br>";
	//	echo '<img src="' .$item_img. '"/>';
    //
	//	if( $i >= 1){
	//		$i = 0; 
	//		break; 
	//	}

?>
