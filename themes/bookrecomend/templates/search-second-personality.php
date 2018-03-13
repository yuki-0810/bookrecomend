<?php
		//二番目にマッチスル性格の特徴を判定
		foreach( $nums as $num_key => $num ){
			$k++;

			if( $second_high_num === $num ){ 

				//キーが一致する特性を判定し、特徴を二つ挿入
				if( $num_key === 'It'){
					foreach( $It_personality as $It ){
						$r++;
						array_push( $show_personality, $It );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ee' ){
					foreach( $Ee_personality as $Ee ){
						$r++;
						array_push( $show_personality, $Ee );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ie' ){
					foreach( $Ie_personality as $Ie ){
						$r++;
						array_push( $show_personality, $Ie );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Es'){
					foreach( $Ee_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Ee_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ee_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ee_personality as $Ii ){
						$r++;
						array_push( $show_personality, $Ii );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}
			}
			if( $k === 2){
				$k = 0;
				break;
			}
		}
		var_dump($show_personality);
?>
