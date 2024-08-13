
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ url('home/js/bootstrap.min.js')}}"></script>    
<script src="{{ url('home/js/popper.min.js')}}"></script> 
<script src="{{ url('home/js/owl.carousel.min.js')}}"></script>   
<script src="{{ url('home/js/main.js')}}"></script>
<script src="{{ url('home/js/wow.min.js')}}"></script>
<script>
  new WOW().init();
</script>
<script>
  wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
</script>

@livewireScripts