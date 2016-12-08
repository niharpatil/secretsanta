//canvas init
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

// var cur = new Image();
// cur.src = "images/santahat.png"

//canvas dimensions
var W = window.innerWidth;
var H = window.innerHeight;
canvas.width = W;
canvas.height = H;

var mouseX = 0;
var mouseY = 0;
var mouseR = 5;

document.onmousemove = getMouseXY;
function getMouseXY(e){
	mouseX = e.pageX;
	mouseY = e.pageY;	
}

//snowflake particles
var mp = 30; //max particles
var particles = [];
var exploding_particles = [];

var Particle = function(r,d){
	this.x = Math.random()*W,
	this.y = Math.random()*H,
	this.r = Math.random()*4+1,
	this.d = Math.random()*mp
};

for(var i = 0; i < mp; i++)
{	
	particles.push(new Particle());
}


// draw the flakes
function draw()
{
	ctx.clearRect(0, 0, W, H);
	
	ctx.fillStyle = "#bbdefb";
	ctx.beginPath();

	ctx.moveTo(mouseX,mouseY);
	ctx.arc(mouseX,mouseY,mouseR,0,Math.PI*2,true);
	ctx.fill();

	particles.forEach(function(p,i){
		ctx.moveTo(p.x, p.y);
		ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, true);
		ctx.fill();
		if((p.x > mouseX-mouseR && p.x < mouseX+mouseR)
		 &&(p.y > mouseY-mouseR && p.y < mouseY+mouseR)){
		 	mouseR = Math.sqrt(p.r*p.r + mouseR*mouseR);
			particles.splice(i,1);
			particles.push(new Particle());
			// exploding_particles.forEach(function(ep){
			// 	ctx.moveTo(p.x, p.y);
			// 	ctx.arc(p.x + 10 + i, p.y, ep.r, 0, Math.PI*2, true);
			// 	ctx.fill();
			// 	i++;
			// });
		}
	});

	update();
}

//Function to move the snowflakes
//angle will be an ongoing incremental flag. Sin and Cos functions will be applied to it to create vertical and horizontal movements of the flakes
var angle = 0;
function update()
{
	exploding_particles.forEach(function(p){
		p.y += -5;
		p.x += -10;
	});
	//getMouseXY();
	angle += 0.01;
	for(var i = 0; i < mp; i++)
	{
		var p = particles[i];
		//Updating X and Y coordinates
		//We will add 1 to the cos function to prevent negative values which will lead flakes to move upwards
		//Every particle has its own density which can be used to make the downward movement different for each flake
		//Lets make it more random by adding in the radius
		p.y += Math.cos(angle+p.d) + 1 + p.r/2;
		p.x += Math.sin(angle) * 2;
		
		//Sending flakes back from the top when it exits
		//Lets make it a bit more organic and let flakes enter from the left and right also.
		if(p.x > W+5 || p.x < -5 || p.y > H)
		{
			if(i%3 > 0) //66.67% of the flakes
			{
				particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d};
			}
			else
			{
				//If the flake is exiting from the right
				if(Math.sin(angle) > 0)
				{
					//Enter from the left
					particles[i] = {x: -5, y: Math.random()*H, r: p.r, d: p.d};
				}
				else
				{
					//Enter from the right
					particles[i] = {x: W+5, y: Math.random()*H, r: p.r, d: p.d};
				}
			}
		}
	}
}



