<html>  
	<head> 
		<title>Fisher's Exact Test</title>

<script language="JavaScript">  
// This page can be used to  test statistically whether there is any relation between two categorical variables (with two levels). 
// Fill inn the table and press COMPUTE. 
// Created by: Oyvind Langsrud

// The text above is included for web-robots

//
// Copyright (C) : All right reserved. 
// Contact Oyvind Langsrud for permission.
// 
//

function lngamm(z)
// Reference: "Lanczos, C. 'A precision approximation 
// of the gamma function', J. SIAM Numer. Anal., B, 1, 86-96, 1964."
// Translation of  Alan Miller's FORTRAN-implementation
// See http://lib.stat.cmu.edu/apstat/245
{
  var x = 0;
  x += 0.1659470187408462e-06/(z+7);
  x += 0.9934937113930748e-05/(z+6);
  x -= 0.1385710331296526    /(z+5);
  x += 12.50734324009056     /(z+4);
  x -= 176.6150291498386     /(z+3);
  x += 771.3234287757674     /(z+2);
  x -= 1259.139216722289     /(z+1);
  x += 676.5203681218835     /(z);
  x += 0.9999999999995183;
  return(Math.log(x)-5.58106146679532777-z+(z-0.5)*Math.log(z+6.5));
}



function lnfact(n)
{
  if(n<=1) return(0);
  return(lngamm(n+1));
}

function lnbico(n,k)
{
  return(lnfact(n)-lnfact(k)-lnfact(n-k));
}

function hyper_323(n11,n1_,n_1,n)
{
  return(Math.exp(lnbico(n1_,n11)+lnbico(n-n1_,n_1-n11)-lnbico(n,n_1)));
}


var sn11,sn1_,sn_1,sn,sprob;
function hyper(n11)
{
  return(hyper0(n11,0,0,0));
}

function hyper0(n11i,n1_i,n_1i,ni) 
{
  if(!(n1_i|n_1i|ni))
  {
    if(!(n11i % 10 == 0))
    {
      if(n11i==sn11+1)  
      {
	sprob *= ((sn1_-sn11)/(n11i))*((sn_1-sn11)/(n11i+sn-sn1_-sn_1));
	sn11 = n11i;
	return sprob;
      }
      if(n11i==sn11-1)
      {
	sprob *= ((sn11)/(sn1_-n11i))*((sn11+sn-sn1_-sn_1)/(sn_1-n11i));
	sn11 = n11i;
	return sprob;
      }
    }
    sn11 = n11i;
  }
  else
  {
    sn11 = n11i;
    sn1_=n1_i;
    sn_1=n_1i;
    sn=ni;
  }
  
  
  sprob = hyper_323(sn11,sn1_,sn_1,sn);
  return sprob;
}

var sleft,sright,sless,slarg;
function exact(n11,n1_,n_1,n)
{
  var p,i,j,prob;
  var max=n1_;
  if(n_1<max) max=n_1;
  var min = n1_+n_1-n;
  if(min<0) min=0;
  if(min==max)
  {
    sless = 1;
    sright= 1;
    sleft = 1;
    slarg = 1;
    return 1;
  }
  prob=hyper0(n11,n1_,n_1,n);
  sleft=0;
  p=hyper(min);
  for(i=min+1; p<0.99999999*prob; i++)
  {
    sleft += p;
    p=hyper(i);
  }
  i--;
  if(p<1.00000001*prob) sleft += p;
  else i--;
  sright=0;
  p=hyper(max);
  for(j=max-1; p<0.99999999*prob; j--)
  {
    sright += p;
    p=hyper(j);
  }
  j++;
  if(p<1.00000001*prob) sright += p;
  else j++;
  if(Math.abs(i-n11)<Math.abs(j-n11)) 
  {
    sless = sleft;
    slarg = 1 - sleft + prob;
  } 
  else 
  {
    sless = 1 - sright + prob;
    slarg = sright;
  }
  return prob;
}
var newline="\n";
if (navigator.appVersion.length < 1) newline = "\r\n";
if (navigator.appVersion.lastIndexOf('Win') != -1) newline="\r\n";
   

var left,right,twotail;

function exact22(n11,n12,n21,n22)
{
  var n11_ = parseInt("0"+n11,10);
  var n12_ = parseInt("0"+n12,10);
  var n21_ = parseInt("0"+n21,10);
  var n22_ = parseInt("0"+n22,10);
  if(n11_<0) n11_ *= -1;
  if(n12_<0) n12_ *= -1;
  if(n21_<0) n21_ *= -1;
  if(n22_<0) n22_ *= -1; 
  
  var n1_ = n11_+n12_;
  var n_1 = n11_+n21_;
  var n   = n11_ +n12_ +n21_ +n22_;
  var prob=exact(n11_,n1_,n_1,n);
  left    = sless;
  right   = slarg;
  twotail = sleft+sright;
  if(twotail>1) twotail=1;
  document.write(right.toFixed(5));
}

</script> 
</head> 
  
<body onload="exact22(<?php echo $_GET['p11'];?>,<?php echo $_GET['p12'];?>,<?php echo $_GET['p21'];?>,<?php echo $_GET['p22'];?>)">
</body> 
</html>

