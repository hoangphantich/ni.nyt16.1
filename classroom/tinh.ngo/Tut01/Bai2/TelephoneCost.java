package Bai2;

public class TelephoneCost {
	
	public static int cost2(int n){
		int sum = 0;
		if(n < 50){
			sum += n * 600;
		}else
		if( n >= 50 && n < 150){
			sum += 50 * 600;
			n -= 50;
			sum = 400 * n;
			
		}else{
			
			sum += 600 * 50;
			sum += 400 * 150;
			n -= 150;
			sum += n * 200;
		}
		
		return sum + 25000;
	}
	
	public static int cost1(int n){
		int sum = 0;
		if( n > 50){
			sum += 50 * 600;
		}
		if( n > 150){
			sum += 150 * 400;
		}
		if( n > 200){
			sum += 100 * 200;
		}
		return sum + 25000;
	}
}
