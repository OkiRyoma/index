String[] lines;

void setup(){
  lines = loadStrings("test.txt");
  
  for(int i = 0; i < lines.length ; i++){
    println(lines[i]);
  }
}
