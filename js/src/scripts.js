// Reusable functions
function isHidden(el) {
    var style = window.getComputedStyle(el);
    return (style.display === 'none')
}
if (!String.prototype.contains) {
    String.prototype.contains = function(s) {
        return this.indexOf(s) > -1
    }
}

document.addEventListener('DOMContentLoaded', function(){

	// Variables
	var menuItems = document.querySelectorAll(".menu-item-has-children > a");
	var mobMenuTrigger = document.getElementById("mobMenuTrigger");
	var mainNav = document.getElementById("mainNav");

	// Handle main navigation sub menu trigers
	for (i = 0; i < menuItems.length; i++) {
		var item = menuItems[i];
		item.onclick = function(e) {
			// Disable Default Click Event on Mobile
			if (!isHidden(mobMenuTrigger)) {
				e.preventDefault();
			}
			for (j = 0; j < menuItems.length; j++) {
				item = menuItems[j];
				if(item !== this) {
					item.classList.remove("open");
				}
			}
			if(this.parentElement.classList.contains("open")) {
				this.parentElement.classList.remove("open");
			} else {
				this.parentElement.classList.add("open");
			}
		}
	}

	// Handle mobile menu open/close
	mobMenuTrigger.onclick = function() {
		if(isHidden(mainNav)){
			mainNav.style.display = 'block';
			mobMenuTrigger.classList.add("open");
		} else {
			mainNav.style.display = 'none';
			mobMenuTrigger.classList.remove("open");
		}
	};
}, false);