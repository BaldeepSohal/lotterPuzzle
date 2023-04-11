<?php

class Test {

  public function findValidLotteryNumber($lottoNums)
  {
    
    if ($lottoNums == '') 
      return '';
    
    $results = [];

    foreach($lottoNums as $lottoNum){
      $numLen = strlen((string)$lottoNum);
      $numbers = str_split($lottoNum);
      
      $res = [];
      if($numLen <= 14)
      {

        for ($i = 0; $i < $numLen; $i++) {
          $com =  (int) $numbers[$i].$numbers[$i+1];
            if($numLen > 7 && $com > 0 && $com <= 59){
              $dig = $com;
              $i = $i + 1;
            }else{
              $dig = $numbers[$i];
            }

            if(in_array($dig, $res)){
              // invalid
              break;
            }else{
              $res[] = $dig;
            }

        }
      }

    $results[$lottoNum] = (count($res) == 7) ? implode(' ',$res) : 'invalid';
    }
    return $results;
  }
}

  $test = new Test();

  $numbers=["569815571556", "4938532894754", "1234567", "472844278465445"];
  $result = $test->findValidLotteryNumber($numbers);
  print_r($result);
