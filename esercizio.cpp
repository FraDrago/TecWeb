#include<iostream>

using namespace std;

main()
{
  int C[6][8];
  int A[6][8];
  bool B[6][8];
  for(int i=0; i<6; i=i+1)
    for(int j=0; j<8; j=j+1)
      cin>>A[i][j];

  for(int i=0; i<6; i=i+1)
    for(int j=0; j<8; j=j+1)
     {
       for (int k=0; k<6; k++)
        q=j;
         if (A[i][j]=!C[k][q])
         {
             
         }
       
       
      //corpo da fare
     
      B[i][j]=//da completere
     } 
  cout<<"start"<<endl;
  for(int i=0; i<6; i=i+1)
   {
    for(int j=0; j<8; j=j+1)
      cout<<B[i][j]<<' ';
    cout<<endl;
   }
  cout<<"end"<<endl;
}
