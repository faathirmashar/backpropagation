<HTML>
<HEAD>
<META charset="utf-8">
<TITLE>Backpropagation - Examples</TITLE>
</HEAD>
<BODY>
<?
include '../google.php'
?>
<H3>Hello world examples</H3>
<UL>
<LI>
<B><A HREF="identity">Identity</A></B><BR>
<P>
A very basic hello world example. We simply want the network to return 0 for input 0 and 1 for input 1. Single layer network with just one neuron is used and even this is quite overkill for this task.
</P>
</LI>
<LI>
<B><A HREF="not">NOT</A></B><BR>
<P>
Like previous one, but we switch output values. So it should return 0 for input 1 and 1 for input 0. Single layer network with just one neuron is used and even this is quite overkill for this task.
</P>
</LI>
<LI>
<B><A HREF="and">AND</A></B><BR>
<P>
Compute the logical AND. Unlike previous examples this is 2D to 1D function. Single layer network with just one neuron with two inputs is used.
</P>
<B><A HREF="or">OR</A></B><BR>
<P>
Compute the logical OR. This is very similar to previous example and again single layer network with just one neuron with two inputs is used.
</P>
</LI>
</UL>

<H3>Simple examples</H3>
<UL>
<LI>
<B><A HREF="xor">XOR</A></B><BR>
<P>
Compute the logical XOR. Returns 1 if and only if exactly 1 of two input is 1. A pretty basic example what single layer network cannot do because the classification cannot be done by a single hyperplane (line in our 2D case). This is a very popular problem which caused lot of troubles to neural network research in the past, but it has been solved by the basic backpropagation algorithm very well. We simply use 2 layers. 2 neurons in the first layer make two hyperplanes and the single neuron in the last layer computes AND.
</P>
</LI>
<LI>
<B><A HREF="exception">Exception</A></B><BR>
<P>
Return 1 near some point in 2D and 0 everywhere else. This is slightly more complicated than XOR, but still ok for a basic backpropagation. This task illustrates well the problem of overfitting. The algorithm sometimes tends to use holes in the training set and catch the exception between 2 hyperplanes. This solution produces 0 error in training set but the generalisation is not right. Like in XOR, 2 layers are ok for this task.
</P>
</LI>
<LI>
<B><A HREF="chess">Chessboard 2x2 - 2-2-2-1</A></B><BR>
<P>
We have a chess board 2x2 and we want to return 1 on any pixel of the white field and 0 on any pixel of the black field. Looks but simple it seems to be a challenge for a basic backpropagation. It cannot be done by 1 layer network but also 2 layers is not enough. We must place hyperplanes between the fields (1 layer) and it reduces the problem to XOR (2 more layers). So we need 3 layers to compute this. And it is even worse, there is a pretty deep local minimum of the error function when we place hyperplanes in the first layer like in the basic XOR... Simple problem but hard for the backpropagation algorithm. The current version fails here if the anatomy is 2-2-2-1, but there must be some way to teach the network algoritmically. It is on my TODO list.
</P>
</LI>
<LI>
<B><A HREF="chess2">Chessboard 2x2 - 2-4-2-1</A></B><BR>
<P>
The same but with more neurons in the first layer. Program sometimes sucseed to learn the training set.
</P>
</LI>
<LI>
<B><A HREF="chess3">Chessboard 2x2 - 2-4-2-1 - more elements in the training set</A></B><BR>
<P>
The same but with larger training set. The network sometimes learn the task well and sometimes not.
</P>
</LI>
<LI>
<B><A HREF="3d">Output 3D</A></B><BR>
<P>
All previous task had just 1 dimensional 0 or 1 output. This is a basic task with just several hyperplanes but the output is 3D and it can draw a colorful picture. Just a demonstration that the output can have higher dimension, nothing more.
</P>
</LI>
<LI>
<B><A HREF="identity07">Identity on &lt;0, 7&gt;</A></B><BR>
<P>
Return 0 for 0, 1 for 1, ... and 7 for 7. Just an identity on some interval. Network works well on this example.
</P>
</LI>
</UL>
<H3>Mathematical examples</H3>
<UL>
<LI>
<B><A HREF="plus">Plus</A></B><BR>
<P>
Simply return x + y. Learn from the table and generalize to non training set examples. When trained, you will be able to calculate for example 0.2 + 0.2 and you will get result like 0.39.
</P>
</LI>
<LI>
<B><A HREF="distance">Distance</A></B><BR>
<P>
Calculate a distance of the point in 2D from [0.5, 0.5]. Learn from the table and generalize to non training set examples. This task seems quite hard to learn, it requires some time and sometimes also several attemps. When trained, you will get results like distance(0.0, 0.5) = 0.47 so it works quite well incluiding the generalisation but it is clear that learning should be improved in this case. It is a TODO for me.
</P>
</LI>
<LI>
<B><A HREF="sinus">Sinus</A></B><BR>
<P>
0 to 10 pi of a simple sinus wave. There are no training set examples between 4 pi and 6 pi, so the medium sinus period in the middle is not covered by training set and the task for the network is to generalize. I expected fail of the generalisation here but the program even fails to learn the training set by any way (simply to get the training set error small). What more: each step of the backpropagation takes quite a long time and the other problem is that there are quite many neurons and training set examples. So this sinus task is a total fail of the whole program but also a big TODO for me.
</P>
</LI>
<LI>
<B><A HREF="oddeven">Odd - Even</A></B><BR>
<P>
Returns 1 for odd and 0 for even numbers. The input is simply 1D, the real value of the number scaled to &lt;0, 1&gt;. Training set is from 0 to 6 and the network can learn the training set pretty well. It fails for larger training set and it also fails to generalize for numbers that are not in the training set. Anyway, I would like to know how a common neural network with sigma activation fuction can generalize here...
</P>
</LI>
<LI>
<B><A HREF="oddevenbinary">Odd - Even binary</A></B><BR>
<P>
Returns 1 for odd and 0 for even numbers. The input is an 8 bit encoded binary number. (Idea commes from Bartek Gołąbek.) Unlike the previous example with real number value this is an extremly simple task and even generalisation works well. So please note that result may strongly depend on the input encoding.
</P>
</LI>
</UL>
<H3>Sequence examples</H3>
<P>
In this cases neural network should predict the next value(s) from previous value(s). Training set has a different format, it is just a sequence of numbers a<sub>n</sub> which is interpreted like set of rules (a<sub>i+1</sub>, a<sub>i+2</sub>, ... a<sub>i+k</sub>) -&gt; (a<sub>i+k+1</sub>, a<sub>i+k+2</sub>, ... a<sub>i+k+j</sub>) for each i when it makes sense. For example if training set is 0,0,1,1,0,0,1,1,0,0,1,1 and you give the nework 0,1,1 as an 3D input, it should return  0 as a 1D output. So this approach is useful for the prediction of next value of periodic function or a random variable with some pattern. You can try to predict weather or stock values with this approach.
</P>
<UL>
<LI>
<B><A HREF="001">0, 0, 1, 0, 0, 1, 0, 0, 1</A></B><BR>
<P>
2D to 1D prediction of the periodic function. A simple hello world sequence example.
</P>
</LI>
<LI>
<B><A HREF="sinus2">Sinus sequence</A></B><BR>
<P>
Training set is a sequence of sinus(k * 0.1) and the network task is to predict the next value from previous two. So for example if you put sinus(0.05) and sinus(0.15), you should get sinus(0.25). The first predicted values are ok, but predicting sinus forever does not work.
</P>
</LI>
<LI>
<B><A HREF="sinus3">Long sinus sequence</A></B><BR>
<P>
Training set is a sequence of sinus(k * 0.1) and the network task is to predict the next value from previous nine. So for example if you put sinus(0.05), sinus(0.15), ... and sinus(0.85), you should get sinus(0.95). It seems that it works well.
</P>
</LI>
</UL>
<?
include '../links.php'
?>
</BODY>
</HTML>

