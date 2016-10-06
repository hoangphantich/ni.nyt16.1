
<strong>ATM</strong>
<form action="" method="post" accept-charset="utf-8">
	Nhap so tien ban muon rut: <input name="totalMoney">
	<input type="submit" value="submit">
</form>
<?php 

	function atmCounting($money){
		static $avaiable500 = 3;
		static $avaiable200 = 10;
		static $avaiable100 = 20;
		$avaiableMoney= 500*$avaiable500 + 200*$avaiable200 + 100*$avaiable100;
		if($money>$avaiableMoney){
			echo 'ATM ko du tien';
		}
		else{
			$ammount500 = floor($money/500);
			if($ammount500 > $avaiable500){
				$ammount500 = $avaiable500;
			}
			echo 'So to 500k: '.$ammount500.'<br/>';
			$money = $money - $ammount500*500;
			$ammount200 = floor($money/200);
			if($ammount200 > $avaiable200){
				$ammount200 = $avaiable200;
			}
			echo 'So to 200k: '.$ammount200.'<br/>';
			$money = $money - $ammount200*200;

			$ammount100 = floor($money/100);
			if($ammount100 > $avaiable100){
				$ammount100 = $avaiable100;
			}
			echo 'So to 100k: '.$ammount100.'<br/>';
		}
		
	}

	if(isset($_POST["totalMoney"])){
		$totalMoney = $_POST["totalMoney"];
		if($totalMoney < 100 || $totalMoney%100 != 0){
			echo 'so tien ban rut phai lon hon 100k va chia het cho 100k';
		}
		else
		atmCounting($totalMoney);
	}
 ?>