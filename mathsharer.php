<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Math Share</title>
    
    <!---Favicon------------------>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-------------End favicon------------------------>
    
    <link href="css/styles.css" rel="stylesheet" type="text/css" > 
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
        showProcessingMessages: false,
        tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
      }); 
    </script> 
    <script src='lib/mathsharer/MathJax.js?config=TeX-MML-AM_CHTML'></script>
<!-----------Script from codecogs-------------------
    <script type="text/javascript" src="http://latex.codecogs.com/editor3.js"></script> -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	
	<!--from pentip-->
	
<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
<meta name="viewport" content="width=700px, initial-scale=1.0" />
    
    
    <meta name="robots" content="INDEX, FOLLOW" />
  
<!-----------------------end codecogs---------------------------------->
</head>
<body>
    <div id="wrapper">
		<div id="edging"> 
            <div id="header">
    <div class="logo">
        <img src="images/LogoBanner.png" alt="browsersharer.com" title="">
    </div>   
</div> 
<div id="topnav">
	<ul>
    	<li class=""><a href="#"> Home </a></li>
    	<li class=""><a href="#"> Code Share</a></li> 
    	<li class="active"><a href="mathsharer.php"> Math Share</a></li> 
    
    	<li class=""><a href="whiteboard/public/index.html" target="_blank"> Whiteboard</a></li> 
    	<li class=""><a href="#"> Help</a></li> 
    </ul>
</div> 
 
            <div id="content" class="mathshare">
                <div class="areaConfig">
                    Share Url : <b style="color: #0000FF;">browsersharer.com/mathsharer.php?user=HuDWNGle</b>
                </div> 
                <div class="areaConfig">
                    <p>Configured delimiters: </p>
                    <table class="table-info">
                        <tr>
                            <td>TeX Inline mode</td><td> : </td><td><code>\(...\)</code> or <code>$...$</code> </td> 
                        </tr>
                        <tr>
                            <td>TeX Display mode</td><td> : </td><td><code>\[...\]</code> or <code> $$...$$</code> </td> 
                        </tr>
                        <tr>
                            <td>Asciimath</td><td> : </td><td><code>`...`</code> </td> 
                        </tr>
                    </table> 
                   <p>
                        	
                        <!----------------------------------------------------------------------------------------------	
                        <br />Click and copy the LaTeX  created from Equation Creator below.
                        	then paste onto the textbox. DO NOT forget to put delimiter <code>($)</code> at the 
                        	beginning and end of the TeX created.<br />
                        --------------------------------------------------------------------------------------->
                   </p> 
                </div>
                <p style="font-size:20px">
                     To make <span style="font-weight: bold; color: red">$X^2 + 3 = 7$: </span> LaTeX  &rarr;  <span style="font-weight: bold; color: red">
					<code>$X^2 + 3 = 7$ </code></span>, or try  <span style="font-weight: bold; color: red"><code>$$X^2 + 3 = 7$$ </code></span> or 
					<span style="font-weight: bold; color: red"><code>`X^2 + 3 = 7`</code></span>
				</p>
                <div style="text-align: left;"> <button type="button" class="btnWarning btnHover" onclick="clearEditor()">Clear Textbox</button> </div>
                <div style="position: relative;margin-bottom: 15px;">
					<div id="working-area" style="border:1px, maroon, solid">
                    <textarea id="textarea">
                        $ asdasd $                     </textarea> 
					 </div>
					 <div id="timer" style="float: right; color:blue; font-size:40px; border:1px, red, solid">
					 <H1>Timer here</h1>
					 </div>
                </div> 
                <div>Output</div> 
                <div style="text-align: left;">
                    <button type="button" class="btnSuccess btnHover" onclick="window.open('mathsharer_print.php?user=HuDWNGle',null,'location=no,menubar=0,resizable=1,width=850,height=650,scrollbars=yes');">Print Result Here</button>  
                </div>  
			
                <div class="mathpreview CssTable">
				<!--	<div>
						<input type="button" class="btn btn2" value="Restart Game" onclick="_Game.Start(MathBuffer);" />
					</div> -->
					<div id="MathPreview" class=MathPreview style="border:1px solid; padding: 3px; width:100%; "></div>
                    <div id="MathBuffer" style="border:1px solid; padding: 3px; width:100%;  
                    visibility:hidden; position:absolute; top:0; left: 0"></div>
					<!-- Start of Pentip ---------------------------------------------------
				
									
						<div>
							<input type="button" class="btn btn1" value="FullScreen" onclick="_Game.Fullscreen();" />
							<input type="button" class="btn btn1" value="Full Width" onclick="_Full_Width();" />
							<input type="button" class="btn btn1" value="Full Height" onclick="_Full_Height();" />
							<input type="button" class="btn btn1" value="Reset Size" onclick="_Reset_Size();" />
						</div>
					
						
						<script type='text/javascript' src='pentip/DrawPenTip.js?v=2840'></script>
						<script type='text/javascript' src='pentip/pentipStyles.js?v=2840'></script>


			--End of Pentip ------------------------------------------------->
			
			
                </div>
				
                <div id="Txs"></div>
                
                    <p style="font-weight:bold; font-size: 24px;">
                        If you are not familiar with LaTeX, you can <a href="createEquation/handleform.php" target="drag-and-drop" >click and copy equation here.</a>
                    </p>
                    <p>
                         <iframe name="drag-and-drop" style="min-width: 800px; height:400px;">
                            
                        </iframe>
                    </p>
<!-------------------------------------------------->
            </div> <!--end content-->
            <script type="text/javascript"> 
             // initialize for js variable 
              var conf = {};
                conf.user = 'HuDWNGle';
            </script> 
            <script src='js/jquery-2.1.1.js' type="text/javascript"></script>  
            <script src='js/mathsharer.js' type="text/javascript"></script>
            <div id="footer">
	<p> &copy;COPYRIGHT 2021 &bull; All Rights Reserved &bull; BrowserSharer &bull; Mount Pleasant, Michigan </p>
</div>
        </div>		
	</div>
	<div id="container">

<!--    <h1><a href="//webrtc.github.io/samples/" title="WebRTC samples homepage">WebRTC samples</a> <span>Peer connection: audio only</span>
    </h1>
-->
    <div id="audio">
        <div>
            <div class="label">Local audio:</div>
            <audio id="audio1" autoplay controls></audio>
        </div>
        <div>
            <div class="label">Remote audio:</div>
            <audio id="audio2" autoplay controls></audio>
        </div>
    </div>

    <div id="buttons">
        <select id="codec">
            <!-- Codec values are matched with how they appear in the SDP.
            For instance, opus matches opus/48000/2 in Chrome, and ISAC/16000
            matches 16K iSAC (but not 32K iSAC). -->
            <option value="opus">Opus</option>
            <option value="ISAC">iSAC 16K</option>
            <option value="G722">G722</option>
            <option value="PCMU">PCMU</option>
        </select>
        <button id="callButton">Call</button>
        <button id="hangupButton">Hang Up</button>
    </div>
    <div class="graph-container" id="bitrateGraph">
        <div>Bitrate</div>
        <canvas id="bitrateCanvas"></canvas>
    </div>
</div>

<script src="audio/js/main.js"></script>
<script src="../../../js/third_party/graph.js"></script>

<script src="../../../../js/lib/ga.js"></script
</body>
</html>
