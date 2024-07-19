<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset("Client/assets/js/vendor/modernizr-3.5.0.min.js")}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset("Client/assets/js/vendor/jquery-1.12.4.min.js")}}"></script>
        <script src="{{asset("Client/assets/js/popper.min.js")}}"></script>
        <script src="{{asset("Client/assets/js/bootstrap.min.js")}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset("Client/assets/js/jquery.slicknav.min.js")}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset("Client/assets/js/owl.carousel.min.js")}}"></script>
        <script src="{{asset("Client/assets/js/slick.min.js")}}"></script>
        <!-- Date Picker -->
        <script src="{{asset("Client/assets/js/gijgo.min.js")}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset("Client/assets/js/wow.min.js")}}"></script>
		<script src="{{asset("Client/assets/js/animated.headline.js")}}"></script>
        <script src="{{asset("Client/assets/js/jquery.magnific-popup.js")}}"></script>

        <!-- Breaking New Pluging -->
        <script src="{{asset("Client/assets/js/jquery.ticker.js")}}"></script>
        <script src="{{asset("Client/assets/js/site.js")}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset("Client/assets/js/jquery.scrollUp.min.js")}}"></script>
        <script src="{{asset("Client/assets/js/jquery.nice-select.min.js")}}"></script>
		<script src="{{asset("Client/assets/js/jquery.sticky.js")}}"></script>
        
        <!-- contact js -->
        <script src="{{asset("Client/assets/js/contact.js")}}"></script>
        <script src="{{asset("Client/assets/js/jquery.form.js")}}"></script>
        <script src="{{asset("Client/assets/js/jquery.validate.min.js")}}"></script>
        <script src="{{asset("Client/assets/js/mail-script.js")}}"></script>
        <script src="{{asset("Client/assets/js/jquery.ajaxchimp.min.js")}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset("Client/assets/js/plugins.js")}}"></script>
        <script src="{{asset("Client/assets/js/main.js")}}"></script>

        <script>
            function formatDate(date) {
            const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            const monthsOfYear = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            const dayOfWeek = daysOfWeek[date.getDay()];
            const day = date.getDate();
            const month = monthsOfYear[date.getMonth()];
            const year = date.getFullYear();

            const daySuffix = (day) => {
                if (day > 3 && day < 21) return 'th';
                switch (day % 10) {
                    case 1:  return "st";
                    case 2:  return "nd";
                    case 3:  return "rd";
                    default: return "th";
                }
            }

            return `${dayOfWeek}, ${day}${daySuffix(day)} ${month}, ${year}`;
        }

        const currentDate = new Date(); // Lấy thời điểm hiện tại
        const formattedDate = formatDate(currentDate); // Định dạng thời điểm hiện tại

        // Chèn ngày tháng đã định dạng vào phần tử HTML
        document.getElementById('current-date').innerText = formattedDate;
        </script>