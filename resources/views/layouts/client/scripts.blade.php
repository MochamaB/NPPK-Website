        
        
        
		<!-- jquery
		============================================ -->		
        <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- ajax mails JS
        ============================================ -->
        <script src="{{ asset('assets/js/ajax-mail.js') }}"></script>
		<!-- wow JS
		============================================ -->		
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
		<!-- Nivo slider js
		============================================ --> 		
		<script src="{{ asset('assets/lib/js/jquery.nivo.slider.js') }}"></script>
		<script src="{{ asset('assets/lib/home.js') }}"></script>
		<!-- plugins JS
		============================================ -->
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <!-- google map api
		============================================ -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qDiT4MyM7IxaGPbQyLnMjVUsJck02N0"></script>
        <script>
            var myCenter=new google.maps.LatLng(30.249796, -97.754667);
            function initialize()
            {
                var mapProp = {
                  center:myCenter,
                  scrollwheel: false,
                  zoom:15,
                  mapTypeId:google.maps.MapTypeId.ROADMAP
                  };
                var map=new google.maps.Map(document.getElementById("hastech"),mapProp);
                var marker=new google.maps.Marker({
                  position:myCenter,
                    animation:google.maps.Animation.BOUNCE,
                  icon:'img/map-marker.png',
                    map: map,
                  });
                var styles = [
                  {
                    stylers: [
                      { hue: "#c5c5c5" },
                      { saturation: -100 }
                    ]
                  },
                ];
                map.setOptions({styles: styles});

                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script type="text/javascript">
            // grab an element
            var myElement = document.querySelector(".intelligent-header");
            // construct an instance of Headroom, passing the element
            var headroom  = new Headroom(myElement);
            // initialise
            headroom.init(); 
        </script>
		<!-- main JS
		============================================ -->		
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/myscripts.js') }}"></script>
@stack('scripts')
