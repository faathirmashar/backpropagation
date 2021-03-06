<HTML>
<HEAD>
<META charset="utf-8">
<TITLE>Backpropagation - Export to CSVL</TITLE>
</HEAD>
<BODY>
<?
include 'google.php'
?>
<H2>Export to CSV</H2>
<P>
This program supports export of the network anatomy and training set to a CSV file. You can load it back later from the New task screen. You can save the file to the SD card (and later copy to your computer) or anywhere else on the local filesystem where this program has access rights. You can also send by an e-mail by some application configured in you Android OS.
</P>
<P>
CSV means 'Comma Separated Values' so it is just a simple text format that can be opened in any text editor and also simply imported into you favorite spreadseet program. Lines started by semicolon character ';' are comments. There is a format version, layer sizes and the training set. The format is sensitive to extra lines, white spaces, extra or missing commas etc. Unlike XML format, current weights status is not stored, so this is just a problem file format, not current training status file format.
</P>
<P>
There are two format of training set: simple and sequence. In the simple there is each element in the format 'i,n,p,u,t,,o,u,t,p,u,t'.
</P>
<PRE>
;Format
CSV2
;Anatomy
2,2,1
;Training set
simple
0.0,0.0,,0.0
0.0,1.0,,1.0
1.0,0.0,,1.0
1.0,1.0,,0.0
</PRE>
<P>
In the sequence network tries to predict the next value(s) from the previous. It is exactly what you should use to predict something with a periodic patern, for example weather water flow or to try (and fail :-) ) to predict for example the next value of EURUSD currency pair... Or lets play with it and predict just the next value of sinus, this would works pretty well. The first number of Anatomy is input dimension and the last one is output dimension, so it is clear how many next values and from how many previous values the networks predict.
</P>
<PRE>
;Format
CSV2
;Anatomy
2,4,1
;Training set
sequence
0.0,0.099833,0.198669,0.29552,0.389418,0.479426,0.564642,0.644218,0.717356,0.783327,0.841471,0.891207,0.932039,0.963558,0.98545,0.997495,0.999574,0.991665,0.973848,0.9463,0.909297,0.863209,0.808496,0.745705,0.675463,0.598472,0.515501,0.42738,0.334988,0.239249,0.14112,0.041581,-0.058374,-0.157746,-0.255541,-0.350783,-0.44252,-0.529836,-0.611858,-0.687766,-0.756802,-0.818277,-0.871576,-0.916166,-0.951602,-0.97753,-0.993691,-0.999923,-0.996165,-0.982453,-0.958924,-0.925815,-0.883455,-0.832267,-0.772764,-0.70554,-0.631267,-0.550686,-0.464602,-0.373877,-0.279415,-0.182163,-0.083089,0.016814,0.116549,0.21512,0.311541,0.40485,0.494113,0.57844,0.656987,0.728969,0.793668,0.850437,0.898708,0.938,0.96792,0.988168,0.998543,0.998941,0.989358,0.96989,0.940731,0.902172,0.854599,0.798487,0.734397,0.662969,0.584917,0.501021,0.412118,0.319098,0.22289,0.124454,0.024775,-0.075151,-0.174327,-0.271761,-0.366479,-0.457536,-0.544021,-0.625071,-0.699875,-0.767686,-0.827826,-0.879696,-0.922775,-0.956635,-0.980936,-0.995436,-0.99999,-0.994553,-0.979178,-0.954019,-0.919329,-0.875452,-0.822829,-0.761984,-0.693525,-0.618137,-0.536573,-0.449647,-0.358229,-0.263232,-0.165604,-0.066322
</PRE>
<?
include 'links.php'
?>
</BODY>
</HTML>

