<?php
	//受け取った数値
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$q6 = $_POST['q6'];
	$q7 = $_POST['q7'];
	$q8 = $_POST['q8'];
	$q9 = $_POST['q9'];
	$q10 = $_POST['q10'];
	$q11 = $_POST['q11'];
	$q12 = $_POST['q12'];
	$q13 = $_POST['q13'];
	$q14 = $_POST['q14'];
	$q15 = $_POST['q15'];
	$q16 = $_POST['q16'];
	$q17 = $_POST['q17'];
	$q18 = $_POST['q18'];
	$q19 = $_POST['q19'];
	$q20 = $_POST['q20'];
	$q21 = $_POST['q21'];
	$q22 = $_POST['q22'];
	$q23 = $_POST['q23'];
	$q24 = $_POST['q24'];
	$q25 = $_POST['q25'];
	$q26 = $_POST['q26'];
	$q27 = $_POST['q27'];
	$q28 = $_POST['q28'];
	$q29 = $_POST['q29'];
	$q30 = $_POST['q30'];
	$q31 = $_POST['q31'];
	$q32 = $_POST['q32'];
	$q33 = $_POST['q33'];
	$q34 = $_POST['q34'];
	$q35 = $_POST['q35'];
	$q36 = $_POST['q36'];
	$q37 = $_POST['q37'];
	$q38 = $_POST['q38'];
	$q39 = $_POST['q39'];
	$q40 = $_POST['q40'];


	//各質問ごとに値を合算し、その性格タイプの変数に代入
	$Outgoing_thinking = $q6+$q12+$q22+$q25+$q39;
	$Introverted_thinking = $q4+$q15+$q19+$q32+$q40;
	$Extroverted_emotion = $q1+$q13+$q20+$q28+$q37;
	$Introverted_emotion = $q5+$q10+$q17+$q27+$q34;
	$Extroverted_sensation = $q3+$q16+$q23+$q29+$q36;
	$Introverted_sensation = $q2+$q9+$q21+$q30+$q33;
	$Extrovert_intuition = $q7+$q14+$q18+$q26+$q38;
	$Introvert_intuition = $q8+$q11+$q24+$q31+$q35;

	//ユーザーの性格タイプを定義
	$user_type = '';

	//計算されたタイプ数値を配列に格納し、大きい順にソート
	$nums = array( "Ot" => $Outgoing_thinking, 
				   "It" => $Introverted_thinking, 
				   "Ee" => $Extroverted_emotion, 
				   "Ie" => $Introverted_emotion, 
				   "Es" => $Extroverted_sensation, 
				   "Is" => $Introverted_sensation, 
				   "Ei" => $Extrovert_intuition, 
				   "Ii" => $Introvert_intuition
			);

	//$unique_nums = array_unique($nums);
	arsort($nums);
	
	$highest_num = current(array_slice($nums, 1, 1, true));
	$second_high_num = current(array_slice($nums, 2, 1, true));

	//表示させる性格を配列に格納
	$show_personality = array();

	$Ot_personality = array( "読書好き", "客観的に物事を判断", "行動力がある", "忙しくしたがり", "感情表現が苦手", "浮気しない" );
	$It_personality = array( "理想主義", "超論理的思考", "こだわりが強い", "独創的", "強情だと思われる", "女性に優しい" );
	$Ee_personality = array( "社交スキルが高い", "友達が多い", "相手に合わせる", "他人を喜ばせる", "コミュニティが広い", "心配性", "不安になりやすい" );
	$Ie_personality = array( "内向的", "好き嫌いが激しい", "どことなく神秘的", "落ち着いてる", "一人の時間も欲しい", "感情豊か", "几帳面" );
	$Es_personality = array( "直観的", "観察力がある", "浪費家タイプ", "流行に敏感", "他人に影響されやすい", "美食家" );
	$Is_personality = array( "おっとりしてる", "芸術家気質", "ミステリアス", "口下手", "方向音痴", "アイディアマン", "作家タイプ" );
	$Ei_personality = array( "投資家気質", "天才肌", "食欲や性欲がうすい", "自然大好き", "自由奔放", "飽き性", "新しいもの好き" );
	$Ii_personality = array( "カンが強い", "実は天才", "人から理解されない", "食欲性欲があまりない", "いばりたい", "性的なことが苦手" );


	//配列内の要素をシャッフル
	shuffle($Ot_personality);
	shuffle($It_personality);
	shuffle($Ee_personality);
	shuffle($Ie_personality);
	shuffle($Es_personality);
	shuffle($Is_personality);
	shuffle($Ei_personality);
	shuffle($Ii_personality);

	//インディケーター
	$l = 0;
	$r = 0;
	$k = 0;

	//一番マッチした性格の特徴を判定
	if( $highest_num === $Outgoing_thinking ){
		$user_type = 'Ot';
		echo '<p class="type-display">外向的思考タイプ</p>';
		echo '<p class="type-description">客観的な事実を重要視して、それに基づいて筋道をたてて考えるタイプの人。自分の考えよりも客観的事実の方が大事で、感情表現が苦手。男性に多い。女性ではごくわずか。</p>';

		//表示させる４つの性格の特徴を配列に格納	
		foreach( $Ot_personality as $Ot ){
			$l++;
			array_push( $show_personality, $Ot );
			if( $l === 4 ){ 
				$l = 0;
				unset($nums[$user_type]);
				break;
			}
		}
			
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
					foreach( $Es_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Is_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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

	}elseif( $highest_num === $Introverted_thinking ){
		$user_type = 'It';
		echo '<p class="type-display">内向的思考タイプ</p>';
		echo '<p class="type-description">自分自身の心の中に浮かび上がる考えを 筋道立てて追うのが得意な人。 新しい事実の発見よりも新しい考え方の発明の方が大事。感情面が未発達のことが多い。 男性に多い。 </p>';
		foreach( $It_personality as $It ){
			$l++;
			array_push( $show_personality, $It );
			if( $l === 4 ){ 
				unset($nums["$user_type"]);
				$l = 0;  
				break; 
			}
		}

		//二番目にマッチスル性格の特徴を判定
		foreach( $nums as $num_key => $num ){
			$k++;

			if( $second_high_num === $num ){ 
				//キーが一致する特性を判定し、特徴を二つ挿入
				if( $num_key === 'Ot'){
					foreach( $Ot_personality as $Ot ){
						$r++;
						array_push( $show_personality, $Ot );
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
					foreach( $Es_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Is_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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

	}elseif( $highest_num === $Extroverted_emotion ){
		$user_type = 'Ee';
		echo '<p class="type-display">外交的感情タイプ</p>';
		echo '<p class="type-description">どこでどういう感情を使ったらよいかよく知っており、 自分の感情をよくコントロールし、周囲の状況をよく理解して、 他人と良い関係を保つことが得意な人。社交上手。 しかし、哲学など理屈を考えるのは全く苦手。 女性に多い。男性にも見かける。</p>';

		foreach( $Ee_personality as $Ee ){
			$l++;
			array_push( $show_personality, $Ee );
			if( $l === 4 ){ 
				$l = 0;  
				unset($nums["$user_type"]);
				break; 
			}
		}
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
				}elseif( $num_key === 'Ot' ){
					foreach( $Ot_personality as $Ot ){
						$r++;
						array_push( $show_personality, $Ot );
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
					foreach( $Es_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Is_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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

	}elseif( $highest_num === $Introverted_emotion ){
		$user_type = 'Ie';
		echo '<p class="type-display">内向的感情タイプ</p>';
		echo '<p class="type-description">心の中に好き嫌いの判断を持っていて、 自分の心の中に描いた心像に忠実であるが、それと関係ない人たちを 全く無視してしまうので、自己中心的で、時に傲慢な印象を与える。 感情面にすばらしい判断力を持っているが、その表現力が不十分で、周囲に誤解されやすいといえる。 思考面が未発達のことがおおい。 女性に多い。 </p>';

		foreach( $Ie_personality as $Ie ){
			$l++;
			array_push( $show_personality, $Ie );
			if( $l === 4 ){ 
				$l = 0;  
				unset($nums["$user_type"]);
				break; 
			}
		}
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
				}elseif( $num_key === 'Ot' ){
					foreach( $Ot_personality as $Ot ){
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
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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
	}elseif( $highest_num === $Extroverted_sensation ){
		$user_type = 'Es';
		echo '<p class="type-display">外交的感覚タイプ</p>';
		echo '<p class="type-description">現実の人や物事に対して、具体的に身体的感覚で 感じ取ることが得意な人。色や形によいセンスを持っている。 しかし、直感的総合力には欠ける。 男性にも女性にもいる。 </p>';

		foreach( $Ee_personality as $Es ){
			$l++;
			array_push( $show_personality, $Es );
			if( $l === 4 ){ 
				$l = 0; 
				unset($nums["$user_type"]);
				break; 
			}
		}
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
				}elseif( $num_key === 'Ot'){
					foreach( $Ot_personality as $Ot ){
						$r++;
						array_push( $show_personality, $Ot );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Is_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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
	}elseif( $highest_num === $Introverted_sensation){
		$user_type = 'Is';
		echo '<p class="type-display">内向的感覚タイプ</p>';
		echo '<p class="type-description">外からの刺激をじっくりと自分の感覚に吸収し、取り込むが、 それを、すぐには表現しない、または、その人自身の主観的印象が主体となってしまう ので、誤解を受けやすい。直観による将来的見通しが全く苦手で、概して方向音痴。 </p>';

		foreach( $Is_personality as $Is ){
			$l++;
			array_push( $show_personality, $Is );
			if( $l === 4 ){ 
				$l = 0;  
				unset($nums["$user_type"]);
				break; 
			}
		}
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
					foreach( $Es_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ot'){
					foreach( $Ot_personality as $Ot ){
						$r++;
						array_push( $show_personality, $Ot );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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
	}elseif( $highest_num === $Extrovert_intuition){
		$user_type = 'Ei';
		echo '<p class="type-display">外向的直観タイプ</p>';
		echo '<p class="type-description">直観は、直接無意識に根ざしている心機能で、 周囲の人やものや将来の見通しなどにカンが働く。流行に敏感。 感覚が未発達なので、周囲のものごとをじっくり捕らえることが出来ない。 どちらかというと女性に多くみられる。 </p>';

		foreach( $Ei_personality as $Ei ){
			$l++;
			array_push( $show_personality, $Ei );
			if( $l === 4 ){ 
				$l = 0;  
				unset($nums["$user_type"]);
				break; 
			}
		}
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
					foreach( $Es_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Is_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ot'){
					foreach( $Ot_personality as $Ot ){
						$r++;
						array_push( $show_personality, $Ot );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ii'){
					foreach( $Ii_personality as $Ii ){
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
	}elseif( $highest_num === $Introvert_intuition){
		$user_type = 'Ii';
		echo '<p class="type-display">内向的直観タイプ</p>';
		echo '<p class="type-description">カンがよく将来の見通しなどもよく見えるが、そのカンは外の社会には向けられず、もっぱら心の内に向かっている。 弱点は感覚で、まわりの状況や事実をよく見ようとしない。 </p>';
		foreach( $Ii_personality as $Ii ){
			$l++;
			array_push( $show_personality, $Ii );
			if( $l === 4 ){ 
				$l = 0;  
				unset($nums["$user_type"]);
				break; 
			}
		}
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
					foreach( $Es_personality as $Es ){
						$r++;
						array_push( $show_personality, $Es );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Is'){
					foreach( $Is_personality as $Is ){
						$r++;
						array_push( $show_personality, $Is );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ei'){
					foreach( $Ei_personality as $Ei ){
						$r++;
						array_push( $show_personality, $Ei );
						if( $r === 2){
							$r = 0;
							break;
						}
					}
				}elseif( $num_key === 'Ot'){
					foreach( $Ot_personality as $Ot ){
						$r++;
						array_push( $show_personality, $Ot );
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
	}else{
		$user_type = 'Ot';
		echo '<p class="type-display">外向的思考タイプ</p>';
		echo '<p class="type-description">客観的な事実を重要視して、それに基づいて筋道をたてて考えるタイプの人。自分の考えよりも客観的事実の方が大事で、感情表現が苦手。男性に多い。女性ではごくわずか。</p>';

		foreach( $Ot_personality as $Ot ){
			$l++;
			array_push( $show_personality, $Ot );
			if( $l === 6 ){ 
				$l = 0;  
				break; 
			}
		}
	}
?>

	<!--立方体キューブを表示-->
	<section class="cube-wrap">
		<div class="cube">
		  <div class="surface front"><?php echo $show_personality[0]; ?></div>
		  <div class="surface right"><?php echo $show_personality[1]; ?></div>
		  <div class="surface left"><?php echo $show_personality[2]; ?></div>
		  <div class="surface top"><?php echo $show_personality[3]; ?></div>
		  <div class="surface bottom"><?php echo $show_personality[4]; ?></div>
		  <div class="surface back"><?php echo $show_personality[5]; ?></div>
		</div>
	</section>

<?php

	//APIで書籍レコメンド
	define("Associate_tag", "kurami22-22"); // アソシエイトタグ
	define("Access_Key_ID", "AKIAJ2KD7YSDWYUNRSNQ"); // アクセスキー
	define("Secret_Access_Key", "f+ajEf40QQyTwB1CAkuwAz5/7Dryuvau7nQpDDkt"); // シークレットキー

	
	if( $user_type === 'Ot'){
		echo '<br/><h2>おすすめの書籍</h2>';
		echo '<div class="amazon-wrap">';

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
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
		echo '</div>';
	}elseif( $user_type === 'It'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('論理的','感情','発明原理');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}elseif( $user_type === 'Ee'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('八方美人','社交','不安');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}elseif( $user_type === 'Ie'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('内向的','時間術','コミュニケーションスキル');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}elseif( $user_type === 'Es'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('直観','全部レンチン','幸福の「資本」論');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}elseif( $user_type === 'Is'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('口下手','デザイン思考','行為のデザイン');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}elseif( $user_type === 'Ei'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('生涯投資','食欲のつくり方','自由人3.0');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}elseif( $user_type === 'Ii'){
		echo '<br/><h2>おすすめの書籍</h2>';
		$i = 0;
		$search_terms_A = array('伝え方が９割','「性別が、ない! 」人たちの保健体育','サピエンス全史');

		foreach( $search_terms_A as $term){
			$amazon_url = ItemSearch("Books", $term);
			$amazon_xml = simplexml_load_string(file_get_contents($amazon_url));
			foreach($amazon_xml->Items->Item as $item) {
				$i++;
    		
			    $item_title = $item->ItemAttributes->Title; // 商品名
			    $item_url = $item->DetailPageURL; // 商品へのURL
				$item_img = $item->MediumImage->URL;
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}else{
		echo '<br/><h2>おすすめの書籍</h2>';
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
			         
				echo '<a class="amazon-link" href="' . $item_url . '" ><img class="amazon-img" src="' .$item_img. '"/></a>';
    		
				if( $i >= 1){
					$i = 0;
					break; 
				}
			}	
		}
	}
?>  

