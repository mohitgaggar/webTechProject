
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style type="text/css">
		body{
			padding:0;
			margin: 0;
			color:#607476;
			background: #fff;
			position: relative;
		}
		header{
			text-align: center;
			height: 320px;
			padding: 100px 0 0 0;
			/*background: #dcdcdc;*/
			/*width: 100vw;
			height: 100vh;*/
			background-image: url("Imagess/alley.jpg");
			background-position: center center;
			background-repeat: no-repeat;
			background-size: cover;
/*			-webkit-filter: blur(2px);
			-moz-filter: blur(2px);*/
		}
		.intro{
			font-family: 'Open Sans', sans-serif;
			width: 80%;
			margin: 0 auto;
		}
		h1{
			text-transform: uppercase;
			font-family: 'Roboto', sans-serif;
		}
		p {
  			margin: 0.75em 0;
  			line-height: 2;
		}
		.part2
		{
			background-color: #dcdcdc;
			padding: 2em 0;
			margin-top: 0;
			padding-left: 10px;
			padding-right: 10px;
			background-size: auto,auto,cover;
		}
		.part2 h2{
			padding:0;
			margin: 0;
		}
		#lastcontent{
			text-align: center;
			height: 170px;
			padding: 50px 0 0 0;
			background: #dcdcdc;
		}
		#one{
background: rgba(85,214,170,.85);
text-align: center;
position: fixed;
z-index:999;
width: 100%;
}
nav{
position: absolute;
text-align: left;
top:100%;
left: 0;
background:rgba(85,214,170,.85);
width: 100%;
transform: scale(1,0);
transform-origin: top;
transition: transform 400ms ease-in-out;
}
nav ul{
margin: 0;
padding:0;
list-style: none;
}
nav li{
margin-bottom: 1em;
margin-left: 1em;
}
nav a{
color: white;
text-decoration: none;
font-size: 1.2rem;
text-transform: uppercase;
opacity: 0;
transition: opacity 150ms ease-in-out ;
}
nav a:hover {
color:#000;
text-decoration:  none;
}
.nav-toggle:checked~nav{
transform: scale(1,1);
}
.nav-toggle:checked ~ nav a{
opacity:1;
transition: opacity 250ms ease-in-out 250ms;
}
.nav-toggle{
display: none;
}
.nav-toggle-label{
position: absolute;
top:0;
left:0;
margin-left: 1em;
height:100%;
display: flex;
align-items: center;
}
.nav-toggle-label span,
.nav-toggle-label span::before,
.nav-toggle-label span::after{
display: block;
background:white;
height: 2px;
width:2em;
border-radius: 2px;
position: relative;
}
.nav-toggle-label span::before,
.nav-toggle-label span::after{
content: "";
position: absolute;
}
.nav-toggle-label span::before{
bottom:7px;
}
.nav-toggle-label span::after{
top:7px;
}
@media screen and (min-width: 1200px)
{
.nav-toggle-label{
display: none;
}
#one{
display: grid;
grid-template-columns: 1fr auto minmax(600px,1fr) 1fr;
}
.logo{
grid-column: 1 / span 1;
}

nav{
all: unset;
grid-column: 3/4;
display: flex;
justify-content: flex-end;
align-items: center;
}
nav a{
opacity: 1;
position: relative;
}
nav ul{
display: flex;
}
nav li{
margin-left: 3em;
margin-bottom: 0;
}
nav a::before{
content: " ";
display: block;
height: 2px;
background:black;
position: absolute;
top: -.75em;
left:0;
right:0;
transform: scale(0,1);
transition: transform ease-in-out 250ms;
}
nav a:hover::before{
transform: scale(1,1);
}
}
.foot{
		 	background: #303036;
		 	color: #d3d3d3;
		 	height: 300px;
		 	position:relative;
		 }
		 .foot .foot-bottom{
		 	background: #343a40;
		 	color: #686868;
		 	height: 15px;
		 	text-align:center;
		 	width:100%;
		 	/*position: absolute;*/
		 	bottom: 10px;
		 	padding-top: 0px;
		 	
		 }
		 .foot .foot-cont .foot-sec{
		 	flex:1;
		 	border: 1px solid white;
		 	padding:20px;
		 }
		 .foot .foot-cont{
		 	height:300px;
		 	border:1px solid red;
		 	display:flex;
		 	width: 100%;
		 }
	</style>