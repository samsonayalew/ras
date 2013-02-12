var global={
  move_up:function() {
    scroll_clipper.scrollTop = 0;
  },
  move_down:function(){
	  scroll_clipper.scrollTop=100;
  },
  move_left:function(){
	  scroll_clipper.scrollLeft=0;
  },
  move_right:function(){
	  scroll_clipper.scrollLeft=300;
	  //scroll_text.webkitRequestFullScreen();
	  //alert(global.seat);
  },
};