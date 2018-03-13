  nn  = 8;
  num = new Array(nn+1);
  jun = new Array(nn+1);
  a_type = new Array(0,3,6,5,2,4,1,7,8,
                       6,4,8,1,3,7,2,5,
                       4,7,2,3,6,1,5,8,
                       1,7,4,3,5,6,8,2,
                       6,4,8,5,3,7,1,2 );

  str_type = new Array(":","外向的思考タイプ","内向的思考タイプ",
    "外向的感情タイプ","内向的感情タイプ","外向的感覚タイプ","内向的感覚タイプ",
    "外向的直観タイプ","内向的直観タイプ")


function diag(this_form){
  for (var i=1; i<=nn; i++) {
    num[i] = 0;
    jun[i] = i;
  }

  with(this_form) {
    var chk = "\nchk_data:";
    for (var j=1; j<=40; j++) {
      var ename = "q" + j + "_v" ;
      var vv    =  parseInt( elements[ename].value );
      num[a_type[j] ] += vv;
      chk += ename + "=" + vv +"| ";
    }
    for (var i=1; i<=nn; i++) {
      var ename = "d" + i;
      elements[ename].value = num[i] ;
    }

    elements["dd"].value ="";
    var max,mi;
    for (var i=1; i<nn; i++) {
      max=num[i];
      mi = i;
      for (var j=i+1; j<=nn; j++) {
        if(num[j]>max) {
          max=num[j];
          mi  = j;
        }
      }
      jun[mi]= i;         jun[i] = mi;
      num[mi]= num[i];    num[i] = max;
    }

    var doten = 1;
    for (var i=2; i<=nn; i++) {
      if (num[i]==num[i-1]) {
        doten = i;
      }else {
        break;
      }
    }
    var t_str = "";
    for (var i=1; i<=doten; i++) {
      mi = jun[i];
      t_str += "\n　" + str_type[mi];
    }

    elements["dd"].value = "最高点は、" +num[1]+  "でした。\nあなたの性格タイプの候補は、" +t_str+"\nと考えられます。";

//     elements["dd"].value += chk;  // 設問check data
  }
}

function rbtn_clk(this_value,this_name,this_form){
  with(this_form) {
    var ename =   this_name + "_v" ;
    elements[ename].value =  this_value  ;
  }
}

function clr_v(this_form){
  with(this_form) {
    for (var j=1; j<=40; j++) {
      var ename = "q" + j + "_v" ;
      elements[ename].value = 0;
    }
  }
}

