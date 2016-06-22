package Bai1;

import java.util.Scanner;

public class Main {

	static Scanner in = new Scanner(System.in);
	
	public static void main(String[] args) {
		
		System.out.println("Xin moi nhap vao so n:");
		int n = Integer.parseInt(in.nextLine());
		
		Fibonaci fi = new Fibonaci();
		fi.tinhFibo(n);
		System.out.println("\nCount: "+fi.sum);
	}

}
