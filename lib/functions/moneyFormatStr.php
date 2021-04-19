<?php

function moneyFormatStr($value) {
		if (strlen($value)>3) {
			$u = strlen($value);
			$n = "";
			$sz = 0;
			for ($m=1;$m<$u+1;$m++) {
				$sz++;
				$n = substr($value,($u-$m),1).$n;
				if ($sz==3) {
					$n = " ".$n;
					$sz = 0;
				}
			}
			return $n.'';
		} else {
			if ($value=="") {
				$n='';
			} else {
				$n = $n.'';
			}
			return $n;
		}
}

?>
