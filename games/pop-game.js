
//shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return window.requestAnimationFrame || 
         window.webkitRequestAnimationFrame ||
         window.mozRequestAnimationFrame ||
         window.oRequestAnimationFrame ||
         window.msRequestAnimationFrame ||
         function(callback){
           window.setTimeout(callback, 1000 / 60);
         };
})();


//namespace our game

var POP = {
  //setting up initial values
  WIDTH: 320,
  HEIGHT: 480,
  // we'll set the rest of these
  //in the init function
  RATIO: null,
  //store all bubbles touches so on
  entities: [],
  //score to keep progress of stats
  score: {
    taps: 0,
    hit: 0,
    escaped: 0,
    accuracy: 0   
  },
  currentWidth: null,
  currentHeight: null,
  canvas: null,
  ctx: null,
  //amount of game ticks until next bubble
  nextBubble: 100,
  scale: 1,
  offset: {
    top: 0,
    left: 0
  },

  init: function() {
    //the proportion of width to height
    POP.RATIO = POP.WIDTH / POP.HEIGHT;
    //these will change when the screen is resized
    POP.currentWidth = POP.WIDTH;
    POP.currentHeight = POP.HEIGHT;
    //this is our canvas element
    POP.canvas = document.getElementsByTagName('canvas')[0];
    //setting this is important
    //otherwise the browser will
    //default to 320x200
    POP.canvas.width = POP.WIDTH;
    POP.canvas.height = POP.HEIGHT;
    //the canvas context enables us to
    //interact with the canvas api
    POP.ctx = POP.canvas.getContext('2d');

    //we need to sniff out Android and iOS
    // so that we can hide the address bar in
    // our resize function
    POP.ua = navigator.userAgent.toLowerCase();
    POP.android = POP.ua.indexOf('android') > -1 ? true : false;
    POP.ios = (POP.ua.indexOf('iphone') > -1 || POP.ua.indexOf('ipad') > -1) ? true : false;

    //listen for clicks
    window.addEventListener('click', function(e) {
      e.preventDefault();
      POP.Input.set(e);
    }, false);

    //listen for touches
    window.addEventListener('touchstart', function(e) {
      e.preventDefault();
      //the event object has an array named touches
      //we just want the first touch
      POP.Input.set(e.touches[0]);
    }, false);

    window.addEventListener('touchmove', function(e) {
      //we're not interested in this but prevent default behavior
      //so the screen doesn't scroll or zoom
      e.preventDefault();
    }, false);

    window.addEventListener('touchend', function(e) {
      //as above
      e.preventDefault();
    }, false);

    //Drawing shapes
    POP.Draw.clear();
    POP.Draw.rect(120, 120, 150, 150, 'green');
    POP.Draw.circle(100, 100, 50, 'rgba(225,0,0,0.5)');
    POP.Draw.text('Hello World', 100, 100, 10, "#000");

    //we're ready to resize   
    POP.resize();
    
    //Added to continuously loop animations
    POP.loop();

  },

  resize: function() {
    POP.currentHeight = window.innerHeight;
    //resize the width in proportion to the new height
    POP.currentWidth = POP.currentHeight * POP.RATIO;
    //this will create some extra space on the page
    //allowing us to scroll past the address bar thus hiding it
    if (POP.android || POP.ios) {
      document.body.style.height = (window.innerHeight + 50) + 'px';
    }

    //set the new canvas style width and height note:
    //our canvas is still 320 x 400 but we're essentially scaling it with css
    POP.canvas.style.width = POP.currentWidth + 'px';
    POP.canvas.style.height = POP.currentHeight + 'px';
    
       
    POP.scale = POP.currentWidth / POP.WIDTH;
    POP.offset.top = POP.canvas.offsetTop;
    POP.offset.left = POP.canvas.offsetLeft;
    //we use a timeout here because some mobile browsers
    //don't fire if there is not a short delay
    window.setTimeout(function() {
      window.scrollTo(0, 1);
    }, 1);

  },
  
  
  //A function to see where entities will be moved and checked for collisions
  update: function() {
    
    
    //decrease the nextBubble counter
    POP.nextBubble -= 1;
    //if the counter is less than zero
    if (POP.nextBubble < 0){
      //put a new instance of bubble into our entities array
      POP.entities.push(new POP.Bubble());
      //reset the counter with a random value
      POP.nextBubble = (Math.random()*100)+100;
    }
    
    
    var i, checkCollision = false;
    //spawn a new instance of Touch if the user has tapped the screen
    if (POP.Input.tapped){
      
      POP.score.taps += 1; //Keeping track of taps
      
      POP.entities.push(new POP.Touch(POP.Input.x, POP.Input.y));
      //set tapped back to false to avoid new spawning and new touch in the next cycle
      POP.Input.tapped = false;
      checkCollision = true;
    }
    
    //cycle through all entities and update as necessary
    for (i=0; i< POP.entities.length; i += 1){
      POP.entities[i].update();
      
      if (POP.entities[i].type === 'bubble' && checkCollision){
        hit = POP.collides(POP.entities[i], 
                           {x: POP.Input.x, y: POP.Input.y, r: 7});
        
        if (hit) {
          //spawn explosion baby
          for (var n = 0 ; n < 5 ; n += 1){
            POP.entities.push(new POP.Particle(
              POP.entities[i].x,
              POP.entities[i].y,
              2,
              //Random Opacity
              'rgba(255,255,255,' +Math.random()*1 +')'
            ));
          }
          
          
          POP.score.hit += 1;
        }
        
        POP.entities[i].remove = hit;
      }
      
      //Calculating accuracy
      POP.score.accuracy = (POP.score.hit / POP.score.taps) * 100;
      POP.score.accuracy = isNaN(POP.score.accuracy) ? 0 : ~~(POP.score.accuracy); //A handy way to round down floats
      
      //delete from array if remove property flag is set to true
      if (POP.entities[i].remove){
        POP.entities.splice(i,1);
      }
    }
},
  
  //Draw all the entities
  render: function(){
    var i;
    POP.Draw.rect(0, 0, POP.WIDTH, POP.HEIGHT, '#036');
    
    //Drawing score and such
    POP.Draw.text('Hit: '+ POP.score.hit, 20,30,14,'#fff');
    POP.Draw.text('Escaped: '+ POP.score.escaped, 20,50,14,'#fff');
    POP.Draw.text('Accuracy: '+ POP.score.accuracy + '%', 20,70,14,'#fff');
    
    //cycle through all entities and render to canvas
    for (i=0; i < POP.entities.length; i += 1){
      POP.entities[i].render();
    }
  },
  
  //The actual loop requests animation frame
  //then prodceeds to update the render
  loop: function(){
    requestAnimFrame(POP.loop);
    POP.update();
    POP.render();
  }
  
  
};

//abstracts various canvas operations into standalone functions
POP.Draw = {
  clear: function() {
    POP.ctx.clearRect(0, 0, POP.WIDTH, POP.HEIGHT);
  },

  rect: function(x, y, w, h, col) {
    POP.ctx.fillStyle = col;
    POP.ctx.fillRect(x, y, w, h);
  },

  circle: function(x, y, r, col) {
    POP.ctx.fillStyle = col;
    POP.ctx.beginPath();
    POP.ctx.arc(x + 5, y + 5, r, 0, Math.PI * 2, true);
    POP.ctx.closePath();
    POP.ctx.fill();
  },

  text: function(string, x, y, size, col) {
    POP.ctx.font = 'bold' + size + 'px Monospace';
    POP.ctx.fillStyle = col;
    POP.ctx.fillText(string, x, y);
  }

};

POP.Input = {

  x: 0,
  y: 0,
  tapped: false,

  set: function(data) {
      //var offsetTop = POP.canvas.offsetTop,
      //offsetLeft = POP.canvas.offsetLeft;
      scale = POP.currentWidth / POP.WIDTH;

    this.x = (data.pageX - POP.offset.left) / POP.scale;
    this.y = (data.pageY - POP.offset.top) / POP.scale;
    this.tapped = true;

    POP.Draw.circle(this.x, this.y, 10, 'red');
  }

};

//Touch class that draws a circle at the point of contact and fades in and out
POP.Touch = function(x,y) {
  this.type = 'touch';
  this.x = x; //the x coordinate
  this.y = y; //the y coordinate
  this.r = 5; //the radius
  this.opacity = 1; //initial opacity; the dot will fade out
  this.fade = 0.05; //amount by which to fade on each game tick
  this.remove = false; //flag for removing this entity. POP.udate will take care of this
  
  this.update = function() {
    //reduce the opacity accordingly
    this.opacity -= this.fade;
    //if opacity is 0 or less, flag for removal
    this.remove = (this.opacity < 0) ? true : false;
  };
  
  this.render = function() {
    POP.Draw.circle(this.x, this.y, this.r, 'rgba(255,0,0,' +this.opacity+')');
  };
  
};

POP.Bubble = function(){
  this.type = 'bubble';
  this.speed = (Math.random()*3) + 1;
  this.r = (Math.random() * 20) + 10;
  this.x = (Math.random() * (POP.WIDTH) - this.r);
  this.y = POP.HEIGHT + (Math.random() * 100) + 100;
  //creating an oscillating bubble
  this.waveSize = 5 + this.r;
  //we need to remember the original x position for our sine wave calc
  this.xConstant = this.x

  this.remove = false;
  

  this.update = function() {
    
    var time = new Date().getTime()*0.002;
    
    
    this.y -= this.speed;
    this.x = this.waveSize * Math.sin(time) + this.xConstant;
    
    //if off screen, flag for removal
    if (this.y <-10){
      POP.score.escaped += 1; //update score
      this.remove = true; //changing flag
    }
  };
  
  this.render = function() {
    
    POP.Draw.circle(this.x, this.y, this.r, 'rgba(225,225,225,1)');
    
  };
  
};


POP.collides = function(a, b){
  var distance_squared = ( ((a.x - b.x) * (a.x - b.x)) + ((a.y - b.y) * (a.y - b.y))); 
  var radii_squared = (a.r + b.r) * (a.r + b.r);
  
  if (distance_squared < radii_squared){
    return true;
  } else{
    return false;
  }
};

POP.Particle = function (x,y,r, col) {
  
  this.x = x;
  this.y = y;
  this.r = r;
  this.col = col;
  
  //determines whether particle will travel to the right of left 50% chance of either happening
  this.dir = (Math.random() * 2 > 1) ? 1 : -1;
  
  //random values so particle do not travel at the same speeds
  this.vx = ~~(Math.random() * 4) * this.dir;
  this.vy = ~~(Math.random() * 7);
  
  this.remove = false;
  
  this.update = function() {
    //update coordinates
    this.x += this.vx;
    this.y += this.vy;
    
    
    //increase velocity so particle accellerates off screen
    this.vx *= 0.99;
    this.vy *= 0.99;
    
    //adding this negative amount to the y velocity exerts an upward pull on the particel as if drawn oto the surface
    this.vy -= 0.25;
    
    if (this.y < 0){
      this.remove = true
    }
    
    
    
  };
  this.render = function(){
    POP.Draw.circle(this.x,this.y,this.r, this.col);
  };
  
};

var audio = new Audio("pop2.wav");

document.onclick = function() {
  audio.play();
}



window.addEventListener('load', POP.init, false);
window.addEventListener('resize', POP.resize, false);