// Background Slides
$(document).ready(function() {
	var bgArray = [
		"bg-home-0.jpg",
		"bg-home-1.jpg",
		"bg-home-2.jpg",
		"bg-home-3.jpg",
		"bg-home-4.jpg",
		"bg-home-5.jpg",
		"bg-home-6.jpg",
		"bg-home-7.jpg",
		"bg-home-8.jpg",
		"bg-home-9.jpg",
		"bg-home-10.jpg",
		"bg-home-11.jpg"
	];
	var bg = bgArray[Math.floor(Math.random() * bgArray.length)];
	var path = "assets/img/";
	var imageUrl = path + bg;
	$("#searchbar").css("background-image", "url(" + imageUrl + ")");
});

// Dropdown Submenu
$(".dropdown-menu a.dropdown-toggle").on("click", function(e) {
	if (
		!$(this)
			.next()
			.hasClass("show")
	) {
	$(this)
		.parents(".dropdown-menu")
		.first()
		.find(".show")
		.removeClass("show");
	}
	var $subMenu = $(this).next(".dropdown-menu");
	$subMenu.toggleClass("show");
	
	$(this)
		.parents("li.nav-item.dropdown.show")
		.on("hidden.bs.dropdown", function(e) {
			$(".dropdown-submenu .show").removeClass("show");
		});
	
	return false;
});

// Side-nav toggle
$("#menu-toggle").click(function(event) {
	event.stopPropagation();
	$("#wrapper").toggleClass("toggled");
	$("#page-content-overlay").toggleClass("toggled");
	$("body").toggleClass("noscroll");
});
$("#menu-close").click(function(event) {
	event.stopPropagation();
	$("#wrapper").removeClass("toggled");
	$("#page-content-overlay").removeClass("toggled");
	$("body").removeClass("noscroll");
});

$("#sidebar-wrapper").click(function(event) {
	event.stopPropagation();
});
$("#sidebar-wrapper a").click(function(event) {
	$("#wrapper").removeClass("toggled");
	$("#page-content-overlay").removeClass("toggled");
	$("body").removeClass("noscroll");
});

$(document).click(function() {
	$("#wrapper").removeClass("toggled");
	$("#page-content-overlay").removeClass("toggled");
	$("body").removeClass("noscroll");
});

// Page fade-out
window.addEventListener("beforeunload", function() {
	document.body.classList.add("animate-out");
});

// sticky navbar for top alert
$(document).ready(function() {
	$(window).scroll(function() {
		var header = document.getElementById("stickynav");
		if ($(this).scrollTop() > 50) {
			header.classList.add("fixed");
			header.classList.remove("not-fixed");
		} else {
			header.classList.add("not-fixed");
			header.classList.remove("fixed");
		}
	});
});

// Stickem.js options
$(".container").stickem({
	item: ".stickem",
	container: ".stickem-container",
	stickClass: "stickit",
	endStickClass: "stickit-end",
	offset: 406,
	onStick: null,
	onUnstick: null
});

//Make cards visible in viewport
(function($, win) {
	$.fn.inViewport = function(cb) {
		return this.each(function(i, el) {
			function visPx() {
				var H = $(this).height(),
					r = el.getBoundingClientRect(),
					t = r.top,
					b = r.bottom;
				return cb.call(el, Math.max(0, t > 0 ? H - t : b < H ? b : H));
			}
			visPx();
			$(win).on("resize scroll", visPx);
		});
	};
})(jQuery, window);

$(".card").inViewport(function(px) {
	if (px) {
		$(this).removeClass("card-invisible");
	} else {
		$(this).addClass("card-invisible");
	}
});
$(".slide").inViewport(function(px) {
	if (px) {
		$(this).removeClass("slide-invisible");
	} else {
		$(this).addClass("slide-invisible");
	}
});



// Scroll Buttons
/*$(document).ready(function() {
    $(this).scrollTop(0);
	document.getElementById("scrollDown").style.display = "block";
	document.getElementById("scrollUp").style.display = "none";
});

$(window).scroll(function() {
	if ($(this).scrollTop()>5600) {
		//alert("hello world.")
		document.getElementById("scrollDown").style.display = "none";
		document.getElementById("scrollUp").style.display = "block";
	}
	if ($(window).scrollTop()==0) {
		//alert("hello world.")
		document.getElementById("scrollDown").style.display = "block";
		document.getElementById("scrollUp").style.display = "none";
	}
});

var arr = ['0', '860', '2040', '2900', '3760', '4620', '5700'];
var i = 0;

function nextItem() {
    i = i + 1; // increase i by one
    i = i % arr.length; // if we've gone too high, start from `0` again
    return arr[i]; // give us back the item of where we are now
}

window.addEventListener('load', function () {   
    document.getElementById('scrollDown').addEventListener(
        'click', // we want to listen for a click
        function () { // the e here is the event itself
            window.scrollTo({
				top: nextItem(),
				behavior: "smooth"
			});
        }
    );
    
    document.getElementById('scrollUp').addEventListener(
        'click', // we want to listen for a click
        function () { // the e here is the event itself
            window.scrollTo({
				top: 0,
				behavior: "smooth"
			});
        }
    );
});*/