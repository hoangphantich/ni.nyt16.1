package Bai1;

public class Fibonaci {
	
	int sum = 0;
	public static int fibo(int n){
		if(n == 0) return 0;
		if(n == 1) return 1;
		if(n == 2) return 1;
		return fibo(n - 1) + fibo(n - 2);
		
	}
	
	public void tinhFibo(int n){
		int i = 1;
		while(true){
			if(fibo(i) > n) break;
			System.out.print(fibo(i)+" ");
			sum += fibo(i);
			i++;
		}
		
	}
}
