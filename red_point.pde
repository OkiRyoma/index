import java.util.*;
ArrayList<Integer> list = new ArrayList<Integer>(); // Listの生成
ArrayList<Integer> list2 = new ArrayList<Integer>(); // List2の生成


void setup(){
  size(300,300);
}

void draw(){
  background(#FFFFFF);
  if(mousePressed == true){
    if(mouseButton == LEFT){
    list.add(mouseX);
    list2.add(mouseY);
    }
    if(mouseButton == RIGHT){
      for(int i = 0; i<list.size(); i++){ // listの大きさ分だけ繰り返し処理
        fill(255,0,0);
        ellipse(list.get(i),list2.get(i),10,10);
      
    }
  }
  }
}
