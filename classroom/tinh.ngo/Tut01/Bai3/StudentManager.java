package Bai3;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Scanner;

public class StudentManager {
	
	Scanner inp = new Scanner(System.in);
	ArrayList<Student> listST = new ArrayList<Student>();
	
	
	public void inputStudent(){
		
		System.out.println("Nhap vao tong so sinh vien can quan ly: ");
		int n = Integer.parseInt(inp.nextLine());
		
		for(int i = 0; i < n; i++){
			Student st = new Student();
			st.id = i;
			System.out.println("Xin moi nhap ten: ");
			st.name = inp.nextLine();
			System.out.println("Xin moi nhap ngay sinh: ");
			st.birthday = inp.nextLine();
			listST.add(st);
		}
	}
	
	public void inputMark(){
		System.out.println("-----------------------------------------------------");
		for (Student student : listST) {
			
			System.out.println("Sinh vien: "+student.name);
			System.out.println("xin moi sua diem Win Mark: ");
			student.winmark = Integer.parseInt(inp.nextLine());
			System.out.println("xin moi sua diem Word Mark: ");
			student.wordmark = Integer.parseInt(inp.nextLine());
			System.out.println("xin moi sua diem Jira Mark: ");
			student.jiramark = Integer.parseInt(inp.nextLine());
			
		}
	}
	
	public void sumStudent(){
		
		for (Student student : listST) {
			student.sum = student.winmark + student.wordmark + student.jiramark;
			if(student.sum < 18){
				student.rank = "Average";
			}else{
				if(24 > student.sum && student.sum>= 18){
					student.rank = "Good";
				}else{
					if(student.sum >= 24){
						student.rank = "Exellence";
					}
				}
			}
		}
	}
	
	public void sortStudent(int n){
		// Sap xep theo diem n = 1
		Collections.sort(listST,new Comparator<Student>() {

			@Override
			public int compare(Student o1, Student o2) {
				int values = o1.sum - o2.sum;
				return values;
			}
			
		});
	}
	
	public void printStudent1(){
		System.out.println("-----------------------------------------------------");
		System.out.println("STT"+"            "+"Name"+"                   "+"Bithday");
		for (Student student : listST) {
			System.out.println(student.id+"              "+student.name+"          "+student.birthday);
		}
	}
	
	public void printStudent2(){
		System.out.println("-----------------------------------------------------");
		System.out.println("STT"+"            "+"Name"+"                   "+"Bithday" + "     "+"Sum"+"   "+"Rank");
		for (Student student : listST) {
			System.out.println(student.id+" "+student.name+"              "+student.birthday+"            "+student.sum+"             "+student.rank);
		}
	}
	
	
}
